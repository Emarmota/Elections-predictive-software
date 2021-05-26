<?php

  $db = new mysqli("localhost", "root", "", "ams");
  $db->set_charset("utf8");
if (!$db) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
  

$resultados = array();
$PE= 89332031;
$IP=0.6308;
$IVNul=0.0138;
$IE = 103.0927835;
$n = 4;
$e=4.5;
$CTPosRE= 0.886980004;
$CTNegRE=  0.863871237;
$CTNeuRE= 0.425552399;
	

  if($result = $db->query("SELECT count(*) as cuenta  FROM tuit WHERE Candidato = 'AMLO' or Candidato = 'JRC' or Candidato = 'RAC' or Candidato = 'JAMK'")){	
        while($row = $result->fetch_assoc()){
          $TT = $row['cuenta'];
      	}
      	$result->free();
    }
	//echo $TT;
	
	 if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'AMLO' AND tipo = 'Positivo'")){	
        while($row = $result->fetch_assoc()){
          $TPos1 = $row['cuenta'];
      	}   
     	$result->free(); 	
    }
   // echo $TPos1;
     if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'RAC' AND tipo = 'Positivo'")){	
        while($row = $result->fetch_assoc()){
          $TPos2 = $row['cuenta'];
      	}   
     	$result->free();

    }
    //echo $TPos2;
    if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'JAMK' AND tipo = 'Positivo'")){	
        while($row = $result->fetch_assoc()){
          $TPos3 = $row['cuenta'];
      	}   
     	$result->free(); 	
    }
     //echo $TPos3;
     if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'JRC' AND tipo = 'Positivo'")){	
        while($row = $result->fetch_assoc()){
          $TPos4 = $row['cuenta'];
      	}   
     	$result->free(); 	
    }
    //echo $TPos4;
	
	 if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'AMLO' AND tipo = 'Negativo'")){	
        while($row = $result->fetch_assoc()){
          $TNeg1 = $row['cuenta'];
      	}   
     	$result->free(); 	
    }
   // echo $TNeg1;
     if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'RAC' AND tipo = 'Negativo'")){	
        while($row = $result->fetch_assoc()){
          $TNeg2 = $row['cuenta'];
      	}   
     	$result->free(); 	
    }
    //echo $TNeg2;
    if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'JAMK' AND tipo = 'Negativo'")){	
        while($row = $result->fetch_assoc()){
          $TNeg3 = $row['cuenta'];
      	}   
     	$result->free(); 	
    }
     //echo $TNeg3;
     if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'JRC' AND tipo = 'Negativo'")){	
        while($row = $result->fetch_assoc()){
          $TNeg4 = $row['cuenta'];
      	}   
     	$result->free(); 	
    }
    //echo $TNeg4;
     if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'AMLO' AND tipo = 'Neutro'")){	
        while($row = $result->fetch_assoc()){
          $TNeu1 = $row['cuenta'];
      	}   
     	$result->free(); 	
    }
   // echo $TNeu1;
     if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'RAC' AND tipo = 'Neutro'")){	
        while($row = $result->fetch_assoc()){
          $TNeu2 = $row['cuenta'];
      	}   
     	$result->free(); 	
    }
    //echo $TNeu2;
    if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'JAMK' AND tipo = 'Neutro'")){	
        while($row = $result->fetch_assoc()){
          $TNeu3 = $row['cuenta'];
      	}   
     	$result->free(); 	
    }
     //echo $TNeu3;
     if($result = $db->query("SELECT count(*) as cuenta FROM tuit WHERE Candidato = 'JRC' AND tipo = 'Neutro'")){	
        while($row = $result->fetch_assoc()){
          $TNeu4 = $row['cuenta'];
      	}   
     	$result->free(); 	
    }
    //echo $TNeu4;
	
//primera grafica
	$resultados[]=$PVE1= ((($TPos1*$CTPosRE) + ($TNeg1*$CTNegRE) + ($TNeu1*$CTNeuRE))/$TT )* $IE;
	$PMinVE1= $PVE1-$e;
  if ($PMinVE1 < 0){
    $PMinVE1=0;
    }
  $resultados[]=$PMinVE1;
	$resultados[]=$PMaxVE1 = $PVE1+$e;

	$resultados[]=$PVE2= ((($TPos2*$CTPosRE) + ($TNeg2*$CTNegRE) + ($TNeu2*$CTNeuRE))/$TT )* $IE;
  $PMinVE2= $PVE2-$e;
   if ($PMinVE2 < 0){
    $PMinVE2=0;
    }

    $resultados[]=$PMinVE2;
  
	$resultados[]=$PMaxVE2 = $PVE2+$e;

	$resultados[]=$PVE3= ((($TPos3*$CTPosRE) + ($TNeg3*$CTNegRE) + ($TNeu3*$CTNeuRE))/$TT )* $IE;
  $PMinVE3= $PVE3-$e;
  if ($PMinVE3 < 0){
    $PMinVE3=0;
    }
  $resultados[]=$PMinVE3;
	$resultados[]=$PMaxVE3 = $PVE3+$e;

	$resultados[]=$PVE4= ((($TPos4*$CTPosRE) + ($TNeg4*$CTNegRE) + ($TNeu4*$CTNeuRE))/$TT )* $IE;
	$resultados[]=$PMinVE4= $PVE4-$e;
	$resultados[]=$PMaxVE4 = $PVE4+$e;
//segunda grafica

	$resultados[]=$VEx1 = ($PVE1 * $IP*$PE) /100;
	$resultados[]=$MinVE1 = ($PMinVE1 * $IP*$PE) /100;
	$resultados[]=$MaxVE1 = ($PMaxVE1 * $IP*$PE) /100;

	$resultados[]=$VEx2 = ($PVE2 * $IP*$PE) /100;
	$resultados[]=$MinVE2 = ($PMinVE2 * $IP*$PE) /100;
	$resultados[]=$MaxVE2 = ($PMaxVE2 * $IP*$PE) /100;

	$resultados[]=$VEx3 = ($PVE3 * $IP*$PE) /100;
	$resultados[]=$MinVE3 = ($PMinVE3 * $IP*$PE) /100;
	$resultados[]=$MaxVE3 = ($PMaxVE3 * $IP*$PE) /100;

	$resultados[]=$VEx4 = ($PVE4 * $IP*$PE) /100;
	$resultados[]=$MinVE4 = ($PMinVE4 * $IP*$PE) /100;
	$resultados[]=$MaxVE4 = ($PMaxVE4 * $IP*$PE) /100;
//tercer grafica

	$resultados[]=$VNE = $IVNul*$PE;
	$resultados[]=$MinVEE = $VNE + $MinVE1 + $MinVE2+ $MinVE3+ $MinVE4;
	$resultados[]=$MaxVEE = $VNE + $MaxVE1 + $MaxVE2+ $MaxVE3+ $MaxVE4;

	
	echo json_encode($resultados, JSON_UNESCAPED_UNICODE);



?>