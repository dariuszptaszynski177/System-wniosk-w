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
		$zapytanie=echousername($user->data()->id);
		//echo $konto;
		$konto1=echousername($user->data()->id);
		
		$id_czlonka_rodziny=$_REQUEST['id'];
		
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


</div>

<?php

mysql_query('SET CHARACTER SET utf8'); 


mysql_query("SET NAMES 'utf8'");

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM dane_rodzina where id='$id_czlonka_rodziny'")
or die('Błąd zapytania');


/*wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/

echo "<table  border=1 style=border-collapse: collapse>";
		

if(mysql_num_rows($wynik) > 0) {
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */
    echo "<table  border=1 style=border-collapse: collapse>";
		
		
    while($r = mysql_fetch_assoc($wynik)) {
		
		$licz++;
		
		echo "</tr>";
		//echo "<td>".$r['id']."</td>";
		$id=$r['id'];
		//echo "<td>".$r['rodzina_imie']."</td>";
		$rodzina_imie=$r['rodzina_imie'];
		//echo "<td>".$r['rodzina_nazwisko']."</td>";
		$rodzina_nazwisko=$r['rodzina_nazwisko'];
		//echo "<td>".$r['rodzina_data_u']."</td>";
		$rodzina_data_u=$r['rodzina_data_u'];
		//echo "<td>".$r['rodzina_pokrewienstwo']."</td>";
		$rodzina_pokrewienstwo=$r['rodzina_pokrewienstwo'];
		//echo "<td>".$r['rodzina_miejsce_n_z']."</td>";
		$rodzina_miejsce_n_z=$r['rodzina_miejsce_n_z'];
		//echo "<td title=imie><a href='edit.php?id=$id'>Edytuj</a></td>";
		//echo "<td title=imie>Usuń</td>";
		
		$id_czlonka++;
		
		
		 echo "</tr>";
    }
    echo "</table>";

}
?>



<br />



<input style="width:400px;" name="rodzina_imie" type="text" placeholder="Imię" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" oninvalid="alert('Błedne dane w polu Członek rodziny Imię. Możesz wprowadzić tylko litery');" value="<?php echo $rodzina_imie ?>">

<input style="width:400px;" name="rodzina_nazwisko" type="text" placeholder="Nazwisko" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" oninvalid="alert('Błedne dane w polu Członek rodziny Nazwisko. Możesz wprowadzić tylko litery');" value="<?php echo $rodzina_nazwisko ?>"><br />

<input style="width:200px;" name="rodzina_data_u" type="text" placeholder="Data urodzenia [xx.xx.xxxx]" pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}" oninvalid="alert('Błedne dane w polu Członek rodziny Data urodzenia. Możesz wprowadzić tylko cyfry w formacie XX.XX.XXXX');" value="<?php echo $rodzina_data_u ?>">

<input style="width:200px;" name="rodzina_pokrewienstwo" type="text" placeholder="Pokrewieństwo" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" oninvalid="alert('Błedne dane w polu Członek rodziny Pokrewieństwo. Możesz wprowadzić tylko litery');" value="<?php echo $rodzina_pokrewienstwo ?>">

<input style="width:400px;" name="rodzina_miejsce_n_z" type="text" placeholder="M-ce nauki, zatrudnienia" size="22" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" oninvalid="alert('Błedne dane w polu Członek rodziny Miejsce zatrudnienia, nauki. Możesz wprowadzić tylko litery');" value="<?php echo $rodzina_miejsce_n_z?>">


<br /><br />

<input type="submit" name="submit" value="Aktualizuj dane">


</form>

<br /><br />







<?php


   if(isset($_POST['submit']))
	 {
				 $konto=$_POST['konto'];
					
         $rodzina_imie=$_POST['rodzina_imie'];

         $rodzina_nazwisko=$_POST['rodzina_nazwisko'];
				 
				 $rodzina_data_u=$_POST['rodzina_data_u'];
				 
				 $rodzina_pokrewienstwo=$_POST['rodzina_pokrewienstwo'];
				 
				 $rodzina_miejsce_n_z=$_POST['rodzina_miejsce_n_z'];
				 
				 
				 mysql_query("SET NAMES 'utf8'");
$sql = "UPDATE dane_rodzina SET rodzina_imie='$rodzina_imie', rodzina_nazwisko='$rodzina_nazwisko', rodzina_data_u='$rodzina_data_u', rodzina_pokrewienstwo='$rodzina_pokrewienstwo', rodzina_miejsce_n_z='$rodzina_miejsce_n_z' WHERE id = '$id_czlonka_rodziny'" ;

mysql_query($sql);
echo "";

header("Location: dane_rodzina.php"); 

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
