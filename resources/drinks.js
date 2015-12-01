
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
			data: {action: 'getSortedDrinks'}
		}).done(function(data){
			var temp = JSON.parse(data);
			console.log(temp);
			var count = 1;
			$.ajax({
				method: 'POST',
				data: {action: 'getBestDrink'},
				url: 'query.php',
				dataType: 'text'
			}).done(function(data){
				console.log(data);
				var bestDrink = JSON.parse(data);
				console.log(bestDrink);
				$('#best-drink').append('<div class="media"><div class="media-left">' + 
				'<img class="media-object" id="drink-image" src="' + bestDrink.img_addr + '"></div><div'+
				' class="media-body"><h2 class="media-title"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>' + bestDrink.dname + ' |<small>Best Match!</small> </h2><p>' + bestDrink.description + '</p></div></div>');
			}).fail(function(jqXHR, status){
				console.log('error: ' + status);
			});
			for(var x = 1; x < temp.length; x++){
				var name = temp[x][1]
				console.log(name);
				(function(x){
				$.ajax({
					method: 'POST',
					data: {action: 'getDrinkInfo', drinkName: name},
					url: 'query.php'
				}).done(function(data){
					var drink = JSON.parse(data);
					if(count%2 == 0){ //even
						count++;
						$('#allDrinks').append('<div class="media"><div class="media-left">' + 
						'<img class="media-object" id="drink-image" src="' + drink.img_addr + '"></div><div'+
						' class="media-body"><h2 class="media-title">' + drink.dname + '</h2><p>' + drink.description + '</p></div></div>');
					}
					else{ //odd
						count++;
						$('#allDrinks').append('<div class="media"><div class="media-body"><h2 class="media-title">' + 
							drink.dname + '</h2><p>' + drink.description + '</p></div><div class="media-right">' + 
						'<img class="media-object" id="drink-image" src="' + drink.img_addr + '"></div></div>');
					}

					/*$('#drink-description').append('');
					$('#drink-image').html('');
					$('#drink-description').append('');*/

				}).fail(function(jqXHR, status){
					console.log('error: ' + status);
				});})(x);
				//$('#allDrinks').append('<div class="col-sm-4" style="margin-bottom: 15px"><h3 style="color: white;">' + temp[x][0] + '</h3><a href="drink.php?name=' + temp[x][0] + '"><div class="col-xs-12 center-block all-drink-image" style="background: center no-repeat url(' + temp[x][1] + ') gray; height: 200px"></div></a></div>')
			}
		}).fail(function(jqXHR, status){
			console.log('error: ' + status);
		});
	}
	else if (params['type'] == 'all'){
		$('.featurette-divider').hide();
		$.ajax({
			url: 'query.php',
			method: 'POST',
			data: {action : 'getAllDrinks'}
		}).done(function(data){
			var temp = JSON.parse(data);
			var count = 0;
			for(x in temp){
				var name = temp[x][0]
				console.log(name);
				(function(x){
				$.ajax({
					method: 'POST',
					data: {action: 'getDrinkInfo', drinkName: name},
					url: 'query.php'
				}).done(function(data){
					console.log(data);
					var drink = JSON.parse(data);
					//console.log(drink);
					console.log(count);
					if(count%2 == 0){ //even
						count++;
						console.log(drink);
						$('#allDrinks').append('<div class="media"><div class="media-left">' + 
						'<img class="media-object" id="drink-image" src="' + drink.img_addr + '"></div><div'+
						' class="media-body"><h2 class="media-title">' + drink.dname + '</h2><p>' + drink.description + '</p></div></div>')
					}
					else{ //odd
						count++;
						console.log('odd x');
						$('#allDrinks').append('<div class="media"><div class="media-body"><h2 class="media-title">' + 
							drink.dname + '</h2><p>' + drink.description + '</p></div><div class="media-right">' + 
						'<img class="media-object" id="drink-image" src="' + drink.img_addr + '"></div></div>')
					}

					/*$('#drink-description').append('');
					$('#drink-image').html('');
					$('#drink-description').append('');*/

				}).fail(function(jqXHR, status){
					console.log('error: ' + status);
				});})(x);
				//$('#allDrinks').append('<div class="col-sm-4" style="margin-bottom: 15px"><h3 style="color: white;">' + temp[x][0] + '</h3><a href="drink.php?name=' + temp[x][0] + '"><div class="col-xs-12 center-block all-drink-image" style="background: center no-repeat url(' + temp[x][1] + ') gray; height: 200px"></div></a></div>')
			}
		}).fail(function(jqXHR, status){
			console.log('error: ' + status);
		});
	}

})