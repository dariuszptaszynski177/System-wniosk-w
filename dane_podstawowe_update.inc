
		
		
		
		<?php
		

$dane_podstawowe_pobierz=$db->query("SELECT * FROM dane_podstawowe where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");


				foreach($db->results() as $dane_podstawowe)
				{
				$imie=$dane_podstawowe->imie;
				$nazwisko=$dane_podstawowe->nazwisko;
				$data_u=$dane_podstawowe->data_u;
				$miejsce_u=$dane_podstawowe->miejsce_u;
				$pesel=$dane_podstawowe->pesel;
				$powiat=$dane_podstawowe->powiat;
				$gmina=$dane_podstawowe->gmina;
				$ulica=$dane_podstawowe->ulica;
				$nr_domu=$dane_podstawowe->nr_domu;
				$nr_lokalu=$dane_podstawowe->nr_lokalu;
				$miejscowosc=$dane_podstawowe->miejscowosc;
				$kod=$dane_podstawowe->kod;
				$poczta=$dane_podstawowe->poczta;
				$nr_opiekuna=$dane_podstawowe->nr_opiekuna;
				$nr_komorkowy=$dane_podstawowe->nr_komorkowy;
				$email=$dane_podstawowe->email;
				}

		
		
				
		
		
		
		
		?>
		
		
		
	<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					
					$nazwa_zakladki="dane_podstawowe";
					
					include "menu_boczne.inc"?>
				</div>
	
	
				<!-- div prawy -->
				<div class="bg-success col-10" style="-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%">	
                
                
			

					
								<form method="post">

								<div style="display:none;">
								<b>Twój login</b>
								<input type="text" name="konto" value="<?php echo $konto;?>" readonly>

								<input type="text" name="insert_update" value="update">
								</div>

								<?php
								$nazwa;
								?>
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


								<h2>Informacje o wnioskodawcy</h2>



								<table>
								<tr>

								<td>
								Imię<span id="star">*</span><br />    
								<input class="form-control" type="text" name="imie" placeholder="Imię" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $imie ?>"  title="Błedne dane w polu Imię. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?> required> 
								<br /><br />
								</td>

								<td>
								Nazwisko<span id="star">*</span><br />
								<input class="form-control" type="text" name="nazwisko" placeholder="Nazwisko" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $nazwisko ?>" title="Błedne dane w polu Nazwisko. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								</tr>


								<tr>

								<td width="250px">
								Data urodzenia(DD.MM.RRRR)<span id="star">*</span><br />
								<input class="form-control" type="text" name="data_u" placeholder="Data urodzenia" pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}" value="<?php echo $data_u ?>" title="Błedne dane w polu Data urodzenia. Możesz wprowadzić tylko cyfry w formacie DD.MM.RRRR" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								<td width="250px">
								Miejsce urodzenia<span id="star">*</span><br />
								<input class="form-control" type="text" name="miejsce_u" placeholder="Miejsce urodzenia" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $miejsce_u ?>" title="Błedne dane w polu Miejsce urodzenia. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								<td width="250px">
								PESEL<span id="star">*</span><br />
								<input class="form-control" type="text" name="pesel" maxlength="11" placeholder="PESEL" pattern="[0-9]{11}" value="<?php echo $pesel ?>" title="Błedne dane w polu PESEL. Możesz wprowadzić tylko cyfry (11 cyfr)" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								</tr>


								<tr>
								<td>
								Powiat<span id="star">*</span><br />
								<input class="form-control" type="text" name="powiat" placeholder="Powiat" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $powiat ?>" title="Błedne dane w polu Powiat. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								<td>
								Gmina<span id="star">*</span><br />
								<input class="form-control" type="text" name="gmina" placeholder="Gmina" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $gmina ?>"  title="Błedne dane w polu Gmina. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								<td>
								Ulica (jeśli brak, zostaw puste)<span style="color:white" id="star">*</span><br />
								<input class="form-control" type="text" name="ulica" placeholder="Ulica" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" value="<?php echo $ulica ?>" title="Błedne dane w polu Ulica. Możesz wprowadzić tylko litery i cyfry" <?php echo $data ?> <?php echo $zatwierdzony ?> >
								<br /><br />
								</td>

								</tr>


								<tr>

								<td>
								Nr domu<span id="star">*</span><br />
								<input class="form-control" type="text" name="nr_domu" placeholder="Numer domu" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" value="<?php echo $nr_domu ?>" title="Błedne dane w polu Numer domu. Możesz wprowadzić tylko litery i cyfry"  <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								<td>
								Nr lokalu (jeśli brak, zostaw puste)<span style="color:white" id="star">*</span><br />
								<input class="form-control" type="text" name="nr_lokalu" placeholder="Numer lokalu" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" value="<?php echo $nr_lokalu ?>" title="Błedne dane w polu Numer lokalu. Możesz wprowadzić tylko litery i cyfry" <?php echo $data ?> <?php echo $zatwierdzony ?> >
								<br /><br />
								</td>

								</tr>


								<tr>

								<td>
								Miejscowość<span id="star">*</span><br />
								<input class="form-control" type="text" name="miejscowosc" placeholder="Miejscowość" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $miejscowosc ?>" title="Błedne dane w polu Miejscowość. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								<td>
								Kod pocztowy<span id="star">*</span><br />
								<input class="form-control" type="text" name="kod" placeholder="Kod pocztowy [XX-XXX]" pattern="^\d{2}-\d{3}$" value="<?php echo $kod ?>" title="Błedne dane w polu Nazwisko. Możesz wprowadzić tylko cyfry w formacie XX-XXX" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								<td>
								Poczta<span id="star">*</span><br />
								<input class="form-control" type="text" name="poczta" placeholder="Poczta" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $poczta ?>" title="Błedne dane w polu Poczta. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								</tr>


								<tr>
								<td>
								Numer	tel. opiekuna<span id="star">*</span><br />
								<input class="form-control" type="text" name="nr_opiekuna" maxlength="9" placeholder="Numer opiekuna" pattern="[0-9]{9}" value="<?php echo $nr_opiekuna ?>" title="Błedne dane w polu Numer opiekuna. Możesz wprowadzić tylko cyfry (9 cyfr)" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								<td>
								Numer	tel. komórkowego<span id="star">*</span><br />
								<input class="form-control" type="text" name="nr_komorkowy" maxlength="9" placeholder="Numer komórkowy" pattern="[0-9]{9}" value="<?php echo $nr_komorkowy ?>" title="Błedne dane w polu Numer komórkowy. Możesz wprowadzić tylko cyfry (9 cyfr)" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
								<br /><br />
								</td>

								<td>
								Adres	e-mail<span id="star">*</span><br />
								<input class="form-control" type="text" name="email" placeholder="E-mail" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" value="<?php echo $email ?>" title="Błedne dane w polu E-mail" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
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
																						

								
								$dane_podstawowe_update=$db->query("UPDATE dane_podstawowe SET imie='$imie', nazwisko='$nazwisko', data_u='$data_u', miejsce_u='$miejsce_u', pesel='$pesel', powiat='$powiat', gmina='$gmina', ulica='$ulica', nr_domu='$nr_domu', nr_lokalu='$nr_lokalu', miejscowosc='$miejscowosc', kod='$kod', poczta='$poczta', nr_opiekuna='$nr_opiekuna', nr_komorkowy='$nr_komorkowy', email='$email' WHERE konto = '$jakie_konto' AND dane_wniosku='$dane_wniosku'") ;

								
													if($dane_podstawowe_update==true)
													{
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
				<!-- koniec diva prawego -->
			</div>
			<!-- koniec podział strony na 2 części w propocjach 2:10 -->
					

