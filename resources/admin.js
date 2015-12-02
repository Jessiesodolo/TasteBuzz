function ValidateAdmin(){
	$("#adddrink").click(function(){
		if(!$("#ddes").val() || !$("#Dname").val() || !$("#imgurl").val() ){ 
            alert("Please fill in all fields");
            return false;
		}
	});
	
	
	$("#removedrink").submit(function(){
		if(!$("#drinkID").val() || !$("#drinkName").val()){
			alert("Please fill in all fields");
			return false;
		}
		
	});
	
	$("#Admin").submit(function(){
		if(!$("#addadmin").val()){
			alert("Please fill in all fields");
			return false;
		}
		
	});
	
	$("#Removeuser").submit(function(){
		if(!$("#lastName").val() || !$("#firstName").val()  || !$("#Userid ").val()){
			alert("Please fill in all fields");
			return false;
		} 
	});
}


$(document).ready(function(){
	
    //var a = ValidateAdmin();
	
    // These Ajax calls aren't working, the calls are fine but the php function is not returning any data
    //
	$.ajax({
		
		type: "POST",
		url: 'admin_query.php',
		data:{action:'getDrinks'},
		success:function(data) {
			var drinkData = JSON.parse(data);
			$('.terms.drink').first().append("<p>ID Name</p>");
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