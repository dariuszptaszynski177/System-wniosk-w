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
 

 
 <style>
 th
 {
 background-color:lightgreen;
 padding: 5px;
 }
 table
 {
 margin-left:auto;
 margin-right:auto;
 }

 input[type="submit"]
 {
     background-color: lightblue;
     border-radius: 10px;
     color: black;
 }
 </style>
 
</head>
<body>
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-sm-12">
				
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
		</form>
		<?php }
		?>
	</div>
	
		<?//=echousername($user->data()->id)?>
		<?php  
		//$konto=echousername($user->data()->id);
		//echo $konto;

		$rok_wnioskow=$_REQUEST['rok'];
		//echo $rok_wnioskow;
		?>
		<h1 align="center">Statusy stypedystów (<?php echo $rok_wnioskow; ?>)</h1>

		<!-- <form method="post">
            <input type="submit" name="sync" value="Synchronizuj statusy">
        </form> -->

        <?php
            // if(isset($_POST['sync']))
            // {
				
                $stypendysci = $db -> query("SELECT * FROM dane_podstawowe WHERE dane_wniosku LIKE '%$rok_wnioskow%'");

                

                foreach($db->results() as $stypendysta)
                {
                    $konto_stypendysty=$stypendysta->konto;
                    $dane_wniosku = $stypendysta->dane_wniosku;
                    $status='';
                    $i=0;

                    $status_stypendysty = $db -> query("SELECT * FROM statusy_stypendystow WHERE konto='$konto_stypendysty' AND dane_wniosku LIKE '%$rok_wnioskow%'");

                    foreach($db->results() as $status)
                    {
                        $i++;
                    }

                    if($i==0)
                    {
                    $wstaw_statusy = $db -> query("INSERT INTO statusy_stypendystow (konto, status, dane_wniosku) VALUES ('$konto_stypendysty', '$status', '$dane_wniosku')");
                    
                    }
                }
            // }
        ?>
		
		
		<?php
		

    $statusy_array = ['roczny', 'pomostowy', 'nagroda', 'nie_spelnia'];
    
   



/* zapytanie do konkretnej tabeli */
$dane_stypendystow = $db -> query("SELECT * FROM `dane_podstawowe` t1 INNER JOIN `dane_potwierdzenie` t2 on t1.dane_wniosku=t2.dane_wniosku WHERE t2.dane_wniosku LIKE '%$rok_wnioskow%' GROUP BY t1.konto");


