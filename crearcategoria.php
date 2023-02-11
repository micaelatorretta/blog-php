<?php
require_once 'includes/redireccion.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';
?>

<div class="principal">
    <h1>Crear Categoría</h1>
    <p>Añade nuevas categorias al blog para que los usuarios puedan usarlas al crear sus entradas.</p>
    <br>
    <form action="guardarcategoria.php" method="POST">
        <label for="nombre">Nombre de la Categoría</label>
        <input type="text" class="type-text" name="nombre"/>
        <?php echo isset($_SESSION['errores_categoria']) ? mostrarErrores($_SESSION['errores_categoria'],'nombre') : ''; ?>

        <input type="submit" class="submit-button" value="Guardar">
    </form>
    <?php borrarErrores(); ?>

</div>

<?php require_once 'includes/footer.php' ?>