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
		$tgl_expire  = $_POST['tgl_expire'];
		$usia_awal	 = $_POST['usia_awal'];
		$usia_akhir	 = $_POST['usia_akhir'];
		$kalangan	 = $_POST['kalangan'];
		$kat_jkel	 = $_POST['kat_jkel'];
		// Ambil Data yang Dikirim dari Form
		$nama_file = $_FILES['file_name']['name'];
		$tmp_file  = $_FILES['file_name']['tmp_name'];

		$foto = rand().$nama_file;

		// Set path folder tempat menyimpan gambarnya
		$path = "../foto_brg/".$foto;

		$tgl = date('d-m-Y');

		if (strtotime($tgl) >= strtotime($tgl_expire)) {
			echo '<script language="javascript"> window.location.href = "../list-barang.php?desc=exp" </script>';
		} else {
			if (move_uploaded_file($tmp_file, $path)) {
				$result = mysqli_query($mysqli, "INSERT INTO list_barang (id_barang, nama_barang, harga, stok, promo, diskon, satuan, unit, tgl_expire, foto, usia_awal, usia_akhir, kalangan, kat_jkel) 
												 VALUES(null, '$nama_barang', '$harga', '$stok', '$promo', '$diskon', '$satuan', '$unit', '$tgl_expire', '$foto', '$usia_awal', '$usia_akhir', '$kalangan', '$kat_jkel')") or die(mysqli_error($mysqli));

				if ($result) {
					echo '<script language="javascript"> window.location.href = "../list-barang.php?desc=success-in" </script>';
				} else {
					echo '<script language="javascript"> window.location.href = "../list-barang.php?desc=failed-in" </script>';
				}
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
		$tgl_expire  = $_POST['tgl_expire'];
		$usia_awal	 = $_POST['usia_awal'];
		$usia_akhir	 = $_POST['usia_akhir'];
		$kalangan	 = $_POST['kalangan'];
		$kat_jkel	 = $_POST['kat_jkel'];
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
				  									   tgl_expire  = '$tgl_expire',
				  									   foto    	   = '$foto',
				  									   usia_awal   = '$usia_awal',
				  									   usia_akhir  = '$usia_akhir',
				  									   kalangan    = '$kalangan',
				  									   kat_jkel	   = '$kat_jkel'
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
				  									   tgl_expire  = '$tgl_expire',
				  									   foto    	   = '$file_name_sebelum',
				  									   usia_awal   = '$usia_awal',
				  									   usia_akhir  = '$usia_akhir',
				  									   kalangan    = '$kalangan',
				  									   kat_jkel	   = '$kat_jkel'
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

	} elseif($action == "dispro") {

		$id_barang = $_POST['id_barang'];
		$promo 	   = $_POST['promo'];
		$diskon    = $_POST['diskon'];

		$result = mysqli_query($mysqli, "UPDATE list_barang
			  									SET 
			  									   promo       = '$promo',
			  									   diskon      = '$diskon'
			  									   WHERE id_barang = $id_barang
			  									") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../saran-diskon.php?desc=success-in" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../saran-diskon.php?desc=failed-in" </script>';
		}

	}

?>