<?php
include('../includes/db.php'); // Incluir la conexión a la base de datos

if (isset($_POST['exportar_productos'])) {
    $sql_productos = "SELECT id_producto, nombre_producto, precio, cantidad FROM productos";
    $result_productos = mysqli_query($conn, $sql_productos);

    // Crear archivo CSV
    $filename = "productos_" . date("Y-m-d") . ".csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $output = fopen('php://output', 'w');
    // Escribir el encabezado de la tabla
    fputcsv($output, ['ID', 'Nombre', 'Precio', 'Cantidad']);

    // Escribir los datos de los productos
    while ($producto = mysqli_fetch_assoc($result_productos)) {
        fputcsv($output, $producto);
    }

    fclose($output);
    exit();
}

if (isset($_POST['exportar_boletas'])) {
    $sql_boletas = "SELECT id_boleta, cantidad, total, fecha_compra FROM boletas";
    $result_boletas = mysqli_query($conn, $sql_boletas);

    // Crear archivo CSV
    $filename = "boletas_" . date("Y-m-d") . ".csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $output = fopen('php://output', 'w');
    // Escribir el encabezado de la tabla
    fputcsv($output, ['ID Boleta', 'Cantidad', 'Total', 'Fecha']);

    // Escribir los datos de las boletas
    while ($boleta = mysqli_fetch_assoc($result_boletas)) {
        fputcsv($output, $boleta);
    }

    fclose($output);
    exit();
}
?>
