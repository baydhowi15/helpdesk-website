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
            <h3 class="card-title">Profile Karyawan</h3>
            <a href="<?= base_url('dashboard')?>" class="btn btn-warning btn-sm float-right"> <i class="fas fa-angle-left"></i> Kembali ke Dashboard </a>
          </div>
          <div class="card-body">
            <?= validation_errors();?>
            <?= $this->session->flashdata('message');?>
            <form action="<?= base_url('karyawan/update_profile')?>" method="POST" >
                <div class="form-input-group mb-3">
                  <label> Id User </label>
                  <input type="hidden" name="id_users" value="<?=$karyawan->id_users?>"></input>
                  <input type="text" readonly name="nip" class="form-control" placeholder="NIP" value="<?=$karyawan->nip?>">
                </div>
                <label> Username </label>
                 <div class="form-input-group mb-3">
                  <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$karyawan->username?>">
                </div>
                <label> Email </label>
                <div class="form-input-group mb-3">
                  <input type="text" name="email" class="form-control" placeholder="Email" value="<?=$karyawan->email?>">
                </div>
                <div class="form-input-group mb-3">
                  <label> Jabatan </label>
                  <select name="jabatan" class="form-control">
                    <option value=""> --Pilih Jabatan-- </option>
                    <?php foreach ($jabatan as $key => $row) { ?>
                    <option value="<?= $row->jabatan ?>" <?= $row->jabatan == $karyawan->jabatan ? "selected" : null ?>><?= $row->jabatan?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-input-group mb-3">
                  <label> Divisi </label>
                  <select name="divisi" class="form-control">
                    <option value=""> --Pilih Divisi-- </option>
                    <?php foreach ($divisi as $key => $row) { ?>
                    <option value="<?= $row->divisi ?>" <?= $row->divisi == $karyawan->divisi ? "selected" : null ?>><?= $row->divisi?></option>
                    <?php } ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm float-right"> <li class="fas fa-save"> </li> Ubah </button>

            </form>
          </div>        
        </div>
      </div>
    </div>
  </section>
</div>