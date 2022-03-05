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
		$konto1=echousername($user->data()->id);
		//echo $konto;
		
		$zapytanie=echousername($user->data()->id);
		
		
		$zapytanie1=echousername($user->data()->id);
		
		
		//data do kiedy można złżyć wniosek
		
		$jakie_konto=echousername($user->data()->id);
		include "data_wniosku.inc";
		
		
		//sprawdzanie czy dane zostały potwierdzone
		
		include "potwierdzenie.inc";
		
		
		$konto=$_POST['konto'];
		$insert_update=$_POST['insert_update'];
		$liczba_osob=$_POST['liczba_osob'];
		
		//poprawka
		//$liczba_osob_=$liczba_osob-1;
		//$liczba_osob=$liczba_osob_;
		//echo $liczba_osob;
		$dochod_1=$_POST['dochod_1'];
		$dochod_2=$_POST['dochod_2'];
		$dochod_3=$_POST['dochod_3'];
		$dochod_4=$_POST['dochod_4'];
		$dochod_5=$_POST['dochod_5'];
		$dochod_6=$_POST['dochod_6'];
		$dochod_7=$_POST['dochod_7'];
		$dochod_8=$_POST['dochod_8'];
		$dochod_9=$_POST['dochod_9'];
		$dochod_10_nazwa=$_POST['dochod_10_nazwa'];
		$dochod_10=$_POST['dochod_10'];
		
//echo $liczba_osob;
		
		
		$licznik=0;

if($dochod_1>0)
{$licznik++;}

if($dochod_2>0)
{$licznik++;}

if($dochod_3>0)
{$licznik++;}

if($dochod_4>0)
{$licznik++;}

if($dochod_5>0)
{$licznik++;}

if($dochod_6>0)
{$licznik++;}

if($dochod_7>0)
{$licznik++;}

if($dochod_8>0)
{$licznik++;}

if($dochod_9>0)
{$licznik++;}

if($dochod_10>0)
{$licznik++;}

//echo $licznik;
//echo '<br />';

$dochod_razem=$dochod_1+$dochod_2+$dochod_3+$dochod_4+$dochod_5+$dochod_6+$dochod_7+$dochod_8+$dochod_9+$dochod_10;
//echo $dochod_razem;
//echo '<br />';

//$dochod_sredni=round($dochod_razem/$licznik,2);
$dochod_sredni=$dochod_razem;
//echo $dochod_sredni;
//echo '<br />';

$dochod_na_osobe=round($dochod_sredni/$liczba_osob,2);
//echo $dochod_na_osobe;



if($insert_update=='insert' && $dochod_na_osobe!=0)
		{
		mysql_query('SET CHARACTER SET utf8'); 

 
mysql_query("SET NAMES 'utf8'");
mysql_query("INSERT INTO dane_dochody (id, konto, dochod_1, dochod_2, dochod_3, dochod_4,dochod_5, dochod_6, dochod_7, dochod_8, dochod_9, dochod_10_nazwa, dochod_10, dochod_razem, dochod_na_osobe) VALUES (NULL, '$konto', '$dochod_1', '$dochod_2', '$dochod_3', '$dochod_4', '$dochod_5', '$dochod_6', '$dochod_7', '$dochod_8', '$dochod_9', '$dochod_10_nazwa', '$dochod_10', '$dochod_razem', '$dochod_na_osobe')");

		}
		
		if($insert_update=='update')
		{
		
		mysql_query('SET CHARACTER SET utf8'); 


mysql_query("SET NAMES 'utf8'");
$sql = "UPDATE dane_dochody SET dochod_1='$dochod_1', dochod_2='$dochod_2', dochod_3='$dochod_3', dochod_4='$dochod_4', dochod_5='$dochod_5', dochod_6='$dochod_6', dochod_7='$dochod_7', dochod_8='$dochod_8', dochod_9='$dochod_9', dochod_10_nazwa='$dochod_10_nazwa', dochod_10='$dochod_10', dochod_razem='$dochod_razem', dochod_na_osobe='$dochod_na_osobe' WHERE konto = '$konto'" ;

mysql_query($sql);
echo "";
		
		}

		
		
		
		?>
		
		<h2 class="page-header" align="center">Wypełnij formularz z danymi</h2>
		
		<div id="formularz">
		
			

					
<form method="post">

<div style="display:none;">
<b>Twój login</b>
<input type="text" name="konto" value="<?php echo $konto1;?>" readonly>

<input type="text" name="insert_update" value="insert">
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


<h2>Informacje o osiągnięciach</h2>


