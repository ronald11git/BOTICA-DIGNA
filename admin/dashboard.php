<?php
// Incluir la conexión a la base de datos
include('../includes/db.php');

// Iniciar la sesión si aún no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está logueado, si no redirigirlo al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtener productos
$sql_productos = "SELECT id_producto, nombre_producto, precio, cantidad FROM productos";
$result_productos = mysqli_query($conn, $sql_productos);

// Obtener boletas
$sql_boletas = "SELECT id_boleta, cantidad, total, fecha_compra FROM boletas";
$result_boletas = mysqli_query($conn, $sql_boletas);

// Código para exportar a CSV
if (isset($_POST['exportar_productos'])) {
    $output = fopen("php://output", "w");
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="productos.csv"');

    // Escribir los encabezados de la tabla
    fputcsv($output, array('ID', 'Nombre', 'Precio', 'Cantidad'));

    // Escribir las filas de productos
    while ($producto = mysqli_fetch_assoc($result_productos)) {
        fputcsv($output, $producto);
    }
    fclose($output);
    exit();
}

if (isset($_POST['exportar_boletas'])) {
    $output = fopen("php://output", "w");
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="boletas.csv"');

    // Escribir los encabezados de la tabla
    fputcsv($output, array('ID Boleta', 'Cantidad', 'Total', 'Fecha'));

    // Escribir las filas de boletas
    while ($boleta = mysqli_fetch_assoc($result_boletas)) {
        fputcsv($output, $boleta);
    }
    fclose($output);
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Bienvenido al Dashboard</h1>

        <!-- Botones para navegar -->
        <div class="action-buttons">
            <a href="productos/insertar.php" class="btn">Agregar Producto</a>
            <a href="productos/actualizar.php" class="btn">Actualizar Producto</a>
            <a href="productos/eliminar.php" class="btn">Eliminar Producto</a>
            <a href="dashboard.php" class="btn">Ver Productos</a> <!-- Regresar al Dashboard -->
        </div>

        <!-- Sección de productos -->
        <h2>Productos Registrados</h2>
        <form method="POST">
            <button type="submit" name="exportar_productos">Exportar a CSV (Productos)</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($producto = mysqli_fetch_assoc($result_productos)): ?>
                <tr>
                    <td><?php echo $producto['id_producto']; ?></td>
                    <td><?php echo $producto['nombre_producto']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td><?php echo $producto['cantidad']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Sección de boletas -->
        <h2>Boletas Registradas</h2>
        <form method="POST">
            <button type="submit" name="exportar_boletas">Exportar a CSV (Boletas)</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID Boleta</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($boleta = mysqli_fetch_assoc($result_boletas)): ?>
                <tr>
                    <td><?php echo $boleta['id_boleta']; ?></td>
                    <td><?php echo $boleta['cantidad']; ?></td>
                    <td><?php echo $boleta['total']; ?></td>
                    <td><?php echo $boleta['fecha_compra']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>
S