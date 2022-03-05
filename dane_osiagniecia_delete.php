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
		$jakie_konto=echousername($user->data()->id);
		
		$id_osiagniecia=$_REQUEST['id'];
		
		$dane_wniosku = $_REQUEST['dane_wniosku'];
		echo $dane_wniosku;

		?>

<h2>Czy napewno chcesz usunąć te dane?</h2>
		<form method="post">
		
		<input type="submit" name="tak" Value="TAK" style="background-color: #28a745; border-color: #28a745;">
		<input type="submit" name="nie" Value="NIE" style="background-color: #bd2130; border-color: #b21f2d;">
		<br /><br />
		</form>
		
		
		<?php
		
		if(isset($_POST['tak']))
		{
				$dane_rodzina_delete = $db-> query("DELETE FROM dane_osiagniecia where id='$id_osiagniecia'");
				
				if($dane_rodzina_delete==true)
				{
				
				$komunikat="Dane zostały usunięte";
				
				usleep(1000000);
				header("Location: dane_osiagniecia.php?dane_wniosku=$dane_wniosku&komunikat=$komunikat#twoje_osiagniecia");
				}
		}
		
		if(isset($_POST['nie']))
		{
				$komunikat="Dane NIE zostały usunięte";
		
				usleep(1000000);
				header("Location: dane_osiagniecia.php?dane_wniosku=$dane_wniosku&komunikat=$komunikat#twoje_osiagniecia");
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
