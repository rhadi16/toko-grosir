<?php 

	include '../../admin/config/connect.php';
	include '../../admin/config/auth.php';

	$action  = $_GET['action'];

	if ($action == "insert") {
		
		$id 		   = $_POST['id'];
		$id_barang 	   = $_POST['id_barang'];
		$jum_yg_dibeli = $_POST['jum_yg_dibeli'];
		$tot_yg_dibeli = $_POST['tot_yg_dibeli'];
		$tanggal 	   = $_POST['tanggal'];
		$id_admin 	   = $_POST['id_admin'];
		$nama_pelanggan= $_POST['nama_pelanggan'];
		$id_pelanggan 	   = $_POST['id_pelanggan'];

		$result = mysqli_query($mysqli, "INSERT INTO penjualan (id, id_barang, jum_yg_dibeli, tot_yg_dibeli, tanggal, id_admin, nama_pelanggan) 
										VALUES(null, '$id_barang', '$jum_yg_dibeli', '$tot_yg_dibeli', '$tanggal', '$id_admin', '$nama_pelanggan')") or die(mysqli_error($mysqli));
		$result1= mysqli_query($mysqli, "DELETE FROM list_pesanan WHERE id = $id") or die(mysqli_error($mysqli));

		if ($result && $result1) {
			echo '<script language="javascript"> window.location.href = "../detail-pesanan.php?id_pel='.$id_pelanggan.'&desc=success-in" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../detail-pesanan.php?id_pel='.$id_pelanggan.'&desc=failed-in" </script>';
		}
	} elseif($action == "update") {

		$id 		   = $_POST['id'];
		$id_barang 	   = $_POST['id_barang'];
		$jum_yg_dibeli = $_POST['jum_yg_dibeli'];
		$jum_yg_dibeli_lama = $_POST['jum_yg_dibeli_lama'];
		$id_pelanggan 	   = $_POST['id_pelanggan'];

		$dt1 = mysqli_query($mysqli, "SELECT * FROM list_barang WHERE id_barang = $id_barang");
        $d1  = mysqli_fetch_array($dt1);

        $re = $d1['stok'] + $jum_yg_dibeli_lama;
        $re1 = $re - $jum_yg_dibeli;

        if ($d1['stok'] < $jum_yg_dibeli) {
        	echo '<script language="javascript"> window.location.href = "../detail-pesanan.php?id_pel='.$id_pelanggan.'&desc=failed-ed2" </script>';
        } else {
			$result = mysqli_query($mysqli, "UPDATE list_pesanan
			  									SET 
			  									   jum_yg_dibeli = '$jum_yg_dibeli'
			  									   WHERE id = $id
			  									") or die(mysqli_error($mysqli));

			$result1 = mysqli_query($mysqli, "UPDATE list_barang
			  									SET 
			  									   stok = '$re1'
			  									   WHERE id_barang = '$id_barang'
			  									") or die(mysqli_error($mysqli));

			if ($result) {
				echo '<script language="javascript"> window.location.href = "../detail-pesanan.php?id_pel='.$id_pelanggan.'&desc=success-ed" </script>';
			} else {
				echo '<script language="javascript"> window.location.href = "../detail-pesanan.php?id_pel='.$id_pelanggan.'&desc=failed-ed" </script>';
			}
        }
	} elseif($action == "delete") {

		$id 	   = $_GET['id'];
		$id_barang = $_GET['id_barang'];
		$id_pelanggan = $_GET['id_pelanggan'];

        $dt = mysqli_query($mysqli, "SELECT * FROM list_barang WHERE id_barang = $id_barang");
        $d  = mysqli_fetch_array($dt);

        $dt1 = mysqli_query($mysqli, "SELECT * FROM list_pesanan WHERE id = $id");
        $d1  = mysqli_fetch_array($dt1);

        $stok = $d['stok'] + $d1['jum_yg_dibeli'];

		$result  = mysqli_query($mysqli, "DELETE FROM list_pesanan WHERE id = $id") or die(mysqli_error($mysqli));
		$result1 = mysqli_query($mysqli, "UPDATE list_barang SET stok = '$stok' WHERE id_barang = '$id_barang'") or die(mysqli_error($mysqli));

		if ($result && $result1) {
			echo '<script language="javascript"> window.location.href = "../detail-pesanan.php?id_pel='.$id_pelanggan.'&desc=success-del" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../detail-pesanan.php?id_pel='.$id_pelanggan.'&desc=failed-del" </script>';
		}

	}

?>