<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
<?php
    $entradaActual=conseguirEntrada($db,$_GET['id']);
    
    if(!isset($entradaActual['id'])){
        header ("Location: index.php");
    }
?>

<!---Caja Principal--->
<div class="principal">

    <h1><?=$entradaActual['titulo']?></h1>

    <a href="categoria.php?id=<?=$entradaActual['categoria_id']?>">
    <h2><?=$entradaActual['categoria']?></h2>
    </a>

    <span class="fecha"><?=$entradaActual['usuario']?> | <?=$entradaActual['fecha']?></span>
    <p>
        <?=$entradaActual['descripcion']?>
    </p>

    <?php 
        if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id']==$entradaActual['usuario_id']) :
    ?>
    </br>
        <div class="botonesEntrada">
            <a href="editarentrada.php?id=<?=$entradaActual['id']?>" class="submit-button editar">Editar</a>
            <a href="eliminarentrada.php?id=<?=$entradaActual['id']?>" class="submit-button eliminar">Eliminar</a>
        </div>
    <?php endif; ?>
</div>

        
<?php require_once 'includes/footer.php' ?>