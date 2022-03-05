
		
		
						<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					
					$nazwa_zakladki='dane_osiagniecia';
					
					include "menu_boczne.inc"
					
					?>
				</div>
	
	
				<!-- div prawy -->
				<div class="bg-success col-10" style="-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%">
		
		
		
		
		
								<form method="post">

								<div style="display:none;">
								<b>Twój login</b>
								<input type="text" name="konto" value="<?php echo $konto1;?>" readonly>

								<input type="text" name="insert_update" value="insert">
								</div>

								<br />

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

								<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


								<h2>Informacje o osiągnięciach</h2>
								<br />
								
								<span id="star">Maksymalna ilość osiągnięć : 5</span>
								<br />

								<table>
								<tr>
								<td>
								Nazwa osiągnięcia<span id="star">*</span><br />
								<input class="form-control" style="width:400px;" name="osiagniecie" type="text" placeholder="Nazwa osiągnięcia" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Osiągnięcie. Możesz wprowadzić tylko litery i liczby" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								</td>
								<tr>

								<tr>
								<td>
								Data osiągnięcia(DD.MM.RRRR)<span id="star">*</span><br />
								<input class="form-control" style="width:200px;" name="data_osiagniecia" type="text" placeholder="Data osiągniecia" pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}" title="Błedne dane w polu Data osiągnięcia. Możesz wprowadzić tylko cyfry w formacie DD.MM.RRRR" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								</td>
								</tr>

								<tr>
								<td>
								Zajęte miejsce<br />
								<input class="form-control" style="width:400px;" name="zajete_miejsce" type="text" placeholder="Zajęte miejsce" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Miejsce osiągnięcia. Możesz wprowadzić tylko litery i liczby"<?php echo $data ?> <?php echo $zatwierdzony ?> >
								</td>
								</tr>

								<tr>
								<td>
								Informacje dodatkowe<br />
								<input class="form-control" style="width:400px;" name="informacje_dodatkowe" type="text" placeholder="Inoformacje dodatkowe" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Informacje o osiągnięciu. Możesz wprowadzić tylko litery i liczby" <?php echo $data ?> <?php echo $zatwierdzony ?>>
								</td>
								</tr>
								</table>


								<br />

								<?php
									if($disabled=='disabled' || $potwierdzenie=='disabled')
										{
										
										}
										else
										{
										echo "<input class='btn btn-warning' type='submit' name='submit' value='Dodaj osiągniecie'>";
}
								?>

								</form>








<br />
<a name="twoje_osiagniecia"></a>
<h3>Twoje osiągnięcia</h3>

<?php

 

$licz=0;
$id_osiagniecia=1;







echo "<table  border=1 style=border-collapse: collapse>";
		
		echo "<tr>";
		echo "<td width='30px'>Id</td>";
		echo "<td width='200px'>Nazwa osiągnięcia</td>";
		echo "<td width='100px'>Data</td>";
		echo "<td width='120px'>Zajęte miejsce</td>";
		echo "<td width='120px'>Inoformacje dodatkowe</td>";
		
		echo "</tr>";
		
		echo "</table>";

		
		echo "<table  border=1 style=border-collapse: collapse>";
		
		$dane_osiagniecia_pobierz=$db->query("SELECT * FROM dane_osiagniecia where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");
		
		foreach($db->results() as $dane_osiagniecia)
 {
		//echo "<tr><td>hh</td></tr>";
		
		
		echo "<tr>";
		
		$id=$dane_osiagniecia->id;
		echo "<td width='30px'>$id_osiagniecia</td>";
		echo "<td width='200px'>$dane_osiagniecia->osiagniecie</td>";
		echo "<td width='100px'>$dane_osiagniecia->data_osiagniecia</td>";
		echo "<td width='120px'>$dane_osiagniecia->zajete_miejsce</td>";
		echo "<td width='120px'>$dane_osiagniecia->informacje_dodatkowe</td>";
		
		if($disabled=='' && $potwierdzenie=='')
		{
		echo "<td><a href='dane_osiagniecia_edit.php?id=$id&dane_wniosku=$dane_wniosku'>Edytuj</a></td>";
		echo "<td><a href='dane_osiagniecia_delete.php?id=$id&dane_wniosku=$dane_wniosku'>Usuń</a></td>";
		}
		
		$id_osiagniecia++;
		
		
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


if($licz>=5)
{
echo "<br /><br /><b>Nie można dodać więcej osiagnięć</b>";
}

else
{
   if(isset($_POST['submit']))
	 {
				 $konto=$jakie_konto;
					
         $osiagniecie=$_POST['osiagniecie'];

         $data_osiagniecia=$_POST['data_osiagniecia'];
				 
				 $zajete_miejsce=$_POST['zajete_miejsce'];
				 
				 $informacje_dodatkowe=$_POST['informacje_dodatkowe'];
				 
				 echo "64";
				 
				 
				 $send_dane_osiagniecia = $db -> query("INSERT INTO dane_osiagniecia (id, konto, dane_wniosku, osiagniecie, data_osiagniecia, zajete_miejsce, informacje_dodatkowe) VALUES (NULL, '$jakie_konto', '$dane_wniosku', '$osiagniecie', '$data_osiagniecia', '$zajete_miejsce', '$informacje_dodatkowe')");
				 
				 header("Location: dane_osiagniecia.php?dane_wniosku=$dane_wniosku");
				 
	 }
}

?>



<br /><br />
								<table border="0">
										<tr>
										<td>
										<?php echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 8px;border: none;border-radius: 4px;cursor: pointer;' href='dane_dochody.php?dane_wniosku=$dane_wniosku'>Cofnij</a>";?>
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
								<?php echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 8px;border: none;border-radius: 4px;cursor: pointer;' href='dane_dodatkowe.php?dane_wniosku=$dane_wniosku'>Dalej</a>";?>
								</td>
								</tr>
								</table>
								
								
								
								<?php
										if(isset($_POST['submit2']))
											{
													
													
											$update_dane_osiagniecia_zakladka = $db -> query("UPDATE sprawdzanie SET stan='tak' where zakladka='dane_osiagniecia' and konto='$jakie_konto' AND wniosek='$dane_wniosku'") ;

											
											echo "";
											
											
											header("Location: dane_osiagniecia.php?dane_wniosku=$dane_wniosku");
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
					
