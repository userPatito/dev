'use strict';
var precio = 0;
var hoy = new Date();
var octubre = new Date();
octubre.setFullYear(2016, 10, 31);

var totalSouvenir = 0;
var total = precio + totalSouvenir;
// Validaciones del form, y control del precio total 
$(document).ready(function(){
    $('#tallaDiv').hide();
	$('input[name=tipo]').click(function(){
		if($(this).val() == "estudiante"){
				precio = 35;
		}
		else{
			precio = 50;
		}
		total = precio + totalSouvenir;
		if(hoy < octubre){
			$('#precio').val(precio);
			$('#total').html(total);
		}
		else{
			$('#precio').val(precio + 10);
			$('#total').html(total);
		}
	});

	$('#taza').change(function(){
			if($(this).is(':checked')){
				totalSouvenir += 20;
				total = precio + totalSouvenir;
				$('#total').html(total);
			}
			else{
				totalSouvenir -= 20;
				total = precio + totalSouvenir;
				$('#total').html(total)
			}
		});
	$('#polera').change(function(){
        $('#tallaDiv').fadeToggle('slow');
			if($(this).is(':checked')){
				totalSouvenir += 39;
				total = precio + totalSouvenir;
				$('#total').html(total);              
			}
			else{
				totalSouvenir -= 39;
				total = precio + totalSouvenir;
				$('#total').html(total)
			}
	});
    // Funcion para el boton REGISTRAR, realiza la subida de datos mediante AJAX
    $('#subirRegistro').click(function(e){
            e.preventDefault();
            var $this = $('form.form-datos');
            var nombre = $('#nombre').val();
            var apat = $('#apat').val();
            var amat = $('#amat').val();
            var tel = $('#cel').val();
            var ci = $('#ci').val();
            var correo = $('#mail').val();
            var tipo = $('#tipo').val();
            var evento = $('#evento').val();
            var img = $('#img_bd').val();
            var recibo = $('#recibo').val();
            var banco = $('#banco').val();
            var nTazas = ($('#taza').prop('checked') == true) ? 1 : 0;
            var nPoleras = ($('#polera').prop('checked') == true) ? 1 : 0;
            if(recibo == '' || img == '' || banco == '' || nombre == '' || ci == '' || correo == '' || tipo == '' || evento == ''){
                swal({
                    title: 'Debe llenar todos los campos con asterisco *',
                    text: 'Inténtelo nuevamente',
                    type: 'error',
                    timer: 2500
                });
            }
            else{
                $.ajax({
                    url: $this.data('action'),
                    type: $this.attr('method'),
                    data: $this.serializeArray(),
                    success: function(resp){
                        if(resp.toString() == 'Bien hecho'){
                            // Registro realizaco con exito
                            $('#registro').modal('hide');
                            $('#img_bd').val("");
                            $('#nombre').val("");
                            $('#apat').val("");
                            $('#amat').val("");
                            $('#cel').val("");
                            $('#ci').val("");
                            $('#mail').val("");
                            $('#recibo').val("");
                            $('#taza').prop('checked', false);
                            $('#polera').prop('checked', false);
                            $('#profesional').prop('checked', false);
                            $('#estudiante').prop('checked', false);
                            $('#foto').val("");

                            swal({
                                title: 'Felicitaciones, realizaste tu registro con éxito',
                                text: 'Dentro de 24 horas te enviaremos un mensaje a tu correo electrónico, para verificar tu recibo',
                                type: 'success',
                                timer: 3500
                            });
                        }else{
                            // error
                            //generarAlerta('warning', 'Error al guardar los datos');
                            swal({
                                title: 'Hubo un error ' + resp + ' inténtelo nuevamente',
                                type: 'error'
                            });
                        }
                    },
                    error: function(jqXHR, status, error){
                        //generarAlerta('error', 'No se pudo establecer una conexión con el Servidor');
                        swal('Error');
                    }
                });
                return 0;
            }
    });

});
// Funcion para subir imagen, mediante ajax
$(function(){
    $('input.fotografia').on('change', function(){
        var inputFileImage = document.getElementById("foto");
        var file = inputFileImage.files[0];
        var data = new FormData();

        data.append("foto", file);

        $.ajax({
            url: 'php/upload_img.php',
            type: 'post',
            data: data,
            contentType: false,
            processData: false,
            success: function(data){
                $('#img_bd').val(data);
            }
        });
    });
});


// Al recargar la pagina, los inputs de tipo checkbox, radio y la fotografia subida, son reestablecidos a
// su valor inicial
$(window).on("unload", function() {
    $('#taza').prop('checked', false);
    $('#polera').prop('checked', false);
    $('#estudiante').prop('checked', false);
    $('#profesional').prop('checked', false);
    $('#precio').val(0);
    $('#foto').val("");
});