<?php
require_once 'includes/redireccion.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';
?>

<div class="principal">
    <h1>Crear Entrada</h1>
    <p>Añade nuevas entradas al blog para que los usuarios puedan informarse.</p>
    <br>
    <form action="guardarentrada.php" method="POST">
        
        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php 
                $categorias=conseguirCategorias($db); 
                if(!empty($categorias)) : 
            ?>
                    <option disabled selected>Selecciona una opción</option>
            <?php    while($categoria=mysqli_fetch_assoc($categorias)) : 
            ?>
                        <option value="<?=$categoria['id']?>">
                                <?=$categoria['nombre']?>
                        </option>
            <?php 
                    endwhile;
                endif; 
            ?>
        </select>
            </br>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'],'categoria') : ''; ?>

        <label for="titulo">Titulo</label>
        <input type="text" class="type-text titulo" name="titulo"/>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'],'titulo') : ''; ?>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" class="textarea"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'],'descripcion') : ''; ?>

        <input type="submit" class="submit-button" value="Guardar">
    </form>
    <?php borrarErrores(); ?>
</div>

<?php require_once 'includes/footer.php' ?>