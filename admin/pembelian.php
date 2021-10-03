<?php include('template/header.php'); ?>
<link rel="stylesheet" type="text/css" href="asset/css/pembelian-style.css">
<?php 
  $qry    = "SELECT 
							a.*,
							b.nama_barang,
							b.stok
						FROM pembelian a
						LEFT JOIN list_barang b ON a.id_barang=b.id_barang;";
      
  $orderby = ""; 

  $view   = "pembelian.php";

  $column = [
              'value'  => ['nama_barang', 'stok'],
              'label'  => ['Nama Barang', 'Stok Barang'],
              'type'   => ['text', 'int']
            ];
?>

	<section id="pembelian">
		<div class="container">
			<h5 class="center-align title-form">Form Tambah Pembelian</h5>
			<a class="waves-effect waves-light btn" id="tambah-kolom"><i class="material-icons left">add</i>Tambah Form Isian</a>
			<div class="row">
				<form action="func/pembelian_func.php?action=insert" enctype="multipart/form-data" method="post">
				<div class="element col s12" id="div_1">
			    <div id="txt_1">
			      <div class="card-panel">
							<div class="row">
						    <div class="col s12 m4">
					        <div class="ui-widget input-field">
					          <select id="combobox1" name="id_barang[]" required>
					            <option value="">Select one...</option>
					            <?php 
                        $qry1 = "SELECT * FROM list_barang";

                        $dt1 = mysqli_query($mysqli, $qry1);

                        while($data1 = mysqli_fetch_array($dt1)){
                      ?>
						            <option value="<?php echo $data1['id_barang'].'||'.$data1['stok']; ?>"><?php echo $data1['nama_barang']; ?></option>
					          	<?php } ?>
					          </select>
					          <label>Pilih Barang</label>
					        </div>
						    </div>
						    <div class="input-field col s12 m4">
				          <input placeholder="" id="harga_yg_dibeli" type="number" class="validate" name="harga_yg_dibeli[]" required>
				          <label for="harga_yg_dibeli">Harga Total</label>
				        </div>
				        <div class="input-field col s12 m4">
				          <input placeholder="" id="stok_yg_dibeli" type="number" class="validate" name="stok_yg_dibeli[]" required>
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

		<div class="container list-barang">
			<h5 class="center-align title-form">List Pembelian</h5>
			<div class="card-panel">
				<table class="striped highlight centered">
	        <thead>
	          <tr>
	              <th>Nama Barang</th>
	              <th>Stok Yang Dibeli</th>
	              <th>Harga</th>
	              <th>Stok Sekarang</th>
	          </tr>
	        </thead>

	        <tbody>
	          <tr>
	            <td>Alvin</td>
	            <td>Eclair</td>
	            <td>$0.87</td>
	            <td>$0.87</td>
	          </tr>
	          <tr>
	            <td>Alvin</td>
	            <td>Eclair</td>
	            <td>$0.87</td>
	            <td>$0.87</td>
	          </tr>
	        </tbody>
	      </table>
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
	      'Anda Telah Melakukan Penambahan Jumlah Barang',
	      'success'
	    )
	  } else if (desc_in == "failed-in") {
	  	Swal.fire(
	      'Gagal!',
	      'Anda Gagal Melakukan Penambahan Jumlah Barang',
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="asset/js/pembelian-script.js"></script>