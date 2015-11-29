


$(document).ready(function(){
	$.ajax({
		url: 'query.php',
		data: {action: 'getPreferences'},
		method: 'POST'
	}).done(function(data){
		console.log(data);
	})
});

function addPreference(){
	if($('#preferenceInput').val() != ''){
		$.ajax({
			url: 'query.php',
			data: {action: 'addPref', newPref: $('#preferenceInput').val()},
			method: 'POST'
		}).done(function(response){
			$('#preferences').append('<div class="col-xs-6 col-sm-3 preference text-center"><span>' + $('#preferenceInput').val() + '</span><button type="button" pref=" ' + $('#preferenceInput').val() + '" onclick="deletePreference(this)" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}).fail(function(jqXHR, status){

		});
	}
};

function deletePreference(object){
	$.ajax({
		url: 'query.php',
		action: 'removePref',
		delPref: $(object)[0].attributes.pref.value,
		method: 'POST'
	}).done(function(response){
		$($(object)[0].parentElement).hide();
	}).fail(function(jqXHR, status){

	});
};
