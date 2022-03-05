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
		//$konto=echousername($user->data()->id);
		//echo $konto;
		$zapytanie=echousername($user->data()->id);
		
		$zapytanie1=echousername($user->data()->id);
		
		
		//data do kiedy można złżyć wniosek
		
		$jakie_konto=echousername($user->data()->id);
		include "data_wniosku.inc";
		
		
		//sprawdzanie czy dane zostały potwierdzone
		
		include "potwierdzenie.inc";
		
		?>
		
		
		
		<?php
		
		
		$id=$_POST['id'];
		$insert_update=$_POST['insert_update'];
		$konto=$_POST['konto'];
		$imie=$_POST['imie'];
		$nazwisko=$_POST['nazwisko'];
		$data_u=$_POST['data_u'];
		$miejsce_u=$_POST['miejsce_u'];
		$pesel=$_POST['pesel'];
		$powiat=$_POST['powiat'];
		$gmina=$_POST['gmina'];
		$ulica=$_POST['ulica'];
		$nr_domu=$_POST['nr_domu'];
		$nr_lokalu=$_POST['nr_lokalu'];
		$miejscowosc=$_POST['miejscowosc'];
		$kod=$_POST['kod'];
		$poczta=$_POST['poczta'];
		$nr_opiekuna=$_POST['nr_opiekuna'];
		$nr_komorkowy=$_POST['nr_komorkowy'];
		$email=$_POST['email'];
		
		
		//echo $insert_update;
		//echo $imie;
		
		
		if($insert_update=='insert')
		{
		mysql_query('SET CHARACTER SET utf8'); 

 
mysql_query("SET NAMES 'utf8'");
mysql_query("INSERT INTO dane_podstawowe (id, konto, imie, nazwisko, data_u, miejsce_u, pesel, powiat, gmina, ulica, nr_domu, nr_lokalu, miejscowosc, kod, poczta, nr_opiekuna, nr_komorkowy, email) VALUES (NULL, '$konto', '$imie', '$nazwisko', '$data_u', '$miejsce_u', '$pesel', '$powiat', '$gmina', '$ulica', '$nr_domu', '$nr_lokalu', '$miejscowosc', '$kod', '$poczta', '$nr_opiekuna', '$nr_komorkowy', '$email')");

		}
		
		if($insert_update=='update')
		{
		
		mysql_query('SET CHARACTER SET utf8'); 


mysql_query("SET NAMES 'utf8'");
$sql = "UPDATE dane_podstawowe SET imie='$imie', nazwisko='$nazwisko', data_u='$data_u', miejsce_u='$miejsce_u', pesel='$pesel', powiat='$powiat', gmina='$gmina', ulica='$ulica', nr_domu='$nr_domu', nr_lokalu='$nr_lokalu', miejscowosc='$miejscowosc', kod='$kod', poczta='$poczta', nr_opiekuna='$nr_opiekuna', nr_komorkowy='$nr_komorkowy', email='$email' WHERE konto = '$konto'" ;

mysql_query($sql);
echo "";
		
		}
		
		
		

//$zapytanie=$konto;

mysql_query("SET CHARSET utf8");
mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM dane_szkola WHERE konto = '".$zapytanie."'  ")
or die('Błąd zapytania');


/*wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/
if(mysql_num_rows($wynik) > 0) {
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */
    echo "<table  border=1 style=border-collapse: collapse>";
    while($r = mysql_fetch_assoc($wynik)) {
		
		
		
		$id=$r['id'];
		
		
		$nazwa_szkoly=$r['nazwa_szkoly'];
		$adres_szkoly=$r['adres_szkoly'];
		$klasa=$r['klasa'];
		$srednia_poprzednia=$r['srednia_poprzednia'];
		$srednia_biezaca=$r['srednia_biezaca'];
		
		
		 echo "</tr>";
    }
    echo "</table>";
}

$konto=$zapytanie;

		?>
		
		<h2 align="center">Uaktualnij swoje dane</h2>
		
		<div id="formularz">

