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
		//echo $konto;

		//data do kiedy można złżyć wniosek
		include "data_wniosku.inc";
		
		?>
		
		<?php
		
		
		date_default_timezone_set("Europe/Warsaw");
		$data_wniosku=date("Y-m-d H:i:s");
		$rok_wniosku=date("Y");
		//echo $data;
		
		$dane_wniosku=$jakie_konto.$data_wniosku;
		//echo $nazwa_wniosku;
		
		$status_wniosku="Niezłożony";

		$aktualny_rok=date("Y");

		$aktualna_data = date("Y.m.d");
		?>
		
		
		<!-- podział strony na 2 części w propocjach 2:10 -->
		<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					$wnioski_menu_typ="";
					$wnioski_menu_typ="aktualne";
					
					include("wnioski_menu.inc"); 
					
					?>
				</div>
	
	
				<!-- div prawy -->
				<div class="col-10" style="-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%">
		
				<?php 
					$sprawdz_czy_wniosek_istnieje=$db->query("SELECT * FROM wnioski WHERE rok_wniosku='$aktualny_rok' AND konto='$jakie_konto'");

					$policz_wnioski = $sprawdz_czy_wniosek_istnieje->count();

					//echo $aktualna_data." ".$data;
				if($aktualna_data<$data)
				{
					if($policz_wnioski==0)
					{
				?>
					<div class="in-row p-20">
						<div>
							<form method="post">
								<button class="no-border" type="submit" name="submit">
									<div class="box box-create">
										<div class="text-center">
											<h3 class="box-title">Utwórz wniosek</h4>
										</div>
										<div class="box-center">
											<img class="w-100" src="image/icon-for-create.png">
										</div>
									</div>
								</button>
							</form>
						</div>
						<div class="p-20">
							Aby utworzyć nowy wniosek na rok <?php echo date("Y");?> kliknij na ikonę "Utwórz wniosek" po lewej stronie.  
						</div>
					</div>
				<?php 
					}
					else
					{
					
						foreach($db->results() as $record)
						{
						
						
						if($record->status_wniosku=="Niezłożony")
						{
						?>
						<div class="in-row p-20">
							<div>
								<a class="box-link" href='instrukcja.php?dane_wniosku=<?php echo $record->wniosek; ?>'>
									<div class="box box-write">
										<div class="text-center">
											<h3 class="box-title">Wypełnij wniosek</h4>
										</div>
										<div class="box-center">
											<img class="w-100" src="image/icon-for-write.png">
										</div>
									</div>
								</a>
							</div>
							<div class="p-20">
								Możesz teraz wypełnić wniosek. Nie musisz wypełniać całego wniosku od razu. Uzupełnione i zapisane dane pozostaną w formularzu.  
							</div>
						</div>

						<?php
						}
						else
						{
						?>
						<div class="in-row p-20">
							<div>
								<a class="box-link" href='przegladaj_wniosek.php?dane_wniosku=<?php echo $record->wniosek; ?>'>
									<div class="box box-view">
										<div class="text-center">
											<h3 class="box-title">Przeglądaj wniosek</h4>
										</div>
										<div class="box-center">
											<img class="w-100" src="image/icon-for-view.png">
										</div>
									</div>
								</a>
							</div>
							<div class="p-20">
								Obecnie możesz tylko przeglądać dane z wypełnionego wniosku z roku <?php echo date("Y"); ?>
							</div>
						</div>
						<?php
						}
					}
				}
			 }
				?>
						
						<?php
						
						if(isset($_POST['submit']))
								{
						
									$dodaj_wniosek=$db->query("INSERT INTO wnioski (konto ,wniosek, data_wniosku, rok_wniosku, status_wniosku) VALUES ('$jakie_konto','$dane_wniosku', '$data_wniosku', '$rok_wniosku', '$status_wniosku') ");

									if($dodaj_wniosek)
									{
										header("Location: wnioski_aktualne.php");
									}
						
								}
						
						?>
						
						
						<!-- <h3>Aktualne wnioski</h3>
						
						<table class="table table-striped">
						
						<tr>
							<th scope="col">Lp.</th>
							<th scope="col">Data wniosku</th>
							<th scope="col">Status wniosku</th>
							<th scope="col">Akcje</th>
						</tr>
						 -->
						<?php
						
						// $lp=1;
						// $aktualny_rok=date("Y");

						// $wyswietl_wnioski=$db->query("SELECT * FROM wnioski WHERE rok_wniosku='$aktualny_rok' AND konto='$jakie_konto'");
						
						// foreach($db->results() as $record)
						// {
						// echo "<tr>";
						// //echo "<td>$record->id</td>";
						// echo "<td>$lp</td>";
						// echo "<td>$record->data_wniosku</td>";
						// echo "<td>$record->status_wniosku</td>";
						
						// if($record->status_wniosku=="Niezłożony")
						// {
						// echo "<td><a href='instrukcja.php?dane_wniosku=$record->wniosek'>Wypełnij wniosek</a></td>";
						// }
						// else
						// {
						// echo "<td><a href='instrukcja.php?dane_wniosku=$record->wniosek'>Przeglądaj wniosek</a></td>";
						// }
						// echo "</tr>";
						
						// $lp++;
						// }
						// ?>
						
						</table>
						
				</div>
		</div>

		<!-- <div class="popup-container" style="position: absolute; top: -20px; left: 0px; width:100%; height: 110%; background-color: rgba(0,0,0,0.2); display: flex; justify-content: center; align-items: center;">
			<div style="width:40%; background-color: white; padding: 20px; position: relative;">
						<h3 class="text-center">Ważna informacja</h3>
						<p>
							Aby utworzyć nowy wniosek kliknij przycisk <b>Dodaj nowy wniosek</b>. Utworzony wniosek będzie znajdował się na liście poniżej. Przy utworzonym wniosku kliknij przycisk <b>Wypełnij wniosek</b>. Gdy wniosek zostanie wypełniony i zatwierdzony będzie można go tylko przeglądać.
						</p>
						<img src="image/close_btn.png" class="btn-close" alt="close btn" style="width: 20px; position: absolute; right:10px; top: 10px; cursor: pointer;">
						
			</div>
			
		</div>
					
				<script>
					let btn_close = document.querySelector('.btn-close');
					let popup = document.querySelector('.popup-container');

					btn_close.addEventListener('click', function(){
						popup.style.display = "none";
					})
				</script> -->
				<!-- Content Ends Here -->
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div> <!-- /.wrapper -->
</html>

<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
