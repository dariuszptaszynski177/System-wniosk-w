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
 margin-left:auto;
 margin-right:auto;
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
	</div>
	
		<?//=echousername($user->data()->id)?>
		<?php  
		$konto=echousername($user->data()->id);
		//echo $konto;

		$rok_wnioskow=$_REQUEST['rok'];
		echo $rok_wnioskow;
		?>
		<h1 align="center">Dane kontaktowe stypedystów (<?php echo $rok_wnioskow; ?>)</h1>
		
		
		<?php
		

		



/* zapytanie do konkretnej tabeli */
$dane_stypendystow = $db -> query("SELECT * FROM `dane_podstawowe` t1 INNER JOIN `dane_szkola` t2 on t1.konto=t2.konto WHERE t1.dane_wniosku LIKE '%$rok_wnioskow%'");


/*wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/

echo "<table  border=1 style=border-collapse: collapse>";
echo "<tr>
<th>Imię</th>
<th>Nazwisko</th>
<th>Data urodzenia</th>
<th>Ulica</th>
<th>Nr domu</th>
<th>Nr lokalu</th>
<th>Miejscowość</th>
<th>Kod pocztowy</th>
<th>Poczta</th>
<th>Nr opiekuna</th>
<th>Nr komórkowy</th>
<th>E-mail</th>
<th>Nazwa szkoły</th>
<th>Adres szkoły</th>
<th>Średnia poprzednia</th>
<th>Średnia bieżąca</th>

</tr>";

echo "</tr>";

foreach($db->results() as $dane)
{
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */
   
    echo "<tr>";
		
		
		
		echo "<td>".$dane->imie."</td>";
		echo "<td>".$dane->nazwisko."</td>";
		echo "<td>".$dane->data_u."</td>";
		echo "<td title=imie>".$dane->ulica."</td>";
		echo "<td title=imie>".$dane->nr_domu."</td>";
		echo "<td title=imie>".$dane->nr_lokalu."</td>";
		echo "<td title=imie>".$dane->miejscowosc."</td>";
		echo "<td title=imie>".$dane->kod."</td>";
		echo "<td title=imie>".$dane->poczta."</td>";
		echo "<td title=imie>".$dane->nr_opiekuna."</td>";
		echo "<td title=imie>".$dane->nr_komorkowy."</td>";
		echo "<td title=imie>".$dane->email."</td>";
		echo "<td title=imie>".$dane->nazwa_szkoly."</td>";
		echo "<td title=imie>".$dane->adres_szkoly."</td>";
		//echo "<td title=imie>".$r['klasa']."</td>";
		echo "<td title=imie>".$dane->srednia_poprzednia."</td>";
		echo "<td title=imie>".$dane->srednia_biezaca."</td>";
		
		
		$id=$r['id'];
		$konto=$r['konto'];
		$imie=$r['imie'];
		$nazwisko=$r['nazwisko'];
		$data_u=$r['data_u'];
		$miejsce_u=$r['miejsce_u'];
		$pesel=$r['pesel'];
		$powiat=$r['powiat'];
		$gmina=$r['gmina'];
		$ulica=$r['ulica'];
		$nr_domu=$r['nr_domu'];
		$nr_lokalu=$r['nr_lokalu'];
		$miejscowosc=$r['miejscowosc'];
		$kod=$r['kod'];
		$poczta=$r['poczta'];
		$nr_opiekuna=$r['nr_opiekuna'];
		$nr_komorkowy=$r['nr_komorkowy'];
		$email=$r['email'];
		$nazwa_szkoly=$r['nazwa_szkoly'];
		$adres_szkoly=$r['adres_szkoly'];
		$klasa=$r['klasa'];
		$srednia_poprzednia=$r['srednia_poprzednia'];
		$srednia_biezaca=$r['srednia_biezaca'];
		
		
		 echo "</tr>";
    }
    echo "</table>";

		?>
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
