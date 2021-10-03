<?php include('template/header.php'); ?>
<link rel="stylesheet" type="text/css" href="asset/css/pembelian-style.css">

	<section id="pembelian">
		<div class="container">
			<a class="waves-effect waves-light btn" id="tambah-kolom"><i class="material-icons left">add</i>Tambah Form Isian</a>
			<div class="row">
				<form>
				<div class="element col s12" id="div_1">
			    <div id="txt_1">
			      <div class="card-panel">
							<div class="row">
						    <div class="col s12 m4">
					        <div class="ui-widget input-field">
					          <select id="combobox1" name="id_barang" required>
					            <option value="">Select one...</option>
					            <?php 
                        $qry1 = "SELECT * FROM list_barang";

                        $dt1 = mysqli_query($mysqli, $qry1);

                        while($data1 = mysqli_fetch_array($dt1)){
                      ?>
						            <option value="<?php echo $data1['id_barang']; ?>"><?php echo $data1['nama_barang']; ?></option>
					          	<?php } ?>
					          </select>
					          <label>Pilih Barang</label>
					        </div>
						    </div>
						    <div class="input-field col s12 m4">
				          <input placeholder="" id="harga_yg_dibeli" type="text" class="validate" name="harga_yg_dibeli" required>
				          <label for="harga_yg_dibeli">Harga Total</label>
				        </div>
				        <div class="input-field col s12 m4">
				          <input placeholder="" id="stok_yg_dibeli" type="text" class="validate" name="stok_yg_dibeli" required>
				          <label for="stok_yg_dibeli">Jumlah Barang</label>
				        </div>
						  </div>
			      </div>
			    </div>
				</div>
				<div class="col s12">
					<button type="submit" class="waves-effect waves-light btn" id="input-pembelian"><i class="material-icons left">send</i>Input</button>
				</div>
				</form>
		  </div>
		</div>
	</section>

<?php include('template/footer.php'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="asset/js/pembelian-script.js"></script>