$(function(){
	$('input.fotografia').on('change', function(){
		//var img = new FormData($('form.form-datos').files[0])

		var inputFileImage = document.getElementById("foto");
		var file = inputFileImage.files[0];
		var data = new FormData();

		data.append("foto", file);

		$.ajax({
			url: 'upload.php',
			type: 'post',
			data: data,
			contentType: false,
    		processData: false,
    		success: function(data){
    			console.log(data);
    			$('#foto_bd').val(datax);
    		}
		});
	});
});