<?php
//berisi konfigurasi server, pastikan diisi dengan benar
$host="localhost"; //Server yang digunakan
$user_db="root"; //User yang dipakai
$pass_db="";//Password yang digunakan
$db="dcd";//Database yang Dipakai
$conn_db=mysql_connect($host,$user_db,$pass_db);
mysql_select_db($db);
?>