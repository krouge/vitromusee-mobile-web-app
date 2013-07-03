var api_url = "http://localhost:8888/vitromusee-mobile-web-app/api/"

$(document).ready(function() {

	$("#oeuvre_liste").click(save)
	getOeuvres()
	
});

function getOeuvres(){

	$.ajax({
	  url: api_url+'oeuvre',
	  type: 'GET',
	  dataType: 'jsonp',
	  jsonp: 'jsonp_callback',
	  complete: function(xhr, textStatus) {
	    //called when complete
	  },
	  success: function(data, textStatus, xhr) {

  		$.each(data, function(index, val) {

  			var li = $('<li class="test"/>');
	    	var a = $('<a href="oeuvre.html"/>');
	    	var img = $('<img/>').attr("src",api_url+val.thumb);
	    	var h2 = $('<h2/>').html(val.nom);
	    	var p = $('<p/>').html(val.idOeuvre)

	    	var i = a.append(img);
	    	a.append(h2)
	    	a.append(p)
	    	
	    	var newLi= li.append(i);
	    	$('#oeuvre_liste').append(newLi);
  		});
  		
  		$('#oeuvre_liste').listview('refresh');

	  },
	  error: function(xhr, textStatus, errorThrown) {
	    //called when there is an error
	  }
	});	
}

function save(){

	var id = $(".ui-li-desc").text();
	sessionStorage.setItem("id",id)
}









			