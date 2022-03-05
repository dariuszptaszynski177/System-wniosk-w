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
		$konto=echousername($user->data()->id);
		//echo $konto;
		$zapytanie1=echousername($user->data()->id);
		
		
		//data do kiedy można złżyć wniosek
		
		$jakie_konto=echousername($user->data()->id);
		include "data_wniosku.inc";
		
		
		//sprawdzanie czy dane zostały potwierdzone
		
		include "potwierdzenie.inc";
		
		
		?>
		
		
		
		<?php
		

$zapytanie=$konto;

mysql_query("SET CHARSET utf8");
mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM dane_podstawowe")
or die('Błąd zapytania');


/*wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/
if(mysql_num_rows($wynik) > 0) {
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */
    echo "<table  border=1 style=border-collapse: collapse>";
    while($r = mysql_fetch_assoc($wynik)) {
		
		/*
		echo "</tr>";
		echo "<td title=imie>".$r['id']."</td>";
		echo "<td title=imie>".$r['konto']."</td>";
		echo "<td title=imie>".$r['imie']."</td>";
		echo "<td title=imie>".$r['nazwisko']."</td>";
		echo "<td title=imie>".$r['data_u']."</td>";
		echo "<td title=imie>".$r['miejsce_u']."</td>";
		echo "<td title=imie>".$r['pesel']."</td>";
		echo "<td title=imie>".$r['powiat']."</td>";
		echo "<td title=imie>".$r['gmina']."</td>";
		echo "<td title=imie>".$r['ulica']."</td>";
		echo "<td title=imie>".$r['nr_domu']."</td>";
		echo "<td title=imie>".$r['nr_lokalu']."</td>";
		echo "<td title=imie>".$r['miejscowosc']."</td>";
		echo "<td title=imie>".$r['kod']."</td>";
		echo "<td title=imie>".$r['poczta']."</td>";
		echo "<td title=imie>".$r['nr_opiekuna']."</td>";
		echo "<td title=imie>".$r['nr_komorkowy']."</td>";
		echo "<td title=imie>".$r['email']."</td>";
		echo "<td title=imie>".$r['nazwa_szkoly']."</td>";
		echo "<td title=imie>".$r['adres_szkoly']."</td>";
		echo "<td title=imie>".$r['klasa']."</td>";
		echo "<td title=imie>".$r['srednia_poprzednia']."</td>";
		echo "<td title=imie>".$r['srednia_biezaca']."</td>";
		*/
		
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
		
		
		
		 echo "</tr>";
    }
    echo "</table>";
}
		?>
		
		<h2 align="center">Uaktualnij swoje dane</h2>
		
		<div id="formularz">
			

					
<form action="dane_szkola.php" method="post">

<div style="display:none;">
<b>Twój login</b>
<input type="text" name="konto" value="<?php echo $konto;?>" readonly>

<input type="text" name="insert_update" value="update">
</div>

<?php
$nazwa;
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


<h2>Informacje o wnioskodawcy</h2>



<table>
<tr>

<td>
Imię<span id="star">*</span><br />    
<input type="text" name="imie" placeholder="Imię" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $imie ?>"  title="Błedne dane w polu Imię. Możesz wprowadzić tylko litery" required> 
<br /><br />
</td>

<td>
Nazwisko<span id="star">*</span><br />
<input type="text" name="nazwisko" placeholder="Nazwisko" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $nazwisko ?>" title="Błedne dane w polu Nazwisko. Możesz wprowadzić tylko litery" required>
<br /><br />
</td>

</tr>


<tr>

<td width="250px">
Data urodzenia(dd.mm.rrrr)<span id="star">*</span><br />
<input type="text" name="data_u" placeholder="Data urodzenia" pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}" value="<?php echo $data_u ?>" title="Błedne dane w polu Data urodzenia. Możesz wprowadzić tylko cyfry w formacie XX.XX.XXXX" required>
<br /><br />
</td>

<td width="250px">
Miejsce urodzenia<span id="star">*</span><br />
<input type="text" name="miejsce_u" placeholder="Miejsce urodzenia" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $miejsce_u ?>" title="Błedne dane w polu Miejsce urodzenia. Możesz wprowadzić tylko litery" required>
<br /><br />
</td>

<td width="250px">
PESEL<span id="star">*</span><br />
<input type="text" name="pesel" maxlength="11" placeholder="PESEL" pattern="[0-9]{11}" value="<?php echo $pesel ?>" title="Błedne dane w polu PESEL. Możesz wprowadzić tylko cyfry (11 cyfr)" required>
<br /><br />
</td>

</tr>


<tr>
<td>
Powiat<span id="star">*</span><br />
<input type="text" name="powiat" placeholder="Powiat" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $powiat ?>" title="Błedne dane w polu Powiat. Możesz wprowadzić tylko litery" required>
<br /><br />
</td>

