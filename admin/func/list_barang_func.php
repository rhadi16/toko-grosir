<?php 

	include '../config/connect.php';
	include '../config/auth.php';

	$action  = $_GET['action'];

	if ($action == "insert") {
		
		$nama_barang = $_POST['nama_barang'];
		$harga 		 = $_POST['harga'];
		$stok 	 	 = $_POST['stok'];
		$promo 	 	 = $_POST['promo'];
		$diskon 	 = $_POST['diskon'];
		$satuan 	 = $_POST['satuan'];
		$unit 		 = $_POST['unit'];
		// Ambil Data yang Dikirim dari Form
		$nama_file = $_FILES['file_name']['name'];
		$tmp_file  = $_FILES['file_name']['tmp_name'];

		$foto = rand().$nama_file;

		// Set path folder tempat menyimpan gambarnya
		$path = "../foto_brg/".$foto;

		if (move_uploaded_file($tmp_file, $path)) {
			$result = mysqli_query($mysqli, "INSERT INTO list_barang (id_barang, nama_barang, harga, stok, promo, diskon, satuan, unit, foto) 
											 VALUES(null, '$nama_barang', '$harga', '$stok', '$promo', '$diskon', '$satuan', '$unit', '$foto')") or die(mysqli_error($mysqli));

			if ($result) {
				echo '<script language="javascript"> window.location.href = "../list-barang.php?desc=success-in" </script>';
			} else {
				echo '<script language="javascript"> window.location.href = "../list-barang.php?desc=failed-in" </script>';
			}
		}
	} elseif($action == "update") {

		$id_barang 	 = $_POST['id_barang'];
		$nama_barang = $_POST['nama_barang'];
		$harga 		 = $_POST['harga'];
		$stok 	 	 = $_POST['stok'];
		$promo 	 	 = $_POST['promo'];
		$diskon 	 = $_POST['diskon'];
		$satuan 	 = $_POST['satuan'];
		$unit 		 = $_POST['unit'];
		$file_name_sebelum = $_POST['file_name_sebelum'];
		// Ambil Data yang Dikirim dari Form
		$nama_file = $_FILES['file_name']['name'];
		$tmp_file  = $_FILES['file_name']['tmp_name'];

		$foto = rand().$nama_file;

		// Set path folder tempat menyimpan gambarnya
		$path = "../foto_brg/".$foto;

		if (move_uploaded_file($tmp_file, $path)) {
			$result = mysqli_query($mysqli, "UPDATE list_barang
				  									SET 
				  									   id_barang   = '$id_barang',
				  									   nama_barang = '$nama_barang',
				  									   harga 	   = '$harga',
				  									   stok 	   = '$stok',
				  									   promo       = '$promo',
				  									   diskon      = '$diskon',
				  									   satuan      = '$satuan',
				  									   unit        = '$unit',
				  									   foto    	   = '$foto'
				  									   WHERE id_barang = $id_barang
				  									") or die(mysqli_error($mysqli));

			if ($result) {
				$hapus_foto = unlink("../foto_brg/".$file_name_sebelum);
				echo '<script language="javascript"> window.location.href = "../list-barang.php?desc=success-ed" </script>';
			} else {
				echo '<script language="javascript"> window.location.href = "../list-barang.php?desc=failed-ed" </script>';
			}
		} else {
			$result = mysqli_query($mysqli, "UPDATE list_barang
				  									SET 
				  									   id_barang   = '$id_barang',
				  									   nama_barang = '$nama_barang',
				  									   harga 	   = '$harga',
				  									   stok 	   = '$stok',
				  									   promo       = '$promo',
				  									   diskon      = '$diskon',
				  									   satuan      = '$satuan',
				  									   unit        = '$unit',
				  									   foto    	   = '$file_name_sebelum'
				  									   WHERE id_barang = $id_barang
				  									") or die(mysqli_error($mysqli));

			if ($result) {
				echo '<script language="javascript"> window.location.href = "../list-barang.php?desc=success-ed" </script>';
			} else {
				echo '<script language="javascript"> window.location.href = "../list-barang.php?desc=failed-ed" </script>';
			}
		}

	} elseif($action == "delete") {

		$id_barang = $_GET['id_barang'];
		$foto 	   = $_GET['foto'];

		$result = mysqli_query($mysqli, "DELETE FROM list_barang WHERE id_barang = $id_barang") or die(mysqli_error($mysqli));

		if ($result) {
			$hapus_foto = unlink("../foto_brg/".$foto);
			echo '<script language="javascript"> window.location.href = "../list-barang.php?desc=success-del" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../list-barang.php?desc=failed-del" </script>';
		}

	}

?>