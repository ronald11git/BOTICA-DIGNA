<?php
session_start();
include('../includes/db.php'); // Incluir la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    // Consulta para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION["usuario"] = $usuario; // Almacenar sesión
        header("Location: dashboard.php"); // Redirigir al dashboard
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="login-background">
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required><br>
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" required><br>
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
