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
</head>
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-sm-12">
				<h1 class="page-header">
					
					
				</h1>
				<!-- Content goes here -->
				
				<?php
				$dane_wniosku = $_REQUEST['dane_wniosku'];
				//echo $dane_wniosku;
				?>
				
				
				<h2 align="center">Instrukcja do wniosku</h2>
				
				<div style="margin-left:50px; margin-right:50px;">
				
				Wniosek składa się z 7 części:
				<ul>
					<li>Dane podstawowe</li>
					<li>Dane o szkole</li>
					<li>Dane o rodzinie</li>
					<li>Dane o dochodach</li>
					<li>Dane o osiągnięciach</li>
					<li>Dane dodatkowe</li>
					<li>Załączniki</li>
				</ul>
				
				Po lewej stronie znajduje się menu nawigacyjne wniosku. Na początku wszystkie zakładki są oznaczone <img src="uncheck.png" width="13px"/><br />
				
				<img src="image/menu_start.png" /><br />
				
				Po uzupełnieniu każdej zakładki i kliknięciu na przycisk Zapisz, dana zakładka zmieni swoj stan na <img src="check.png" width="13px"/><br />
				
				<img src="image/menu_koniec.png" /><br />
				
				Dopiero po wypełnianiu wszystkich zakładek, można potwierdzić dane w zawarte we wniosku. Po zatwierdzeniu nie można edytować ich edytować. Po potwierdzeniu danych, można wygenerować wniosek w PDF.<br /><br />
				
				<h3 style="text-align:center;">Szczegóły wypełniania wniosku</h3>
				
				<span style="color: red; font-weight: bold;">Termin składania wniosków: 31.05.2021 r.</span>
				<br /><br />
				
				Pola obowiązkowe oznaczone są czerwoną gwiazdką (<span id="star">*</span>). Na każde pole jest nałożona kontrola wprowadzanych danych. Jeśli wprowadzisz nieodpowiednie dane i klikniesz Zapisz, zostaniesz poinformowany/poinformowana, gdzie znajduje się błąd.<br /><br />
				
				W zakładkach Dane o rodzinie, Dane o osiągnięciach i Załączniki, należy dodać poszczególne elementy za pomocą formularza znadującego się w górnej części danej zakładki. Po dodaniu danych, zostaną one wyświetlone w tabelce poniżej.<br /><br />
				
				W zakładce Dane dodatkowe nieodpowiednie znaki wpisane w pola zostaną skasowne. Dozwole znaki w tej zakładce to: litery, przecinek (,), kropka (.), wykrzyknik (!), znak zapytania (?), nawiasy okrągłe (), myślnik (-).<br /><br />
				
				W zakładce Dane o dochodach <span style="color:red;">wyjątkowo w tym roku, podać należy średni dochód miesięczny w rodzinie za rok 2020. <b>Dochód średni na osobę jest liczony przez program automatycznie.</b></span>Kwoty dochodów należy wpisywać z kropką (np. 1234.56).<br /><br />
				
				W zakładce Załączniki należy wpisać nazwy załączników, które dołączyszcz do wydrukowanego wniosku. <br /><br />
				
				Więcej szczegółów o tegorocznej akcji stypendialnej pod tym <a href="http://so.koscian.net/Akcja-stypendialna-na-rok-szkolnyakademicki-20202021_3b3.html" target="blank">linkiem</a><br /><br />
				
				Zanim przystąpisz do wypełniania wniosku, upewnij się, że spełniasz kryteria przyznania stypendium Stowarzyszenia Oświatowego im. D. Chłapowskiego. Link do <a href="http://so.koscian.net/files/16386/REGULAMIN-przyznawania-stypendum-stan-luty-2020.docx">Regulaminu przyznania stypendium</a>
				
				<br /><br />
				<span style="font-weight:bold;">Nie musisz wypełniać całego wniosku od razu. Możesz zacząć teraz i dokończyć później</span>
				<br /><br />
				
				W przypadku pytań lub problemu, proszę pisać na <b>dariuszptaszynski177@wp.pl</b>
				
				
				<br /><br />
				<div style="margin-right:50px;">
				<?php echo "<a href='dane_podstawowe.php?dane_wniosku=$dane_wniosku' style=' background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;'>Przejdź do wypełniania wniosku</a>";
				?>
				<br /><br />
				</div>
				<!-- Content Ends Here -->
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div> <!-- /.wrapper -->
</html>

<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
