var totalTipo = 0;
	var totalSouvenir = 0;
	var total = totalTipo + totalSouvenir;
	$(document).ready(function(){
		$('input[name=tipo]').click(function(){
				if($(this).val() == "estudiante"){
					totalTipo = 35;
					total = totalTipo + totalSouvenir;
					$('#total').html(total);
				}
				else{
					totalTipo = 50;
					total = totalTipo + totalSouvenir;
					$('#total').html(total);
				}
			});
		$('#pago').hide();
		$('#recibo').prop('required', false);
		$('#mostrarRegistro').click(function(){
			$('#pago').fadeToggle('slow');
			$('#recibo').prop('required', true);
		})
		$('#taza').change(function(){
			if($(this).is(':checked')){
				totalSouvenir += 15;
				total = totalTipo + totalSouvenir;
				$('#total').html(total);
			}
			else{
				totalSouvenir -= 15;
				total = totalTipo + totalSouvenir;
				$('#total').html(total)
			}
		});
		$('#polera').change(function(){
			if($(this).is(':checked')){
				totalSouvenir += 30;
				total = totalTipo + totalSouvenir;
				$('#total').html(total);
			}
			else{
				totalSouvenir -= 30;
				total = totalTipo + totalSouvenir;
				$('#total').html(total)
			}
		});
	});