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
            <h3 class="card-title">Data Karyawan</h3>
            <a href="<?= base_url('karyawan/add_karyawan')?>" class="btn btn-primary btn-sm float-right"> <i class='fas fa-plus'> </i> Tambah Data </a>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('message');?>
            <?= $this->session->flashdata('hapus');?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nik</th>
                  <th>Nama Karyawan</th>
                  <th>Jabatan</th>
                  <th>Divisi</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                // $no = 1;
                foreach ($karyawan as $row) 
                {?>
                  <tr>
                    <td><?= ++$start; ?></td>
                    <td><?= $row->nip?></td>
                    <td><?= $row->username?></td>
                    <td><?= $row->jabatan?></td>
                    <td><?= $row->divisi?></td>
                    <td>
                     <?php if ($row->status_user == '1') {
                      echo "Active";
                     } else {
                      echo "Non Active";
                     }
                     ?>
                     </td>
                     <td>
                      <a href="<?= base_url('karyawan/edit_karyawan/' . $row->id_users)?>" class="btn btn-warning btn-sm">
                          <i class="fa fa-edit"></i>
                      </a>
                      <a onclick="return confirm('Yakin Akan Data Di Hapus') "href="<?= base_url('karyawan/delete_karyawan/' . $row->id_users)?>" class="btn btn-danger btn-sm">
                          <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?> 
              
              </tbody>
            </table>
            <p>COba</p>
            <?= $this->pagination->create_links();?>    
          </div>
             
        </div>
      </div>
    </div>
  </section>
</div>