<td>
Gmina<span id="star">*</span><br />
<input type="text" name="gmina" placeholder="Gmina" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $gmina ?>"  title="Błedne dane w polu Gmina. Możesz wprowadzić tylko litery" required>
<br /><br />
</td>

<td>
Ulica (jeśli brak, zostaw puste)<br />
<input type="text" name="ulica" placeholder="Ulica" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" value="<?php echo $ulica ?>" title="Błedne dane w polu Ulica. Możesz wprowadzić tylko litery i cyfry" >
<br /><br />
</td>

</tr>


<tr>

<td>
Nr domu<span id="star">*</span><br />
<input type="text" name="nr_domu" placeholder="Numer domu" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" value="<?php echo $nr_domu ?>" title="Błedne dane w polu Numer domu. Możesz wprowadzić tylko litery i cyfry"  required>
<br /><br />
</td>

<td>
Nr lokalu (jeśli brak, zostaw puste)<br />
<input type="text" name="nr_lokalu" placeholder="Numer lokalu" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" value="<?php echo $nr_lokalu ?>" title="Błedne dane w polu Numer lokalu. Możesz wprowadzić tylko litery i cyfry" >
<br /><br />
</td>

</tr>


<tr>

<td>
Miejscowość<span id="star">*</span><br />
<input type="text" name="miejscowosc" placeholder="Miejscowość" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $miejscowosc ?>" title="Błedne dane w polu Miejscowość. Możesz wprowadzić tylko litery" required>
<br /><br />
</td>

<td>
Kod pocztowy<span id="star">*</span><br />
<input type="text" name="kod" placeholder="Kod pocztowy [XX-XXX]" pattern="^\d{2}-\d{3}$" value="<?php echo $kod ?>" title="Błedne dane w polu Nazwisko. Możesz wprowadzić tylko cyfry w formacie XX-XXX" required>
<br /><br />
</td>

<td>
Poczta<span id="star">*</span><br />
<input type="text" name="poczta" placeholder="Poczta" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" value="<?php echo $poczta ?>" title="Błedne dane w polu Poczta. Możesz wprowadzić tylko litery" required>
<br /><br />
</td>

</tr>


<tr>
<td>
Numer	tel. opiekuna<span id="star">*</span><br />
<input type="text" name="nr_opiekuna" maxlength="9" placeholder="Numer opiekuna" pattern="[0-9]{9}" value="<?php echo $nr_opiekuna ?>" title="Błedne dane w polu Numer opiekuna. Możesz wprowadzić tylko cyfry (9 cyfr)" required>
<br /><br />
</td>

<td>
Numer	tel. komórkowego<span id="star">*</span><br />
<input type="text" name="nr_komorkowy" maxlength="9" placeholder="Numer komórkowy" pattern="[0-9]{9}" value="<?php echo $nr_komorkowy ?>" title="Błedne dane w polu Numer komórkowy. Możesz wprowadzić tylko cyfry (9 cyfr)" required>
<br /><br />
</td>

<td>
Adres	e-mail<span id="star">*</span><br />
<input type="text" name="email" placeholder="E-mail" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" value="<?php echo $email ?>" title="Błedne dane w polu E-mail" required>
<br /><br />
</td>

</tr>

</table>


<br /><br />




<input type="submit" value="Dalej">

</form>


<?php

echo "</div>";	//zamknięcie diva od edycji

?>

<?php

echo "</div>";		//zamknięcie diva od terminu

?>

</div>


<div id="formularz">
<?php
if($potwierdzenie=='disabled' || $disabled=='disabled')
{
echo "Imię : $imie <br />";
echo "Nazwisko : $nazwisko <br />";
echo "Data urodzenia : $data_u <br />";
echo "Miejsce urodzenia : $miejsce_u <br />";
echo "PESEL : $pesel <br />";
echo "Powiat : $powiat <br />";
echo "Gmina : $gmina <br />";
echo "Ulica : $ulica <br />";
echo "Nr domu : $nr_domu <br />";
echo "Nr lokalu : $nr_lokalu <br />";
echo "Miejscowość : $miejscowosc <br />";
echo "Kod pocztowy : $kod <br />";
echo "Poczta : $poczta <br />";
echo "Nr opiekuna : $nr_opiekuna <br />";
echo "Nr komórkowy : $nr_komorkowy <br />";
echo "E-mail : $email";

echo "<br /><br />";
echo "<a style=' background-color: #4CAF50; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='index2.php'>Cofnij</a>";

echo "&nbsp;&nbsp;";

echo "<a style=' background-color: #4CAF50; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_szkola.php'>Dalej</a>";
}
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