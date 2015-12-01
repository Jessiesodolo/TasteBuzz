
var parseQueryString = function() {

    var str = window.location.search;
    var objURL = {};

    str.replace(
        new RegExp( "([^?=&]+)(=([^&]*))?", "g" ),
        function( $0, $1, $2, $3 ){
            objURL[ $1 ] = $3;
        }
    );
    return objURL;
};


$(document).ready(function(){
	var params = parseQueryString();
	var name = params['name'].replace(new RegExp('%20', 'g'), ' ' );
	console.log(name);
	$.ajax({
		method: 'POST',
		data: {action: 'getDrinkInfo', drinkName: name},
		url: 'query.php'
	}).done(function(data){
		var temp = JSON.parse(data);
		console.log(temp);
		$('#drink-description').append('<h2 class="media-title">' + temp.dname + '</h2>');
		$('#drink-image').html('<img class="media-object" src="' + temp.img_addr + '">');
		$('#drink-description').append('<p>' + temp.description + '</p>');

	}).fail(function(jqXHR, status){
		console.log('error: ' + status);
	});
})