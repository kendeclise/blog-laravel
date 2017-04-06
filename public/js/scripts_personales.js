$(function() {
    /***********************************************************************************************
     * ELIMINANDO LAS ALERTAS LUEGO DE CIERTO TIEMPO DE INVOCADAS (3000 MILISEGUNDOS)
     ***********************************************************************************************/
    //Elimina el mensaje de alerta en un determinado tiempo (3segundos) Cada vez que inicia la página.
    $('.mensaje-flash').not('.alert-important').delay(3000).fadeOut(350);


    /***********************************************************************************************
     * ELIMINANDO USUARIOS, USANDO AJAX
     ***********************************************************************************************/


    //Buscamos la clase btn btn-danger ->  eliminar-usuario
    $('.eliminar-usuario').click(function(e){
        //Obtenemos la fila padre:
        var filaPadre = $(this).parents('tr');
        //Una vez capturado el padre(que es la fila) sacamos su data-id(para ello buscamos su id con jquery)
        var id = filaPadre.data('id');
        //Buscamos el form que creamos para que se encargue del delete, y luego reemplazamos el placeholder que le pusimos por el id respectivo
        //para ello buscamos su atributo action que es el que invoca al url que ejecutará su acción
        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID',id);

        //Creamos una variable que nos da los datos del form serializados (Nos arroja el method y el token)
        var dataForm = form.serialize();



        //adicional, si quisiera bloquear por aca la redirección de alguna página uso el parámetro enviado en mi función click y llamo al método preventdefault
        e.preventDefault();

        //Preguntamos si queremos eliminar al usuario
        if( confirm("Realmente desea eliminar al usuario \""+filaPadre.data('nombre')+"\"") ){

            //Antes de enviar la petición para borrar,desvanecemos la filaPadre para que no se muestre)
            filaPadre.fadeOut();//Si deseo lo pongo dentro de la petición ajax(si hay usuarios que podrían no ser eliminados)

            //Usamos el método POST de jquery (ajax)
            $.post(url,dataForm,function(respuesta){//Primer parámetro la url que se llamará,segundo parámetro los datos, y como tercer parámetro la función callback que se llamará luego de que se proceso exitosamente los datos
                //Muestro el mensaje, reemplazo mi placeholder
                $('.mensaje-eliminar > span').text(respuesta.mensaje);
                $('.mensaje-eliminar').removeClass('hidden');
                $('.mensaje-eliminar').addClass('mensaje-flash');
                //Lo oculto luego de un tiempo
                $('.mensaje-flash').not('.alert-important').delay(3000).fadeOut(350);
                $('.mensaje-eliminar').removeClass('mensaje-flash');

            }).fail(function(){//Se puede concatenar este metodo fail para ejecutar otra función en caso halla errores
                alert("El usuario no pudo ser eliminado");
                filaPadre.show();
            });

        }

    });


    /***********************************************************************************************
     * VALIDACIONES, REGISTRO DE USUARIO, "EL NOMBRE DE LA PERSONA YA ESTÁ REGISTRADO"
     ***********************************************************************************************/

    $('#nombre-registrar-usuario').blur(function(){//Cuando se va el foco del campo txt Nombre del formulario registrar usuario, invoco el siguiente método


        var nombreUsuario = $('#nombre-registrar-usuario').val();

        var form = $('#form-existe-usuario');
        var url = form.attr('action').replace(':USER_NAME',nombreUsuario);

        //ajax
        $.get(url,function(respuesta){
            if(respuesta){//Si el usuario existe
                $('#texto-usuario-ya-registrado').removeClass('hidden');

            }else{
                $('#texto-usuario-ya-registrado').removeClass('hidden');
                $('#texto-usuario-ya-registrado').addClass('hidden');
            }
        });



    });

    /***********************************************************************************************
     * VALIDACIONES, REGISTRO DE USUARIO, "EL CORREO DE LA PERSONA YA ESTÁ REGISTRADA
     ***********************************************************************************************/

    $('#email-registrar-usuario').blur(function(){//Cuando se va el foco del campo txt Nombre del formulario registrar usuario, invoco el siguiente método


        var emailUsuario = $('#email-registrar-usuario').val();

        var form = $('#form-existe-email');
        var url = form.attr('action').replace(':USER_EMAIL',emailUsuario);

        //ajax
        $.get(url,function(respuesta){
            if(respuesta){//Si el correo ya existe
                $('#texto-email-ya-registrado').removeClass('hidden');

            }else{
                $('#texto-email-ya-registrado').removeClass('hidden');
                $('#texto-email-ya-registrado').addClass('hidden');
            }
        });





    });

    /***********************************************************************************************
     * VALIDACIONES, DETECTA QUE EL PASSWORD y RE-PASSWORD SEAN IGUALES
     ***********************************************************************************************/
    $('#password').blur(function(){//Cuando se va el foco de la caja de texto password ejecuta la acción
        var password = $('#password').val();
        var re_password = $('#re-password').val();

        if(password.length != 0 && re_password != 0){
            if(password == re_password){
                $('#texto-password-igual').removeClass('hidden');
                $('#texto-password-igual').addClass('hidden');

            }else{
                $('#texto-password-igual').removeClass('hidden');

            }
        }


    });

    $('#re-password').blur(function(){//Cuando se va el foco de la caja de texto password ejecuta la acción
        var password = $('#password').val();
        var re_password = $('#re-password').val();

        if(password.length != 0 && re_password != 0){
            if(password == re_password){
                $('#texto-password-igual').removeClass('hidden');
                $('#texto-password-igual').addClass('hidden');

            }else{
                $('#texto-password-igual').removeClass('hidden');

            }
        }


    });

});





