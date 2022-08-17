<?php
include_once 'model/conexion.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = mysqli_query($conexion, "SELECT * FROM proyectos WHERE id = $id");
    $getData = mysqli_fetch_assoc($query);
    
    if($getData){
        unlink('images/'.$getData['imagen']);
        $query = mysqli_query($conexion, "DELETE FROM proyectos WHERE id = $id");
        $delete = mysqli_fetch_assoc($query);
    }

    if(!$getData){
        die('Error'.mysqli_error($conexion));
    }
}
