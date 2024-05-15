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
            <h3 class="card-title">Edit Karyawan <?= $users->username?></h3>
            <a href="<?= base_url('karyawan')?>" class="btn btn-warning btn-sm float-right"> <i class="fas fa-angle-left"></i> Kembali ke Form Karyawan </a>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('message');?>
            <?= $this->session->flashdata('hapus');?>
            <?= validation_errors();?>
            <form action="<?= base_url('karyawan/update_karyawan')?>" method="POST">
                <div class="input-group mb-3">
                  <input type="hidden" name="id_users" value="<?= $users->id_users?>" class="form-control">
                  <input type="text" name="nip" value="<?= $users->nip?>" class="form-control" placeholder="NIP" readonly>
                </div>
                 <div class="input-group mb-3">
                  <input type="text" name="username" value="<?= $users->username?>" class="form-control" placeholder="Username">
                </div>
                <div class="input-group mb-3">
                  <input type="text" name="email" value="<?= $users->email?>" class="form-control" placeholder="Email">
                </div>
                
                <div class="input-group mb-3">
                  <select name="jabatan" class="form-control">
                    <option value=""> --Pilih Jabatan-- </option>
                    <?php foreach ($jabatan as $key => $row) { ?>
                    <option value="<?= $row->jabatan ?>"
                    <?= $row->jabatan == $users->jabatan ? 'selected' : null ?>>
                    <?= $row->jabatan?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <select name="divisi" class="form-control">
                    <option value=""> --Pilih Divisi-- </option>
                    <?php foreach ($divisi as $key => $row) { ?>
                    <option value="<?= $row->divisi ?>" 
                    <?= $row->divisi == $users->divisi ? 'selected' : null ?>>
                    <?= $row->divisi?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <select name="status_user" class="form-control">
                    <option value=""> --Pilih Status User-- </option>
                    <option value="0" <?=$users->status_user == '0'? 'selected' : ' '?>> Non Active </option>
                    <option value="1" <?=$users->status_user == '1'? 'selected' : ' '?>> Active </option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <select name="level_user" class="form-control">
                    <option value=""> --Pilih Level User-- </option>
                    <option value="1" <?=$users->level_user == '1'? 'selected' : ' '?>> STAFF </option>
                    <option value="2" <?=$users->level_user == '2'? 'selected' : ' '?>> IT </option>
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