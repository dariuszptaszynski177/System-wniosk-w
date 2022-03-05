


<?php



//echo $nazwa;


$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$data_u=$_POST['data_u'];
$miejsce_u=$_POST['miejsce_u'];
$pesel=$_POST['pesel'];
$powiat=$_POST['powiat'];
$gmina=$_POST['gmina'];
$ulica=$_POST['ulica'];
$nr_domu=$_POST['nr_domu'];
$nr_lokalu=$_POST['nr_lokalu'];
$miejscowosc=$_POST['miejscowosc'];
$kod=$_POST['kod'];
$poczta=$_POST['poczta'];
$nr_opiekuna=$_POST['nr_opiekuna'];
$nr_komorkowy=$_POST['nr_komorkowy'];
$email=$_POST['email'];
$klasa=$_POST['klasa'];
$srednia_poprzednia=$_POST['srednia_poprzednia'];
$srednia_biezaca=$_POST['srednia_biezaca'];
$nazwa_szkoly=$_POST['nazwa_szkoly'];
$adres_szkoly=$_POST['adres_szkoly'];

/*
echo '<br />';
echo $imie;
echo '<br />';
echo $nazwisko;
echo '<br />';
echo $data_u;
echo '<br />';
echo $miejsce_u;
echo '<br />';
echo $pesel;
echo '<br />';
echo $powiat;
echo '<br />';
echo $gmina;
echo '<br />';
echo $ulica;
echo '<br />';
echo $nr_domu;
echo '<br />';
echo $nr_lokalu;
echo '<br />';
echo $miejscowosc;
echo '<br />';
echo $kod;
echo '<br />';
echo $poczta;
echo '<br />';
echo $nr_opiekuna;
echo '<br />';
echo $nr_komorkowy;
echo '<br />';
echo $email;
echo '<br />';
echo $klasa;
echo '<br />';
echo $srednia_poprzednia;
echo '<br />';
echo $srednia_biezaca;
echo '<br />';
echo $nazwa_szkoly;
echo '<br />';
echo $adres_szkoly;

*/


$imie_1=$_POST['imie_1'];
$nazwisko_1=$_POST['nazwisko_1'];
$data_u_1=$_POST['data_u_1'];
$pokrewienstwo_1=$_POST['pokrewienstwo_1'];
$miejsce_n_z_1=$_POST['miejsce_n_z_1'];

$imie_2=$_POST['imie_2'];
$nazwisko_2=$_POST['nazwisko_2'];
$data_u_2=$_POST['data_u_2'];
$pokrewienstwo_2=$_POST['pokrewienstwo_2'];
$miejsce_n_z_2=$_POST['miejsce_n_z_2'];

$imie_3=$_POST['imie_3'];
$nazwisko_3=$_POST['nazwisko_3'];
$data_u_3=$_POST['data_u_3'];
$pokrewienstwo_3=$_POST['pokrewienstwo_3'];
$miejsce_n_z_3=$_POST['miejsce_n_z_3'];

$imie_4=$_POST['imie_4'];
$nazwisko_4=$_POST['nazwisko_4'];
$data_u_4=$_POST['data_u_4'];
$pokrewienstwo_4=$_POST['pokrewienstwo_4'];
$miejsce_n_z_4=$_POST['miejsce_n_z_4'];

$imie_5=$_POST['imie_5'];
$nazwisko_5=$_POST['nazwisko_5'];
$data_u_5=$_POST['data_u_5'];
$pokrewienstwo_5=$_POST['pokrewienstwo_5'];
$miejsce_n_z_5=$_POST['miejsce_n_z_5'];

$imie_6=$_POST['imie_6'];
$nazwisko_6=$_POST['nazwisko_6'];
$data_u_6=$_POST['data_u_6'];
$pokrewienstwo_6=$_POST['pokrewienstwo_6'];
$miejsce_n_z_6=$_POST['miejsce_n_z_6'];

$imie_7=$_POST['imie_7'];
$nazwisko_7=$_POST['nazwisko_7'];
$data_u_7=$_POST['data_u_7'];
$pokrewienstwo_7=$_POST['pokrewienstwo_7'];
$miejsce_n_z_7=$_POST['miejsce_n_z_7'];

