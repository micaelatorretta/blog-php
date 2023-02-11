<?php

if(isset($_POST)){
    require_once 'includes/conexion.php';

    $titulo= isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']) : false;
    $descripcion= isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']) : false;
    $categoria= isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $idUsuario=$_SESSION['usuario']['id'];

    $errores=array();

    if(empty($titulo)){
        $errores['titulo']="Introduce un titulo valido";
    }
    if(empty($descripcion)){
        $errores['descripcion']="Introduce una descripción valido";
    }
    if(empty($categoria)&& !is_numeric($categoria)){
        $errores['categoria']="Debes seleccionar una categoría";
    }


    if(count($errores)==0){

        if(isset($_GET['editar'])){
            $entradaID=$_GET['editar'];
            $sql="UPDATE entradas SET categoria_id='$categoria', titulo='$titulo', descripcion='$descripcion', fecha=curdate() ".
                "WHERE id=$entradaID AND usuario_id=$idUsuario";
        }else{
            $sql="INSERT INTO entradas VALUES (null,$idUsuario,$categoria,'$titulo','$descripcion', curdate());";
        }
        
        $guardar=mysqli_query($db,$sql);
        header("Location: index.php");
    }
    else{
        $_SESSION["errores_entrada"]=$errores;

        if(isset($_GET['editar'])){
            header("Location: editarentrada.php?id=".$_GET['editar']);
        }else{
            header("Location: crearentrada.php");
        }
        
    }

}



?>