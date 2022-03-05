<?php 
/****************************************************** 
* connection.php 
* konfiguracja poณฑczenia z bazฑ danych 
******************************************************/ 

function connection() { 
    // serwer 
    $mysql_server = "localhost"; 
    // admin 
    $mysql_admin = "dariuszpta_darek"; 
    // hasณo 
    $mysql_pass = "ZAQwsx123"; 
    // nazwa baza 
    $mysql_db = "dariuszpta_baza"; 
    // nawiฑzujemy poณฑczenie z serwerem MySQL 
    @mysql_connect($mysql_server, $mysql_admin, $mysql_pass) 
    or die('Brak poณฑczenia z serwerem MySQL.'); 
    // ณฑczymy si๊ z bazฑ danych 
    @mysql_select_db($mysql_db) 
    or die('Bณฑd wyboru bazy danych.'); 
} 

?>