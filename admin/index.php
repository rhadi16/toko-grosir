<?php include('template/header.php'); ?>

	<section id="hal-utama">
		<div class="container">
			<div class="container">
				<div class="row">
			    <div class="col s12">
			      <div class="card-panel blue darken-2 center-align">
			        <div class="row">
			        	<div class="col s12 m6">
			        		<a class="waves-effect waves-light btn modal-trigger deep-orange darken-1" href="#pilih-admin">Pilih Admin Yang Bertugas</a>
			        	</div>
			        	<div class="col s12 m6">
			        		<a class="waves-effect waves-light btn brown darken-1" href="pegawai.php">Kelola Pegawai</a>
			        	</div>
			        	<div class="col s12 m6">
			        		<a class="waves-effect waves-light btn brown darken-1" href="list-barang.php">Kelola Barang</a>
			        	</div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</section>

	<!-- Modal Structure -->
  <div id="pilih-admin" class="modal">
  	<form action="func/index_func.php?action=admin" method="post">
	    <div class="modal-content">
	      <h4>Pemilihan Admin</h4>
	      <label>Pilih Admin</label>
			  <select class="browser-default" name="id_nama">
			    <option value="" disabled selected>-- Pilih Admin --</option>
			    <?php 
			    	$qry = "SELECT * FROM pegawai";

			    	$dt = mysqli_query($mysqli, $qry);

						while($data = mysqli_fetch_array($dt)){
			    ?>
			    		<option value="<?php echo $data['id'].'||'.$data['nama']; ?>">
			    			<?php echo $data['nama']; ?>
			    		</option>
			    <?php } ?>
			  </select>
	    </div>
	    <div class="modal-footer">
	      <a class="waves-effect waves-light btn modal-close red darken-4"><i class="material-icons left">close</i>Tutup</a>
				<button type="submit" class="waves-effect waves-light btn light-green accent-4"><i class="material-icons left">check</i>Pilih</button>
	    </div>
    </form>
  </div>

<?php include('template/footer.php'); ?>