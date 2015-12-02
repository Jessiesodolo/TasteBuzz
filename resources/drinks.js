
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

    var a = ValidateAdmin();

    // These Ajax calls aren't working, the calls are fine but the php function is not returning any data
    //
   $.ajax({
      
       type: "POST",
       url: 'admin_query.php',
       data:{action:'getUsers'},
       success:function(data) {
        $('.terms.drink').first().html(data);
       }, error: function(msg) {
                  // there was a problem
            console.log("There was a problem: " + msg.status + " " + msg.statusText);
          }

    });

   $.ajax({
       type: "GET",
       url: 'admin_query.php',
       data:{action:'getDrinks'},
       success:function(data) {
        $('.terms users').html(data);
       }
    });

   // =====================================
	var params = parseQueryString();
	//console.log(params["type"]);
	if(params["type"] == 'best'){
		$.ajax({
			url: 'query.php',
			method: 'POST',
			data: {action: 'getSortedDrinks'}
		}).done(function(data){
			console.log(data);
			var temp = JSON.parse(data);
			console.log(temp);
		}).fail(function(jqXHR, status){
			console.log('error: ' + status);
		});
	}
	else if (params['type'] == 'all'){
		$.ajax({
			url: 'query.php',
			method: 'POST',
			data: {action : 'getAllDrinks'}
		}).done(function(data){
			var temp = JSON.parse(data);
			for(x in temp){
				$('#allDrinks').append('<div class="col-lg-4"><a href="#"><img src="' + temp[x][1] + '"></a></div>')
			}
			console.log(temp);
		}).fail(function(jqXHR, status){
			console.log('error: ' + status);
		});
	}




})