$(document).ready(function() {
$("#generar").attr('disabled', 'disabled');
$("form").keyup(function() {
// To Disable Submit Button
$("#generar").attr('disabled', 'disabled');
// Validating Fields
var validar = 0;
var titulo = $('#titulo').val();
var asunto = $('#asunto').val();
var sede = $('#sede').val();

var table = document.getElementById('tabla-equipo');
if (table.rows[1].cells[0].innerHTML !== undefined){
	if(table.rows[1].cells[0].innerHTML !== 'No quedan equipos disponibles')
		validar = 1;
}
if (!(validar == 0 || titulo == "" || asunto == "" || sede ==null)) {
// To Enable Submit Button
$("#generar").removeAttr('disabled');
$("#generar").css({
"cursor": "pointer",
"box-shadow": "1px 0px 6px #333",
"background":"green"
});

}
});
// On Click Of Submit Button
$("#generar").click(function() {
$("#generar").css({
"cursor": "default",
"box-shadow": "none",
"background": "default"
});
alert("Form Submitted Successfully..!!");
});
});