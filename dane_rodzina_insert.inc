
		
		
		<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					$nazwa_zakladki="dane_rodzina";
					
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


<h2>Informacje o rodzinie</h2>

<br />
<span id="star">Maksymalna ilość członków rodziny : 10</span><br />
<table>
<tr>
<td>
Imię<span id="star">*</span><br />
<input class="form-control" style="width:400px;" name="rodzina_imie" type="text" placeholder="Imię" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Członek rodziny Imię. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
</td>

<td>
Nazwisko<span id="star">*</span><br />
<input class="form-control" style="width:400px;" name="rodzina_nazwisko" type="text" placeholder="Nazwisko" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Członek rodziny Nazwisko. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
</td>
</tr>


<td>
Pokrewieństwo<span id="star">*</span><br />
<select name="rodzina_pokrewienstwo" class="form-control" style="width:400px" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
<option value="wybor">Wybierz jedną opcję</option>
<option value="ojciec">ojciec</option>
<option value="matka">matka</option>
<option value="brat">brat</option>
<option value="siostra">siostra</option>
<option value="dziadek">dziadek</option>
<option value="babcia">babcia</option>
</select>
</td>

<td>
Adres zatrudnienia lub nauki<span id="star">*</span><br />
<input class="form-control" style="width:400px;" name="rodzina_miejsce_n_z" type="text" placeholder="M-ce nauki, zatrudnienia" size="22" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Członek rodziny Miejsce zatrudnienia, nauki. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
</td>

<tr>
<td>
Data urodzenia(DD.MM.RRRR)<span id="star">*</span><br />
<input class="form-control" style="width:200px;" name="rodzina_data_u" type="text" placeholder="Data urodzenia" pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}" title="Błedne dane w polu Członek rodziny Data urodzenia. Możesz wprowadzić tylko cyfry w formacie DD.RR.MMMM" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
</td>

</tr>
</table>

<br /><br />

<?php
if($disabled=='disabled' || $potwierdzenie=='disabled')
										{
										
										}
										else
										{
echo "<input class='btn btn-warning' type='submit' name='submit' value='Dodaj członka rodziny'>";
}
?>


</form>

<br /><br />




<a name="czlonkowie_rodziny"></a>
<?php

$licz=0;
$id_czlonka=1;



echo "<h2>Członkowie Twojej rodziny</h2>";
echo "<table  border=1 style=border-collapse: collapse>";
		
		echo "<tr>";
		echo "<td width='30px'>Id</td>";
		echo "<td width='80px'>Imię</td>";
		echo "<td width='100px'>Nazwisko</td>";
		echo "<td width='120px'>Data urodzenia</td>";
		echo "<td width='120px'>Pokrewieństwo</td>";
		echo "<td width='230px'>Adres zatrudnienia, nauki</td>";
		echo "<td colspan='2' style='text-align:center;'>Akcje</td>";
		echo "</tr>";
		
		
$dane_rodzina_pobierz = $db -> query("SELECT * FROM dane_rodzina where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");
		foreach($db->results() as $dane_rodzina)
				{
		
		$licz++;
		
		echo "</tr>";
		//echo "<td>".$r['id']."</td>";
		$id=$dane_rodzina->id;
		echo "<td width='30px'>$id_czlonka</td>";
		echo "<td width='80px'>$dane_rodzina->rodzina_imie</td>";
		echo "<td width='100px'>$dane_rodzina->rodzina_nazwisko</td>";
		echo "<td width='120px'>$dane_rodzina->rodzina_data_u</td>";
		echo "<td width='120px'>$dane_rodzina->rodzina_pokrewienstwo</td>";
		echo "<td width='300px'>$dane_rodzina->rodzina_miejsce_n_z</td>";
		
		if($disabled=='' && $potwierdzenie=='')
		{
		echo "<td><a href='dane_rodzina_edit.php?id=$id&dane_wniosku=$dane_wniosku'>Edytuj</a></td>";
		echo "<td><a href='dane_rodzina_delete.php?id=$id&dane_wniosku=$dane_wniosku'>Usuń</a></td>";
		}
		
		$id_czlonka++;
		
		
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


if($licz>=10)
{
echo "<br /><br /><b>Nie można dodać więcej członków rodziny</b>";
}

else
{
   if(isset($_POST['submit']))
	 {
				 $konto=$_POST['konto'];
					
         $rodzina_imie=$_POST['rodzina_imie'];

         $rodzina_nazwisko=$_POST['rodzina_nazwisko'];
				 
				 $rodzina_data_u=$_POST['rodzina_data_u'];
				 
				 $rodzina_pokrewienstwo=$_POST['rodzina_pokrewienstwo'];
				 
				 $rodzina_miejsce_n_z=$_POST['rodzina_miejsce_n_z'];
				 
				 if($rodzina_pokrewienstwo=='wybor')
				 {
				 //echo "<h3 style='color:red;'>Nie wybrano żadnego pokrewieństwa</h3>";
				 echo '<script language="javascript">';
echo 'alert("Nie wybrano żadnego pokrewieństwa")';
echo '</script>';
				 }
				 else
				 {
				 $dane_rodzina_dodaj= $db -> query("INSERT INTO dane_rodzina (id, konto, dane_wniosku, rodzina_imie, rodzina_nazwisko, rodzina_data_u, rodzina_pokrewienstwo, rodzina_miejsce_n_z) VALUES (NULL, '$jakie_konto', '$dane_wniosku', '$rodzina_imie', '$rodzina_nazwisko', '$rodzina_data_u', '$rodzina_pokrewienstwo', '$rodzina_miejsce_n_z')");
				 
				 header("Location: dane_rodzina.php?dane_wniosku=$dane_wniosku");
				 }
				 
	 }
}



?>

<br /><br />
										<table border="0">
										<tr>
										<td>
										<?php
										echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 0px 0px;border: none;border-radius: 4px;cursor: pointer;' href='dane_szkola.php?dane_wniosku=$dane_wniosku'>Cofnij</a>";
										?>
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
										echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 0px 0px;border: none;border-radius: 4px;cursor: pointer;' href='dane_dochody.php?dane_wniosku=$dane_wniosku'>Dalej</a>";
										?>
								</td>
								</tr>
								</table>
								<br /><br />
								
								
								
								<?php
										if(isset($_POST['submit2']))
											{
													
											$dane_rodzina_zakladka = $db -> query("UPDATE sprawdzanie SET stan='tak' where zakladka='dane_rodzina' and konto='$jakie_konto' AND wniosek='$dane_wniosku'");

											
											
											header("Location: dane_rodzina.php?dane_wniosku=$dane_wniosku");
										}
				 
									

													
								
											
								?>

				
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
					
	