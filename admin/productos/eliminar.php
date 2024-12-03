<?php
include('../../includes/db.php'); // Incluir la conexión a la base de datos

// Verificar si se ha enviado el ID del producto a eliminar
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM productos WHERE id_producto = '$id_producto'";
    if (mysqli_query($conn, $sql)) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conn);
    }
} else {
    echo "ID de producto no especificado.";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <style>
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            color: #333;
        }

        .form-container label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-container select, .form-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container button {
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #d32f2f;
        }

        .form-container .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .form-container .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Eliminar Producto</h2>
        <form method="GET" action="eliminar.php">
            <label for="producto">Seleccione un Producto para Eliminar: </label>
            <select name="id" required>
                <option value="">Seleccione</option>
                <?php
                    // Obtener todos los productos para mostrarlos en el select
                    $sql_productos = "SELECT id_producto, nombre_producto FROM productos";
                    $result_productos = mysqli_query($conn, $sql_productos);
                    while ($producto = mysqli_fetch_assoc($result_productos)) {
                        echo "<option value='" . $producto['id_producto'] . "'>" . $producto['nombre_producto'] . "</option>";
                    }
                ?>
            </select>
            <button type="submit">Eliminar Producto</button>
        </form>
        <a href="../dashboard.php" class="btn">Regresar al Dashboard</a>
    </div>
</body>
</html>
