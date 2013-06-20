$(document).ready(function() {
	get();
	post_test();
	testFonction();
});

function testFunction (argument) {
	console.log("it's a test")
	deuxième phase
	hostname 
}

function get (){

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

function post_tet () {

	$.ajax({
	  url: 'http://localhost:8888/vitromusee-mobile-web-app/api',
	  type: 'POST',
	  dataType: 'json',
	  data: {param1: 'value1'},
	  complete: function(xhr, textStatus) {
	    //called when complete
	  },
	  success: function(data, textStatus, xhr) {
	    //called when successful
	  },
	  error: function(xhr, textStatus, errorThrown) {
	    //called when there is an error
	  }
	});
	
	// body...
}