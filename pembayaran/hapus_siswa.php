<?php
include 'config/koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM anggota WHERE id = '".$_GET['id']."'");

 if($delete){
	header('location: data_siswa.php?hapus=sukses');
}
else{
		header('location: data_siswa.php?hapus=gagal');
}

?>
