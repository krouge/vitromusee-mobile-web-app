var api_url = "http://localhost:8888/vitromusee-mobile-web-app/api/"

$(document).ready(function() {

	getThemes()

	$('li','ul#theme_list').live('click', function(){
    	
		var id = $(this).data("id")
		localStorage.setItem("idTheme",id)

		var nom = $('.ui-link-inherit',this).clone().children().remove().end().text();
		localStorage.setItem("nomTheme",nom)

	});
});

function getThemes(){

	$.ajax({
	  url: api_url+'theme',
	  type: 'GET',
	  dataType: 'jsonp',
	  jsonp: 'jsonp_callback',
	  complete: function(xhr, textStatus) {
	    //called when complete
	  },
	  success: function(data, textStatus, xhr) {
	  	
	    $.each(data, function(key, value){

	  		console.log(data.length)

	    	var li = $('<li data-id="'+value.idTheme+'"/>');
	    	var a = $('<a href="theme_list.html"/>').html(value.nom);
	    	var span = $('<span class="ui-li-count">11</span>');

	    	var wrapper = a.append(span)
	    	var s = li.append(wrapper);
	     	
	     	$('#theme_list').append(s);
	     	$('#theme_list').listview('refresh');
	    });

	  },
	  error: function(xhr, textStatus, errorThrown) {
	    //called when there is an error
	  }
	});	
}




