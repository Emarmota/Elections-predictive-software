<?php  

$mysqli = new mysqli("localhost", "root", "", "ams");
$mysqli->set_charset("utf8");
$idCandidato = $_REQUEST['idCandidato'];
$nombre = $_REQUEST['nombre'];
$pseudonimo = $_REQUEST['pseudonimo'];
$foto = $_REQUEST['foto'];
$iniciales = $_REQUEST['iniciales'];
$nacimiento = $_REQUEST['nacimiento'];
$puesto = $_REQUEST['puesto'];
$idPartido = $_REQUEST['idPartido'];

if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$outcome = 0;
if(isset($idCandidato, $nombre, $pseudonimo, $foto, $iniciales, $nacimiento, $puesto)){
	$sql = "INSERT INTO candidato(IDCandidato, nombre, pseudonimo, foto, InicialesCandidato, LugarNacimiento, PuestoAspirante) VALUES ('$idCandidato','$nombre','$pseudonimo','$foto','$iniciales','$nacimiento','$puesto')";
	if(!$result = $mysqli->query($sql)){
      die($mysqli->error);
    }else{
    	$sql2 = "INSERT INTO PartidoCandidato(IDPartido, IDCandidato) VALUES ('$idPartido', '$idCandidato')";
		if(!$result = $mysqli->query($sql2)){
	      die($mysqli->error);
	    }
    	$outcome = 1;
	}
	echo $outcome;
}
?>