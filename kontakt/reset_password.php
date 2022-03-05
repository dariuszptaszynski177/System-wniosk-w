<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  
}

ul li {
  float: right;
	margin-left:10px;
	margin-right:10px;
	margin-top:15px;
  font-size: 16px;
}

li a {
  display: block;
  color: #9d9d9d;
  text-align: center;
  padding: 0px 0px;
  text-decoration: none;
}

a:hover
{
color:white;
text-decoration: none;
}



</style>




</head>
<body style="background-color:#101010">

<div style="background-color:#101010;height:60px;margin-right:50px">

<div class="col-xs-4">
<a href="../index.php"><img src="../users/images/logo.png" alt="logo" style="margin-left:100px;"/></a>
</div>

<div class="col-xs-8"> 

<ul>
<li><a href="../users/join.php" class="fa fa-plus-square"> Rejestracja</a></li>
<li><a href="../users/login.php" class="fa fa-sign-in"> Logowanie</a></li>
<li><a href="../index.php" class="fa fa-home"> Home</a></li>
</ul>

</div>


</div>

<div class="row" style="background-color:white;">
<div class="col-xs-12" style="margin-left:30px;">


<?PHP
$adresat = $_POST['email'];;    // pod ten adres zostanie wysłana wiadomosc

$nowe = '$2y$12$FjPPrGRMBm7b9KOEsSqs0OvspuF2g6lgO670iZ9Zjtj4WAblP6fs6';

			// podłączamy plik  connection.php 
require "../polaczenie.php"; 
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
      echo "<br /><h2 align='center'>Nowe hasło do Twojego konta zostało wysłane <br />na adres e-mail $adresat</h2>";
   else
      echo '<p><b>NIE</b> wysłano maila!</p>';


}


else
{
echo "<br /><h2 align='center'>Podany e-mail nie istnieje w bazie</h2>";
}


?>

</div><!-- /.col -->
</div><!-- /.row -->



</body>
</html>