$(document).ready(function(){
$("#sistema").on('click', '#login' ,function(event){

		event.preventDefault();
		var usr = $("#usuario").val();
		var psw = $("#contra").val();
		if(usr != "" && psw != ""){
			$.post("http://localhost/login.php",{usuario: usr , contra: psw}, function (data){
				var resultado = data;
				
				if(resultado == "admin"){
					window.location.href = "admin1.html";
				}else{
					window.location.href = "user1.html";
				}
			});		
		}else{
			alert("Favor de llenar los campos");
		}
		
	});
});

