
		
				<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					
					$nazwa_zakladki="dane_zalaczniki";
					
					include "menu_boczne.inc"?>
				</div>
	
	
				<!-- div prawy -->
				<div class="bg-success col-10" style="-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%">	
                
                <!-- wyświetlenie danych, gdy dane zostaną potwierdzone -->
		
		
			

					
							<form method="post">

							<div style="display:none;">
							<b>Twój login</b>
							<input type="text" name="konto" value="<?php echo $konto1;?>" readonly>

							<input type="text" name="insert_update" value="insert">
							</div>


							<?php

							//data złożenia wniosku
							//if($disabled=='disabled')
							//echo "<div style='display:none'>";		//zamknąć tego diva jeszcze

							//potwierdzenie danych
							//if($potwierdzenie=='disabled')
							//echo "<div style='display:none'>";		//zamknąć tego diva jeszcze
							
							if($disabled=='disabled')
								{
								$data='readonly';
								}
								
								if($potwierdzenie=='disabled')
								{
								$zatwierdzony='readonly';
								}

							?>


							<br />
							<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


							<h2>Załączniki</h2><br />
							
							<span id="star">Maksymalna ilość załączników : 10</span><br />

							Nazwa załącznika<span id="star">*</span><br />
							<input class="form-control" style="width:400px;" name="zalacznik" type="text" placeholder="Nazwa załącznika" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Nazwa załącznika. Możesz wprowadzić tylko litery i liczby" <?php echo $data ?> <?php echo $zatwierdzony ?> required><br /><br />

							<?php
							if($disabled=='disabled' || $potwierdzenie=='disabled')
										{
										
										}
										else
										{
								echo "<input class='btn btn-warning' type='submit' name='submit' value='Dodaj załącznik'>";
}
								?>


							</form>


<br />

<a name="zalaczniki"></a>
<h3>Twoje załączniki</h3>

<?php

$licz=0;
$id_zalacznika=1;


echo "<table border=1 style=border-collapse: collapse>";
		
		echo "<tr>";
		echo "<td width='30px'>Id</td>";
		echo "<td width='400px'>Nazwa zalacznika</td>";
		
		
		echo "</tr>";
		
		

$dane_zalaczniki_pobierz = $db -> query("SELECT * FROM dane_zalaczniki where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");

		foreach($db->results() as $dane_zalaczniki)
				{
		
		$licz++;
		
		echo "<tr>";
		//echo "<td>".$r['id']."</td>";
		$id=$dane_zalaczniki->id;
		echo "<td width='30px'>$id_zalacznika</td>";
		echo "<td width='400px'>$dane_zalaczniki->zalacznik</td>";
		
		if($disabled=='' && $potwierdzenie=='')
		{
		echo "<td><a href='dane_zalaczniki_edit.php?id=$id&dane_wniosku=$dane_wniosku'>Edytuj</a></td>";
		echo "<td><a href='dane_zalaczniki_delete.php?id=$id&dane_wniosku=$dane_wniosku'>Usuń</a></td>";
		}
		
		$id_zalacznika++;
		
		
		 echo "</tr>";
    }
    echo "</table>";


		
		//request komunikatu
		$komunikat=$_REQUEST['komunikat'];
?>


<style>

.success {
  -webkit-animation: seconds 1.0s forwards;
  -webkit-animation-iteration-count: 1;
  -webkit-animation-delay: 5s;
  animation: seconds 1.0s forwards;
  animation-iteration-count: 1;
  animation-delay: 5s;
  position: relative;
    
}
@-webkit-keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px; 
    position: absolute;   
  }
}
@keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
    position: absolute;     
  }
}

</style>

<?php
if($komunikat!="")
echo "<div class='success'><h4 style='color:red'>$komunikat</h4></div>";
?>


<?php


if($licz>9)
{
echo "<br /><br /><b>Nie można dodać więcej załączników</b>";
}

else
{
   if(isset($_POST['submit']))
	 {
				 $konto=$_POST['konto'];
					
         $zalacznik=$_POST['zalacznik'];

         
				 
				 
				 
				 
				 $dane_zalaczniki_dodaj = $db -> query("INSERT INTO dane_zalaczniki (id, konto, dane_wniosku, zalacznik) VALUES (NULL, '$jakie_konto', '$dane_wniosku', '$zalacznik')");
				 
				 header("Location: dane_zalaczniki.php?dane_wniosku=$dane_wniosku");
				 
	 }
}

?>

										<br />
										<table border="0">
										<tr>
										<td>
										<?php
										echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 0px 0px;border: none;border-radius: 4px;cursor: pointer;' href='dane_dodatkowe.php?dane_wniosku=$dane_wniosku'>Cofnij</a>";?>
										</td>
										
										<td>
										<?php
										if($disabled=='disabled' || $potwierdzenie=='disabled')
										{
										
										}
										else
										{
										echo "<form method='post'><input class='btn btn-success' type='submit' name='submit2' value='Zapisz'></form>";
										}
										?>
										</td>
										
										<td>
								<?php
										echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 0px 0px;border: none;border-radius: 4px;cursor: pointer;' href='dane_potwierdzenie.php?dane_wniosku=$dane_wniosku'>Dalej</a>";
										?>
								</td>
								</tr>
								</table>
								
								
								<?php
										if(isset($_POST['submit2']))
											{
													
											$dane_zalaczniki_zakladka = $db -> query("UPDATE sprawdzanie SET stan='tak' where zakladka='dane_zalaczniki' and konto='$jakie_konto' AND wniosek='$dane_wniosku'");
											
											
											header("Location: dane_zalaczniki.php?dane_wniosku=$dane_wniosku");
										}
				 
									
								?>
								<br /><br />




					
					<?php
					if($disabled=='disabled' || $potwierdzenie=='disabled')
					{
					
					}
					else
					{
					echo "<h2 id='star'>Kliknij przycisk Zapisz, aby zapisać dane</h2>";
					}
					?>
					
				</div>
				<!-- koniec diva prawego -->
			</div>
			<!-- koniec podział strony na 2 części w propocjach 2:10 -->
					
	</div>		
</div>


