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
				<h1 class="page-header text-center">Kalkulator dochodów</h1>
				<!-- Content goes here -->

				<p>Możesz tutaj przeliczyć swój dochód. W poniżesz pola należy wpisywać dochód miesięczny. Dochód na osobę zostanie obliczony i podany na dole strony.<br />Gdyby gdzieś w obliczeniach pojawił się błąd to proszę o kontakt: dariuszptaszynski177@wp.pl</p>
				
				<h4 style="color: red;">WAŻNE: Dane te nigdzie nie są zapisywane. Jeśli przekraczasz dochód o niewielką kwotę, a posiadasz wysokie osiągnięcia, oceny, ciekawe zainteresowania ZŁÓŻ WNIOSEK. Stowrzyszenie poszukuje uzdolnionych osób, a jeśli przekroczysz dochód o niewielką kwotę to Stowarzyszenie może rozpatrzyć Twój wniosek pozytywnie</h4><br />

				<h5>Maksymalny próg dochodowy: <b>3640 zł na osobę</b></h5><br />

				Liczba osób wspólnie zamieszkujących<br />
				<input type="number" class="form-control liczba_osob" placeholder="Liczba osób" size="40" value="1" min="1"><br /><br />
				
				
				<table id="tabela">

						<tr id="linia">

						<td id="linia">Lp.</td>
						<td id="linia">Źródło dochodu</td>
						<td id="linia">Dochód brutto</td>

						</tr>

						<tr id="linia">

						<td id="linia">1.</td>
						<td id="linia" name="zrodlo_1">Wynagrodzenia za pracę</td>
						<td id="linia"><input class="form-control wynagrodzenie_za_prace" name="dochod_1" type="text"size="40" placeholder="Wynagrodzenia za pracę" pattern="\d+(\.\d{2})?"></td>

						</tr>

						<tr id="linia">

						<td id="linia">2.</td>
						<td id="linia" name="zrodlo_1">Emerytury, renty inwalidzkie i rodzinne</td>
						<td id="linia"><input class="form-control emerytury_renty" name="dochod_2" type="text" placeholder="Emerytury, renty inwalidzkie i rodzinne" pattern="\d+(\.\d{2})?"></td>

						</tr>

						<tr id="linia">

						<td id="linia">3.</td>
						<td id="linia" name="zrodlo_1">Stałe zasiłki z pomocy społecznej</td>
						<td id="linia"><input class="form-control zasilki_pomoc_spoleczna" name="dochod_3" type="text" placeholder="Stałe zasiłki z pomocy społecznej" pattern="\d+(\.\d{2})?"></td>

						</tr>

						<tr id="linia">

						<td id="linia">4.</td>
						<td id="linia" name="zrodlo_1">Dodatek mieszkaniowy</td>
						<td id="linia"><input class="form-control dodatek_mieszkaniowy" name="dochod_4" type="text" placeholder="Dodatek mieszkaniowy" pattern="\d+(\.\d{2})?"></td>

						</tr>

						<tr id="linia">

						<td id="linia">5.</td>
						<td id="linia" name="zrodlo_1">Alimenty i świadczenia z funduszu alimentacyjnego</td>
						<td id="linia"><input class="form-control alimenty" name="dochod_5" type="text" placeholder="Alimenty i świadczenia z funduszu alimentacyjnego" pattern="\d+(\.\d{2})?"></td>

						</tr>

						<tr id="linia">

						<td id="linia">6.</td>
						<td id="linia" name="zrodlo_1">Zasiłek dla bezrobotnych</td>
						<td id="linia"><input class="form-control zasilek_dla_bezrobotnych" name="dochod_6" type="text" placeholder="Zasiłek dla bezrobotnych" pattern="\d+(\.\d{2})?"></td>

						</tr>

						<tr id="linia">

						<td id="linia">7.</td>
						<td id="linia" name="zrodlo_1">Zasiłek rodzinny i pielęgnacyjny</td>
						<td id="linia"><input class="form-control zasilek_rodzinny_pielegnacyjny" name="dochod_7" type="text" placeholder="Zasiłek rodzinny i pielęgnacyjny" pattern="\d+(\.\d{2})?"></td>

						</tr>

						<tr id="linia">

						<td id="linia">8.</td>
						<td id="linia" name="zrodlo_1">Dochody z gospodarstwa rolnego</td>
						<td id="linia"><input class="form-control dochod_gospodarstwa_rolnego" name="dochod_8" type="text" placeholder="Dochody z gospodarstwa rolnego" pattern="\d+(\.\d{2})?"></td>

						</tr>

						<tr id="linia">

						<td id="linia">9.</td>
						<td id="linia" name="zrodlo_1">Dochody z prowadzenia działalności gospodarczej</td>
						<td id="linia"><input class="form-control dochod_dzialanosc_gospodarcza" name="dochod_9" type="text" placeholder="Dochody z prowadzenia działalności gospodarczej" pattern="\d+(\.\d{2})?"></td>

						</tr>

						<!-- <tr id="linia">

						<td id="linia"></td>
						<td id="linia" name="zrodlo_1">inne	dochody (wpisz poniżej)</td>
						<td id="linia"></td>

						</tr> -->

						<tr id="linia">

						<td id="linia">10.</td>
						<td id="linia" name="zrodlo_1">Inne	dochody</td>

						<td id="linia"><input class="form-control inne_dochody" name="dochod_10" type="text" placeholder="Inne dochody" pattern="\d+(\.\d{2})?"></td>

						</tr>


						</table>

						<p>Dochód na osobę: <span class="twoj_dochod"></span></p>
						<p class="prog"></p>

						<script>
							let twoj_dochod = document.querySelector('.twoj_dochod');
							let prog = document.querySelector('.prog');
							

							let suma=0;
							let sredni=0;

							function dochod_sredni()
							{
								let liczba_osob = document.querySelector('.liczba_osob').value;

								let wynagrodzenie_za_prace_double = 0;
								let emerytury_renty_double = 0;
								let zasilki_pomoc_spoleczna_double = 0;
								let dodatek_mieszkaniowy_double = 0;
								let alimenty_double = 0;
								let zasilek_dla_bezrobotnych_double = 0;
								let zasilek_rodzinny_pielegnacyjny_double = 0;
								let dochod_gospodarstwa_rolnego_double = 0;
								let dochod_dzialanosc_gospodarcza_double = 0;
								let inne_dochody_double = 0;

								//wynagrodzenie za pracę
								let wynagrodzenie_za_prace = document.querySelector('.wynagrodzenie_za_prace').value;
								if(wynagrodzenie_za_prace=='')
								{
									wynagrodzenie_za_prace_double = 0;
								}
								else
								{
								let wynagrodzenie_za_prace_kropka = wynagrodzenie_za_prace.replace(",", ".");
								wynagrodzenie_za_prace_double = parseFloat(wynagrodzenie_za_prace_kropka);
								}


								//renty i emerytury
								let emerytury_renty = document.querySelector('.emerytury_renty').value;
								if(emerytury_renty=='')
								{
									emerytury_renty_double = 0
								}
								else
								{
								let emerytury_renty_kropka = emerytury_renty.replace(",", ".");
								emerytury_renty_double = parseFloat(emerytury_renty_kropka);
								}


								//stałe zasiłki z pomocy społecznej
								let zasilki_pomoc_spoleczna = document.querySelector('.zasilki_pomoc_spoleczna').value;
								if(zasilki_pomoc_spoleczna=='')
								{
									zasilki_pomoc_spoleczna_double = 0
								}
								else
								{
								let zasilki_pomoc_spoleczna_kropka = zasilki_pomoc_spoleczna.replace(",", ".");
								zasilki_pomoc_spoleczna_double = parseFloat(zasilki_pomoc_spoleczna_kropka);
								}


								//dodatek mieszkaniowy
								let dodatek_mieszkaniowy = document.querySelector('.dodatek_mieszkaniowy').value;
								if(dodatek_mieszkaniowy=='')
								{
									dodatek_mieszkaniowy_double = 0
								}
								else
								{
								let dodatek_mieszkaniowy_kropka = dodatek_mieszkaniowy.replace(",", ".");
								dodatek_mieszkaniowy_double = parseFloat(dodatek_mieszkaniowy_kropka);
								}


								//alimenty
								let alimenty = document.querySelector('.alimenty').value;
								if(alimenty=='')
								{
									alimenty_double = 0
								}
								else
								{
								let alimenty_kropka = alimenty.replace(",", ".");
								alimenty_double = parseFloat(alimenty_kropka);
								}


								//zasilek dla bezrobotnych
								let zasilek_dla_bezrobotnych = document.querySelector('.zasilek_dla_bezrobotnych').value;
								if(zasilek_dla_bezrobotnych=='')
								{
									zasilek_dla_bezrobotnych_double = 0
								}
								else
								{
								let zasilek_dla_bezrobotnych_kropka = zasilek_dla_bezrobotnych.replace(",", ".");
								zasilek_dla_bezrobotnych_double = parseFloat(zasilek_dla_bezrobotnych_kropka);
								}


								//zasilek rodzinny i pielegnacyjny
								let zasilek_rodzinny_pielegnacyjny = document.querySelector('.zasilek_rodzinny_pielegnacyjny').value;
								if(zasilek_rodzinny_pielegnacyjny=='')
								{
									zasilek_rodzinny_pielegnacyjny_double = 0
								}
								else
								{
								let zasilek_rodzinny_pielegnacyjny_kropka = zasilek_rodzinny_pielegnacyjny.replace(",", ".");
								zasilek_rodzinny_pielegnacyjny_double = parseFloat(zasilek_rodzinny_pielegnacyjny_kropka);
								}


								//dochod z gospodarstwa rolnego
								let dochod_gospodarstwa_rolnego = document.querySelector('.dochod_gospodarstwa_rolnego').value;
								if(dochod_gospodarstwa_rolnego=='')
								{
									dochod_gospodarstwa_rolnego_double = 0
								}
								else
								{
								let dochod_gospodarstwa_rolnego_kropka = dochod_gospodarstwa_rolnego.replace(",", ".");
								dochod_gospodarstwa_rolnego_double = parseFloat(dochod_gospodarstwa_rolnego_kropka);
								}


								//dochod z dzialanosci gospodarczej
								let dochod_dzialanosc_gospodarcza = document.querySelector('.dochod_dzialanosc_gospodarcza').value;
								if(dochod_dzialanosc_gospodarcza=='')
								{
									dochod_dzialanosc_gospodarcza_double = 0
								}
								else
								{
								let dochod_dzialanosc_gospodarcza_kropka = dochod_dzialanosc_gospodarcza.replace(",", ".");
								dochod_dzialanosc_gospodarcza_double = parseFloat(dochod_dzialanosc_gospodarcza_kropka);
								}


								//inne_dochody
								let inne_dochody = document.querySelector('.inne_dochody').value;
								if(inne_dochody=='')
								{
									inne_dochody_double = 0
								}
								else
								{
								let inne_dochody_kropka = inne_dochody.replace(",", ".");
								inne_dochody_double = parseFloat(inne_dochody_kropka);
								}

								let maksymalny_dochod = 3640;

								suma = parseFloat(suma);
								suma=parseFloat(wynagrodzenie_za_prace_double)+parseFloat(emerytury_renty_double)+parseFloat(zasilki_pomoc_spoleczna_double)+parseFloat(dodatek_mieszkaniowy_double)+parseFloat(alimenty_double)+parseFloat(zasilek_dla_bezrobotnych_double)+parseFloat(zasilek_rodzinny_pielegnacyjny_double)+parseFloat(dochod_gospodarstwa_rolnego_double)+parseFloat(dochod_dzialanosc_gospodarcza_double)+parseFloat(inne_dochody_double);

								sredni = parseFloat(sredni);
								sredni = suma/liczba_osob

								twoj_dochod.innerHTML = sredni;

								if(sredni!=0)
								{
									if(sredni<maksymalny_dochod)
									{
										prog.innerHTML = "<h3 style='color: green;'>Nie przekraczasz progu dochodowego, aby wnioskować o stypendium</h3>";
									}
									else
									{
										prog.innerHTML = "<h3 style='color: red;'>Przekraczasz próg dochodowy</h3>";
									}
								}
							}

							setInterval(dochod_sredni, 1000);

							

							

						</script>	

<style>
.regulamin
{
	margin-left: 50px;
	margin-right: 50px;
}
table, td, th 
{
	padding: 5px;
  
}

/* table, td, th 
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
} */
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
