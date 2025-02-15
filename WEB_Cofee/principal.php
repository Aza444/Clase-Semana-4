<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cafetería Don php - Ordenar</title>
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
       <h1><i class="fas fa-clipboard-list"></i> Realizar Orden</h1>
    </header>
    <section class="animate__animated animate__fadeInUp">
       <form action="insertar_pedido.php" method="post" enctype="multipart/form-data">
          <label for="categoria"><i class="fas fa-list"></i> Categoría:</label>
          <select name="categoria" id="categoria" required>
             <?php
             $sql = "SELECT id, nombre FROM categorias";
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()){
                     echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                 }
             } else {
                 echo "<option value=''>No hay categorías</option>";
             }
             ?>
          </select>
          
          <label for="nombre_producto"><i class="fas fa-tag"></i> Nombre del Producto:</label>
          <input type="text" id="nombre_producto" name="nombre_producto" required>

          <label for="descripcion"><i class="fas fa-info-circle"></i> Descripción breve:</label>
          <textarea id="descripcion" name="descripcion" required></textarea>
          
          <label for="precio"><i class="fas fa-dollar-sign"></i> Precio:</label>
          <input type="number" step="0.01" id="precio" name="precio" required>
          
          <label for="imagen"><i class="fas fa-image"></i> Imagen del Producto (Opcional):</label>
          <input type="file" id="imagen" name="imagen" accept="image/*">
          
          <label for="personalizacion"><i class="fas fa-sliders-h"></i> Opciones de Personalización:</label>
          <input type="text" id="personalizacion" name="personalizacion" placeholder="Ej. tipo de leche, azúcar, tamaño, extras">
          
          <input type="submit" value="Enviar Orden">
       </form>
    </section>
    <footer class="animate__animated animate__fadeInUp">
       <p>&copy; 2025 Cafetería Don php. Todos los derechos reservados.</p>
    </footer>
</body>
</html>


