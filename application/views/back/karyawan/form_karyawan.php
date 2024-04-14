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
            <h3 class="card-title">Form Karyawan</h3>
            <a href="<?= base_url('karyawan')?>" class="btn btn-warning btn-sm float-right"> <i class="fas fa-angle-left"></i> Kembali ke Form Karyawan </a>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('message');?>
            <?= $this->session->flashdata('hapus');?>
            <?= validation_errors();?>
            <form action="<?= base_url('karyawan/save_karyawan')?>" method="POST">
                <div class="input-group mb-3">
                  <input type="text" name="nip" class="form-control" placeholder="NIP">
                </div>
                 <div class="input-group mb-3">
                  <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="input-group mb-3">
                  <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="input-group mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="input-group mb-3">
                  <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="input-group mb-3">
                  <select name="jabatan" class="form-control">
                    <option value=""> --Pilih Jabatan-- </option>
                    <?php foreach ($jabatan as $key => $row) { ?>
                    <option value="<?= $row->jabatan ?>"><?= $row->jabatan?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <select name="divisi" class="form-control">
                    <option value=""> --Pilih Divisi-- </option>
                    <?php foreach ($divisi as $key => $row) { ?>
                    <option value="<?= $row->divisi ?>"><?= $row->divisi?></option>
                    <?php } ?>
                  </select>

                </div>


                <button type="submit" class="btn btn-primary btn-sm float-right"> <li class="fas fa-save"> </li> Simpan </button>

            </form>
          </div>        
        </div>
      </div>
    </div>
  </section>
</div>