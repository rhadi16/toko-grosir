<?php 
	include('template/header.php');
	include('asset/datetime/datetimeFormat.php');
?>

<?php 

	$qry = "SELECT 
						* 
					FROM list_barang
					WHERE tgl_expire <= CURDATE() + INTERVAL 2 MONTH";

	$orderby = "tgl_expire";

  $view   = "saran-diskon.php";

  $column = [
              'value'  => ['nama_barang'],
              'label'  => ['Nama Barang'],
              'type'   => ['text']
            ];

?>

	<section id="saran-diskon">
		<div class="container">
			<h5 class="title">Disarankan Untuk Diberi Diskon Atau Promo<br>Barang Akan Expire Dalam 2 Bulan</h5>

      <div class="container pencarian-barang">
        <div class="card">
          <?php include('../paginasi/pencarian.php'); ?>
        </div>
      </div>

			<div class="list">
				<div class="card-panel">
					<table class="striped centered responsive-table">
		        <thead>
		          <tr>
	          		<th>No.</th>
	              <th>Nama Barang</th>
	              <th>Tanggal Expire</th>
		          </tr>
		        </thead>

		        <tbody>
		        <?php 
		        	$no = 1;
							$page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
							$kolomCari=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
							$kolomKataKunci=(isset($_GET['KataKunci']))? $_GET['KataKunci'] : "";

							//kondisi jika parameter pencarian kosong
							if($kolomCari=="" && $kolomKataKunci==""){
							  $dt = mysqli_query($mysqli, "$qry ORDER BY $orderby ASC");
							}else{
							//kondisi jika parameter kolom pencarian diisi
							  $dt = mysqli_query($mysqli, "$qry AND $kolomCari LIKE '%$kolomKataKunci%' ORDER BY $orderby ASC");
							}

							while($data = mysqli_fetch_array($dt)) {
						?>
		          <tr>
		          	<td><?php echo $no; ?></td>
		            <td><?php echo $data['nama_barang']; ?></td>
		            <td><?php echo datetimeFormat::TanggalIndo($data['tgl_expire']); ?></td>
		          </tr>
		        <?php $no++; } ?>
		        </tbody>
		      </table>
				</div>
			</div>
		</div>
	</section>

<?php include('template/footer.php'); ?>