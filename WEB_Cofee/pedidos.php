<?php
include 'db.php';

$sql = "SELECT p.id, c.nombre AS categoria, p.nombre_producto, p.descripcion, p.precio, p.imagen, p.opciones_personalizacion
        FROM pedidos p
        LEFT JOIN categorias c ON p.categoria_id = c.id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cafetería Innovadora - Pedidos</title>
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
    
    <header class="animate__animated animate__fadeInDown">
       <h1><i class="fas fa-receipt"></i> Lista de Pedidos</h1>
    </header>
    <section class="animate__animated animate__fadeInUp">
       <table>
          <thead>
             <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Nombre del Producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Opciones de Personalización</th>
             </tr>
          </thead>
          <tbody>
             <?php
             if ($result && $result->num_rows > 0) {
                 while ($row = $result->fetch_assoc()) {
                     echo "<tr>";
                     echo "<td>" . $row['id'] . "</td>";
                     echo "<td>" . $row['categoria'] . "</td>";
                     echo "<td>" . $row['nombre_producto'] . "</td>";
                     echo "<td>" . $row['descripcion'] . "</td>";
                     echo "<td>$" . number_format($row['precio'], 2) . "</td>";
                     
                     echo "<td>";
                     if ($row['imagen']) {
                         echo "<img src='" . $row['imagen'] . "' alt='Imagen del producto'>";
                     } else {
                         echo "<i class='fas fa-image'></i> Sin imagen";
                     }
                     echo "</td>";
                     
                     echo "<td>" . $row['opciones_personalizacion'] . "</td>";
                     echo "</tr>";
                 }
             } else {
                 echo "<tr><td colspan='7'>No se encontraron pedidos</td></tr>";
             }
             ?>
          </tbody>
       </table>
    </section>
    <footer class="animate__animated animate__fadeInUp">
       <p>&copy; 2025 Cafetería Innovadora. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

