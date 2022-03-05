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
		</form>
		<?php }
		?>
	
	
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
		
			
			<!-- podział strony na 2 części w propocjach 2:10 -->
			<div class="row" style="display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px; margin-left:10px;margin-right:10px">
		
				<!-- div lewy -->
				<div class="bg-success col-2" style="-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%; max-width:16.666667%">
					<?php include "menu_boczne.inc"?>
				</div>
	
	
				<!-- div prawy -->
				<div class="bg-success col-10" style="-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%">	
                
                <!-- wyświetlenie danych, gdy dane zostaną potwierdzone -->
		
		

										<?php

												if($potwierdzenie=='disabled' || $disabled=='disabled')
												{
												echo "Nazwa szkoły : $nazwa_szkoly <br />";
												echo "Adres szkoły : $adres_szkoly <br />";
												echo "Klasa : $klasa <br /> ";
												echo "Średnia za poprzedni rok : $srednia_poprzednia <br />";
												echo "Średnia za I semestr tego roku : $srednia_biezaca <br />";

												echo "<br /><br />";
												echo "<a style=' background-color: #337ab7; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_podstawowe.php'>Cofnij</a>";

												echo "&nbsp;&nbsp;";

												echo "<a style=' background-color: #337ab7; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_rodzina.php'>Dalej</a>";
												}
										?>

			

					
										<form method="post">

										<div style="display:none;">
										<b>Twój login</b>
										<input type="text" name="konto" value="<?php echo $konto;?>" readonly>

										<input type="text" name="insert_update" value="update">
										</div>


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
										<input class="form-control" type="text" size="100" name="nazwa_szkoly" placeholder="Nazwa szkoły/uczelni" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9.,\s]+$" value="<?php echo $nazwa_szkoly ?>" title="Błedne dane w polu Nazwa szkoły. Możesz wprowadzić litery, cyfry, kropkę (.), przecinek (,)"  required>
										<br /><br />

										Adres szkoły/uczelni do której uczęszczasz<span id="star">*</span><br />
										<input class="form-control" type="text" size="100" name="adres_szkoly" placeholder="Adres szkoły/uczelni" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9.,-\s]+$" value="<?php echo $adres_szkoly ?>" title="Błedne dane w polu Adres szkoły. Możesz wprowadzić litery, cyfry, kropkę (.), przecinek (,))"  required>
										<br /><br />


										Klasa, do której uczęszczasz w bieżącym roku szkolnym<span id="star">*</span><br />
										<input class="form-control" type="text" name="klasa" placeholder="Klasa" pattern="^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9\s]+$" value="<?php echo $klasa ?>" title="Błedne dane w polu Klasa. Możesz wprowadzić tylko litery i cyfry"  required>
										<br /><br />


										Średnia	ocen	uzyskana	w	poprzednim	roku	szkolnym<span id="star">*</span>	<br />
										<input class="form-control" type="text" name="srednia_poprzednia" placeholder="Średnia z poprzedniego roku np. 4.60" pattern="[0-9]\.[0-9]{2}" value="<?php echo $srednia_poprzednia ?>" title="Błedne dane w polu Średnia poprzednia. Możesz wprowadzić tylko cyfry w formacie X.XX"  required>
										<br /><br />


										Średnia	ocen	uzyskana	w	I	semestrze	bieżącego	roku	szkolnego<span id="star">*</span><br />
										<input class="form-control" type="text" name="srednia_biezaca" placeholder="Średnia w I semestrze np. 4.60" pattern="[0-9]\.[0-9]{2}" value="<?php echo $srednia_biezaca ?>" title="Błedne dane w polu Średnia bieążaca. Możesz wprowadzić tylko cyfry w formacie X.XX"  required>
										<br /><br />	


										<a style="background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 4px;border: none;border-radius: 4px;cursor: pointer;" href="dane_podstawowe.php">Cofnij</a>
				                <input class="btn btn-success" type="submit" name="submit" value="Zapisz">
								<a style="background-color: #337ab7; color: white;padding: 10px 10px;margin: 8px 4px;border: none;border-radius: 4px;cursor: pointer;" href="dane_rodzina.php">Dalej</a>



		</form>

<?php

echo "</div>";	//zamknięcie diva od edycji

?>

<?php

echo "</div>";		//zamknięcie diva od terminu

?>


									<?php
										if(isset($_POST['submit']))
											{
													$konto=$jakie_konto;
													$konto=$_POST['konto'];
													$insert_update=$_POST['insert_update'];
													$klasa=$_POST['klasa'];
													$srednia_poprzednia=$_POST['srednia_poprzednia'];
													$srednia_biezaca=$_POST['srednia_biezaca'];
													$nazwa_szkoly=$_POST['nazwa_szkoly'];
													$adres_szkoly=$_POST['adres_szkoly'];
													
													
													mysql_query('SET CHARACTER SET utf8'); 


mysql_query("SET NAMES 'utf8'");
$sql = "UPDATE dane_szkola SET klasa='$klasa', srednia_poprzednia='$srednia_poprzednia', srednia_biezaca='$srednia_biezaca', nazwa_szkoly='$nazwa_szkoly', adres_szkoly='$adres_szkoly'    WHERE konto = '$konto'" ;

mysql_query($sql);
echo "";

													header("Location: dane_szkola.php");
								
											}
								?>









					
				</div>
				<!-- koniec diva prawego -->
			</div>
			<!-- koniec podział strony na 2 części w propocjach 2:10 -->
					
	</div>		
</div>
</div>
<br /><br />

<?php //require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php //require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>

</body>
</html>
