<?php require_once 'includes/cabecera.php'; ?>
<?php require_once'includes/lateral.php'; ?>

<?php
    if(!isset($_POST['busqueda'])){
        header ("Location: index.php");
    }
    

?>




<!---Caja Principal--->
<div class="principal">

     <h1>Busqueda: <?=$_POST['busqueda']?></h1>

        <?php
            $busqueda=conseguirEntradas($db,null, null, $_POST['busqueda']);
            if(!empty($busqueda)) :
                while($entrada=mysqli_fetch_assoc($busqueda)) :
                    
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
            <div class="alerta">Aún no se agregaron entradas para esta busqueda</div>
        <?php endif; ?>

</div>

        
<?php require_once 'includes/footer.php' ?>