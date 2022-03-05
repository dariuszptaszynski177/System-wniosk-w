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
		$konto=echousername($user->data()->id);
		$konto1=echousername($user->data()->id);
		
		
		$zapytanie1=echousername($user->data()->id);
		
		
		//data do kiedy można złżyć wniosek
		
		$jakie_konto=echousername($user->data()->id);
		include "data_wniosku.inc";
		
		
		//sprawdzanie czy dane zostały potwierdzone
		
		include "potwierdzenie.inc";
		
		
		
		$konto=$_POST['konto'];
		$insert_update=$_POST['insert_update'];
		$klasa=$_POST['klasa'];
		$srednia_poprzednia=$_POST['srednia_poprzednia'];
		$srednia_biezaca=$_POST['srednia_biezaca'];
		$nazwa_szkoly=$_POST['nazwa_szkoly'];
		$adres_szkoly=$_POST['adres_szkoly'];
		
		
		
		
		if($insert_update=='insert' && $klasa!='')
		{
		mysql_query('SET CHARACTER SET utf8'); 

 
mysql_query("SET NAMES 'utf8'");
mysql_query("INSERT INTO dane_szkola (id, konto, nazwa_szkoly, adres_szkoly, klasa, srednia_poprzednia, srednia_biezaca) VALUES (NULL, '$konto', '$nazwa_szkoly', '$adres_szkoly', '$klasa', '$srednia_poprzednia', '$srednia_biezaca')");

		}
		
		if($insert_update=='update')
		{
		
		mysql_query('SET CHARACTER SET utf8'); 


mysql_query("SET NAMES 'utf8'");
$sql = "UPDATE dane_szkola SET klasa='$klasa', srednia_poprzednia='$srednia_poprzednia', srednia_biezaca='$srednia_biezaca', nazwa_szkoly='$nazwa_szkoly', adres_szkoly='$adres_szkoly'    WHERE konto = '$konto'" ;

mysql_query($sql);
echo "";
		
		}
		
		
		
		
		?>
		<h1 class="page-header" align="center">Wypełnij formularz z danymi</h1>
		
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


<?php

//data złożenia wniosku
if($disabled=='disabled')
echo "<div style='display:none'>";		//zamknąć tego diva jeszcze

//potwierdzenie danych
if($potwierdzenie=='disabled')
echo "<div style='display:none'>";		//zamknąć tego diva jeszcze

?>


<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


<h2>Informacje o rodzinie</h2>

<br />
<span id="star">Maksymalna ilość członków rodziny : 10</span><br />
<table>
<tr>
<td>
Imię<span id="star">*</span><br />
<input style="width:400px;" name="rodzina_imie" type="text" placeholder="Imię" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Członek rodziny Imię. Możesz wprowadzić tylko litery" <?php echo $disabled ?> required>
</td>

<td>
Nazwisko<span id="star">*</span><br />
<input style="width:400px;" name="rodzina_nazwisko" type="text" placeholder="Nazwisko" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Członek rodziny Nazwisko. Możesz wprowadzić tylko litery" <?php echo $disabled ?> required>
</td>
</tr>


<td>
Pokrewieństwo<span id="star">*</span><br />
<input style="width:400px;" name="rodzina_pokrewienstwo" type="text" placeholder="Pokrewieństwo" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Członek rodziny Pokrewieństwo. Możesz wprowadzić tylko litery" <?php echo $disabled ?> required>
</td>

<td>
Miejsce zatrudnienia lub nauki<span id="star">*</span><br />
<input style="width:400px;" name="rodzina_miejsce_n_z" type="text" placeholder="M-ce nauki, zatrudnienia" size="22" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$" title="Błedne dane w polu Członek rodziny Miejsce zatrudnienia, nauki. Możesz wprowadzić tylko litery" <?php echo $disabled ?> required>
</td>

<tr>
<td>
Data urodzenia<span id="star">*</span><br />
<input style="width:200px;" name="rodzina_data_u" type="text" placeholder="Data urodzenia [xx.xx.xxxx]" pattern="[0-9]{2}\.[0-9]{2}\.[0-9]{4}" title="Błedne dane w polu Członek rodziny Data urodzenia. Możesz wprowadzić tylko cyfry w formacie XX.XX.XXXX" <?php echo $disabled ?> required>
</td>

</tr>
</table>

<br /><br />

<input type="submit" name="submit" value="Dodaj członka rodziny">


</form>

<br /><br />

<?php

echo "</div>";	//zamknięcie diva od edycji

?>

<?php

echo "</div>";		//zamknięcie diva od terminu

?>


<div id="formularz">

<?php

 

$licz=0;
$id_czlonka=1;

mysql_query('SET CHARACTER SET utf8'); 


mysql_query("SET NAMES 'utf8'");

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM dane_rodzina where konto='$zapytanie'")
or die('Błąd zapytania');


/*wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/

echo "<table  border=1 style=border-collapse: collapse>";
		
		echo "<tr>";
		echo "<td width='30px'>Id</td>";
		echo "<td width='80px'>Imię</td>";
		echo "<td width='100px'>Nazwisko</td>";
		echo "<td width='120px'>Data urodzenia</td>";
		echo "<td width='120px'>Pokrewieństwo</td>";
		echo "<td width='200px'>Miejsce zatrudnienia, nauki</td>";
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
		echo "<td width='30px'>$id_czlonka</td>";
		echo "<td width='80px'>".$r['rodzina_imie']."</td>";
		echo "<td width='100px'>".$r['rodzina_nazwisko']."</td>";
		echo "<td width='120px'>".$r['rodzina_data_u']."</td>";
		echo "<td width='120px'>".$r['rodzina_pokrewienstwo']."</td>";
		echo "<td width='200px'>".$r['rodzina_miejsce_n_z']."</td>";
		
		if($disabled=='' && $potwierdzenie=='')
		{
		echo "<td><a href='dane_rodzina_edit.php?id=$id'>Edytuj</a></td>";
		echo "<td><a href='dane_rodzina_delete.php?id=$id'>Usuń</a></td>";
		}
		
		$id_czlonka++;
		
		
		 echo "</tr>";
    }
    echo "</table>";
}


//echo $licz;


?>




<?php


if($licz>=10)
{
echo "<br /><br /><b>Nie można dodać więcej członków rodziny</b>";
}

else
{
   if(isset($_POST['submit']))
	 {
				 $konto=$_POST['konto'];
					
         $rodzina_imie=$_POST['rodzina_imie'];

         $rodzina_nazwisko=$_POST['rodzina_nazwisko'];
				 
				 $rodzina_data_u=$_POST['rodzina_data_u'];
				 
				 $rodzina_pokrewienstwo=$_POST['rodzina_pokrewienstwo'];
				 
				 $rodzina_miejsce_n_z=$_POST['rodzina_miejsce_n_z'];
				 
				 
				 mysql_query("INSERT INTO dane_rodzina (id, konto, rodzina_imie, rodzina_nazwisko, rodzina_data_u, rodzina_pokrewienstwo, rodzina_miejsce_n_z) VALUES (NULL, '$konto', '$rodzina_imie', '$rodzina_nazwisko', '$rodzina_data_u', '$rodzina_pokrewienstwo', '$rodzina_miejsce_n_z')");
				 
				 header("Location: dane_rodzina.php");
				 
	 }
}



?>

<br /><br />

<input style=" background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;" type="button" onclick="window.location.href = 'dane_szkola.php';" value="Cofnij">&nbsp;&nbsp;
<input style=" background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;" type="button" onclick="window.location.href = 'dane_dochody.php';" value="Dalej">&nbsp;&nbsp;



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
