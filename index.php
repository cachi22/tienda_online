
<!DOCTYPE html>
<html lang="es">

<head>
    <title>The clothes market</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
</head>

<body>
<header>
        <nav>
            <h1><a href="index.php">The Clothes Market</a></h1>
            <h6>It's not just clothes</h6>
            </ul>
            <ul class="menu"> 
                <li><a href="administrador.php">Administrador</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">

                <ul class="nav nav-pills">
                    <li role="presentation"><a href="filtroadidas.php">adidas</a></li>
                    <li role="presentation"><a href="filtronike.php">nike</a></li>
                    <li role="presentation"><a href="filtropuma.php">puma</a></li>
                    <li role="presentation"><a href="filtrosupreme.php">supreme</a></li>
                </ul>
                <h5 class="card-tittle">resultados (<php echo $numero; ?>) </h5>
            </div>

            <div class="card-container">
        <?php
        // Conexión a la base de datos
        $conexion = mysqli_connect("127.0.0.1", "root", "", "tienda");
        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Consulta para obtener datos de la tabla 'ropa'
        $consulta = "SELECT * FROM ropa"; 
        $datos = mysqli_query($conexion, $consulta);

        // Mostrar datos de 'ropa' en tarjetas
        while ($reg = mysqli_fetch_assoc($datos)  ) { ?>
            <div class="card">
                <img src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen']) ?>" alt="Imagen de <?php echo htmlspecialchars($reg['prenda']); ?>">
                <h3><?php echo htmlspecialchars($reg['prenda']); ?></h3>
                <p>Marca: <?php echo htmlspecialchars($reg['marca']); ?></p>
                <p>Talle: <?php echo htmlspecialchars($reg['talle']); ?></p>
                <p>Precio: $<?php echo htmlspecialchars($reg['precio']); ?></p>
                <form method="post" action="">
                    <input type="hidden" name="producto_id" value="<?php echo $reg['id']; ?>">
                    <input type="submit" value="comprar">
                </form>
            </div>
        <?php }

        // Cerrar conexión a la base de datos
        mysqli_close($conexion);
        ?>
    </div>
        <div class="panel-footer"> <a href=""></a></div>
        <!--Panek cierra-->

    </div>
</body>

</html>