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
    <title>Citas</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php'); ?>
<?php INCLUDE ('../TEMPLATE/contenido.php'); ?>
<h1 class="kj2">Actualizar Cita Psicológica</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM cita WHERE IdCita='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);
    
    $IDCITA = $FILA['IdCita'];
    $MOTIVO = $FILA['Motivo'];
    $HORA = $FILA['Hora'];  
    $FECHA = $FILA['Fecha'];
    $ESTUDIANTE = $FILA['Estudiante'];  
    $PSICOLOGO = $FILA['Psicologo']; 
}
?>

<form name="update" method="post" action="" enctype="multipart/form-data">

    <p>ID CITA:
        <input type="text" name="IdCita" value="<?php echo $IDCITA; ?>" readonly DISABLED>
    </p>
    
    <p>MOTIVO:
        <input type="Text" name="caja1" class="kj6" value="<?php echo $MOTIVO; ?>" required>
    </p>
    
    <p>HORA:
        <input type="Text" name="caja2" class="kj6" value="<?php echo $HORA; ?>" required>
    </p>
    <p>FECHA:
        <input type="text" name="caja3" value="<?php echo $FECHA; ?>" required>
    </p>
    
    <label for="nombre">ESTUDIANTE:
        <select name="caja4" class="caja1" required>
            <option value="<?php echo $ESTUDIANTE; ?>"><?php echo $ESTUDIANTE; ?></option>
            <?php
                $CONSULTA2 = "SELECT * FROM estudiante";
                $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                    echo "<option value='".$RESPUESTA2['IdEstudiante']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                }
            ?>
        </select>
        <BR><BR>
    </label>

    <label for="nombre">PSICOLOGO:
        <select name="caja5" class="caja1" required>
            <option value="<?php echo $PSICOLOGO; ?>"><?php echo $PSICOLOGO; ?></option>
            <?php
                $CONSULTA2 = "SELECT * FROM psicologo";
                $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                    echo "<option value='".$RESPUESTA2['IdPsicologo']."'>".$RESPUESTA2['Nombre']." ".$RESPUESTA2['Apellido']."</option>";
                }
            ?>
        </select>
        <BR><BR>
    </label>

    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    // Asegúrate de que los valores estén siendo correctamente capturados
    $IDCITA = $_POST['IdCita'];
    $MOTIVO = $_POST['caja1'];
    $HORA = $_POST['caja2'];
    $FECHA = $_POST['caja3'];
    $ESTUDIANTE = $_POST['caja4']; // Estudiante ID
    $PSICOLOGO = $_POST['caja5']; // Psicologo ID

    // Depuración de los valores capturados
    echo "<pre>";
    echo "IDCITA: $IDCITA\n";
    echo "MOTIVO: $MOTIVO\n";
    echo "HORA: $HORA\n";
    echo "FECHA: $FECHA\n";
    echo "ESTUDIANTE: $ESTUDIANTE\n";
    echo "PSICOLOGO: $PSICOLOGO\n";
    echo "</pre>";

    // Verificar que los campos Estudiante y Psicologo estén correctamente llenos
    if (!empty($ESTUDIANTE) && !empty($PSICOLOGO)) {
        $ACTUALIZAR = "UPDATE cita SET Motivo='$MOTIVO', Hora='$HORA', Fecha='$FECHA', Estudiante='$ESTUDIANTE', Psicologo='$PSICOLOGO' WHERE IdCita='$IDCITA'";
        
        // Depuración de la consulta
        echo "<pre>";
        echo "Consulta SQL: $ACTUALIZAR\n";
        echo "</pre>";

        if (mysqli_query($conexion, $ACTUALIZAR)) {
            echo '<script>alert("Cita Actualizada");</script>';
            echo '<script>window.location.href="Cita.php";</script>';
        } else {
            echo "Error al actualizar: " . mysqli_error($conexion);
        }
    } else {
        echo "Error: los campos Estudiante o Psicologo no pueden estar vacíos.";
    }
}
?>
</div>
<?php INCLUDE ('../TEMPLATE/footer.php'); ?>