<table>
<tr>
<td>
Nazwa osiągnięcia<span id="star">*</span><br />
<input style="width:400px;" name="osiagniecie" type="text" placeholder="Nazwa osiągnięcia" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Osiągnięcie. Możesz wprowadzić tylko litery i liczby" <?php echo $disabled ?> required><br />
</td>
<tr>

<tr>
<td>
Data osiągnięcia<span id="star">*</span><br />
<input style="width:200px;" name="data_osiagniecia" type="text" placeholder="Data osiągniecia" pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}" title="Błedne dane w polu Data osiągnięcia. Możesz wprowadzić tylko cyfry w formacie XX.XX.XXXX" <?php echo $disabled ?> required>
</td>
</tr>

<tr>
<td>
Zajęte miejsce<br />
<input style="width:400px;" name="zajete_miejsce" type="text" placeholder="Zajęte miejsce" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Miejsce osiągnięcia. Możesz wprowadzić tylko litery i liczby"<?php echo $disabled ?> ><br />
</td>
</tr>

<tr>
<td>
Inoformacje dodatkowe<br />
<input style="width:400px;" name="informacje_dodatkowe" type="text" placeholder="Inoformacje dodatkowe" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Informacje o osiągnięciu. Możesz wprowadzić tylko litery i liczby" <?php echo $disabled ?>>
</td>
</tr>
</table>


<br /><br />

<input type="submit" name="submit" value="Dodaj osiągnięcie">

</form>


<?php

echo "</div>";	//zamknięcie diva od edycji

?>

<?php

echo "</div>";		//zamknięcie diva od terminu

?>


<div id="formularz">


<br />
<h3>Twoje osiągnięcia</h3>

<?php

 

$licz=0;
$id_osiagniecia=1;

mysql_query('SET CHARACTER SET utf8'); 


mysql_query("SET NAMES 'utf8'");

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM dane_osiagniecia where konto='$zapytanie'")
or die('Błąd zapytania');


/*wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/

echo "<table  border=1 style=border-collapse: collapse>";
		
		echo "<tr>";
		echo "<td width='30px'>Id</td>";
		echo "<td width='200px'>Nazwa osiągnięcia</td>";
		echo "<td width='100px'>Data</td>";
		echo "<td width='120px'>Zajęte miejsce</td>";
		echo "<td width='120px'>Inoformacje dodatkowe</td>";
		
		echo "</tr>";
		
		echo "</table>";

if(mysql_num_rows($wynik) > 0) {
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */
    echo "<table  border=1 style=border-collapse: collapse>";
		
		
    while($r = mysql_fetch_assoc($wynik)) {
		
		$licz++;
		
		echo "</tr>";
		//echo "<td>".$r['id']."</td>";
		$id=$r['id'];
		echo "<td width='30px'>$id_osiagniecia</td>";
		echo "<td width='200px'>".$r['osiagniecie']."</td>";
		echo "<td width='100px'>".$r['data_osiagniecia']."</td>";
		echo "<td width='120px'>".$r['zajete_miejsce']."</td>";
		echo "<td width='120px'>".$r['informacje_dodatkowe']."</td>";
		
		if($disabled=='' && $potwierdzenie=='')
		{
		echo "<td><a href='dane_osiagniecia_edit.php?id=$id'>Edytuj</a></td>";
		echo "<td><a href='dane_osiagniecia_delete.php?id=$id'>Usuń</a></td>";
		}
		
		$id_osiagniecia++;
		
		
		 echo "</tr>";
    }
    echo "</table>";
}


//echo $licz;


?>


<?php


if($licz>=5)
{
echo "<br /><br /><b>Nie można dodać więcej osiagnięć</b>";
}

else
{
   if(isset($_POST['submit']))
	 {
				 $konto=$_POST['konto'];
					
         $osiagniecie=$_POST['osiagniecie'];

         $data_osiagniecia=$_POST['data_osiagniecia'];
				 
				 $zajete_miejsce=$_POST['zajete_miejsce'];
				 
				 $informacje_dodatkowe=$_POST['informacje_dodatkowe'];
				 
				 echo "64";
				 
				 
				 mysql_query("INSERT INTO dane_osiagniecia (id, konto, osiagniecie, data_osiagniecia, zajete_miejsce, informacje_dodatkowe) VALUES (NULL, '$konto', '$osiagniecie', '$data_osiagniecia', '$zajete_miejsce', '$informacje_dodatkowe')");
				 
				 header("Location: dane_osiagniecia.php");
				 
	 }
}

?>




<br /><br />
<input style=" background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;" type="button" onclick="window.location.href = 'dane_dochody.php';" value="Cofnij">&nbsp;&nbsp;

<input style=" background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;" type="button" onclick="window.location.href = 'dane_dodatkowe.php';" value="Dalej">




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
