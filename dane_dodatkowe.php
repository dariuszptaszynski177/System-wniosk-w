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

 
 
 <!-- Zliczanie znaków -->

 <script type="text/javascript">
function counter( string ) {
  var maxLength = 800;
  var oSpan = document.getElementById( 'counter' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oText' ).disabled=true;
}
</script>


<script type="text/javascript">
function counterr( string ) {
  var maxLength = 800;
  var oSpan = document.getElementById( 'counterr' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oTextt' ).disabled=true;
}
</script>


<script type="text/javascript">
function counterrr( string ) {
  var maxLength = 800;
  var oSpan = document.getElementById( 'counterrr' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oTexttt' ).disabled=true;
}
</script>


<script type="text/javascript">
function counterrrr( string ) {
  var maxLength = 800;
  var oSpan = document.getElementById( 'counterrrr' );
  oSpan.innerHTML = 'Pozostało ci znaków '+ (maxLength - ( string.length ) ) +'/' + maxLength;
  if( maxLength - ( string.length ) == -1 )
    document.getElementById( 'oTextttt' ).disabled=true;
}
</script>
 
 <!--koniec Zliczanie znaków -->
 

<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-sm-12">
				<!--<h1 class="page-header" align="center">Wypełnij dane</h1>-->
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
	
	
		<?//=echousername($user->data()->id)?>
		<?php  
		$jakie_konto=echousername($user->data()->id);
		
		//dane wniosku określonego
		$dane_wniosku = $_REQUEST['dane_wniosku'];
		echo $dane_wniosku;
		
		
		//data do kiedy można złżyć wniosek
		include "data_wniosku.inc";
		
		//sprawdzanie czy wniosek jest potwierdzony
		include "potwierdzenie.inc";
		echo $potwierdzenie;
		
		?>
		
		
		<?php
		
		$zapytanie = $db -> query("SELECT * FROM dane_dodatkowe WHERE konto='$jakie_konto' AND dane_wniosku='$dane_wniosku'");
				
				$licz=0;
				foreach($db->results() as $record)
				{
				$licz++;
				}
				
				if($licz==0)
				{
				include("dane_dodatkowe_insert.inc");
				//echo $licz;
				}
				else
				{
				include("dane_dodatkowe_update.inc");
				//echo $licz;
				}

		?>
		
		

					
					
				<!-- Content Ends Here -->
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div> <!-- /.wrapper -->
</html>

<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>