<?php
$valor1=a;
$valor2=a;
function suma ($valor1,$valor2) /*depende de la suma, el AS vale 1 o 11 */
{
	if ($valor1=='a'||$valor2=='a'||$valor1=='a'&&$valor2=='a') 
	{
		if ($valor1=='a'&&$valor2=='a') 
		{
		$tot=20;
		}
		else if ($valor1=='a') {
						$tot=10+$valor2;
						if ($tot>21)
									{
									$tot=1+$valor2;
									}
							}
		else if ($valor2=='a') {
						$tot=10+$valor1;
						if ($tot>21)
									{
									$tot=1+$valor1;
									}
							}
	}
	else {
		$tot=$valor1+$valor2; 
		}
	return($tot);
	}

echo "total del crupier-> ".suma($valor1,$valor2);

?>