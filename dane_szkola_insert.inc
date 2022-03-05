
		
		
		<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					
					$nazwa_zakladki="dane_szkola";
					
					include "menu_boczne.inc"?>
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
							
							if($disabled=='disabled')
								{
								$data='readonly';
								}


							?>

							<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


							<h2>Informacje	o	szkole wnioskodawcy</h2>



							Nazwa szkoły/uczelni do której uczęszczasz<span id="star">*</span><br />
							<input class="form-control" type="text" size="100" name="nazwa_szkoly" placeholder="Nazwa szkoły/uczelni" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9.,\s]+$" title="Błedne dane w polu Nazwa szkoły. Możesz wprowadzić litery, cyfry, kropkę (.), przecinek (,)" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
							<br /><br />

							Adres szkoły/uczelni do której uczęszczasz<span id="star">*</span><br />
							<input class="form-control" type="text" size="100" name="adres_szkoly" placeholder="Adres szkoły/uczelni" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9.,-\s]+$" title="Błedne dane w polu Adres szkoły. Możesz wprowadzić litery, cyfry, kropkę (.), przecinek (,)" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
							<br /><br />


							Klasa, do której uczęszczasz w bieżącym roku szkolnym<span id="star">*</span><br />
							<input class="form-control" type="text" name="klasa" placeholder="Klasa" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Klasa. Możesz wprowadzić tylko litery i cyfry" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
							<br /><br />


							Średnia	ocen	uzyskana	w	poprzednim	roku	szkolnym<span id="star">*</span>	<br />
							<input class="form-control" type="text" name="srednia_poprzednia" placeholder="Średnia z poprzedniego roku np. 4.60" pattern="[0-9]\.[0-9]{2}" title="Błedne dane w polu Średnia poprzednia. Możesz wprowadzić tylko cyfry w formacie X.XX" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
							<br /><br />


							Średnia	ocen	uzyskana	w	I	semestrze	bieżącego	roku	szkolnego<span id="star">*</span><br />
							<input class="form-control" type="text" name="srednia_biezaca" placeholder="Średnia w I semestrze np. 4.60" pattern="[0-9]\.[0-9]{2}" title="Błedne dane w polu Średnia bieążaca. Możesz wprowadzić tylko cyfry w formacie X.XX" <?php echo $data ?> <?php echo $zatwierdzony ?> required>
							
							<br />
							<?php echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 8px;border: none;border-radius: 4px;cursor: pointer;' href='dane_podstawowe.php?dane_wniosku=$dane_wniosku'>Cofnij</a>"; ?>
						
						<?php
									if($disabled=='disabled' || $potwierdzenie=='disabled')
										{
										
										}
										else
										{
										echo "<input class='btn btn-success' type='submit' name='submit' value='Zapisz'>";
										}
						?>
						
						<?php echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 8px;border: none;border-radius: 4px;cursor: pointer;' href='dane_rodzina.php?dane_wniosku=$dane_wniosku'>Dalej</a>"; ?>


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
									$insert_update=$_POST['insert_update'];
									$klasa=$_POST['klasa'];
									$srednia_poprzednia=$_POST['srednia_poprzednia'];
									$srednia_biezaca=$_POST['srednia_biezaca'];
									$nazwa_szkoly=$_POST['nazwa_szkoly'];
									$adres_szkoly=$_POST['adres_szkoly'];
									
									
									$zakladka = "dane_szkola";
									$stan = "tak";
									
									

 
$send_dane_szkola=$db->query("INSERT INTO dane_szkola (id, konto, dane_wniosku, nazwa_szkoly, adres_szkoly, klasa, srednia_poprzednia, srednia_biezaca) VALUES (NULL, '$konto', '$dane_wniosku', '$nazwa_szkoly', '$adres_szkoly', '$klasa', '$srednia_poprzednia', '$srednia_biezaca')");


									if ($send_dane_szkola==true) 
										{

											
											$$update_dane_szkola_zakladka=$db->query("UPDATE sprawdzanie SET stan='tak' where zakladka='dane_szkola' and konto='$jakie_konto' AND wniosek='$dane_wniosku'") ;

											

										}
				 
									header("Location: dane_szkola.php?dane_wniosku=$dane_wniosku");
				 
									}
									
							?>
							
							<!-- koniec wysłanie danych do bazy danych -->
							
							

							
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

