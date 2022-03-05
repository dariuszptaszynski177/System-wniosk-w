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
		
		$id_osiagniecia=$_REQUEST['id'];
		
		//echo $id_czlonka_rodziny;
		
		
		// podłączamy plik  connection.php 
require "polaczenie.php"; 
// wywołujemy funkcję connection() 
connection();
		
		
		
		?>
		
		<div id="formularz">
			

					
<form method="post">

<div style="display:none;">
<b>Twój login</b>
<input type="text" name="konto" value="<?php echo $konto1;?>" readonly>

<input type="text" name="insert_update" value="insert">
</div>

<?php


mysql_query('SET CHARACTER SET utf8'); 


mysql_query("SET NAMES 'utf8'");

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM dane_osiagniecia where id='$id_osiagniecia'")
or die('Błąd zapytania');


/*wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/

echo "<table  border=1 style=border-collapse: collapse>";
		

if(mysql_num_rows($wynik) > 0) {
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */
    echo "<table  border=1 style=border-collapse: collapse>";
		
		
    while($r = mysql_fetch_assoc($wynik)) {
		
		
		
		echo "</tr>";
		//echo "<td>".$r['id']."</td>";
		$id=$r['id'];
		//echo "<td>".$r['osiagniecie']."</td>";
		$osiagniecie=$r['osiagniecie'];
		//echo "<td>".$r['data_osiagniecia']."</td>";
		$data_osiagniecia=$r['data_osiagniecia'];
		//echo "<td>".$r['zajete_miejsce']."</td>";
		$zajete_miejsce=$r['zajete_miejsce'];
		//echo "<td>".$r['informacje_dodatkowe']."</td>";
		$informacje_dodatkowe=$r['informacje_dodatkowe'];
		
		$id_czlonka++;
		
		
		 echo "</tr>";
    }
    echo "</table>";

}


?>
<br />
<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


<h2>I. Informacje	o	wnioskodawcy</h2>



<input style="width:400px;" name="osiagniecie" type="text" placeholder="Nazwa osiągnięcia" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" oninvalid="alert('Błedne dane w polu Osiągnięcie. Możesz wprowadzić tylko litery i liczby');" value="<?php echo $osiagniecie ?>"><br />

<input style="width:200px;" name="data_osiagniecia" type="text" placeholder="Data osiągniecia" pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}" oninvalid="alert('Błedne dane w polu Data osiągnięcia. Możesz wprowadzić tylko cyfry w formacie XX.XX.XXXX');" value="<?php echo $data_osiagniecia ?>">

<input style="width:400px;" name="zajete_miejsce" type="text" placeholder="Zajęte miejsce" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" oninvalid="alert('Błedne dane w polu Miejsce osiągnięcia. Możesz wprowadzić tylko litery i liczby');" value="<?php echo $zajete_miejsce ?>"><br />

<input style="width:400px;" name="informacje_dodatkowe" type="text" placeholder="Inoformacje dodatkowe" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" oninvalid="alert('Błedne dane w polu Informacje o osiągnięciu. Możesz wprowadzić tylko litery i liczby');" value="<?php echo $informacje_dodatkowe ?>">


<br /><br />

<input type="submit" name="submit" value="Aktualizauj osiągnięcie">

</form>


<?php


   if(isset($_POST['submit']))
	 {
				 $konto=$_POST['konto'];
					
         $osiagniecie=$_POST['osiagniecie'];

         $data_osiagniecia=$_POST['data_osiagniecia'];
				 
				 $zajete_miejsce=$_POST['zajete_miejsce'];
				 
				 $informacje_dodatkowe=$_POST['informacje_dodatkowe'];
				 
				 echo "64";
				 
				 
				 mysql_query("SET NAMES 'utf8'");
$sql = "UPDATE dane_osiagniecia SET osiagniecie='$osiagniecie', data_osiagniecia='$data_osiagniecia', zajete_miejsce='$zajete_miejsce', informacje_dodatkowe='$informacje_dodatkowe' WHERE id = '$id_osiagniecia'" ;

mysql_query($sql);
echo "";
				 
				 header("Location: dane_osiagniecia.php");
				 
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
