<!-- Aplikasi CRUD
************************************************
* Developer    : Indra Styawantoro
* Company      : Indra Studio
* Release Date : 1 Maret 2016
* Website      : http://www.indrasatya.com, http://www.kulikoding.net
* E-mail       : indra.setyawantoro@gmail.com
* Phone        : +62-856-6991-9769
* BBM          : 7679B9D9
-->

 <div class="row">
   <div class="col-md-12">
     <div class="page-header">
       <h4>
         <i class="glyphicon glyphicon-edit"></i>
         Input Data Pegawai
       </h4>
     </div> <!-- /.page-header -->

     <div class="panel panel-default">
       <div class="panel-body">
         <form class="form-horizontal" method="POST" action="proses-simpan.php">
           <div class="form-group">
             <label class="col-sm-2 control-label">NIK</label>
             <div class="col-sm-2">
               <input type="text" class="form-control" name="nik" maxlength="7" autocomplete="off" required>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-2 control-label">Nama Pegawai</label>
             <div class="col-sm-3">
               <input type="text" class="form-control" name="nama" autocomplete="off" required>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-2 control-label">Tempat Lahir</label>
             <div class="col-sm-3">
               <input type="text" class="form-control" name="tempat_lahir" autocomplete="off" required>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-2 control-label">Tanggal Lahir</label>
             <div class="col-sm-2">
               <div class="input-group">
                 <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" required>
                 <span class="input-group-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
                 </span>
               </div>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-2 control-label">Alamat</label>
             <div class="col-sm-3">
               <textarea class="form-control" name="alamat" rows="3" required></textarea>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-2 control-label">Pendidikan</label>
             <div class="col-sm-3">
               <select class="form-control" name="pendidikan" placeholder="Pilih Pendidikan" required>
                 <option value="">Tidak Sekolah</option>
                 <option value="SD">SD</option>
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
               <label class="radio-inline">
                 <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
               </label>

               <label class="radio-inline">
                 <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
               </label>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-2 control-label">Agama</label>
             <div class="col-sm-3">
               <select class="form-control" name="agama" placeholder="Pilih Agama" required>
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
               <input type="text" class="form-control" name="no_telepon" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-2 control-label">No. Rekening</label>
             <div class="col-sm-2">
               <input type="text" class="form-control" name="no_rekening" autocomplete="off" maxlength="15" onKeyPress="return goodchars(event,'0123456789',this)" required>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-2 control-label">Tanggal Masuk Kerja</label>
             <div class="col-sm-2">
               <div class="input-group">
                 <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_masuk_kerja" autocomplete="off" required>
                 <span class="input-group-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
                 </span>
               </div>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-2 control-label">Bagian Kerja</label>
             <div class="col-sm-2">
               <input type="text" class="form-control" name="bagian_kerja" autocomplete="off" required>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-2 control-label">Status Karyawan</label>
             <div class="col-sm-2">
               <input type="text" class="form-control" name="status_karyawan" autocomplete="off" required>
             </div>
           </div>

           <div class="form-group">
             <label class="col-sm-2 control-label">Catatan</label>
             <div class="col-sm-3">
               <input type="text" class="form-control" name="catatan" autocomplete="off">
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
