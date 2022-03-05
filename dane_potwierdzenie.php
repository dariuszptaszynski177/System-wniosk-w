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
	</div>
	
		<?//=echousername($user->data()->id)?>
		<?php  
		
		$jakie_konto=echousername($user->data()->id);
		
		$dane_wniosku=$_REQUEST['dane_wniosku'];
		echo $dane_wniosku;
		
		
		
		?>
		
		
		<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					
					$nazwa_zakladki="potwierdzenie";
					
					include "menu_boczne.inc";
					
					?>
				</div>
	
	
				<!-- div prawy -->
				<div class="bg-success col-10" style="-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%">	
		
		
		<?php
		
		


$licznik=0;
		

/* zapytanie do konkretnej tabeli */
$sprawdzanie = $db -> query("SELECT * FROM sprawdzanie where konto='$jakie_konto' and stan='tak' and wniosek='$dane_wniosku'");

		foreach($db->results() as $dane_sprawdzanie)
		{
		$licznik++;
		
    }
    


		if($licznik==7)
		{
		
		
		
$dane_potwierdzenie_licz=0;

$dane_potwierdzenie = $db -> query("SELECT * FROM dane_potwierdzenie WHERE konto='$jakie_konto' and dane_wniosku='$dane_wniosku' and potwierdzenie='tak'");

foreach($db->results() as $dane_potwierdzenie_results)
{
$dane_potwierdzenie_licz++;
}

//echo $dane_potwierdzenie_licz;
if($dane_potwierdzenie_licz != 0)
{
echo "<h1 align='center'>Dane zostały potwierdzone</h1><br />";
echo "<center><a style=' background-color: #4CAF50; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_generuj.php?dane_wniosku=$dane_wniosku'>Przejdź do generowania wniosku</a></center>";
}
else
{
echo "<h2 align='center'>Po potwierdzeniu danych, nie można już ich edytować. <br /><br />Jeśli wszystkie dane zostały już wprowadzone, potwierdź je, klikająć przycisk <b>Powierdzam dane</b></h2>";

echo "<form method='post'>";
			echo "<div style='display:none'>";
			echo "<input type='text' name='potwierdzenie' value='tak'>";
			echo "</div>";
			echo "<center><input class='btn btn-success' type='submit' name='submit' value='Potwierdzam dane'></center>";
			echo "</form>";

}
		
		
		if(isset($_POST['submit']))
	 {

         $potwierdzenie=$_POST['potwierdzenie'];
				 
					$send_potwierdzenie = $db -> query("INSERT INTO dane_potwierdzenie (id, konto, dane_wniosku, potwierdzenie) VALUES (NULL, '$jakie_konto','$dane_wniosku', '$potwierdzenie')");

					$zmien_status_wniosku = $db -> query("UPDATE wnioski SET status_wniosku='Złożony' WHERE wniosek='$dane_wniosku'");
				 
				header("Location: dane_potwierdzenie.php?dane_wniosku=$dane_wniosku"); 

      
	 }
	 
	 }
	 else
	 {
	 echo "<h2 align='center'>Sprawdź czy wszystkie zakładaki (oprócz Potwierdzenie i Generuj wniosek) w menu po lewej stronie są oznaczone <img src='check.png' width='20px'/></h2>";
	 }
		
		
		?>
		
		
<br /><br /><br /><br />
					
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
