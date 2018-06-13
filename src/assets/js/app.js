$( document ).ready(function() {
	var lokalisering, navn, tlf, beskrivelse = false;
	var submitable = false;
	
	$('#skadeSubmitBtn').click(function() {
		var valg = 'Vælg venligst';
		var emptyString = '';
		var defaultString = 'Ikke udfyldt';
		
		$('#lokaliseritngOutput').text(defaultString);
		$('#beskrivelseOuput').text(defaultString);
		$('#navnOutput').text(defaultString);
		$('#tlfOuput').text(defaultString);
		$('#emailOutput').text(defaultString);
		
		
		if($( "#lokalisering option:selected" ).text() !== valg){
			$('#lokaliseritngOutput').text($( "#lokalisering option:selected" ).text());
			lokalisering = true;
		}
		if($('.beskrivelse__text-area').val() !== emptyString){
			$('#beskrivelseOuput').text($(".beskrivelse__text-area" ).val());
			beskrivelse = true;
		}
		if($( ".kontakt_text-input[name=navn]" ).val() !== emptyString){
			$('#navnOutput').text($(".kontakt_text-input[name=navn]" ).val());
			navn = true;
		}
		if($( ".kontakt_text-input[name=telefon]" ).val() !== emptyString){
			$('#tlfOuput').text($( ".kontakt_text-input[name=telefon]" ).val());
			tlf = true;
		}
		
		$('#prioriteringOutput').text($( "#prioritering option:selected" ).text());
		$('#emailOutput').text($( ".kontakt_text-input[name=email]" ).val());
		
		
		if(lokalisering ||
		   beskrivelse ||
		   navn ||
		   tlf
		){
			submitable = true;
		}else{
			$("#submitSkade").addClass('disabled');
		}
	});

	
	$('#submitSkade').click(function() {
		if(submitable){
			$('#skadeForm').submit();
		}else{
			console.log('hej');
		}
	});
	$.urlParam = function(name){
		var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		if (results==null){
			return null;
		}
		else{
			return decodeURI(results[1]) || 0;
		}
	}
	
		if($.urlParam('confirmTicket')){
			$('#confirmModal').modal('show');
		}
	
});
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
});
