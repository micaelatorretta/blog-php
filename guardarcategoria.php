<?php

if(isset($_POST)){
    require_once 'includes/conexion.php';

    $nombre= isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;

    $errores=array();

    if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/",$nombre)){
        $errores['nombre']="Introduce un nombre valido";
    }
   
    if(count($errores)==0){
        $sql="INSERT INTO categorias VALUES (null,'$nombre');";
        $guardar=mysqli_query($db,$sql);
        header("Location: index.php");
    }
    else{
        $_SESSION["errores_categoria"]=$errores;
        header("Location: crearcategoria.php");
    }

}


?>