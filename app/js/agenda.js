var api_url = "http://localhost:8888/vitromusee-mobile-web-app/api/"
var dateActuelle = new Date();

$(document).ready(function() {

	getCurrentMonthData(dateActuelle);

	$('#suivant').live('click', function(){
    	nextMonth(dateActuelle)
	});

	$('#precedent').on('click', function(){
    	previousMonth(dateActuelle)
	});

});

function displayAgenda(date,data){

	if ($.isEmptyObject(data)) {

		$('#agenda_titre').empty();

		var dateTitre = getMoisAnnee(date);
		$('#agenda_titre').html(dateTitre)

		$('#liste_evenement').empty();
		$('#noEvent').empty();

	  	
	  	var p = $('<p id="noEvent"/>').html('pas d'+"'"+'évenement dans ce mois')
	  	$('#calendrier').after(p)

  	}else{

		$('#agenda_titre').empty();
		var dateTitre = getMoisAnnee(date);
		$('#agenda_titre').html(dateTitre)


		$('#liste_evenement').empty();

		$.each(data, function(index, val) {
		  	
			string = +val.dateDebut['jour']+'.'+val.dateDebut['mois']+' - '+val.dateFin['jour']+'.'+val.dateDebut['mois']
		    var li_date = $('<li data-role="list-divider">'+string+'</li>');
		    var li_nom = $('<li><a href="#">'+val.nom+'</a></li>');

		    $('#liste_evenement').append(li_date).append(li_nom);

		});
		
		$('#liste_evenement').listview('refresh');
	}
}

function getMoisAnnee(date){

	var moisFr = ["Janvier","Février", "Mars", "Avril", "Mai", "Juin","Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"]
	
	var mois = date.getMonth();
	var annee = date.getFullYear();

	return moisFr[mois] + " "+ annee

}

function getCurrentMonthData(date){

	var anneeActuelle = date.getFullYear();
	var moisActuel = date.getMonth()+1;


	$.ajax({
	  url: api_url+'agenda/'+anneeActuelle+"/"+moisActuel,
	  type: 'GET',
	  dataType: 'jsonp',
	  complete: function(xhr, textStatus) {
	    //called when complete
	  },
	  success: function(data, textStatus, xhr) {

	  	displayAgenda(date,data)
	    
	  },
	  error: function(xhr, textStatus, errorThrown) {
	    //called when there is an error
	  }
	});
}

function nextMonth(date){

	var moisActuelle = date.getMonth();
	var anneeActuelle = date.getFullYear();

	var mois = moisActuelle+2;
	date.setMonth(mois-1)

	if(mois == 13){
		mois= "01";
		anneeActuelle++;
	}

	$.ajax({
	  url: api_url+'agenda/'+anneeActuelle+"/"+mois,
	  type: 'GET',
	  dataType: 'jsonp',
	  complete: function(xhr, textStatus) {
	    //called when complete
	  },
	  success: function(data, textStatus, xhr) {

	  	displayAgenda(date,data)
	    
	  },
	  error: function(xhr, textStatus, errorThrown) {
	    //called when there is an error
	  }
	});
	
}

function previousMonth(date){

	var moisActuelle = date.getMonth();
	var anneeActuelle = date.getFullYear();

	var mois = moisActuelle;
	date.setMonth(mois-1)

	if(mois == 0){
		mois= "12";
		anneeActuelle--;
	}

	$.ajax({
	  url: api_url+'agenda/'+anneeActuelle+"/"+mois,
	  type: 'GET',
	  dataType: 'jsonp',
	  complete: function(xhr, textStatus) {
	    //called when complete
	  },
	  success: function(data, textStatus, xhr) {

	  	displayAgenda(date,data)
	    
	  },
	  error: function(xhr, textStatus, errorThrown) {
	    //called when there is an error
	  }
	});
}