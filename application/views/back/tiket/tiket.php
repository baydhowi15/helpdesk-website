<?php if(is_it()){?>
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
            <h3 class="card-title"><b>Data Tiket</b></h3>
            <a href="<?= base_url('tiket/add_tiket')?>" class="btn btn-primary btn-sm float-right" data-toggle ="modal" data-target="#form_tiket"> <i class='fas fa-plus'> </i> Tambah Data </a>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('message');?>
            <?= $this->session->flashdata('hapus');?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Tiket</th>
                  <th>Judul Tiket</th>
                  <th>Status Tiket</th>
                  <th>Konfirmasi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($tiket as $row) 
                {?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->no_tiket?></td>
                    <td><?= $row->judul_tiket?></td>
                    <td>
                     <?php if ($row->status_tiket == '0') {
                      echo '<span class="badge badge-warning"> Menunggu</span>';
                     } elseif ($row->status_tiket == '1'){
                        echo '<span class="badge badge-info"> Respon</span>';
                     } elseif ($row->status_tiket == '2') {
                       echo '<span class="badge badge-success"> Proses</span>';
                     } else {
                      echo '<span class="badge badge-danger"> Selesai</span>';
                     }
                     ?>
                    </td>
                    <td>
                      <?php
                        if ($row->status_tiket == '0') {
                          echo '<a href ="javascript:void(0);" data-toggle="modal" data-target="#modal_tiket" id="select_tiket" data-id_tiket="' . $row->id_tiket . '" data-status_tiket="' . $row->status_tiket . '" class="btn btn-success"> Konfirmasi </a>';
                        } elseif ($row->status_tiket == '1') {
                            echo '<a href ="javascript:void(0);" data-toggle="modal" data-target="#modal_reply" id="reply-message"
                            data-tiket_id="' . $row->id_tiket . '" 
                            data-id_tiket_id="' . $row->id_tiket . '"
                            data-judul_tiket="' . $row->status_tiket . '" 
                            data-deskripsi="' . $row->deskripsi . '
                            "class="btn btn-warning btn-sm"> Membalas </a>';
                        } elseif ($row->status_tiket == '2') {
                            echo '<a href ="javascript:void(0);" data-toggle="modal" data-target="#modalclosetiket" id="ctiket"
                            data-closetiket="' . $row->id_tiket . '" 
                            data-closestatus="' . $row->id_tiket . '"
                            class="btn btn-primary btn-sm"> Tutup Tiket </a>';
                        } else {
                          echo '<a href ="javascript:void(0);" class="btn btn-danger btn-sm"> Solved </a>';
                        }

                      ?>
                    </td>
                     <td>
                      <a href="<?= base_url('tiket/detail_tiket/' . $row->no_tiket)?>" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i>
                      </a>
                      <a onclick="return confirm('Yakin Akan Data Di Hapus') "href="<?= base_url('tiket/delete_tiket/' . $row->id_tiket)?>" class="btn btn-danger btn-sm">
                          <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?> 
              
              </tbody>
            </table>
          </div>        
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="form_tiket">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-tittle">Form Tambah Tiket </h5>
        <button class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('tiket/save_tiket')?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label> Keluhan </label>
                  <input type="hidden" name="no_tiket" value="<?= $no_tiket?>" class="form-control"></input>
                  <input type="text" name="judul_tiket" class="form-control"></input>
                </div>
                <div class="form-group">
                  <label> Keterangan </label>
                  <textarea name="deskripsi" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label> Gambar </label><br>
                  <input type="file" name="gambar_tiket"></input>
                </div>


                <button type="submit" class="btn btn-primary btn-sm"> <li class="fas fa-save"></li> Simpan </button>

            </form>
    </div>
   </div> 
  </div>
</div>

<div class="modal fade" id="modal_tiket">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-tittle">Yakin Confirm Tiket </h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('tiket/save_tiket_waiting')?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="hidden" name="id_tiket" id="id_tiket" class="form-control"></input>
                  <input type="hidden" name="status_tiket" value="1" class="form-control"></input>
                </div>


                <button type="submit" class="btn btn-primary btn-sm"> <li class="fas fa-save"></li> Simpan </button>

            </form>
    </div>
   </div> 
  </div>
</div>

<div class="modal fade" id="modal_reply">
  <?= $this->session->flashdata('message');?>
  <?= $this->session->flashdata('hapus');?>
  <?= validation_errors();?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-tittle">Form Tanggapan IT Support</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('tiket/save_tanggapan')?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" name="id_tiket" id="id_tiket_id" class="form-control"></input>
            <input type="hidden" name="tiket_id" id="tiket_id" class="form-control"></input>
                </div>

                <div class="form-group">
                  <label for="keluhan">Keluhan</label>
                  <input type="text" id="judul_tiket" class="form-control" readonly></input>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea type="text" id="deskripsi" class="form-control" readonly></textarea>
                </div>
                <div class="form-group">
                  <label for="tanggapan">Tanggapan</label><br>
                  <textarea name="tanggapan" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label for="tanggapan">Gambar Tanggapan</label><br>
                  <input type="file" name="gambar_tanggapan" class="form-control"></input>
                </div>


                <button type="submit" class="btn btn-primary btn-sm"> <li class="fas fa-save"></li> Reply Message </button>

        </form>
    </div>
   </div> 
  </div>
</div>

<div class="modal fade" id="modalclosetiket">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-tittle">Yakin Close Tiket </h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('tiket/save_close_tiket')?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="hidden" name="id_tiket" id="closetiket" class="form-control"></input>
                  <input type="hidden" name="status_tiket" value="3" class= "form-control"></input>
                </div>


                <button type="submit" class="btn btn-primary btn-sm"> <li class="fas fa-save"></li> Close Tiket </button>

            </form>
    </div>
   </div> 
  </div>
</div>


<script>
  $(document).ready(function(){
    $(document).on('click','#select_tiket', function()
    {
      var id_tiket = $(this).data('id_tiket')
      var status_tiket = $(this).data('status_tiket')

      $('#id_tiket').val(id_tiket)
      $('#status_tiket').val(status_tiket)
    })

    $(document).on('click','#reply-message', function()
    {
      var id_tiket = $(this).data('id_tiket')
      var id_tiket_id = $(this).data('id_tiket_id')
      var judul_tiket = $(this).data('judul_tiket')
      var deskripsi = $(this).data('deskripsi')

      $('#id_tiket').val(id_tiket)
      $('#id_tiket_id').val(id_tiket_id)
      $('#judul_tiket').val(judul_tiket)
      $('#deskripsi').val(deskripsi)
    })

    $(document).on('click','#ctiket', function()
    {
      var closetiket = $(this).data('closetiket')
      

      $('#closetiket').val(closetiket)
    })
  })
</script>
<?php } else { ?>
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
            <h3 class="card-title">Data Tiket</h3>
            <a href="<?= base_url('tiket/add_tiket')?>" class="btn btn-primary btn-sm float-right" data-toggle ="modal" data-target="#form_tiket"> <i class='fas fa-plus'> </i> Tambah Data </a>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('message');?>
            <?= $this->session->flashdata('hapus');?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Tiket</th>
                  <th>Judul Tiket</th>
                  <th>Status Tiket</th>
                  <th>Konfirmasi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($tiket_user as $row) 
                {?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->no_tiket?></td>
                    <td><?= $row->judul_tiket?></td>
                    <td>
                     <?php if ($row->status_tiket == '0') {
                      echo '<span class="badge badge-warning">Menunggu</span>';
                     } elseif ($row->status_tiket == '1'){
                        echo '<span class="badge badge-info"> Respon</span>';
                     } elseif ($row->status_tiket == '2') {
                       echo '<span class="badge badge-success"> Proses</span>';
                     } else {
                      echo '<span class="badge badge-danger"> Tiket Selesai</span>';
                     }
                     ?>
                    </td>
                     <td>
                      <a href="<?= base_url('tiket/detail_tiket/' . $row->no_tiket)?>" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?> 
              
              </tbody>
            </table>
          </div>        
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="form_tiket">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-tittle">Form Tambah Tiket </h5>
        <button class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('tiket/save_tiket')?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label> Keluhan </label>
                  <input type="hidden" name="no_tiket" value="<?= $no_tiket?>" class="form-control"></input>
                  <input type="text" name="judul_tiket" class="form-control"></input>
                </div>
                <div class="form-group">
                  <label> Keterangan </label>
                  <textarea name="deskripsi" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label> Gambar </label><br>
                  <input type="file" name="gambar_tiket"></input>
                </div>


                <button type="submit" class="btn btn-primary btn-sm"> <li class="fas fa-save"></li> Simpan </button>

            </form>
    </div>
   </div> 
  </div>
</div>


<?php } ?>