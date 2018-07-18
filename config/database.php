<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "";
$database = "pulepayung";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi MySQL Gagal : " .mysql_error());
mysql_select_db($database) or die ("Koneksi Database Gagal : " .mysql_error());
?>
