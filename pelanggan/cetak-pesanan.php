<?php 
	session_start();

	$id_pelanggan = $_SESSION['user'];
	if(!isset($_SESSION['user'])){
	    // fungsi redirect menggunakan javascript
	    echo '<script language="javascript"> window.location.href = "../index.php" </script>';
	}
	// echo '<link rel="shortcut icon" href="assets/gambar/logo_lutra.png" type="image/x-icon">';
	// require_once __DIR__ . '../admin/lib/mpdf/vendor/autoload.php';
	require_once '../admin/lib/mpdf/vendor/autoload.php';

	$mpdf = new \Mpdf\Mpdf();

	$html = '
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Daftar Pesanan</title>
			<style type="text/css">
				body, main, h1, table, td, th {
					margin: 0;
					padding: 0;
					border-collapse: collapse;
					font-family: calibri, sans-serif;
				}
				main {
					width: 100%;
					position: relative;
				}
				h1 {
					text-align: center;
					border-bottom: 2px solid black;
					padding-bottom: 10px;
					margin-bottom: 20px;
					line-height: 1.5rem;
					font-size: 1.2rem;
				}
				table {
		  		width: 100%;
				}
				td, th {
					border: 1px solid #212121;
				  text-align: left;
				  padding: 8px;
		  		text-align: center;
				}
				tr:nth-child(even) {
				  background-color: #dddddd;
				}
			</style>
		</head>';

	include '../admin/config/connect.php';
    include '../admin/config/auth.php';
    include '../admin/asset/datetime/datetimeFormat.php';

    $dt = mysqli_query($mysqli, "SELECT 
									a.*,
									b.nama_barang,
									b.harga,
									b.diskon,
									b.promo
								FROM list_pesanan a
								LEFT JOIN list_barang b ON a.id_barang=b.id_barang
								WHERE id_pelanggan = $id_pelanggan");

    $ad = mysqli_query($mysqli, "SELECT * FROM pelanggan WHERE id = $id_pelanggan");
  	$ad1 = mysqli_fetch_array($ad);

	$html .= '
		  <body>
				<main>
					<h1>Daftar Pesanan Milik <br>'.$ad1['email'].'<br>'.$ad1['nama'].'</h1>

					<table>
						<tr>
							<th>No.</th>
							<th>Tanggal</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Quantity</th>
							<th>Diskon</th>
							<th>Promo</th>
							<th>Total Harga</th>
						</tr>';
					$no = 1; 
      		while($d  = mysqli_fetch_array($dt)){
      			if ($d['diskon'] == 0) {
                  $end = number_format($d['harga'],0,",",".");
                } else {
                  $end1 = '<del>'.number_format($d['harga'],0,",",".").'</del> ke ';
                  $diskon       = $d['harga'] * $d['diskon']/100;
                  $harga_diskon = $d['harga'] - $diskon;
                  $end = $end1. number_format($harga_diskon,0,",",".");
                }

                if ($d['diskon'] == 0) {
            		$total = $d['harga'] * $d['jum_yg_dibeli'];
            		$end_total = number_format($total,0,",",".");
            	} else {
            		$total1 = $d['harga'] * $d['jum_yg_dibeli'];
            		$end_total1 = '<del>'.number_format($total1,0,",",".").'</del> ke ';
            		$diskon = $d['harga'] * $d['diskon']/100;
            		$harga_diskon = $d['harga'] - $diskon;
            		$total = $harga_diskon * $d['jum_yg_dibeli'];
            		$end_total = $end_total1. number_format($total,0,",",".");
            	}
      		$html .= '
      			<tr>
      				<td>'. $no .'</td>
      				<td>'. datetimeFormat::TanggalIndo($d['tanggal']) .'</td>
      				<td>'. $d['nama_barang'] .'</td>
      				<td>'. $end .'</td>
      				<td>'. $d['jum_yg_dibeli'] .'</td>
      				<td>'. $d['diskon'] .'%</td>
      				<td>'. $d['promo'] .'</td>
      				<td>Rp. '. $end_total .'</td>
      			</tr>
      		';
      		$total_penjualan += $total;
      		$no++;
      	}
$html .='
				    <tr>
							<th colspan="7">Total Belanja</th>
							<th>Rp. '. number_format($total_penjualan,0,",",".") .'</th>
						</tr>
					</table>
				</main>
			</body>
			</html>';
	$mpdf->WriteHTML($html);
	$mpdf->Output('Daftar_belanja.pdf', \Mpdf\Output\Destination::INLINE);

?>