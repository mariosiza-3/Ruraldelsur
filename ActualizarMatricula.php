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
    <title>Matricula</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php'); ?>
<?php INCLUDE ('../TEMPLATE/contenido.php'); ?>
<h1 class="kj2">Actualizar Matricula</h1>

<?php
if (isset($_GET['ACTUALIZAR'])) {
    $EDITAR_ID = $_GET['ACTUALIZAR'];
    $CONSULTA = "SELECT * FROM matricula WHERE IdMatricula='$EDITAR_ID'";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA) or die(mysqli_error($conexion));
    $FILA = mysqli_fetch_assoc($EJECUTAR);

    $IDMATRICULA = $FILA['IdMatricula'];
    $FECHAI = $FILA['FechaInicio'];
    $FECHAF = $FILA['FechaFin'];
    $DOCUMENTOS = $FILA['Documentos'];
    $SECRETARIO = $FILA['Secretario'];
    $GRADO = $FILA['Grado'];
    $ESTUDIANTE = $FILA['Estudiante'];
}
?>

<form name="update" method="post" action="" enctype="multipart/form-data">

    <p>ID MATRICULA:
        <input type="text" name="IdMatricula" value="<?php echo $IDMATRICULA; ?>" readonly DISABLED>
    </p>

    <p>FECHA INICIO:
        <input type="date" name="caja1" class="kj6" value="<?php echo $FECHAI; ?>" required>
    </p>

    <p>FECHA FIN:
        <input type="date" name="caja2" class="kj6" value="<?php echo $FECHAF; ?>" required>
    </p>

    <p>DOCUMENTOS (no editable):
        <input type="text" name="caja3" class="kj6" value="<?php echo $DOCUMENTOS; ?>" required>
    </p>

    <label for="nombre">SECRETARIO:
        <select name="caja4" class="caja1" required>
            <option value="<?php echo $SECRETARIO; ?>"><?php echo $SECRETARIO; ?></option>
            <?php
            $CONSULTA2 = "SELECT * FROM persona";
            $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
            while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                echo "<option value='" . $RESPUESTA2['IdPersona'] . "'>" . $RESPUESTA2['Nombre'] . " " . $RESPUESTA2['Apellido'] . "</option>";
            }
            ?>
        </select>
        <br><br>
    </label>

    <label for="nombre">GRADO:
        <select name="caja5" class="caja1" required>
            <option value="<?php echo $GRADO; ?>"><?php echo $GRADO; ?></option>
            <?php
            $CONSULTA3 = "SELECT * FROM grado";
            $EJECUTAR3 = mysqli_query($conexion, $CONSULTA3);
            while ($RESPUESTA3 = mysqli_fetch_assoc($EJECUTAR3)) {
                echo "<option value='" . $RESPUESTA3['IdGrado'] . "'>" . $RESPUESTA3['Nombre'] . " " . $RESPUESTA3['Curso'] . "</option>";
            }
            ?>
        </select>
        <br><br>
    </label>

    <label for="nombre">ESTUDIANTE:
        <select name="caja6" class="caja1" required>
            <option value="<?php echo $ESTUDIANTE; ?>"><?php echo $ESTUDIANTE; ?></option>
            <?php
            $CONSULTA4 = "SELECT * FROM estudiante";
            $EJECUTAR4 = mysqli_query($conexion, $CONSULTA4);
            while ($RESPUESTA4 = mysqli_fetch_assoc($EJECUTAR4)) {
                echo "<option value='" . $RESPUESTA4['IdEstudiante'] . "'>" . $RESPUESTA4['Nombre'] . " " . $RESPUESTA4['Apellido'] . "</option>";
            }
            ?>
        </select>
        <br><br>
    </label>

    <button type="submit" class="kj7" name="ACTUALIZAR">Actualizar</button>
</form>

<?php
if (isset($_POST['ACTUALIZAR'])) {
    $FECHAI = $_POST['caja1'];
    $FECHAF = $_POST['caja2'];
    $SECRETARIO = $_POST['caja4'];
    $GRADO = $_POST['caja5'];
    $ESTUDIANTE = $_POST['caja6'];

    // Validar claves foráneas
    if ($SECRETARIO != "0" && $GRADO != "0" && $ESTUDIANTE != "0") {
        $ACTUALIZAR = "UPDATE matricula SET FechaInicio='$FECHAI', FechaFin='$FECHAF', Secretario='$SECRETARIO', Grado='$GRADO', Estudiante='$ESTUDIANTE' WHERE IdMatricula='$IDMATRICULA'";

        if (mysqli_query($conexion, $ACTUALIZAR)) {
            echo '<script>alert("Matrícula actualizada exitosamente");</script>';
            echo '<script>window.location.href="Matricula.php";</script>';
        } else {
            echo "Error al actualizar: " . mysqli_error($conexion);
        }
    } else {
        echo '<script>alert("Por favor, seleccione valores válidos para Secretario, Grado y Estudiante.");</script>';
    }
}
?>
</div>
<?php INCLUDE ('../TEMPLATE/footer.php'); ?>
