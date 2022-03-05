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
 <link rel="stylesheet" href="style.css" type="text/css">
 
 <!-- Zliczanie znaków -->

 <script type="text/javascript">
function counter( string ) {
  var maxLength = 500;
  var oSpan = document.getElementById( 'counter' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oText' ).disabled=true;
}
</script>


<script type="text/javascript">
function counterr( string ) {
  var maxLength = 500;
  var oSpan = document.getElementById( 'counterr' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oTextt' ).disabled=true;
}
</script>


<script type="text/javascript">
function counterrr( string ) {
  var maxLength = 500;
  var oSpan = document.getElementById( 'counterrr' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oTexttt' ).disabled=true;
}
</script>


<script type="text/javascript">
function counterrrr( string ) {
  var maxLength = 500;
  var oSpan = document.getElementById( 'counterrrr' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oTextttt' ).disabled=true;
}
</script>
 
 <!--koniec Zliczanie znaków -->
 
 
 <!-- walidacja znaków w textarea -->
 
 <!-- ta walidacja nie pozwala wpisać niedozwolnych znaków -->
 
 <script>
function clean(el){
	var textfield = document.getElementById(el);
	//var regex = /[^a-z 0-9?!.,]/gi;
	var regex = /[^a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ., ]/gi;
	//^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]+$
	if(textfield.value.search(regex) > -1) {
		textfield.value = textfield.value.replace(regex, "");
        }
}
</script>

 <!-- koniec walidacja znaków w textarea -->
 
 
</head>
<body>
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-sm-12">
				<h1 class="page-header">
					
					
				</h1>
				<!-- Content goes here -->
				
					<?php
		if($settings->twofa == 1){
		$twoQ = $db->query("select twoKey from users where id = ? and twoEnabled = 0", [$userdetails->id]);
		if($twoQ->count() > 0){ ?>
			<p><a class="btn btn-primary " href="enable2fa.php" role="button">Manage 2 Factor Auth</a></p>
	<?php	} else { ?>
			<p><a class="btn btn-primary " href="disable2fa.php" role="button">Manage 2 Factor Auth</a></p>
	<?php }}
	if(isset($_SESSION['cloak_to'])){ ?>
		<form class="" action="account.php" method="post">
			<input type="submit" name="uncloak" value="Uncloak!" class='btn btn-danger'>
		</form><br>
		<?php }
		?>
	</div>
	
		<?//=echousername($user->data()->id)?>
		<?php  
		$zapytanie=echousername($user->data()->id);
		//echo $konto;
		$konto1=echousername($user->data()->id);
		
		
		//data do kiedy można złżyć wniosek
		
		$jakie_konto=echousername($user->data()->id);
		include "data_wniosku.inc";
		
		
		?>
		
		
		
		<div id="formularz">
			
			<h1 class="page-header" align="center">Odpowiedz na pytania dodatkowe</h1>

					
<form action="dane_zalaczniki.php" method="post">

<div style="display:none;">
<b>Twój login</b>
<input type="text" name="konto" value="<?php echo $konto1;?>" readonly>

<input type="text" name="insert_update" value="insert">
</div>

<?php
$nazwa;
?>
<br />

<?php

//data złożenia wniosku
if($disabled=='disabled')
echo "<div style='display:none'>";		//zamknąć tego diva jeszcze

?>

<b>Pola obowiązkowe są oznaczone </b><span id="star">*</span>


<h2>Pytania dodatkowe</h2>


Czy uczestniczysz w zajęciach wykraczających poza program szkolny? Jeśli tak, to jakie są to zajęcia i od kiedy w nich uczestniczysz?<span id="star">*</span><br />

<textarea onkeyup="counter(this.value);clean('pytanie1');" onkeydown="clean('pytanie1')" id="pytanie1" rows="6" cols="70" placeholder="Czy uczestniczysz w zajęciach wykraczających poza program szkolny? Jeśli tak, to jakie są to zajęcia i od kiedy w nich uczestniczysz?" name="zajecia_pozaszkolne" maxlength="500"  onkeydown="clean('ta')" <?php echo $disabled ?> required></textarea>
<span id="counter">Pozostało ci znaków 500/500</span><br />

<br /><br />
Jakie są Twoje zainteresowania? Od jak dawna je rozwijasz?<span id="star">*</span><br />
<textarea onkeyup="counterr(this.value);clean('pytanie2');" onkeydown="clean('pytanie2')" id="pytanie2" rows="6" cols="70" placeholder="Jakie są Twoje zainteresowania? Od jak dawna je rozwijasz?" name="zaintersowania" maxlength="500" <?php echo $disabled ?> required></textarea>
<span id="counterr">Pozostało ci znaków 500/500</span><br />

<br /><br />

Jakie są Twoje plany życiowe?<span id="star">*</span> <br />
<textarea onkeyup="counterrr(this.value);clean('pytanie3');" onkeydown="clean('pytanie3')" id="pytanie3" rows="6" cols="70" placeholder="Jakie są Twoje plany życiowe? " name="plany" maxlength="500" <?php echo $disabled ?> required></textarea>
<span id="counterrr">Pozostało ci znaków 500/500</span><br />

<br /><br />


Opisz swoją sytuację rodzinną<span id="star">*</span><br />
<textarea onkeyup="counterrrr(this.value);clean('pytanie4');" onkeydown="clean('pytanie4')" id="pytanie4" rows="6" cols="70" placeholder="Opisz swoją sytuację rodzinną" name="sytuacja_rodzinna" maxlength="500" <?php echo $disabled ?> required></textarea>
<span id="counterrrr">Pozostało ci znaków 500/500</span><br />
<br /><br />

<input style=" background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;" type="button" onclick="window.location.href = 'dane_osiagniecia.php';" value="Cofnij">&nbsp;&nbsp;
<input type="submit" onclick='check(oText);check2(oTextt);check3(oTexttt);check4(oTextttt);' value="Dalej">

</form>




<?php

echo "</div>";		//zamknięcie diva od terminu

?>

</div>


<div id="formularz">
<?php
if($potwierdzenie=='disabled' || $disabled=='disabled')
{
echo "<br /><br />";
echo "<a style=' background-color: #4CAF50; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_osiagniecia.php'>Cofnij</a>";

echo "&nbsp;&nbsp;";

echo "<a style=' background-color: #4CAF50; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;' href='dane_zalaczniki.php'>Dalej</a>";
}
?>
</div>

					
					
				<!-- Content Ends Here -->
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div> <!-- /.wrapper -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>

</body>
</html>