$imie_8=$_POST['imie_8'];
$nazwisko_8=$_POST['nazwisko_8'];
$data_u_8=$_POST['data_u_8'];
$pokrewienstwo_8=$_POST['pokrewienstwo_8'];
$miejsce_n_z_8=$_POST['miejsce_n_z_8'];

$imie_9=$_POST['imie_9'];
$nazwisko_9=$_POST['nazwisko_9'];
$data_u_9=$_POST['data_u_9'];
$pokrewienstwo_9=$_POST['pokrewienstwo_9'];
$miejsce_n_z_9=$_POST['miejsce_n_z_9'];

$imie_10=$_POST['imie_10'];
$nazwisko_10=$_POST['nazwisko_10'];
$data_u_10=$_POST['data_u_10'];
$pokrewienstwo_10=$_POST['pokrewienstwo_10'];
$miejsce_n_z_10=$_POST['miejsce_n_z_10'];

/*
echo '<br />';
echo $imie_1;
echo '<br />';
echo $nazwisko_1;
echo '<br />';
echo $data_u_1;
echo '<br />';
echo $pokrewienstwo_1;
echo '<br />';
echo $miejsce_n_z_1;
echo '<br />';

echo '<br />';
echo $imie_2;
echo '<br />';
echo $nazwisko_2;
echo '<br />';
echo $data_u_2;
echo '<br />';
echo $pokrewienstwo_2;
echo '<br />';
echo $miejsce_n_z_2;
echo '<br />';

echo '<br />';
echo $imie_3;
echo '<br />';
echo $nazwisko_3;
echo '<br />';
echo $data_u_3;
echo '<br />';
echo $pokrewienstwo_3;
echo '<br />';
echo $miejsce_n_z_3;
echo '<br />';

echo '<br />';
echo $imie_4;
echo '<br />';
echo $nazwisko_4;
echo '<br />';
echo $data_u_4;
echo '<br />';
echo $pokrewienstwo_4;
echo '<br />';
echo $miejsce_n_z_4;
echo '<br />';

echo '<br />';
echo $imie_5;
echo '<br />';
echo $nazwisko_5;
echo '<br />';
echo $data_u_5;
echo '<br />';
echo $pokrewienstwo_5;
echo '<br />';
echo $miejsce_n_z_5;
echo '<br />';

echo '<br />';
echo $imie_6;
echo '<br />';
echo $nazwisko_6;
echo '<br />';
echo $data_u_6;
echo '<br />';
echo $pokrewienstwo_6;
echo '<br />';
echo $miejsce_n_z_6;
echo '<br />';

echo '<br />';
echo $imie_7;
echo '<br />';
echo $nazwisko_7;
echo '<br />';
echo $data_u_7;
echo '<br />';
echo $pokrewienstwo_7;
echo '<br />';
echo $miejsce_n_z_7;
echo '<br />';

echo '<br />';
echo $imie_8;
echo '<br />';
echo $nazwisko_8;
echo '<br />';
echo $data_u_8;
echo '<br />';
echo $pokrewienstwo_8;
echo '<br />';
echo $miejsce_n_z_8;
echo '<br />';

echo '<br />';
echo $imie_9;
echo '<br />';
echo $nazwisko_9;
echo '<br />';
echo $data_u_9;
echo '<br />';
echo $pokrewienstwo_9;
echo '<br />';
echo $miejsce_n_z_9;
echo '<br />';

echo '<br />';
echo $imie_10;
echo '<br />';
echo $nazwisko_10;
echo '<br />';
echo $data_u_10;
echo '<br />';
echo $pokrewienstwo_10;
echo '<br />';
echo $miejsce_n_z_10;
echo '<br />';

*/


$dochod_1=$_POST['dochod_1'];
$dochod_2=$_POST['dochod_2'];
$dochod_3=$_POST['dochod_3'];
$dochod_4=$_POST['dochod_4'];
$dochod_5=$_POST['dochod_5'];
$dochod_6=$_POST['dochod_6'];
$dochod_7=$_POST['dochod_7'];
$dochod_8=$_POST['dochod_8'];
$dochod_9=$_POST['dochod_9'];
$zrodlo_11=$_POST['zrodlo_11'];
$dochod_11=$_POST['dochod_11'];
$dochod_sredni=$_POST['dochod_sredni'];

