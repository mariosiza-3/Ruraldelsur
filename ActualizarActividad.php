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
<h1 class="kj2">Actualizar Actividad</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM actividad WHERE IdActividad ='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);
    
    $IDPAC=$FILA['IdActividad'];
    $NOM=$FILA['Nombre'];
    $APE=$FILA['Nota'];  
    $T_DOC=$FILA['Materia']; 
}
?>

<form name="update" method="post" action="" enctype="multipart/form-data">
    

    <p>ID ACTIVIDAD:
        <input type="text" name="IdBoletin" value="<?php echo $IDPAC; ?>" readonly disabled>
    </p>
    
    <p>NOMBRE:
        <input type="Text" name="caja1" class="kj6" value="<?php echo $NOM; ?>" required>
    </p>
    
    <p>NOTA:
        <input type="Text" name="caja2" class="kj6" value="<?php echo $APE; ?>" required>
    </p>
        <label for="MATERIA">MATERIA:
                <select name="caja3" class="kj6 " required>
                    <option value="<?php echo $T_DOC;?> "><?php echo $T_DOC; ?></option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM materia";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdMateria']."'>".$RESPUESTA2['Nombre']."</option>";
                        }
                    ?>
                </select>
                <br><br>
                </label>
    </p>
    

    
    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    $NOM = $_POST['caja1'];
    $APE = $_POST['caja2'];
    $T_DOC = $_POST['caja3'];
    
    $ACTUALIZAR = "UPDATE actividad SET Nombre='$NOM', Nota='$APE', Materia='$T_DOC'WHERE IdActividad='$IDPAC'";
    
    if (mysqli_query($conexion, $ACTUALIZAR)) {
        echo '<script>alert("Actividad Actualizado");</script>';
        echo '<script>window.location.href="Actividad.php";</script>';
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>

</div>

<?php INCLUDE ('../TEMPLATE/footer.php');?>
