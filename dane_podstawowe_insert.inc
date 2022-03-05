<?php
		//$aktualny_rok=date("Y");
		//$data_wniosku = substr($dane_wniosku, -19);
		//echo $data_wniosku;
		//$rok_wniosku=explode("-",$data_wniosku);
		//echo $rok_wniosku[0];

		//if($aktualny_rok!=$rok_wniosku[0])
		//{
			//$zatwierdzony='readonly';
			//echo "różne";
		//}
		
		//sprawdzenie czy istnieją rekordy w tabeli sprawdzenie, jeśli nie to dodaje rekrdy do tabeli
		$Zapytanie_czy_istnieja_zakladki_w_bazie = $db -> query("SELECT * FROM sprawdzanie WHERE konto='$jakie_konto' AND wniosek='$dane_wniosku'");
				
				$licz_zakladki=0;
				foreach($db->results() as $zakladki)
				{
				$licz_zakladki++;
				}
				
				if($licz_zakladki!=0)
				{

				}
				else
				{
				$dodaj_zakladke_dane_podstawowe = $db -> query("INSERT INTO sprawdzanie (id, konto, wniosek, zakladka, stan) VALUES (NULL, '$jakie_konto', '$dane_wniosku', 'dane_podstawowe', 'nie')");
				$dodaj_zakladke_dane_szkola = $db -> query("INSERT INTO sprawdzanie (id, konto, wniosek, zakladka, stan) VALUES (NULL, '$jakie_konto', '$dane_wniosku', 'dane_szkola', 'nie')");
				$dodaj_zakladke_dane_rodzina = $db -> query("INSERT INTO sprawdzanie (id, konto, wniosek, zakladka, stan) VALUES (NULL, '$jakie_konto', '$dane_wniosku', 'dane_rodzina', 'nie')");
				$dodaj_zakladke_dane_dochody = $db -> query("INSERT INTO sprawdzanie (id, konto, wniosek, zakladka, stan) VALUES (NULL, '$jakie_konto', '$dane_wniosku', 'dane_dochody', 'nie')");
				$dodaj_zakladke_dane_osiagniecia = $db -> query("INSERT INTO sprawdzanie (id, konto, wniosek, zakladka, stan) VALUES (NULL, '$jakie_konto', '$dane_wniosku', 'dane_osiagniecia', 'nie')");
				$dodaj_zakladke_dane_dodatkowe = $db -> query("INSERT INTO sprawdzanie (id, konto, wniosek, zakladka, stan) VALUES (NULL, '$jakie_konto', '$dane_wniosku', 'dane_dodatkowe', 'nie')");
				$dodaj_zakladke_dane_zalaczniki = $db -> query("INSERT INTO sprawdzanie (id, konto, wniosek, zakladka, stan) VALUES (NULL, '$jakie_konto', '$dane_wniosku', 'dane_zalaczniki', 'nie')");
				}
			
		
		
		
		
		?>
		
			<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					
					$nazwa_zakladki="dane_podstawowe";
					
					include "menu_boczne.inc"
					
					?>
				</div>
	
	
				<!-- div prawy -->
				<div class="bg-success col-10" style="-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%">
				
				
					<form method="post">

						<div style="display:none;">
						<b>Twój login</b>
						<input type="text" name="konto" value="<?php echo $konto;?>" readonly>

						<input type="text" name="insert_update" value="insert">
						</div>


						<?php

						//data złożenia wniosku
						//if($disabled=='disabled')
						//echo "<div style='display:none'>";		//zamknąć tego diva jeszcze
						
						if($disabled=='disabled')
								{
								$data='readonly';
								}

						?>

						<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


						<h2>Informacje o wnioskodawcy</h2>

						<table>
						<tr>

						<td>
						Imię<span id="star">*</span><br />    
						<input class="form-control" type="text" name="imie" placeholder="Imię" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Imię. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?>  required> 
						<br /><br />
						</td>

						<td>
						Nazwisko<span id="star">*</span><br />
						<input class="form-control" type="text" name="nazwisko" placeholder="Nazwisko" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Nazwisko. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						</tr>


						<tr>

						<td width="250px">
						Data urodzenia(DD.MM.RRRR)<span id="star">*</span><br />
						<input class="form-control" type="text" name="data_u" placeholder="Data urodzenia" pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}" title="Błedne dane w polu Data urodzenia. Możesz wprowadzić tylko cyfry w formacie DD.MM.RRRR" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						<td width="250px">
						Miejsce urodzenia<span id="star">*</span><br />
						<input class="form-control" type="text" name="miejsce_u" placeholder="Miejsce urodzenia" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Miejsce urodzenia. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						<td width="250px">
						PESEL<span id="star">*</span><br />
						<input class="form-control" type="text" name="pesel" maxlength="11" placeholder="PESEL" pattern="[0-9]{11}" title="Błedne dane w polu PESEL. Możesz wprowadzić tylko cyfry (11 cyfr)" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						</tr>

						<tr><td><b>Dokładny adres zamieszkania:</b></td></tr>
						
						<tr>
						<td>
						Powiat<span id="star">*</span><br />
						<input class="form-control" type="text" name="powiat" placeholder="Powiat" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Powiat. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						<td>
						Gmina<span id="star">*</span><br />
						<input class="form-control" type="text" name="gmina" placeholder="Gmina" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Gmina. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						<td>
						Ulica<span style="color:white" id="star">*</span> (jeśli brak, zostaw puste)<br />
						<input class="form-control" type="text" name="ulica" placeholder="Ulica" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Ulica. Możesz wprowadzić tylko litery i cyfry" <?php echo $data ?> <?php echo $zatwierdzony ?> >
						<br /><br />
						</td>

						</tr>


						<tr>

						<td>
						Nr domu<span id="star">*</span><br />
						<input class="form-control" type="text" name="nr_domu" placeholder="Numer domu" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Numer domu. Możesz wprowadzić tylko litery i cyfry" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						<td>
						Nr lokalu<span style="color:white" id="star">*</span> (jeśli brak, zostaw puste)<br />
						<input class="form-control" type="text" name="nr_lokalu" placeholder="Numer lokalu" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Numer lokalu. Możesz wprowadzić tylko litery i cyfry" <?php echo $data ?> <?php echo $zatwierdzony ?> >
						<br /><br />
						</td>

						</tr>


						<tr>

						<td>
						Miejscowość<span id="star">*</span><br />
						<input class="form-control" type="text" name="miejscowosc" placeholder="Miejscowość" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Miejscowość. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						<td>
						Kod pocztowy<span id="star">*</span><br />
						<input class="form-control" type="text" name="kod" placeholder="Kod pocztowy [XX-XXX]" pattern="^\d{2}-\d{3}$" title="Błedne dane w polu Nazwisko. Możesz wprowadzić tylko cyfry w formacie XX-XXX" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						<td>
						Poczta<span id="star">*</span><br />
						<input class="form-control" type="text" name="poczta" placeholder="Poczta" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Poczta. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						</tr>


						<tr>
						<td>
						Numer	tel. opiekuna<span id="star">*</span><br />
						<input class="form-control" type="text" name="nr_opiekuna" maxlength="9" placeholder="Numer opiekuna" pattern="[0-9]{9}" title="Błedne dane w polu Numer opiekuna. Możesz wprowadzić tylko cyfry (9 cyfr)" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						<td>
						Numer	tel. komórkowego<span id="star">*</span><br />
						<input class="form-control" type="text" name="nr_komorkowy" maxlength="9" placeholder="Numer komórkowy" pattern="[0-9]{9}" title="Błedne dane w polu Numer komórkowy. Możesz wprowadzić tylko cyfry (9 cyfr)" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						<td>
						Adres	e-mail<span id="star">*</span><br />
						<input class="form-control" type="text" name="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Błedne dane w polu E-mail" <?php echo $data ?> <?php echo $zatwierdzony ?>  required>
						<br /><br />
						</td>

						</tr>

						</table>

						<?php echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 8px;border: none;border-radius: 4px;cursor: pointer;' href='instrukcja.php?dane_wniosku=$dane_wniosku'>Cofnij</a>";?>
						
						<?php
									if($disabled=='disabled' || $potwierdzenie=='disabled')
										{
										
										}
										else
										{
										echo "<input class='btn btn-success' type='submit' name='submit' value='Zapisz'>";
										}
						?>
						
						<?php echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 8px;border: none;border-radius: 4px;cursor: pointer;' href='dane_szkola.php?dane_wniosku=$dane_wniosku'>Dalej</a>";?>

						</form>
						<br /><br />
						<?php

						//echo "</div>";		//zamknięcie diva od terminu

						?>

						
						
						<!-- wysłanie danych do bazy danych -->
						<?php

				 if(isset($_POST['submit']))
				 {

							
							$konto=$jakie_konto;
							$imie=$_POST['imie'];
							$nazwisko=$_POST['nazwisko'];
							$data_u=$_POST['data_u'];
							$miejsce_u=$_POST['miejsce_u'];
							$pesel=$_POST['pesel'];
							$powiat=$_POST['powiat'];
							$gmina=$_POST['gmina'];
							$ulica=$_POST['ulica'];
							$nr_domu=$_POST['nr_domu'];
							$nr_lokalu=$_POST['nr_lokalu'];
							$miejscowosc=$_POST['miejscowosc'];
							$kod=$_POST['kod'];
							$poczta=$_POST['poczta'];
							$nr_opiekuna=$_POST['nr_opiekuna'];
							$nr_komorkowy=$_POST['nr_komorkowy'];
							$email=$_POST['email'];

							 
							 $zakladka = "dane_podstawowe";
							 $stan = "tak";
							 
							 
							
$send_dane_podstawowe=$db->query("INSERT INTO dane_podstawowe (id, konto,dane_wniosku, imie, nazwisko, data_u, miejsce_u, pesel, powiat, gmina, ulica, nr_domu, nr_lokalu, miejscowosc, kod, poczta, nr_opiekuna, nr_komorkowy, email) VALUES (NULL, '$konto', '$dane_wniosku', '$imie', '$nazwisko', '$data_u', '$miejsce_u', '$pesel', '$powiat', '$gmina', '$ulica', '$nr_domu', '$nr_lokalu', '$miejscowosc', '$kod', '$poczta', '$nr_opiekuna', '$nr_komorkowy', '$email')");
							 
							 
								if ($send_dane_podstawowe==true) {

							 
							 
$update_dane_podstawowe_zakladka=$db-> query("UPDATE sprawdzanie SET stan='tak' where zakladka='dane_podstawowe' and konto='$jakie_konto' and wniosek='$dane_wniosku'") ;


header("Location: dane_podstawowe.php?dane_wniosku=$dane_wniosku");
}
				 
				 

      
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
				</div>
