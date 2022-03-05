<?php
		
		$liczba_osob=1;
		//$liczba_osob jest od 1, ponieważ pierwszym członkiem rodziny jest wnioskodawca


/* zapytanie do konkretnej tabeli */
$zliczanie_czlonkow_rodziny = $db -> query("SELECT * FROM dane_rodzina where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");

		foreach($db->results() as $liczba_czlonkow)
				{
				//$liczba_czlonkow->id;
				$liczba_osob++;
				}

//echo $liczba_osob;
	
		
		?>
		
		
					<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					$nazwa_zakladki="dane_dochody";
					
					include "menu_boczne.inc"
					?>
				</div>
	
	
				<!-- div prawy -->
				<div class="bg-success col-10" style="-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%">
			
			

					
						<form method="post">

						<div style="display:none;">
						<b>Twój login</b>
						<input type="text" name="konto" value="<?php echo $konto;?>" readonly>

						<input type="text" name="liczba_osob" value="<?php echo $liczba_osob;?>" readonly>

						<input type="text" name="insert_update" value="insert">
						</div>

						
						<br />

						<?php

						?>

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


						<h2> Informacje o dochodach</h2>

						<br />
								<div>
									<div class="wyjasnienia">
									<p class=""><b>Wyjaśnienia dotyczące dochodów (najedź myszką, aby wyświetlić)</b></p>
									</div>

									<div class="dochody-informacje">
										1. W tej zakładce należy wpisywać dochody miesięczne. Dochód na jedną osobę w rodzienie zostanie obliczony automatycznie przez system.<br />
										2. 500+ nie wliczamy do dochodów<br />
										3. Dochód w gospodarstwa rolnego obliczamy w następujący sposób: dochód miesięczny = 270, 33 zł*ilość hektarów przeliczeniowych.<br />
										Obliczony w ten sposób dochód jest dochodem dla całej rodziny.
									</div>
								</div>

								<script>
									let wyjasnienia = document.querySelector('.wyjasnienia');
									let dochody_informacje = document.querySelector('.dochody-informacje');

									wyjasnienia.addEventListener('mouseover', function(){
										dochody_informacje.style.display = "block";
									})

									wyjasnienia.addEventListener('mouseout', function(){
										dochody_informacje.style.display = "none";
									})
								</script>

								<style>
									.wyjasnienia
									{
										position: relative;
									}

									.dochody-informacje
									{
										display:none;
										position: absolute;
										top: 160px;
										padding: 20px;
										background-color: lightgray;
										border-radius: 25px;

									}
								</style>

						<br />

						<table id="tabela">

						<tr id="linia">

						<td id="linia">Lp.</td>
						<td id="linia">Źródło dochodu</td>
						<td id="linia">Dochód brutto (np.1695.95)</td>

						</tr>

						<tr id="linia">

						<td id="linia">1.</td>
						<td id="linia" name="zrodlo_1">Wynagrodzenia	za	pracę</td>
						<td id="linia"><input class="form-control" name="dochod_1" type="text"size="40" placeholder="Wynagrodzenia za pracę" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" <?php echo $data ?> <?php echo $zatwierdzony ?>></td>

						</tr>

						<tr id="linia">

						<td id="linia">2.</td>
						<td id="linia" name="zrodlo_1">Emerytury, renty inwalidzkie i rodzinne</td>
						<td id="linia"><input class="form-control" name="dochod_2" type="text" placeholder="Emerytury, renty inwalidzkie i rodzinne" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" <?php echo $data ?> <?php echo $zatwierdzony ?>></td>

						</tr>

						<tr id="linia">

						<td id="linia">3.</td>
						<td id="linia" name="zrodlo_1">Stałe zasiłki z pomocy społecznej</td>
						<td id="linia"><input class="form-control" name="dochod_3" type="text" placeholder="Stałe zasiłki z pomocy społecznej" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" <?php echo $data ?> <?php echo $zatwierdzony ?>></td>

						</tr>

						<tr id="linia">

						<td id="linia">4.</td>
						<td id="linia" name="zrodlo_1">Dodatek mieszkaniowy</td>
						<td id="linia"><input class="form-control" name="dochod_4" type="text" placeholder="Dodatek mieszkaniowy" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" <?php echo $data ?> <?php echo $zatwierdzony ?>></td>

						</tr>

						<tr id="linia">

						<td id="linia">5.</td>
						<td id="linia" name="zrodlo_1">Alimenty	i	świadczenia	z	funduszu	alimentacyjnego</td>
						<td id="linia"><input class="form-control" name="dochod_5" type="text" placeholder="Alimenty i świadczenia z funduszu alimentacyjnego" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" <?php echo $data ?> <?php echo $zatwierdzony ?>></td>

						</tr>

						<tr id="linia">

						<td id="linia">6.</td>
						<td id="linia" name="zrodlo_1">Zasiłek dla	bezrobotnych</td>
						<td id="linia"><input class="form-control" name="dochod_6" type="text" placeholder="Zasiłek dla bezrobotnych" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" <?php echo $data ?> <?php echo $zatwierdzony ?>></td>

						</tr>

						<tr id="linia">

						<td id="linia">7.</td>
						<td id="linia" name="zrodlo_1">Zasiłek rodzinny	i	pielęgnacyjny</td>
						<td id="linia"><input class="form-control" name="dochod_7" type="text" placeholder="Zasiłek rodzinny i pielęgnacyjny" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" <?php echo $data ?> <?php echo $zatwierdzony ?>></td>

						</tr>

						<tr id="linia">

						<td id="linia">8.</td>
						<td id="linia" name="zrodlo_1">Dochody z gospodarstwa rolnego</td>
						<td id="linia"><input class="form-control" name="dochod_8" type="text" placeholder="Dochody z gospodarstwa rolnego" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" <?php echo $data ?> <?php echo $zatwierdzony ?>></td>

						</tr>

						<tr id="linia">

						<td id="linia">9.</td>
						<td id="linia" name="zrodlo_1">Dochody z prowadzenia działalności gospodarczej</td>
						<td id="linia"><input class="form-control" name="dochod_9" type="text" placeholder="Dochody z prowadzenia działalności gospodarczej" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" <?php echo $data ?> <?php echo $zatwierdzony ?>></td>

						</tr>

						<tr id="linia">

						<td id="linia"></td>
						<td id="linia" name="zrodlo_1">inne	dochody (wpisz poniżej)</td>
						<td id="linia"></td>

						</tr>

						<tr id="linia">

						<td id="linia">10.</td>
						<td id="linia"><input class="form-control" name="dochod_10_nazwa"type="text" placeholder="Wpisz nazwę dochodu" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Inne dochody. Możesz wprowadzić tylko litery" <?php echo $data ?> <?php echo $zatwierdzony ?>></td>

						<td id="linia"><input class="form-control" name="dochod_10" type="text" placeholder="Inne dochody" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" <?php echo $data ?> <?php echo $zatwierdzony ?>></td>

						</tr>


						</table>	

						<br />
							<?php echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 8px;border: none;border-radius: 4px;cursor: pointer;' href='dane_rodzina.php?dane_wniosku=$dane_wniosku'>Cofnij</a>";?>
						
						<?php
									if($disabled=='disabled' || $potwierdzenie=='disabled')
										{
										
										}
										else
										{
										echo "<input class='btn btn-success' type='submit' name='submit' value='Zapisz'>";
										}
						?>
						
						<?php echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 8px;border: none;border-radius: 4px;cursor: pointer;' href='dane_osiagniecia.php?dane_wniosku=$dane_wniosku'>Dalej</a>";?>


						</form>
						



								<?php
								if(isset($_POST['submit']))
									{
									
									$konto=$jakie_konto;
									$liczba_osob=$_POST['liczba_osob'];
									
									
									//poprawka
									//$liczba_osob_=$liczba_osob-1;
									//$liczba_osob=$liczba_osob_;
									//echo $liczba_osob;
									$dochod_1=$_POST['dochod_1'];
									$dochod_2=$_POST['dochod_2'];
									$dochod_3=$_POST['dochod_3'];
									$dochod_4=$_POST['dochod_4'];
									$dochod_5=$_POST['dochod_5'];
									$dochod_6=$_POST['dochod_6'];
									$dochod_7=$_POST['dochod_7'];
									$dochod_8=$_POST['dochod_8'];
									$dochod_9=$_POST['dochod_9'];
									$dochod_10_nazwa=$_POST['dochod_10_nazwa'];
									$dochod_10=$_POST['dochod_10'];
		
//echo $liczba_osob;
		
		
		

					$dochod_razem=$dochod_1+$dochod_2+$dochod_3+$dochod_4+$dochod_5+$dochod_6+$dochod_7+$dochod_8+$dochod_9+$dochod_10;
					//echo $dochod_razem;
					//echo '<br />';

					//$dochod_sredni=round($dochod_razem/$licznik,2);
					$dochod_sredni=$dochod_razem;
					//echo $dochod_sredni;
					//echo '<br />';

					$dochod_na_osobe=round($dochod_sredni/$liczba_osob,2);
					//echo $dochod_na_osobe;

					

$send_dane_dochody = $db -> query("INSERT INTO dane_dochody (id, konto, dane_wniosku, dochod_1, dochod_2, dochod_3, dochod_4,dochod_5, dochod_6, dochod_7, dochod_8, dochod_9, dochod_10_nazwa, dochod_10, dochod_razem, dochod_na_osobe) VALUES (NULL, '$konto', '$dane_wniosku', '$dochod_1', '$dochod_2', '$dochod_3', '$dochod_4', '$dochod_5', '$dochod_6', '$dochod_7', '$dochod_8', '$dochod_9', '$dochod_10_nazwa', '$dochod_10', '$dochod_razem', '$dochod_na_osobe')");


										if($send_dane_dochody==true) 
										{
											 $update_dane_dochody_zakladka=$db-> query("UPDATE sprawdzanie SET stan='tak' where zakladka='dane_dochody' and konto='$jakie_konto' AND wniosek='$dane_wniosku'") ;

										}
				 
									header("Location: dane_dochody.php?dane_wniosku=$dane_wniosku");
									
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
					
