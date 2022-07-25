<?php

session_start();
if (isset($_SESSION['usuario']) != "ivan") {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/sandstone/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js
"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-black" style="margin-bottom: 20px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">TaskApp</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" style="color: white;" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="portafolio.php">Portafolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="cerrar.php">Cerrar</a>
                </li>
            </ul>
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" id="search" name="search"placeholder="Buscar proyecto">
            </form> -->
        </div>
        </div>
    </nav>