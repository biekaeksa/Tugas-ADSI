<?php
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'pegawai' ) ) {

	header('location:./../login.php');
	exit();
}
?>
<h2>Hallo Pegawai <?=$_SESSION['nama'];?> Apakabar ?</h2>

<a href="./../logout.php">Logout</a>
