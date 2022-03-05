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
		$konto1=echousername($user->data()->id);
		$zapytanie=echousername($user->data()->id);
		//echo $konto;
		
		
		$zapytanie1=echousername($user->data()->id);
		
		
		//data do kiedy można złżyć wniosek
		
		$jakie_konto=echousername($user->data()->id);
		include "data_wniosku.inc";
		
		
		//sprawdzanie czy dane zostały potwierdzone
		
		include "potwierdzenie.inc";
		
		
		$id=$_POST['id'];
		$insert_update=$_POST['insert_update'];
		$konto=$_POST['konto'];
		$zajecia_pozaszkolne=$_POST['zajecia_pozaszkolne'];
		$zaintersowania=$_POST['zaintersowania'];
		$plany=$_POST['plany'];
		$sytuacja_rodzinna=$_POST['sytuacja_rodzinna'];
		
		
		//echo $insert_update;
		
		
		
		if($insert_update=='insert' && $zajecia_pozaszkolne!='')
		{
		mysql_query('SET CHARACTER SET utf8'); 

 
mysql_query("SET NAMES 'utf8'");
mysql_query("INSERT INTO dane_dodatkowe (id, konto, zajecia_pozaszkolne, zaintersowania, plany, sytuacja_rodzinna) VALUES (NULL, '$konto', '$zajecia_pozaszkolne', '$zaintersowania', '$plany', '$sytuacja_rodzinna')");

		}
		
		if($insert_update=='update')
		{
		
		mysql_query('SET CHARACTER SET utf8'); 


mysql_query("SET NAMES 'utf8'");
$sql = "UPDATE dane_dodatkowe SET zajecia_pozaszkolne='$zajecia_pozaszkolne', zaintersowania='$zaintersowania', plany='$plany', sytuacja_rodzinna='$sytuacja_rodzinna' WHERE konto = '$konto'" ;

mysql_query($sql);
echo "";
		
		}
		
		
		
		?>
		
		<div id="formularz">
			
			<h2 class="page-header" align="center">Wypełnij formularz z danymi</h2>
			

					
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


<br />
<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


<h2>Załączniki</h2>

Nazwa załącznika<span id="star">*</span><br />
<input style="width:400px;" name="zalacznik" type="text" placeholder="Nazwa załącznika" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" title="Błedne dane w polu Nazwa załącznika. Możesz wprowadzić tylko litery i liczby" <?php echo $disabled ?> required><br />

<input type="submit" name="submit" value="Dodaj załacznik">





</form>


<?php

echo "</div>";	//zamknięcie diva od edycji

?>

<?php

echo "</div>";		//zamknięcie diva od terminu

?>


<div id="formularz">

<br />
<h3>Twoje załączniki</h3>

<?php

 

$licz=0;
$id_zalacznika=1;

mysql_query('SET CHARACTER SET utf8'); 


mysql_query("SET NAMES 'utf8'");

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM dane_zalaczniki where konto='$zapytanie'")
or die('Błąd zapytania');


/*wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/

echo "<table  border=1 style=border-collapse: collapse>";
		
		echo "<tr>";
		echo "<td width='30px'>Id</td>";
		echo "<td width='400px'>Nazwa zalacznika</td>";
		
		
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
		echo "<td width='30px'>$id_zalacznika</td>";
		echo "<td width='400px'>".$r['zalacznik']."</td>";
		
		if($disabled=='' && $potwierdzenie=='')
		{
		echo "<td><a href='dane_zalaczniki_edit.php?id=$id'>Edytuj</a></td>";
		echo "<td><a href='dane_zalaczniki_delete.php?id=$id'>Usuń</a></td>";
		}
		
		$id_zalacznika++;
		
		
		 echo "</tr>";
    }
    echo "</table>";
}


//echo $licz;


?>


<?php


if($licz>=5)
{
echo "<br /><br /><b>Nie można dodać więcej załączników</b>";
}

else
{
   if(isset($_POST['submit']))
	 {
				 $konto=$_POST['konto'];
					
         $zalacznik=$_POST['zalacznik'];

         
				 
				 
				 
				 
				 mysql_query("INSERT INTO dane_zalaczniki (id, konto, zalacznik) VALUES (NULL, '$konto', '$zalacznik')");
				 
				 header("Location: dane_zalaczniki.php");
				 
	 }
}

?>


<br /><br />
<input style=" background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;" type="button" onclick="window.location.href = 'dane_dodatkowe.php';" value="Cofnij">&nbsp;&nbsp;

<input style=" background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;" type="button" onclick="window.location.href = 'dane_potwierdzenie.php';" value="Dalej">


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