<?php

if($potwierdzenie=='disabled' || $disabled=='disabled')
{
echo "Nazwa szkoły : $nazwa_szkoly <br />";
echo "Adres szkoły : $adres_szkoly <br />";
echo "Klasa : $klasa <br /> ";
echo "Średnia za poprzedni rok : $srednia_poprzednia <br />";
echo "Średnia za I semestr tego roku : $srednia_biezaca <br />";

echo "<br /><br />";
echo "<a style=' background-color: #4CAF50; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_podstawowe.php'>Cofnij</a>";

echo "&nbsp;&nbsp;";

echo "<a style=' background-color: #4CAF50; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_rodzina.php'>Dalej</a>";
}
?>
</div>
		
		<div id="formularz">
			

					
<form action="dane_rodzina.php" method="post">

<div style="display:none;">
<b>Twój login</b>
<input type="text" name="konto" value="<?php echo $konto;?>" readonly>

<input type="text" name="insert_update" value="update">
</div>

<?php
//echo $klasa;
?>
<br />

<?php

//data złożenia wniosku
if($disabled=='disabled')
echo "<div style='display:none'>";		//zamknąć tego diva jeszcze

//potwierdzenie danych
if($potwierdzenie=='disabled')
echo "<div style='display:none'>";		//zamknąć tego diva jeszcze

?>

<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


<h2>Informacje o szkole wnioskodawcy</h2>

<table>



Nazwa szkoły/uczelni do której uczęszczasz<span id="star">*</span><br />
<input type="text" size="100" name="nazwa_szkoly" placeholder="Nazwa szkoły/uczelni" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9.,\s]+$" value="<?php echo $nazwa_szkoly ?>" title="Błedne dane w polu Nazwa szkoły. Możesz wprowadzić litery, cyfry, kropkę (.), przecinek (,)"  required>
<br /><br />

Adres szkoły/uczelni do której uczęszczasz<span id="star">*</span><br />
<input type="text" size="100" name="adres_szkoly" placeholder="Adres szkoły/uczelni" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9.,-\s]+$" value="<?php echo $adres_szkoly ?>" title="Błedne dane w polu Adres szkoły. Możesz wprowadzić litery, cyfry, kropkę (.), przecinek (,))"  required>
<br /><br />


Klasa, do której uczęszczasz w bieżącym roku szkolnym<span id="star">*</span><br />
<input type="text" name="klasa" placeholder="Klasa" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" value="<?php echo $klasa ?>" title="Błedne dane w polu Klasa. Możesz wprowadzić tylko litery i cyfry"  required>
<br /><br />


Średnia	ocen	uzyskana	w	poprzednim	roku	szkolnym<span id="star">*</span>	<br />
<input type="text" name="srednia_poprzednia" placeholder="Średnia z poprzedniego roku np. 4.60" pattern="[0-9]\.[0-9]{2}" value="<?php echo $srednia_poprzednia ?>" title="Błedne dane w polu Średnia poprzednia. Możesz wprowadzić tylko cyfry w formacie X.XX"  required>
<br /><br />


Średnia	ocen	uzyskana	w	I	semestrze	bieżącego	roku	szkolnego<span id="star">*</span><br />
<input type="text" name="srednia_biezaca" placeholder="Średnia w I semestrze np. 4.60" pattern="[0-9]\.[0-9]{2}" value="<?php echo $srednia_biezaca ?>" title="Błedne dane w polu Średnia bieążaca. Możesz wprowadzić tylko cyfry w formacie X.XX"  required>
<br /><br />	






<br /><br />

<input style=" background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;" type="button" onclick="window.location.href = 'dane_podstawowe.php';" value="Cofnij">&nbsp;&nbsp;
<input type="submit" value="Dalej">



</form>

<?php

echo "</div>";	//zamknięcie diva od edycji

?>

<?php

echo "</div>";		//zamknięcie diva od terminu

?>

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
