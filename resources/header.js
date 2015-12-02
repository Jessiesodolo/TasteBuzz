

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