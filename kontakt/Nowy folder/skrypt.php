<?PHP
$adresat = $_POST['email'];;    // pod ten adres zostanie wysłana wiadomosc

$nowe = 'new_password';

			// podłączamy plik  connection.php 
require "polaczenie.php"; 
// wywołujemy funkcję connection() 
connection(); 

//sprawdzenie czy email istnieje w bazie

$query = mysql_query("SELECT * FROM test WHERE email = '$adresat'");

if(mysql_num_rows($query) != 0)
{


mysql_query("SET NAMES 'utf8'");
$sql = "UPDATE test SET nazwa='$nowe' WHERE email = '$adresat'" ;

mysql_query($sql);
echo "";

   //$adresat = $_POST['email'];;    // pod ten adres zostanie wysłana wiadomosc
   @$email = $_POST['email'];
   @$content = "Twoje nowe hasło to : $nowe";
   $header =    "From: Nowe&nbsp;hasło@serwer.pl \nContent-Type:".
         ' text/plain;charset="utf-8"'.
         "\nContent-Transfer-Encoding: 8bit";
   if (mail($adresat, 'Resetowanie hasła', $content, $header))
      echo '<p></p>';
   else
      echo '<p><b>NIE</b> wysłano maila!</p>';


}


else
{
echo "Email nie ostnieje w bazie";
}


			
			
			
			

?>