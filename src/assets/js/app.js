$( document ).ready(function() {
	var lokalisering, navn, tlf, beskrivelse, billede = false;
	var submitable = false;
	var uploadedImage = '';
	var getUrl = window.location;
	var urlArr = getUrl.pathname.split('/');
	var srcIndex = urlArr.indexOf('src');
	var newArr = urlArr.slice(0, srcIndex).join('/')
	var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + newArr;
	
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
		   tlf ||
		   billede
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
			console.log('der er noget der ikke kan submittes!');
		}
	});
	
	$('#upload').click(function(){
		var fd = new FormData();
		var files = $('#file')[0].files[0];
		fd.append('fileToUpload',files);
		
		// AJAX request
		$.ajax({
			url: 'modules/image-upload.php',
			type: 'POST',
			data: fd,
			contentType: false,
			processData: false,
			success: function(response){
				if(response != 0){
					// Show image preview
					$('.image-upload__alert').addClass('alert-success');
					$('.image-upload__alert')
						.append(' <span>Image Uploaded!</span>')
					$('.image-upload__icon').addClass('fa-check-square')
					$('#billederOutput')
						.append("<div class='billede__preview'><img src='"+baseUrl+'/uploads/images/'+uploadedImage+"' alt='preview'></div>")
					billede = true;
				}else{
					$('.image-upload__alert').addClass('alert-danger');
					$('.image-upload__alert')
						.append(' <span>Billedet blev ikke uploadet!</span>')
					$('.image-upload__icon').addClass('fa-exclamation-triangle')
					
				}
			}
		});
	});
	
	$('#file').change(function(e) {
		var label = this.next
		var fileName = '';
		fileName = e.target.value.split( '\\' ).pop();
		$('.image-picker__file-name').text(fileName);
		uploadedImage = fileName;
	});
});
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
});