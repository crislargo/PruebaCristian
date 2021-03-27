$(document).ready(function () {
    $('#formulario').validate({

        rules: {
            fullname: {
                required: true,
            },
            email: {
                required: true,
            },
            area: {
                required: true,
            },
            descripcion: {
                required: true,
            },
        },
        messages: {
            fullname: {
                required: "Ingrese Nombre Completo",
            },
            email: {
                required: "Ingrese Correo Electronico",
            },
            area: {
                required: "Seleccione una opción de Área",
            },
            descripcion: {
                required: "Ingrese experiencia laboral",
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function (response) {

                    if(response.error==true){
                        Swal.fire(
                            'Error',
                            response.msg,
                            'error'
                        )
                    }else{
                        Swal.fire(
                            'Exitoso',
                            response.msg,
                            'success'
                        );
                        $("#formulario")[0].reset();
                    }
                }
            });
        }
    });


    $('#formularioedit').validate({

        rules: {
            fullname: {
                required: true,
            },
            email: {
                required: true,
            },
            area: {
                required: true,
            },
            descripcion: {
                required: true,
            },
        },
        messages: {
            fullname: {
                required: "Ingrese Nombre Completo",
            },
            email: {
                required: "Ingrese Correo Electronico",
            },
            area: {
                required: "Seleccione una opción de Área",
            },
            descripcion: {
                required: "Ingrese experiencia laboral",
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function (response) {

                    if(response.error==true){
                        Swal.fire(
                            'Error',
                            response.msg,
                            'error'
                        )
                    }else{
                        Swal.fire(
                            'Exitoso',
                            response.msg,
                            'success'
                        );
                        $("#formulario")[0].reset();
                    }
                }
            });
        }
    });



});
function eliminar(id,url){
    $.ajax({
        url: url,
        type: 'GET',
        data: {id:id},
        success: function (response) {

            if(response.error==true){
                Swal.fire(
                    'Error',
                    response.msg,
                    'error'
                )
            }else{
                Swal.fire(
                    'Exitoso',
                    response.msg,
                    'success'
                );
                setTimeout(actulizar,2000)

            }
        }
    });
}

function actulizar(){
    location.reload();
}
