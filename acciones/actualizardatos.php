<?php


if(isset($_POST)){

    require_once '../includes/conexion.php';

    $nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
    $apellido=isset($_POST['apellido']) ? mysqli_real_escape_string($db,$_POST['apellido']) : false ;
    $email=isset($_POST['email']) ? mysqli_real_escape_string($db,TRIM($_POST['email'])) : false ;
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

$guardar_usuario=false;
if(count($errores)==0){
    $usuario=$_SESSION['usuario'];
    $guardar_usuario=true;
    
    //comprobar si el email no existe
    $sql="SELECT id, email FROM usuarios where email='$email'";
    $isset_email=mysqli_query($db,$sql);
    $isset_user=mysqli_fetch_assoc($isset_email);

    if($isset_user['id']==$usuario['id'] || empty($isset_user)){
        //actualizar usuario en la tabla de usuarios
        
        $sql="UPDATE usuarios SET ".
                "nombre='$nombre', ".
                "apellidos='$apellido', ".
                "email='$email' ".
                "WHERE id=".$usuario['id'].";";

        $guardar=mysqli_query($db,$sql);

        if($guardar){
            $_SESSION['usuario']['nombre']=$nombre;
            $_SESSION['usuario']['apellidos']=$apellido;
            $_SESSION['usuario']['email']=$email;
            $_SESSION['completado']="Datos actualizados correctamente!";
        }
        else{
            $_SESSION['errores']['general']="Fallo al alctualizar";
        }
    }else{
        $_SESSION['errores']['general']="El email ya existe";
    }
}
else{
    $_SESSION['errores']=$errores;
}

header('Location: ../misdatos.php'); 

?>