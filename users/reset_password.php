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
<?php require_once 'init.php'; ?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/header.php'; ?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/navigation.php'; ?>





<?PHP
$adresat = $_POST['email'];;    // pod ten adres zostanie wysłana wiadomosc

$nowe = '$2y$12$FjPPrGRMBm7b9KOEsSqs0OvspuF2g6lgO670iZ9Zjtj4WAblP6fs6';

			// podłączamy plik  connection.php 
require "polaczenie.php"; 
// wywołujemy funkcję connection() 
connection(); 

//sprawdzenie czy email istnieje w bazie

$query = mysql_query("SELECT * FROM users WHERE email = '$adresat'");

if(mysql_num_rows($query) != 0)
{


mysql_query("SET NAMES 'utf8'");
$sql = "UPDATE users SET password='$nowe' WHERE email = '$adresat'" ;

mysql_query($sql);
echo "";

   //$adresat = $_POST['email'];;    // pod ten adres zostanie wysłana wiadomosc
   @$email = $_POST['email'];
   @$content = "Twoje nowe hasło to : Password123";
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






<!-- footer -->
<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
