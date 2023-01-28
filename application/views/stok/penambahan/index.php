        <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
                        <a href="#" data-toggle="modal" data-target="#tambahStok" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Transaksi</a>
                    </div>

                    <?php 
                       if ($this->session->flashdata('massage')) 
                       {
                            echo ' <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>Sukses! </strong>'.$this->session->flashdata('massage');
                            echo '</div>';
                       }else if ($this->session->flashdata('massage_edit')) 
                       {
                            echo ' <div class="alert alert-warning alert-dismissible" role="alert">
                            <strong>Sukses! </strong>'.$this->session->flashdata('massage_edit');
                            echo '</div>';
                       }else if ($this->session->flashdata('error')) 
                       {
                            echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>Sukses! </strong>'.$this->session->flashdata('error');
                            echo '</div>';
                       }
                    ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th>
                                            <th>Nama Obat</th>
                                            <th>Nama Supplier</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php $i =1; ?>
                                        <?php foreach ($penambahan as $r) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $r['kode_transaksi']; ?></td>
                                            <td><?= $r['nama_obat']; ?></td>
                                            <td><?= $r['nama_supplier']; ?></td>
                                            <td><?= $r['jumlah']; ?></td>
                                            <td>
                                                <center>
                                                <a href="#" class="btn btn-info btn-circle" data-toggle="modal" data-target="#info<?= $r['id'];?>"><i class="fas fa-info-circle"></i></a>
                                                <!-- <a href="<?= base_url('stok/penambahan/edit/'). $r['id'] ; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a> -->
                                                <!-- <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete<?= $r['id'];?>"><i class="fas fa-trash"></i></a> -->
                                               </center>
                                            </td>
                                            <!-- <a href="" class="badge badge-warning">Access</a>
                                            <a href="" class="badge badge-success">Edit</a>
                                            <a href="" class="badge badge-danger">Delete</a> -->
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal -->
            <?php
  foreach ($penambahan as $r) : ?>
<div class="modal fade" id="info<?= $r['id'];?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data <?= $r['kode_transaksi']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
      <div class="card-body">
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Nama Obat</label> 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $r['nama_obat']; ?>" readonly> 
                    </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Nama Supplier</label> 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $r['nama_supplier']; ?>" readonly> 
                    </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Jumlah</label> 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $r['jumlah']; ?>" readonly> 
                    </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Harga</label> 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $r['harga']; ?>" readonly> 
                    </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Harga Total</label> 
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $r['harga_total']; ?>" readonly> 
                    </div>
            </div>
             <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Tanggal Masuk</label> 
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $r['tanggal_masuk']; ?>" readonly> 
                    </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Tanggal Kadaluarsa</label> 
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $r['tanggal_expired']; ?>" readonly> 
                    </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>

<div class="modal fade" id="tambahStok">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <form action="<?= base_url('stok/penambahan/tambah'); ?>" method="post">
      <div class="modal-body">
          <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Obat</label> 
                    <div class="col-sm-10">
                    <select class="form-control" aria-label="Default select example" name="id_obat">
                      <?php foreach ($obat as $o) : ?>
                                <option value="<?= $o['id']?>" selected><?= $o['kode_obat']?> | <?= $o['nama_obat']?> | <?= $o['harga']?></option>
                               <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Supplier</label> 
                    <div class="col-sm-10">
                    <select class="form-control" aria-label="Default select example" name="id_supplier">
                      <?php foreach ($supplier as $o) : ?>
                                <option value="<?= $o['id']?>" selected><?= $o['kode_supplier']?> | <?= $o['nama_supplier']?></option>
                               <?php endforeach; ?>
                        </select>
                    </div>
            </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Jumlah</label> 
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_kamar"  name="jumlah">
                <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Tanggal Masuk</label> 
                <div class="col-sm-10">
                <input type="date" class="form-control" id="datepicker" name="tanggal_masuk">
                <?= form_error('tanggal_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Tanggal Kadaluarsa</label> 
                <div class="col-sm-10">
                <input type="date" class="form-control" id="datepicker" name="tanggal_expired">
                <?= form_error('tanggal_expired', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
     </form>
    </div>
  </div>
</div>
             -->
