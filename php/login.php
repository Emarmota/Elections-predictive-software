<?php  

$mysqli = new mysqli("localhost", "root", "", "ams");
$mysqli->set_charset("utf8");
$usuario = $_REQUEST['usuario'];
$contra = $_REQUEST['contra'];

if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if(isset($usuario, $contra)){
	$sql = "SELECT IDUsuario, tipoUsuario from usuario where nombreUsuario = '$usuario'";
	if(!$result = $mysqli->query($sql)){
      die($mysqli->error);
    }else{
    	$datos = array();
      	if(!$result->num_rows==0){
			while($row = $result->fetch_assoc()){
				$usuario_recuperado = $row['IDUsuario'];
				$tipo = $row['tipoUsuario'];
		    	//$datos[] = $row;
			}
			$result->free();
			$contra_encriptada = sha1($contra);
			$sql2 = "SELECT IDUsuario from UsuarioContraseña where IDUsuario = '$usuario_recuperado' and Contraseña = '$contra_encriptada'";
			if(!$result = $mysqli->query($sql2)){
		      die($mysqli->error);
		    }else{
		      	if(!$result->num_rows==0){
					while($row = $result->fetch_assoc()){
				    	$datos2 = $row['IDUsuario'];
					}
				}else{
					$tipo = 0;
				}
			}
		}else{
			$tipo = 0;
		}
	}
	echo $tipo;
}
?>