<?php 

require 'function.php';

// ambil / menangkap lalu di masukan ke dlm id
$id = $_GET["id"];

if ( hapus($id) > 0 ) {
	echo " 
			<script> 
				alert('Data Berhasil Dihapus!');
				document.location.href = 'index.php';
			</script>";
} else {
	echo " 
			<script> 
				alert('Data Gagal Dihapus!');
				document.location.href = 'index.php';
			</script>";
}

 ?>