<?php
include_once 'model/conexion.php';

if (!empty($_POST['name']) && !empty($_POST['description'])) {
    $nombre = $_POST['name'];
    $imagen = $_FILES['image']['name'];
    $img_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($img_tmp, 'images/' . $imagen);
    $descripcion = $_POST['description'];
    $query = "INSERT INTO proyectos(nombre, imagen, descripcion) VALUES ('$nombre', '$imagen', '$descripcion')";
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        die('Error' . mysqli_error($conexion));
    }
}
