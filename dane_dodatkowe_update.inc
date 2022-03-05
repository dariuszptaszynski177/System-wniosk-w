<?php


$dane_dodatkowe_pobierz=$db->query("SELECT * FROM dane_dodatkowe where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");

				foreach($db->results() as $dane_dodatkowe)
				{
		
						$id=$dane_dodatkowe->id;
						$zajecia_pozaszkolne=$dane_dodatkowe->zajecia_pozaszkolne;
						$zainteresowania=$dane_dodatkowe->zaintersowania;
						$plany=$dane_dodatkowe->plany;
						$sytuacja_rodzinna=$dane_dodatkowe->sytuacja_rodzinna;
		
			}

		
		
		?>
		
		
						<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					
					$nazwa_zakladki='dane_dodatkowe';
					
					include "menu_boczne.inc"
					
					?>
				</div>
	
	
				<!-- div prawy -->
				<div class="bg-success col-10" style="-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%">
		

					
							<form method="post">

							<div style="display:none;">
							<b>Twój login</b>
							<input type="text" name="konto" value="<?php echo $konto1;?>" readonly>

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


					<h2>Pytania dodatkowe</h2>

							


							Czy uczestniczysz w zajęciach wykraczających poza program szkolny? Jeśli tak, to jakie są to zajęcia i od kiedy w nich uczestniczysz?<span id="star">*</span><br />

							<textarea class="form-control" onkeyup="counter(this.value);clean('pytanie1');" onkeydown="clean('pytanie1')" id="pytanie1" rows="6" cols="70" placeholder="Czy uczestniczysz w zajęciach wykraczających poza program szkolny? Jeśli tak, to jakie są to zajęcia i od kiedy w nich uczestniczysz?" name="zajecia_pozaszkolne" maxlength="800"  onkeydown="clean('ta')" <?php echo $data ?> <?php echo $zatwierdzony ?> required><?php echo $zajecia_pozaszkolne ?></textarea><br />
							<b><span style="color:red;" id="counter">Pozostało Ci znaków 800/800</span></b><br />

							<br /><br />
							Jakie są Twoje zainteresowania? Od jak dawna je rozwijasz?<span id="star">*</span><br />
							<textarea class="form-control" onkeyup="counterr(this.value);clean('pytanie2');" onkeydown="clean('pytanie2')" id="pytanie2" rows="6" cols="70" placeholder="Jakie są Twoje zainteresowania? Od jak dawna je rozwijasz?" name="zaintersowania" maxlength="800" <?php echo $data ?> <?php echo $zatwierdzony ?> required><?php echo $zainteresowania ?></textarea><br />
							<b><span style="color:red;" id="counterr">Pozostało Ci znaków 800/800</span></b><br />

							<br /><br />

							Jakie są Twoje plany życiowe?<span id="star">*</span> <br />
							<textarea class="form-control" onkeyup="counterrr(this.value);clean('pytanie3');" onkeydown="clean('pytanie3')" id="pytanie3" rows="6" cols="70" placeholder="Jakie są Twoje plany życiowe? " name="plany" maxlength="800" <?php echo $data ?> <?php echo $zatwierdzony ?> required><?php echo $plany ?></textarea><br />
							<b><span style="color:red;" id="counterrr">Pozostało Ci znaków 800/800</span></b><br />

							<br /><br />


							Opisz swoją sytuację rodzinną<span id="star">*</span><br />
							<textarea class="form-control" onkeyup="counterrrr(this.value);clean('pytanie4');" onkeydown="clean('pytanie4')" id="pytanie4" rows="6" cols="70" placeholder="Opisz swoją sytuację rodzinną" name="sytuacja_rodzinna" maxlength="800" <?php echo $data ?> <?php echo $zatwierdzony ?> required><?php echo $sytuacja_rodzinna ?></textarea><br />
							<b><span style="color:red;" id="counterrrr">Pozostało Ci znaków 800/800</span></b><br />
							<br /><br />

							<?php echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 8px;border: none;border-radius: 4px;cursor: pointer;' href='dane_osiagniecia.php?dane_wniosku=$dane_wniosku'>Cofnij</a>";?>
						
						<?php
									if($disabled=='disabled' || $potwierdzenie=='disabled')
										{
										
										}
										else
										{
										echo "<input class='btn btn-success' type='submit' name='submit' onclick='check(oText);check2(oTextt);check3(oTexttt);check4(oTextttt);' value='Zapisz'>";
										}
						?>
						
						<?php echo "<a style='background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 8px;border: none;border-radius: 4px;cursor: pointer;' href='dane_zalaczniki.php?dane_wniosku=$dane_wniosku'>Dalej</a>";?>

							</form>
							<br /><br />




							<?php
							if(isset($_POST['submit']))
						{
						
						
						$zajecia_pozaszkolne=$_POST['zajecia_pozaszkolne'];
						$zaintersowania=$_POST['zaintersowania'];
						$plany=$_POST['plany'];
						$sytuacja_rodzinna=$_POST['sytuacja_rodzinna'];
						
							
							

$dane_dodatkowe_update = $db -> query("UPDATE dane_dodatkowe SET zajecia_pozaszkolne='$zajecia_pozaszkolne', zaintersowania='$zaintersowania', plany='$plany', sytuacja_rodzinna='$sytuacja_rodzinna' WHERE konto = '$jakie_konto' AND dane_wniosku='$dane_wniosku'") ;

							header("Location: dane_dodatkowe.php?dane_wniosku=$dane_wniosku");
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
					
	</div>		
</div>
