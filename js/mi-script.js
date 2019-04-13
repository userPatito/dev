$(document).on('ready', iniciarTemporizador);

function iniciarTemporizador() {

	var fechaFinal = new Date(2016, 10, 18, 09, 00, 00);
	var fechaHoy = new Date();

	var diferenciaMilisegundos = fechaFinal.getTime() - fechaHoy.getTime();
	var diferenciaSegundos = (diferenciaMilisegundos/1000);

	var clock = $("#mi-reloj").FlipClock({
    	clockFace: 'DailyCounter',
       });

	clock.setTime(diferenciaSegundos);
	clock.setCountdown(true);
}