<?php
// Load file koneksi.php
include "../config.php";
// Ambil data NIS yang dikirim oleh index.php melalui URL
$id = $_GET['id_pegawai'];
// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
$query = "SELECT * FROM pegawai WHERE id_pegawai='".$id."'";
$sql = mysqli_query($dbconnect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
// Hapus foto yang telah diupload dari folder images
unlink("image/".$data['foto']);
// Query untuk menghapus data siswa berdasarkan NIS yang dikirim
$query2 = "DELETE FROM pegawai WHERE id_pegawai='".$id."'";
$sql2 = mysqli_query($dbconnect, $query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: index.php"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
}
?>