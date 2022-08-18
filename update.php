<?php
include_once 'model/conexion.php';

$id = $_POST['id'];
$query = mysqli_query($conexion, "SELECT imagen FROM proyectos WHERE id = $id");
$getData = mysqli_fetch_assoc($query);

if (!empty($_POST['name']) && !empty($_POST['description']) && empty($_FILES['image']['name'])) {
    $nombre = $_POST['name'];
    $imagen = $getData['imagen'];
    $descripcion = $_POST['description'];
    $query = mysqli_query($conexion,"UPDATE proyectos SET nombre = '$nombre', imagen = '$imagen', descripcion = '$descripcion' WHERE id = '$id'");
}

if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_FILES['image']['name'])) {
    $nombre = $_POST['name'];
    $imagen = $_FILES['image']['name'];
    $renameImg = time() . $imagen;
    move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $renameImg);
    $descripcion = $_POST['description'];
    $query = mysqli_query($conexion,"UPDATE proyectos SET nombre = '$nombre', imagen = '$renameImg', descripcion = '$descripcion' WHERE id = '$id'");
    unlink('images/' . $getData['imagen']);
}


if (!$resultado) {
    die('Error' . mysqli_error($conexion));
}
