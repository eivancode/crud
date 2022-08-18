<?php require_once 'views/layout/cabecera.php'; ?>

<div class="container">
    <h5>Filtros de búsqueda</h4>
        <form action="" method="POST">
            <div class="row">
                <div class="col mb-4">
                    <input type="text" class="form-control" id="searchId" placeholder="Id">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="searchName" placeholder="Nombre">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="searchDescription" placeholder="Descripción">
                </div>
                <div class="col">
                    <button class="btn btn-info" id="clear" style="margin: 5px">Limpiar</button>
                    <button class="btn btn-success" id="search" style="margin: 5px">Buscar</button>
                </div>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="col-md-5">
                <form method="POST" enctype="multipart/form-data" id="task-form">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="name" id="name" placeholder="Proyecto" class="form-control" style="margin-bottom: 5px;">
                        <input type="file" style="margin-bottom: 5px;" name="image" id="image">
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Descripción"></textarea>
                        <input class="btn btn-success" type="submit" id="send" style="float: right; margin-top: 5px" value="Enviar proyecto">
                        <input hidden class="btn btn-success" type="submit" id="update" style="float: right; margin-top: 5px" value="Actualizar proyecto">

                    </div>
                </form>
                <div id="">
                    <button class="btn btn-info showList">Ver registros</button>
                </div>
            </div>

            <div class="col-md-7">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Imagen</td>
                            <td>Descripción</td>
                            <td>Acción</td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
</div>
<?php include("views/layout/pie.php"); ?>