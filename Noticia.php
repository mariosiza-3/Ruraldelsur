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
<?php INCLUDE ('../TEMPLATE/header.php'); ?>
<?php INCLUDE ('../TEMPLATE/contenido1.php'); ?>
<h2> LISTADO DE NOTICIAS </h2>
<br>
<a id="insertboton1" href="InsertarNoticia.php"> + NOTICIA </a>  
<br><br>

<form method="POST" action="Noticia.php" enctype="multipart/form-data">
    <table>
        <tr><h4>
            <td>ID NOTICIA</td>
            <td>INFORMACION</td>
            <td>CREDITO</td>
            <td>FECHA PUBLICACION</td>
            <td>PUBLICADOR</td>
            <td>ACTUALIZAR</td>
            <td>ELIMINAR</td>
        </tr>

        <?php 
        //--> PAGINADOR
        $SQL_REGISTROS = mysqli_query($conexion, "SELECT COUNT(*) AS TOTAL FROM noticia");
        $RESULT_REGISTROS = mysqli_fetch_array($SQL_REGISTROS);
        $TOTAL = $RESULT_REGISTROS['TOTAL'];
        $POR_PAGINA = 5;

        if (empty($_GET['PAGINA'])) {
            $PAGINA = 1;
        } else {
            $PAGINA = $_GET['PAGINA'];
        }

        $DESDE = ($PAGINA - 1) * $POR_PAGINA;
        $TOTAL_PAGINAS = ceil($TOTAL / $POR_PAGINA);

        $CONSULTA = "
        SELECT 
            n.IdNoticia, 
            n.Informacion, 
            n.Credito, 
            n.FechaPublicacion, 
            p.Nombre AS NombrePublicador 
        FROM 
            noticia n
        LEFT JOIN persona p ON n.Publicador = p.IdPersona
        LIMIT $DESDE, $POR_PAGINA";
    $EJECUTAR = mysqli_query($conexion, $CONSULTA);
    
    while ($FILA = mysqli_fetch_assoc($EJECUTAR)) {
        $IDNOTICIA = $FILA['IdNoticia'];
        $INFORMACION = $FILA['Informacion'];
        $CREDITO = $FILA['Credito'];
        $FECHAP = $FILA['FechaPublicacion'];
        $PUBLICADOR = $FILA['NombrePublicador'] ? $FILA['NombrePublicador'] : "No asignado";
    ?>
    
            <tr>
                <td><?php echo $IDNOTICIA; ?></td>
                <td><?php echo $INFORMACION; ?></td>
                <td><?php echo $CREDITO; ?></td>
                <td><?php echo $FECHAP; ?></td>
                <td><?php echo $PUBLICADOR; ?></td>
                <td><a href="ActualizarNoticia.php?ACTUALIZAR=<?php echo $IDNOTICIA; ?>">  
                    <img style="width: 50px;height: 50px;" src="../IMG/actualizar.png"></a>
                </td>
                <td><a href="Noticia.php?ELIMINAR=<?php echo $IDNOTICIA; ?>"> 
                    <img style="width: 50px;height: 50px;" src="../IMG/eliminar.png"></a>
                </td>
            </tr>
            <?php
        } // Fin del bucle WHILE
        ?>
    </table>
    <br>
    <div class="pagination">
    <?php 
    // Imprimir números de página
    $TOTAL_PAGINAS = ceil($TOTAL / $POR_PAGINA);
    echo "<center><a href='Noticia.php?PAGINA=1'>Primera</a> ";
    for ($i = 1; $i <= $TOTAL_PAGINAS; $i++) {
        echo "<a href='Noticia.php?PAGINA=$i'> $i </a>";
    }
    echo "<a href='Noticia.php?PAGINA=$TOTAL_PAGINAS'>Última</a></center>";
    ?>
</form>
</div>
</div>
<?php INCLUDE ('../TEMPLATE/footer.php'); ?>
