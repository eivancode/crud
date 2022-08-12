$(document).ready(function () {
    let edit = false;
    let dataTable = $('#table').DataTable({
        "searching": false,
        "ajax": {
            "url": "list.php",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            {
                "data": "image",
                /*"render": function (data, type, row, meta) {
                    return '<center><img src="images/1660153034cats.png" style="width:100px"/></center>';

                }*/
            },
            { "data": "description" },
            { "defaultContent": "<div class='gap-1 d-md-flex justify-content-center'><button class='btn btn-success btn-sm' id ='btnEdit'><span class='material-icons'>edit</span></button > <button class='btn btn-danger btn-sm' id='btnDelete'><span class='material-icons'>delete</span></button></div>" }
        ],
        language: {
            "emptyTable": "No se encontraron datos",
            "lengthMenu": "Mostrar _MENU_ registros",
            "info": "Mostrando del _START_ al _END_. Total: _TOTAL_ entradas",
            "infoEmpty": "No hay datos para mostrar",
            "search": "Buscar:",
            "paginate": {
                "first": "Primeros",
                "last": "Ultimos",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });

    /* BUSQUEDA */
    $('#search').on('click', function (e) {
        e.preventDefault();
        //let id = $('#searchId').val()
        let name = $('#searchName').val()
        //let description = $('#searchDescription').val()
        console.log(name);

        $.ajax({
            url: 'search.php',
            type: 'POST',
            data: { name },
            success: function () {
                console.log('ok')               
                dataTable.clear().draw();
            }
            
        })
    });

    /* LIMPIAR BUSQUEDA */
    $('#clear').on('click', function (e) {
        $('#searchId').val('');
        $('#searchName').val('');
        $('#searchDescription').val('');
        dataTable.ajax.reload();
        e.preventDefault();
    })

    /* AÑADIR REGISTRO */
    $("#task-form").on("submit", function (e) {
        let action = edit === false ? 'add.php' : 'update.php';
        let formData = new FormData(document.getElementById('task-form'));

        $.ajax({
            url: action,
            type: "POST",
            dataType: "HTML",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function () {
                if (($('#name').val() == '') || $('#image').val() == '' || ($('#description').val() == '')) {
                    swal("¡FALTAN CAMPOS POR COMPLETAR!", {
                        icon: "error",
                    });
                } else {
                    swal("¡REGISTRO AGREGADO!", {
                        icon: "success",
                    });
                    edit = false; 
                    $('#task-form').trigger('reset'); // LIMPIA FORMULARIO
                }
                dataTable.ajax.reload();
                $preview = document.querySelector("#preview");
                $preview.src = "";
            });
        e.preventDefault();

    });

    /*---------------------------------------- PREVIEW IMAGEN-----------------------------------*/
    const $image = document.querySelector("#image"),
    $preview = document.querySelector("#preview");

    // Escuchar cuando cambie
    $image.addEventListener("change", () => {
        // Los archivos seleccionados, pueden ser muchos o uno
        const archivos = $image.files;
        // Si no hay archivos salimos de la función y quitamos la imagen
        if (!archivos || !archivos.length) {
            $preview.src = "";
            return;
        }
        // Ahora tomamos el primer archivo, el cual vamos a previsualizar
        //const primerArchivo = archivos[0];
        // Lo convertimos a un objeto de tipo objectURL
        const objectURL = URL.createObjectURL(archivos[0]);
        // Y a la fuente de la imagen le ponemos el objectURL
        $preview.src = objectURL;
    });
    /*------------------------------------------------------------------------------------------*/



    /* RELLENA DATOS EN FORMULARIO */
    $(document).on('click', '#btnEdit', function () {
        let id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        //console.log(id)
        //$('#editModal').modal('show');
        $.post('edit.php', { id }, function (response) {
            const task = JSON.parse(response);
            console.log(task);
            $('#id').val(id);
            $('#name').val(task.nombre);
            //$('#image').val(task.imagen);
            $('#description').val(task.descripcion);
            edit = true;
        });
    });

    /* ELIMINAR REGISTROS */
    $(document).on('click', '#btnDelete', function () {
        swal({
            title: "¿Estás seguro?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                let id = parseInt($(this).closest('tr').find('td:eq(0)').text());
                $.post('delete.php', { id }, function (response) {
                    dataTable.ajax.reload();
                });
                swal("Registro eliminado", {
                    icon: "success",
                });
            }
        });
    });
});