<?php 

	include '../config/connect.php';
	include '../config/auth.php';

	$action  = $_GET['action'];

	if ($action == "insert") {
		
		$id_barang 	   = $_POST['id_barang'];
		$jum_yg_dibeli = $_POST['jum_yg_dibeli'];
		$tanggal 	   = $_POST['tanggal'];
		$id_admin 	   = $_POST['id_admin'];
		$nama_pelanggan= $_POST['nama_pelanggan'];

		$jum_data = count($id_barang);

		for ($i=0; $i < $jum_data; $i++) {
			$stok_list_brg[$i] = explode("||", $id_barang[$i]);

			$id_brg[$i]    = $stok_list_brg[$i][0];
			$stok_awal[$i] = $stok_list_brg[$i][1];
			$harga[$i] 	   = $stok_list_brg[$i][2];

			$dt1 = mysqli_query($mysqli, "SELECT * FROM list_barang WHERE id_barang = $id_brg[$i]");
        	$d1  = mysqli_fetch_array($dt1);

        	$diskon[$i] = $harga[$i] * $d1['diskon']/100;

			$tot_yg_dibeli[$i] = ($harga[$i] - $diskon[$i]) * $jum_yg_dibeli[$i];
			$sisa_stok[$i]	   = $stok_awal[$i] - $jum_yg_dibeli[$i];

			$result = mysqli_query($mysqli, "INSERT INTO penjualan (id, id_barang, jum_yg_dibeli, tot_yg_dibeli, tanggal, id_admin, nama_pelanggan) 
											 VALUES(null, '$id_brg[$i]', '$jum_yg_dibeli[$i]', '$tot_yg_dibeli[$i]', '$tanggal[$i]', '$id_admin[$i]', '$nama_pelanggan')") or die(mysqli_error($mysqli));
			$result1= mysqli_query($mysqli, "UPDATE list_barang SET stok = '$sisa_stok[$i]' WHERE id_barang = '$id_brg[$i]'") 
											or die(mysqli_error($mysqli));
		}

		if ($result && $result1) {
			echo '<script language="javascript"> window.location.href = "../penjualan.php?desc=success-in" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../penjualan.php?desc=failed-in" </script>';
		}
	} elseif($action == "delete-data") {

		$id = $_GET['id'];

		$result = mysqli_query($mysqli, "DELETE FROM penjualan WHERE id = $id") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../penjualan.php?desc=success-del" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../penjualan.php?desc=failed-del" </script>';
		}

	} elseif($action == "delete-stok") {

		$id 	   = $_GET['id'];
		$id_barang = $_GET['id_barang'];

        $dt = mysqli_query($mysqli, "SELECT * FROM list_barang WHERE id_barang = $id_barang");
        $d  = mysqli_fetch_array($dt);

        $dt1 = mysqli_query($mysqli, "SELECT * FROM penjualan WHERE id = $id");
        $d1  = mysqli_fetch_array($dt1);

        $stok = $d['stok'] + $d1['jum_yg_dibeli'];

		$result  = mysqli_query($mysqli, "DELETE FROM penjualan WHERE id = $id") or die(mysqli_error($mysqli));
		$result1 = mysqli_query($mysqli, "UPDATE list_barang SET stok = '$stok' WHERE id_barang = '$id_barang'") or die(mysqli_error($mysqli));

		if ($result && $result1) {
			echo '<script language="javascript"> window.location.href = "../penjualan.php?desc=success-del" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../penjualan.php?desc=failed-del" </script>';
		}

	} elseif($action == "delete-all-stok") {

        $dt = mysqli_query($mysqli, "SELECT * FROM penjualan");
        while($data = mysqli_fetch_array($dt)) {

        	$id_barang = $data['id_barang'];
        	$id		   = $data['id'];

        	$dt1 = mysqli_query($mysqli, "SELECT * FROM list_barang WHERE id_barang = $id_barang");
        	$d1  = mysqli_fetch_array($dt1);
        	$stok = $d1['stok'] + $data['jum_yg_dibeli'];

        	$id_barang1 = $d1['id_barang'];

        	$result  = mysqli_query($mysqli, "DELETE FROM penjualan WHERE id = $id") or die(mysqli_error($mysqli));
        	$result1 = mysqli_query($mysqli, "UPDATE list_barang SET stok = '$stok' WHERE id_barang = $id_barang1") or die(mysqli_error($mysqli));
        }

		if ($result && $result1) {
			echo '<script language="javascript"> window.location.href = "../penjualan.php?desc=success-del" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../penjualan.php?desc=failed-del" </script>';
		}

	} elseif($action == "delete-all-data") {

        $dt = mysqli_query($mysqli, "SELECT * FROM penjualan");
        while($data = mysqli_fetch_array($dt)) {

        	$id = $data['id'];

        	$result  = mysqli_query($mysqli, "DELETE FROM penjualan WHERE id = $id") or die(mysqli_error($mysqli));
        }

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../penjualan.php?desc=success-del" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../penjualan.php?desc=failed-del" </script>';
		}

	}

?>