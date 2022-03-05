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
		$konto1=echousername($user->data()->id);
		
		
		//data do kiedy można złżyć wniosek
		
		$jakie_konto=echousername($user->data()->id);
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
				
				
					
		
		
		

						<?php

						if($disabled=='disabled')
						{

						echo "<br /><br />";
						echo "<a style=' background-color: #4CAF50; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_podstawowe.php'>Cofnij</a>";

						echo "&nbsp;&nbsp;";

						echo "<a style=' background-color: #4CAF50; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_rodzina.php'>Dalej</a>";
						}
						?>

		
			

					
							<form method="post">

							<div style="display:none;">
							<b>Twój login</b>
							<input type="text" name="konto" value="<?php echo $konto1;?>" readonly>

							<input type="text" name="insert_update" value="insert">
							</div>

							<br />

							<?php

							//data złożenia wniosku
							if($disabled=='disabled')
							echo "<div style='display:none'>";		//zamknąć tego diva jeszcze


							?>

							<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


							<h2>Informacje	o	szkole wnioskodawcy</h2>



							Nazwa szkoły/uczelni do której uczęszczasz<span id="star">*</span><br />
							<input class="form-control" type="text" size="100" name="nazwa_szkoly" placeholder="Nazwa szkoły/uczelni" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9.,\s]+$" title="Błedne dane w polu Nazwa szkoły. Możesz wprowadzić litery, cyfry, kropkę (.), przecinek (,)" <?php echo $disabled ?> required>
							<br /><br />

							Adres szkoły/uczelni do której uczęszczasz<span id="star">*</span><br />
							<input class="form-control" type="text" size="100" name="adres_szkoly" placeholder="Adres szkoły/uczelni" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9.,-\s]+$" title="Błedne dane w polu Adres szkoły. Możesz wprowadzić litery, cyfry, kropkę (.), przecinek (,)" <?php echo $disabled ?> required>
							<br /><br />


							Klasa, do której uczęszczasz w bieżącym roku szkolnym<span id="star">*</span><br />
							<input class="form-control" type="text" name="klasa" placeholder="Klasa" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Klasa. Możesz wprowadzić tylko litery i cyfry" <?php echo $disabled ?> required>
							<br /><br />


							Średnia	ocen	uzyskana	w	poprzednim	roku	szkolnym<span id="star">*</span>	<br />
							<input class="form-control" type="text" name="srednia_poprzednia" placeholder="Średnia z poprzedniego roku np. 4.60" pattern="[0-9]\.[0-9]{2}" title="Błedne dane w polu Średnia poprzednia. Możesz wprowadzić tylko cyfry w formacie X.XX" <?php echo $disabled ?> required>
							<br /><br />


							Średnia	ocen	uzyskana	w	I	semestrze	bieżącego	roku	szkolnego<span id="star">*</span><br />
							<input class="form-control" type="text" name="srednia_biezaca" placeholder="Średnia w I semestrze np. 4.60" pattern="[0-9]\.[0-9]{2}" title="Błedne dane w polu Średnia bieążaca. Możesz wprowadzić tylko cyfry w formacie X.XX" <?php echo $disabled ?> required>
							
							<br />
							<button class="btn btn-primary" onclick="window.location.href = 'dane_podstawowe.php';">Cofnij</button>
							<input class="btn btn-success" type="submit" name="submit" value="Zapisz">
							<button class="btn btn-primary" onclick="window.location.href = 'dane_rodzina.php';">Dalej</button>


							</form>

							<?php

							echo "</div>";		//zamknięcie diva od terminu

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
									
									mysql_query('SET CHARACTER SET utf8'); 
									mysql_query("SET NAMES 'utf8'");

 
$send_dane_szkola=mysql_query("INSERT INTO dane_szkola (id, konto, nazwa_szkoly, adres_szkoly, klasa, srednia_poprzednia, srednia_biezaca) VALUES (NULL, '$konto', '$nazwa_szkoly', '$adres_szkoly', '$klasa', '$srednia_poprzednia', '$srednia_biezaca')");


									if ($send_dane_szkola==true) 
										{

											mysql_query("SET NAMES 'utf8'");
											$sql = "UPDATE sprawdzanie SET stan='tak' where zakladka='dane_szkola' and konto='$jakie_konto'" ;

											mysql_query($sql);
											echo "";

										}
				 
									header("Location: dane_szkola.php");
				 
									}
							?>
							
							<!-- koniec wysłanie danych do bazy danych -->

							</div>
				<!-- koniec diva prawego -->
			</div>
			<!-- koniec podział strony na 2 części w propocjach 2:10 -->
					
	</div>		
</div>
</div><!-- jakieś 2 divy nie zamkniętę gdzieś -->
</div>
<br /><br />
<
<?php //require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php //require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>

</body>
</html>
