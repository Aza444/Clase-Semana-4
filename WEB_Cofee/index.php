<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cafetería Don PHP - Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            text-align: center; /* Centra el texto en todo el body */
            color: white; /* Cambia el color del texto a blanco */
            background-color: #2c3e50; /* Agrega un fondo oscuro para resaltar el texto blanco */
        }

        h1, h2 {
            color: white; /* Cambia el color del encabezado */
        }

        ul {
            list-style-type: none; /* Elimina los puntos de la lista */
            padding: 0;
        }

        li {
            color: white; /* Cambia el color de los nombres de los desarrolladores */
        }

        nav a {
            color: white; /* Cambia el color del enlace */
            text-decoration: none; /* Elimina el subrayado del enlace */
            padding: 10px 20px;
            background-color:rgb(27, 201, 94); /* Añade un fondo azul al botón */
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #3498db; /* Cambia el color al pasar el ratón por encima */
        }
    </style>
</head>
<body>
    <header class="animate__animated animate__fadeInDown">
       <h1><i class="fas fa-mug-hot"></i> Cafetería Don PHP</h1>
    </header>
    <section class="animate__animated animate__fadeInUp">
       <h2><i class="fas fa-users"></i> Datos de los Desarrolladores</h2>
       <ul>
          <li><i class="fas fa-user"></i>Azarias Martinez</li>
          <li><i class="fas fa-user"></i> David Gomez</li>
       </ul>
       <nav>
          <a href="principal.php" class="animate__animated animate__pulse animate__infinite"><i class="fas fa-utensils"></i> Realizar Orden</a>
       </nav>
    </section>
    <footer class="animate__animated animate__fadeInUp">
       <p>&copy; 2025 Cafetería Don PHP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
