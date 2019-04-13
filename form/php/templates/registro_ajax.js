'use_strict';
$(document).ready(function(){
	$('#hacerReserva').click(function(e){
		console.log('click');
		e.preventDefault();
		var $this = $('form.form-datos');
		var nombre = $('#nombre').val();
		var ci = $('#ci').val();
		var correo = $('#mail').val();
		var tipo = $('#tipo').val();
		var evento = $('#evento').val();

		var dataString = "nombre="+nombre+"&ci="+"&mail="+"&tipo="+"&evento="+evento;
		if(nombre == '' || ci == '' || correo == '' || tipo == '' || evento == ''){
			swal({
				title: 'Debe llenar todos los campos con asterisco *',
				type: 'error',
				timer: 2000
			});
		}
		else{

			
			console.log($this.data('action'));
			
            $.ajax({
                url: $this.data('action'),
                type: $this.attr('method'),
                data: $this.serializeArray(),
                success: function(resp){
                    //console.log(resp.toString());
                    if(resp.toString() == 'Bien hecho'){
                        // agregado exitoso
                        //$this.clearForm();
                        //generarAlerta('success', 'Los datos se guardaron correctamente');
                        swal(resp);
                    }else{
                        // error
                        //generarAlerta('warning', 'Error al guardar los datos');
                        swal(resp);
                    }
                },
                error: function(jqXHR, status, error){
                    //generarAlerta('error', 'No se pudo establecer una conexión con el Servidor');
                    swal('error');
                }
            });
            
            return 0;
			
		}
	});

});