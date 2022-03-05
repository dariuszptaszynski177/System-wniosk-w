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
 
 <!-- Zliczanie znaków -->

 <script type="text/javascript">
function counter( string ) {
  var maxLength = 500;
  var oSpan = document.getElementById( 'counter' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oText' ).disabled=true;
}
</script>


<script type="text/javascript">
function counterr( string ) {
  var maxLength = 500;
  var oSpan = document.getElementById( 'counterr' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oTextt' ).disabled=true;
}
</script>


<script type="text/javascript">
function counterrr( string ) {
  var maxLength = 500;
  var oSpan = document.getElementById( 'counterrr' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oTexttt' ).disabled=true;
}
</script>


<script type="text/javascript">
function counterrrr( string ) {
  var maxLength = 500;
  var oSpan = document.getElementById( 'counterrrr' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oTextttt' ).disabled=true;
}
</script>
 
 <!--koniec Zliczanie znaków -->
 
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
		//echo $dane_wniosku;
		
		
		//data do kiedy można złżyć wniosek
		include "data_wniosku.inc";
		
		//sprawdzanie czy wniosek jest potwierdzony
		include "potwierdzenie.inc";
		echo $potwierdzenie;
		
		
		?>
		
		<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php 
					
					$nazwa_zakladki="generowanie";

					include "menu_boczne.inc"?>
				</div>
	
	
				<!-- div prawy -->
				<div class="bg-success col-10" style="-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%">	
		
		
		<div id="formularz">
		
		<h2 style="text-align:center;">Twoje dane zostały przesłane do naszej bazy danych. Aby wygenerować wniosek PDF z Twoimi danymi, kliknij Generuj wniosek.</h2><br /><br />
		
		<h2 style="text-align:center; color:red;">Wygenerowany wniosek PDF otworzy się w nowej karcie</h2>
			
		<!--ukrycie danych -->
		<div style="display:none">


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

		if($k==5)
		{
		$zalacznik_tab[5]=$dane_zalaczniki->zalacznik;
		}

		if($k==6)
		{
		$zalacznik_tab[6]=$dane_zalaczniki->zalacznik;
		}

		if($k==7)
		{
		$zalacznik_tab[7]=$dane_zalaczniki->zalacznik;
		}

		if($k==8)
		{
		$zalacznik_tab[8]=$dane_zalaczniki->zalacznik;
		}

		if($k==9)
		{
		$zalacznik_tab[9]=$dane_zalaczniki->zalacznik;
		}
		
		
		$k++;
		$id_zalacznika++;
		
		
		 
    }
   


//koniec dane załączniki
?>


<form action="generatePDF.php" method="post" target="_blank">

<input type="text" name="imie" value="<?php echo $imie ?>">
<input type="text" name="nazwisko" value="<?php echo $nazwisko ?>">
<input type="text" name="data_u" value="<?php echo $data_u ?>">
<input type="text" name="miejsce_u" value="<?php echo $miejsce_u ?>">

<input type="text" name="powiat" value="<?php echo $powiat ?>">
<input type="text" name="gmina" value="<?php echo $gmina ?>">
<input type="text" name="ulica" value="<?php echo $ulica ?>">
<input type="text" name="nr_domu" value="<?php echo $nr_domu ?>">
<input type="text" name="nr_lokalu" value="<?php echo $nr_lokalu ?>">
<input type="text" name="miejscowosc" value="<?php echo $miejscowosc ?>">
<input type="text" name="kod" value="<?php echo $kod ?>">
<input type="text" name="poczta" value="<?php echo $poczta ?>">

<input type="text" name="nr_komorkowy" value="<?php echo $nr_komorkowy ?>">
<input type="text" name="nr_opiekuna" value="<?php echo $nr_opiekuna ?>">
<input type="text" name="email" value="<?php echo $email ?>">
<input type="text" name="pesel" value="<?php echo $pesel ?>">

<input type="text" name="nazwa_szkoly" value="<?php echo $nazwa_szkoly ?>">
<input type="text" name="adres_szkoly" value="<?php echo $adres_szkoly ?>">
<input type="text" name="klasa" value="<?php echo $klasa ?>">
<input type="text" name="srednia_poprzednia" value="<?php echo $srednia_poprzednia ?>">
<input type="text" name="srednia_biezaca" value="<?php echo $srednia_biezaca ?>">



<input type="text" name="imie_1" value="<?php echo $rodzina_imie_tab[0][0] ?>">
<input type="text" name="nazwisko_1" value="<?php echo $rodzina_nazwisko_tab[0][1] ?>">
<input type="text" name="data_u_1" value="<?php echo $rodzina_data_u_tab[0][2] ?>">
<input type="text" name="pokrewienstwo_1" value="<?php echo $rodzina_pokrewienstwo_tab[0][3] ?>">
<input type="text" name="miejsce_n_z_1" value="<?php echo $rodzina_miejsce_n_z_tab[0][4] ?>">

<input type="text" name="imie_2" value="<?php echo $rodzina_imie_tab[1][0] ?>">
<input type="text" name="nazwisko_2" value="<?php echo $rodzina_nazwisko_tab[1][1] ?>">
<input type="text" name="data_u_2" value="<?php echo $rodzina_data_u_tab[1][2] ?>">
<input type="text" name="pokrewienstwo_2" value="<?php echo $rodzina_pokrewienstwo_tab[1][3] ?>">
<input type="text" name="miejsce_n_z_2" value="<?php echo $rodzina_miejsce_n_z_tab[1][4] ?>">

<input type="text" name="imie_3" value="<?php echo $rodzina_imie_tab[2][0] ?>">
<input type="text" name="nazwisko_3" value="<?php echo $rodzina_nazwisko_tab[2][1] ?>">
<input type="text" name="data_u_3" value="<?php echo $rodzina_data_u_tab[2][2] ?>">
<input type="text" name="pokrewienstwo_3" value="<?php echo $rodzina_pokrewienstwo_tab[2][3] ?>">
<input type="text" name="miejsce_n_z_3" value="<?php echo $rodzina_miejsce_n_z_tab[2][4] ?>">

<input type="text" name="imie_4" value="<?php echo $rodzina_imie_tab[3][0] ?>">
<input type="text" name="nazwisko_4" value="<?php echo $rodzina_nazwisko_tab[3][1] ?>">
<input type="text" name="data_u_4" value="<?php echo $rodzina_data_u_tab[3][2] ?>">
<input type="text" name="pokrewienstwo_4" value="<?php echo $rodzina_pokrewienstwo_tab[3][3] ?>">
<input type="text" name="miejsce_n_z_4" value="<?php echo $rodzina_miejsce_n_z_tab[3][4] ?>">

<input type="text" name="imie_5" value="<?php echo $rodzina_imie_tab[4][0] ?>">
<input type="text" name="nazwisko_5" value="<?php echo $rodzina_nazwisko_tab[4][1] ?>">
<input type="text" name="data_u_5" value="<?php echo $rodzina_data_u_tab[4][2] ?>">
<input type="text" name="pokrewienstwo_5" value="<?php echo $rodzina_pokrewienstwo_tab[4][3] ?>">
<input type="text" name="miejsce_n_z_5" value="<?php echo $rodzina_miejsce_n_z_tab[4][4] ?>">

<input type="text" name="imie_6" value="<?php echo $rodzina_imie_tab[5][0] ?>">
<input type="text" name="nazwisko_6" value="<?php echo $rodzina_nazwisko_tab[5][1] ?>">
<input type="text" name="data_u_6" value="<?php echo $rodzina_data_u_tab[5][2] ?>">
<input type="text" name="pokrewienstwo_6" value="<?php echo $rodzina_pokrewienstwo_tab[5][3] ?>">
<input type="text" name="miejsce_n_z_6" value="<?php echo $rodzina_miejsce_n_z_tab[5][4] ?>">

<input type="text" name="imie_7" value="<?php echo $rodzina_imie_tab[6][0] ?>">
<input type="text" name="nazwisko_7" value="<?php echo $rodzina_nazwisko_tab[6][1] ?>">
<input type="text" name="data_u_7" value="<?php echo $rodzina_data_u_tab[6][2] ?>">
<input type="text" name="pokrewienstwo_7" value="<?php echo $rodzina_pokrewienstwo_tab[6][3] ?>">
<input type="text" name="miejsce_n_z_7" value="<?php echo $rodzina_miejsce_n_z_tab[6][4] ?>">

<input type="text" name="imie_8" value="<?php echo $rodzina_imie_tab[7][0] ?>">
<input type="text" name="nazwisko_8" value="<?php echo $rodzina_nazwisko_tab[7][1] ?>">
<input type="text" name="data_u_8" value="<?php echo $rodzina_data_u_tab[7][2] ?>">
<input type="text" name="pokrewienstwo_8" value="<?php echo $rodzina_pokrewienstwo_tab[7][3] ?>">
<input type="text" name="miejsce_n_z_8" value="<?php echo $rodzina_miejsce_n_z_tab[7][4] ?>">

<input type="text" name="imie_9" value="<?php echo $rodzina_imie_tab[8][0] ?>">
<input type="text" name="nazwisko_9" value="<?php echo $rodzina_nazwisko_tab[8][1] ?>">
<input type="text" name="data_u_9" value="<?php echo $rodzina_data_u_tab[8][2] ?>">
<input type="text" name="pokrewienstwo_9" value="<?php echo $rodzina_pokrewienstwo_tab[8][3] ?>">
<input type="text" name="miejsce_n_z_9" value="<?php echo $rodzina_miejsce_n_z_tab[8][4] ?>">

<input type="text" name="imie_10" value="<?php echo $rodzina_imie_tab[9][0] ?>">
<input type="text" name="nazwisko_10" value="<?php echo $rodzina_nazwisko_tab[9][1] ?>">
<input type="text" name="data_u_10" value="<?php echo $rodzina_data_u_tab[9][2] ?>">
<input type="text" name="pokrewienstwo_10" value="<?php echo $rodzina_pokrewienstwo_tab[9][3] ?>">
<input type="text" name="miejsce_n_z_10" value="<?php echo $rodzina_miejsce_n_z_tab[9][4] ?>">


<input type="text" name="dochod_1" value="<?php echo $dochod_1 ?>">

<input type="text" name="dochod_2" value="<?php echo $dochod_2 ?>">

<input type="text" name="dochod_3" value="<?php echo $dochod_3 ?>">

<input type="text" name="dochod_4" value="<?php echo $dochod_4 ?>">

<input type="text" name="dochod_5" value="<?php echo $dochod_5 ?>">

<input type="text" name="dochod_6" value="<?php echo $dochod_6 ?>">

<input type="text" name="dochod_7" value="<?php echo $dochod_7 ?>">

<input type="text" name="dochod_8" value="<?php echo $dochod_8 ?>">

<input type="text" name="dochod_9" value="<?php echo $dochod_9 ?>">

<input type="text" name="zrodlo_11" value="<?php echo $dochod_10_nazwa ?>">

<input type="text" name="dochod_11" value="<?php echo $dochod_10 ?>">

<input type="text" name="dochod_sredni" value="<?php echo $dochod_na_osobe ?>">


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


<textarea name="zajecia_pozaszkolne"><?php echo $zajecia_pozaszkolne ?></textarea>
<textarea name="zaintersowania"><?php echo $zainteresowania ?></textarea>
<textarea name="plany"><?php echo $plany ?></textarea>
<textarea name="sytuacja_rodzinna"><?php echo $sytuacja_rodzinna ?></textarea>


<input type="text" name="zalacznik_1" value="<?php echo $zalacznik_tab[0] ?>">
<input type="text" name="zalacznik_2" value="<?php echo $zalacznik_tab[1] ?>">
<input type="text" name="zalacznik_3" value="<?php echo $zalacznik_tab[2] ?>">
<input type="text" name="zalacznik_4" value="<?php echo $zalacznik_tab[3] ?>">
<input type="text" name="zalacznik_5" value="<?php echo $zalacznik_tab[4] ?>">

<input type="text" name="zalacznik_6" value="<?php echo $zalacznik_tab[5] ?>">
<input type="text" name="zalacznik_7" value="<?php echo $zalacznik_tab[6] ?>">
<input type="text" name="zalacznik_8" value="<?php echo $zalacznik_tab[7] ?>">
<input type="text" name="zalacznik_9" value="<?php echo $zalacznik_tab[8] ?>">
<input type="text" name="zalacznik_10" value="<?php echo $zalacznik_tab[9] ?>">


</div>
<!-- koniec ukrycia danych--> 

<?php


if($potwierdzenie=='disabled')
{
echo "<center><input class='btn btn-success' type='submit' value='Generuj wniosek'></center>";
}
else
{
echo "<h2 align='center' style='color:red;'>Uwaga!!! Dane nie zostały potwierdzone</h2>";
}
?>

</form>

<br /><br />
<!--<input style=" background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;" type="button" onclick="window.location.href = 'dane_potwierdzenie.php';" value="Cofnij">&nbsp;&nbsp;-->




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
