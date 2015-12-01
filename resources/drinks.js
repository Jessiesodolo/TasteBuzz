
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
	console.log(params["type"]);
	if(params["type"] == 'best'){
		$.ajax({
			url: 'query.php',
			method: 'POST',
			data: {action: 'getBestDrink'}
		}).done(function(data){
			console.log('data: ' + data);
		}).fail(function(jqXHR, status){
			console.log('error: ' + status);
		});
	}
	else if (params['type'] == 'all'){
		$.ajax({
			url: 'query.php',
			method: 'POST',
			data: {action: 'getAllDrinks'}
		}).done(function(data){
			console.log('data: ' + data);
		}).fail(function(jqXHR, status){
			console.log('error: ' + status);
		});
	}

})