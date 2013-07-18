var api_url = "http://localhost:8888/vitromusee-mobile-web-app/api/"

$(document).ready(function() {

	getArtistes()

	$('li','ul#artiste_list').live('click', function(){
    
		var id = $(this).data("id")
		alert(id)
		sessionStorage.setItem("id",id)

	});
});

function getArtistes(){

	$.ajax({
	  url: api_url+"artiste",
	  type: 'GET',
	  dataType: 'jsonp',
	  // jsonp: 'jsonp_callback',
	  complete: function(xhr, textStatus) {
	  },
	  success: function(data, textStatus, xhr) {





	  	 $.each(data, function(key, val) {

	    	var li = $('<li data-id="'+val.idArtiste+'"/>');
	    	var a = $('<a href="artiste_profil.html"/>').html(val.nom+" "+ val.prenom);

	    	var s = li.append(a);
	     	
	     	$('#artiste_list').append(s);
	     	$('#artiste_list').listview('refresh');
	    });

	  },
	  error: function(xhr, textStatus, errorThrown) {
	    //called when there is an error
	  }
	});	
}


			