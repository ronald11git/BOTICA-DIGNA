<?php
include('../../includes/db.php'); // Incluir la conexión a la base de datos

// Comprobamos si se ha enviado un ID de producto
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];
    // Obtener los datos del producto a actualizar
    $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
    $result = mysqli_query($conn, $sql);
    $producto = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto = $_POST["id_producto"];
    $nombre_producto = $_POST["nombre_producto"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];

    // Actualizar el producto en la base de datos
    $sql = "UPDATE productos SET nombre_producto = '$nombre_producto', precio = '$precio', cantidad = '$cantidad' WHERE id_producto = '$id_producto'";

    if (mysqli_query($conn, $sql)) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Obtener todos los productos disponibles para seleccionar
$sql_productos = "SELECT id_producto, nombre_producto FROM productos";
$result_productos = mysqli_query($conn, $sql_productos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
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

        .form-container select, .form-container input, .form-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #0056b3;
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
        <h2>Actualizar Producto</h2>
        <form method="POST" action="actualizar.php">
            <label for="producto">Seleccione un Producto para Actualizar: </label>
            <select name="id_producto" required>
                <option value="">Seleccione</option>
                <?php
                    while ($producto_select = mysqli_fetch_assoc($result_productos)) {
                        $selected = ($producto_select['id_producto'] == $producto['id_producto']) ? 'selected' : '';
                        echo "<option value='" . $producto_select['id_producto'] . "' $selected>" . $producto_select['nombre_producto'] . "</option>";
                    }
                ?>
            </select>

            <label for="nombre_producto">Nombre del Producto: </label>
            <input type="text" name="nombre_producto" value="<?php echo $producto['nombre_producto']; ?>" required><br>
            
            <label for="precio">Precio: </label>
            <input type="text" name="precio" value="<?php echo $producto['precio']; ?>" required><br>
            
            <label for="cantidad">Cantidad: </label>
            <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required><br>
            
            <button type="submit">Actualizar Producto</button>
        </form>
        <a href="../dashboard.php" class="btn">Regresar al Dashboard</a>
    </div>
</body>
</html>

