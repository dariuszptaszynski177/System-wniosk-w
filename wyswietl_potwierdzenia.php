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
		
		?>
		
		<?php
		
		$aktualny_rok = date("Y");
		$potwierdzenia = $db -> query("SELECT * FROM dane_podstawowe as d1 LEFT JOIN  dane_potwierdzenie  as d2 ON d1.dane_wniosku=d2.dane_wniosku WHERE d1.dane_wniosku LIKE '%$aktualny_rok%'");

		echo "<table border=1>";
			echo "<tr>";
				echo "<th>Id</th>";
				echo "<th>Imię</th>";
				echo "<th>Nazwisko</th>";
				echo "<th>Konto</th>";
				echo "<th>E-mail</th>";
				echo "<th>Dane_wniosku</th>";
				echo "<th>Akcja</th>";
			echo "</tr>";
		foreach($db->results() as $potwierdzenia)
		{
			if($potwierdzenia->dane_wniosku!='')
			{
			echo "<tr>";
				$id_potwierdzenia = $potwierdzenia->id;
				echo "<td>".$potwierdzenia->id."</td>";
				echo "<td>".$potwierdzenia->imie."</td>";
				echo "<td>".$potwierdzenia->nazwisko."</td>";
				echo "<td>".$potwierdzenia->konto."</td>";
				echo "<td>".$potwierdzenia->email."</td>";
				echo "<td>".$potwierdzenia->dane_wniosku."</td>";
				echo "<td>".$potwierdzenia->potwierdzenie."</td>";
				echo "<td class='btn_confirm'><a href='javascript:del($potwierdzenia->id)'>Usuń</a></td>";
				
			echo "</tr>";
			}
		}
		echo "</table>";
		
		?>
		<div class="confirm">
			<div class="confirm-box">
				<button class="yes">Tak</button>
				<button class="no">Nie</button>

				<span class="close">Close</span>
			</div>
		</div>
		

		<style>
			.confirm
			{
				width: 100%;
				height: 100%;
				display:none;
				position: absolute;
				left: 0px;
				top: 0px;

				
			}

			.confirm-center
			{
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.confirm-box
			{
				width: 200px;
				height: 100px;
				background-color: lightgray;
				position: relative;
			}

			.close
			{
				position: absolute;
				top: 0px;
				right: 0px;
			}
		</style>
		
		<script>
			let confirm = document.querySelector('.confirm');
			let btn_confirm = document.querySelector('.btn_confirm');

			let yes = document.querySelector('.yes');
			let no = document.querySelector('.no');

			let close = document.querySelector('.close');
			

			function del(id)
			{
				confirm.classList.add('confirm-center');
				//console.log(id);

				yes.addEventListener('click', function(){
					location.href="wyswietl_potwierdzenia_delete.php?id_potwierdzenia="+id
				})

				no.addEventListener('click', function(){
					confirm.classList.remove('confirm-center');
				})


				close.addEventListener('click', function(){
					confirm.classList.remove('confirm-center');
				})

				// btn_confirm.addEventListener('click', function(){
					// confirm1.style.display = 'inline-block';
					// confirm2.style.display = 'inline-block';
				// })
			}
		</script>

					
					
				<!-- Content Ends Here -->
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div> <!-- /.wrapper -->
</html>

<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
