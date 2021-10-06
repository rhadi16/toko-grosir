<?php 

	include '../config/connect.php';
	include '../config/auth.php';

	$action  = $_GET['action'];

	if ($action == "insert") {
		
		$id_barang 	 	 = $_POST['id_barang'];
		$harga_yg_dibeli = $_POST['harga_yg_dibeli'];
		$stok_yg_dibeli  = $_POST['stok_yg_dibeli'];
		$tanggal 		 = $_POST['tanggal'];

		$jum_data = count($id_barang);

		for ($i=0; $i < $jum_data; $i++) {
			$stok_list_brg[$i] = explode("||", $id_barang[$i]);

			$id_brg[$i]    = $stok_list_brg[$i][0];
			$stok_awal[$i] = $stok_list_brg[$i][1];
			$tot_stok[$i]  = $stok_awal[$i] + $stok_yg_dibeli[$i];

			$result = mysqli_query($mysqli, "INSERT INTO pembelian (id, id_barang, harga_yg_dibeli, stok_yg_dibeli, stok_awal, tot_stok, tanggal) 
											 VALUES(null, '$id_brg[$i]', '$harga_yg_dibeli[$i]', '$stok_yg_dibeli[$i]', '$stok_awal[$i]', '$tot_stok[$i]', '$tanggal[$i]')") or die(mysqli_error($mysqli));
			$result1= mysqli_query($mysqli, "UPDATE list_barang SET stok = '$tot_stok[$i]' WHERE id_barang = '$id_brg[$i]'") 
											or die(mysqli_error($mysqli));
		}

		if ($result && $result1) {
			echo '<script language="javascript"> window.location.href = "../pembelian.php?desc=success-in" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../pembelian.php?desc=failed-in" </script>';
		}
	} elseif($action == "update") {

		$id 			   = $_POST['id'];
		$nama 	 		   = $_POST['nama'];
		$jabatan 		   = $_POST['jabatan'];
		$email 	 		   = $_POST['email'];
		$hp 			   = $_POST['hp'];
		$file_name_sebelum = $_POST['file_name_sebelum'];
		// Ambil Data yang Dikirim dari Form
		$nama_file = $_FILES['file_name']['name'];
		$tmp_file  = $_FILES['file_name']['tmp_name'];

		$foto = rand().$nama_file;

		// Set path folder tempat menyimpan gambarnya
		$path = "../foto/".$foto;

		if (move_uploaded_file($tmp_file, $path)) {
			$result = mysqli_query($mysqli, "UPDATE pegawai
				  									SET 
				  									   id      = '$id',
				  									   nama    = '$nama',
				  									   jabatan = '$jabatan',
				  									   email   = '$email',
				  									   hp      = '$hp',
				  									   foto    = '$foto'
				  									   WHERE id = $id
				  									") or die(mysqli_error($mysqli));

			if ($result) {
				$hapus_foto = unlink("../foto/".$file_name_sebelum);
				echo '<script language="javascript"> window.location.href = "../pegawai.php?desc=success-ed" </script>';
			} else {
				echo '<script language="javascript"> window.location.href = "../pegawai.php?desc=failed-ed" </script>';
			}
		} else {
			$result = mysqli_query($mysqli, "UPDATE pegawai
				  									SET 
				  									   id      = '$id',
				  									   nama    = '$nama',
				  									   jabatan = '$jabatan',
				  									   email   = '$email',
				  									   hp      = '$hp',
				  									   foto    = '$file_name_sebelum'
				  									   WHERE id = $id
				  									") or die(mysqli_error($mysqli));

			if ($result) {
				echo '<script language="javascript"> window.location.href = "../pegawai.php?desc=success-ed" </script>';
			} else {
				echo '<script language="javascript"> window.location.href = "../pegawai.php?desc=failed-ed" </script>';
			}
		}

	} elseif($action == "delete-data") {

		$id = $_GET['id'];

		$result = mysqli_query($mysqli, "DELETE FROM pembelian WHERE id = $id") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../pembelian.php?desc=success-del" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../pembelian.php?desc=failed-del" </script>';
		}

	} elseif($action == "delete-stok") {

		$id 	   = $_GET['id'];
		$id_barang = $_GET['id_barang'];

        $dt = mysqli_query($mysqli, "SELECT * FROM list_barang WHERE id_barang = $id_barang");
        $d  = mysqli_fetch_array($dt);

        $dt1 = mysqli_query($mysqli, "SELECT * FROM pembelian WHERE id = $id");
        $d1  = mysqli_fetch_array($dt1);

        $stok = $d['stok'] - $d1['stok_yg_dibeli'];

		$result  = mysqli_query($mysqli, "DELETE FROM pembelian WHERE id = $id") or die(mysqli_error($mysqli));
		$result1 = mysqli_query($mysqli, "UPDATE list_barang SET stok = '$stok' WHERE id_barang = '$id_barang'") or die(mysqli_error($mysqli));

		if ($result && $result1) {
			echo '<script language="javascript"> window.location.href = "../pembelian.php?desc=success-del" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../pembelian.php?desc=failed-del" </script>';
		}

	} elseif($action == "delete-all-stok") {

        $dt = mysqli_query($mysqli, "SELECT * FROM pembelian");
        while($data = mysqli_fetch_array($dt)) {

        	$id_barang = $data['id_barang'];
        	$id		   = $data['id'];

        	$dt1 = mysqli_query($mysqli, "SELECT * FROM list_barang WHERE id_barang = $id_barang");
        	$d1  = mysqli_fetch_array($dt1);
        	$stok = $d1['stok'] - $data['stok_yg_dibeli'];

        	$id_barang1 = $d1['id_barang'];

        	$result  = mysqli_query($mysqli, "DELETE FROM pembelian WHERE id = $id") or die(mysqli_error($mysqli));
        	$result1 = mysqli_query($mysqli, "UPDATE list_barang SET stok = '$stok' WHERE id_barang = $id_barang1") or die(mysqli_error($mysqli));
        }

		if ($result && $result1) {
			echo '<script language="javascript"> window.location.href = "../pembelian.php?desc=success-del" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../pembelian.php?desc=failed-del" </script>';
		}

	} elseif($action == "delete-all-data") {

        $dt = mysqli_query($mysqli, "SELECT * FROM pembelian");
        while($data = mysqli_fetch_array($dt)) {

        	$id = $data['id'];

        	$result  = mysqli_query($mysqli, "DELETE FROM pembelian WHERE id = $id") or die(mysqli_error($mysqli));
        }

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../pembelian.php?desc=success-del" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../pembelian.php?desc=failed-del" </script>';
		}

	}

?>