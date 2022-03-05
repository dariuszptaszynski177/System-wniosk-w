t<?php
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
	</div>
	
		<?//=echousername($user->data()->id)?>
		<?php  
		
		$jakie_konto=echousername($user->data()->id);
		

		//dane wniosku określonego
		$dane_wniosku = $_REQUEST['dane_wniosku'];
		echo $dane_wniosku;
		
		
		//data do kiedy można złżyć wniosek
		include "data_wniosku.inc";
		
		//sprawdzanie czy wniosek jest potwierdzony
		include "potwierdzenie.inc";
		echo $potwierdzenie;
		
		
		?>
		
		


<?php



//dane podstawowe




$dane_podstawowe_pobierz=$db->query("SELECT * FROM dane_podstawowe where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");


				foreach($db->results() as $dane_podstawowe)
				{
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


//koniec dane podstawowe
		?>
		
		
		
		<?php
		
		//dane szkoła
		
		$dane_szkola_pobierz=$db->query("SELECT * FROM dane_szkola WHERE konto = '$jakie_konto' AND dane_wniosku='$dane_wniosku' ");


		foreach($db->results() as $dane_szkola)
		{
		
		
		$nazwa_szkoly=$dane_szkola->nazwa_szkoly;
		$adres_szkoly=$dane_szkola->adres_szkoly;
		$klasa=$dane_szkola->klasa;
		$srednia_poprzednia=$dane_szkola->srednia_poprzednia;
		$srednia_biezaca=$dane_szkola->srednia_biezaca;
		}
		
		


		//koniec dane szkoła

		?>
		
		
		
		<?php

		//dane rodzina

		
$licz=0;
$id_czlonka=1;
$i=0;

$dane_rodzina_pobierz = $db -> query("SELECT * FROM dane_rodzina where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");
		foreach($db->results() as $dane_rodzina)
		{
		
		$licz++;
		
		
		
		$id_czlonka++;
		
		if($i==0)
		{
		$rodzina_imie_tab[0][0]=$dane_rodzina->rodzina_imie;
		$rodzina_nazwisko_tab[0][1]=$dane_rodzina->rodzina_nazwisko;
		$rodzina_data_u_tab[0][2]=$dane_rodzina->rodzina_data_u;
		$rodzina_pokrewienstwo_tab[0][3]=$dane_rodzina->rodzina_pokrewienstwo;
		$rodzina_miejsce_n_z_tab[0][4]=$dane_rodzina->rodzina_miejsce_n_z;
		}
		
		if($i==1)
		{
		$rodzina_imie_tab[1][0]=$dane_rodzina->rodzina_imie;
		$rodzina_nazwisko_tab[1][1]=$dane_rodzina->rodzina_nazwisko;
		$rodzina_data_u_tab[1][2]=$dane_rodzina->rodzina_data_u;
		$rodzina_pokrewienstwo_tab[1][3]=$dane_rodzina->rodzina_pokrewienstwo;
		$rodzina_miejsce_n_z_tab[1][4]=$dane_rodzina->rodzina_miejsce_n_z;
		}
		
		if($i==2)
		{
		$rodzina_imie_tab[2][0]=$dane_rodzina->rodzina_imie;
		$rodzina_nazwisko_tab[2][1]=$dane_rodzina->rodzina_nazwisko;
		$rodzina_data_u_tab[2][2]=$dane_rodzina->rodzina_data_u;
		$rodzina_pokrewienstwo_tab[2][3]=$dane_rodzina->rodzina_pokrewienstwo;
		$rodzina_miejsce_n_z_tab[2][4]=$dane_rodzina->rodzina_miejsce_n_z;
		}
		
		if($i==3)
		{
		$rodzina_imie_tab[3][0]=$dane_rodzina->rodzina_imie;
		$rodzina_nazwisko_tab[3][1]=$dane_rodzina->rodzina_nazwisko;
		$rodzina_data_u_tab[3][2]=$dane_rodzina->rodzina_data_u;
		$rodzina_pokrewienstwo_tab[3][3]=$dane_rodzina->rodzina_pokrewienstwo;
		$rodzina_miejsce_n_z_tab[3][4]=$dane_rodzina->rodzina_miejsce_n_z;
		}
		
		if($i==4)
		{
		$rodzina_imie_tab[4][0]=$dane_rodzina->rodzina_imie;
		$rodzina_nazwisko_tab[4][1]=$dane_rodzina->rodzina_nazwisko;
		$rodzina_data_u_tab[4][2]=$dane_rodzina->rodzina_data_u;
		$rodzina_pokrewienstwo_tab[4][3]=$dane_rodzina->rodzina_pokrewienstwo;
		$rodzina_miejsce_n_z_tab[4][4]=$dane_rodzina->rodzina_miejsce_n_z;
		}
		
		if($i==5)
		{
		$rodzina_imie_tab[5][0]=$dane_rodzina->rodzina_imie;
		$rodzina_nazwisko_tab[5][1]=$dane_rodzina->rodzina_nazwisko;
		$rodzina_data_u_tab[5][2]=$dane_rodzina->rodzina_data_u;
		$rodzina_pokrewienstwo_tab[5][3]=$dane_rodzina->rodzina_pokrewienstwo;
		$rodzina_miejsce_n_z_tab[5][4]=$dane_rodzina->rodzina_miejsce_n_z;
		}
		
		if($i==6)
		{
		$rodzina_imie_tab[6][0]=$dane_rodzina->rodzina_imie;
		$rodzina_nazwisko_tab[6][1]=$dane_rodzina->rodzina_nazwisko;
		$rodzina_data_u_tab[6][2]=$dane_rodzina->rodzina_data_u;
		$rodzina_pokrewienstwo_tab[6][3]=$dane_rodzina->rodzina_pokrewienstwo;
		$rodzina_miejsce_n_z_tab[6][4]=$dane_rodzina->rodzina_miejsce_n_z;
		}
		
		if($i==7)
		{
		$rodzina_imie_tab[7][0]=$dane_rodzina->rodzina_imie;
		$rodzina_nazwisko_tab[7][1]=$dane_rodzina->rodzina_nazwisko;
		$rodzina_data_u_tab[7][2]=$dane_rodzina->rodzina_data_u;
		$rodzina_pokrewienstwo_tab[7][3]=$dane_rodzina->rodzina_pokrewienstwo;
		$rodzina_miejsce_n_z_tab[7][4]=$dane_rodzina->rodzina_miejsce_n_z;
		}
		
		if($i==8)
		{
		$rodzina_imie_tab[8][0]=$dane_rodzina->rodzina_imie;
		$rodzina_nazwisko_tab[8][1]=$dane_rodzina->rodzina_nazwisko;
		$rodzina_data_u_tab[8][2]=$dane_rodzina->rodzina_data_u;
		$rodzina_pokrewienstwo_tab[8][3]=$dane_rodzina->rodzina_pokrewienstwo;
		$rodzina_miejsce_n_z_tab[8][4]=$dane_rodzina->rodzina_miejsce_n_z;
		}
		
		if($i==9)
		{
		$rodzina_imie_tab[9][0]=$dane_rodzina->rodzina_imie;
		$rodzina_nazwisko_tab[9][1]=$dane_rodzina->rodzina_nazwisko;
		$rodzina_data_u_tab[9][2]=$dane_rodzina->rodzina_data_u;
		$rodzina_pokrewienstwo_tab[9][3]=$dane_rodzina->rodzina_pokrewienstwo;
		$rodzina_miejsce_n_z_tab[9][4]=$dane_rodzina->rodzina_miejsce_n_z;
		}
		
		

		$i++;
		 
    }
   


		//echo $rodzina_imie_tab[2][0];
		//echo $rodzina_nazwisko_tab[2][1];
		//echo $rodzina_data_u_tab[2][2];
		//echo $rodzina_pokrewienstwo_tab[2][3];
		//echo $rodzina_miejsce_n_z_tab[2][4];
//koniec dane rodzina

?>



<?php

//dane dochody

$dane_dochody_pobierz = $db -> query("SELECT * FROM dane_dochody where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");

foreach($db->results() as $dane_dochody)
{

$id=$dane_dochody->id;

$dochod_1=$dane_dochody->dochod_1;

$dochod_2=$dane_dochody->dochod_2;

$dochod_3=$dane_dochody->dochod_3;

$dochod_4=$dane_dochody->dochod_4;

$dochod_5=$dane_dochody->dochod_5;

$dochod_6=$dane_dochody->dochod_6;

$dochod_7=$dane_dochody->dochod_7;

$dochod_8=$dane_dochody->dochod_8;

$dochod_9=$dane_dochody->dochod_9;

$dochod_10_nazwa=$dane_dochody->dochod_10_nazwa;

$dochod_10=$dane_dochody->dochod_10;

$dochod_na_osobe=$dane_dochody->dochod_na_osobe;

$dochod_razem=$dane_dochody->dochod_razem;

}
		
		//koniec dane dochody
		?>

		
		<?php

 //dane osiągnięcia

$licz=0;
$id_osiagniecia=1;
$j=0;

$dane_osiagniecia_pobierz=$db->query("SELECT * FROM dane_osiagniecia where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");
		
		foreach($db->results() as $dane_osiagniecia) {
		
		$licz++;
		
		
		if($j==0)
		{
		$osiagniecie_tab[0][0]=$dane_osiagniecia->osiagniecie;
		$data_osiagniecia_tab[0][1]=$dane_osiagniecia->data_osiagniecia;
		$zajete_miejsce_tab[0][2]=$dane_osiagniecia->zajete_miejsce;
		$informacje_dodatkowe_tab[0][3]=$dane_osiagniecia->informacje_dodatkowe;
		}
		
		if($j==1)
		{
		$osiagniecie_tab[1][0]=$dane_osiagniecia->osiagniecie;
		$data_osiagniecia_tab[1][1]=$dane_osiagniecia->data_osiagniecia;
		$zajete_miejsce_tab[1][2]=$dane_osiagniecia->zajete_miejsce;
		$informacje_dodatkowe_tab[1][3]=$dane_osiagniecia->informacje_dodatkowe;
		}
		
		if($j==2)
		{
		$osiagniecie_tab[2][0]=$dane_osiagniecia->osiagniecie;
		$data_osiagniecia_tab[2][1]=$dane_osiagniecia->data_osiagniecia;
		$zajete_miejsce_tab[2][2]=$dane_osiagniecia->zajete_miejsce;
		$informacje_dodatkowe_tab[2][3]=$dane_osiagniecia->informacje_dodatkowe;
		}
		
		if($j==3)
		{
		$osiagniecie_tab[3][0]=$dane_osiagniecia->osiagniecie;
		$data_osiagniecia_tab[3][1]=$dane_osiagniecia->data_osiagniecia;
		$zajete_miejsce_tab[3][2]=$dane_osiagniecia->zajete_miejsce;
		$informacje_dodatkowe_tab[3][3]=$dane_osiagniecia->informacje_dodatkowe;
		}
		
		if($j==4)
		{
		$osiagniecie_tab[4][0]=$dane_osiagniecia->osiagniecie;
		$data_osiagniecia_tab[4][1]=$dane_osiagniecia->data_osiagniecia;
		$zajete_miejsce_tab[4][2]=$dane_osiagniecia->zajete_miejsce;
		$informacje_dodatkowe_tab[4][3]=$dane_osiagniecia->informacje_dodatkowe;
		}
		
		
		$j++;
		
		$id_osiagniecia++;
		
		
		 
    }
   

//koniec dane osiągnięcia


?>


<?php

//dane dodatkowe

$dane_dodatkowe_pobierz=$db->query("SELECT * FROM dane_dodatkowe where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");

				foreach($db->results() as $dane_dodatkowe)
				{
		
						$id=$dane_dodatkowe->id;
						$zajecia_pozaszkolne=$dane_dodatkowe->zajecia_pozaszkolne;
						$zainteresowania=$dane_dodatkowe->zaintersowania;
						$plany=$dane_dodatkowe->plany;
						$sytuacja_rodzinna=$dane_dodatkowe->sytuacja_rodzinna;
		
			}
		//koniec dane dodatkowe
		
		?>
		



 <?php

 //dane załączniki
 
$licz=0;
$id_zalacznika=1;
$k=0;

$dane_zalaczniki_pobierz = $db -> query("SELECT * FROM dane_zalaczniki where konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");

		foreach($db->results() as $dane_zalaczniki)
		{
		
		$licz++;
		
		
		
		
		if($k==0)
		{
		$zalacznik_tab[0]=$dane_zalaczniki->zalacznik;
		}
		
		if($k==1)
		{
		$zalacznik_tab[1]=$dane_zalaczniki->zalacznik;
		}
		
		if($k==2)
		{
		$zalacznik_tab[2]=$dane_zalaczniki->zalacznik;
		}
		
		if($k==3)
		{
		$zalacznik_tab[3]=$dane_zalaczniki->zalacznik;
		}
		
		if($k==4)
		{
		$zalacznik_tab[4]=$dane_zalaczniki->zalacznik;
		}
		
		
		$k++;
		$id_zalacznika++;
		
		
		 
    }
   


//koniec dane załączniki
?>



<h3>Dane podstawowe</h3>
<b>Imię:</b> <?php echo $imie ?><br />
<b>Nazwisko:</b> <?php echo $nazwisko ?><br />
<b>Data urodzenia:</b> <?php echo $data_u ?><br />
<b>Miejsce urodzenia:</b> <?php echo $miejsce_u ?><br /><br />

<b>Dokładny adres zamieszkania:</b><br />
<b>Powiat:</b> <?php echo $powiat ?><br />
<b>Gmina:</b> <?php echo $gmina ?><br />
<b>Ulica:</b> <?php echo $ulica ?><br />
<b>Nr domu:</b> <?php echo $nr_domu ?><br />
<b>Nr lokalu:</b> <?php echo $nr_lokalu ?><br />
<b>Miejscowość:</b> <?php echo $miejscowosc ?><br />
<b>Kod pocztowy:</b> <?php echo $kod ?><br />
<b>Poczta:</b> <?php echo $poczta ?><br /><br />

<b>Dane kontaktowe:</b><br />
<b>Nr komórkowy:</b> <?php echo $nr_komorkowy ?><br />
<b>Nr opiekuna:</b> <?php echo $nr_opiekuna ?><br />
<b>E-mail:</b> <?php echo $email ?><br />
<b>PESEL:</b> <?php echo $pesel ?><br />

<h3>Dane o szkole</h3>
<b>Nazwa szkoły:</b> <?php echo $nazwa_szkoly ?><br />
<b>Adres szkoły:</b> <?php echo $adres_szkoly ?><br />
<b>Klasa, do której aktualnie uczęszczasz:</b> <?php echo $klasa ?><br />
<b>Średnia z poprzedniego roku/semestru:</b> <?php echo $srednia_poprzednia ?><br />
<b>Średnia z ostatniego roku/semestru:</b> <?php echo $srednia_biezaca ?>

<style>
table, td, th {
  border: 1px solid black;
}

table {
  
  border-collapse: collapse;
}

#page-wrapper
{
	padding: 30px;
}

/* table td:after {
  min-height: 10px !important;
  display: block;
  content: ""
} */
</style>

<h3>Dane o rodzinie</h3>
<table>
<tr>
<th>Lp.</th><th>Imię</th><th>Nazwisko</th><th>Data urodzenia</th><th>Pokrewieństwo</th><th>Adres zamieszkania lub nazwa zakładu pracy</th>
</tr>
<tr>
<td>1</td>
<td><?php echo $rodzina_imie_tab[0][0] ?></td>
<td><?php echo $rodzina_nazwisko_tab[0][1] ?></td>
<td><?php echo $rodzina_data_u_tab[0][2] ?></td>
<td><?php echo $rodzina_pokrewienstwo_tab[0][3] ?></td>
<td><?php echo $rodzina_miejsce_n_z_tab[0][4] ?></td>
</tr>

<tr>
<td>2</td>
<td><?php echo $rodzina_imie_tab[1][0] ?></td>
<td><?php echo $rodzina_nazwisko_tab[1][1] ?></td>
<td><?php echo $rodzina_data_u_tab[1][2] ?></td>
<td><?php echo $rodzina_pokrewienstwo_tab[1][3] ?></td>
<td><?php echo $rodzina_miejsce_n_z_tab[1][4] ?></td>
</tr>

<tr>
<td>3</td>
<td><?php echo $rodzina_imie_tab[2][0] ?></td>
<td><?php echo $rodzina_nazwisko_tab[2][1] ?></td>
<td><?php echo $rodzina_data_u_tab[2][2] ?></td>
<td><?php echo $rodzina_pokrewienstwo_tab[2][3] ?></td>
<td><?php echo $rodzina_miejsce_n_z_tab[2][4] ?></td>
</tr>

<tr>
<td>4</td>
<td><?php echo $rodzina_imie_tab[3][0] ?></td>
<td><?php echo $rodzina_nazwisko_tab[3][1] ?></td>
<td><?php echo $rodzina_data_u_tab[3][2] ?></td>
<td><?php echo $rodzina_pokrewienstwo_tab[3][3] ?></td>
<td><?php echo $rodzina_miejsce_n_z_tab[3][4] ?></td>
</tr>

<tr>
<td>5</td>
<td><?php echo $rodzina_imie_tab[4][0] ?></td>
<td><?php echo $rodzina_nazwisko_tab[4][1] ?></td>
<td><?php echo $rodzina_data_u_tab[4][2] ?></td>
<td><?php echo $rodzina_pokrewienstwo_tab[4][3] ?></td>
<td><?php echo $rodzina_miejsce_n_z_tab[4][4] ?></td>
</tr>

<tr>
<td>6</td>
<td><?php echo $rodzina_imie_tab[5][0] ?></td>
<td><?php echo $rodzina_nazwisko_tab[5][1] ?></td>
<td><?php echo $rodzina_data_u_tab[5][2] ?></td>
<td><?php echo $rodzina_pokrewienstwo_tab[5][3] ?></td>
<td><?php echo $rodzina_miejsce_n_z_tab[5][4] ?></td>
</tr>

<tr>
<td>7</td>
<td><?php echo $rodzina_imie_tab[6][0] ?></td>
<td><?php echo $rodzina_nazwisko_tab[6][1] ?></td>
<td><?php echo $rodzina_data_u_tab[6][2] ?></td>
<td><?php echo $rodzina_pokrewienstwo_tab[6][3] ?></td>
<td><?php echo $rodzina_miejsce_n_z_tab[6][4] ?></td>
</tr>

<tr>
<td>8</td>
<td><?php echo $rodzina_imie_tab[7][0] ?></td>
<td><?php echo $rodzina_nazwisko_tab[7][1] ?></td>
<td><?php echo $rodzina_data_u_tab[7][2] ?></td>
<td><?php echo $rodzina_pokrewienstwo_tab[7][3] ?></td>
<td><?php echo $rodzina_miejsce_n_z_tab[7][4] ?></td>
</tr>

<tr>
<td>9</td>
<td><?php echo $rodzina_imie_tab[8][0] ?></td>
<td><?php echo $rodzina_nazwisko_tab[8][1] ?></td>
<td><?php echo $rodzina_data_u_tab[8][2] ?></td>
<td><?php echo $rodzina_pokrewienstwo_tab[8][3] ?></td>
<td><?php echo $rodzina_miejsce_n_z_tab[8][4] ?></td>
</tr>

<tr>
<td>10</td>
<td><?php echo $rodzina_imie_tab[9][0] ?></td>
<td><?php echo $rodzina_nazwisko_tab[9][1] ?></td>
<td><?php echo $rodzina_data_u_tab[9][2] ?></td>
<td><?php echo $rodzina_pokrewienstwo_tab[9][3] ?></td>
<td><?php echo $rodzina_miejsce_n_z_tab[9][4] ?></td>
</tr>

</table>

<br />

<h3>Dane o dochodach</h3>
<table>

<tr>
<th>Lp.</th>
<th>Nazwa dochodu</th>
<th>Wysokość dochodu brutto</th>
</tr>

<tr>
<td>1</td>
<td></td>
<td><?php echo $dochod_1 ?></td>
</tr>

<tr>
<td>2</td>
<td></td>
<td><?php echo $dochod_2 ?></td>
</tr>

<tr>
<td>3</td>
<td></td>
<td><?php echo $dochod_3 ?></td>
</tr>

<tr>
<td>4</td>
<td></td>
<td><?php echo $dochod_4 ?></td>
</tr>

<tr>
<td>5</td>
<td></td>
<td><?php echo $dochod_5 ?></td>
</tr>

<tr>
<td>6</td>
<td></td>
<td><?php echo $dochod_6 ?></td>
</tr>

<tr>
<td>7</td>
<td></td>
<td><?php echo $dochod_7 ?></td>
</tr>

<tr>
<td>8</td>
<td></td>
<td><?php echo $dochod_8 ?></td>
</tr>

<tr>
<td>9</td>
<td></td>
<td><?php echo $dochod_9 ?></td>
</tr>

<tr>
<td>10</td>
<td><?php echo $dochod_10_nazwa ?></td>
<td><?php echo $dochod_10 ?></td>
</tr>

</table>

Dochód na osobę: <?php echo $dochod_na_osobe ?>


<h3>Dane o osiągnięciach</h3>
<table>

<tr>
<th>Lp.</th>
<th>Nazwa osiągnięcia</th>
<th>Data osiągnięcia</th>
<th>Zajęte miejsce</th>
<th>Dodatkowe informacje</th>
</tr>

<tr>
<td>1</td>
<td><?php echo $osiagniecie_tab[0][0] ?></td>
<td><?php echo $data_osiagniecia_tab[0][1] ?></td>
<td><?php echo $zajete_miejsce_tab[0][2] ?></td>
<td><?php echo $informacje_dodatkowe_tab[0][3] ?></td>
</tr>

<tr>
<td>2</td>
<td><?php echo $osiagniecie_tab[1][0] ?></td>
<td><?php echo $data_osiagniecia_tab[1][1] ?></td>
<td><?php echo $zajete_miejsce_tab[1][2] ?></td>
<td><?php echo $informacje_dodatkowe_tab[1][3] ?></td>
</tr>

<tr>
<td>3</td>
<td><?php echo $osiagniecie_tab[2][0] ?></td>
<td><?php echo $data_osiagniecia_tab[2][1] ?></td>
<td><?php echo $zajete_miejsce_tab[2][2] ?></td>
<td><?php echo $informacje_dodatkowe_tab[2][3] ?></td>
</tr>

<tr>
<td>4</td>
<td><?php echo $osiagniecie_tab[3][0] ?></td>
<td><?php echo $data_osiagniecia_tab[3][1] ?></td>
<td><?php echo $zajete_miejsce_tab[3][2] ?></td>
<td><?php echo $informacje_dodatkowe_tab[3][3] ?></td>
</tr>

<tr>
<td>5</td>
<td><?php echo $osiagniecie_tab[4][0] ?></td>
<td><?php echo $data_osiagniecia_tab[4][1] ?></td>
<td><?php echo $zajete_miejsce_tab[4][2] ?></td>
<td><?php echo $informacje_dodatkowe_tab[4][3] ?></td>
</tr>
</table>

<h3>Dane dodatkowe</h3>
<b>Zajęcia pozaszkolne:</b> <br /><?php echo $zajecia_pozaszkolne ?><br />
<b>Zainteresowania: </b><br /><?php echo $zainteresowania ?><br />
<b>Plany na przyszłość:</b><br /> <?php echo $plany ?><br />
<b>Sytuacja rodzinna:</b> <br /><?php echo $sytuacja_rodzinna ?><br />

<h3>Załączniki do wniosku</h3>
<table>

<tr>
<th>Lp.</th>
<th>Nazwa załącznika</th>
</tr>

<tr>
<td>1</td>
<td><?php echo $zalacznik_tab[0] ?></td>
</tr>

<tr>
<td>2</td>
<td><?php echo $zalacznik_tab[1] ?></td>
</tr>

<tr>
<td>3</td>
<td><?php echo $zalacznik_tab[2] ?></td>
</tr>

<tr>
<td>4</td>
<td><?php echo $zalacznik_tab[3] ?></td>
</tr>

<tr>
<td>5</td>
<td><?php echo $zalacznik_tab[4] ?></td>
</tr>

</table>










</div>

					
					
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
