<?php
$today=date("Y.m.d");
$data="2021.12.31";

$user1='admin';
$user2=$jakie_konto;

if($data<$today)
{
if($user1!='' && $user1==$user2)
{
$disabled='';
}
else
{
$disabled='disabled';
echo "<h1 align='center' style='color:red;'>Termin wypełniania, edycji wniosku: $data</h1>";
}
}

?>