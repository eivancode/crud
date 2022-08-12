<?php
include_once 'model/conexion.php';

if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_FILES['image'])) {
    $id = $_POST['id'];
    $nombre = $_POST['name'];
    $imagen = $_FILES['image']['name'];
    $descripcion = $_POST['description'];

    //move_uploaded_file($_FILES['image']['tmp_name'], 'images/' .time(). $imagen);
    $query = "UPDATE proyectos SET nombre = '$nombre', descripcion = '$descripcion', imagen = '$imagen' WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);
    if (!$resultado) {
        die('Error' . mysqli_error($conexion));
    }
}
