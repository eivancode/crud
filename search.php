<?php
include_once 'model/conexion.php';
$search = $_POST['search'];
if(!empty($search)){
    $query = "SELECT * FROM proyectos WHERE nombre LIKE '$search%'";
    $result = mysqli_query($conexion, $query);
    if(!$result){
        die('Query Error'.mysqli_error($conexion));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'nombre' => $row['nombre']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
?>