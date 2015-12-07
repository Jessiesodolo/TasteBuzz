
//function to parse url to access parameters
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
	//url parameters
	var params = parseQueryString();

	//check for page number
	if(!params["pageNumber"]){
		params["pageNumber"] = 1;
	}

	//if looking for best drink
	if(params["type"] == 'best'){
		$('#drinks-header').html('<div class="page-header"><h1 style="color: white;">The Drink For You</h1></div>');
		$.ajax({//request sorted drinks
			url: 'query.php',
			method: 'POST',
			data: {action: 'getSortedDrinks'}
		}).done(function(data){

			var temp = JSON.parse(data);
			var count = 1;

			$.ajax({//request drink information for the best drink
				method: 'POST',
				data: {action: 'getDrinkInfo', drinkName: temp[0][1]},
				url: 'query.php'
			}).done(function(data){
				var bestDrink = JSON.parse(data);

				$('#best-drink').append('<div class="media"><div class="media-left">' + 
					'<img class="media-object" id="drink-image" src="' + bestDrink.img_addr + '"></div><div'+
					' class="media-body"><h2 class="media-title"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>' + bestDrink.dname + ' |<small>Best Match!</small> </h2><p>' + bestDrink.description + '</p></div></div>');
			});

			//iterate over list of ordered drinks
			for(var x = 1; x < temp.length; x++){
				var name = temp[x][1];
				(function(x){//function allows x to be correct value within ajax call due to asynchronous issues and keep everything ordered as necessary
					$.ajax({//ajax request for a drinks information based upon drink name
						method: 'POST',
						data: {action: 'getDrinkInfo', drinkName: name},
						url: 'query.php'
					}).done(function(data){
						var drink = JSON.parse(data);

						//if statement is to alternate left and right justified images
						if(count%2 == 0){//even number
							count++;
							$('#allDrinks').append('<div class="media"><div class="media-left">' + 
							'<img class="media-object" id="drink-image" src="' + drink.img_addr + '"></div><div'+
							' class="media-body"><h2 class="media-title">' + drink.dname + '</h2><p>' + drink.description + '</p></div></div>');
						}
						else{ //odd number
							count++;
							$('#allDrinks').append('<div class="media"><div class="media-body"><h2 class="media-title">' + 
								drink.dname + '</h2><p>' + drink.description + '</p></div><div class="media-right">' + 
							'<img class="media-object" id="drink-image" src="' + drink.img_addr + '"></div></div>');
						}
					}).fail(function(jqXHR, status){
						console.log('error: ' + status);
					});
				})(x);
			}
		}).fail(function(jqXHR, status){
			console.log('error: ' + status);
		});
	}
	else if (params['type'] == 'all'){//if requesting all drinks
		$('#drinks-header').html('<div class="page-header"><h1 style="color: white">All Drinks</h1></div>');
		$('#drink-search').html('<div class="row" style="margin-bottom: 15px;"><div class="col-lg-6 col-lg-offset-3"><div class="input-group"><input type="text" class="form-control" placeholder="Search By Traits"><span class="input-group-btn"><button class="btn btn-default" type="button">Go!</button></span></div><!-- /input-group --></div><!-- /.col-lg-6 --></div>');
		$('.featurette-divider').hide();
		$.ajax({ //request for drinks based upon page number
			url: 'query.php',
			method: 'POST',
			data: {action : 'getPage', pageNumber: params['pageNumber']}
		}).done(function(data){
			
			var temp = JSON.parse(data);
			var count = 0;

			for(x in temp){//iterate over drink names
				var name = temp[x].dname;
				console.log(name);

				(function(x){//function allows x to be correct value within ajax call due to asynchronous issues and keep everything ordered as necessary
					$.ajax({ //request to retrieve a drinks information based upon drink name
						method: 'POST',
						data: {action: 'getDrinkInfo', drinkName: name},
						url: 'query.php'
					}).done(function(data){
						
						var drink = JSON.parse(data);
						//if statement is to alternate left and right justified images
						if(count%2 == 0){ //even number
							count++;
							
							$('#allDrinks').append('<div class="media"><div class="media-left">' + 
							'<img class="media-object" id="drink-image" src="' + drink.img_addr + '"></div><div'+
							' class="media-body"><h2 class="media-title">' + drink.dname + '</h2><p>' + drink.description + '</p></div></div>')
						}
						else{ //odd number
							count++;
							
							$('#allDrinks').append('<div class="media"><div class="media-body"><h2 class="media-title">' + 
								drink.dname + '</h2><p>' + drink.description + '</p></div><div class="media-right">' + 
							'<img class="media-object" id="drink-image" src="' + drink.img_addr + '"></div></div>')
						}

					}).fail(function(jqXHR, status){
						console.log('error: ' + status);
					});
				})(x);
			}
		}).fail(function(jqXHR, status){
			console.log('error: ' + status);
		});

		//if statement to ajust the linkage of the previous button
		if(params['pageNumber'] && params['pageNumber'] > "1"){
			$("#drink-pagination").append('<li><a href="drinks.php?type=' + params["type"] +'&pageNumber=' + String(Number(params["pageNumber"]) - 1) + '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>')
		}
		else{
			$("#drink-pagination").append('<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>')
		}

		var numPages;
		$.ajax({//retrieve number of pages
			type: 'POST',
			data: {action: 'getNumPages'},
			url: 'query.php'
		}).done(function(data){
			console.log(data);
			numPages = Math.ceil(Number(data));

			//append page numbers
			for(x = 1; x <= numPages; x++){
				$("#drink-pagination").append('<li id="'+ x +'"><a href="drinks.php?type=' + params["type"] + '&pageNumber='+ x +'">' + x + '</a></li>')
			}

			//statement to adjust linkage for next button
			if(params['pageNumber'] && Number(params['pageNumber']) < numPages){
				$('#drink-pagination').append('<li><a href="drinks.php?type=' + params["type"] +'&pageNumber=' + String(Number(params["pageNumber"]) + 1) + '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>')
			}
			else{
				$("#drink-pagination").append('<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>')
			}

			//set visual for which page on
			$('#' + params['pageNumber']).addClass('active');
		});


	}

});