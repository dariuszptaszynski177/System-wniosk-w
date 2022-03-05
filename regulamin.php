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
			<div class="regulamin">
				<h1 class="page-header text-center">Regulamin przyznawania stypendiów</h1>
				<!-- Content goes here -->
				
				
				<h3>Procedura składania wniosku o stypendium</h3>
				<p>
				W razie pytań proszę pisać na <b style="color:black">dariuszptaszynski177@wp.pl</b>
				</p>
				
				<p>
					Pełny regulamin przyznazwania stypendiów znajduje się <a href="http://so.koscian.net/Wniosek-i-regulamin.html">TUTAJ</a><br /><br />

					1. Osoby ubiegające się o stypendium lub inne podmioty zgłaszające, <b>składają wniosek w wersji elektronicznej (online)</b>. Termin składania wniosków zostanie podany na stronie <a href="http://so.koscian.net">http://so.koscian.net</a>. Następnie <b>wydrukowany z systemu wniosek wraz z załącznikami należy dostarczyć do siedziby Stowarzyszenia</b>. Termin dostarczania wniosków także zostanie podany na stronie Stowarzyszenia<br />
					2. Do wydrukowanego wniosku składanego w siedzibie Stowarzyszenia należy dołączyć następujące załączniki: 
						<ul>a) dokumenty obligatoryjne: 
							<li>kserokopia świadectwa z minionego (poprzedniego) roku szkolnego,</li>
							<li>zaświadczenie o średniej ocen (lub wykaz ocen) za pierwsze półrocze bieżącego roku szkolnego (tego, w którym składany jest wniosek),</li>
							<li>kserokopie dyplomów i wyróżnień (z bieżącego i minionego roku szkolnego), </li>
							<li>zaświadczenia o dochodach w rodzinie; </li>
						</ul>
						<ul>b) dokumenty fakultatywne:
							<li>zaświadczenia z kół zainteresowań, klubów sportowych, organizacji społecznych, </li>
							<li>opinie nauczycieli, </li>
							<li>inne dokumenty potwierdzające aktywność osoby ubiegającej się o stypendium,</li>
							<li>udokumentowane oświadczenia o sytuacji rodzinnej i materialnej (np. renta rodzinna, orzeczenia lekarskie itp.). </li>
						</ul>
				</p>

				<h3>Kryteria oceny wniosków stypendialnych (liczba przyznawanych punktów)</h3>

				<p>
				1. Średnia ocen uzyskana w minionym roku szkolnym lub w pierwszym półroczu bieżącego roku szkolnego (pod uwagę brana jest średnią ocen korzystniejsza dla kandydata):
				</p>

				<table>
					<tr>
						<th>Szkoły podstawowe</th>
						<th>Szkoły średnie</th>
						<th>Liczba punktów</th>
					</tr>
					<tr>
						<td>4,0-4,7</td>
						<td>3,5-4,3</td>
						<td>0 pkt</td>
					</tr>

					<tr>
						<td>4,71-4,8</td>
						<td>4,31-4,5</td>
						<td>10 pkt</td>
					</tr>

					<tr>
						<td>4,81-4,9</td>
						<td>4,51-4,74</td>
						<td>15 pkt</td>
					</tr>

					<tr>
						<td>4,91-5,2</td>
						<td>4,75-4,84</td>
						<td>20 pkt</td>
					</tr>

					<tr>
						<td>5,21-5,5</td>
						<td>4,85-5,0</td>
						<td>25 pkt</td>
					</tr>

					<tr>
						<td>powyżej 5,5</td>
						<td>powyżej 5,0</td>
						<td>30 pkt</td>
					</tr>
				</table>

				<p>
				<br />Wnioski, w których średnia ocen nie przekracza wymaganego minimum (szkoły podstawowe: 4,0; szkoły średnie: 3,5) nie będą rozpatrywane.<br /><br />

				2. Szczególne osiągnięcia naukowe, artystyczne, sportowe lub inne (z bieżącego i minionego roku szkolnego):
				</p>

				<table>
					<tr>
						<th>Szkoła podstawowa</th>
						<th>Szkoła średnia</th>
					</tr>

					<tr>
						<td>
						Laureat na etapie wojewódzkim – 30 pkt<br />
						Zwycięzca szczebla centralnego – 30 pkt 	
						</td>

						<td>
						Zwycięzca szczebla centralnego - 30 pkt <br />
						Laureat etapu okręgowego/rejonowego - 30 pkt <br />
						Finalista etapu okręgowego/rejonowego – 25 pkt
						</td>
					</tr>

					<tr>
						<td>
						Finalista na etapie wojewódzkim – 20 pkt	
						</td>

						<td>
						Uczestnik etapu okręgowego - 15 pkt
						</td>
					</tr>

					<tr>
						<td>
						Udział w konkursach rejonowych/powiatowych – 10-15 pkt	
						</td>

						<td>
						Zwycięzca innego niż trójstopniowy konkurs na etapie wyższym niż szkolny – 15 pkt
						</td>
					</tr>

					<tr>
						<td>
						Udział w konkursach międzyszkolnych – 5 pkt
						</td>

						<td>
						Uczestnik konkursów na etapie wyższym niż szkolny – 10 pkt
						</td>
					</tr>

					<tr>
						<td>
						Udział w konkursach szkolnych (3 i więcej) – 3 pkt
						</td>

						<td>
						Udział w przedsięwzięciach naukowych, projektach edukacyjnych - 10 pkt
						</td>
					</tr>
				</table>

				<p>
				<br />Maksymalna liczba punktów możliwych do przyznania w kryterium 2 (szczególne osiągnięcia kandydata) to 50 pkt <br /><br />

				3. Szczególne zainteresowania (np. pasja, wykazywanie zmysłu badacza, działalność w szkolnym kole zainteresowań) 0 – 15 pkt<br /><br />

				4. Aktywność na rzecz środowiska lokalnego:
				<ul>
					<li>działalność kulturalna, artystyczna, sportowa (np. współorganizacja przeglądów, konkursów, zawodów, koncertów, pokazów) – do 15 pkt</li>
					<li>wolontariat – nieodpłatna działalność na rzecz innych osób, idei, organizacji itp. – do 15 pkt</li>
					<li>praca w samorządzie szkolnym,lokalnym – do 10 pkt</li>
				</ul>
				</p>


				<?php
				$placa_minimalna_brutto = 2800;
				?>

				<p>
				5. Sytuacji materialna rodziny:
				</p>

				<table>
					<tr>
						<th>Dochód (brutto) na osobę w rodzinie</th>
						<th>Liczba punktów</th>
					</tr>

					<tr>
						<td>Do 30 % płacy minimalnej (<?php echo $placa_minimalna_brutto*0.3; echo " zł" ?>)</td>
						<td>30 pkt</td>
					</tr>

					<tr>
						<td>Od 31 % do 50 % płacy minimalnej (<?php echo $placa_minimalna_brutto*0.30; echo " - ";echo $placa_minimalna_brutto*0.50; echo " zł" ?>)</td>
						<td>20 pkt</td>
					</tr>

					<tr>
						<td>Od 51% do 75 % płacy minimalnej (<?php echo $placa_minimalna_brutto*0.50; echo " - ";echo $placa_minimalna_brutto*0.75; echo " zł" ?>)</td>
						<td>15 pkt</td>
					</tr>

					<tr>
						<td>Od 76% do 100 % płacy minimalnej (<?php echo $placa_minimalna_brutto*0.75; echo " - ";echo $placa_minimalna_brutto*1; echo " zł" ?>)</td>
						<td>10 pkt</td>
					</tr>

					<tr>
						<td>Od 100 % 130% płacy minimalnej (<?php echo $placa_minimalna_brutto*1; echo " - ";echo $placa_minimalna_brutto*1.30; echo " zł" ?>)</td>
						<td>0 pkt</td>
					</tr>
				</table>

				<p>
				<br />Wnioski, w których dochód (brutto) na osobę w rodzinie przekracza 130% płacy minimalnej nie będą rozpatrywane.<br /><br />

				6. Trudna sytuacja rodzinna
				<ul>
					<li>rodziny  niepełne – 5 pkt</li>
					<li>niepełnosprawność w rodzinie – 5 pkt</li>
					<li>bezrobocie w rodzinie – 5 pkt</li>
					<li>wielodzietność (3 i więcej dzieci) – 5 pkt</li>
					<li>zaburzenia psychiczne lub choroby (w tym uzależnienia) – 5 pkt</li>
					<li>szczególna sytuacja rodzinna, materialna –  10 pkt</li>
				</ul>
				
				Maksymalna liczba punktów możliwych do przyznania w kryterium 6 (trudna sytuacja rodzinna kandydata) to 15 pkt. <br /><br />


				Rada Oświatowa Stowarzyszenia podejmuje decyzję o zakwalifikowaniu kandydata do II etapu konkursu stypendialnego (rozmowy) uwzględniając ocenę wniosków stypendialnych. Ocenę wykonywana na podstawie uzyskanych punktów.<br />

				<ol>
				<li>Wyniki w nauce (średnia ocen) – max. 30 pkt</li>
				<li>Szczególne osiągnięcia – max. 50 pkt</li>
				<li>Zainteresowania – max. 15 pkt</li>
				<li>Aktywność na rzecz środowiska lokalnego - max. 40 pkt</li> 
				<li>Sytuacja materialna rodziny – max. 30 pkt</li>
				<li>Trudna sytuacja rodzinna - max. 15 pkt</li>
				</ol>
				
				Kandydat na podstawie oceny złożonego wniosku stypendialnego może uzyskać łącznie max. 180 punktów.<br /><br />



				Rada Oświatowa w toku postępowania rekrutacyjnego:<br />

				<ol>
					<li>dokonuje oceny złożonych wniosków tworząc listę rankingową (zgodnie z liczbą przyznanych punktów),</li>
					<li>spośród złożonych wniosków stypendialnych wyłania kandydatów do II etapu postępowania rekrutacyjnego (rozmowa);</li>
					<li>przeprowadza rozmowy z kandydatami (II etap rekrutacyjny);</li>
					<li>po przeprowadzeniu rozmów z kandydatami, w wyniku głosowania wybiera:
					
					<ol type="a">
						<li>stypendystów Stypendium Oświatowego im. Dezyderego Chłapowskiego,</li>
						<li>kandydatów do programu stypendiów pomostowych;</li>
						<li>osoby wyróżnione nagrodą jednorazową.</li>
					</ol>
					</li>
					<li>Zawiadamia kandydatów o wynikach postępowania rekrutacyjnego.</li>
				</ol>


				</p>

<style>
.regulamin
{
	margin-left: 50px;
	margin-right: 50px;
}
table, td, th 
{
	padding: 5px;
  border: 1px solid black;
}

table 
{
  border-collapse: collapse;
}

b
{
	color: red;
}
</style>
				<!-- Content Ends Here -->
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div> <!-- /.wrapper -->
</html>

<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
