<?php

session_start();



if ($_SESSION['usuario']==1)
				{
	$numero[0]="A";
	$numero[1]= "1";
	$numero[2]= "2";
	$numero[3]= "3";
	$numero[4]= "4";
	$numero[5]= "5";
	$numero[6]= "6";
	$numero[7]= "7";
	$numero[8]= "8";
	$numero[9]= "9";
	$numero[10]= "J";
	$numero[11]= "Q";
	$numero[12]= "K";
	echo "lo hace<br>";
	$_SESSION['usuario']=2;
	$_SESSION['num']=$numero;
 }
 
 if (isset($_SESSION['num'])) {

$get= count($numero)-1; /*saber la longitud de la cadena*/
$aleatorio= rand(0,$get); /*conseguir un numero aleatorio de como maximo la longitud de la cadena*/
echo "matriz sin borrar<br>";
for($i=0;$i<=$get;$i++)
 {
 echo $numero[$i].",";
 };
 echo "<br>";
echo "El numero aleatorio es: ".$numero[$aleatorio]; 
/*borrar el valor*/
unset($numero[$aleatorio]);
/*copiar la matriz en ella misma para quitar el caracter en blanco*/
$numero = array_values($numero);
echo "<br>matriz borrada<br>";
for($i=0;$i<=count($numero)-1;$i++)
 {
 echo $numero[$i].",";
 };
		}

 else  { echo "dale otra vez"; 
		$_SESSION['usuario']=1;
		}
	
?>
