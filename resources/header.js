
//function to request logout and redirect
function logout(){
	$.ajax({
		url: 'login.php',
		method: 'POST',
		data: {action: 'logout', function: 'logout'},
		success: function(data){
			window.location.href = 'index.php';
		}
	})
}