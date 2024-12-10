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
    <title>Persona</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido1.php');?>
<H2> LISTADO DE PERSONAS </H2>
      <BR>
      <a id="insertboton1" href="InsertarPersona.php"> + PERSONA </a>  
      <BR><BR>


      <FORM METHOD="POST" ACTION="Persona.php" ENCTYPE="MULTIPART/FORM-DATA">
          <TABLE>
              <TR><H4> 
                  <TD> ID PERSONA </H1></TD> 
                  <TD> NOMBRE</TD>
                  <TD> APELLIDO  </TD>
                  <TD> TELEFONO </H1></TD> 
                  <TD> CORREO ELECTRONICO</TD>
                  <TD> CONTRASEÑA</TD>
                  <TD> ROL  </TD>
                  <TD> SEDE </TD>
                  <TD> ACTUALIZAR </TD>
                  <TD> ELIMINAR </TD> 
              </TR>

      
        
      <?php 
      //-->PAGINADOR

      $SQL_REGISTROS = MYSQLI_QUERY($conexion,"SELECT COUNT(*) AS TOTAL FROM persona");
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

      $CONSULTA= "
        SELECT 
            p.IdPersona, 
            p.Nombre, 
            p.Apellido, 
            p.Telefono, 
            p.CorreoElectronico,
            p.Contrasena, 
            r.Nombre AS RolNombre, 
            i.Nombre AS InstitucionNombre 
        FROM persona p
        LEFT JOIN rol r ON p.Rol = r.IdRol
        LEFT JOIN institucion i ON p.Institucion = i.Nombre
        LIMIT $DESDE,$POR_PAGINA";
      $EJECUTAR = MYSQLI_QUERY($conexion,$CONSULTA);

      WHILE ($FILA= MYSQLI_FETCH_ASSOC($EJECUTAR)){
          $IDPERSONA=$FILA['IdPersona'];
          $NOMBRE=$FILA['Nombre'];
          $APELLIDO=$FILA['Apellido'];
          $TELEFONO=$FILA['Telefono'];
          $CORREOELECTRONICO=$FILA['CorreoElectronico'];
          $CONTRASENA=$FILA['Contrasena'];
          $ROL=$FILA['RolNombre'] ? $FILA['RolNombre'] : "No asignado"; // Nombre del rol
          $SEDE=$FILA['InstitucionNombre'] ? $FILA['InstitucionNombre'] : "No asignada"; // Nombre de la institución
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
                <TD><?php ECHO $IDPERSONA; ?> </TD>
                <TD><?php ECHO $NOMBRE; ?> </TD>
                <TD><?php ECHO $APELLIDO;?> </TD>
                <TD><?php ECHO $TELEFONO; ?> </TD>
                <TD><?php ECHO $CORREOELECTRONICO; ?> </TD>
                <TD><?php ECHO $CONTRASENA; ?> </TD>
                <TD><?php ECHO $ROL;?> </TD>
                <TD><?php ECHO $SEDE;?> </TD>


                           
                
                <TD><A HREF="ActualizarPersona.php?ACTUALIZAR=<?php ECHO $IDPERSONA;?> ">  <img style="width: 50px;height: 50px;"  src="../IMG/actualizar.png"> </A></TD>
                <TD><A HREF="Persona.php?ELIMINAR=<?php ECHO $IDPERSONA;?> "> <img style="width: 50px;height: 50px;"  src="../IMG/eliminar.png"> </A></TD>
                
        
              </TR>
                      <?php 
                      IF(isset($_GET['ELIMINAR'])){
                        $BORRAR_ID= $_GET['ELIMINAR'];
                        $ELIMINAR="DELETE FROM persona WHERE IdPersona='$BORRAR_ID'";
                        $EJECUTAR=MYSQLI_QUERY($conexion,$ELIMINAR);
                
                        if($EJECUTAR){
                          echo '<script type="text/javascript"> alert("Persona eliminada"); </script>';
                          echo '<script type="text/javascript"> window.open("Persona.php","_SELF"); </script>';
                         
                        }
                      }
                    }
                        ?> 
      
    </TABLE>
        <BR>
   
   
   <?php 
   if(isset($_GET['ACTUALIZAR'])){
      include("ActualizarPersona.php");
   }
    ?>

<div class="pagination">   
   <?php   //IMPRIMIR NUMEROS DE PAGINA
          $SQL1= "SELECT * FROM persona";
          $EJECUTAR = mysqli_query($conexion, $SQL1);
          $TOTALREGISTROS=mysqli_num_rows($EJECUTAR);
          $TOTAL_PAGINAS=ceil($TOTALREGISTROS/$POR_PAGINA);
          echo"<center><a href='Persona.php?PAGINA=1'>". 'Primera  '."</a>";
          for ($i=1; $i <=$TOTAL_PAGINAS ; $i++) { 
            echo "<a href='Persona.php?PAGINA=".$i."' > " .$i. " </a>";
          }
          echo"<a href='Persona.php?PAGINA=$TOTAL_PAGINAS'>".'Ultima  '."</a> <center>";
          ?>

        </FORM>
        </DIV>
        </div>
<?php INCLUDE ('../TEMPLATE/footer.php');?>
