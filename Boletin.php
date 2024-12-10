<?php
SESSION_START();
REQUIRE_ONCE('../CONEXION/Conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>Actividades</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido1.php');?>
<H2> LISTADO DE BOLETINES </H2>
      <BR>
      <a href="InsertarBoletin.php" id="insertboton1"> + BOLETIN </a>  
      <BR><BR>


      <FORM METHOD="POST" ACTION="Boletin.php" ENCTYPE="MULTIPART/FORM-DATA">
          <TABLE>
              <TR><H4> 
                  <TD> IDBOLETIN</TD> 
                  <TD> ESTUDIANTE</TD>
                  <TD> RECTOR  </TD>
                  <TD> MATERIA</TD>
                  <TD> PERIODO</TD>
                  <TD> GRADO</TD>
                  <TD> PUESTO</TD>
                  <TD> OBSERVACIONES</TD>
                  <TD> ACTUALIZAR </TD>
                  <TD> ELIMINAR  </TD> 
              </TR>

      
        
      <?php 
      //-->PAGINADOR

      $SQL_REGISTROS = MYSQLI_QUERY($conexion,"SELECT COUNT(*) AS TOTAL FROM boletin");
      $RESULT_REGISTROS= MYSQLI_FETCH_ARRAY($SQL_REGISTROS);
      $TOTAL=$RESULT_REGISTROS['TOTAL'];

      $POR_PAGINA =5;

      IF(EMPTY($_GET['PAGINA'])){
        $PAGINA= 1;
      }ELSE{
        $PAGINA=$_GET['PAGINA'];
      }

      $DESDE=($PAGINA-1)* $POR_PAGINA;
      $TOTAL_PAGINAS= CEIL($TOTAL/$POR_PAGINA);


      $CONSULTA = "
      SELECT 
          b.IdBoletin, 
          e.Nombre AS NombreEstudiante, 
          r.Nombre AS NombreRector, 
          m.Nombre AS NombreMateria, 
          p.Nombre AS NombrePeriodo, 
          g.Nombre AS NombreGrado, 
          b.PuestoAcademico, 
          b.Observaciones
      FROM 
          boletin b
      LEFT JOIN estudiante e ON b.Estudiante = e.IdEstudiante
      LEFT JOIN persona r ON b.Rector = r.IdPersona
      LEFT JOIN materia m ON b.Materia = m.IdMateria
      LEFT JOIN periodo p ON b.Periodo = p.IdPeriodo
      LEFT JOIN grado g ON b.Grado = g.IdGrado
      LIMIT $DESDE, $POR_PAGINA";
  $EJECUTAR = MYSQLI_QUERY($conexion, $CONSULTA);
  
  WHILE ($FILA = MYSQLI_FETCH_ASSOC($EJECUTAR)) {
      $IDBOLETIN = $FILA['IdBoletin'];
      $ESTUDIANTE = $FILA['NombreEstudiante'] ? $FILA['NombreEstudiante'] : "Sin asignar";
      $RECTOR = $FILA['NombreRector'] ? $FILA['NombreRector'] : "Sin asignar";
      $MATERIA = $FILA['NombreMateria'] ? $FILA['NombreMateria'] : "Sin asignar";
      $PERIODO = $FILA['NombrePeriodo'] ? $FILA['NombrePeriodo'] : "Sin asignar";
      $GRADO = $FILA['NombreGrado'] ? $FILA['NombreGrado'] : "Sin asignar";
      $PUESTOACADEMICO = $FILA['PuestoAcademico'];
      $OBSERVACIONES = $FILA['Observaciones'];
  ?>
  



      <?php /* 
      $CONSULTA= "SELECT *FROM PACIENTE";
      $EJECUTAR = MYSQLI_QUERY($conexion,$CONSULTA);
      $I=0;
        WHILE ($FILA= MYSQLI_FETCH_ASSOC($EJECUTAR)){
            $IDPAC=$FILA['IDPACIENTE'];
            $NOM=$FILA['NOMBRE'];
            $APE=$FILA['APELLIDO'];  
            $FECHA_NAC=$FILA['FECHA_NACIMIENTO'];
            $T_DOC=$FILA['T_DOCUMENTO']; 
            $NUM_DOC=$FILA['N_DOCUMENTO'];
            $DIR=$FILA['DIRECCION']; 
            $TEL=$FILA['TELEFONO'];
            $FOTO=$FILA['FOTO'];
            $I++;
      */?>      


              <TR> 
                <TD><?php ECHO $IDBOLETIN; ?> </TD>
                <TD><?php ECHO $ESTUDIANTE; ?> </TD>
                <TD><?php ECHO $RECTOR;?> </TD>
                <TD><?php ECHO $MATERIA; ?> </TD>
                <TD><?php ECHO $PERIODO; ?> </TD>
                <TD><?php ECHO $GRADO;?> </TD>
                <TD><?php ECHO $PUESTOACADEMICO; ?> </TD>
                <TD><?php ECHO $OBSERVACIONES; ?> </TD>



                           
                
                <TD><A HREF="ActualizarBoletin.PHP?ACTUALIZAR=<?php ECHO $IDBOLETIN;?> ">  <img style="width: 50px;height: 50px;"  src="../IMG/actualizar.png"> </A></TD>
                <TD><A HREF="Boletin.php?ELIMINAR=<?php ECHO $IDBOLETIN;?> "> <img style="width: 50px;height: 50px;"  src="../IMG/eliminar.png"> </A></TD>
                
        
              </TR>
        <?php
          };
        ?>
    </TABLE>
        <BR>
  

<?php
// Suponiendo que ya tienes una conexión a la base de datos llamada $conn

if (isset($_GET['ELIMINAR'])) {
    $BORRAR_ID = mysqli_real_escape_string($conexion, $_GET['ELIMINAR']); // Escape de entrada

    // Sentencia preparada para prevenir inyección SQL
    $sql = "DELETE FROM boletin WHERE IdBoletin=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $BORRAR_ID); // Vincular el parámetro ID

    if ($stmt->execute()) {
        echo '<script type="text/javascript">alert("Boletin eliminado"); window.open("Boletin.php", "_SELF");</script>';
    } else {
        echo "Error al eliminar el Boletin: " . $stmt->error;
    }

    $stmt->close(); // Cerrar la sentencia preparada
}
?>
   
   <div class="pagination">
    <?php
    // Paginador
    $SQL1 = "SELECT * FROM boletin";
    $EJECUTAR = mysqli_query($conexion, $SQL1);
    $TOTALREGISTROS = mysqli_num_rows($EJECUTAR);
    $TOTAL_PAGINAS = ceil($TOTALREGISTROS / $POR_PAGINA);

    // Enlace a la primera página
    echo "<a href='Boletin.php?PAGINA=1'>Primera</a>";

    // Enlaces de paginación
    for ($i = 1; $i <= $TOTAL_PAGINAS; $i++) {
        $active = ($i == $PAGINA) ? "active" : ""; // Clase "active" para la página actual
        echo "<a href='Boletin.php?PAGINA=" . $i . "' class='$active'>" . $i . "</a>";
    }

    // Enlace a la última página
    echo "<a href='Boletin.php?PAGINA=$TOTAL_PAGINAS'>Última</a>";
    ?>
</div>
  </div>


<?php INCLUDE ('../TEMPLATE/footer.php');?>
