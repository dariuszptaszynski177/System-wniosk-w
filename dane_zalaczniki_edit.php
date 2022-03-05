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
		
		$id_zalacznika=$_REQUEST['id'];
		
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

						$dane_zalaczniki_pobierz = $db -> query("SELECT * FROM dane_zalaczniki where id='$id_zalacznika'");
		
		foreach($db -> results() as $dane_zalaczniki)
			{
					
					$id=$dane_zalaczniki->id;
					
					$zalacznik=$dane_zalaczniki->zalacznik;
				
			}		
								
						?>



						<br />

						<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


<h2>Aktualizacja załącznika</h2>



Nazwa załącznika<span id="star">*</span><br /><input class="form-control" style="width:400px;" name="zalacznik" type="text" placeholder="Nazwa załacznika" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" oninvalid="alert('Błedne dane w polu Osiągnięcie. Możesz wprowadzić tylko litery i liczby');" value="<?php echo $zalacznik ?>"><br />



						<br /><br />

						<input class="btn btn-success" type="submit" name="submit" value="Aktualizauj zalacznik">


						</form>

						<br />










   <?php


   if(isset($_POST['submit']))
	 {
				 $konto=$_POST['konto'];
					
         $zalacznik=$_POST['zalacznik'];

				
$dane_zalaczniki_update = $db -> query("UPDATE dane_zalaczniki SET zalacznik='$zalacznik' WHERE id = '$id_zalacznika'") ;

				 
				 header("Location: dane_zalaczniki.php");
				 
				 if($dane_zalaczniki_update==true)
{
$komunikat="Dane zostały zaktualizowane";

header("Location: dane_zalaczniki.php?dane_wniosku=$dane_wniosku&komunikat=$komunikat#zalaczniki"); 
}
				 
	 }


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


