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
    <title>Tutor</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<h1 class="kj2">Actualizar Tutor</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM tutor WHERE IdTutor='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);
    
    $IDTUTOR=$FILA['IdTutor'];
    $NOMBRE=$FILA['Nombre'];
    $APELLIDO=$FILA['Apellido'];
    $TELEFONO=$FILA['Telefono'];
    $CORREOELECTRONICO=$FILA['CorreoElectronico'];
    $CONTRASENA=$FILA['Contrasena'];
    $PARENTEZCO=$FILA['Parentezco'];  
}
?>

<form name="update" method="post" action="" enctype="multipart/form-data">
    

    <p>ID TUTOR:
        <input type="text" name="IdEstudiante" value="<?php echo $IDTUTOR; ?>" readonly>
    </p>
    
    <p>NOMBRE:
        <input type="Text" name="caja1" class="kj6" value="<?php echo $NOMBRE; ?>" required>
    </p>
    
    <p>APELLIDO:
        <input type="Text" name="caja2" class="kj6" value="<?php echo $APELLIDO; ?>" required>
    </p>
    <p>TELEFONO:
        <input type="text" name="caja3" value="<?php echo $TELEFONO; ?>" required>
    </p>
    
    <p>CORREO ELECTRONICO:
        <input type="Text" name="caja4" class="kj6" value="<?php echo $CORREOELECTRONICO; ?>" required>
    </p>
    <p>CONTRASEÑA:
        <input type="Text" name="caja6" class="kj6" value="<?php echo $CONTRASENA; ?>" required>
    </p>
    
    <p>PARENTESCO:
        <input type="Text" name="caja5" class="kj6" value="<?php echo $PARENTEZCO; ?>" required>
    </p>

    
    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    $NOMBRE = $_POST['caja1'];
    $APELLIDO = $_POST['caja2'];
    $TELEFONO = $_POST['caja3'];
    $CORREOELECTRONICO = $_POST['caja4'];
    $CONTRASENA = $_POST['caja6'];
    $PARENTEZCO = $_POST['caja5'];

    
    $ACTUALIZAR = "UPDATE tutor SET Nombre='$NOMBRE', Apellido='$APELLIDO', Telefono='$TELEFONO', CorreoElectronico='$CORREOELECTRONICO', Contrasena='$CONTRASENA', Parentezco='$PARENTEZCO' WHERE IdTutor='$IDTUTOR';";
    
    if (mysqli_query($conexion, $ACTUALIZAR)) {
        echo '<script>alert("Tutor Actualizado");</script>';
        echo '<script>window.location.href="Tutor.php";</script>';
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>
</div>

<?php INCLUDE ('../TEMPLATE/footer.php');?>
