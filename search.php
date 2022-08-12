<?php
include_once 'model/conexion.php';

//$id = $_POST['searchId'];
$nombre = $_POST['name'];
//$descripcion = $_POST['description'];

if (!empty($id)) {
    $query = "SELECT * FROM proyectos WHERE nombre LIKE '$nombre'";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die('Query Error' . mysqli_error($conexion));
    }
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'name' => $row['nombre'],
            'image' => $row['imagen'],
            'description' => $row['descripcion']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
