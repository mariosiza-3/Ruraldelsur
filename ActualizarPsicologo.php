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
    <title>Psicólogo</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<h1 class="kj2">Actualizar Psicólogo</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM Psicologo WHERE IdPsicologo='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);
    
    $IDPSICOLOGO=$FILA['IdPsicologo'];
    $NOMBRE=$FILA['Nombre'];
    $APELLIDO=$FILA['Apellido'];
    $TELEFONO=$FILA['Telefono'];
    $CORREO=$FILA['CorreoElectronico']; 
    $CONTRASENA=$FILA['Contrasena'];
}
?>

<form name="update" method="post" action="" enctype="multipart/form-data">
    

    <p>ID PSICÓLOGO:
        <input type="text" name="IdPsicologo" value="<?php echo $IDPSICOLOGO; ?>" readonly DISABLED>
    </p>
    
    <p>NOMBRE:
        <input type="Text" name="caja1" class="kj6" value="<?php echo $NOMBRE; ?>" required>
    </p>
    
    <p>APELLIDO:
        <input type="Text" name="caja2" class="kj6" value="<?php echo $APELLIDO; ?>" required>
    </p>
    <p>TELEFONO:
        <input type="Text" name="caja3" class="kj6" value="<?php echo $TELEFONO; ?>" required>
    </p>
    
    <p>CORREO ELECTRONICO:
        <input type="Text" name="caja4" class="kj6" value="<?php echo $CORREO; ?>" required>
    </p>
    <p>CONTRASEÑA:
        <input type="Text" name="caja5" class="kj6" value="<?php echo $CONTRASENA; ?>" required>
    </p>

    
    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    $NOMBRE = $_POST['caja1'];
    $APELLIDO = $_POST['caja2'];
    $TELEFONO = $_POST['caja3'];
    $CORREO = $_POST['caja4'];
    $CONTRASENA=$_POST['caja5'];

    
    $ACTUALIZAR = "UPDATE psicologo SET Nombre='$NOMBRE', Apellido='$APELLIDO', Telefono='$TELEFONO', CorreoElectronico='$CORREO', Contrasena='$CONTRASENA' WHERE IdPsicologo='$IDPSICOLOGO'";
    
    if (mysqli_query($conexion, $ACTUALIZAR)) {
        echo '<script>alert("Psicólogo Actualizado");</script>';
        echo '<script>window.location.href="Psicologo.php";</script>';
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>

</div>

<?php INCLUDE ('../TEMPLATE/footer.php');?>
