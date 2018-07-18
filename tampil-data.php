<?php
if (isset($_POST['cari'])) {
  $cari = $_POST['cari'];
} else {
  $cari = "";
}
?>

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Data kepegawaian Pulepayung

          <div class="pull-right btn-tambah">
            <form class="form-inline" method="POST" action="index.php">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="glyphicon glyphicon-search"></i>
                  </div>
                  <input type="text" class="form-control" name="cari" placeholder="Cari ..." autocomplete="off" value="<?php echo $cari; ?>">
                </div>
              </div>
              <a class="btn btn-primary" href="?page=tambah">
                <i class="glyphicon glyphicon-plus"></i> Tambah
              </a>
            </form>
          </div>

        </h4>
      </div>

  <?php
  if (empty($_GET['alert'])) {
    echo "";
  } elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
  } elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data pegawai berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data pegawai berhasil diubah.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data pegawai berhasil dihapus.
          </div>";
  }
  ?>

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Data pegawai</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>pendidikan</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>No. Telepon</th>
                  <th>No. Rekening</th>
                  <th>Tanggal Masuk Kerja</th>
                  <th>Bagian Kerja</th>
                  <th>Status Karyawan</th>
                  <th>Catatan</th
                </tr>
              </thead>

              <tbody>
              <?php
              /* Pagination */
              $batas = 10;

              if (isset($cari)) {
                $jumlah_record = mysql_query("SELECT COUNT(*) FROM pegawai
                                              WHERE nik LIKE '%$cari%' OR nama LIKE '%$cari%'");
              } else {
                $jumlah_record = mysql_query("SELECT COUNT(*) FROM pegawai");
              }

              $jumlah  = mysql_result($jumlah_record, 0);
              $halaman = ceil($jumlah / $batas);
              $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $mulai   = ($page - 1) * $batas;
              /*-------------------------------------------------------------------*/
              $no = 1;
              if (isset($cari)) {
                $sql = mysql_query("SELECT * FROM pegawai
                                    WHERE nik LIKE '%$cari%' OR nama LIKE '%$cari%'
                                    ORDER BY nik DESC LIMIT $mulai, $batas");
              } else {
                $sql = mysql_query("SELECT * FROM pegawai
                                    ORDER BY nik DESC LIMIT $mulai, $batas");
              }

              while ($data = mysql_fetch_assoc($sql)) {

                $tanggal_1        = $data['tanggal_lahir'];
                $tgl_1            = explode('-',$tanggal_1);
                $tanggal_lahir  = $tgl_1[2]."-".$tgl_1[1]."-".$tgl_1[0];

                $tanggal_2        = $data['tanggal_masuk_kerja'];
                $tgl_2            = explode('-',$tanggal_2);
                $tanggal_masuk_kerja  = $tgl_2[2]."-".$tgl_2[1]."-".$tgl_2[0];

                echo "<tr>
                      <td width='50' class='center'>$no</td>
                      <td width='60'>$data[nik]</td>
                      <td width='150'>$data[nama]</td>
                      <td width='180'>$data[tempat_lahir], $tanggal_lahir</td>
                      <td width='250'>$data[alamat]</td>
                      <td width='50'>$data[pendidikan]</td>
                      <td width='120'>$data[jenis_kelamin]</td>
                      <td width='100'>$data[agama]</td>
                      <td width='80'>$data[no_telepon]</td>
                      <td width='60'>$data[no_rekening]</td>
                      <td width='90'>$tanggal_masuk_kerja</td>
                      <td width='100'>$data[bagian_kerja]</td>
                      <td width='60'>$data[status_karyawan]</td>
                      <td width='100'>$data[catatan]</td>

                      <td width='100'>
                        <div class=''>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?page=ubah&id=$data[nik]'>
                            <i class='glyphicon glyphicon-edit'></i>
                          </a>";
              ?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="proses-hapus.php?id=<?php echo $data['nik'];?>" onclick="return confirm('Anda yakin ingin menghapus pegawai <?php echo $data['nama']; ?>?');">
                            <i class="glyphicon glyphicon-trash"></i>
                          </a>
              <?php
                echo "
                        </div>
                      </td>
                    </tr>";
                $no++;
              }
              ?>
              </tbody>
            </table>
            <?php
            if (empty($_GET['hal'])) {
              $halaman_aktif = '1';
            } else {
              $halaman_aktif = $_GET['hal'];
            }
            ?>

            <a>
              Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> |
              Total <?php echo $jumlah; ?> data
            </a>

            <nav>
              <ul class="pagination pull-right">
              <!-- Button untuk halaman sebelumnya -->
              <?php
              if ($halaman_aktif<='1') { ?>
                <li class="disabled">
                  <a href="" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              } else { ?>
                <li>
                  <a href="?hal=<?php echo $page -1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              }
              ?>

              <!-- Link halaman 1 2 3 ... -->
              <?php
              for($x=1; $x<=$halaman; $x++) { ?>
                <li class="">
                  <a href="?hal=<?php echo $x ?>"><?php echo $x ?></a>
                </li>
              <?php
              }
              ?>

              <!-- Button untuk halaman selanjutnya -->
              <?php
              if ($halaman_aktif>=$halaman) { ?>
                <li class="disabled">
                  <a href="" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php
              } else { ?>
                <li>
                  <a href="?hal=<?php echo $page +1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php
              }
              ?>
              </ul>
            </nav>
          </div>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
