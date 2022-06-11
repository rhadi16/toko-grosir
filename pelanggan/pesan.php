<?php 
	include('template/header.php'); 
	include '../admin/asset/datetime/datetimeFormat.php';
?>
<link rel="stylesheet" type="text/css" href="asset/css/pesan.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php 
	$id_pelanggan = $_SESSION['user'];

	$qry    = "SELECT * FROM list_barang WHERE diskon = 0 AND promo = ''";
      
  $orderby = ""; 

  $view   = "pesan.php";

  $column = [
              'value'  => ['nama_barang', 'harga'],
              'label'  => ['Nama Barang', 'Harga Barang'],
              'type'   => ['text', 'double']
            ];
?>

	<section id="penjualan">
		<div class="container">
			<h5 class="center-align title-form">List Barang</h5>
			<a class="waves-effect waves-light btn light-blue darken-1" id="tambah-kolom" href="riwayat-pesan.php"><i class="material-icons left">near_me</i>Riwayat Pesanan</a>
			<!-- <a class="waves-effect waves-light btn  light-blue darken-1" id="tambah-kolom"><i class="material-icons left">add</i>Tambah Form Isian</a>
			<div class="row">
				<form action="func/pesan_func.php?action=insert" enctype="multipart/form-data" method="post">
				<div class="element col s12" id="div_1">
			    <div id="txt_1">
			      <div class="card-panel bg">
							<div class="row">
						    <div class="col s12 m6">
					        <div class="ui-widget input-field">
					          <select id="combobox1" name="id_barang[]" required>
					            <option value="">Select one...</option>
					            <?php 
                        $qry1 = "SELECT * FROM list_barang";

                        $dt1 = mysqli_query($mysqli, $qry1);

                        while($data1 = mysqli_fetch_array($dt1)){
                      ?>
						            <option value="<?php echo $data1['id_barang'].'||'.$data1['stok'].'||'.$data1['harga']; ?>"><?php echo $data1['nama_barang']; ?></option>
					          	<?php } ?>
					          </select>
					          <label>Pilih Barang</label>
					        </div>
						    </div>
				        <div class="input-field col s12 m6">
				          <input placeholder="" id="jum_yg_dibeli" type="number" class="validate" name="jum_yg_dibeli[]" required>
				          <label for="jum_yg_dibeli">Jumlah Barang Yang Dibeli</label>
				        </div>
				        <input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
						  </div>
			      </div>
			    </div>
				</div>
				<div class="col s12">
					<button type="submit" class="waves-effect waves-light btn green darken-1" id="input-penjualan"><i class="material-icons left">send</i>Pesan</button>
				</div>
				</form>
		  </div> -->
		</div>

		<div class="container" id="list-barang">
			<div class="row">
				<div class="col s12 m6 l6">
					<h6 class="center-align">Barang yang Mungkin Cocok untuk Anda</h6>	
					<div class="carousel">
						<?php 
						  $usi = "SELECT tgl_lahir, jkel FROM pelanggan WHERE id = $id_pelanggan";
						  $usi1 = mysqli_query($mysqli, $usi);
						  $usi11 = mysqli_fetch_array($usi1);

							function hitung_umur($tanggal_lahir){
					      $birthDate = new DateTime($tanggal_lahir);
					      $today = new DateTime("today");
					      if ($birthDate > $today) { 
					          exit("0 tahun 0 bulan 0 hari");
					      }
					      $y = $today->diff($birthDate)->y;
					      $m = $today->diff($birthDate)->m;
					      $d = $today->diff($birthDate)->d;
					      return $y;
					    }

							$usiap = hitung_umur($usi11['tgl_lahir']);
							$jkel = $usi11['jkel'];

							$kal1 = 'efegrg';

							if ($usiap >= 15 and $usiap <= 25) {
								$kal1 = 'Remaja';
							} else if ($usiap >= 26 and $usiap <= 38){
								$kal1 = 'Dewasa';
							} else if ($usiap >= 39 and $usiap <= 50){
								$kal1 = 'Orang Tua';
							} else if ($usiap >= 51){
								$kal1 = 'Usia Lanjut';
							}
						?>
						<?php
							$lsd = "SELECT *, (A.as_usia * 0.2) + (A.kal * 0.2) + (A.katkel * 0.6) AS nilai FROM 
											(
												SELECT 
													a.id_barang,
													a.nama_barang,
													a.promo,
													a.harga,
													a.stok,
													a.foto,
													a.satuan,
													a.diskon,
													a.usia_awal,
													a.usia_akhir,
													a.kalangan,
													a.kat_jkel,
													SUM(b.jum_yg_dibeli) jum,
													CASE
														WHEN a.kalangan = '$kal1' THEN 2
														ELSE 1
													END AS kal,
													$usiap - a.usia_awal AS as_usia,
													CASE
														WHEN a.kat_jkel = '$jkel' THEN 10
														ELSE 1
													END AS katkel
												FROM list_barang a
												LEFT JOIN penjualan b ON a.id_barang = b.id_barang
												WHERE $usiap >= a.usia_awal AND $usiap <= a.usia_akhir
												GROUP BY a.id_barang
											) A
											WHERE a.promo = '' AND a.diskon = 0
											ORDER BY nilai DESC
											LIMIT 0, 5";

		          $lsd1 = mysqli_query($mysqli, $lsd);

		          while($lsdp = mysqli_fetch_array($lsd1)){
						?>
				    	<a class="carousel-item">
				    		<div class="card-panel">
			            <?php if ($lsdp['promo']!="Tidak Ada Promo" and $lsdp['promo']!="") { ?>
			              <img src="../img/promo.png" class="logo-promo">
			            <?php } ?>
			            <?php if ($lsdp['diskon']>0) { ?>
			              <img src="../img/diskon.png" class="logo-diskon">
			            <?php } ?>
			            <div class="img-brg" style="background-image: url('../admin/foto_brg/<?php echo $lsdp['foto']; ?>');"></div>
			            <table>
			              <tbody>
			                <tr>
			                  <th class="center-align"><?php echo $lsdp['nama_barang']; ?></th>
			                </tr>
			                <tr>
			                  <th class="center-align">
			                    Rp. <?php if ($lsdp['diskon'] == 0) {
			                      echo number_format($lsdp['harga'],0,",",".");
			                    } else {
			                      echo '<del>'.number_format($lsdp['harga'],0,",",".").'</del> ke ';
			                      $diskon       = $lsdp['harga'] * $lsdp['diskon']/100;
			                      $harga_diskon = $lsdp['harga'] - $diskon;
			                      echo number_format($harga_diskon,0,",",".");
			                    } ?> 
			                    / <?php echo $lsdp['unit']; ?> <?php echo $lsdp['satuan']; ?> 
			                  </th>
			                </tr>
			                <tr>
			                  <?php 
			                    if ($lsdp['stok'] == 0) {
			                      echo '<th class="center-align red-text">Sold Out</th>';
			                     } else {
			                      echo '<th class="center-align green-text">Ready '.$lsdp['stok'].'</th>';
			                     }
			                  ?>
			                </tr>
			                <?php 
			                  if ($lsdp['promo']!="Tidak Ada Promo" and $lsdp['promo']!="") {
			                ?>
			                  <tr>
			                    <th class="center-align">
			                      <?php echo $lsdp['promo']; ?>
			                    </th>
			                  </tr>
			                <?php } ?>
			                <?php 
			                  if ($lsdp['diskon']>0) {
			                ?>
			                  <tr>
			                    <th class="center-align">
			                      Diskon <?php echo $lsdp['diskon']; ?>%
			                    </th>
			                  </tr>
			                <?php } ?>
			                <tr>
			                	<form action="func/pesan_func.php?action=insert-pes" enctype="multipart/form-data" method="post">
			                		<input type="hidden" name="id_barang" value="<?php echo $lsdp['id_barang']; ?>">
			                		<input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
		                  		<th class="pesan">
		                  			<?php 
		                  				if ($lsdp['stok'] == 0) {
		                  					echo '<button type="submit" class="waves-effect waves-light btn btn-pesan disabled">Pesan</button>';
		                  				} else {
		                  					echo '<button type="submit" class="waves-effect waves-light btn btn-pesan">Pesan</button>';
		                  				}
		                  			?>
		                  		</th>
			                	</form>
		                  </tr>
			              </tbody>
			            </table>
			          </div>
				    	</a>
				    <?php } ?>
				  </div>
				</div>
				<div class="col s12 m6 l6">
					<h6 class="center-align">Barang Diskon dan Promo Sekarang</h6>	
					<div class="carousel">
						<?php 
							$lsd = "SELECT * FROM list_barang WHERE diskon > 0 || promo != ''";

		          $lsd1 = mysqli_query($mysqli, $lsd);

		          while($lsdp = mysqli_fetch_array($lsd1)){
						?>
				    	<a class="carousel-item">
				    		<div class="card-panel">
			            <?php if ($lsdp['promo']!="Tidak Ada Promo" and $lsdp['promo']!="") { ?>
			              <img src="../img/promo.png" class="logo-promo">
			            <?php } ?>
			            <?php if ($lsdp['diskon']>0) { ?>
			              <img src="../img/diskon.png" class="logo-diskon">
			            <?php } ?>
			            <div class="img-brg" style="background-image: url('../admin/foto_brg/<?php echo $lsdp['foto']; ?>');"></div>
			            <table>
			              <tbody>
			                <tr>
			                  <th class="center-align"><?php echo $lsdp['nama_barang']; ?></th>
			                </tr>
			                <tr>
			                  <th class="center-align">
			                    Rp. <?php if ($lsdp['diskon'] == 0) {
			                      echo number_format($lsdp['harga'],0,",",".");
			                    } else {
			                      echo '<del>'.number_format($lsdp['harga'],0,",",".").'</del> ke ';
			                      $diskon       = $lsdp['harga'] * $lsdp['diskon']/100;
			                      $harga_diskon = $lsdp['harga'] - $diskon;
			                      echo number_format($harga_diskon,0,",",".");
			                    } ?> 
			                    / <?php echo $lsdp['unit']; ?> <?php echo $lsdp['satuan']; ?> 
			                  </th>
			                </tr>
			                <tr>
			                  <?php 
			                    if ($lsdp['stok'] == 0) {
			                      echo '<th class="center-align red-text">Sold Out</th>';
			                     } else {
			                      echo '<th class="center-align green-text">Ready '.$lsdp['stok'].'</th>';
			                     }
			                  ?>
			                </tr>
			                <?php 
			                  if ($lsdp['promo']!="Tidak Ada Promo" and $lsdp['promo']!="") {
			                ?>
			                  <tr>
			                    <th class="center-align">
			                      <?php echo $lsdp['promo']; ?>
			                    </th>
			                  </tr>
			                <?php } ?>
			                <?php 
			                  if ($lsdp['diskon']>0) {
			                ?>
			                  <tr>
			                    <th class="center-align">
			                      Diskon <?php echo $lsdp['diskon']; ?>%
			                    </th>
			                  </tr>
			                <?php } ?>
			                <tr>
			                	<form action="func/pesan_func.php?action=insert-pes" enctype="multipart/form-data" method="post">
			                		<input type="hidden" name="id_barang" value="<?php echo $lsdp['id_barang']; ?>">
			                		<input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
		                  		<th class="pesan">
		                  			<?php 
		                  				if ($lsdp['stok'] == 0) {
		                  					echo '<button type="submit" class="waves-effect waves-light btn btn-pesan disabled">Pesan</button>';
		                  				} else {
		                  					echo '<button type="submit" class="waves-effect waves-light btn btn-pesan">Pesan</button>';
		                  				}
		                  			?>
		                  		</th>
			                	</form>
		                  </tr>
			              </tbody>
			            </table>
			          </div>
				    	</a>
				    <?php } ?>
				  </div>
				</div>

			</div>
      <div class="container pencarian-barang">
        <div class="card">
          <?php include('../paginasi/pencarian.php'); ?>
        </div>
      </div>
    </div>

    <section id="list-barang">
    	<div class="container">
	      <div class="row">
	        <?php 
	          include('../paginasi/main-paginasi.php');

	          while($data = mysqli_fetch_array($dt)){
	        ?>
	        <div class="col s6 m3 l2">
	          <div class="card-panel">
	            <?php if ($data['promo']!="Tidak Ada Promo" and $data['promo']!="") { ?>
	              <img src="../img/promo.png" class="logo-promo">
	            <?php } ?>
	            <?php if ($data['diskon']>0) { ?>
	              <img src="../img/diskon.png" class="logo-diskon">
	            <?php } ?>
	            <div class="img-brg" style="background-image: url('../admin/foto_brg/<?php echo $data['foto']; ?>');"></div>
	            <table>
	              <tbody>
	                <tr>
	                  <th class="center-align"><?php echo $data['nama_barang']; ?></th>
	                </tr>
	                <tr>
	                  <th class="center-align">
	                    Rp. <?php if ($data['diskon'] == 0) {
	                      echo number_format($data['harga'],0,",",".");
	                    } else {
	                      echo '<del>'.number_format($data['harga'],0,",",".").'</del> ke ';
	                      $diskon       = $data['harga'] * $data['diskon']/100;
	                      $harga_diskon = $data['harga'] - $diskon;
	                      echo number_format($harga_diskon,0,",",".");
	                    } ?> 
	                    / <?php echo $data['unit']; ?> <?php echo $data['satuan']; ?> 
	                  </th>
	                </tr>
	                <tr>
	                  <?php 
	                    if ($data['stok'] == 0) {
	                      echo '<th class="center-align red-text">Sold Out</th>';
	                     } else {
	                      echo '<th class="center-align green-text">Ready '.$data['stok'].'</th>';
	                     }
	                  ?>
	                </tr>
	                <?php 
	                  if ($data['promo']!="Tidak Ada Promo" and $data['promo']!="") {
	                ?>
	                  <tr>
	                    <th class="center-align">
	                      <?php echo $data['promo']; ?>
	                    </th>
	                  </tr>
	                <?php } ?>
	                <?php 
	                  if ($data['diskon']>0) {
	                ?>
	                  <tr>
	                    <th class="center-align">
	                      Diskon <?php echo $data['diskon']; ?>%
	                    </th>
	                  </tr>
	                <?php } ?>
	                <tr>
	                	<form action="func/pesan_func.php?action=insert-pes" enctype="multipart/form-data" method="post">
	                		<input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
	                		<input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
                  		<th class="pesan">
                  			<?php 
                  				if ($data['stok'] == 0) {
                  					echo '<button type="submit" class="waves-effect waves-light btn btn-pesan disabled">Pesan</button>';
                  				} else {
                  					echo '<button type="submit" class="waves-effect waves-light btn btn-pesan">Pesan</button>';
                  				}
                  			?>
                  		</th>
	                	</form>
	                </tr>
	              </tbody>
	            </table>
	          </div>
	        </div>
	        <?php } ?>
	      </div>

	      <?php include('../paginasi/btn-paginasi.php'); ?>
	    </div>
    </section>
	</section>

	<?php
    // error_reporting(0);
    $desc = $_GET['desc']; 
    if ($desc == "success-in") {
	?>
	  <div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
	<?php } elseif ($desc == "failed-in") { ?>
		<div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
	<?php } elseif ($desc == "success-ed") { ?>
		<div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
	<?php } elseif ($desc == "failed-ed") { ?>
		<div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
	<?php } elseif ($desc == "success-del") { ?>
		<div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
	<?php } elseif ($desc == "failed-del") { ?>
		<div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
	<?php } ?>

	<script type="text/javascript">
  
	  const desc_in = $('.desc-in').data('flashdata')
	  if (desc_in == "success-in") {
	    Swal.fire(
	      'Berhasil!',
	      'Anda Telah Melakukan Pemesanan. Silahkan Cek di Riwayat dan Cetak Pesanan',
	      'success'
	    )
	  } else if (desc_in == "failed-in") {
	  	Swal.fire(
	      'Gagal!',
	      'Anda Gagal Melakukan Pemesanan',
	      'error'
	    )
	  } else if (desc_in == "success-del") {
	  	Swal.fire(
	      'Berhasil!',
	      'Anda Telah Melakukan Penghapusan Penjualan',
	      'success'
	    )
	  } else if (desc_in == "failed-del") {
	  	Swal.fire(
	      'Gagal!',
	      'Anda Gagal Melakukan Penghapusan Penjualan',
	      'error'
	    )
	  }

	</script>

<?php include('template/footer.php'); ?>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
<script type="text/javascript" src="asset/js/jquery-ui.js"></script>
<script type="text/javascript" src="asset/js/pesan.js"></script>