


$(document).ready(function(){
	$.ajax({
		url: 'query.php',
		data: {action: 'getPreferences'},
		method: 'POST'
	}).done(function(data){
		var temp = JSON.parse(data);
		console.log(temp);
		for( x in temp ){
			$('#preferences').append('<div class="col-xs-6 col-sm-3 preference text-center"><span>' + temp[x] + '</span><button type="button" pref="' + temp[x] + '" onclick="deletePreference(this)" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
	})
});

function addPreference(){
	if($('#preferenceInput').val() != ''){
		$.ajax({
			url: 'query.php',
			data: {action: 'addPref', newPref: $('#preferenceInput').val()},
			method: 'POST'
		}).done(function(response){
			$('#preferences').append('<div class="col-xs-6 col-sm-3 preference text-center"><span>' + $('#preferenceInput').val() + '</span><button type="button" pref="' + $('#preferenceInput').val() + '" onclick="deletePreference(this)" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}).fail(function(jqXHR, status){
			console.log(status);
		});
	}
};

function deletePreference(object){
	console.log($(object)[0].attributes.pref.value);
	$.ajax({
		url: 'query.php',
		data: {action: 'removePref', delPref: $(object)[0].attributes.pref.value},
		method: 'POST'
	}).done(function(response){
		console.log(response);
		$($(object)[0].parentElement).hide();
	}).fail(function(jqXHR, status){
		console.log(status)
	});
};
