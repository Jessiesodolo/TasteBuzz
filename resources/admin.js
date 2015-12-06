$(document).ready(function(){
	

	$.ajax({//ajax request to get all drinks
		type: "POST",
		url: 'admin_query.php',
		data:{action:'getDrinks'},
		success:function(data) {
			var drinkData = JSON.parse(data);
			$('.terms.drink').append("<p>ID Name : Traits - (traitnum,trait)...</p>");
			for(var i = 0; i < drinkData.length; i++){
				jObj = drinkData[i];
				var subjObj = jObj[2];
				var stringBuilder = "<p>" + jObj[0]+" "+jObj[1] + " : ";
				for(var j = 0; j < subjObj.length; j++){
					stringBuilder += "(" + subjObj[j]["traitnum"] + "," + subjObj[j]["trait"] + ") ";
				}
				stringBuilder += "</p>";
				$('.terms.drink').first().append(stringBuilder);
			}
		}, 
		error: function(msg) {
			// there was a problem
            console.log("There was a problem: " + msg.status + " " + msg.statusText);
		}
		
	});
	
	
	$.ajax({//request to get all users
		type: "POST",
		url: 'admin_query.php',
		data:{action:'getUsers'},
		success:function(data) {
			var drinkData = JSON.parse(data);
			for(var i = 0; i < drinkData.length; i++){
				jObj = drinkData[i];
				$('.terms.user').first().append("<p>" + jObj["id"]+" "+jObj["fname"] + " " + jObj["lname"]+ " " + jObj["email"] + "</p>");
			}
		},
		error: function(msg) {
			// there was a problem
            console.log("There was a problem: " + msg.status + " " + msg.statusText);
		}
	});
});