/*
echo '<br />';
echo $dochod_1;
echo '<br />';
echo $dochod_2;
echo '<br />';
echo $dochod_3;
echo '<br />';
echo $dochod_4;
echo '<br />';
echo $dochod_5;
echo '<br />';
echo $dochod_6;
echo '<br />';
echo $dochod_7;
echo '<br />';
echo $dochod_8;
echo '<br />';
echo $dochod_9;
echo '<br />';
echo $zrodlo_11;
echo '<br />';
echo $dochod_11;
echo '<br />';
*/


//echo $dochod_sredni;
//echo '<br />';

$osiagniecie_1=$_POST['osiagniecie_1'];
$data_1=$_POST['data_1'];
$miejsce_1=$_POST['miejsce_1'];
$informacje_1=$_POST['informacje_1'];

$osiagniecie_2=$_POST['osiagniecie_2'];
$data_2=$_POST['data_2'];
$miejsce_2=$_POST['miejsce_2'];
$informacje_2=$_POST['informacje_2'];

$osiagniecie_3=$_POST['osiagniecie_3'];
$data_3=$_POST['data_3'];
$miejsce_3=$_POST['miejsce_3'];
$informacje_3=$_POST['informacje_3'];

$osiagniecie_4=$_POST['osiagniecie_4'];
$data_4=$_POST['data_4'];
$miejsce_4=$_POST['miejsce_4'];
$informacje_4=$_POST['informacje_4'];

$osiagniecie_5=$_POST['osiagniecie_5'];
$data_5=$_POST['data_5'];
$miejsce_5=$_POST['miejsce_5'];
$informacje_5=$_POST['informacje_5'];

/*
echo '<br />';
echo $osiagniecie_1;
echo '<br />';
echo $data_1;
echo '<br />';
echo $miejsce_1;
echo '<br />';
echo $informacje_1;

echo '<br />';
echo $osiagniecie_2;
echo '<br />';
echo $data_2;
echo '<br />';
echo $miejsce_2;
echo '<br />';
echo $informacje_2;

echo '<br />';
echo $osiagniecie_3;
echo '<br />';
echo $data_3;
echo '<br />';
echo $miejsce_3;
echo '<br />';
echo $informacje_3;

echo '<br />';
echo $osiagniecie_4;
echo '<br />';
echo $data_4;
echo '<br />';
echo $miejsce_4;
echo '<br />';
echo $informacje_4;

echo '<br />';
echo $osiagniecie_5;
echo '<br />';
echo $data_5;
echo '<br />';
echo $miejsce_5;
echo '<br />';
echo $informacje_5;
*/


$zajecia_pozaszkolne=$_POST['zajecia_pozaszkolne'];
$zaintersowania=$_POST['zaintersowania'];
$plany=$_POST['plany'];
$sytuacja_rodzinna=$_POST['sytuacja_rodzinna'];

/*
echo '<br />';
echo $zajecia_pozaszkolne;
echo '<br />';
echo $zaintersowania;
echo '<br />';
echo $plany;
echo '<br />';
echo $sytuacja_rodzinna;
*/


$zalacznik_1=$_POST['zalacznik_1'];
$zalacznik_2=$_POST['zalacznik_2'];
$zalacznik_3=$_POST['zalacznik_3'];
$zalacznik_4=$_POST['zalacznik_4'];
$zalacznik_5=$_POST['zalacznik_5'];

$zalacznik_6=$_POST['zalacznik_6'];
$zalacznik_7=$_POST['zalacznik_7'];
$zalacznik_8=$_POST['zalacznik_8'];
$zalacznik_9=$_POST['zalacznik_9'];
$zalacznik_10=$_POST['zalacznik_10'];

/*
echo '<br />';
echo $zalacznik_1;
echo '<br />';
echo $zalacznik_2;
echo '<br />';
echo $zalacznik_3;
echo '<br />';
echo $zalacznik_4;
echo '<br />';
echo $zalacznik_5;
*/







//generator PDF


include('MPDF57/mpdf.php');



$html .= "
<html>
<head>

<style>
body {font-family: sans-serif;
    font-size: 10pt;
}
td { vertical-align: top; 
    border-left: 0.6mm solid #000000;
    border-right: 0.6mm solid #000000;
		border-bottom: 0.6mm solid #000000;
	align: center;
}
table thead td { background-color: #EEEEEE;
    text-align: center;
    border: 0.6mm solid #000000;
}
td.lastrow {
    background-color: #FFFFFF;
    border: 0mm none #000000;
    border-bottom: 0.6mm solid #000000;
    border-left: 0.6mm solid #000000;
	border-right: 0.6mm solid #000000;
}




