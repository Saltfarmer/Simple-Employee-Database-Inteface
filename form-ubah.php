  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i>
          Ubah data pegawai
        </h4>
      </div> <!-- /.page-header -->
      <?php
      if (isset($_GET['id'])) {
        $nik  = $_GET['id'];
        $sql  = mysql_query("SELECT * FROM pegawai WHERE nik='$nik'");
        $data = mysql_fetch_assoc($sql);

        $tanggal_1        = $data['tanggal_lahir'];
        $tgl_1            = explode('-',$tanggal_1);
        $tanggal_lahir  = $tgl_1[2]."-".$tgl_1[1]."-".$tgl_1[0];

        $tanggal_2        = $data['tanggal_masuk_kerja'];
        $tgl_2            = explode('-',$tanggal_2);
        $tanggal_masuk_kerja  = $tgl_2[2]."-".$tgl_2[1]."-".$tgl_2[0];
      }
      ?>
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="proses-ubah.php">
            <div class="form-group">
              <label class="col-sm-2 control-label">NIK</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="nik" value="<?php echo $data['nik']; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Pegawai</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $data['nama']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat Lahir</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="tempat_lahir" autocomplete="off" value="<?php echo $data['tempat_lahir']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" value="<?php echo $tanggal_lahir; ?>" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-3">
                <textarea class="form-control" name="alamat" rows="3" required><?php echo $data['alamat']; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Pendidikan</label>
              <div class="col-sm-3">
                <select class="form-control" name="pendidikan" placeholder="Pilih Pendidikan" required>
                  <option value="<?php echo $data['pendidikan']; ?>"><?php echo $data['pendidikan']; ?></option>
                  <option value="">Tidak Sekolah</option>
                  <option value="SD">SD/</option>
                  <option value="SMP">SMP</option>
                  <option value="SMA">SMA</option>
                  <option value="S1">Sarjana</option>
                  <option value="S2">Master</option>
                  <option value="S3">Doctor</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-4">
              <?php
              if ($data['jenis_kelamin']=='Laki-laki') { ?>
                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
                </label>

                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                </label>
              <?php
              } else { ?>
                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                </label>

                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Perempuan" checked> Perempuan
                </label>
              <?php
              }
              ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Agama</label>
              <div class="col-sm-3">
                <select class="form-control" name="agama" placeholder="Pilih Agama" required>
                  <option value="<?php echo $data['agama']; ?>"><?php echo $data['agama']; ?></option>
                  <option value=""></option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">No. Telepon</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="no_telepon" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['no_telepon']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">No. Rekening</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="no_rekening" autocomplete="off" maxlength="15" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['no_rekening']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Masuk Kerja</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_masuk_kerja" autocomplete="off" value="<?php echo $tanggal_masuk_kerja; ?>" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Bagian Kerja</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="bagian_kerja" autocomplete="off" value="<?php echo $data['bagian_kerja']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Status Karyawan</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="status_karyawan" autocomplete="off" value="<?php echo $data['status_karyawan']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Catatan</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="catatan" value="<?php echo $data['catatan']; ?>" autocomplete="off">
              </div>
            </div>

            <hr/>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                <a href="index.php" class="btn btn-default btn-reset">Batal</a>
              </div>
            </div>
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
