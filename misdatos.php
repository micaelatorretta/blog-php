<?php
require_once 'includes/redireccion.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';
?>


<div class="principal">
    <h1>Mis datos</h1>

    <?php if(isset($_SESSION['completado'])): ?>
            <div class="alerta alerta-exito"> 
                <?=$_SESSION['completado']?>
            </div>
    <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-error"> 
                <?=$_SESSION['errores']['general']?>
            </div>
    <?php endif; ?>

    <form action="./acciones/actualizardatos.php" method="POST">

        <label for="nombre">Nombre</label>
        <input type="text" class="type-text" name="nombre" value="<?=$_SESSION['usuario']['nombre']?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'nombre') : ''; ?>

        <label for="apellido">Apellido</label>
        <input type="text" class="type-text" name="apellido" value="<?=$_SESSION['usuario']['apellidos']?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'apellido') : ''; ?>

        <label for="email">Email</label>
        <input type="email" class="type-text" name="email" value="<?=$_SESSION['usuario']['email']?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'email') : ''; ?>

        <input type="submit" class="submit-button" name="submit" value="Actualizar"/>
    </form>
    <?php borrarErrores(); ?>

</div>

<?php require_once 'includes/footer.php' ?>