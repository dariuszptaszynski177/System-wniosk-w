
		
<?php
		


$dane_szkola_pobierz=$db->query("SELECT * FROM dane_szkola WHERE konto = '$jakie_konto' AND dane_wniosku='$dane_wniosku' ");


		foreach($db->results() as $dane_szkola)
		{
		
		
		$nazwa_szkoly=$dane_szkola->nazwa_szkoly;
		$adres_szkoly=$dane_szkola->adres_szkoly;
		$klasa=$dane_szkola->klasa;
		$srednia_poprzednia=$dane_szkola->srednia_poprzednia;
		$srednia_biezaca=$dane_szkola->srednia_biezaca;
		}
		
		?>
		
			
			<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					$nazwa_zakladki="";
					$nazwa_zakladki="dane_szkola";
					
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


										<h2>Informacje o szkole wnioskodawcy</h2>

										<table>



										Nazwa szkoły/uczelni do której uczęszczasz<span id="star">*</span><br />
										<input class="form-control" type="text" size="100" name="nazwa_szkoly" placeholder="Nazwa szkoły/uczelni" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9.,\s]+$" value="<?php echo $nazwa_szkoly ?>" title="Błedne dane w polu Nazwa szkoły. Możesz wprowadzić litery, cyfry, kropkę (.), przecinek (,)"  <?php echo $data ?> <?php echo $zatwierdzony ?> required>
										<br /><br />

										Adres szkoły/uczelni do której uczęszczasz<span id="star">*</span><br />
										<input class="form-control" type="text" size="100" name="adres_szkoly" placeholder="Adres szkoły/uczelni" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9.,-\s]+$" value="<?php echo $adres_szkoly ?>" title="Błedne dane w polu Adres szkoły. Możesz wprowadzić litery, cyfry, kropkę (.), przecinek (,))"  <?php echo $data ?> <?php echo $zatwierdzony ?> required>
										<br /><br />


										Klasa, do której uczęszczasz w bieżącym roku szkolnym<span id="star">*</span><br />
										<input class="form-control" type="text" name="klasa" placeholder="Klasa" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" value="<?php echo $klasa ?>" title="Błedne dane w polu Klasa. Możesz wprowadzić tylko litery i cyfry"  <?php echo $data ?> <?php echo $zatwierdzony ?> required>
										<br /><br />


										Średnia	ocen	uzyskana	w	poprzednim	roku	szkolnym<span id="star">*</span>	<br />
										<input class="form-control" type="text" name="srednia_poprzednia" placeholder="Średnia z poprzedniego roku np. 4.60" pattern="[0-9]\.[0-9]{2}" value="<?php echo $srednia_poprzednia ?>" title="Błedne dane w polu Średnia poprzednia. Możesz wprowadzić tylko cyfry w formacie X.XX"  <?php echo $data ?> <?php echo $zatwierdzony ?> required>
										<br /><br />


										Średnia	ocen	uzyskana	w	I	semestrze	bieżącego	roku	szkolnego<span id="star">*</span><br />
										<input class="form-control" type="text" name="srednia_biezaca" placeholder="Średnia w I semestrze np. 4.60" pattern="[0-9]\.[0-9]{2}" value="<?php echo $srednia_biezaca ?>" title="Błedne dane w polu Średnia bieążaca. Możesz wprowadzić tylko cyfry w formacie X.XX"  <?php echo $data ?> <?php echo $zatwierdzony ?> required>
										<br /><br />	


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
										
									</table>


		</form>

		<br /><br />
		



									<?php
									
										if(isset($_POST['submit']))
											{
													$konto=$jakie_konto;
													$konto=$_POST['konto'];
													$insert_update=$_POST['insert_update'];
													$klasa=$_POST['klasa'];
													$srednia_poprzednia=$_POST['srednia_poprzednia'];
													$srednia_biezaca=$_POST['srednia_biezaca'];
													$nazwa_szkoly=$_POST['nazwa_szkoly'];
													$adres_szkoly=$_POST['adres_szkoly'];
													
													
													



$dane_szkola_update=$db->query("UPDATE dane_szkola SET klasa='$klasa', srednia_poprzednia='$srednia_poprzednia', srednia_biezaca='$srednia_biezaca', nazwa_szkoly='$nazwa_szkoly', adres_szkoly='$adres_szkoly'    WHERE konto = '$jakie_konto 'AND dane_wniosku='$dane_wniosku'" );



													header("Location: dane_szkola.php?dane_wniosku=$dane_wniosku");
								
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
			</div><!-- jakiś div gdzies niezamknięty -->
	
