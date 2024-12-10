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
    <title>Noticia</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<h1 class="kj2">Actualizar Noticia</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM noticia WHERE IdNoticia='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);
    
    $IDNOTICIA=$FILA['IdNoticia'];
    $INFORMACION=$FILA['Informacion'];
    $CREDITO=$FILA['Credito'];  
    $FECHAP=$FILA['FechaPublicacion'];
    $PUBLICADOR=$FILA['Publicador']; 
}
?>

<form name="update" method="post" action="" enctype="multipart/form-data">
    

    <p>ID NOTICIA:
        <input type="text" name="IdNoticia" value="<?php echo $IDNOTICIA; ?>" readonly DISABLED>
    </p>
    
    <p>INFORMACION:
        <input type="Text" name="caja1" class="kj6" value="<?php echo $INFORMACION; ?>" required>
    </p>
    
    <p>CREDITO:
        <input type="Text" name="caja2" class="kj6" value="<?php echo $CREDITO; ?>" required>
    </p>
    <p> FECHA PUBLICACION:
        <input type="Text" name="caja3" class="kj6" value="<?php echo $FECHAP; ?>" required>
    </p>
    
        <label for="nombre">PUBLICADOR:
                <select name="caja4" class="caja1" required>
                    <option value="0"><?php echo $PUBLICADOR; ?></option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM persona";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdPersona']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                        }
                    ?>
                </select>
                <BR><BR>
                </label>
    
    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    $INFORMACION = $_POST['caja1'];
    $CREDITO = $_POST['caja2'];
    $FECHAP = $_POST['caja3'];
    $PUBLICADOR = $_POST['caja4'];

    
    $ACTUALIZAR = "UPDATE noticia SET Informacion='$INFORMACION', Credito='$CREDITO', FechaPublicacion='$FECHAP', Publicador='$PUBLICADOR' WHERE IdNoticia='$IDNOTICIA'# frozen_string_literal";
    
    if (mysqli_query($conexion, $ACTUALIZAR)) {
        echo '<script>alert("Noticia Actualizada");</script>';
        echo '<script>window.location.href="Noticia.php";</script>';
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
}
}
?>
</div>


<?php INCLUDE ('../TEMPLATE/footer.php');?>
