<?php  

$mysqli = new mysqli("localhost", "root", "", "ams");
$mysqli->set_charset("utf8");
$usuario = $_REQUEST['usuario'];
$correo = $_REQUEST['correo'];
$contra = $_REQUEST['contra'];

if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$outcome = 0;
if(isset($usuario, $contra, $contra)){
	$sql = "INSERT INTO usuario (nombreUsuario, tipoUsuario, Status) VALUES ('$usuario','usuario',1)";
	if(!$result = $mysqli->query($sql)){
      die($mysqli->error);
    }else{
    	$id = $mysqli->insert_id;
    	$contra_encriptada = sha1($contra);
    	//$result->free();
      	$sql2 = "INSERT INTO UsuarioContraseña (IDUsuario, Contraseña) VALUES('$id', '$contra_encriptada')";
    	if(!$result = $mysqli->query($sql2)){
	      die($mysqli->error);
	    }else{
	    	//$result->free();
	    	$sql3 = "INSERT INTO Contraseña (ContraseñaUsuario, CorreoRecuperación) VALUES('$contra_encriptada', '$correo')";
	    	if(!$result = $mysqli->query($sql3)){
		      die($mysqli->error);
		    }else{
		    	$outcome = 1;
		    }	
	    }  	
	}
	echo $outcome;
}
?>