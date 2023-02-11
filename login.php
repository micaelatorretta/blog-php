<?php
require_once'includes/conexion.php';

if(isset($_POST)){
    //borrar error antiguo
    if(isset($_SESSION['error_login'])){
        borrarErrores();
    }

    $email=trim($_POST['email']);
    $contrasenia=$_POST['contrasenia'];

    $sql="SELECT * FROM usuarios where email='$email'";
    $login=mysqli_query($db,$sql);

    if($login && mysqli_num_rows($login)==1){
        $usuario=mysqli_fetch_assoc($login);
        //comprobar contraseña
        $verify=password_verify($contrasenia,$usuario['password']);

        if($verify){
            //utilizar una sesion para guardar los datos del usuario logueado
            $_SESSION['usuario']=$usuario;

        }else{
            //si algo falla enviar una sesion con el fallo
            $_SESSION['error_login']="Login incorrecto";
        }
    }else{
        //mensaje de error
        $_SESSION['error_login']="Login incorrecto";
        

    }

}
header('Location: index.php');
?>