</style>
</head>
<body>

<!--mpdf
<htmlpagefooter name='myfooter'>
<div style='border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; '>
Strona {PAGENO} z {nb}<br />Wniosek należy wydrukować i dostarczyć do siedziby stowarzyszenia
</div>
</htmlpagefooter>

<sethtmlpageheader name='myheader' value='on' show-this-page='1' />
<sethtmlpagefooter name='myfooter' value='on' />
mpdf-->

<h1 align='center'><i>Wniosek</i></h1>
<h2 align='center'>o przyznanie stypendium Stowarzyszenia	Oświatowego<br />
im.	Dezyderego	Chłapowskiego<br />
w Kościanie</h2>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<img src='image/logo.jpg' width='200px'/><br />

<p align='justify'><b>Uwaga!</b><br />
Wniosek wypełnia bezpośrednio zainteresowany. Dane i informacje w nim zawarte potwierdza podpisem. W przypadku osób niepełnoletnich podpis składa również rodzic bądź prawny opiekun wnioskodawcy.</p>
<br />

<p align='center'><b>I. Informacje o wnioskodawcy</b></p>
<br />
Imię (imiona) : $imie<br />
Nazwisko : $nazwisko<br />
Data urodzenia : $data_u<br />
Miejsce urodzenia : $miejsce_u<br /><br />

Dokładny adres zamieszkania:<br />
Powiat : $powiat Gmina : $gmina<br />
Ulica : $ulica Nr domu : $nr_domu Nr lokalu : $nr_lokalu<br />
Miejscowość : $miejscowosc<br />
Kod pocztowy : $kod Poczta : $poczta<br /><br />

Dane kontaktowe:<br />
Nr tel. domowego (opiekuna) : $nr_opiekuna<br />
Nr tel. komórkowego : $nr_komorkowy<br />
Adres e-mail : $email<br /><br />

PESEL : $pesel<br />

<br /><br /><br /><br /><br /><br /><br /><br />

Nazwa szkoły/uczelni : $nazwa_szkoly<br />
Adres szkoły/uczelni : $adres_szkoly<br />
<br />
Klasa, do której uczęszczasz w bieżącym roku szkolnym : $klasa<br />
Średnia ocen uzyskana w poprzednim roku szkolnym : $srednia_poprzednia<br />
Średnia ocen uzyskana w I semestrze bieżącego roku szkolnego : $srednia_biezaca<br />
<br /><br /><br /><br /><br />

................................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..................................................................<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pieczątka szkoły/uczelni &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Data i podpis dyrektora/dziekana szkoły/wydziału)

<br /><br /><br /><br /><br />

<p align='center'><b>II. Oświadczenie o sytuacji rodzinnej i materialnej wnioskującego o stypendium</b></p>
<br />

Rodzina moja składa się z niżej wymienionych osób, pozostających we wspólnym gospodarstwie domowym
<br /><br />

<table class='items' width='100%' style='font-size: 9pt; border-collapse: collapse;' cellpadding='8'>
<thead>
<tr>
<td>Lp.</td>
<td>Imię</td>
<td>Nazwisko</td>
<td>Data urodzenia</td>
<td>Pokrewieńswto</td>
<td>Miejsce nauki, zatrudnienia</td>
</tr>
</thead>
<tbody>

<tr>
<td>1.</td>
<td>$imie_1</td>
<td>$nazwisko_1</td>
<td>$data_u_1</td>
<td>$pokrewienstwo_1</td>
<td>$miejsce_n_z_1</td>
</tr>

<tr>
<td>2.</td>
<td>$imie_2</td>
<td>$nazwisko_2</td>
<td>$data_u_2</td>
<td>$pokrewienstwo_2</td>
<td>$miejsce_n_z_2</td>
</tr>

<tr>
<td>3.</td>
<td>$imie_3</td>
<td>$nazwisko_3</td>
<td>$data_u_3</td>
<td>$pokrewienstwo_3</td>
<td>$miejsce_n_z_3</td>
</tr>

<tr>
<td>4.</td>
<td>$imie_4</td>
<td>$nazwisko_4</td>
<td>$data_u_4</td>
<td>$pokrewienstwo_4</td>
<td>$miejsce_n_z_4</td>
</tr>

