<?php 
/****************************************************** 
* connection.php 
* konfiguracja po��czenia z baz� danych 
******************************************************/ 

function connection() { 
    // serwer 
    $mysql_server = "localhost"; 
    // admin 
    $mysql_admin = "dariuszpta_darek"; 
    // has�o 
    $mysql_pass = "ZAQwsx123"; 
    // nazwa baza 
    $mysql_db = "dariuszpta_baza"; 
    // nawi�zujemy po��czenie z serwerem MySQL 
    @mysql_connect($mysql_server, $mysql_admin, $mysql_pass) 
    or die('Brak po��czenia z serwerem MySQL.'); 
    // ��czymy si� z baz� danych 
    @mysql_select_db($mysql_db) 
    or die('B��d wyboru bazy danych.'); 
} 

?>