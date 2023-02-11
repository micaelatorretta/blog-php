    <!---Barra Lateral--->
<aside class="sidebar">

<div id="login" class="bloque">
        <h3>Buscar</h3>

         <form action="acciones/buscar.php" method="POST">
            <input type="text" class="type-text" name="busqueda"/>
            <input type="submit" class="submit-button" value="buscar" title="Buscar"/>
        </form>
    </div>

    <?php if(isset($_SESSION['usuario'])) : ?>
        <div id="usuario-logueado" class="bloque">
            <h3><?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']?>!</h3>
            <!--botones-->
            <a href="crearentrada.php" class="submit-button gris">Crear entrada</a>
            <a href="crearcategoria.php" class="submit-button gris">Crear categoría</a>
            <a href="misdatos.php" class="submit-button gris">Mis datos</a>
            <a href="acciones/logout.php" class="submit-button logout">Cerrar Sesión</a>
         </div>
    <?php endif; ?>

    <?php if(!isset($_SESSION['usuario'])) : ?>
     <div id="login" class="bloque">
        <h3>Ingresar</h3>

        <?php if(isset($_SESSION['error_login'])) : ?>
            <div class="alaerta alerta-error">
                <?=$_SESSION['error_login'];?>
            </div>
        <?php endif; ?>


         <form action="acciones/login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" class="type-text" name="email" />

            <label for="contrasenia">Contraseña</label>
            <input type="password" class="type-text" name="contrasenia"/>

                <input type="submit" class="submit-button" value="entrar"/>
        </form>
    </div>

    <div id="register" class="bloque">
        <h3>Unirse</h3>

            <?php if(isset($_SESSION['completado'])): ?>
                <div class="alerta alerta-exito"> 
                    <?=$_SESSION['completado']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-error"> 
                    <?=$_SESSION['errores']['general']?>
                </div>
            <?php endif; ?>

            <form action="acciones/register.php" method="POST">

                <label for="nombre">Nombre</label>
                <input type="text" class="type-text" name="nombre" placeholder="Escribe tu nombre"/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'nombre') : ''; ?>

                <label for="apellido">Apellido</label>
                <input type="text" class="type-text" name="apellido" placeholder="Escribe tu apellido"/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'apellido') : ''; ?>

                <label for="email">Email</label>
                <input type="email" class="type-text" name="email" placeholder="Escribe tu Email"/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'email') : ''; ?>

                <label for="contrasenia">Contraseña</label>
                <input type="password" class="type-text" name="contrasenia" placeholder="Escribe tu Contraseña"/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'contrasenia') : ''; ?>

                <input type="submit" class="submit-button" name="submit" value="registrar"/>
            </form>
        <?php borrarErrores(); ?>
    </div>
    <?php endif; ?>
</aside>