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
    <title>Asistencia</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido1.php');?>
<H2> LISTADO DE INASISTENCIA </H2>
      <BR>
      <a id="insertboton1" href="InsertarInasistencia.php"> + INASISTENCIA </a>  
      <BR><BR>


      <FORM METHOD="POST" ACTION="Inasistencia.php" ENCTYPE="MULTIPART/FORM-DATA">
          <TABLE>
              <TR><H4> 
                  <TD> ID INASISTENCIA </H1></TD> 
                  <TD> FECHA INICIO</TD>
                  <TD> FECHA FIN  </TD>
                  <TD> CANTIDAD HORAS</TD>
                  <TD> EXCUSA  </TD>
                  <TD> ESTUDIANTE </TD>
                  <TD> DOCENTE </TD> 
                  <TD> ACTUALIZAR </TD>
                  <TD> ELIMINAR </TD> 
              </TR>

      
        
      <?php 
      //-->PAGINADOR

      $SQL_REGISTROS = MYSQLI_QUERY($conexion,"SELECT COUNT(*) AS TOTAL FROM inasistencia");
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
          i.IdExcusa, 
          i.FechaInicio, 
          i.FechaFin, 
          i.CantidadHoras, 
          i.Excusa, 
          e.Nombre AS NombreEstudiante, 
          d.Nombre AS NombreDocente
      FROM 
          inasistencia i
      LEFT JOIN estudiante e ON i.Estudiante = e.IdEstudiante
      LEFT JOIN docente d ON i.Docente = d.IdDocente
      LIMIT $DESDE, $POR_PAGINA";
  $EJECUTAR = MYSQLI_QUERY($conexion, $CONSULTA);
  
  WHILE ($FILA = MYSQLI_FETCH_ASSOC($EJECUTAR)) {
      $IDINASITENCIA = $FILA['IdExcusa'];
      $FECHAI = $FILA['FechaInicio'];
      $FECHAF = $FILA['FechaFin'];
      $CANTH = $FILA['CantidadHoras'];
      $EXCUSA = $FILA['Excusa'];
      $ESTUDIANTE = $FILA['NombreEstudiante'] ? $FILA['NombreEstudiante'] : "No asignado";
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
                <TD><?php ECHO $IDINASITENCIA; ?> </TD>
                <TD><?php ECHO $FECHAI; ?> </TD>
                <TD><?php ECHO $FECHAF;?> </TD>
                <TD><?php ECHO $CANTH; ?> </TD>
                <TD><?php ECHO $EXCUSA; ?> </TD>
                <TD><?php ECHO $ESTUDIANTE;?> </TD>
                <TD><?php ECHO $DOCENTE;?> </TD>


                           
                
                <TD><A HREF="ActualizarInasistencia.php?ACTUALIZAR=<?php ECHO $IDINASITENCIA;?> ">  <img style="width: 50px;height: 50px;"  src="../IMG/actualizar.png"> </A></TD>
                <TD><A HREF="Inasistencia.php?ELIMINAR=<?php ECHO $IDINASITENCIA;?> "> <img style="width: 50px;height: 50px;"  src="../IMG/eliminar.png"> </A></TD>
                
        
              </TR>
                      <?php 
                      IF(isset($_GET['ELIMINAR'])){
                        $BORRAR_ID= $_GET['ELIMINAR'];
                        $ELIMINAR="DELETE FROM inasistencia WHERE IdExcusa='$BORRAR_ID'";
                        $EJECUTAR=MYSQLI_QUERY($conexion,$ELIMINAR);
                
                        if($EJECUTAR){
                          echo '<script type="text/javascript"> alert("Inasistencia eliminada"); </script>';
                          echo '<script type="text/javascript"> window.open("Inasistencia.php","_SELF"); </script>';
                         
                        }
                      }
                    }
                        ?> 
      
    </TABLE>
        <BR>
   
   
   <?php 
   if(isset($_GET['ACTUALIZAR'])){
      include("ActualizarInasistencia.php");
   }
    ?>

<div class="pagination"> 
   <?php   //IMPRIMIR NUMEROS DE PAGINA
          $SQL1= "SELECT * FROM inasistencia";
          $EJECUTAR = mysqli_query($conexion, $SQL1);
          $TOTALREGISTROS=mysqli_num_rows($EJECUTAR);
          $TOTAL_PAGINAS=ceil($TOTALREGISTROS/$POR_PAGINA);
          echo"<center><a href='Inasistencia.php?PAGINA=1'>". 'Primera  '."</a>";
          for ($i=1; $i <=$TOTAL_PAGINAS ; $i++) { 
            echo "<a href='Inasistencia.php?PAGINA=".$i."' > " .$i. " </a>";
          }
          echo"<a href='Inasistencia.php?PAGINA=$TOTAL_PAGINAS'>".'Ultima  '."</a> <center>";
          ?>
</FORM>

      </DIV>
        </div>


<?php INCLUDE ('../TEMPLATE/footer.php');?>
