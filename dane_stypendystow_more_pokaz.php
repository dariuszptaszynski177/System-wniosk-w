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
 
 
 
 <style>
 th
 {
 background-color:lightgreen;
 }
 table
 {
 
 }
 </style>
 
</head>
<body>
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-sm-12">
				
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
		</form>
		<?php }
		?>
	
	
		<?//=echousername($user->data()->id)?>
		<?php  
		
		$id_stypendysty=$_REQUEST['id'];
		$konto=echousername($user->data()->id);
		//echo $konto;
		
		?>
		<h1 align="center">Dane stypendysty</h1>
		
		
		<?php
		



/* zapytanie do konkretnej tabeli */
$dane_podstawowe_stypendysty = $db -> query("SELECT * FROM `dane_podstawowe` where id='$id_stypendysty'");


		
	foreach($db->results() as $dane_podstawowe) 
	{
		
		
		$id=$dane_podstawowe->id;
		$konto_stypendysty=$dane_podstawowe->konto;
		$imie=$dane_podstawowe->imie;
		$nazwisko=$dane_podstawowe->nazwisko;
		$data_u=$dane_podstawowe->data_u;
		$miejsce_u=$dane_podstawowe->miejsce_u;
		$pesel=$dane_podstawowe->pesel;
		$powiat=$dane_podstawowe->powiat;
		$gmina=$dane_podstawowe->gmina;
		$ulica=$dane_podstawowe->ulica;
		$nr_domu=$dane_podstawowe->nr_domu;
		$nr_lokalu=$dane_podstawowe->nr_lokalu;
		$miejscowosc=$dane_podstawowe->miejscowosc;
		$kod=$dane_podstawowe->kod;
		$poczta=$dane_podstawowe->poczta;
		$nr_opiekuna=$dane_podstawowe->nr_opiekuna;
		$nr_komorkowy=$dane_podstawowe->nr_komorkowy;
		$email=$dane_podstawowe->email;
		
}


$nazwa_stypendysty=$konto_stypendysty;





$dane_szkola_stypendysty = $db -> query("SELECT * FROM `dane_szkola` where konto='$nazwa_stypendysty'");


foreach($db->results() as $dane_szkola)
{

		$nazwa_szkoly=$dane_szkola->nazwa_szkoly;
		$adres_szkoly=$dane_szkola->adres_szkoly;
		$klasa=$dane_szkola->klasa;
		$srednia_poprzednia=$dane_szkola->srednia_poprzednia;
		$srednia_biezaca=$dane_szkola->srednia_biezaca;
		
}




$j=0;


$dane_osiagniecia_stypendysty = $db -> query("SELECT * FROM `dane_osiagniecia` where konto='$nazwa_stypendysty'");


foreach($db->results() as $dane_osiagniecia)
		
{
		
		$osiagniecie=$dane_osiagniecia->osiagniecie;
		$data_osiagniecia=$dane_osiagniecia->data_osiagniecia;
		$zajete_miejsce=$dane_osiagniecia->zajete_miejsce;
		$informacje_dodatkowe=$dane_osiagniecia->informacje_dodatkowe;
		
		
		if($j==0)
		{
		$osiagniecie_tab[0][0]=$osiagniecie;
		$data_osiagniecia_tab[0][1]=$data_osiagniecia;
		$zajete_miejsce_tab[0][2]=$zajete_miejsce;
		$informacje_dodatkowe_tab[0][3]=$informacje_dodatkowe;
		}
		
		if($j==1)
		{
		$osiagniecie_tab[1][0]=$osiagniecie;
		$data_osiagniecia_tab[1][1]=$data_osiagniecia;
		$zajete_miejsce_tab[1][2]=$zajete_miejsce;
		$informacje_dodatkowe_tab[1][3]=$informacje_dodatkowe;
		}
		
		if($j==2)
		{
		$osiagniecie_tab[2][0]=$osiagniecie;
		$data_osiagniecia_tab[2][1]=$data_osiagniecia;
		$zajete_miejsce_tab[2][2]=$zajete_miejsce;
		$informacje_dodatkowe_tab[2][3]=$informacje_dodatkowe;
		}
		
		if($j==3)
		{
		$osiagniecie_tab[3][0]=$osiagniecie;
		$data_osiagniecia_tab[3][1]=$data_osiagniecia;
		$zajete_miejsce_tab[3][2]=$zajete_miejsce;
		$informacje_dodatkowe_tab[3][3]=$informacje_dodatkowe;
		}
		
		if($j==4)
		{
		$osiagniecie_tab[4][0]=$osiagniecie;
		$data_osiagniecia_tab[4][1]=$data_osiagniecia;
		$zajete_miejsce_tab[4][2]=$zajete_miejsce;
		$informacje_dodatkowe_tab[4][3]=$informacje_dodatkowe;
		}
		
		
		$j++;
		
}






