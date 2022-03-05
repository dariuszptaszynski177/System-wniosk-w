<?php
mysql_query("SET CHARSET utf8");
mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM dane")
or die('B³±d zapytania');


/*wy¶wietlamy wyniki, sprawdzamy,
czy zapytanie zwróci³o warto¶æ wiêksz± od 0
*/

if(mysql_num_rows($wynik) > 0) {
    //je¿eli wynik jest pozytywny, to wy¶wietlamy dane 
    echo "<table  border=1 style=border-collapse: collapse>";
    while($r = mysql_fetch_assoc($wynik)) {
		
		
		echo "</tr>";
		echo "<td title=imie>".$r['id']."</td>";
		echo "<td title=imie>".$r['konto']."</td>";
		echo "<td title=imie>".$r['imie']."</td>";
		echo "<td title=imie>".$r['nazwisko']."</td>";
		echo "<td title=imie>".$r['data_u']."</td>";
		echo "<td title=imie>".$r['miejsce_u']."</td>";
		echo "<td title=imie>".$r['pesel']."</td>";
		echo "<td title=imie>".$r['powiat']."</td>";
		echo "<td title=imie>".$r['gmina']."</td>";
		echo "<td title=imie>".$r['ulica']."</td>";
		echo "<td title=imie>".$r['nr_domu']."</td>";
		echo "<td title=imie>".$r['nr_lokalu']."</td>";
		echo "<td title=imie>".$r['miejscowosc']."</td>";
		echo "<td title=imie>".$r['kod']."</td>";
		echo "<td title=imie>".$r['poczta']."</td>";
		echo "<td title=imie>".$r['nr_opiekuna']."</td>";
		echo "<td title=imie>".$r['nr_komorkowy']."</td>";
		echo "<td title=imie>".$r['email']."</td>";
		echo "<td title=imie>".$r['nazwa_szkoly']."</td>";
		echo "<td title=imie>".$r['adres_szkoly']."</td>";
		echo "<td title=imie>".$r['klasa']."</td>";
		echo "<td title=imie>".$r['srednia_poprzednia']."</td>";
		echo "<td title=imie>".$r['srednia_biezaca']."</td>";
		
		
		
		
		
		 echo "</tr>";
    }
    echo "</table>";
		
		?>