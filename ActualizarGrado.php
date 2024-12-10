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
    <title>Grados</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<h1 class="kj2">Actualizar Grado</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM grado WHERE IdGrado='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);
    
    $IDGRADO=$FILA['IdGrado'];
    $NOMBRE = $FILA['Nombre'];
    $CURSO = $FILA['Curso'];
}
?>

<form name="update" method="post" action="" enctype="multipart/form-data">
    

    <p>ID GRADO:
        <input type="text" name="IdGrado" value="<?php echo $IDGRADO; ?>" readonly DISABLED>
    </p>
    
    <p>NOMBRE:
        <input type="Text" name="caja1" class="kj6" value="<?php echo $NOMBRE; ?>" required>
    </p>
    
    <p>CURSO:
        <input type="Text" name="caja2" class="kj6" value="<?php echo $CURSO; ?>" required>
    </p>

    
    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    $NOMBRE = $_POST['caja1'];
    $CURSO = $_POST['caja2'];

    
    $ACTUALIZAR = "UPDATE grado SET Nombre='$NOMBRE', Curso='$CURSO' WHERE IdGrado='$IDGRADO'";
    
    if (mysqli_query($conexion, $ACTUALIZAR)) {
        echo '<script>alert("Grado Actualizado");</script>';
        echo '<script>window.location.href="Grado.php";</script>';
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>
</div>


<?php INCLUDE ('../TEMPLATE/footer.php');?>
