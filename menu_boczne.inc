<?php


		/* zapytanie do konkretnej tabeli */
		$zapytanie_zakladki = $db -> query("SELECT * FROM sprawdzanie where konto='$jakie_konto' AND wniosek='$dane_wniosku'");
		
		foreach($db -> results() as $record)
		{
				$record->zakladka;
				$record->stan;
				
				$zakladka=$record->zakladka;
				$stan=$record->stan;
		

				 if($zakladka=="dane_podstawowe")
				 {
				 $zakladka_tab[1]=$zakladka;
				 $stan_tab[1]=$stan;
				 }
				 
				 if($zakladka=="dane_szkola")
				 {
				 $zakladka_tab[2]=$zakladka;
				 $stan_tab[2]=$stan;
				 }
				 
				 if($zakladka=="dane_rodzina")
				 {
				 $zakladka_tab[3]=$zakladka;
				 $stan_tab[3]=$stan;
				 }
				 
				 if($zakladka=="dane_dochody")
				 {
				 $zakladka_tab[4]=$zakladka;
				 $stan_tab[4]=$stan;
				 }
				 
				 if($zakladka=="dane_osiagniecia")
				 {
				 $zakladka_tab[5]=$zakladka;
				 $stan_tab[5]=$stan;
				 }
				 
				 if($zakladka=="dane_dodatkowe")
				 {
				 $zakladka_tab[6]=$zakladka;
				 $stan_tab[6]=$stan;
				 }
				 
				 if($zakladka=="dane_zalaczniki")
				 {
				 $zakladka_tab[7]=$zakladka;
				 $stan_tab[7]=$stan;
				 }
				 
		}
		 
    if($nazwa_zakladki=='dane_podstawowe')
		{
    $dane_podstawowe_bold="font-weight:bold; color:black;";
		}
		if($nazwa_zakladki=='dane_szkola')
		{
    $dane_szkola_bold="font-weight:bold; color:black;";
		}
		if($nazwa_zakladki=='dane_rodzina')
		{
    $dane_rodzina_bold="font-weight:bold; color:black;";
		}
		if($nazwa_zakladki=='dane_dochody')
		{
    $dane_dochody_bold="font-weight:bold; color:black;";
		}
		if($nazwa_zakladki=='dane_osiagniecia')
		{
    $dane_osiagniecia_bold="font-weight:bold; color:black;";
		}
		if($nazwa_zakladki=='dane_dodatkowe')
		{
    $dane_dodatkowe_bold="font-weight:bold; color:black;";
		}
		if($nazwa_zakladki=='dane_zalaczniki')
		{
    $dane_zalaczniki_bold="font-weight:bold; color:black;";
		}
		if($nazwa_zakladki=='potwierdzenie')
		{
    $dane_potwierdzenie_bold="font-weight:bold; color:black;";
		}
		if($nazwa_zakladki=='generowanie')
		{
    $dane_generowanie_bold="font-weight:bold; color:black;";
		}


if($zakladka_tab[1]=="dane_podstawowe" && $stan_tab[1]=="tak")
{
echo "<img src='check.png' width='13px'/> <a href='dane_podstawowe.php?dane_wniosku=$dane_wniosku' style='$dane_podstawowe_bold'>Dane postawowe</a><br />";
}
else
{
echo "<img src='uncheck.png' width='13px'/> <a href='dane_podstawowe.php?dane_wniosku=$dane_wniosku' style='$dane_podstawowe_bold'>Dane postawowe</a><br />";
}


if($zakladka_tab[2]=="dane_szkola" && $stan_tab[2]=="tak")
{
echo "<img src='check.png' width='13px'/> <a href='dane_szkola.php?dane_wniosku=$dane_wniosku' style='$dane_szkola_bold'>Dane o szkole</a><br />";
}
else
{
echo "<img src='uncheck.png' width='13px'/> <a href='dane_szkola.php?dane_wniosku=$dane_wniosku' style='$dane_szkola_bold'>Dane o szkole</a><br />";
}


if($zakladka_tab[3]=="dane_rodzina" && $stan_tab[3]=="tak")
{
echo "<img src='check.png' width='13px'/> <a href='dane_rodzina.php?dane_wniosku=$dane_wniosku' style='$dane_rodzina_bold'>Dane o rodzinie</a><br />";
}
else
{
echo "<img src='uncheck.png' width='13px'/> <a href='dane_rodzina.php?dane_wniosku=$dane_wniosku' style='$dane_rodzina_bold'>Dane o rodzinie</a><br />";
}


if($zakladka_tab[4]=="dane_dochody" && $stan_tab[4]=="tak")
{
echo "<img src='check.png' width='13px'/> <a href='dane_dochody.php?dane_wniosku=$dane_wniosku' style='$dane_dochody_bold'>Dane o dochodach</a><br />";
}
else
{
echo "<img src='uncheck.png' width='13px'/> <a href='dane_dochody.php?dane_wniosku=$dane_wniosku' style='$dane_dochody_bold'>Dane o dochodach</a><br />";
}


if($zakladka_tab[5]=="dane_osiagniecia" && $stan_tab[5]=="tak")
{
echo "<img src='check.png' width='13px'/> <a href='dane_osiagniecia.php?dane_wniosku=$dane_wniosku' style='$dane_osiagniecia_bold'>Dane o osiągnięciach</a><br />";
}
else
{
echo "<img src='uncheck.png' width='13px'/> <a href='dane_osiagniecia.php?dane_wniosku=$dane_wniosku' style='$dane_osiagniecia_bold'>Dane o osiągnięciach</a><br />";
}


if($zakladka_tab[6]=="dane_dodatkowe" && $stan_tab[6]=="tak")
{
echo "<img src='check.png' width='13px'/> <a href='dane_dodatkowe.php?dane_wniosku=$dane_wniosku' style='$dane_dodatkowe_bold'>Dane dodatkowe</a><br />";
}
else
{
echo "<img src='uncheck.png' width='13px'/> <a href='dane_dodatkowe.php?dane_wniosku=$dane_wniosku' style='$dane_dodatkowe_bold'>Dane dodatkowe</a><br />";
}


if($zakladka_tab[7]=="dane_zalaczniki" && $stan_tab[7]=="tak")
{
echo "<img src='check.png' width='13px'/> <a href='dane_zalaczniki.php?dane_wniosku=$dane_wniosku' style='$dane_zalaczniki_bold'>Załączniki</a><br />";
}
else
{
echo "<img src='uncheck.png' width='13px'/> <a href='dane_zalaczniki.php?dane_wniosku=$dane_wniosku' style='$dane_zalaczniki_bold'>Załączniki</a><br />";
}

echo "<br />";
echo "<a href='dane_potwierdzenie.php?dane_wniosku=$dane_wniosku' style='$dane_potwierdzenie_bold'>Potwierdzenie danych</a><br />";

echo "<a href='dane_generuj.php?dane_wniosku=$dane_wniosku' style='$dane_generowanie_bold'>Generowanie wniosku</a><br />";

?>

  