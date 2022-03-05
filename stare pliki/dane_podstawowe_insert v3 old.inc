<?php
/*
UserSpice 4
An Open Source PHP User Management System
by the UserSpice Team at http://UserSpice.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php
require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
 <link rel="stylesheet" href="style.css" type="text/css">
 
 
</head>
<body>
	<div id="page-wrapper">
		<div class="container-fluid">
		
				
				
				
				
				<!-- Content goes here -->
				
					<?php
		if($settings->twofa == 1){
		$twoQ = $db->query("select twoKey from users where id = ? and twoEnabled = 0", [$userdetails->id]);
		if($twoQ->count() > 0){ ?>
			<p><a class="btn btn-primary " href="enable2fa.php" role="button">Manage 2 Factor Auth</a></p>
	<?php	} else { ?>
			<p><a class="btn btn-primary " href="disable2fa.php" role="button">Manage 2 Factor Auth</a></p>
	<?php }}
	if(isset($_SESSION['cloak_to'])){ ?>
		<form class="" action="account.php" method="post">
			<input type="submit" name="uncloak" value="Uncloak!" class='btn btn-danger'>
		</form><br>
		<?php }
		?>
	
	
		<?//=echousername($user->data()->id)?>
		<?php  
		$konto=echousername($user->data()->id);
		//echo $konto;
		
		
		//zmienna do daty, nie zmieniać
		$jakie_konto=echousername($user->data()->id);
		
		//sprawdzenie czy istnieją rekordy w tabeli sprawdzenie, jeśli nie to dodaje rekrdy do tabeli
		$query = mysql_query("SELECT * FROM sprawdzanie WHERE konto='$nazwa'");

				if(mysql_num_rows($query) != 0)
				{

				}
				else
				{
				mysql_query("INSERT INTO sprawdzanie (id, konto, zakladka, stan) VALUES (NULL, '$konto', 'dane_podstawowe', 'nie')");
				mysql_query("INSERT INTO sprawdzanie (id, konto, zakladka, stan) VALUES (NULL, '$konto', 'dane_szkola', 'nie')");
				mysql_query("INSERT INTO sprawdzanie (id, konto, zakladka, stan) VALUES (NULL, '$konto', 'dane_rodzina', 'nie')");
				mysql_query("INSERT INTO sprawdzanie (id, konto, zakladka, stan) VALUES (NULL, '$konto', 'dane_dochody', 'nie')");
				mysql_query("INSERT INTO sprawdzanie (id, konto, zakladka, stan) VALUES (NULL, '$konto', 'dane_osiagniecia', 'nie')");
				mysql_query("INSERT INTO sprawdzanie (id, konto, zakladka, stan) VALUES (NULL, '$konto', 'dane_dodatkowe', 'nie')");
				mysql_query("INSERT INTO sprawdzanie (id, konto, zakladka, stan) VALUES (NULL, '$konto', 'dane_zalaczniki', 'nie')");
				}

		
		
		//data do kiedy można złżyć wniosek
		include "data_wniosku.inc";
		
		
		
		?>
		
			<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php include "menu_boczne.inc"?>
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
						if($disabled=='disabled')
						echo "<div style='display:none'>";		//zamknąć tego diva jeszcze

						?>

						<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


						<h2>Informacje o wnioskodawcy</h2>

						<table>
						<tr>

						<td>
						Imię<span id="star">*</span><br />    
						<input class="form-control" type="text" name="imie" placeholder="Imię" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Imię. Możesz wprowadzić tylko litery" <?php echo $disabled ?> required> 
						<br /><br />
						</td>

						<td>
						Nazwisko<span id="star">*</span><br />
						<input class="form-control" type="text" name="nazwisko" placeholder="Nazwisko" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Nazwisko. Możesz wprowadzić tylko litery" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						</tr>


						<tr>

						<td width="250px">
						Data urodzenia(dd.mm.rrrr)<span id="star">*</span><br />
						<input class="form-control" type="text" name="data_u" placeholder="Data urodzenia" pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}" title="Błedne dane w polu Data urodzenia. Możesz wprowadzić tylko cyfry w formacie XX.XX.XXXX" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						<td width="250px">
						Miejsce urodzenia<span id="star">*</span><br />
						<input class="form-control" type="text" name="miejsce_u" placeholder="Miejsce urodzenia" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Miejsce urodzenia. Możesz wprowadzić tylko litery" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						<td width="250px">
						PESEL<span id="star">*</span><br />
						<input class="form-control" type="text" name="pesel" maxlength="11" placeholder="PESEL" pattern="[0-9]{11}" title="Błedne dane w polu PESEL. Możesz wprowadzić tylko cyfry (11 cyfr)" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						</tr>


						<tr>
						<td>
						Powiat<span id="star">*</span><br />
						<input class="form-control" type="text" name="powiat" placeholder="Powiat" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Powiat. Możesz wprowadzić tylko litery" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						<td>
						Gmina<span id="star">*</span><br />
						<input class="form-control" type="text" name="gmina" placeholder="Gmina" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Gmina. Możesz wprowadzić tylko litery" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						<td>
						Ulica<span style="color:white" id="star">*</span> (jeśli brak, zostaw puste)<br />
						<input class="form-control" type="text" name="ulica" placeholder="Ulica" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Ulica. Możesz wprowadzić tylko litery i cyfry" <?php echo $disabled ?>>
						<br /><br />
						</td>

						</tr>


						<tr>

						<td>
						Nr domu<span id="star">*</span><br />
						<input class="form-control" type="text" name="nr_domu" placeholder="Numer domu" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Numer domu. Możesz wprowadzić tylko litery i cyfry" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						<td>
						Nr lokalu<span style="color:white" id="star">*</span> (jeśli brak, zostaw puste)<br />
						<input class="form-control" type="text" name="nr_lokalu" placeholder="Numer lokalu" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Numer lokalu. Możesz wprowadzić tylko litery i cyfry" <?php echo $disabled ?>>
						<br /><br />
						</td>

						</tr>


						<tr>

						<td>
						Miejscowość<span id="star">*</span><br />
						<input class="form-control" type="text" name="miejscowosc" placeholder="Miejscowość" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Miejscowość. Możesz wprowadzić tylko litery" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						<td>
						Kod pocztowy<span id="star">*</span><br />
						<input class="form-control" type="text" name="kod" placeholder="Kod pocztowy [XX-XXX]" pattern="^\d{2}-\d{3}$" title="Błedne dane w polu Nazwisko. Możesz wprowadzić tylko cyfry w formacie XX-XXX" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						<td>
						Poczta<span id="star">*</span><br />
						<input class="form-control" type="text" name="poczta" placeholder="Poczta" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Poczta. Możesz wprowadzić tylko litery" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						</tr>


						<tr>
						<td>
						Numer	tel. opiekuna<span id="star">*</span><br />
						<input class="form-control" type="text" name="nr_opiekuna" maxlength="9" placeholder="Numer opiekuna" pattern="[0-9]{9}" title="Błedne dane w polu Numer opiekuna. Możesz wprowadzić tylko cyfry (9 cyfr)" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						<td>
						Numer	tel. komórkowego<span id="star">*</span><br />
						<input class="form-control" type="text" name="nr_komorkowy" maxlength="9" placeholder="Numer komórkowy" pattern="[0-9]{9}" title="Błedne dane w polu Numer komórkowy. Możesz wprowadzić tylko cyfry (9 cyfr)" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						<td>
						Adres	e-mail<span id="star">*</span><br />
						<input class="form-control" type="text" name="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Błedne dane w polu E-mail" <?php echo $disabled ?> required>
						<br /><br />
						</td>

						</tr>

						</table>

						<button class="btn btn-primary" onclick="window.location.href = 'instrukcja.php';">Cofnij</button>
						<input class="btn btn-success" type="submit" name="submit" value="Zapisz">
						<button class="btn btn-primary" onclick="window.location.href = 'dane_szkola.php';">Dalej</button>

						</form>

						<?php

						echo "</div>";		//zamknięcie diva od terminu

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
							 
							 
							 mysql_query('SET CHARACTER SET utf8'); 
							mysql_query("SET NAMES 'utf8'");
							
$send_dane_podstawowe=mysql_query("INSERT INTO dane_podstawowe (id, konto, imie, nazwisko, data_u, miejsce_u, pesel, powiat, gmina, ulica, nr_domu, nr_lokalu, miejscowosc, kod, poczta, nr_opiekuna, nr_komorkowy, email) VALUES (NULL, '$konto', '$imie', '$nazwisko', '$data_u', '$miejsce_u', '$pesel', '$powiat', '$gmina', '$ulica', '$nr_domu', '$nr_lokalu', '$miejscowosc', '$kod', '$poczta', '$nr_opiekuna', '$nr_komorkowy', '$email')");
							 
							 
								if ($send_dane_podstawowe==true) {

							 
							 mysql_query("SET NAMES 'utf8'");
$sql = "UPDATE sprawdzanie SET stan='tak' where zakladka='dane_podstawowe' and konto='$jakie_konto'" ;

mysql_query($sql);
echo "";

}
				 
				 header("Location: dane_podstawowe.php");

      
					}

?>

				
				
				</div>
				<!-- koniec diva prawego -->
			</div>
			<!-- koniec podział strony na 2 części w propocjach 2:10 -->
					
	</div>		
</div>

<?php //require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php //require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>

</body>
</html>
