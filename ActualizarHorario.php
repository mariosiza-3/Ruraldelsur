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
    <title>Horario</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<h1 class="kj2">Actualizar Horario</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM horario WHERE IdHorario='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);
    
    $IDHORARIO=$FILA['IdHorario'];
    $HORAI=$FILA['HoraInicio'];
    $HORAF=$FILA['HoraFin'];
    $GRADO=$FILA['Grado'];
    $DOCENTE=$FILA['Docente']; 
}
?>

<form name="update" method="post" action="" enctype="multipart/form-data">
    

    <p>ID HORARIO:
        <input type="text" name="IdHorario" value="<?php echo $IDHORARIO; ?>" readonly disabled>
    </p>
    
    <p>HORA INICIO:
        <input type="Text" name="caja1" class="kj6" value="<?php echo $HORAI; ?>" required>
    </p>
    
    <p>HORA FIN:
        <input type="Text" name="caja2" class="kj6" value="<?php echo $HORAF; ?>" required>
    </p>
        <label for="nombre">GRADO:
                <select name="caja3" class="caja1" required>
                    <option ><?php echo $GRADO; ?></option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM grado";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdGrado']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Curso']."</option>";
                        }
                    ?>
                </select>
                <BR><BR>
                </label>
    

        <label for="nombre" >DOCENTE:
                <select name="caja4" class="caja1" required>
                    <option ><?php echo $DOCENTE; ?></option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM docente";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdDocente']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                        }
                    ?>
                </select>
                <BR><BR>
                </label>

    
    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    $HORAI = $_POST['caja1'];
    $HORAF = $_POST['caja2'];
    $GRADO = $_POST['caja3'];
    $DOCENTE = $_POST['caja4'];

    
    $ACTUALIZAR = "UPDATE horario SET HoraInicio='$HORAI', HoraFin='$HORAF', Grado='$GRADO', Docente='$DOCENTE' WHERE IdHorario='$IDHORARIO'";
    
    if (mysqli_query($conexion, $ACTUALIZAR)) {
        echo '<script>alert("Horario Actualizado");</script>';
        echo '<script>window.location.href="Horario.php";</script>';
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>

</div>
<?php INCLUDE ('../TEMPLATE/footer.php');?>
