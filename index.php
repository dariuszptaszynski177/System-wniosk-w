<?php

if(file_exists("install/index.php")){
	//perform redirect if installer files exist
	//this if{} block may be deleted once installed
	header("Location: install/index.php");
}

require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
if(isset($user) && $user->isLoggedIn()){
}
?>

<div id="page-wrapper">
<div class="container">
<div class="row">
	<div class="col-xs-12">

		<div class="jumbotron">
			<h2>Zaloguj lub zarejstruj się, aby wygenerować swój wniosek!!!</h2>
			<!--<p class="text-muted">An Open Source PHP User Management Framework. </p>-->
			<p>
			<?php if($user->isLoggedIn()){$uid = $user->data()->id;?>
				<!--<a class="btn btn-default" href="users/account.php" role="button">User Account &raquo;</a>-->
				
				<?php header("Location: index2.php"); ?>
				
			<?php }else{?>
				<a class="btn btn-warning" href="users/login.php" role="button">Zaloguj się &raquo;</a>
				<a class="btn btn-info" href="users/join.php" role="button">Zarejestruj się &raquo;</a>
			<?php } ?>
			</p>
		</div>
	</div>
</div>
<div class="row">
<?php
// To generate a sample notification, uncomment the code below.
// It will do a notification everytime you refresh index.php.
// $msg = 'This is a sample notification! <a href="'.$us_url_root.'users/logout.php">Go to Logout Page</a>';
// $notifications->addNotification($msg, $user->data()->id);
 ?>


</div> <!-- /container -->

</div> <!-- /#page-wrapper -->

<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
