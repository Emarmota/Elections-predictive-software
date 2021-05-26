$(document).ready(function(){
$("#sistema").on('click', '#registrar' ,function(event){
		
		event.preventDefault();
		alert("entro");
		var usr = $("#usuario").val();
		var psw = $("#contra").val();
		var correo = $("#correo").val();
		var rep_contra = $("#rep_contra").val();
		
		if(rep_contra == psw){
			$.post("http://localhost/agregarUsuario.php",{usuario: usr ,correo: correo, contra: psw }, function (data){
				var resultado = data;
				
				if(resultado == 1){
					window.location.href = "user1.html";
				}else{
					alert("Ocurrio un error");
				}
			});	
		}else{
			alert("Las contraseñas deben de coincidir");
		}
			
	});
});

