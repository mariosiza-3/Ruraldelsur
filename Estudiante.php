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
    <title>Estudiante</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido1.php');?>
<H2> LISTADO DE ESTUDIANTES </H2>
      <BR>
      <a id="insertboton1" href="InsertarEstudiante.php"> + ESTUDIANTE </a>  

      <BR><BR>


      <FORM METHOD="POST" ACTION="Estudiante.php" ENCTYPE="MULTIPART/FORM-DATA">
          <TABLE>
              <TR><H4> 
                  <TD> ID </H1></TD> 
                  <TD> NOMBRE</TD>
                  <TD> APELLIDO  </TD>
                  <TD> TELEFONO </TD> 
                  <TD> NUMERO DOCUMENTO </TD> 
                  <TD> CORREO ELECTRONICO</TD>
                  <TD> CONTRASEÑA</TD>
                  <TD> TUTOR  </TD>
                  <TD> ACTUALIZAR </TD>
                  <TD> ELIMINAR </TD>
                  <TD> MATRICULAR </TD>
              </TR>

      
        
      <?php 
      //-->PAGINADOR

      $SQL_REGISTROS = MYSQLI_QUERY($conexion,"SELECT COUNT(*) AS TOTAL FROM estudiante");
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
          e.IdEstudiante, 
          e.Nombre AS NombreEstudiante, 
          e.Apellido, 
          e.Telefono,
          e.NumeroDocumento ,
          e.CorreoElectronico,
          e.Contrasena,
          t.Nombre AS NombreTutor
      FROM 
          estudiante e
      LEFT JOIN tutor t ON e.Tutor = t.IdTutor
      LIMIT $DESDE, $POR_PAGINA";
  $EJECUTAR = MYSQLI_QUERY($conexion, $CONSULTA);
  
  WHILE ($FILA = MYSQLI_FETCH_ASSOC($EJECUTAR)) {
      $IDESTUDIANTE = $FILA['IdEstudiante'];
      $NOMBRE = $FILA['NombreEstudiante'];
      $APELLIDO = $FILA['Apellido'];
      $TELEFONO = $FILA['Telefono'];
      $NUMERODOC = $FILA['NumeroDocumento'];
      $CORREOELECTRONICO = $FILA['CorreoElectronico'];
      $CONTRASENA = $FILA['Contrasena'];
      $TUTOR = $FILA['NombreTutor'] ? $FILA['NombreTutor'] : "Sin asignar";
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
                <TD><?php ECHO $IDESTUDIANTE; ?> </TD>
                <TD><?php ECHO $NOMBRE; ?> </TD>
                <TD><?php ECHO $APELLIDO;?> </TD>
                <TD><?php ECHO $TELEFONO; ?> </TD>
                <TD><?php ECHO $NUMERODOC; ?> </TD>
                <TD><?php ECHO $CORREOELECTRONICO; ?> </TD>
                <TD><?php ECHO $CONTRASENA; ?> </TD>
                <TD><?php ECHO $TUTOR;?> </TD>


                           
                
                <TD><A HREF="ActualizarEstudiante.php?ACTUALIZAR=<?php ECHO $IDESTUDIANTE;?> ">  <img style="width: 50px;height: 50px;"  src="../IMG/actualizar.png"> </A></TD>
                <TD><A HREF="Estudiante.php?ELIMINAR=<?php ECHO $IDESTUDIANTE;?> "> <img style="width: 50px;height: 50px;"  src="../IMG/eliminar.png"> </A></TD>
                <TD><A HREF="../MATRICULA/InsertarMatricula.php?MATRICULAR=<?php ECHO $IDESTUDIANTE;?> "> <img style="width: 50px;height: 50px;"  src="../IMG/tesis.png"> </A></TD>
                
        
              </TR>
                      <?php 
                      IF(isset($_GET['ELIMINAR'])){
                        $BORRAR_ID= $_GET['ELIMINAR'];
                        $ELIMINAR="DELETE FROM estudiante WHERE IdEstudiante='$BORRAR_ID'";
                        $EJECUTAR=MYSQLI_QUERY($conexion,$ELIMINAR);
                
                        if($EJECUTAR){
                          echo '<script type="text/javascript"> alert("Estudiante eliminado"); </script>';
                          echo '<script type="text/javascript"> window.open("Estudiante.php","_SELF"); </script>';
                         
                        }
                      }
                    }
                        ?> 
      
    </TABLE>
        <BR>
   
   
   <?php 
   if(isset($_GET['ACTUALIZAR'])){
      include("ActualizarEstudiante.php");
   }
    ?>
       <?php 
   if(isset($_GET['MATRICULAR'])){
      include("../MATRICULA/InsertarMatricula.php");
   }
    ?>
      
       <?php 
   if(isset($_GET['ACTUALIZAR CONTRASEÑA'])){
      include("../../index.php");
   }
    ?>

<div class="pagination">
<?php   //IMPRIMIR NUMEROS DE PAGINA
          $SQL1= "SELECT * FROM estudiante";
          $EJECUTAR = mysqli_query($conexion, $SQL1);
          $TOTALREGISTROS=mysqli_num_rows($EJECUTAR);
          $TOTAL_PAGINAS=ceil($TOTALREGISTROS/$POR_PAGINA);
          echo"<center><a href='Estudiante.php?PAGINA=1'>". 'Primera  '."</a>";
          for ($i=1; $i <=$TOTAL_PAGINAS ; $i++) { 
            echo "<a href='Estudiante.php?PAGINA=".$i."' > " .$i. " </a>";
          }
          echo"<a href='Estudiante.php?PAGINA=$TOTAL_PAGINAS'>".'Ultima  '."</a> <center>";
          ?>
</div>
        </FORM>
        </DIV>

<?php INCLUDE ('../TEMPLATE/footer.php');?>
