<div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Divisi</h3>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('message');?>
            <?= $this->session->flashdata('hapus');?>
            <table id="example1" class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Devisi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($divisi as $row) 
                {?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->divisi?></td>
                    <td> 
                      <a href="<?= base_url('divisi/edit_divisi/' . $row->id_divisi)?>" class="btn btn-warning btn-sm">
                          <i class="fa fa-edit"></i>
                      </a>
                      <a onclick="return confirm('Yakin Akan Data Di Hapus') "href="<?= base_url('divisi/delete_divisi/' . $row->id_divisi)?>" class="btn btn-danger btn-sm">
                          <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?> 
              
              </tbody>
            </table>
            <script>
              $(function () {
                $("#example1").DataTable({
                  "responsive": true,
                  "autoWidth": false,
                });
                $('#example2').DataTable({
                  "paging": true,
                  "lengthChange": false,
                  "searching": false,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                  "responsive": true,
                });
              });
          </script>
          </div>        
        </div>
