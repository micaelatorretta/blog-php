<?php require_once 'conexion.php';?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
    
</head>
<body>
    <!---Cabecera--->
    <header class="header">
        <!---Logo--->
        <div class="logo">
            <a href="index.php">
                Blog :)
            </a>
        </div>

        <!---Menu--->
        <nav class="nav">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>

                <?php 
                    $categorias=conseguirCategorias($db); 
                    if(!empty($categorias)) :
                        while($categoria=mysqli_fetch_assoc($categorias)) : 
                ?>
                            <li>
                                <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
                            </li>
                <?php 
                        endwhile;
                    endif; 
                ?>

                <li>
                    <a href="index.php">Sobre Mi</a>
                </li>

                <li>
                    <a href="index.php">Contacto</a>
                </li>
            </ul>

        </nav>

        <div class="clearfix"></div>
    </header>

    <div class="container"> <!---Inicion container--->