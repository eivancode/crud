<?php require_once 'views/layout/cabecera.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card my-4">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="task-form">
                        <input type="hidden"  name="taskId" id="taskId">
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Proyecto" class="form-control">
                        </div>
                        <div class="form-group">
                            <input class="form-control my-2" type="file" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Descripción"></textarea>
                        </div>
                        <input class="btn btn-success" style="float: right; margin-top: 5px" type="submit" value="Enviar proyecto">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card" id="task-result">
                <div class="card-body">
                    <ul id="container"></ul>
                </div>
            </div>
            <table class="table table-bordered table-sm my-4">
                <thead>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Imagen</td>
                    <td>Descripción</td>
                    <td>Acción</td>
                </thead>
                <tbody id="tasks"></tbody>
            </table>
        </div>
    </div>

</div>

<?php include("views/layout/pie.php"); ?>