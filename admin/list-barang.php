<?php include('template/header.php'); ?>

<?php 

	$qry = "SELECT * FROM list_barang";

	$orderby = "";

  $view   = "list-barang.php";

  $column = [
              'value'  => ['nama_barang', 'harga', 'stok', 'promo', 'diskon'],
              'label'  => ['Nama Barang', 'Harga Barang', 'Stok', 'Promo', 'Diskon'],
              'type'   => ['text', 'double', 'int', 'text', 'int']
            ];

?>

	<section id="list-barang">
		<div class="container">
			<h5 class="title">List Barang</h5>
			<a class="waves-effect waves-light btn modal-trigger blue darken-3" href="#tambah-barang"><i class="material-icons left">add</i>Tambah Barang</a>

			<!-- Modal Structure -->
		  <div id="tambah-barang" class="modal">
			  <form action="func/list_barang_func.php?action=insert" enctype="multipart/form-data" method="post">
			    <div class="modal-content">
			      <h4>Form Tambah Barang</h4>
				      <div class="row">
				        <div class="input-field col s12">
				          <input id="nama_barang" type="text" class="validate" name="nama_barang" required>
				          <label for="nama_barang">Nama Barang</label>
				        </div>
				        <div class="input-field col s12">
				          <input id="harga" type="number" class="validate" name="harga" required>
				          <label for="harga">Harga Barang</label>
				        </div>
				        <div class="input-field col s12">
				          <input id="stok" type="number" class="validate" name="stok" required>
				          <label for="stok">Stok Barang</label>
				        </div>
				        <div class="input-field col s12">
				          <input id="promo" type="text" class="validate" name="promo">
				          <label for="promo">Promo(Boleh Tidak Diisi)</label>
				        </div>
				        <div class="input-field col s12">
				          <select name="diskon" required>
							      <option value="0" selected>0%</option>
							      <?php 
							      	$i = 1;
							      	for ($i=1; $i <= 100; $i++) { 
							      ?>
							      <option value="<?php echo $i; ?>"><?php echo $i.'%'; ?></option>
							    	<?php } ?>
							    </select>
							    <label>Diskon</label>
				        </div>
				        <div class="input-field col s12">
				          <input id="satuan" type="text" class="validate" name="satuan" required>
				          <label for="satuan">Satuan(pcs/liter/kg)</label>
				        </div>
				        <div class="input-field col s12">
				          <input id="unit" type="number" class="validate" name="unit" required>
				          <label for="unit">unit(1 pcs/1 liter/1 kg)</label>
				        </div>
				        <div class="file-field col s12 input-field">
						      <div class="btn">
						        <span>Foto Barang</span>
						        <input type="file" name="file_name" required>
						      </div>
						      <div class="file-path-wrapper">
						        <input class="file-path validate" type="text">
						      </div>
						    </div>
				      </div>
			    </div>
			    <div class="modal-footer">
			      <a class="waves-effect waves-light btn modal-close red darken-4"><i class="material-icons left">close</i>Tutup</a>
			      <button type="submit" class="waves-effect waves-light btn light-green accent-4"><i class="material-icons left">add</i>Tambah</button>
			    </div>
			  </form>
		  </div>

		  <div class="container">
	      <div class="container pencarian-barang">
	        <div class="card">
	          <?php include('../paginasi/pencarian.php'); ?>
	        </div>
	      </div>
	    </div>

			<div class="list">
				<div class="row parent">
					<?php 
						include('../paginasi/main-paginasi.php');

						while($data = mysqli_fetch_array($dt)) {
					?>
					<div class="col s12 m6 l4">
						<div class="card-panel">
			        <div class="row">
		            <div class="col s12">
		              <div class="img" style="background-image: url('foto_brg/<?php echo $data['foto']; ?>');"></div>
		            </div>
		            <div class="col s12">
		              <table>
		                <tbody>
		                  <tr>
		                    <th>Nama Barang</th>
		                    <td class="center-align"><?php echo $data['nama_barang']; ?></td>
		                  </tr>
		                  <tr>
		                    <th>Harga</th>
		                    <td class="center-align">
		                    	Rp. <?php if ($data['diskon'] == 0) {
		                    		echo number_format($data['harga'],0,",",".");
		                    	} else {
		                    		echo '<del>'.number_format($data['harga'],0,",",".").'</del> ke ';
		                    		$diskon 			= $data['harga'] * $data['diskon']/100;
		                    		$harga_diskon = $data['harga'] - $diskon;
		                    		echo number_format($harga_diskon,0,",",".");
		                    	} ?> 
		                    	/ <?php echo $data['unit']; ?> <?php echo $data['satuan']; ?>	
		                    </td>
		                  </tr>
		                  <tr>
		                    <th>Stok</th>
		                    <td class="center-align">
		                    	<?php 
		                    		if ($data['stok'] == 0) {
		                    		 	echo 'Sold Out';
		                    		 } else {
		                    		 	echo 'Ready '.$data['stok'];
		                    		 }
		                    	?>
		                    </td>
		                  </tr>
		                  <tr>
		                    <th>Promo</th>
		                    <td class="center-align"><?php echo $data['promo']; ?></td>
		                  </tr>
		                  <tr>
		                    <th>Diskon</th>
		                    <td class="center-align"><?php echo $data['diskon']; ?>%</td>
		                  </tr>
		                  <tr>
		                    <th>aksi</th>
		                    <td class="center-align">
		                    	<a class="waves-effect waves-light btn modal-trigger lime darken-1" href="#edit-barang<?php echo $data['id_barang']; ?>">edit</a>
		                    	<a class="waves-effect waves-light btn red darken-1 confirm-delete" style="cursor: pointer;">hapus</a>

		                    	<script type="text/javascript">
											      $('.confirm-delete').on('click', function(e) {
											        Swal.fire({
											          title: 'Anda Yakin?',
											          text: "Ingin Menghapus <?php echo $data['nama_barang']; ?>!",
											          icon: 'warning',
											          showCancelButton: true,
											          confirmButtonColor: '#3085d6',
											          cancelButtonColor: '#d33',
											          confirmButtonText: 'Ya, Yakin!'
											        }).then((result) => {
											          if (result.isConfirmed) {
											            window.location.href = "<?php echo 'func/list_barang_func.php?action=delete&id_barang='.$data['id_barang'].'&foto='.$data['foto'] ?>";
											          }
											        })
											      });
											    </script>
		                    </td>
		                  </tr>
		                </tbody>
		              </table>
		            </div>
		          </div>
			      </div>
					</div>

					<!-- Modal Structure -->
				  <div id="edit-barang<?php echo $data['id_barang']; ?>" class="modal edit-barang">
					  <form action="func/list_barang_func.php?action=update" enctype="multipart/form-data" method="post">
					    <div class="modal-content">
					      <h4>Edit Barang</h4>
					      <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
						      <div class="row">
						        <div class="input-field col s12">
						          <input id="nama_barang" type="text" class="validate" name="nama_barang" required value="<?php echo $data['nama_barang']; ?>">
						          <label for="nama_barang">Nama Barang</label>
						        </div>
						        <div class="input-field col s12">
						          <input id="harga" type="number" class="validate" name="harga" required value="<?php echo $data['harga']; ?>">
						          <label for="harga">Harga Barang</label>
						        </div>
						        <div class="input-field col s12">
						          <input id="stok" type="number" class="validate" name="stok" required value="<?php echo $data['stok']; ?>">
						          <label for="stok">Stok</label>
						        </div>
						        <div class="input-field col s12">
						          <input id="promo" type="text" class="validate" name="promo" value="<?php echo $data['promo']; ?>">
						          <label for="promo">Promo(Boleh Tidak Diisi)</label>
						        </div>
						        <div class="input-field col s12">
						          <select name="diskon" required>
									      <?php 
									      	$i = 0;
									      	for ($i=0; $i <= 100; $i++) { 
									      ?>
									      <option value="<?php echo $i; ?>" <?php if($data['diskon']==$i){ echo 'selected';} ?>><?php echo $i.'%'; ?></option>
									    	<?php } ?>
									    </select>
									    <label>Diskon</label>
						        </div>
						        <div class="input-field col s12">
						          <input id="satuan" type="text" class="validate" name="satuan" required value="<?php echo $data['satuan']; ?>">
						          <label for="satuan">Satuan(pcs/liter/kg)</label>
						        </div>
						        <div class="input-field col s12">
						          <input id="unit" type="number" class="validate" name="unit" required value="<?php echo $data['unit']; ?>">
						          <label for="unit">unit(1 pcs/1 liter/1 kg)</label>
						        </div>
						        <div class="file-field col s12 input-field">
								      <div class="btn">
								        <span>Foto Barang</span>
								        <input type="file" name="file_name">
								        <input type="hidden" name="file_name_sebelum" value="<?php echo $data['foto']; ?>">
								      </div>
								      <div class="file-path-wrapper">
								        <input class="file-path validate" type="text">
								      </div>
								    </div>
						      </div>
					    </div>
					    <div class="modal-footer">
					      <a class="waves-effect waves-light btn modal-close red darken-4"><i class="material-icons left">close</i>Tutup</a>
					      <button type="submit" class="waves-effect waves-light btn light-green accent-4"><i class="material-icons left">add</i>Ubah</button>
					    </div>
					  </form>
				  </div>
				<?php } ?>
				</div>
					<?php include('../paginasi/btn-paginasi.php'); ?>
			</div>
		</div>
	</section>

	<?php
    error_reporting(0);
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
	      'Anda Telah Melakukan Penambahan Barang',
	      'success'
	    )
	  } else if (desc_in == "failed-in") {
	  	Swal.fire(
	      'Gagal!',
	      'Anda Gagal Melakukan Penambahan Barang',
	      'error'
	    )
	  } else if (desc_in == "success-ed") {
	  	Swal.fire(
	      'Berhasil!',
	      'Anda Telah Melakukan Perubahan Barang',
	      'success'
	    )
	  } else if (desc_in == "failed-ed") {
	  	Swal.fire(
	      'Gagal!',
	      'Anda Gagal Melakukan Perubahan Barang',
	      'error'
	    )
	  } else if (desc_in == "success-del") {
	  	Swal.fire(
	      'Berhasil!',
	      'Anda Telah Melakukan Penghapusan Barang',
	      'success'
	    )
	  } else if (desc_in == "failed-del") {
	  	Swal.fire(
	      'Gagal!',
	      'Anda Gagal Melakukan Penghapusan Barang',
	      'error'
	    )
	  }

	</script>

<?php include('template/footer.php'); ?>