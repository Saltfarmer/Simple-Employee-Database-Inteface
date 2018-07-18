<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	if (isset($_POST['nik'])) {
    $nis           = mysql_real_escape_string(trim($_POST['nik']));
  	$nama          = mysql_real_escape_string(trim($_POST['nama']));
  	$tempat_lahir  = mysql_real_escape_string(trim($_POST['tempat_lahir']));

  	$tanggal_1       = $_POST['tanggal_lahir'];
  	$tgl_1           = explode('-',$tanggal_1);
  	$tanggal_lahir = $tgl_1[2]."-".$tgl_1[1]."-".$tgl_1[0];

  	$alamat        = mysql_real_escape_string(trim($_POST['alamat']));
  	$pendidikan		 = $_POST['pendidikan'];
  	$jenis_kelamin = $_POST['jenis_kelamin'];
  	$agama         = $_POST['agama'];
  	$no_telepon    = $_POST['no_telepon'];

  	$tanggal_2       = $_POST['tanggal_masuk_kerja'];
  	$tgl_2           = explode('-',$tanggal_2);
  	$tanggal_masuk_kerja = $tgl_2[2]."-".$tgl_2[1]."-".$tgl_2[0];

  	$bagian_kerja    = $_POST['bagian_kerja'];
  	$status_karyawan = $_POST['status_karyawan'];
  	$catatan         = $_POST['catatan'];

		// perintah query untuk mengubah data pada tabel is_siswa
		$query = mysql_query("UPDATE pegawai
                          SET(
                            nama = '$nama',
    												tempat_lahir = '$tempat_lahir',
    												tanggal_lahir = '$tanggal_lahir',
    												alamat = '$alamat',
    												pendidikan = '$pendidikan',
    												jenis_kelamin = '$jenis_kelamin',
    												agama = '$agama',
    												no_telepon = '$no_telepon',
    												no_rekening = '$no_rekening',
    												tanggal_masuk_kerja = '$tanggal_masuk_kerja',
    												bagian_kerja = '$bagian_kerja',
    												status_karyawan = '$status_karyawan',
    												catatan = '$catatan')
                          WHERE nik = '$nik'");

		// cek query
		if ($query) {
			// jika berhasil tampilkan pesan berhasil update data
			header('location: index.php?alert=3');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: index.php?alert=1');
		}
	}
}
?>
