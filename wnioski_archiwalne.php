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
		<!-- Page Heading -->
		<div class="row">
			<div class="col-sm-12">
				<!--<h1 class="page-header" align="center">Wypełnij dane</h1>-->
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
		$jakie_konto=echousername($user->data()->id);
		
		
		?>
		
		<?php
		
		
		date_default_timezone_set("Europe/Warsaw");
		$data_wniosku=date("Y-m-d h:i:s A");
		$rok_wniosku=date("Y");
		//echo $data;
		
		$dane_wniosku=$konto.$data_wniosku;
		//echo $nazwa_wniosku;
		
		$status_wniosku="Niezłożony";
		?>
		
		
		<!-- podział strony na 2 części w propocjach 2:10 -->
		<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					$wnioski_menu_typ="";
					$wnioski_menu_typ="archiwalne";
					
					include("wnioski_menu.inc"); 
					
					?>
				</div>
	
	
				<!-- div prawy -->
				<div class="col-10" style="-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%">
		
						<form method="post">
						
						<!--<input class="btn btn-success" style="color:black;" type="submit" value="Dodaj nowy wniosek" name="submit">-->
						
						</form>
						
						<?php
						
						if(isset($_POST['submit']))
								{
						
									$dodaj_wniosek=$db->query("INSERT INTO wnioski (konto, wniosek, data_wniosku, rok_wniosku, status_wniosku) VALUES ('$jakie_konto','$dane_wniosku', '$data_wniosku', '$rok_wniosku', '$status_wniosku') ");
						
								}
						
						?>
						
						
						<h3>Archiwalne wnioski</h3>
						
						<table class="table table-striped">
						
						<tr>
							<th scope="col">Lp.</th>
							<th scope="col">Data wniosku</th>
							<th scope="col">Status wniosku</th>
							<th scope="col">Akcje</th>
						</tr>
						
						<?php
						
						$lp=1;
						$aktualny_rok=date("Y");

						
						$wyswietl_wnioski=$db->query("SELECT * FROM wnioski WHERE rok_wniosku!='$aktualny_rok' AND konto='$jakie_konto'");
						
						foreach($db->results() as $record)
						{
						echo "<tr>";
						//echo "<td>$record->id</td>";
						echo "<td>$lp</td>";
						echo "<td>$record->data_wniosku</td>";
						echo "<td>$record->status_wniosku</td>";
						
						$rok_2020=$record->rok_wniosku;
						if($rok_2020=='2020')
						{
						echo "<td><a href='przegladaj_wniosek.php?dane_wniosku=$record->rok_wniosku'>Przeglądaj wniosek</a></td>";
						}
						else
						{
						echo "<td><a href='przegladaj_wniosek.php?dane_wniosku=$record->wniosek'>Przeglądaj wniosek</a></td>";
						}
						echo "</tr>";
						
						$lp++;
						}
						?>
						
						</table>
						
				</div>
		</div>
					
					
				<!-- Content Ends Here -->
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div> <!-- /.wrapper -->
</html>

<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
