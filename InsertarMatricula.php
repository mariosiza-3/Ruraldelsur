<?php
SESSION_START();

// Verifica si la variable de sesión contiene los datos necesarios
if (!isset($_SESSION['Nombre'])) {
    echo '<script>alert("Debe iniciar sesión para acceder a esta página.");</script>';
    echo '<script>window.location.href = "../login.php";</script>';
    exit;
}

require_once('../CONEXION/Conexion.php');
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

<div class="kj1">
    <h1 class="kj2">Insertar Matricula</h1>
</div>
<div class="kj3">
    <form name="INSERT" action="InsertarMatricula.php" method="POST" enctype="multipart/form-data">
        <div class="kj4">
            <div class="kj5">
                <label for="fecha">FECHA INICIO:</label><br>
                <input type="DATE" class="kj6" id="fecha" name="caja1" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">FECHA FIN:</label><br>
                <input type="DATE" class="kj6" id="fecha" name="caja2" required><br><br>
            </div>
            <div class="kj5">
                <label for="documentos">DOCUMENTOS:</label><br>
                <input type="FILE" class="kj6" id="documentos" name="caja3" required><br><br>
            </div>
            <div>
                <label for="secretario">SECRETARIO:</label><br>
                <input type="text" class="kj6" id="secretario" value="<?php echo htmlspecialchars($_SESSION['Nombre']); ?>" readonly>
                <input type="hidden" name="secretario_nombre" value="<?php echo htmlspecialchars($_SESSION['Nombre']); ?>">
                <br><br>
            </div>
            <div>
                <label for="grado">GRADO:</label><br>
                <select name="caja5" class="caja1" required>
                    <option value="0">-- Seleccione Grado --</option>
                    <?php
                    $consultaGrados = "SELECT * FROM grado";
                    $resultadoGrados = mysqli_query($conexion, $consultaGrados);
                    while ($fila = mysqli_fetch_assoc($resultadoGrados)) {
                        echo "<option value='".$fila['IdGrado']."'>".$fila['Nombre']." ".$fila['Curso']."</option>";
                    }
                    ?>
                </select>
                <br><br>
            </div>
            <div>
                <label for="estudiante">ESTUDIANTE:</label><br>
                <?php
                if (isset($_GET['MATRICULAR'])) {
                    $id_estudiante = intval($_GET['MATRICULAR']);
                    $consultaEstudiante = "SELECT * FROM estudiante WHERE IdEstudiante='$id_estudiante'";
                    $resultadoEstudiante = mysqli_query($conexion, $consultaEstudiante);
                    $filaEstudiante = mysqli_fetch_assoc($resultadoEstudiante);
                    $nombre_estudiante = $filaEstudiante['Nombre'] . ' ' . $filaEstudiante['Apellido'];
                }
                ?>
                <input type="text" class="kj6" value="<?php echo isset($nombre_estudiante) ? htmlspecialchars($nombre_estudiante) : ''; ?>" readonly>
                <input type="hidden" name="caja6" value="<?php echo isset($id_estudiante) ? $id_estudiante : ''; ?>">
                <br><br>
            </div>

            <button type="submit" class="kj7" name="ENVIAR">MATRICULAR</button>
        </div>
    </form>

    <?php
    if (isset($_POST['ENVIAR'])) {
        $FECHAI = $_POST['caja1'];
        $FECHAF = $_POST['caja2'];
        $DOCUMENTOS = isset($_FILES['caja3']) ? $_FILES['caja3'] : null;
        $SECRETARIO_NOMBRE = $_POST['secretario_nombre']; // Nombre del secretario desde el formulario
        $GRADO = intval($_POST['caja5']);
        $ESTUDIANTE_ID = intval($_POST['caja6']); // ID del estudiante recibido desde el formulario

        // Manejo de archivo subido
        if ($DOCUMENTOS && $DOCUMENTOS['error'] == 0) {
            $file_name = $DOCUMENTOS['name'];
            $file_tmp_name = $DOCUMENTOS['tmp_name'];
            $upload_dir = '../uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            $upload_file = $upload_dir . basename($file_name);
            if (move_uploaded_file($file_tmp_name, $upload_file)) {
                // Archivo subido correctamente
            } else {
                echo '<script>alert("Error al mover el archivo.");</script>';
                exit;
            }
        } else {
            echo '<script>alert("Por favor, sube un archivo válido.");</script>';
            exit;
        }

        // Insertar datos en la tabla
        $SQL = "INSERT INTO matricula (FechaInicio, FechaFin, Documentos, Secretario, Grado, Estudiante) 
                VALUES ('$FECHAI', '$FECHAF', '$upload_file', '$SECRETARIO_NOMBRE', '$GRADO', '$ESTUDIANTE_ID');";
        $RESULT = mysqli_query($conexion, $SQL);

        if ($RESULT) {
            echo '<script>alert("Matrícula insertada correctamente.");</script>';
            echo '<script>window.location.href = "Matricula.php";</script>';
        } else {
            echo '<script>alert("Error al insertar matrícula: '.mysqli_error($conexion).'");</script>';
        }
    }
    ?>
</div>
<?php INCLUDE ('../TEMPLATE/footer.php'); ?>
</body>
</html>
