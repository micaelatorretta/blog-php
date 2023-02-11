<?php
require_once 'includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    $entradaID=$_GET['id'];
    $usuarioID=$_SESSION['usuario']['id'];

    $sql="DELETE FROM entradas WHERE usuario_id=$usuarioID AND id=$entradaID";
    $borrar=mysqli_query($db,$sql);
}
 header ("location: index.php");
?>