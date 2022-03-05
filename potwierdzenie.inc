<?php

 

/* zapytanie do konkretnej tabeli */
				$potwierdzenie_zapytanie = $db->query("SELECT * FROM dane_potwierdzenie WHERE konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");


	foreach($db->results() as $dane_potwierdzenie)
	{
	$potwierdzenie_stan=$dane_potwierdzenie->potwierdzenie;
	}


if($potwierdzenie_stan=='tak')
{
$potwierdzenie='disabled';
}


?>