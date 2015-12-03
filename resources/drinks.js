
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

	if(!params["pageNumber"]){
		params["pageNumber"] = 1;
	}
	console.log(params['pageNumber']);

	//console.log(params["type"]);
	if(params["type"] == 'best'){
		$('#drinks-header').html('<div class="page-header"><h1 style="color: white;">The Drink For You</h1></div>');
		$.ajax({
			url: 'query.php',
			method: 'POST',
			data: {action: 'getSortedDrinks'}
		}).done(function(data){
			console.log(data);
			var temp = JSON.parse(data);
			console.log(temp);
			var count = 1;
			/*$.ajax({
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
			});*/
			$.ajax({
				method: 'POST',
				data: {action: 'getDrinkInfo', drinkName: temp[0][1]},
				url: 'query.php'
			}).done(function(data){
				var bestDrink = JSON.parse(data);
				console.log(bestDrink);
				$('#best-drink').append('<div class="media"><div class="media-left">' + 
					'<img class="media-object" id="drink-image" src="' + bestDrink.img_addr + '"></div><div'+
					' class="media-body"><h2 class="media-title"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>' + bestDrink.dname + ' |<small>Best Match!</small> </h2><p>' + bestDrink.description + '</p></div></div>');
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
		$('#drinks-header').html('<div class="page-header"><h1 style="color: white">All Drinks</h1></div>');
		$('#drink-search').html('<div class="row" style="margin-bottom: 15px;"><div class="col-lg-6 col-lg-offset-3"><div class="input-group"><input type="text" class="form-control" placeholder="Search By Traits"><span class="input-group-btn"><button class="btn btn-default" type="button">Go!</button></span></div><!-- /input-group --></div><!-- /.col-lg-6 --></div>');
		$('.featurette-divider').hide();
		$.ajax({
			url: 'query.php',
			method: 'POST',
			data: {action : 'getPage', pageNumber: params['pageNumber']}
		}).done(function(data){
			console.log(data);
			var temp = JSON.parse(data);
			var count = 0;
			for(x in temp){
				var name = temp[x].dname;
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
		if(params['pageNumber'] && params['pageNumber'] > "1"){
			$("#drink-pagination").append('<li><a href="drinks.php?type=' + params["type"] +'&pageNumber=' + String(Number(params["pageNumber"]) - 1) + '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>')
		}
		else{
			$("#drink-pagination").append('<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>')
		}
		for(x = 1; x <= 5; x++){
			$("#drink-pagination").append('<li id="'+ x +'"><a href="drinks.php?type=' + params["type"] + '&pageNumber='+ x +'">' + x + '</a></li>')
		}
		if(params['pageNumber'] && params['pageNumber'] < "5"){
			$('#drink-pagination').append('<li><a href="drinks.php?type=' + params["type"] +'&pageNumber=' + String(Number(params["pageNumber"]) + 1) + '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>')
		}
		else{
			$("#drink-pagination").append('<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>')
		}

		$('#' + params['pageNumber']).addClass('active');
	}



	/*
	<li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
*/


})