<?php
include_once 'model/conexion.php';

$id = $_POST['id'];
$query = "SELECT * FROM proyectos WHERE id = $id";
$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die('Error' . mysqli_error($conexion));
}
//$json = array();
while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array(
        'id' => $row['id'],
        'name' => $row['nombre'],
        'image' => $row['imagen'],
        'description' => $row['descripcion']
    );
}
$jsonString = json_encode($json[0]);
echo $jsonString;
