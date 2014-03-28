<?php

session_start();

if (isset($_REQUEST['continuar']))
				{
	$numero[0]="./pica/a.jpg";
	$numero[1]="./pica/2.jpg";
	$numero[2]="./pica/3.jpg";
	$numero[3]="./pica/4.jpg";
	$numero[4]="./pica/5.jpg";
	$numero[5]="./pica/6.jpg";
	$numero[6]="./pica/7.jpg";
	$numero[7]="./pica/8.jpg";
	$numero[8]="./pica/9.jpg";
	$numero[9]="./pica/1.jpg";
	$numero[11]="./pica/j.jpg";
	$numero[12]="./pica/q.jpg";
	$numero[13]="./pica/k.jpg";
	$numero[14]="./cora/a.jpg";
	$numero[15]="./cora/2.jpg";
	$numero[16]="./cora/3.jpg";
	$numero[17]="./cora/4.jpg";
	$numero[18]="./cora/5.jpg";
	$numero[19]="./cora/6.jpg";
	$numero[20]="./cora/7.jpg";
	$numero[21]="./cora/8.jpg";
	$numero[22]="./cora/9.jpg";
	$numero[23]="./cora/1.jpg";
	$numero[24]="./cora/j.jpg";
	$numero[25]="./cora/q.jpg";
	$numero[26]="./cora/k.jpg";	
	$numero[27]="./romb/a.jpg";
	$numero[28]="./romb/2.jpg";
	$numero[29]="./romb/3.jpg";
	$numero[30]="./romb/4.jpg";
	$numero[31]="./romb/5.jpg";
	$numero[32]="./romb/6.jpg";
	$numero[33]="./romb/7.jpg";
	$numero[34]="./romb/8.jpg";
	$numero[35]="./romb/9.jpg";
	$numero[36]="./romb/1.jpg";
	$numero[37]="./romb/j.jpg";
	$numero[38]="./romb/q.jpg";
	$numero[39]="./romb/k.jpg";
	$numero[40]="./treb/a.jpg";
	$numero[41]="./treb/2.jpg";
	$numero[42]="./treb/3.jpg";
	$numero[43]="./treb/4.jpg";
	$numero[44]="./treb/5.jpg";
	$numero[45]="./treb/6.jpg";
	$numero[46]="./treb/7.jpg";
	$numero[47]="./treb/8.jpg";
	$numero[48]="./treb/9.jpg";
	$numero[49]="./treb/1.jpg";
	$numero[50]="./treb/j.jpg";
	$numero[51]="./treb/q.jpg";
	$numero[52]="./treb/k.jpg";
	$_SESSION['pedcarta']=1;
	$_SESSION['num']=$numero; /*copia la matriz a la sesion*/
	$_SESSION['saldo']=1000;
	$_SESSION['vap']=$_REQUEST['ap'];
	
	
 }
 
 if (isset($_REQUEST['nuevjueg'])||isset($_REQUEST['plantarse'])||isset($_REQUEST['pedir'])||isset($_REQUEST['doblar'])) /*si se inicializa la matriz*/
	{
	
	
echo "saldo antes de jugar->".$_SESSION['saldo'];
$_SESSION['vap']=$_REQUEST['ap'];
echo " apuesta->".$_SESSION['vap'];
	$numero=$_SESSION['num'];
	$get= count($numero)-1;
	
	function adnum(&$numero)
	{
		$get= count($numero)-1; /*cuenta la cadena*/
		$aleatorio= rand(0,$get); /*coge un numero aleatorio de la cadena*/
		echo "<img src=".$numero[$aleatorio]." width=40 weight=40></img>"; /*imprime la carta*/
		$_SESSION['c']=$numero[$aleatorio]; /*guarda la carta*/
		$sub=substr($numero[$aleatorio],7,1); /*coge el valor de la carta: a,1,2,3,4,5,6,7,8,9,j,q,k*/
		unset($numero[$aleatorio]); /*borra la carta del a matriz*/
		$numero = array_values($numero); /*quita los espacios nulos*/
		if ($sub=='j'||$sub=='q'||$sub=='k'||$sub==1) { 
									$sub=10;
									}
		return($sub); /*devuelve el valor de la carta: a,1,2,3,4,5,6,7,8,9,j,q,k*/
	} 
	
	function suma ($valor1,$valor2) /*depende de la suma, el AS vale 1 u 11 */
	{
	if ($valor1=='a'||$valor2=='a'||$valor1=='a'&&$valor2=='a') 
	{
		if ($valor1=='a'&&$valor2=='a') 
		{
		$tot=20;
		}
		else if ($valor1=='a') {
						$tot=11+$valor2;
						if ($tot>21)
									{
									$tot=1+$valor2;
									}
							}
		else if ($valor2=='a') {
						$tot=11+$valor1;
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
	/*
	echo "matriz sin borrar<br>";
		for($i=0;$i<=$get;$i++)
		{
			echo "<img src=".$numero[$i]." width=40 weight=40></img>";

		};*/
	if (isset($_REQUEST['plantarse'])) { echo "<br>has dedidido plantarte<br>"; 
										
			switch($_SESSION['pedcarta']-1)
				{
				case 0:
						?>
					<table border=1>
					
						<tr>
							<td>Crupier</td>
							<td><?php 	echo "<img src=".$_SESSION['carta1']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta2']." width=40 weight=40></img>"; ?></td> 
							<?php
										
									if ($_SESSION['totcru']<$_SESSION['totjug'])
										{ ?>
										<td> <?php $valor10=adnum($numero); $_SESSION['valor10']=$valor10; $_SESSION['carta10']=$_SESSION['c']; ?></td>
										
										<?php 
										
										$totcru=suma($_SESSION['totcru'],$valor10); $_SESSION['totcru']=$totcru;
										
										if ($_SESSION['totcru']<=$_SESSION['totjug']||$_SESSION['totcru']<17)
													{
													?>
													<td> <?php $valor11=adnum($numero); $_SESSION['valor11']=$valor11; $_SESSION['carta11']=$_SESSION['c']; ?></td>
													
												<?php
													$totcru=suma($_SESSION['totcru'],$valor11); $_SESSION['totcru']=$totcru;
													
														if ($_SESSION['totcru']<=$_SESSION['totjug'])
														{
														?>
														<td> <?php $valor12=adnum($numero); $_SESSION['valor12']=$valor12; $_SESSION['carta12']=$_SESSION['c']; ?></td>
														
													<?php
														$totcru=suma($_SESSION['totcru'],$valor12); $_SESSION['totcru']=$totcru;
														
														
														}
													}
										
										} ?>
									
							

							<td><?php echo $_SESSION['totcru']; ?></td>
						</tr>
						<tr>
							<td>jugador</td>
							<td><?php 	echo "<img src=".$_SESSION['carta3']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta4']." width=40 weight=40></img>"; ?></td>
							<td><?php echo $_SESSION['totjug'] ?></td>
						</tr>
					
					</table> 
					
					<?php
					$_SESSION['pedcarta']=1;
					
					if ($_SESSION['totcru']>21)
					 { ?>
					 <br>Has Ganado la partida<br>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
					<?php $_SESSION['saldo']=$_SESSION['saldo']+$_SESSION['vap'];
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php }
					else if (($_SESSION['totjug']<$_SESSION['totcru'])&&$_SESSION['totcru']<=21)
					{ ?>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">					
					<br>Has Perdido la partida<br>
					<?php $_SESSION['saldo']=$_SESSION['saldo']-$_SESSION['vap'];
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php 
					}
					
					else {  ?>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
					<br>Has Empatado<br>
					<?php 
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php 	
							}

					$get= count($numero)-1;
					if ($get<5) { ?>
									<input name="continuar" value="continuar" type="hidden">
						<?php	}
					?>
					</form>
					<?php
						
						break;
				
				
				case 1: ?>
					<table border=1>
					
						<tr>
							<td>Crupier</td>
							<td><?php 	echo "<img src=".$_SESSION['carta1']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta2']." width=40 weight=40></img>"; ?></td> 
							<?php
										
									if ($_SESSION['totcru']<$_SESSION['totjug'])
										{ ?>
										<td> <?php $valor10=adnum($numero); $_SESSION['valor10']=$valor10; $_SESSION['carta10']=$_SESSION['c']; ?></td>
										
										<?php 
										
										$totcru=suma($_SESSION['totcru'],$valor10); $_SESSION['totcru']=$totcru;
										
										if ($_SESSION['totcru']<=$_SESSION['totjug']||$_SESSION['totcru']<17)
													{
													?>
													<td> <?php $valor11=adnum($numero); $_SESSION['valor11']=$valor11; $_SESSION['carta11']=$_SESSION['c']; ?></td>
													
												<?php
													$totcru=suma($_SESSION['totcru'],$valor11); $_SESSION['totcru']=$totcru;
													
														if ($_SESSION['totcru']<=$_SESSION['totjug'])
														{
														?>
														<td> <?php $valor12=adnum($numero); $_SESSION['valor12']=$valor12; $_SESSION['carta12']=$_SESSION['c']; ?></td>
														
													<?php
														$totcru=suma($_SESSION['totcru'],$valor12); $_SESSION['totcru']=$totcru;
														
														
														}
													}
										
										} ?>
							<td><?php echo $_SESSION['totcru']; ?></td>
						</tr>
						<tr>
							<td>jugador</td>
							<td><?php echo "<img src=".$_SESSION['carta3']." width=40 weight=40></img>"; ?></td>
							<td><?php echo "<img src=".$_SESSION['carta4']." width=40 weight=40></img>"; ?></td>
							<td><?php echo "<img src=".$_SESSION['carta5']." width=40 weight=40></img>"; ?></td>
							<td><?php echo $_SESSION['totjug'] ?></td>
						</tr>
					
					</table> 
					<?php
					$_SESSION['pedcarta']=1;
					if ($_SESSION['totcru']>21)
					 { ?>
					 <br>Has Ganado la partida<br>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
					<?php $_SESSION['saldo']=$_SESSION['saldo']+$_SESSION['vap'];
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php }
					else if (($_SESSION['totjug']<$_SESSION['totcru'])&&$_SESSION['totcru']<=21)
					{ ?>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">					
					<br>Has Perdido la partida<br>
					<?php $_SESSION['saldo']=$_SESSION['saldo']-$_SESSION['vap'];
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php 
					}
					
					else {  ?>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
					<br>Has Empatado<br>
					<?php 
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php 	
							} 
					$get= count($numero)-1;
					if ($get<5) { ?>
									<input name="continuar" value="continuar" type="hidden">
						<?php	}
					?>
					</form>
					<?php
					
					break;
				case 2: ?>
					
					<table border=1>
					
						<tr>
							<td>Crupier</td>
							<td><?php 	echo "<img src=".$_SESSION['carta1']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta2']." width=40 weight=40></img>"; ?></td> 
							<?php
										
									if ($_SESSION['totcru']<$_SESSION['totjug'])
										{ ?>
										<td> <?php $valor10=adnum($numero); $_SESSION['valor10']=$valor10; $_SESSION['carta10']=$_SESSION['c']; ?></td>
										
										<?php 
										
										$totcru=suma($_SESSION['totcru'],$valor10); $_SESSION['totcru']=$totcru;
										
										if ($_SESSION['totcru']<=$_SESSION['totjug']||$_SESSION['totcru']<17)
													{
													?>
													<td> <?php $valor11=adnum($numero); $_SESSION['valor11']=$valor11; $_SESSION['carta11']=$_SESSION['c']; ?></td>
													
												<?php
													$totcru=suma($_SESSION['totcru'],$valor11); $_SESSION['totcru']=$totcru;
													
														if ($_SESSION['totcru']<=$_SESSION['totjug'])
														{
														?>
														<td> <?php $valor12=adnum($numero); $_SESSION['valor12']=$valor12; $_SESSION['carta12']=$_SESSION['c']; ?></td>
														
													<?php
														$totcru=suma($_SESSION['totcru'],$valor12); $_SESSION['totcru']=$totcru;
														
														
														}
													}
										
										} ?>

							<td><?php echo $_SESSION['totcru']; ?></td>
						</tr>
						<tr>
							<td>jugador</td>
							<td><?php 	echo "<img src=".$_SESSION['carta3']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta4']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta5']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta6']." width=40 weight=40></img>"; ?></td>
							<td><?php echo $_SESSION['totjug'] ?></td>
						</tr>
					
					</table> 
					<?php		
					
					
					$_SESSION['pedcarta']=1;
					if ($_SESSION['totcru']>21)
					 { ?>
					 <br>Has Ganado la partida<br>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
					<?php $_SESSION['saldo']=$_SESSION['saldo']+$_SESSION['vap'];
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php }
					else if (($_SESSION['totjug']<$_SESSION['totcru'])&&$_SESSION['totcru']<=21)
					{ ?>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">					
					<br>Has Perdido la partida<br>
					<?php $_SESSION['saldo']=$_SESSION['saldo']-$_SESSION['vap'];
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php 
					}
					
					else {  ?>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
					<br>Has Empatado<br>
					<?php 
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php 	
							}
					$get= count($numero)-1;
					if ($get<5) { ?>
									<input name="continuar" value="continuar" type="hidden">
						<?php	}
					?>
					</form>
					<?php
					break;
				case 3: ?>
					
					<table border=1>
					
						<tr>
							<td>Crupier</td>
							<td><?php 	echo "<img src=".$_SESSION['carta1']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta2']." width=40 weight=40></img>"; ?></td> 
							<?php
										
									if ($_SESSION['totcru']<$_SESSION['totjug'])
										{ ?>
										<td> <?php $valor10=adnum($numero); $_SESSION['valor10']=$valor10; $_SESSION['carta10']=$_SESSION['c']; ?></td>
										
										<?php 
										
										$totcru=suma($_SESSION['totcru'],$valor10); $_SESSION['totcru']=$totcru;
										
										if ($_SESSION['totcru']<=$_SESSION['totjug']||$_SESSION['totcru']<17)
													{
													?>
													<td> <?php $valor11=adnum($numero); $_SESSION['valor11']=$valor11; $_SESSION['carta11']=$_SESSION['c']; ?></td>
													
												<?php
													$totcru=suma($_SESSION['totcru'],$valor11); $_SESSION['totcru']=$totcru;
													
														if ($_SESSION['totcru']<=$_SESSION['totjug'])
														{
														?>
														<td> <?php $valor12=adnum($numero); $_SESSION['valor12']=$valor12; $_SESSION['carta12']=$_SESSION['c']; ?></td>
														
													<?php
														$totcru=suma($_SESSION['totcru'],$valor12); $_SESSION['totcru']=$totcru;
														
														
														}
													}
										
										} ?>

							<td><?php echo $_SESSION['totcru']; ?></td>
						</tr>
						<tr>
							<td>jugador</td>
							<td><?php 	echo "<img src=".$_SESSION['carta3']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta4']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta5']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta6']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta7']." width=40 weight=40></img>"; ?></td>
							<td><?php echo $_SESSION['totjug'] ?></td>
						</tr>
					
					</table> 
					<?php if ($_SESSION['totcru']>21)
					 { ?>
					 <br>Has Ganado la partida<br>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
					<?php $_SESSION['saldo']=$_SESSION['saldo']+$_SESSION['vap'];
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php }
					else if (($_SESSION['totjug']<$_SESSION['totcru'])&&$_SESSION['totcru']<=21)
					{ ?>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">					
					<br>Has Perdido la partida<br>
					<?php $_SESSION['saldo']=$_SESSION['saldo']-$_SESSION['vap'];
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php 
					}
					
					else {  ?>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
					<br>Has Empatado<br>
					<?php 
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php 	
							}
					$get= count($numero)-1;
					if ($get<5) { ?>
									<input name="continuar" value="continuar" type="hidden">
						<?php	}
					?>
					</form>
					<?php
					break;
				case 4: ?>
					
					<table border=1>
					
						<tr>
							<td>Crupier</td>
							<td><?php 	echo "<img src=".$_SESSION['carta1']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta2']." width=40 weight=40></img>"; ?></td> <?php
										
									if ($_SESSION['totcru']<$_SESSION['totjug'])
										{ ?>
										<td> <?php $valor10=adnum($numero); $_SESSION['valor10']=$valor10; $_SESSION['carta10']=$_SESSION['c']; ?></td>
										
										<?php 
										
										$totcru=suma($_SESSION['totcru'],$valor10); $_SESSION['totcru']=$totcru;
										
										if ($_SESSION['totcru']<=$_SESSION['totjug']||$_SESSION['totcru']<17)
													{
													?>
													<td> <?php $valor11=adnum($numero); $_SESSION['valor11']=$valor11; $_SESSION['carta11']=$_SESSION['c']; ?></td>
													
												<?php
													$totcru=suma($_SESSION['totcru'],$valor11); $_SESSION['totcru']=$totcru;
													
														if ($_SESSION['totcru']<=$_SESSION['totjug'])
														{
														?>
														<td> <?php $valor12=adnum($numero); $_SESSION['valor12']=$valor12; $_SESSION['carta12']=$_SESSION['c']; ?></td>
														
													<?php
														$totcru=suma($_SESSION['totcru'],$valor12); $_SESSION['totcru']=$totcru;
														
														
														}
													}
										
										} ?>

							<td><?php echo $_SESSION['totcru']; ?></td>
						</tr>
						<tr>
							<td>jugador</td>
							<td><?php 	echo "<img src=".$_SESSION['carta3']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta4']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta5']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta6']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta7']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta8']." width=40 weight=40></img>"; ?></td>
							<td><?php echo $_SESSION['totjug'] ?></td>
						</tr>
					
					</table> 
					<?php
					
					if ($_SESSION['totcru']>21)
					 { ?>
					 <br>Has Ganado la partida<br>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
					<?php $_SESSION['saldo']=$_SESSION['saldo']+$_SESSION['vap'];
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php }
					else if (($_SESSION['totjug']<$_SESSION['totcru'])&&$_SESSION['totcru']<=21)
					{ ?>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">					
					<br>Has Perdido la partida<br>
					<?php $_SESSION['saldo']=$_SESSION['saldo']-$_SESSION['vap'];
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php 
					}
					
					else {  ?>
					<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
					<br>Has Empatado<br>
					<?php 
					echo "saldo actual-> ".$_SESSION['saldo'];?>
					<br>Nueva apuesta:<input name="ap" type="text">
					<input name="abc" value="Apostar" type="submit">
					</form>
					
					<?php 	
							} 
					$get= count($numero)-1;
					if ($get<5) { ?>
									<input name="continuar" value="continuar" type="hidden">
						<?php	}
					?>
					</form>
					<?php
					break;
				}
				
									} 
				else if (isset($_REQUEST['doblar'])) {
													$valor5=adnum($numero); 
													$_SESSION['valor5']=$valor5; 													
													$_SESSION['carta5']=$_SESSION['c'];													
													$_SESSION['totjug']=suma($_SESSION['totjug'],$valor5);													
													?>
													<table border=1>
													
														<tr>
															<td>Crupier</td>
															<td><?php 	echo "<img src=".$_SESSION['carta1']." width=40 weight=40></img>";
																		echo $valor1=$_SESSION['valor1']; ?></td>
															<td><?php 	echo "<img src=".$_SESSION['carta2']." width=40 weight=40></img>";
																		echo $valor2=$_SESSION['valor2']; ?></td> <?php
																		
																	if ($_SESSION['totcru']<$_SESSION['totjug'])
																		{ ?>
																		<td> <?php $valor10=adnum($numero); echo $_SESSION['valor10']=$valor10; $_SESSION['carta10']=$_SESSION['c']; ?></td>
																		
																		<?php 
																		
																		$totcru=suma($_SESSION['totcru'],$valor10); $_SESSION['totcru']=$totcru;
																		
																		if ($_SESSION['totcru']<=$_SESSION['totjug']||$_SESSION['totcru']<17)
																					{
																					?>
																					<td> <?php $valor11=adnum($numero); echo $_SESSION['valor11']=$valor11; $_SESSION['carta11']=$_SESSION['c']; ?></td>
																					
																				<?php
																					$totcru=suma($_SESSION['totcru'],$valor11); $_SESSION['totcru']=$totcru;
																					
																						if ($_SESSION['totcru']<=$_SESSION['totjug'])
																						{
																						?>
																						<td> <?php $valor12=adnum($numero); echo $_SESSION['valor12']=$valor12; $_SESSION['carta12']=$_SESSION['c']; ?></td>
																						
																					<?php
																						$totcru=suma($_SESSION['totcru'],$valor12); $_SESSION['totcru']=$totcru;
																						
																						
																						}
																					}
																		
																		} ?>
																	
															

															<td><?php echo $_SESSION['totcru']; ?></td>
														</tr>
														<tr>
															<td>jugador</td>
															<td><?php 	echo "<img src=".$_SESSION['carta3']." width=40 weight=40></img>";
																		echo $valor3=$_SESSION['valor3']; ?></td>
															<td><?php 	echo "<img src=".$_SESSION['carta4']." width=40 weight=40></img>";
																		echo $valor4=$_SESSION['valor4']; ?></td>
															<td> <?php echo "<img src=".$_SESSION['carta5']." width=40 weight=40></img>";
																		echo $_SESSION['valor5'];?></td>
															<td><?php echo $_SESSION['totjug']; ?></td>
														</tr>
													
													</table> 
													
													<?php
													$_SESSION['pedcarta']=1;
													
													if ($_SESSION['totcru']>21&&$_SESSION['totjug']<21&&$_SESSION['totjug']>$_SESSION['totcru'])
													 { ?>
													 <br>Has Ganado la partida<br>
													<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
													<?php $_SESSION['saldo']=$_SESSION['saldo']+($_SESSION['vap']*2);
													echo "saldo actual-> ".$_SESSION['saldo'];?>
													<br>Nueva apuesta:<input name="ap" type="text">
													<input name="abc" value="Apostar" type="submit">
													</form>
													
													<?php }
													else if (($_SESSION['totjug']<$_SESSION['totcru'])||$_SESSION['totcru']<=21&&$_SESSION['totjug']>21)
													{ ?>
													<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">					
													<br>Has Perdido la partida<br>
													<?php $_SESSION['saldo']=$_SESSION['saldo']-($_SESSION['vap']*2);
													echo "saldo actual-> ".$_SESSION['saldo'];?>
													<br>Nueva apuesta:<input name="ap" type="text">
													<input name="abc" value="Apostar" type="submit">
													</form>
													
													<?php 
													}
													
													else {  ?>
													<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
													<br>Has Empatado<br>
													<?php 
													echo "saldo actual-> ".$_SESSION['saldo'];?>
													<br>Nueva apuesta:<input name="ap" type="text">
													<input name="abc" value="Apostar" type="submit">
													</form>
													
													<?php 	
															}
													$get= count($numero)-1;
													if ($get<5) { ?>
																	<input name="continuar" value="continuar" type="hidden">
														<?php	}
													?>
													</form>
													<?php
													}
	else if (isset($_REQUEST['nuevjueg'])) { 
	
	?>
			
				<table border=1>
	<tr>
		<td>Crupier</td>
		<td><?php $valor1=adnum($numero); $_SESSION['valor1']=$valor1; $_SESSION['carta1']=$_SESSION['c']; ?></td>
		<td><?php $valor2=adnum($numero); $_SESSION['valor2']=$valor2; $_SESSION['carta2']=$_SESSION['c']; ?></td>
		<td><?php $totcru=suma($valor1,$valor2); $_SESSION['totcru']=$totcru; ?></td>
	</tr>
	<tr>
		<td>jugador</td>
		<td><?php $valor3=adnum($numero); $_SESSION['valor3']=$valor3; $_SESSION['carta3']=$_SESSION['c']; ?></td>
		<td><?php $valor4=adnum($numero); $_SESSION['valor4']=$valor4; $_SESSION['carta4']=$_SESSION['c']; ?></td>
		<td><?php echo $totjug=suma($valor3,$valor4); $_SESSION['totjug']=$totjug; $_SESSION['pedcarta']=1; ?></td>
	</tr>
	
	</table>
	<?php if ($_SESSION['totjug']==21) { ?>
										<br> gana Blackjack!<br>
										<?php $_SESSION['saldo']=$_SESSION['saldo']+($_SESSION['vap']*2);
												echo "saldo actual-> ".$_SESSION['saldo'];?>
												
												<br>Nueva apuesta:<input name="ap" type="text">
												<input name="abc" value="Apostar" type="submit">
												</form>
												
										 <?php }
	else if ($_SESSION['totcru']==21) { ?>
										<br> pierde Blackjack!<br>
										<?php $_SESSION['saldo']=$_SESSION['saldo']-($_SESSION['vap']*2);
												echo "saldo actual-> ".$_SESSION['saldo'];?>
												
												<br>Nueva apuesta:<input name="ap" type="text">
												<input name="abc" value="Apostar" type="submit">
												</form>
												
										 <?php }
										
										
	else {
	?>			
	<form action="./blackjack2.php" method="post" align="center">
	<input name="plantarse" value="plantarse" type="submit">
	<input name="pedir" value="pedir" type="submit">
	<input name="doblar" value="doblar" type="submit">
	<input name="ap" value="<?php echo $_REQUEST['ap']; ?>" type="hidden">
	</form>
	
							<?php }
			}
	else if (isset($_REQUEST['pedir'])) 
		{ 	echo "<br>has clickado pedir<br>"; 
			
			switch($_SESSION['pedcarta'])
				{
				case 1: ?>
					<table border=1>
					
						<tr>
							<td>Crupier</td>
							<td><?php 	echo "<img src=".$_SESSION['carta1']." width=40 weight=40></img>"; ?></td>
							<td><img src="./pica/mc.jpg" width="40" weight="40"></img></td>
							<td> </td>
							<td> ? </td>
						</tr>
						<tr>
							<td>jugador</td>
							<td><?php 	echo "<img src=".$_SESSION['carta3']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta4']." width=40 weight=40></img>"; ?></td>
							<td> <?php $valor5=adnum($numero); $_SESSION['valor5']=$valor5; $_SESSION['carta5']=$_SESSION['c']; ?></td>
							<td><?php echo $_SESSION['totjug']=suma($_SESSION['totjug'],$valor5); ?></td>
						</tr>
					
					</table> 
					<?php
					$_SESSION['pedcarta']=2;
					if ($_SESSION['totjug']>21) {
												?> 
												<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
												Has perdido<br>
												<?php $_SESSION['saldo']=$_SESSION['saldo']-$_SESSION['vap'];
												echo "saldo actual-> ".$_SESSION['saldo'];?>
												<br>Nueva apuesta:<input name="ap" type="text">
												<input name="abc" value="Apostar" type="submit">
												</form>
												<?php
												$get= count($numero)-1;
												if ($get<5) { ?>
																<input name="continuar" value="continuar" type="hidden">
													<?php	}
												
												}
					else {
					?> 
					<form action="./blackjack2.php" method="post" align="center">
					<input name="plantarse" value="plantarse" type="submit">
					<input name="pedir" value="pedir" type="submit">
					<input name="ap" value="<?php echo $_REQUEST['ap']; ?>" type="hidden">
					<?php 
					$get= count($numero)-1;
					if ($get<5) { ?>
									<input name="continuar" value="continuar" type="hidden">
						<?php	} ?>
					</form>
					<?php	}
					break;
				case 2: ?>
					
					<table border=1>
					
						<tr>
							<td>Crupier</td>
							<td><?php 	echo "<img src=".$_SESSION['carta1']." width=40 weight=40></img>"; ?></td>
							<td><img src="./pica/mc.jpg" width="40" weight="40"></img></td>
							<td> </td>
							<td> </td>
							<td> ? </td>
						</tr>
						<tr>
							<td>jugador</td>
							<td><?php 	echo "<img src=".$_SESSION['carta3']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta4']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta5']." width=40 weight=40></img>"; ?></td>
							<td> <?php $valor6=adnum($numero); $_SESSION['valor6']=$valor6; $_SESSION['carta6']=$_SESSION['c']; ?></td>
							<td><?php echo $_SESSION['totjug']=suma($_SESSION['totjug'],$valor6); ?></td>
						</tr>
					
					</table> 
					<?php		
					
					
					$_SESSION['pedcarta']=3;
					if ($_SESSION['totjug']>21) {
												?>
												<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
												Has perdido<br>
												<?php $_SESSION['saldo']=$_SESSION['saldo']-$_SESSION['vap'];
												echo "saldo actual-> ".$_SESSION['saldo'];?>
												<br>Nueva apuesta:<input name="ap" type="text">
												<input name="abc" value="Apostar" type="submit">
												</form>
												<?php
												$get= count($numero)-1;
												if ($get<5) { ?>
																<input name="continuar" value="continuar" type="hidden">
													<?php	}
												}
					else {
					?>  
					<form action="./blackjack2.php" method="post" align="center">
					<input name="plantarse" value="plantarse" type="submit">
					<input name="pedir" value="pedir" type="submit">
					<input name="ap" value="<?php echo $_REQUEST['ap']; ?>" type="hidden">
					<?php 
					$get= count($numero)-1;
					if ($get<5) { ?>
									<input name="continuar" value="continuar" type="hidden">
						<?php	} ?>
					</form>
					<?php }
					break;
				case 3: ?>
					
					<table border=1>
					
						<tr>
							<td>Crupier</td>
							<td><?php 	echo "<img src=".$_SESSION['carta1']." width=40 weight=40></img>"; ?></td>
							<td><img src="./pica/mc.jpg" width="40" weight="40"></img></td>
							<td> </td>
							<td> </td>
							<td> ? </td>
						</tr>
						<tr>
							<td>jugador</td>
							<td><?php 	echo "<img src=".$_SESSION['carta3']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta4']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta5']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta6']." width=40 weight=40></img>"; ?></td>
							<td><?php $valor7=adnum($numero); $_SESSION['valor7']=$valor7; $_SESSION['carta7']=$_SESSION['c']; ?></td>
							<td><?php echo $_SESSION['totjug']=suma($_SESSION['totjug'],$valor7); ?></td>
						</tr>
					
					</table> 
					<?php
					
					$_SESSION['pedcarta']=4;
					if ($_SESSION['totjug']>21) {
												?> 
												<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
												Has perdido<br>
												<?php $_SESSION['saldo']=$_SESSION['saldo']-$_SESSION['vap'];
												echo "saldo actual-> ".$_SESSION['saldo'];?>
												<br>Nueva apuesta:<input name="ap" type="text">
												<input name="abc" value="Apostar" type="submit">
												</form>
												<?php 
												$get= count($numero)-1;
												if ($get<5) { ?>
																<input name="continuar" value="continuar" type="hidden">
													<?php	}
												}
					else { ?> 
					<form action="./blackjack2.php" method="post" align="center">
					<input name="plantarse" value="plantarse" type="submit">
					<input name="pedir" value="pedir" type="submit">
					<input name="ap" value="<?php echo $_REQUEST['ap']; ?>" type="hidden">
					<?php 
					$get= count($numero)-1;
					if ($get<5) { ?>
									<input name="continuar" value="continuar" type="hidden">
						<?php	} ?>
					</form>
					<?php }
					break;
				case 4: ?>
					
					<table border=1>
					
						<tr>
							<td>Crupier</td>
							<td><?php 	echo "<img src=".$_SESSION['carta1']." width=40 weight=40></img>"; ?></td>
							<td><img src="./pica/mc.jpg" width="40" weight="40"></img></td>
							<td> </td>
							<td> </td>
							<td> ? </td>
						</tr>
						<tr>
							<td>jugador</td>
							<td><?php 	echo "<img src=".$_SESSION['carta3']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta4']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta5']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta6']." width=40 weight=40></img>"; ?></td>
							<td><?php 	echo "<img src=".$_SESSION['carta7']." width=40 weight=40></img>"; ?></td>
							<td> <?php $valor8=adnum($numero); $_SESSION['valor8']=$valor7; $_SESSION['carta8']=$_SESSION['c']; ?></td>
							<td><?php echo $_SESSION['totjug']=suma($_SESSION['totjug'],$valor8); ?></td>
						</tr>
					
					</table> 
					<?php
					
					$_SESSION['pedcarta']=5;
					if ($_SESSION['totjug']>21) {
												?> 
												<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
												Has perdido<br>
												<?php $_SESSION['saldo']=$_SESSION['saldo']-$_SESSION['vap'];
												echo "saldo actual-> ".$_SESSION['saldo'];?>
												<br>Nueva apuesta:<input name="ap" type="text">
												<input name="abc" value="Apostar" type="submit">
												</form>
												<?php 
												$get= count($numero)-1;
												if ($get<5) { ?>
																<input name="continuar" value="continuar" type="hidden">
													<?php	}
												}
					else { ?> 
					<form action="./blackjack2.php" method="post" align="center">
					<input name="plantarse" value="plantarse" type="submit">
					<input name="pedir" value="pedir" type="submit">
					<input name="ap" value="<?php echo $_REQUEST['ap']; ?>" type="hidden">
					<?php 
					$get= count($numero)-1;
					if ($get<5) { ?>
									<input name="continuar" value="continuar" type="hidden">
						<?php	} ?>
					</form>
					<?php }
					break;
				}
				
		}
	

	
	
		/*
		$get= count($numero)-1;
		for($i=0;$i<=$get;$i++)
		{
			echo "<img src=".$numero[$i]." width=40 weight=40></img>";

		};*/

	

	$_SESSION['num']=$numero; /*pasa el valor de la matriz a la sesion*/
	
		
	}

 else  {  ?>
	<form action="./blackjack2.php?nuevjueg=1" method="post" align="center">
	<fieldset><legend>Bienvenido al juego de blackjack</legend>
	Dispones de 1000€ para apostar.<br>
	introduce tu apuesta<br>
	<input name="ap" type="text"><br>
	<input name="continuar" value="continuar" type="submit">
	</fieldset>
	</form>
 
		<?php
		
		}
		
?>
