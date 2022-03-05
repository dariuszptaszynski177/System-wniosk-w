<?php
header('Content-type: text/html; charset=utf-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
			
			<?php if($user->isLoggedIn()){$uid = $user->data()->id;?>
				<!--<a class="btn btn-default" href="users/account.php" role="button">User Account &raquo;</a>-->
				
				<?php header("Location: index2.php"); ?>
				
			<?php }else{?>
				
				<?php
					
					
					require 'PHPMailer/src/Exception.php';
					require 'PHPMailer/src/PHPMailer.php';
					require 'PHPMailer/src/SMTP.php';
					
					
					$email = $_POST['email'];
					
					
					
					date_default_timezone_set('Europe/Warsaw');

					$mail = new PHPMailer(true);


$mail->IsSMTP();
$mail->CharSet="UTF-8";
$mail->Host = "smtp.cal.pl"; /* Zależne od hostingu poczty*/
$mail->SMTPDebug = 0;
$mail->Port = 587 ; /* Zależne od hostingu poczty, czasem 587 */
$mail->SMTPSecure = ''; /* Jeżeli ma być aktywne szyfrowanie SSL */
$mail->SMTPAuth = true;
$mail->IsHTML(true);
$mail->Username = "dariuszptaszynski@dariuszptaszynski.pl"; /* login do skrzynki email często adres*/
$mail->Password = "Mazda177"; /* Hasło do poczty */
$mail->setFrom('dariuszptaszynski@dariuszptaszynski.pl', 'Dariusz Ptaszyński'); /* adres e-mail i nazwa nadawcy */
//$mail->AddAddress("dariusz_ptaszynski@onet.pl"); /* adres lub adresy odbiorców */
$mail->AddAddress("{$email}");





$mail->Subject = "Testowa wiadomość SMTP"; /* Tytuł wiadomości */
$mail->Body = "Witaj, Jeżeli to czytasz, to znaczy, że udało się poprawnie wysłać e-maila za pomocą SMTP!";

if(!$mail->Send()) {
echo "Błąd wysyłania e-maila: " . $mail->ErrorInfo;
} else {
echo "Wiadomość została wysłana!";


}
				?>

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
