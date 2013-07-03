var api_url = "http://10.192.81.69:8888/vitromusee-mobile-web-app/api/"

$(document).ready(function() {

	//getThemes()
	getThemes()
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

	    $.each(data, function(key, value) {

	    	var li = $('<li/>');
	    	var a = $('<a href="#"/>').html(value.nom);
	    	var span = $('<span class="ui-li-count">12</span>');

	    	var wrapper = a.append(span)
	    	var s = li.append(wrapper);
	     	
	     	$('#theme').append(s);
	     	$('#theme').listview('refresh');
	    });

	  },
	  error: function(xhr, textStatus, errorThrown) {
	    //called when there is an error
	  }
	});	
}