echo "<table border=1>";
echo "<tr>";
echo "<th>Imię</th>";
echo "<th>Nazwisko</th>";
echo "<th>Status</th>";
echo "<th>Aktualizuj</th>";
echo "</tr>";
            foreach($db->results() as $stypendysta)
            //foreach($conn->query($status_user) as $status)
            {
				$statusy_stypendystow = $db -> query("SELECT * FROM statusy_stypendystow WHERE dane_wniosku LIKE '%$rok_wnioskow%'");
                foreach($db->results() as $status_stypendysty)
                //foreach($conn->query($items) as $item)
                {
                    if(($stypendysta->konto)==($status_stypendysty->konto))
                    {
                        if(($status_stypendysty->status)==$statusy_array[0])
                        {
                        echo "<form method='post'>";
                        
                        
                        echo "<tr>";
						echo "<td>".$stypendysta->imie."</td>";
						echo "<td>".$stypendysta->nazwisko."</td>";
						$konto=$stypendysta->konto;
						
                        
                        echo "<td>";
                        echo "<select name='wybrany_status'>";
                        echo "<option value='nic'>Wybierz</option>";
                        echo "<option value='$statusy_array[0].$konto' selected>Roczny</option>";
                        echo "<option value='$statusy_array[1].$konto'>Pomostowy</option>";
                        echo "<option value='$statusy_array[2].$konto'>Nagroda</option>";
                        echo "<option value='$statusy_array[3].$konto'>Nie spełnia</option>";
                        echo "</select>";
                        echo "</td>";
                        echo "<td>";
                        echo "<input type='submit' name='submit' value='Zmień status'>";
                        
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                        }
                        elseif(($status_stypendysty->status)==$statusy_array[1])
                        {
                            echo "<form method='post'>";
                            // echo "<table border=1>";
                            echo "<tr>";
                            echo "<td>".$stypendysta->imie."</td>";
                            echo "<td>".$stypendysta->nazwisko."</td>";
                            $konto=$stypendysta->konto;
                            
                            
                            echo "<td>";
                            echo "<select name='wybrany_status'>";
                            echo "<option value='nic'>Wybierz</option>";
                            echo "<option value='$statusy_array[0].$konto'>Roczny</option>";
                            echo "<option value='$statusy_array[1].$konto' selected>Pomostowy</option>";
                            echo "<option value='$statusy_array[2].$konto'>Nagroda</option>";
                            echo "<option value='$statusy_array[3].$konto'>Nie spełnia</option>";
                            echo "</select>";
                            echo "</td>";
                            echo "<td>";
                            echo "<input type='submit' name='submit' value='Zmień status'>";
                            
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        elseif(($status_stypendysty->status)==$statusy_array[2])
                        {
                            echo "<form method='post'>";
                            // echo "<table border=1>";
                            echo "<tr>";
                            echo "<td>".$stypendysta->imie."</td>";
                            echo "<td>".$stypendysta->nazwisko."</td>";
                            $konto=$stypendysta->konto;
                            
                            
                            echo "<td>";
                            echo "<select name='wybrany_status'>";
                            echo "<option value='nic'>Wybierz</option>";
                            echo "<option value='$statusy_array[0].$konto'>Roczny</option>";
                            echo "<option value='$statusy_array[1].$konto'>Pomostowy</option>";
                            echo "<option value='$statusy_array[2].$konto' selected>Nagroda</option>";
                            echo "<option value='$statusy_array[3].$konto'>Nie spełnia</option>";
                            echo "</select>";
                            echo "</td>";
                            echo "<td>";
                            echo "<input type='submit' name='submit' value='Zmień status'>";
                            
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        elseif(($status_stypendysty->status)==$statusy_array[3])
                        {
                            echo "<form method='post'>";
                            // echo "<table border=1>";
                            echo "<tr>";
                            echo "<td>".$stypendysta->imie."</td>";
                            echo "<td>".$stypendysta->nazwisko."</td>";
                            $konto=$stypendysta->konto;
                            
                            
                            echo "<td>";
                            echo "<select name='wybrany_status'>";
                            echo "<option value='nic'>Wybierz</option>";
                            echo "<option value='$statusy_array[0].$konto'>Roczny</option>";
                            echo "<option value='$statusy_array[1].$konto'>Pomostowy</option>";
                            echo "<option value='$statusy_array[2].$konto'>Nagroda</option>";
                            echo "<option value='$statusy_array[3].$konto' selected>Nie spełnia</option>";
                            echo "</select>";
                            echo "</td>";
                            echo "<td>";
                            echo "<input type='submit' name='submit' value='Zmień status'>";
                            
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        else 
                        {
                            echo "<form method='post'>";
                            // echo "<table border=1>";
                            echo "<tr>";
                            echo "<td>".$stypendysta->imie."</td>";
                            echo "<td>".$stypendysta->nazwisko."</td>";
                            $konto=$stypendysta->konto;
                            
                            
                            echo "<td>";
                            echo "<select name='wybrany_status'>";
                            echo "<option value='nic'>Wybierz</option>";
                            echo "<option value='$statusy_array[0].$konto'>Roczny</option>";
                            echo "<option value='$statusy_array[1].$konto'>Pomostowy</option>";
                            echo "<option value='$statusy_array[2].$konto'>Nagroda</option>";
                            echo "<option value='$statusy_array[3].$konto'>Nie spełnia</option>";
                            echo "</select>";
                            echo "</td>";
                            echo "<td>";
                            echo "<input type='submit' name='submit' value='Zmień status'>";
                            
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        


                    }
                    else
                    {
                        // if($status['status']==)
                        // {
                        // echo "<form method='post'>";
                        // echo $item['name'];
                        // $name=$item['name'];
                        // $id=$item['id'];
                        // echo $id;

                        // echo "<select name='lista' class='lista'>";
                        // echo "<option value='nic'>Wybierz</option>";
                        // echo "<option value='status1.$name'>status 1</option>";
                        // echo "<option value='status2.$name'>status 2</option>";
                        // echo "</select>";
                        // echo "<input type='submit' name='submit'>";
                        // echo "<br />";
                        // echo "</form>";
                        // }
                    }
                }
            }
            echo "</table>";

?>


<?php

if(isset($_POST['submit']))
        {
            $wybrany_status = $_POST['wybrany_status'];
            $temp=explode('.', $wybrany_status);
                $status=$temp[0];
                $konto=$temp[1];


            if($wybrany_status=='nic')
            {
                $msg="Niepoprawny status";
                function alert($msg) 
                {
                    ?>
                    <script type='text/javascript'>alert('Niepoprawny status');</script>
                    <?php
                }
                    alert("Niepoprawny status");

            }
            else
            {
                $update = $db -> query("UPDATE statusy_stypendystow SET status='$status' WHERE konto='$konto' AND dane_wniosku LIKE '%$rok_wnioskow%'");
                header("Location: status_stypendystow.php?rok=$rok_wnioskow");

                // $check_status = "SELECT * FROM statusy_stypendystow WHERE konto='$konto'";

                // $count=0;
                // foreach($db->results() as $sprawdzanie_statusu)
                // {
                //     $count++;
                // }

                // if($count==0)
                // {
                // $wstaw_status = $db ->query("INSERT INTO statusy_stypendystow (konto, status) VALUES ('$konto', '$status')");
                // }
                // else
                // {
                //     $update = $db -> query("UPDATE statusy_stypendystow SET status='$status' WHERE konto='$konto'");
                //     header("Location: status_stypendystow.php?rok=$rok_wnioskow");
                // }
            }
        }
        ?>
		
		
		<br />
        <br />

					
					
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
