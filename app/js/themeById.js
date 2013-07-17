var api_url = "http://localhost:8888/vitromusee-mobile-web-app/api/"

$(document).ready(function() {

	console.log(localStorage.getItem("idTheme"))
	getThemesById(localStorage.getItem("idTheme"))

});

function getThemesById(idTheme){

	$.ajax({
	  url: api_url+'theme/'+idTheme,
	  type: 'GET',
	  dataType: 'jsonp',
	  jsonp: 'jsonp_callback',
	  complete: function(xhr, textStatus) {
	    //called when complete
	  },
	  success: function(data, textStatus, xhr) {

	  	$('#nomTheme').html(localStorage.getItem("nomTheme"))

	  	if ($.isEmptyObject(data)) {

		  	$('#themeById').empty();
		  	var p = $('<p/>').html('pas d'+"'"+'oeuvre dan ce thème')
		  	$('#themeById').append(p)

	  	}else{

		  	$('#themeById').empty();

	  		$.each(data, function(index,val) {

	  			var li = $('<li class="test"/>');
		    	var a = $('<a href="oeuvre.html"/>');
		    	var img = $('<img style="width:80px;heigth:80px;"/>').attr("src",api_url+val.thumb);
		    	var h2 = $('<h2/>').html(val.nom);
		    	var i = a.append(img);
		    	a.append(h2)

		    	var tabLength = val.artistes.length

		    	var tab = val.artistes;
		    	var stringArtiste = "";

	  			$.each(tab, function(index, val) {
						stringArtiste+=val.nom+" "+val.prenom+" et "
	  			});

			    var stringArtisteTruncate = $.trim(stringArtiste).substring(0, stringArtiste.length - 3)	


	  			var p = $('<p/>').html(stringArtisteTruncate)
	    		a.append(p)

				var newLi= li.append(i);
	  			$('#themeById').append(newLi);
		  		$('#themeById').listview('refresh');

		  	});

		}  	

	  },
	  error: function(xhr, textStatus, errorThrown) {
	    //called when there is an error
	  }
	});	
}



