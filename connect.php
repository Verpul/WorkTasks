<?php
session_start();
$connect = mysql_connect('localhost', 'root') or die("Could not connect to mysql server");
mysql_select_db('work') or die("Could not open DB");
?>