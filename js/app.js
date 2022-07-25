
$(document).ready(function () {
    let edit = false;
    let dataTable = $('#table').DataTable({
        "ajax": {
            "url": "list.php",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "image" },
            { "data": "description" },
            { "defaultContent": "<button class='btn btn-success btn-sm btnEdit'><span class='material-icons'>edit</span></button><button class='btn btn-danger btn-sm' id='btnDelete'><span class='material-icons'>delete</span></button>" }
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

    /*AÑADIR REGISTRO*/
    $('#task-form').submit(function (e) {
        const postData = {
            id: $('#id').val(),
            name: $('#name').val(),
            image: $('#image').html(),
            description: $('#description').val()
        };
        let url = edit === false ? 'add.php' : 'update.php';
        console.log(postData)
        $.post(url, postData, function (response) {
            if(($('#name').val() == '') || ($('#description').val() == '')){
            swal("¡FALTAN CAMPOS POR RELLENAR!", {
                icon: "error",
            });
        }else{
            swal("¡REGISTRO AGREGADO!", {
                icon: "success",
            });
            $('#task-form').trigger('reset'); // LIMPIA FORMULARIO
        }
        edit = false;
        dataTable.ajax.reload();
        });
        e.preventDefault(); //EVITA REFRESH
    }); 

    /*RELLENA DATOS EN FORMULARIO*/
    $(document).on('click', '.btnEdit', function () {
        let id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        console.log(id)
        //$('#editModal').modal('show');
        $.post('edit.php', { id }, function (response) {
            const task = JSON.parse(response);
            console.log(task);
            $('#id').val(id),
            $('#name').val(task.nombre);
            $('#description').val(task.descripcion);
            edit = true;
        }); 
    });

    /*ELIMINAR REGISTROS*/
    $(document).on("click", "#btnDelete", function () {
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