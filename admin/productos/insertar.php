<?php
include('../../includes/db.php'); // Incluir la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_producto = $_POST["nombre_producto"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];

    // Insertar el nuevo producto
    $sql = "INSERT INTO productos (nombre_producto, precio, cantidad) 
            VALUES ('$nombre_producto', '$precio', '$cantidad')";

    if (mysqli_query($conn, $sql)) {
        echo "Producto agregado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
        <!-- Agregar el archivo de estilo global -->
        <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Agregar Producto</h2>
        <form method="POST" action="insertar.php">
            <label for="nombre_producto">Nombre del Producto: </label>
            <input type="text" name="nombre_producto" required><br>
            
            <label for="precio">Precio: </label>
            <input type="text" name="precio" required><br>
            
            <label for="cantidad">Cantidad: </label>
            <input type="number" name="cantidad" required><br>
            
            <button type="submit">Agregar Producto</button>
        </form>
        <a href="../dashboard.php" class="btn">Regresar al Dashboard</a>
    </div>
</body>
</html>

