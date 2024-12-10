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
    <title>Cita</title>
</head>
<body> 
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido1.php');?>

<H2> LISTADO DE CITAS </H2>
      <BR>
      <a id="insertboton1" href="InsertarCita.php"> + CITAS PSICOLÓGICAS </a>  
      <BR><BR>


      <FORM METHOD="POST" ACTION="Grado.php" ENCTYPE="MULTIPART/FORM-DATA">
          <TABLE>
              <TR><H4> 
                  <TD> ID CITA  </H1></TD> 
                  <TD> MOTIVO</TD>
                  <TD> HORA  </TD>
                  <TD> FECHA</TD>
                  <TD> ESTUDIANTE</TD>
                  <TD> PSICOLOGO  </TD>
                  <TD> ACTUALIZAR </TD>
                  <TD> ELIMINAR </TD> 
              </TR>

      
        
      <?php 
      //-->PAGINADOR

      $SQL_REGISTROS = MYSQLI_QUERY($conexion,"SELECT COUNT(*) AS TOTAL FROM cita");
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
          c.IdCita, 
          c.Motivo, 
          c.Hora, 
          c.Fecha, 
          e.Nombre AS NombreEstudiante, 
          p.Nombre AS NombrePsicologo 
      FROM 
          cita c
      LEFT JOIN estudiante e ON c.Estudiante = e.IdEstudiante
      LEFT JOIN psicologo p ON c.Psicologo = p.IdPsicologo
      LIMIT $DESDE, $POR_PAGINA";
  $EJECUTAR = MYSQLI_QUERY($conexion, $CONSULTA);
  
  WHILE ($FILA = MYSQLI_FETCH_ASSOC($EJECUTAR)) {
      $IDCITA = $FILA['IdCita'];
      $MOTIVO = $FILA['Motivo'];
      $HORA = $FILA['Hora'];
      $FECHA = $FILA['Fecha'];
      $ESTUDIANTE = $FILA['NombreEstudiante'] ? $FILA['NombreEstudiante'] : "Sin asignar"; // Nombre del estudiante
      $PSICOLOGO = $FILA['NombrePsicologo'] ? $FILA['NombrePsicologo'] : "Sin asignar";   // Nombre del psicólogo
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
                <TD><?php ECHO $IDCITA; ?> </TD>
                <TD><?php ECHO $MOTIVO; ?> </TD>
                <TD><?php ECHO $HORA;?> </TD>
                <TD><?php ECHO $FECHA; ?> </TD>
                <TD><?php ECHO $ESTUDIANTE; ?> </TD>
                <TD><?php ECHO $PSICOLOGO;?> </TD>


                           
                
                <TD><A HREF="ActualizarCita.php?ACTUALIZAR=<?php ECHO $IDCITA;?> ">  <img style="width: 50px;height: 50px;"  src="../IMG/actualizar.png"> </A></TD>
                <TD><A HREF="Cita.php?ELIMINAR=<?php ECHO $IDCITA;?> "> <img style="width: 50px;height: 50px;"  src="../IMG/eliminar.png"> </A></TD>
                
        
              </TR>
                      <?php 
                      IF(isset($_GET['ELIMINAR'])){
                        $BORRAR_ID= $_GET['ELIMINAR'];
                        $ELIMINAR="DELETE FROM cita WHERE IdCita='$BORRAR_ID'";
                        $EJECUTAR=MYSQLI_QUERY($conexion,$ELIMINAR);
                
                        if($EJECUTAR){
                          echo '<script type="text/javascript"> alert("Cita eliminada"); </script>';
                          echo '<script type="text/javascript"> window.open("Cita.php","_SELF"); </script>';
                         
                        }
                      }
                    }
                        ?> 
      
    </TABLE>
        <BR>
   
   
   <?php 
   if(isset($_GET['ACTUALIZAR'])){
      include("ActualizarCita.php");
   }
    ?>

<div class="pagination">

   <?php   //IMPRIMIR NUMEROS DE PAGINA
          $SQL1= "SELECT * FROM cita";
          $EJECUTAR = mysqli_query($conexion, $SQL1);
          $TOTALREGISTROS=mysqli_num_rows($EJECUTAR);
          $TOTAL_PAGINAS=ceil($TOTALREGISTROS/$POR_PAGINA);
          echo"<center><a href='Cita.php?PAGINA=1'>". 'Primera  '."</a>";
          for ($i=1; $i <=$TOTAL_PAGINAS ; $i++) { 
            echo "<a href='Cita.php?PAGINA=".$i."' > " .$i. " </a>";
          }
          echo"<a href='Cita.php?PAGINA=$TOTAL_PAGINAS'>".'Ultima  '."</a> <center>";
          ?>


      </FORM>
        </DIV>
      </DIV> 




<?php INCLUDE ('../TEMPLATE/footer.php');?>