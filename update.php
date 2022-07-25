<?php
include_once 'model/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['name'];
$descripcion = $_POST['description'];

$query = "UPDATE proyectos SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = '$id'";
$resultado = mysqli_query($conexion, $query);
if (!$resultado) {
    die('Error' . mysqli_error($conexion));
}
