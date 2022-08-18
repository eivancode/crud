<?php
include_once 'model/conexion.php';

if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_FILES['image']['name'])) {
    $nombre = $_POST['name'];
    $imagen = $_FILES['image']['name'];
    $renameImg = time().$imagen;
    move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $renameImg);
    $descripcion = $_POST['description'];
    $query = "INSERT INTO proyectos(nombre, imagen, descripcion) VALUES ('$nombre', '$renameImg', '$descripcion')";
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        die('Error' . mysqli_error($conexion));
    }
}
