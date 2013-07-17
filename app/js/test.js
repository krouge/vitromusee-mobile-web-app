var api_url = "http://localhost:8888/vitromusee-mobile-web-app/api/"
var oeuvre = localStorage.getItem('OeuvresObject')

$(document).on('pageinit','[data-role="page"]',function() {
	
	var ids = localStorage.getItem("id")

	getOeuvreById(localStorage.getItem("id"))

	$('#artiste').click(function(event) {
		afficheArtistes();
	});
	$('#media').click(function(event) {
		afficheMedias();
	});
	$('#oeuvre').click(function(event) {
		afficheOeuvres();
	});

});

function getOeuvreById(id){
	$.ajax({
		  url: api_url+'oeuvre/'+id,
		  type: 'GET',
		  dataType: 'jsonp',
		  jsonp: 'jsonp_callback',
		  complete: function(xhr, textStatus) {
		    //called when complete
		  },
		  success: function(data, textStatus, xhr) {

		  	$('#titreOeuvre').html(data.nom)
		  	localStorage.removeItem('OeuvresObject');
		  	localStorage.setItem('OeuvresObject', JSON.stringify(data));
		  	localStorage.removeItem("id");

		 	$('.container_12').append('<a href="#popupParis" data-rel="popup" data-position-to="window" data-transition="fade"><img id="img_oeuvre"class="grid_12 popphoto" src="'+api_url+data.thumb+'" alt="'+data.nom+'"></a>');
		 	
		 	$.each(data.media, function(index, val) {
		 	  	$('.container_12').append('<div data-role="popup" id="popupParis" data-overlay-theme="a" data-theme="d" class="ui-content"><a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a><img id="img_oeuvre"class="popphoto" src="'+api_url+val.source+'" alt="'+val.nom+'"/></div>')
		 	});

		 	//$('#control').append('<div id="action" class="grid_3"><a href="#popupParis" data-rel="popup" data-position-to="window" data-transition="fade" id="camera" data-role="button"><i class="icon-camera"></i></a><a href="#popupVideo" data-rel="popup" data-position-to="window" data-transition="fade" id="camera" data-role="button"><i class="icon-facetime-video"></i></a></div>');

		    var nomOeuvre = $('<h4/>').html("Oeuvre: "+data.nom);
		    var nomArtisteString = "";

		    $.each(data.artistes, function(index, val) {

		    	nomArtisteString+=" "+val.nom+" "+val.prenom+" et ";

		    });

		    var nomArtisteStringTruncate = $.trim(nomArtisteString).substring(0, nomArtisteString.length - 5)	
		    var nomArtiste = $('<h4/>').html("Artiste:"+" "+nomArtisteStringTruncate);
		    var contenuOeuvre =  $('<p/>').html(data.description);

		    $('.container_12').append(nomOeuvre).append(nomArtiste).append(contenuOeuvre)

		    $('#oeuvre_content').trigger('create');

	  	  	
		  
		  },
		  error: function(xhr, textStatus, errorThrown) {
		    //called when there is an error
		  }
		});	
}

function afficheOeuvres(){

	$('.container_12').empty()
	$('.grid_12').remove()
	$('#artist_list').remove()
	$('#asd').remove()
	$('#photo').remove()
	$('#gallery1').remove()
	var data = JSON.parse(oeuvre);

	//$('.container_12').empty()

 	$('.container_12').append('<a href="#popupParis" data-rel="popup" data-position-to="window" data-transition="fade"><img id="img_oeuvre"class="grid_12 popphoto" src="'+api_url+data.thumb+'" alt="'+data.nom+'"></a>');
 	
 	$.each(data.media, function(index, val) {
 		console.log("wa")
 	  	$('.container_12').append('<div data-role="popup" id="popupParis" data-overlay-theme="a" data-theme="d" class="ui-content"><a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a><img id="img_oeuvre"class="popphoto" src="'+api_url+val.source+'" alt="'+val.nom+'"/></div>')
 	});

 	//$('#control').append('<div id="action" class="grid_3"><a href="#popupParis" data-rel="popup" data-position-to="window" data-transition="fade" id="camera" data-role="button"><i class="icon-camera"></i></a><a href="#popupVideo" data-rel="popup" data-position-to="window" data-transition="fade" id="camera" data-role="button"><i class="icon-facetime-video"></i></a></div>');

    var nomOeuvre = $('<h4/>').html("Oeuvre: "+data.nom);
    var nomArtisteString = "";

    $.each(data.artistes, function(index, val) {

    	nomArtisteString+=" "+val.nom+" "+val.prenom+" et ";

    });

    var nomArtisteStringTruncate = $.trim(nomArtisteString).substring(0, nomArtisteString.length - 5)	
    var nomArtiste = $('<h4/>').html("Artiste:"+" "+nomArtisteStringTruncate);
    var contenuOeuvre =  $('<p/>').html(data.description);

    $('.container_12').append(nomOeuvre).append(nomArtiste).append(contenuOeuvre)

    $('#oeuvre_content').trigger('create');

}


