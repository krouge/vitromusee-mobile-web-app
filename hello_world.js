$(document).ready(function() {
	test();
});


function test (){

	$.ajax({
	  url: 'http://localhost:8888/vitromusee-mobile-web-app/api',
	  type: 'GET',
	  dataType: 'json',
	  complete: function(xhr, textStatus) {
	    //called when complete
	  },
	  success: function(data, textStatus, xhr) {
	    console.log(data);
	  },
	  error: function(xhr, textStatus, errorThrown) {
	    //called when there is an error
	  }
	});
	
	
	
}