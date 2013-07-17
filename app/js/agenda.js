var api_url = "http://localhost:8888/vitromusee-mobile-web-app/api/"

$(document).ready(function() {


	var d = new Date();
	getCurrentMonthData(d.getMonth()+1){

	}


	$('#suivant').live('click', function(){
	    
			var month = $(this).data("month")
			nextMonth(month)

		});

	$('precedent').live('click', function(){
	    
			var month = $(this).data("month")
			previousMonth(month)

		});

});

function getCurrentMonthData(mois){

	$.ajax({
	  url: api_url+'agenda'+mois,
	  type: 'GET',
	  dataType: 'jsonp',
	  data: {param1: 'value1'},
	  complete: function(xhr, textStatus) {
	    //called when complete
	  },
	  success: function(data, textStatus, xhr) {
	    data
	  },
	  error: function(xhr, textStatus, errorThrown) {
	    //called when there is an error
	  }
	});
	

}

function nextMonth(month){

	
	var nextMonth = month+1;

	$.ajax({
	  url: '/path/to/file',
	  type: 'POST',
	  dataType: 'xml/html/script/json/jsonp',
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
	
	
}

function previousMonth(month){

		var nextMonth = month-1;


}





		