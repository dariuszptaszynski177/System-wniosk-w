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
				<h1 class="page-header">
					
					
				</h1>
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
		$konto=echousername($user->data()->id);
		//echo $konto;
		
		$zapytanie=echousername($user->data()->id);
		
		
		
		$zapytanie1=echousername($user->data()->id);
		
		
		//data do kiedy można złżyć wniosek
		
		$jakie_konto=echousername($user->data()->id);
		include "data_wniosku.inc";
		
		
		//sprawdzanie czy dane zostały potwierdzone
		
		include "potwierdzenie.inc";
		
		
		
		$liczba_osob=1;
		//$liczba_osob jest od 1, ponieważ pierwszym członkiem rodziny jest wnioskodawca
$id_czlonka=1;

mysql_query('SET CHARACTER SET utf8'); 
mysql_query("SET NAMES 'utf8'");

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM dane_rodzina where konto='$zapytanie1'")
or die('Błąd zapytania');


/*wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/

if(mysql_num_rows($wynik) > 0) {
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */
    //echo "<table  border=1 style=border-collapse: collapse>";
		
		
    while($r = mysql_fetch_assoc($wynik)) {
		
		$liczba_osob++;
		
		//echo "</tr>";
		//echo "<td>".$r['id']."</td>";
		$id=$r['id'];
		//echo "<td width='30px'>$id_czlonka</td>";
		
		 //echo "</tr>";
    }
    //echo "</table>";
}
		//echo $licz;
		
		
		
		
		
		
		//do update dane
		
		mysql_query('SET CHARACTER SET utf8'); 
mysql_query("SET NAMES 'utf8'");

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM dane_dochody where konto='$zapytanie1'")
or die('Błąd zapytania');



/*wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/

if(mysql_num_rows($wynik) > 0) {
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */
    //echo "<table  border=1 style=border-collapse: collapse>";
		
		
    while($r = mysql_fetch_assoc($wynik)) {
		
		
		
		//echo "</tr>";
		//echo "<td>".$r['id']."</td>";
		$id=$r['id'];
		//echo "<td>".$r['dochod_1']."</td>";
		$dochod_1=$r['dochod_1'];
		
		//echo "<td>".$r['dochod_2']."</td>";
		$dochod_2=$r['dochod_2'];
		//echo "<td>".$r['dochod_3']."</td>";
		$dochod_3=$r['dochod_3'];
		//echo "<td>".$r['dochod_4']."</td>";
		$dochod_4=$r['dochod_4'];
		//echo "<td>".$r['dochod_5']."</td>";
		$dochod_5=$r['dochod_5'];
		//echo "<td>".$r['dochod_6']."</td>";
		$dochod_6=$r['dochod_6'];
		//echo "<td>".$r['dochod_7']."</td>";
		$dochod_7=$r['dochod_7'];
		//echo "<td>".$r['dochod_8']."</td>";
		$dochod_8=$r['dochod_8'];
		//echo "<td>".$r['dochod_1']."</td>";
		$dochod_9=$r['dochod_9'];
		//echo "<td>".$r['dochod_1']."</td>";
		$dochod_10_nazwa=$r['dochod_10_nazwa'];
		//echo "<td>".$r['dochod_1']."</td>";
		$dochod_10=$r['dochod_10'];
		
		 //echo "</tr>";
    }
    //echo "</table>";
}
		
		echo $dochod_1;
		?>
		<h2 class="page-header" align="center">Uaktualnij swoje dane</h2>
		
		<div id="formularz">
			

					
<form action="dane_osiagniecia.php" method="post">

<div style="display:none;">
<b>Twój login</b>
<input type="text" name="konto" value="<?php echo $konto;?>" readonly>

<input type="text" name="liczba_osob" value="<?php echo $liczba_osob;?>" readonly>

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


<h2>Informacje o dochodach</h2>

<br />

<table id="tabela">

<tr id="linia">

<td id="linia">Lp.</td>
<td id="linia">Źródło dochodu</td>
<td id="linia">Dochód brutto (np.1695.95)</td>

</tr>

<tr id="linia">

<td id="linia">1.</td>
<td id="linia" name="zrodlo_1">Wynagrodzenia	za	pracę</td>
<td id="linia"><input name="dochod_1" type="text"size="50" placeholder="Wynagrodzenia za pracę" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" value="<?php echo $dochod_1 ?>" <?php echo $disabled ?>></td>

</tr>

<tr id="linia">

<td id="linia">2.</td>
<td id="linia" name="zrodlo_1">Emerytury, renty inwalidzkie i rodzinne</td>
<td id="linia"><input name="dochod_2" type="text" placeholder="Emerytury, renty inwalidzkie i rodzinne" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" value="<?php echo $dochod_2 ?>" <?php echo $disabled ?>></td>

