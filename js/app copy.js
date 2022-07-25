/*function openImg() {
    var image = document.getElementById('image');
    var source = image.src;
    window.open(source);
}*/

$(document).ready(function () {
    //fetchTasks();
    let edit = false;
    let dataTable = $('#example').DataTable({
        "ajax": {
            "url": "list.php",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "image" },
            { "data": "description" },
            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm' id='btnEdit'><span class='material-icons'>edit</span></button><button class='btn btn-danger btn-sm' id='btnDelete'><span class='material-icons'>delete</span></button></div></div>" }
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

    /*BUSCADOR
    $('#task-result').hide();
    $('#search').keyup(function () {
        if ($('#search').val()) {
            let search = $('#search').val()
            $.ajax({
                url: 'search.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    let task = JSON.parse(response);
                    let template = '';
                    task.forEach(task => {
                        template += `<li>
                            ${task.nombre}
                        </li>`
                    });
                    $('#container').html(template);
                    $('#task-result').show();
                }
            });
        }
    }); */

    /*AÑADIR REGISTRO*/
    $('#task-form').submit(function (e) {
        const postData = {
            id: $('#taskId').val(),
            name: $('#name').val(),
            image: $('#image').val(),
            description: $('#description').val()
        };
        let url = edit === false ? 'add.php' : 'edit.php';
        $.post(url, postData, function (response) {
            edit = false;
            //fetchTasks();
            dataTable.ajax.reload();
            $('#task-form').trigger('reset'); // LIMPIA FORMULARIO
        });
        e.preventDefault(); //EVITA REFRESH
    });

    /*MUESTRA/ACTUALIZA REGISTROS*/
    /*function fetchTasks() {
        $.ajax({
            url: 'list.php',
            type: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(tasks => {
                    template += `<tr taskId="${tasks.id}">
                        <td>${tasks.id}</td>
                        <td><span class="task-item">${tasks.name}</span></td>
                        <td>${tasks.image}</td>
                        <td>${tasks.description}</td>
                        <td><button class="task-delete btn btn-danger" style="width: 100%">Eliminar</button></td>
                    </tr>`
                });
                $('#tasks').html(template);
            }
        });
    } */

    /*RELLENA DATOS EN FORMULARIO*/
    $(document).on('click', '.task-item', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        $.post('single.php', { id }, function (response) {
            const task = JSON.parse(response);
            ($('#name').val(task.nombre));
            $('#description').val(task.descripcion);
            $('#taskId').val(task.id);
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
                    //alert("Registro eliminado");
                    dataTable.ajax.reload();
                });
                swal("Registro eliminado", {
                    icon: "success",
                });
            }
        });
    });
});