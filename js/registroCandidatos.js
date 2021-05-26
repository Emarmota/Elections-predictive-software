$(document).ready(function(){
$("#sistema").on('click', '#agregar' ,function(event){

		event.preventDefault();
		var idPartido = $("#idPartido").val();
		var idCandidato = $("#idCandidato").val();
		var nombre = $("#nombrePartido").val();
		var pseudonimo = $("#pseudonimo").val();
		var foto = $("#foto").val();
		var iniciales = $("#iniciales").val();
		var lugar = $("#lugar").val();
		var puesto = $("#puesto").val();
		if(idCandidato != "" && nombre != "" && pseudonimo != "" && iniciales != "" && lugar != "" && puesto != ""){
			alert("entro al if");
			$.post("http://localhost/agregarCandidato.php",{idCandidato: idCandidato, nombre: nombre, pseudonimo: pseudonimo, foto: foto, iniciales: iniciales, nacimiento: lugar, puesto: puesto, idPartido: idPartido}, function (data){
				var resultado = data;
				
				if(resultado == 1){
					window.location.href = "admin1.html";
				}else{
					alert(resultado);
				}
			});		
		}else{
			alert("Favor de llenar los campos");
		}
		
	});
});

