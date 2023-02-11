<?php require_once 'includes/cabecera.php'; ?>
<?php require_once'includes/lateral.php'; ?>

<!---Caja Principal--->
<div class="principal">
     <h1>Ultimas entradas</h1>

        <?php
            $entradas=conseguirEntradas($db,true);
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
            endif;
        ?>

        <div class="ver-todas">
            <a href="entradas.php">Ver todas las entradas</a>
        </div>
            
</div>

        
        

<?php require_once 'includes/footer.php' ?>