<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
<?php
    $entradaActual=conseguirEntrada($db,$_GET['id']);
    
    if(!isset($entradaActual['id'])){
        header ("Location: index.php");
    }
?>
    <div class="principal">
    <h1>Editar Entrada</h1>
    <h2><?=$entradaActual['titulo']?></h2>

    
    <form action="guardarentrada.php?editar=<?=$entradaActual['id']?>" method="POST">
        
        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php 
                $categorias=conseguirCategorias($db); 
                if(!empty($categorias)) : 
            ?>
                    <option disabled selected>Selecciona una opción</option>
            <?php    while($categoria=mysqli_fetch_assoc($categorias)) : 
            ?>
                        <option value="<?=$categoria['id']?>" <?=($categoria['id']==$entradaActual['categoria_id']) ? 'selected="selected"' : '' ?>>
                                <?=$categoria['nombre']?>
                        </option>
            <?php 
                    endwhile;
                endif; 
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'],'categoria') : ''; ?>

        <label for="titulo">Titulo</label>
        <input type="text" class="type-text titulo" name="titulo" value="<?=$entradaActual['titulo']?>"/>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'],'titulo') : ''; ?>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" class="textarea"><?=$entradaActual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'],'descripcion') : ''; ?>

        <input type="submit" class="submit-button" value="Guardar">
    </form>
    <?php borrarErrores(); ?>
</div>
?>

<?php require_once 'includes/footer.php' ?>