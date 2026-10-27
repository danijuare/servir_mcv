var tabla;

function init() {
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });

    $.post("../ajax/departamento.php?op=selectDepartamento", function (r) {
        $("#iddepartamento").html(r);
    });

    limpiar();
}

//limpiar
function limpiar() {
    $("#idempleado").val("");
    $("#nombres_empleado").val("");
    $("#apellidos_empleado").val("");
    $("#fecha_nacimiento_empleado").val("");
    $("#iddepartamento").val("");
}

//listar
function listar() {
    tabla = $('#tbllistado').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"i><"col-md-6"p>>',
        ajax: {
            url: '../ajax/empleado.php?op=listar',
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "bDestroy": true,
        "iDisplayLength": 5,
        "order": [[0, "desc"]]
    }).DataTable();
}

//guardar y editar
function guardaryeditar(e) {
    e.preventDefault();
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/empleado.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            datos = datos.trim();

            if (datos.includes("exito")) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Excelente!',
                    text: datos,
                    showConfirmButton: false,
                    timer: 1500
                });
                limpiar();
                listar();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: datos
                });
            }
        }
    });
}

//mostrar
function mostrar(idempleado) {
    $.post("../ajax/empleado.php?op=mostrar", { idempleado: idempleado }, function (data, status) {
        data = JSON.parse(data);

        $("#idempleado").val(data.idempleado);
        $("#nombres_empleado").val(data.nombres_empleado);
        $("#apellidos_empleado").val(data.apellidos_empleado);
        $("#fecha_nacimiento_empleado").val(data.fecha_nacimiento_empleado);
        $("#iddepartamento").val(data.iddepartamento);
    });
}

//eliminar
function eliminar(idempleado) {
    Swal.fire({
        title: '¿Está seguro de eliminar este empleado?',
        text: "¡Esta acción no se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/empleado.php?op=eliminar", { idempleado: idempleado }, function (e) {
                e = e.trim();

                if (e.includes("exito")) {
                    Swal.fire(
                        '¡Eliminado!',
                        e,
                        'success'
                    );
                    listar();
                } else {
                    Swal.fire(
                        'Error',
                        e,
                        'error'
                    );
                }
            });
        }
    });
}

init();