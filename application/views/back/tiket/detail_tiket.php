<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        
      </div>
      
    </div>
  </section>

  <!-- Content Wrapper. Contains page content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5> No Tiket : <?=$tiket->no_tiket;?></h5>
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-ticket-alt"></i> IT HelpDesk
                    <small class="float-right">Date: <?=$tiket->tgl_daftar;?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?= $tiket->username;?></strong><br>
                    Divisi : <?=$tiket->divisi;?><br>
                    Jabatan : <?=$tiket->jabatan;?><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Status Tiket</b> : 
                    <?php 
                      if ($tiket->status_tiket == '0') {
                      echo '<span class="badge badge-warning"> Menunggu</span>';
                     } elseif ($tiket->status_tiket == '1'){
                        echo '<span class="badge badge-info"> Respon</span>';
                     } elseif ($tiket->status_tiket == '2') {
                       echo '<span class="badge badge-success"> Proses</span>';
                     } else {
                      echo '<span class="badge bg-green"> Selesai</span>';
                     }
                     ?>
                     <br>
                     <br>
                    <b>No Tiket</b> : <?=$tiket->no_tiket;?>
                     <br>
                    <b>Selesai</b> : 
                     <?php
                     if($tiket->status_tiket =='3'){
                      echo $tiket->waktu_tanggapan;
                     } else {
                      echo "--";
                     }
                     ?>
              
                </div>
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-6 table-responsive">
                  <label for=""> Keluhan Karyawan</label>
                  <input type="text" value="<?=$tiket->judul_tiket?>" readonly class="form-control">
                  <label for=""> Deskripsi</label>
                  <textarea rows="6" readonly class="form-control"><?=$tiket->deskripsi?></textarea>
                </div>
                <div class="col-6">
                    <label for=""> Tanggapan Dept IT</label>
                    <textarea rows="10" readonly class="form-control"><?=$tiket->tanggapan?></textarea>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead"><b>Foto Komplen / Keluhan</b></p>
                  <img src="<?= base_url('assets/img/tiket/'. $tiket->gambar_tiket); ?>" width="250px">

                  
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead"><b>Foto Tanggapan</b></p>
                  <img src="<?= base_url('assets/img/tanggapan/'. $tiket->gambar_tanggapan); ?>" width="250px">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <!-- <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div> -->
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>