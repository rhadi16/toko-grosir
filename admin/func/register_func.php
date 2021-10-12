<?php  
  include '../config/connect.php';
  include '../config/auth.php';
 
	$action  = $_GET['action'];

	if($action == "delete")
	{ 
	  $mitra = $_POST['mitra'];

	  $result = mysqli_query($mysqli, "INSERT INTO tb_mitra (id, mitra) 
		                               VALUES(null, '$mitra')") or die(mysqli_error($mysqli));
	  
	  if($result){ 
	      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/mitra.php" </script>';
	  }else{
	      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	  }
	}elseif($action == "update")
	{
	  $id 	 = $_POST['id'];
	  $mitra = $_POST['mitra'];

	  $result = mysqli_query($mysqli, "UPDATE tb_mitra
	  									SET 
	  									   mitra = '$mitra'
	  									   WHERE id = $id
	  									") or die(mysqli_error($mysqli));

	  if(isset($result)){
    		echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/mitra.php" </script>';
	  }else{
	      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	  }
	}
?>