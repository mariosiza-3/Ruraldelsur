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
    <title>Docente</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido1.php');?>
<H2> LISTADO DE DOCENTES </H2>
      <BR>
      <a id="insertboton1" href="InsertarDocente.php"> + DOCENTE </a>  
      <BR><BR>


      <FORM METHOD="POST" ACTION="Grado.php" ENCTYPE="MULTIPART/FORM-DATA">
          <TABLE>
              <TR><H4> 
                  <TD> ID DOCENTE </H1></TD> 
                  <TD> NOMBRE</TD>
                  <TD> APELLIDO  </TD>
                  <TD> TELEFONO</TD>
                  <TD> CORREO ELECTRONICO</TD>
                  <TD> CONTRASEÑA</TD>
                  <TD> ACTUALIZAR </TD>
                  <TD> ELIMINAR </TD> 
              </TR>

      
        
      <?php 
      //-->PAGINADOR

      $SQL_REGISTROS = MYSQLI_QUERY($conexion,"SELECT COUNT(*) AS TOTAL FROM docente");
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


      $CONSULTA= "SELECT *FROM docente LIMIT $DESDE,$POR_PAGINA";
      $EJECUTAR = MYSQLI_QUERY($conexion,$CONSULTA);

        WHILE ($FILA= MYSQLI_FETCH_ASSOC($EJECUTAR)){
            $IDDOCENTE=$FILA['IdDocente'];
            $NOMBRE=$FILA['Nombre'];
            $APELLIDO=$FILA['Apellido'];
            $TELEFONO=$FILA['Telefono'];
            $CORREO=$FILA['CorreoElectronico']; 
            $CONTRASENA=$FILA['Contrasena']   
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
                <TD><?php ECHO $IDDOCENTE; ?> </TD>
                <TD><?php ECHO $NOMBRE; ?> </TD>
                <TD><?php ECHO $APELLIDO;?> </TD>
                <TD><?php ECHO $TELEFONO; ?> </TD>
                <TD><?php ECHO $CORREO;?> </TD>
                <TD><?php ECHO $CONTRASENA;?> </TD>



                           
                
                <TD><A HREF="ActualizarDocente.php?ACTUALIZAR=<?php ECHO $IDDOCENTE;?> ">  <img style="width: 50px;height: 50px;"  src="../IMG/actualizar.png"> </A></TD>
                <TD><A HREF="Docente.php?ELIMINAR=<?php ECHO $IDDOCENTE;?> "> <img style="width: 50px;height: 50px;"  src="../IMG/eliminar.png"> </A></TD>
                
        
              </TR>
                      <?php 
                      IF(isset($_GET['ELIMINAR'])){
                        $BORRAR_ID= $_GET['ELIMINAR'];
                        $ELIMINAR="DELETE FROM docente WHERE IdDocente='$BORRAR_ID'";
                        $EJECUTAR=MYSQLI_QUERY($conexion,$ELIMINAR);
                
                        if($EJECUTAR){
                          echo '<script type="text/javascript"> alert("Docente eliminado"); </script>';
                          echo '<script type="text/javascript"> window.open("Docente.php","_SELF"); </script>';
                         
                        }
                      }
                    }
                        ?> 
      
    </TABLE>
        <BR>
   
   
   <?php 
   if(isset($_GET['ACTUALIZAR'])){
      include("ActualizarDocente.php");
   }
    ?>

<div class="pagination">

    <?php   //IMPRIMIR NUMEROS DE PAGINA
          $SQL1= "SELECT * FROM docente";
          $EJECUTAR = mysqli_query($conexion, $SQL1);
          $TOTALREGISTROS=mysqli_num_rows($EJECUTAR);
          $TOTAL_PAGINAS=ceil($TOTALREGISTROS/$POR_PAGINA);
          echo"<center><a href='Docente.php?PAGINA=1'>". 'Primera  '."</a>";
          for ($i=1; $i <=$TOTAL_PAGINAS ; $i++) { 
            echo "<a href='Docente.php?PAGINA=".$i."' > " .$i. " </a>";
          }
          echo"<a href='Docente.php?PAGINA=$TOTAL_PAGINAS'>".'Ultima  '."</a> <center>";
          ?>
</div>
        </div>



<?php INCLUDE ('../TEMPLATE/footer.php');?>
