<?php
include_once 'model/conexion.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $query = "DELETE FROM proyectos WHERE id = $id";
    $resultado = mysqli_query($conexion, $query);
    echo('prueba');
    if(!$resultado){
        die('Error'.mysqli_error($conexion));
    }
}
