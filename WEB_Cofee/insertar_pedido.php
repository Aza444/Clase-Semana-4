<?php
include 'db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $categoria         = $_POST['categoria'];
    $nombre_producto   = $_POST['nombre_producto'];
    $descripcion       = $_POST['descripcion'];
    $precio            = $_POST['precio'];
    $personalizacion   = $_POST['personalizacion'];
    
    $imagen_path = NULL;
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $imagen_name = time() . "_" . basename($_FILES['imagen']['name']);
        $target_file = $upload_dir . $imagen_name;
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
            $imagen_path = $target_file;
        }
    }
    
    $stmt = $conn->prepare("INSERT INTO pedidos (categoria_id, nombre_producto, descripcion, precio, imagen, opciones_personalizacion) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        $message = "<p class='error animate__animated animate__shakeX'>Error en la preparación: " . $conn->error . "</p>";
    } else {
        $stmt->bind_param("issdss", $categoria, $nombre_producto, $descripcion, $precio, $imagen_path, $personalizacion);
        if ($stmt->execute()) {
            $message = "<p class='success animate__animated animate__fadeIn'>Orden insertada correctamente. <a href='pedidos.php'>Ver Pedidos</a></p>";
        } else {
            $message = "<p class='error animate__animated animate__shakeX'>Error al insertar: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cafetería Don php - Resultado de Orden</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="main-menu">
        <ul>
            <li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="principal.php"><i class="fas fa-utensils"></i> Ordenar</a></li>
            <li><a href="pedidos.php"><i class="fas fa-receipt"></i> Pedidos</a></li>
        </ul>
    </nav>
    
    <section class="animate__animated animate__fadeInUp">
        <?php echo $message; ?>
        <p style="text-align:center;"><a href="principal.php"><i class="fas fa-arrow-left"></i> Volver a Ordenar</a></p>
    </section>
    
    <footer class="animate__animated animate__fadeInUp">
       <p>&copy; 2025 Cafetería Innovadora. Todos los derechos reservados.</p>
    </footer>
</body>
</html>


