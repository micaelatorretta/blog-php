<?php


if(isset($_POST)){

    require_once 'includes/conexion.php';

    if(!isset($_SESSION)){
        session_start();
    }


    $nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
    $apellido=isset($_POST['apellido']) ? mysqli_real_escape_string($db,$_POST['apellido']) : false ;
    $email=isset($_POST['email']) ? mysqli_real_escape_string($db,TRIM($_POST['email'])) : false ;
    $contrasenia=isset($_POST['contrasenia']) ? mysqli_real_escape_string($db,$_POST['contrasenia']) : false ;

}

$errores=array();

if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
    $nombreValidado=true;
    echo"nombre ok";
}
else{
    $nombreValidado=false;
    $errores['nombre']="Introduce un nombre valido";
}

if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/",$apellido)){
    $apellidoValidado=true;
    echo"apellido ok";
}
else{
    $apellidoValidado=false;
    $errores['apellido']="Introduce un apellido valido";
}

if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailValidado=true;
    echo"email ok";
}
else{
    $emailValidado=false;
    $errores['email']="Introduce un email valido";
}

if(!empty($contrasenia) ){
    $contraseniaValidado=true;
    echo"contrasenia ok";
}
else{
    $contraseniaValidado=false;
    $errores['contrasenia']="Introduce una contraseña valida";
}

$guardar_usuario=false;
if(count($errores)==0){
    $guardar_usuario=true;

    //cifrar contraseña
    $passwordSegura=password_hash($contrasenia,PASSWORD_BCRYPT,['cost'=>4]);
    
    //insertar usuario en la tabla de usuarios
    $sql="INSERT INTO usuarios VALUES (null, '$nombre', '$apellido', '$email', '$passwordSegura', CURDATE());";
    $guardar=mysqli_query($db,$sql);

    if($guardar){
        $_SESSION['completado']="registro ok";
    }
    else{
        $_SESSION['errores']['general']="fallo guardar usuario";
    }
}
else{
    $_SESSION['errores']=$errores;
}

header('Location: index.php'); 

?>