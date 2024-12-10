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
    <title>Horario</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido1.php');?>
<H2> LISTADO DE HORARIO </H2>
      <BR>
      <a id="insertboton1" href="InsertarHorario.php"> + HORARIO </a>  
      <BR><BR>


      <FORM METHOD="POST" ACTION="Horario.php" ENCTYPE="MULTIPART/FORM-DATA">
          <TABLE>
              <TR><H4> 
                  <TD> ID HORARIO </H1></TD> 
                  <TD> HORA INICIO</TD>
                  <TD> HORA FIN  </TD>
                  <TD> GRADO</TD>
                  <TD> DOCENTE  </TD>
                  <TD> ACTUALIZAR </TD>
                  <TD> ELIMINAR </TD> 
              </TR>

      
        
      <?php 
      //-->PAGINADOR

      $SQL_REGISTROS = MYSQLI_QUERY($conexion,"SELECT COUNT(*) AS TOTAL FROM horario");
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
          h.IdHorario, 
          h.HoraInicio, 
          h.HoraFin, 
          g.Nombre AS NombreGrado, 
          d.Nombre AS NombreDocente
      FROM 
          horario h
      LEFT JOIN grado g ON h.Grado = g.IdGrado
      LEFT JOIN docente d ON h.Docente = d.IdDocente
      LIMIT $DESDE, $POR_PAGINA";
  $EJECUTAR = MYSQLI_QUERY($conexion, $CONSULTA);
  
  WHILE ($FILA = MYSQLI_FETCH_ASSOC($EJECUTAR)) {
      $IDHORARIO = $FILA['IdHorario'];
      $HORAI = $FILA['HoraInicio'];
      $HORAF = $FILA['HoraFin'];
      $GRADO = $FILA['NombreGrado'] ? $FILA['NombreGrado'] : "No asignado";
      $DOCENTE = $FILA['NombreDocente'] ? $FILA['NombreDocente'] : "No asignado";
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
                <TD><?php ECHO $IDHORARIO; ?> </TD>
                <TD><?php ECHO $HORAI; ?> </TD>
                <TD><?php ECHO $HORAF;?> </TD>
                <TD><?php ECHO $GRADO; ?> </TD>
                <TD><?php ECHO $DOCENTE;?> </TD>


                           
                
                <TD><A HREF="ActualizarHorario.php?ACTUALIZAR=<?php ECHO $IDHORARIO;?> ">  <img style="width: 50px;height: 50px;"  src="../IMG/actualizar.png"> </A></TD>
                <TD><A HREF="Horario.php?ELIMINAR=<?php ECHO $IDHORARIO;?> "> <img style="width: 50px;height: 50px;"  src="../IMG/eliminar.png"> </A></TD>
                
        
              </TR>
                      <?php 
                      IF(isset($_GET['ELIMINAR'])){
                        $BORRAR_ID= $_GET['ELIMINAR'];
                        $ELIMINAR="DELETE FROM horario WHERE IdHorario='$BORRAR_ID'";
                        $EJECUTAR=MYSQLI_QUERY($conexion,$ELIMINAR);
                
                        if($EJECUTAR){
                          echo '<script type="text/javascript"> alert("Horario eliminado"); </script>';
                          echo '<script type="text/javascript"> window.open("Horario.php","_SELF"); </script>';
                         
                        }
                      }
                    }
                        ?> 
      
    </TABLE>
        <BR>
   
   
   <?php 
   if(isset($_GET['ACTUALIZAR'])){
      include("ActualizarGrado.php");
   }
    ?>

<div class="pagination">
   <?php   //IMPRIMIR NUMEROS DE PAGINA
          $SQL1= "SELECT * FROM horario";
          $EJECUTAR = mysqli_query($conexion, $SQL1);
          $TOTALREGISTROS=mysqli_num_rows($EJECUTAR);
          $TOTAL_PAGINAS=ceil($TOTALREGISTROS/$POR_PAGINA);
          echo"<center><a href='Horario.php?PAGINA=1'>". 'Primera  '."</a>";
          for ($i=1; $i <=$TOTAL_PAGINAS ; $i++) { 
            echo "<a href='Horario.php?PAGINA=".$i."' > " .$i. " </a>";
          }
          echo"<a href='Horario.php?PAGINA=$TOTAL_PAGINAS'>".'Ultima  '."</a> <center>";
          ?>


      </FORM>

      </DIV> 
        </div>

<?php INCLUDE ('../TEMPLATE/footer.php');?>
