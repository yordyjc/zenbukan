// cm en m
function convertirAltura(cm) {
	return cm / 100;
}

var calculate = $('#calcular-imc');
var result = $('#resultado-imc');

result.fadeOut();

calculate.on('click', function (e) {
	e.preventDefault();

	var peso = $('#peso').val();
	var altura = $('#altura').val();
	var altura = convertirAltura(altura);

	if (altura !== '' && peso !== '' && altura !== 0 && peso !== 0) {
		imc = parseFloat( peso / (altura * altura) ).toFixed(2);

        if (imc >=40) {
            result.html('<div class="alert alert-danger" role="alert"><h4 class="alert-heading">¡Cuidado! <span class="icon icon-thumbs-up"></span></h4><hr><p class="mb-0">Tu estado actual es <strong>Obesidad Grado III</strong>. Tu IMC es: ' + imc + '</p></div>').fadeIn();
        } else if (imc >=35 && imc < 40) {
            result.html('<div class="alert alert-danger" role="alert"><h4 class="alert-heading">¡Cuidado! <span class="icon icon-thumbs-up"></span></h4><hr><p class="mb-0">Tu estado actual es <strong>Obesidad Grado II</strong>. Tu IMC es: ' + imc + '</p></div>').fadeIn();
        } else if (imc >=30 && imc < 35) {
            result.html('<div class="alert alert-danger" role="alert"><h4 class="alert-heading">¡Cuidado! <span class="icon icon-thumbs-up"></span></h4><hr><p class="mb-0">Tu estado actual es <strong>Obesidad Grado I</strong>. Tu IMC es: ' + imc + '</p></div>').fadeIn();
        } else if (imc > 25 && imc < 30) {
			result.html('<div class="alert alert-warning" role="alert"><h4 class="alert-heading">¡Cuidado! <span class="icon icon-thumbs-up"></span></h4><hr><p class="mb-0">Tu estado actual es <strong>Sobrepeso</strong>. Tu IMC es: ' + imc + '</p></div>').fadeIn();
		} else if (imc < 18.5) {
			result.html('<div class="alert alert-warning" role="alert"><h4 class="alert-heading">¡Cuidado! <span class="icon icon-thumbs-up"></span></h4><hr><p class="mb-0">Tu estado actual es <strong>Delgadez</strong>. Tu IMC es: ' + imc + '</p></div>').fadeIn();
		} else {
			result.html('<div class="alert alert-success" role="alert"><h4 class="alert-heading">¡Excelente! <span class="icon icon-thumbs-up"></span></h4><hr><p class="mb-0">Tu IMC está dentro de los parámetros normales. Tu IMC es: ' + imc + '</p></div>').fadeIn();
		}
	}
});
