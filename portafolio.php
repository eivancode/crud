<?php require_once 'views/layout/cabecera.php'; ?>
<!--SEARCH-->

<div class="container"> 
    <div class="search">
    <div class="row">
       <h5>Fitlros de búsqueda</h4>
        <div class="col-md-2">
            <input type="text" id="sid" placeholder="Id" data-index="2">
        </div>
        <div class="col-md-2">
            <input type="text" id="sname" placeholder="Nombre">
        </div>
        <div class="col-md-2">
            <input type="text" id="sdescrip" placeholder="Descripción">
        </div>
        <div class="col-md-7">
            <button class="btn btn-success" style="float: right; margin: 5px">Buscar</button>
            <button class="btn btn-danger" style="float: right; margin: 5px">Limpiar</button>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <form method="POST" enctype="multipart/form-data" id="task-form">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <input type="text" name="name" id="name" placeholder="Proyecto" class="form-control" style="margin-bottom: 5px;">
                </div>
                <div class="form-group">
                    <input type="file" style="margin-bottom: 5px;" name="image" id="image">
                </div>
                <div class="form-group">
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Descripción"></textarea>
                </div>
                <input class="btn btn-success" type="submit" style="float: right; margin-top: 5px" value="Enviar proyecto">
            </form>
        </div>

        <div class="col-md-7">
            <table class="cell-border compact hover" style="width: 100%;" id="table">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Nombre</td>
                        <td>Imagen</td>
                        <td>Descripción</td>
                        <td>Acción</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="name" id="editName" placeholder="Proyecto" class="form-control" style="margin-bottom: 5px;">
                    <input type="file" style="margin-bottom: 5px;" name="image" id="image">
                    <textarea name="description" id="editDescription" cols="30" rows="10" class="form-control" placeholder="Descripción"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("views/layout/pie.php"); ?>