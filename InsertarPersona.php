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
    <title>Persona</title>
</head>
<body>
<?php INCLUDE ('../TEMPLATE/header.php');?>
<?php INCLUDE ('../TEMPLATE/contenido.php');?>
<div class="kj1">
    <h1 class="kj2">Insertar Persona</h1>
</div>
<div class="kj3">
    <form name="INSERT" action="InsertarPersona.php" method="POST" enctype="multipart/form-data" >
        <div class="kj4">
            
            <div class="kj5">
                <label for="fecha">NOMBRE:</label><br>
                <input type="Text" class="kj6" id="fecha" name="caja1" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">APELLIDO:</label><br>
                <input type="text" class="kj6" id="fecha" name="caja2" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">TELEFONO:</label><br>
                <input type="text" class="kj6" id="fecha" name="caja3" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">CORREO ELECTRONICO:</label><br>
                <input type="text" class="kj6" id="fecha" name="caja4" required><br><br>
            </div>
            <div class="kj5">
                <label for="fecha">CONTRASEÑA:</label><br>
                <input type="text" class="kj6" id="fecha" name="caja7" required><br><br>
            </div>
            
            <DIV  class="kj5">
                <label for="nombre">ROL:
                <select name="caja5" class="caja1" required>
                    <option value="0">-- Seleccione Rol --</option>
                    <?php
                        $CONSULTA2 = "SELECT * FROM rol";
                        $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                        while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                            echo "<option value='".$RESPUESTA2['IdRol']."'>".$RESPUESTA2['Nombre']."</option>";
                        }
                    ?>
                </select>
                <BR><BR>
                </label>
                </DIV>
                <div class="kj5">
                    <label for="Sede">SEDE:</label>
                    <select name="caja6" class="caja1" required>
                        <option value="0">-- Seleccione la Sede --</option>
                        <?php
                            $CONSULTA2 = "SELECT * FROM institucion";
                            $EJECUTAR2 = mysqli_query($conexion, $CONSULTA2);
                            while ($RESPUESTA2 = mysqli_fetch_assoc($EJECUTAR2)) {
                                echo "<option value='".$RESPUESTA2['Nombre']."'>".$RESPUESTA2['Nombre']."</option>";
                            }
                        ?>
                    </select>
                    <BR><BR>
                    </label>
            </div>

            <button type="submit" class="kj7" name="ENVIAR">INSERTAR</button>
        </div>
    </form>

    <?php
    if (isset($_POST['ENVIAR'])) {
        // Validación de campos seleccionados
        $NOMBRE = $_POST['caja1'];
        $APELLIDO = $_POST['caja2'];
        $TELEFONO = $_POST['caja3'];
        $CORREOELECTRONICO = $_POST['caja4'];
        $CONTRASENA = $_POST['caja7'];
        $ROL = $_POST['caja5'];
        $SEDE = $_POST['caja6'];   

            $SQL = "INSERT INTO persona (Nombre, Apellido, Telefono, CorreoElectronico, Contrasena, Rol, Institucion) VALUES ('$NOMBRE', '$APELLIDO', '$TELEFONO', '$CORREOELECTRONICO', '$CONTRASENA', '$ROL', '$SEDE');";
            $RESULT = mysqli_query($conexion, $SQL) or die(mysqli_error($conexion));

            echo '<script>alert("Persona Insertada exitosamente");</script>';
            echo '<script>window.location.href = "Persona.php";</script>';
        }
    ?>
</div>
    </div>
<?php INCLUDE ('../TEMPLATE/footer.php');?>