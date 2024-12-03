<?php
// Array de síntomas con su información inicial y sus rutas de imagen
$sintomas = [
    ["id" => "fiebre", "nombre" => "Fiebre", "descripcion" => "Productos recomendados para fiebre.", "imagen" => "fiebre.jpg", "productos" => ["producto1.jpg", "producto2.jpg"]],
    ["id" => "dolor_cabeza", "nombre" => "Dolor de Cabeza", "descripcion" => "Productos recomendados para dolor de cabeza.", "imagen" => "dolor_cabeza.jpg", "productos" => ["producto3.jpg", "producto4.jpg"]],
    ["id" => "gripe", "nombre" => "Gripe", "descripcion" => "Productos recomendados para gripe.", "imagen" => "gripe.jpg", "productos" => ["producto5.jpg", "producto6.jpg"]],
    ["id" => "alergias", "nombre" => "Alergias", "descripcion" => "Productos recomendados para alergias.", "imagen" => "alergias.jpg", "productos" => ["producto7.jpg", "producto8.jpg"]],
    ["id" => "dolor_estomago", "nombre" => "Dolor de Estómago", "descripcion" => "Productos recomendados para dolor de estómago.", "imagen" => "estomago.jpeg", "productos" => ["producto9.jpg", "producto10.jpg"]],
    ["id" => "resfriado", "nombre" => "Resfriado", "descripcion" => "Productos recomendados para resfriado.", "imagen" => "resfriado.jpg", "productos" => ["producto11.jpg", "producto12.jpg"]],
    ["id" => "dolor_muscular", "nombre" => "Dolor Muscular", "descripcion" => "Productos recomendados para dolor muscular.", "imagen" => "dolor_muscular.jpg", "productos" => ["producto13.jpg", "producto14.jpg"]],
    ["id" => "mareos", "nombre" => "Mareos", "descripcion" => "Productos recomendados para mareos.", "imagen" => "mareos.jpg", "productos" => ["producto15.jpg", "producto16.jpg"]],
    ["id" => "tos", "nombre" => "Tos", "descripcion" => "Productos recomendados para tos.", "imagen" => "tos.jpg", "productos" => ["producto17.jpg", "producto18.jpg"]],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botica - Síntomas</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>

<header class="banner-principal">
    <img src="img/BOTICA.jpeg" alt="Banner Principal">
</header>

<div class="mini-banner">
    <p><a href="https://wa.me/941995100" target="_blank">WhatsApp: 941995100</a> | <a href="#">Facebook</a> | <a href="#">Instagram</a></p>
</div>

<!-- Navegación de los síntomas -->
<div class="navegacion">
    <?php foreach ($sintomas as $sintoma): ?>
        <div class="boton-nav" onclick="mostrarContenido('<?php echo $sintoma['id']; ?>')">
            <img src="img/<?php echo $sintoma['imagen']; ?>" alt="<?php echo $sintoma['nombre']; ?>">
            <p><?php echo $sintoma['nombre']; ?></p>
        </div>
    <?php endforeach; ?>
</div>

<!-- Secciones de contenido para cada síntoma -->
<div id="contenido" class="contenido">
    <?php foreach ($sintomas as $sintoma): ?>
        <section id="<?php echo $sintoma['id']; ?>" class="contenido-seccion">
            <h2><?php echo $sintoma['nombre']; ?></h2>
            <p><?php echo $sintoma['descripcion']; ?></p>

            <!-- Mini menú de edades -->
            <div class="mini-menu">
    <h3>Selecciona la edad:</h3>
    <button onclick="mostrarEdad('<?php echo $sintoma['id']; ?>', 'bebe')">Bebé</button>
    <button onclick="mostrarEdad('<?php echo $sintoma['id']; ?>', 'niño')">Niño</button>
    <button onclick="mostrarEdad('<?php echo $sintoma['id']; ?>', 'adolescente')">Adolescente</button>
    <button onclick="mostrarEdad('<?php echo $sintoma['id']; ?>', 'joven')">Joven</button>
    <button onclick="mostrarEdad('<?php echo $sintoma['id']; ?>', 'adulto')">Adulto</button>
    <button onclick="mostrarEdad('<?php echo $sintoma['id']; ?>', 'adulto_mayor')">Adulto de Tercera Edad</button>
</div>

            <!-- Información por edad -->
            <div id="info-<?php echo $sintoma['id']; ?>-adulto" class="info-edad">
                <p>Información para adultos sobre <?php echo $sintoma['nombre']; ?></p>
                <!-- Mostrar imágenes de productos para adulto -->
                <div class="productos">
                    <?php foreach ($sintoma['productos'] as $producto): ?>
                        <div class="producto-item">
                            <img src="img/<?php echo $producto; ?>" alt="Producto Adulto">
                            <p>Descripción del producto para adultos</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="info-<?php echo $sintoma['id']; ?>-niño" class="info-edad">
                <p>Información para niños sobre <?php echo $sintoma['nombre']; ?></p>
                <!-- Mostrar imágenes de productos para niño -->
                <div class="productos">
                    <?php foreach ($sintoma['productos'] as $producto): ?>
                        <div class="producto-item">
                            <img src="img/<?php echo $producto; ?>" alt="Producto Niño">
                            <p>Descripción del producto para niños</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="info-<?php echo $sintoma['id']; ?>-bebe" class="info-edad">
                <p>Información para bebes sobre <?php echo $sintoma['nombre']; ?></p>
                <!-- Mostrar imágenes de productos para niño -->
                <div class="productos">
                    <?php foreach ($sintoma['productos'] as $producto): ?>
                        <div class="producto-item">
                            <img src="img/productos/paracetamol_100mg.jpg"<?php echo $producto; ?>" alt="Producto Niño">
                            <p>Descripción del producto para bebes</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="info-<?php echo $sintoma['id']; ?>-joven" class="info-edad">
                <p>Información para joven sobre <?php echo $sintoma['nombre']; ?></p>
                <!-- Mostrar imágenes de productos para niño -->
                <div class="productos">
                    <?php foreach ($sintoma['productos'] as $producto): ?>
                        <div class="producto-item">
                            <img src="img/<?php echo $producto; ?>" alt="Producto Niño">
                            <p>Descripción del producto para joven</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="info-<?php echo $sintoma['id']; ?>-adolescente" class="info-edad">
                <p>Información para adolescente sobre <?php echo $sintoma['nombre']; ?></p>
                <!-- Mostrar imágenes de productos para niño -->
                <div class="productos">
                    <?php foreach ($sintoma['productos'] as $producto): ?>
                        <div class="producto-item">
                            <img src="img/<?php echo $producto; ?>" alt="Producto Niño">
                            <p>Descripción del producto para adolescente</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="info-<?php echo $sintoma['id']; ?>-adulto_mayor" class="info-edad">
                <p>Información para adulto mayor sobre <?php echo $sintoma['nombre']; ?></p>
                <!-- Mostrar imágenes de productos para niño -->
                <div class="productos">
                    <?php foreach ($sintoma['productos'] as $producto): ?>
                        <div class="producto-item">
                            <img src="img/<?php echo $producto; ?>" alt="Producto Niño">
                            <p>Descripción del producto para adulto mayor</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Botón para regresar -->
            <a href="#" class="boton-regresar" onclick="regresar()">&#8592; Regresar</a>
        </section>
    <?php endforeach; ?>
</div>

</body>
</html>