<tr>
<td>5.</td>
<td>$imie_5</td>
<td>$nazwisko_5</td>
<td>$data_u_5</td>
<td>$pokrewienstwo_5</td>
<td>$miejsce_n_z_5</td>
</tr>

<tr>
<td>6.</td>
<td>$imie_6</td>
<td>$nazwisko_6</td>
<td>$data_u_6</td>
<td>$pokrewienstwo_6</td>
<td>$miejsce_n_z_6</td>
</tr>

<tr>
<td>7.</td>
<td>$imie_7</td>
<td>$nazwisko_7</td>
<td>$data_u_7</td>
<td>$pokrewienstwo_7</td>
<td>$miejsce_n_z_7</td>
</tr>

<tr>
<td>8.</td>
<td>$imie_8</td>
<td>$nazwisko_8</td>
<td>$data_u_8</td>
<td>$pokrewienstwo_8</td>
<td>$miejsce_n_z_8</td>
</tr>

<tr>
<td>9.</td>
<td>$imie_9</td>
<td>$nazwisko_9</td>
<td>$data_u_9</td>
<td>$pokrewienstwo_9</td>
<td>$miejsce_n_z_9</td>
</tr>

<tr>
<td>10.</td>
<td>$imie_10</td>
<td>$nazwisko_10</td>
<td>$data_u_10</td>
<td>$pokrewienstwo_10</td>
<td>$miejsce_n_z_10</td>
</tr>

</tbody>
</table>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />


Źródła i wysokość dochodu brutto w rodzinie z ostatnich trzech miesięcy .Średnia w przeliczeniu na jeden miesiąc, udokumentowane odpowiednimi orzeczeniami lub zaświadczeniami, stanowią:<br /><br />

<table class='items' width='100%' style='font-size: 9pt; border-collapse: collapse;' cellpadding='8'>
<thead>
<tr>
<td>Lp.</td>
<td>Źródło dochodu</td>
<td>Dochód brutto</td>
</tr>
</thead>
<tbody>

<tr>
<td>1.</td>
<td>Wynagrodzenia za pracę</td>
<td>$dochod_1</td>
</tr>

<tr>
<td>2.</td>
<td>Emerytury, renty inwalidzkie i rodzinne</td>
<td>$dochod_2</td>
</tr>

<tr>
<td>3.</td>
<td>Stałe zasiłki z pomocy społecznej</td>
<td>$dochod_3</td>
</tr>

<tr>
<td>4.</td>
<td>Dodatek mieszkaniowy</td>
<td>$dochod_4</td>
</tr>

<tr>
<td>5.</td>
<td>Alimenty i świadczenia z funduszu alimentacyjnego</td>
<td>$dochod_5</td>
</tr>

<tr>
<td>6.</td>
<td>Zasiłek dla bezrobotnych</td>
<td>$dochod_6</td>
</tr>

<tr>
<td>7.</td>
<td>Zasiłek rodzinny i pielęgnacyjny</td>
<td>$dochod_7</td>
</tr>

<tr>
<td>8.</td>
<td>Dochody z gospodarstwa rolnego</td>
<td>$dochod_8</td>
</tr>

<tr>
<td>9.</td>
<td>Dochody z prowadzenia działalności gospodarczej</td>
<td>$dochod_9</td>
</tr>

<tr>
<td>10.</td>
<td>$zrodlo_11</td>
<td>$dochod_11</td>
</tr>

</tbody>
</table>
<br />

Średni dochód miesięczny (brutto) na 1 osobę w rodzinie wynosi : $dochod_sredni
<br />

Oświadczam,	 że znana jest mi treść art. 247 §1 Kodeksu Karnego o	 odpowiedzialności karnej za podanie nieprawdziwych danych lub zatajenie prawdy.
<br /><br /><br />

................................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..................................................................<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Podpis wnioskodawcy &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Podpis rodziców lub opiekunów prawnych 

			
<p align='center'><b>III. Osiągnięcia i uzdolnienia wnioskodawcy</b></p><br />

Czy brałeś udział w konkursach, olimpiadach, wystawach, plenerach, prezentacjach, masz osiągnięcia sportowe, itp. (weź pod uwagę ostatnie dwa lata szkolne)?<br /><br />