/* zapytanie do konkretnej tabeli */
$dane_dodatkowe_stypendysty = $db -> query("SELECT * FROM `dane_dodatkowe` where konto='$nazwa_stypendysty'");


		
foreach($db->results() as $dane_dodatkowe)
{
		
		$zaintersowania=$dane_dodatkowe->zaintersowania;
		$plany=$dane_dodatkowe->plany;
			
}





		?>
		
		
		
		
		<?php
		
		echo "Imię : $imie <br />";
		echo "Nazwisko : $nazwisko<br /><br />";
		echo "Powiat : $powiat<br />";
		echo "Gmina : $gmina<br />";
		echo "Miejscowość : $miejscowosc<br />";
		echo "Ulica: $ulica<br />";
		echo "Nr domu : $nr_domu<br />";
		echo "Nr lokalu : $nr_lokalu<br />";
		echo "Kod pocztowy : $kod<br />";
		echo "Poczta : $poczta<br />";
		echo "<br />";
		echo "Nazwa szkoły : $nazwa_szkoly<br />";
		echo "Adres szkoły : $adres_szkoly<br />";
		echo "Klasa : $klasa<br />";
		echo "średnia z poprzedniego roku szkolnego : $srednia_poprzednia<br />";
		echo "Średnia z ostatniego semestru : $srednia_biezaca<br /><br />";
		
		echo "Osiągniecia";
		
		echo "<table border='1'>";
		
		
		echo "<tr>";
		
		echo "<td>";
		echo "Nazwa osiągnięcia";
		echo "</td>";
		
		echo "<td>";
		echo "Data osiągnięcia";
		echo "</td>";
		
		echo "<td>";
		echo "Zajęte miejsce";
		echo "</td>";
		
		echo "<td>";
		echo "Informacje dodatkowe";
		echo "</td>";
		
		echo "</tr>";
		
		
		echo "<tr>";
		
		echo "<td>";
		echo $osiagniecie_tab[0][0];
		echo "</td>";
		
		echo "<td>";
		echo $data_osiagniecia_tab[0][1];
		echo "</td>";
		
		echo "<td>";
		echo $zajete_miejsce_tab[0][2];
		echo "</td>";
		
		echo "<td>";
		echo $informacje_dodatkowe_tab[0][3];
		echo "</td>";
		
		echo "</tr>";
		
		
		echo "<tr>";
		
		echo "<td>";
		echo $osiagniecie_tab[1][0];
		echo "</td>";
		
		echo "<td>";
		echo $data_osiagniecia_tab[1][1];
		echo "</td>";
		
		echo "<td>";
		echo $zajete_miejsce_tab[1][2];
		echo "</td>";
		
		echo "<td>";
		echo $informacje_dodatkowe_tab[1][3];
		echo "</td>";
		
		echo "</tr>";
		
		
		echo "<tr>";
		
		echo "<td>";
		echo $osiagniecie_tab[2][0];
		echo "</td>";
		
		echo "<td>";
		echo $data_osiagniecia_tab[2][1];
		echo "</td>";
		
		echo "<td>";
		echo $zajete_miejsce_tab[2][2];
		echo "</td>";
		
		echo "<td>";
		echo $informacje_dodatkowe_tab[2][3];
		echo "</td>";
		
		echo "</tr>";
		
		
		echo "<tr>";
		
		echo "<td>";
		echo $osiagniecie_tab[3][0];
		echo "</td>";
		
		echo "<td>";
		echo $data_osiagniecia_tab[3][1];
		echo "</td>";
		
		echo "<td>";
		echo $zajete_miejsce_tab[3][2];
		echo "</td>";
		
		echo "<td>";
		echo $informacje_dodatkowe_tab[3][3];
		echo "</td>";
		
		echo "</tr>";
		
		
		echo "<tr>";
		
		echo "<td>";
		echo $osiagniecie_tab[4][0];
		echo "</td>";
		
		echo "<td>";
		echo $data_osiagniecia_tab[4][1];
		echo "</td>";
		
		echo "<td>";
		echo $zajete_miejsce_tab[4][2];
		echo "</td>";
		
		echo "<td>";
		echo $informacje_dodatkowe_tab[4][3];
		echo "</td>";
		
		echo "</tr>";
		
		
		echo "</table>";
		
		
		echo "Zainteresowania : <br />";
		echo $zaintersowania;
		echo "<br />";
		
		echo "Plany na przyszłość : <br />";
		echo $plany;
		echo "<br />";
		
		
		
		

		
		
		
		?>
		
		<div style="display:none;">
		<form action="dane_stypendystow_more_pobierz.php" method="post" target="_blank">
		
		<input name="imie" value="<?php echo $imie ?>">
		<input name="nazwisko" value="<?php echo $nazwisko ?>">
		<input name="miejscowosc" value="<?php echo $miejscowosc ?>">
		<input name="ulica" value="<?php echo $ulica ?>">
		<input name="nr_domu" value="<?php echo $nr_domu ?>">
		<input name="nr_lokalu" value="<?php echo $nr_lokalu ?>">
		<input name="kod" value="<?php echo $kod ?>">
		<input name="poczta" value="<?php echo $poczta ?>">
		<input name="nazwa_szkoly" value="<?php echo $nazwa_szkoly ?>">
		<input name="adres_szkoly" value="<?php echo $adres_szkoly ?>">
		<input name="klasa" value="<?php echo $klasa ?>">
		<input name="srednia_poprzednia" value="<?php echo $srednia_poprzednia ?>">
		<input name="srednia_biezaca" value="<?php echo $srednia_biezaca ?>">
		
		<input name="powiat" value="<?php echo $powiat ?>">
		<input name="gmina" value="<?php echo $gmina ?>">
		
		
		<input type="text" name="osiagniecie_1" value="<?php echo $osiagniecie_tab[0][0] ?>">
		<input type="text" name="data_1" value="<?php echo $data_osiagniecia_tab[0][1] ?>">
		<input type="text" name="miejsce_1" value="<?php echo $zajete_miejsce_tab[0][2] ?>">
		<input type="text" name="informacje_1" value="<?php echo $informacje_dodatkowe_tab[0][3] ?>">

		<input type="text" name="osiagniecie_2" value="<?php echo $osiagniecie_tab[1][0] ?>">
		<input type="text" name="data_2" value="<?php echo $data_osiagniecia_tab[1][1] ?>">
		<input type="text" name="miejsce_2" value="<?php echo $zajete_miejsce_tab[1][2] ?>">
		<input type="text" name="informacje_2" value="<?php echo $informacje_dodatkowe_tab[1][3] ?>">

		<input type="text" name="osiagniecie_3" value="<?php echo $osiagniecie_tab[2][0] ?>">
		<input type="text" name="data_3" value="<?php echo $data_osiagniecia_tab[2][1] ?>">
		<input type="text" name="miejsce_3" value="<?php echo $zajete_miejsce_tab[2][2] ?>">
		<input type="text" name="informacje_3" value="<?php echo $informacje_dodatkowe_tab[2][3] ?>">

		<input type="text" name="osiagniecie_4" value="<?php echo $osiagniecie_tab[3][0] ?>">
		<input type="text" name="data_4" value="<?php echo $data_osiagniecia_tab[3][1] ?>">
		<input type="text" name="miejsce_4" value="<?php echo $zajete_miejsce_tab[3][2] ?>">
		<input type="text" name="informacje_4" value="<?php echo $informacje_dodatkowe_tab[3][3] ?>">

		<input type="text" name="osiagniecie_5" value="<?php echo $osiagniecie_tab[4][0] ?>">
		<input type="text" name="data_5" value="<?php echo $data_osiagniecia_tab[4][1] ?>">
		<input type="text" name="miejsce_5" value="<?php echo $zajete_miejsce_tab[4][2] ?>">
		<input type="text" name="informacje_5" value="<?php echo $informacje_dodatkowe_tab[4][3] ?>">


		
		<textarea name="zaintersowania"><?php echo $zaintersowania ?></textarea>
		<textarea name="plany"><?php echo $plany ?></textarea>
		

		
		
		
		</div>
		<br />
		<input class="btn btn-success" type="submit" value="Pobierz dane">
		
		</form>
		<br /><br />
		
		
		

					
					
				<!-- Content Ends Here -->
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div> <!-- /.wrapper -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>

</body>
</html>
