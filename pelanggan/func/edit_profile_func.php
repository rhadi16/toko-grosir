<?php 
	session_start();
	include("../../admin/config/auth.php");

	$id 		 = $_POST['id'];
	$email 	 = $_POST['email'];
	$nama 	 = $_POST['nama'];
	$alamat  = $_POST['alamat'];
	$no_wa 	 = $_POST['no_wa'];
	$usia 	 = $_POST['usia'];

	if ($_POST['password'] == '') {
		$password= $_POST['pass-lama'];
	} else {
		$password= password_hash($_POST['password'].PEPPER, PASSWORD_DEFAULT, ['cost' => 12]);
	}

	$sql = $db->prepare("UPDATE pelanggan SET email = '$email', nama = '$nama', alamat = '$alamat', no_wa = '$no_wa', password = '$password', usia = '$usia' WHERE id = $id");

	if ($sql->execute()) {
    header('Location:../index.php?desc=success-ed');
  } else {
    echo 'Terjadi kesalahan query.';
  }

?>