<?//php require_once 'includes/conexion.php'; ?>
<?//php require_once'includes/helpers.php'; ?>

<?php require_once 'includes/cabecera.php'; ?>
<?php require_once'includes/lateral.php'; ?>
<?php
    $categoriaActual=conseguirCategoria($db,$_GET['id']);

    if(!isset($categoriaActual['id'])){
        header ("Location: index.php");
    }
?>




<!---Caja Principal--->
<div class="principal">

     <h1><?=$categoriaActual['nombre']?></h1>

        <?php
            $entradas=conseguirEntradas($db, null, $categoriaActual['id']);
            if(!empty($entradas)) :
                while($entrada=mysqli_fetch_assoc($entradas)) :
                    
        ?>
                    <article class="entrada">
                        <a href="entrada.php?id=<?=$entrada['id']?>">
                            <h2><?=$entrada['titulo']?></h2>
                                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                                <p>
                                    <?=substr($entrada['descripcion'],0,250)."..."?>
                                </p>
                        </a>
                    </article>      
        <?php
                endwhile;
            else:
        ?>
            <div class="alerta">Aún no se agregaron entradas para esta categoria</div>
        <?php endif; ?>

</div>

        
<?php require_once 'includes/footer.php' ?>