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
	</div>
	
		<?//=echousername($user->data()->id)?>
		<?php  
		
		
		$jakie_konto=echousername($user->data()->id);
		
		$id_czlonka_rodziny=$_REQUEST['id'];
		
		$dane_wniosku = $_REQUEST['dane_wniosku'];
		//echo $dane_wniosku;
		
		
		

		
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
						<input type="text" name="konto" value="<?php echo $konto1;?>" readonly>


						</div>

						<?php

						$dane_rodzina_pobierz_edycja = $db -> query("SELECT * FROM dane_rodzina where id='$id_czlonka_rodziny'");

						foreach($db->results() as $dane_rodzina_edycja)
							{
							
								$id=$dane_rodzina_edycja->id;
								$rodzina_imie=$dane_rodzina_edycja->rodzina_imie;
								$rodzina_nazwisko=$dane_rodzina_edycja->rodzina_nazwisko;
								$rodzina_data_u=$dane_rodzina_edycja->rodzina_data_u;
								$rodzina_pokrewienstwo=$dane_rodzina_edycja->rodzina_pokrewienstwo;
								$rodzina_miejsce_n_z=$dane_rodzina_edycja->rodzina_miejsce_n_z;
								}
								
						?>



						<br />

						<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


						<h2>Aktualizacja danych członka rodziny</h2>

						<table>
						<tr>
						<td>
						Imię<span id="star">*</span> <input class="form-control" style="width:400px;" name="rodzina_imie" type="text" placeholder="Imię" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" oninvalid="alert('Błedne dane w polu Członek rodziny Imię. Możesz wprowadzić tylko litery');" value="<?php echo $rodzina_imie ?>">
						</td>
						
						<td>
						Nazwisko<span id="star">*</span> <input class="form-control" style="width:400px;" name="rodzina_nazwisko" type="text" placeholder="Nazwisko" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" oninvalid="alert('Błedne dane w polu Członek rodziny Nazwisko. Możesz wprowadzić tylko litery');" value="<?php echo $rodzina_nazwisko ?>">
						</td>
						</tr>
						
						<tr>
						<td>
						Data urodzenia(DD.MM.RRRR)<span id="star">*</span> <input class="form-control" style="width:200px;" name="rodzina_data_u" type="text" placeholder="Data urodzenia" pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}" oninvalid="alert('Błedne dane w polu Członek rodziny Data urodzenia. Możesz wprowadzić tylko cyfry w formacie DD.MM.RRRR');" value="<?php echo $rodzina_data_u ?>">
						</td>
						
						<td>
						
						<?php
						if($rodzina_pokrewienstwo=='ojciec')
						{
						$ojciec='selected';
						}
						if($rodzina_pokrewienstwo=='matka')
						{
						$matka='selected';
						}
						if($rodzina_pokrewienstwo=='brat')
						{
						$brat='selected';
						}
						if($rodzina_pokrewienstwo=='siostra')
						{
						$siostra='selected';
						}
						if($rodzina_pokrewienstwo=='dziadek')
						{
						$dziadek='selected';
						}
						if($rodzina_pokrewienstwo=='babcia')
						{
						$babcia='selected';
						}
						?>
						
						Pokrewieństwo<span id="star">*</span> <select name="rodzina_pokrewienstwo" class="form-control" style="width:400px" required>
								<option value="wybor">Wybierz jedną opcję</option>
								<option value="ojciec" <?php echo $ojciec ?> >ojciec</option>
								<option value="matka" <?php echo $matka ?>>matka</option>
								<option value="brat" <?php echo $brat ?>>brat</option>
								<option value="siostra" <?php echo $siostra ?>>siostra</option>
								<option value="dziadek" <?php echo $dziadek ?>>dziadek</option>
								<option value="babcia" <?php echo $babcia ?>>babcia</option>
								</select>
						</td>
						</tr>

						<tr>
						<td>
						Miejsce zatrudnienia, nauki<span id="star">*</span> <input class="form-control" style="width:400px;" name="rodzina_miejsce_n_z" type="text" placeholder="M-ce nauki, zatrudnienia" size="22" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" oninvalid="alert('Błedne dane w polu Członek rodziny Miejsce zatrudnienia, nauki. Możesz wprowadzić tylko litery');" value="<?php echo $rodzina_miejsce_n_z?>">
						</td>
						</tr>
						</table>


						<br /><br />

						<input class="btn btn-success" type="submit" name="submit" value="Aktualizuj dane">


						</form>

						<br />







<?php


   if(isset($_POST['submit']))
	 {
				 $konto=$_POST['konto'];
					
         $rodzina_imie=$_POST['rodzina_imie'];

         $rodzina_nazwisko=$_POST['rodzina_nazwisko'];
				 
				 $rodzina_data_u=$_POST['rodzina_data_u'];
				 
				 $rodzina_pokrewienstwo=$_POST['rodzina_pokrewienstwo'];
				 
				 $rodzina_miejsce_n_z=$_POST['rodzina_miejsce_n_z'];
				 
				 
				 $komunikat="Nie wybrano pokrewieństwa";
				 
				 if($rodzina_pokrewienstwo=="wybor")
				 {
				 header("Location:/dane_rodzina_edit.php?id=$id_czlonka_rodziny&dane_wniosku=$dane_wniosku&komunikat=$komunikat");
				 }
				 else
				 {
				 
$dane_rodzina_update = $db-> query("UPDATE dane_rodzina SET rodzina_imie='$rodzina_imie', rodzina_nazwisko='$rodzina_nazwisko', rodzina_data_u='$rodzina_data_u', rodzina_pokrewienstwo='$rodzina_pokrewienstwo', rodzina_miejsce_n_z='$rodzina_miejsce_n_z' WHERE id = '$id_czlonka_rodziny'") ;

if($dane_rodzina_update==true)
{
$komunikat="Dane zostały zaktualizowane";

header("Location: dane_rodzina.php?dane_wniosku=$dane_wniosku&komunikat=$komunikat#czlonkowie_rodziny"); 
}
	 }
	 
	 }


?>


<?php
$komunikat=$_REQUEST['komunikat'];

if($komunikat!="")
echo "<div><h4 style='color:red'>$komunikat</h4></div>";
?>



</div>
				<!-- koniec diva prawego -->
			</div>
			<!-- koniec podział strony na 2 części w propocjach 2:10 -->
					
	</div>		
</div>


<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>