function afficheArtistes(){

	$('.container_12').empty()
	$('#artist_list').empty()
	$('#asd').empty()
	$('#photo').remove()
	$('#gallery1').remove()


	var data = JSON.parse(oeuvre);

	console.log(data)
	console.log("sad")

	var nom;
	var prenom;
	var dateNaissance;
	var dateDeces;
	var nationalite;
	var activite;
	var formation;
	var style;
	var biographie;
	var thumb;

	$.each(data.artistes, function(index, val) {
    	nom = val.nom;
		prenom = val.prenom;
		dateNaissance = val.dateNaissance;
		dateDeces = val.dateDeces
		nationalite = val.nationalite;
		activite = val.activite;
		formation = val.formation;
		style = val.style;
		biographie = val.biographie;
		thumb = val.thumb;
	});

	$('.container_12').attr('id', "artist_img");
	//$('.container_12').append("<div class="grid_12"><img class="grid_6" src="api_url+'_assets/img/DeVinci/oeuvre/joconde/joconde_thumb.jpg'"><div class="grid_5" id="artistInfo"><h4>nom</p><p>prenom</p></div></div>")
	//$('#oeuvre_content').appendTo("<ul data-role="listview" id="artist_list"><li><span>Date de naissance:</span><span class="rep">dateNaissance</span></li><li><span>Date de décès:</span><span class="rep">dateDeces</span></li><li><span>Nationalité:</span><span class="rep">nationalite</span></li><li><span>Activité:</span><span class="rep">activite</span></li><li><span>Formation:</span><span class="rep">formation</span></li><li><span>Style:</span><span class="rep">style</span></li></ul><div data-role="collapsible"><h4>Biographie</h4><p>val.biographie</p></div>")

	var div12 = $('<div class="grid_12"/>')

	var img = $('<img/>').addClass("grid_6").attr("src",api_url+thumb)
	var div5 = $('<div class="grid_5" id="artistInfo"/>');

	var nomTitre = $('<h4/>').html("Nom: "+nom)
	var prenomTitre = $('<h4/>').html("Prénom: "+prenom)

	div5.append(nomTitre).append(prenomTitre)

	//var t = div12.append(img).append(div5);
	$('.container_12').append(div12.append(img).append(div5));

	var ul = $('<ul data-role="listview" id="artist_list"/>')
	var li1 = $('<li><span>Date de naissance:</span><span class="rep">'+dateNaissance+'</span></li>')

	var li3 = $('<li><span>Date décès:</span><span class="rep">'+dateDeces+'</span></li>')
	var li4 = $('<li><span>Nationalité:</span><span class="rep">'+nationalite+'</span></li>')
	var li5 = $('<li><span>Activité:</span><span class="rep">'+activite+'</span></li>')
	var li6 = $('<li><span>Formation:</span><span class="rep">'+formation+'</span></li>')
	var li7 = $('<li><span>Style:</span><span class="rep">'+style+'</span></li>')

	var u = ul.append(li1).append(li3).append(li4).append(li5).append(li6).append(li7)

	var div2 = $('<div id="asd" data-role="collapsible"/>')
	var titreBio = $('<h4/>').html("Biographie")
	var textBio = $('<p/>').html(biographie)

	var d2 = div2.append(titreBio).append(textBio);
	var total = u.after(d2)
	$('.container_12').after(total)
	$('#oeuvre_content').trigger('create');
	

}


function afficheMedias(){

	$('.container_12').empty()
	$('#artist_list').remove()
	$('#asd').remove()
	$('#photo').empty()
	$('#video').empty()

	$('#gallery1').empty()

	var h2 = $('<h3 id="photo"/>').html("Photo")

	var ulPhoto = $('<ul id="gallery1" class="gallery"/>')
	var liPhoto1 = $('<li><a href="images/full/001.jpg" rel="external"><img src="images/thumb/001.jpg" alt="Image 001" /></a></li>')
	var liPhoto2 = $('<li><a href="images/full/002.jpg" rel="external"><img src="images/thumb/002.jpg" alt="Image 002" /></a></li>')
	var liPhoto3 = $('<li><a href="images/full/003.jpg" rel="external"><img src="images/thumb/003.jpg" alt="Image 003" /></a></li>')
	var liPhoto4 = $('<li><a href="images/full/004.jpg" rel="external"><img src="images/thumb/004.jpg" alt="Image 004" /></a></li>')
	var liPhoto5 = $('<li><a href="images/full/005.jpg" rel="external"><img src="images/thumb/005.jpg" alt="Image 005" /></a></li>')
	var liPhoto6 = $('<li><a href="images/full/006.jpg" rel="external"><img src="images/thumb/006.jpg" alt="Image 006" /></a></li>')

	var uTotal = ulPhoto.append(liPhoto1).append(liPhoto2).append(liPhoto3).append(liPhoto4).append(liPhoto5).append(liPhoto6)

	var totales = h2.after(uTotal)
	$('#oeuvre_content').append(totales)

	$("#gallery1 a").photoSwipe({

        getToolbar: function(){
    		return '<div class="ps-toolbar-close" style="padding-top: 12px;">Fermer</div><div class="ps-toolbar-previous" style="padding-top: 12px;">Précédent</div><div class="ps-toolbar-next" style="padding-top: 12px;">Suivant</div><div class="ps-toolbar-play" style="padding-top: 12px;">Diaporama</div>';
		},
		jQueryMobile: true,
        enableMouseWheel: false,
        enableKeyboard: false

    });

	var h2Video = $('<h3 id="video"/>').html("Vidéo")
	var div_c12 = $('<div class="container_12"/>');

	var iframe = $('<iframe class="grid_5" id="player" type="text/html" width="640" src="http://www.youtube.com/embed/C5oCKIAIdDQ" frameborder="0"></iframe>')
	var iframe2 = $('<iframe class="grid_5" type="text/html" width="640" src="http://www.youtube.com/embed/eYVwwNGUstc" frameborder="0"></iframe>')

	var englobe = div_c12.append(iframe).append(iframe2)

	var englobeTotal = h2Video.after(englobe)

	$('#oeuvre_content').append(englobeTotal)

	


}	




		