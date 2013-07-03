/* 
	jQuery Mobile Boilerplate
	application.js
*/

var api_url = "http://localhost:8888/vitromusee-mobile-web-app/api/"

$(document).on("pageinit", function(event){
		//getThemes()
});



// function getThemes(){

// 	$.ajax({
// 	  url: api_url+'theme',
// 	  type: 'GET',
// 	  dataType: 'json',
// 	  complete: function(xhr, textStatus) {
// 	    //called when complete
// 	  },
// 	  success: function(data, textStatus, xhr) {
// 	    var themesObject = data;

// 	    $.each(data, function(key, value) {

// 	    	console.log(value.nom)

// 	    	var li = $('<li/>');
// 	    	var a = $('<a href="#"/>').html(value.nom);
// 	    	var span = $('<span class="ui-li-count">12</span>');

// 	    	var wrapper = a.append(span)
// 	    	var s = li.append(wrapper);
	     	
// 	     	$('#theme').append(s).listview('refresh');
// 	    });

// 	  },
// 	  error: function(xhr, textStatus, errorThrown) {
// 	    //called when there is an error
// 	  }
// 	});
	
// }