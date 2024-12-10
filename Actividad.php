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
<H2> LISTADO DE ACTIVIDADES </H2>
      <BR>
      <a id="insertboton1" href="InsertarActividad.php"> + ACTIVIDAD </a>  
      <BR><BR>


      <FORM METHOD="POST" ACTION="Actividad.php" ENCTYPE="MULTIPART/FORM-DATA">
          <TABLE>
              <TR><H4> 
                  <TD> IDACTIVIDAD </H1></TD> 
                  <TD> NOMBRE</TD>
                  <TD> NOTA  </TD>
                  <TD> MATERIA</TD>
                  <TD> ACTUALIZAR </TD>
                  <TD> ELIMINAR  </TD> 
              </TR>

      
        
      <?php 
      //-->PAGINADOR

      $SQL_REGISTROS = MYSQLI_QUERY($conexion,"SELECT COUNT(*) AS TOTAL FROM actividad");
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
      SELECT a.IdActividad, a.Nombre AS NombreActividad, a.Nota, m.Nombre
      FROM actividad a
      LEFT JOIN materia m ON a.Materia = m.IdMateria
      LIMIT $DESDE, $POR_PAGINA";
  $EJECUTAR = MYSQLI_QUERY($conexion, $CONSULTA);
  
  WHILE ($FILA = MYSQLI_FETCH_ASSOC($EJECUTAR)) {
      $IDACTIVIDAD = $FILA['IdActividad'];
      $NOMBRE = $FILA['NombreActividad']; // Nombre de la actividad
      $NOTA = $FILA['Nota'];
      $MATERIA = $FILA['Nombre'] ? $FILA['Nombre'] : "Sin asignar"; // Nombre de la materia
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
                <TD><?php ECHO $IDACTIVIDAD; ?> </TD>
                <TD><?php ECHO $NOMBRE; ?> </TD>
                <TD><?php ECHO $NOTA;?> </TD>
                <TD><?php ECHO $MATERIA;?> </TD>


                           
                
                <TD><A HREF="ActualizarActividad.PHP?ACTUALIZAR=<?php ECHO $IDACTIVIDAD;?> ">  <img style="width: 50px;height: 50px;"  src="../IMG/actualizar.png"> </A></TD>
                <TD><A HREF="Actividad.php?ELIMINAR=<?php ECHO $IDACTIVIDAD;?> "> <img style="width: 50px;height: 50px;"  src="../IMG/eliminar.png"> </A></TD>
                
        
              </TR>
        <?php
          };
        ?>
    </TABLE>
        <BR>
   
   
   <?php 
   if(isset($_GET['ACTUALIZAR'])){
      include("ActualizarActividad.php");
   }
    ?>

    <?php
      IF(isset($_GET['ELIMINAR'])){
        $BORRAR_ID= $_GET['ELIMINAR'];
        $ELIMINAR="DELETE FROM actividad WHERE IdActividad='$BORRAR_ID'";
        $EJECUTAR=MYSQLI_QUERY($conexion,$ELIMINAR);

        if($EJECUTAR){
          echo '<script type="text/javascript"> alert("Registro eliminado"); </script>';
          echo '<script type="text/javascript"> window.open("Actividad.php","_SELF"); </script>';
         
        }
      }
    ?>
      <div class="pagination">
   <?php   //IMPRIMIR NUMEROS DE PAGINA
          $SQL1= "SELECT * FROM actividad";
          $EJECUTAR = mysqli_query($conexion, $SQL1);
          $TOTALREGISTROS=mysqli_num_rows($EJECUTAR);
          $TOTAL_PAGINAS=ceil($TOTALREGISTROS/$POR_PAGINA);
          echo"<center><a href='Actividad.php?PAGINA=1'>". 'Primera  '."</a>";
          for ($i=1; $i <=$TOTAL_PAGINAS ; $i++) { 
            echo "<a href='Actividad.php?PAGINA=".$i."' > " .$i. " </a>";
          }
          echo"<a href='Actividad.php?PAGINA=$TOTAL_PAGINAS'>".'Ultima  '."</a> <center>";
          ?>


      </FORM>

      </DIV> 
        </DIV>

<?php INCLUDE ('../TEMPLATE/footer.php');?>
