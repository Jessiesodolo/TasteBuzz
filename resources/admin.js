$(document).ready(function(){
	$.ajax({
		
		type: "POST",
		url: 'admin_query.php',
		data:{action:'getDrinks'},
		success:function(data) {
			var drinkData = JSON.parse(data);
			/*$('.terms.drink').append("<p>ID Name</p>");*/
			for(i = 0; i < drinkData.length; i++){
				jObj = drinkData[i];
				$('.terms.drink').first().append("<p>" + jObj["id"]+" "+jObj["dname"] + "</p>");
			}
		}, 
		error: function(msg) {
			// there was a problem
            console.log("There was a problem: " + msg.status + " " + msg.statusText);
		}
		
	});
	
	$.ajax({
		type: "POST",
		url: 'admin_query.php',
		data:{action:'getUsers'},
		success:function(data) {
			var drinkData = JSON.parse(data);
			$('.terms.drink').first().append("<p>ID Name</p>");
			for(i = 0; i < drinkData.length; i++){
				jObj = drinkData[i];
				$('.terms.user').first().append("<p>" + jObj["id"]+" "+jObj["fname"] + " " + jObj["lname"]+ " " + jObj["email"] + "</p>");
			}
			}, error: function(msg) {
			// there was a problem
            console.log("There was a problem: " + msg.status + " " + msg.statusText);
		}
	});
});