</tr>

<tr id="linia">

<td id="linia">3.</td>
<td id="linia" name="zrodlo_1">Stałe zasiłki z pomocy społecznej</td>
<td id="linia"><input name="dochod_3" type="text" placeholder="Stałe zasiłki z pomocy społecznej" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" value="<?php echo $dochod_3 ?>" <?php echo $disabled ?>></td>

</tr>

<tr id="linia">

<td id="linia">4.</td>
<td id="linia" name="zrodlo_1">Dodatek mieszkaniowy</td>
<td id="linia"><input name="dochod_4" type="text" placeholder="Dodatek mieszkaniowy" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" value="<?php echo $dochod_4 ?>" <?php echo $disabled ?>></td>

</tr>

<tr id="linia">

<td id="linia">5.</td>
<td id="linia" name="zrodlo_1">Alimenty	i	świadczenia	z	funduszu	alimentacyjnego</td>
<td id="linia"><input name="dochod_5" type="text" placeholder="Alimenty i świadczenia z funduszu alimentacyjnego" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" value="<?php echo $dochod_5 ?>" <?php echo $disabled ?>></td>

</tr>

<tr id="linia">

<td id="linia">6.</td>
<td id="linia" name="zrodlo_1">Zasiłek dla	bezrobotnych</td>
<td id="linia"><input name="dochod_6" type="text" placeholder="Zasiłek dla bezrobotnych" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" value="<?php echo $dochod_6 ?>" <?php echo $disabled ?>></td>

</tr>

<tr id="linia">

<td id="linia">7.</td>
<td id="linia" name="zrodlo_1">Zasiłek rodzinny	i	pielęgnacyjny</td>
<td id="linia"><input name="dochod_7" type="text" placeholder="Zasiłek rodzinny i pielęgnacyjny" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" value="<?php echo $dochod_7 ?>" <?php echo $disabled ?>></td>

</tr>

<tr id="linia">

<td id="linia">8.</td>
<td id="linia" name="zrodlo_1">Dochody z gospodarstwa rolnego</td>
<td id="linia"><input name="dochod_8" type="text" placeholder="Dochody z gospodarstwa rolnego" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" value="<?php echo $dochod_8 ?>" <?php echo $disabled ?>></td>

</tr>

<tr id="linia">

<td id="linia">9.</td>
<td id="linia" name="zrodlo_1">Dochody z prowadzenia działalności gospodarczej</td>
<td id="linia"><input name="dochod_9" type="text" placeholder="Dochody z prowadzenia działalności gospodarczej" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" value="<?php echo $dochod_9 ?>" <?php echo $disabled ?>></td>

</tr>

<tr id="linia">

<td id="linia"></td>
<td id="linia" name="zrodlo_1">inne	dochody (wpisz poniżej)</td>
<td id="linia"></td>

</tr>

<tr id="linia">

<td id="linia">10.</td>
<td id="linia"><input name="dochod_10_nazwa"type="text" placeholder="Inne dochody" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Inne dochody. Możesz wprowadzić tylko litery" value="<?php echo $dochod_10_nazwa ?>" <?php echo $disabled ?>></td>

<td id="linia"><input name="dochod_10" type="text" placeholder="Inne dochody" pattern="\d+(\.\d{2})?" title="Wpisując kwotę, która ma grosze, musisz użyć kropki np. 1234.56" value="<?php echo $dochod_10 ?>" <?php echo $disabled ?>></td>

</tr>


</table>	




<br /><br />
<input style=" background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;" type="button" onclick="window.location.href = 'dane_rodzina.php';" value="Cofnij">&nbsp;&nbsp;
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
echo "Wynagrodzenia	za	pracę : $dochod_1 <br />";
echo "Emerytury, renty inwalidzkie i rodzinne : $dochod_2 <br />";
echo "Stałe zasiłki z pomocy społecznej : $dochod_3 <br />";
echo "Dodatek mieszkaniowy : $dochod_4 <br />";
echo "Alimenty	i	świadczenia	z	funduszu	alimentacyjnego : $dochod_5 <br />";
echo "Zasiłek dla	bezrobotnych : $dochod_6 <br />";
echo "Zasiłek rodzinny	i	pielęgnacyjny : $dochod_7 <br />";
echo "Dochody z gospodarstwa rolnego : $dochod_8 <br />";
echo "Dochody z prowadzenia działalności gospodarczej : $dochod_9 <br />";
echo "Inne dochody - $dochod_10_nazwa : $dochod_10 <br />";



echo "<br /><br />";
echo "<a style=' background-color: #4CAF50; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_rodzina.php'>Cofnij</a>";

echo "&nbsp;&nbsp;";

echo "<a style=' background-color: #4CAF50; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_osiagniecia.php'>Dalej</a>";
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
