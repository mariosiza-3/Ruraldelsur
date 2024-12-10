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
<div class="kj1">
    <h1 class="kj2">Insertar Noticia</h1>
</div>
<div class="kj3">
    <form name="INSERT" action="InsertarNotica.php" method="POST" enctype="multipart/form-data" >
        <div class="kj4">
            
            <div class="kj5">
                <label for="fecha">INFORMACION:</label><br>
                <input type="text" class="kj6" id="fecha" name="caja1" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">CREDITO:</label><br>
                <input type="text" class="kj6" id="fecha" name="caja2" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">FECHA PUBLICACION:</label><br>
                <input type="date" class="kj6" id="fecha" name="caja3" required><br><br>
            </div>
            <DIV>
                <label for="nombre">PUBLICADOR:
                <select name="caja4" class="caja1" required>
                    <option value="0">-- Seleccione Publicador --</option>
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
                </DIV>


            <button type="submit" class="kj7" name="ENVIAR">REGISTRAR</button>
        </div>
    </form>

    <?php
    if (isset($_POST['ENVIAR'])) {
        // Validación de campos seleccionados
        $INFORMACION = $_POST['caja1'];
        $CREDITO = $_POST['caja2'];
        $FECHAP = $_POST['caja3'];
        $PUBLICADOR = $_POST['caja4'];


            $SQL = "INSERT INTO noticia (Informacion, Credito, FechaPublicacion, Publicador) VALUES ('$INFORMACION', '$CREDITO', '$FECHAP', '$PUBLICADOR');";
            $RESULT = mysqli_query($conexion, $SQL) or die(mysqli_error($conexion));

            echo '<script>alert("Noticia Insertado");</script>';
            echo '<script>window.location.href = "Noticia.php";</script>';
        }
    ?>
</div>

    </div>
<?php INCLUDE ('../TEMPLATE/footer.php');?>