<table class='items' width='100%' style='font-size: 9pt; border-collapse: collapse;' cellpadding='8'>
<thead>
<tr>
<td>Lp.</td>
<td>Osiągnięcie</td>
<td>Data</td>
<td>Zajęte miejsce</td>
<td>Informacje dodatkowe</td>
</tr>
</thead>
<tbody>

<tr>
<td>1.</td>
<td>$osiagniecie_1</td>
<td>$data_1</td>
<td>$miejsce_1</td>
<td>$informacje_1</td>
</tr>

<tr>
<td>2.</td>
<td>$osiagniecie_2</td>
<td>$data_2</td>
<td>$miejsce_2</td>
<td>$informacje_2</td>
</tr>

<tr>
<td>3.</td>
<td>$osiagniecie_3</td>
<td>$data_3</td>
<td>$miejsce_3</td>
<td>$informacje_3</td>
</tr>

<tr>
<td>4.</td>
<td>$osiagniecie_4</td>
<td>$data_4</td>
<td>$miejsce_4</td>
<td>$informacje_4</td>
</tr>

<tr>
<td>5.</td>
<td>$osiagniecie_5</td>
<td>$data_5</td>
<td>$miejsce_5</td>
<td>$informacje_5</td>
</tr>

</tbody>
</table>
<br /><br />

Dane zawarte w tej tabeli powinny być potwierdzone odpowiednimi dokumentami bądź oświadczeniami komisji konkursowych.
<br /><br /><br /><br />

Czy uczestniczysz w zajęciach wykraczających poza program szkolny? Jeśli tak, to jakie są to zajęcia i od kiedy w nich uczestniczysz?
<br /><br />
$zajecia_pozaszkolne
<br /><br />

Jakie są Twoje zainteresowania? Od jak dawna je rozwijasz?
<br /><br />
$zaintersowania
<br /><br />

Jakie są Twoje plany życiowe? 
<br /><br />
$plany
<br /><br />

Opisz swoją sytuację rodzinną
<br /><br />
$sytuacja_rodzinna
<br /><br />
<br />

Jeśli uważasz, że są osoby lub instytucje, których opinia mogłaby Ci pomóc w uzyskaniu pomocy materialnej ze strony Stowarzyszenia przedstaw odpowiednie dokumenty (opinie, zaświadczenia, oświadczenia itp.).
<br /><br />

Załączniki (wymień dołączone do wniosku załączniki)<br /><br />

<table class='items' width='100%' style='font-size: 9pt; border-collapse: collapse;' cellpadding='8'>
<thead>
<tr>
<td width='30px'>Lp.</td>
<td>Załącznik</td>
</tr>
</thead>
<tbody>

<tr>
<td>1.</td>
<td>$zalacznik_1</td>
</tr>

<tr>
<td>2.</td>
<td>$zalacznik_2</td>
</tr>

<tr>
<td>3.</td>
<td>$zalacznik_3</td>
</tr>

<tr>
<td>4.</td>
<td>$zalacznik_4</td>
</tr>

<tr>
<td>5.</td>
<td>$zalacznik_5</td>
</tr>

<tr>
<td>6.</td>
<td>$zalacznik_6</td>
</tr>

<tr>
<td>7.</td>
<td>$zalacznik_7</td>
</tr>

<tr>
<td>8.</td>
<td>$zalacznik_8</td>
</tr>

<tr>
<td>9.</td>
<td>$zalacznik_9</td>
</tr>

<tr>
<td>10.</td>
<td>$zalacznik_10</td>
</tr>

</tbody>
</table>

<br /><br />

Prawdziwość zawartych we wniosku danych potwierdzam własnoręcznym podpisem<br /><br />

................................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..................................................................<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(data, miejscowość) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (podpis wnioskodawcy/rodzica bądź opiekuna) 
			
<br /><br /><br />

Regulamin Stypendium Oświatowego im. Dezyderego Chłapowskiego znajduje się na stronie internetowej Stowarzyszenia: www.so.koscian.net.
<br /><br /><br />

Adnotacja o przyznaniu stypendium:<br />
..............................................................................................................................................................................................................................................................................................................................................................................................................................


</body>
</html>
";



$mpdf=new mPDF();
$mpdf->WriteHTML($html);
$mpdf->SetDisplayMode('fullpage');

$mpdf->Output();


?>

