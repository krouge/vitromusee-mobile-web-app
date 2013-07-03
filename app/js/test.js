var api_url = "http://localhost:8888/vitromusee-mobile-web-app/api/"

$(document).on("pageinit", function(event){

	var id = sessionStorage.getItem("id");

	// Test si contenu a déjâ été ajouté
	if(!$('#control').is(':empty')){

		$.ajax({
		  url: api_url+'oeuvre/'+id,
		  type: 'GET',
		  dataType: 'jsonp',
		  jsonp: 'jsonp_callback',
		  complete: function(xhr, textStatus) {
		    //called when complete
		  },
		  success: function(data, textStatus, xhr) {

	  	 	$('#control').append('<a href="#popupParis" data-rel="popup" data-position-to="window" data-transition="fade"><img id="img_oeuvre"class="grid_9 popphoto" src="'+api_url+data.thumb+'" alt="'+data.nom+'"></a>')

	  	 	$('#control').append('<div id="action" class="grid_3"><a href="#popupParis" data-rel="popup" data-position-to="window" data-transition="fade" id="camera" data-role="button"><i class="icon-camera"></i></a><a href="#popupVideo" data-rel="popup" data-position-to="window" data-transition="fade" id="camera" data-role="button"><i class="icon-facetime-video"></i></a></div>');

		    var nomOeuvre = $('<h4/>').html("Oeuvre: "+data.nom);
		    var nomArtiste = $('<h4/>').html("Artiste: Léonard De Vnci");
		    var contenuOeuvre =  $('<p/>').html(data.description);

		    $('#oeuvre_content').append(nomOeuvre).append(nomArtiste).append(contenuOeuvre)

		    $('#oeuvre_content').trigger('create');

		  },
		  error: function(xhr, textStatus, errorThrown) {
		    //called when there is an error
		  }
		});	
	}else{
		console.log("VIDE")
	}

});








		