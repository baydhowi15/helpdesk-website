<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        
      </div>
      
    </div>
  </section>
  <section class="content">
    <div class="row mt-2">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><strong>Laporan</strong></h3>
          </div>
          
          <div class="card-body">
          
            <form action="<?= base_url('laporan/print_laporan')?>" method="POST" target="_blank">
                <div class="form-group">
                  <label> Tanggal Awal </label>
                  <input type="date" name="tgl_awal" id="tgl_awal" value="<?= date('Y-m-d');?>" class="form-control"></input>
                </div>
                <div class="form-group">
                  <label> Tanggal Akhir </label>
                  <input type="date" name="tgl_akhir" id="tgl_akhir" value="<?= date('Y-m-d');?>" class="form-control"></input>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-sm"> <li class="fas fa-print"></li> Cetak </button>

            </form>
          </div>        
        </div>
      </div>
    </div>
  </section>
</div>