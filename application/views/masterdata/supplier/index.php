        <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
                        <a href="<?= base_url('master/supplier/tambah')?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
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
                       }else if ($this->session->flashdata('massage_delete')) 
                       {
                            echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>Sukses! </strong>'.$this->session->flashdata('massage_delete');
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
                                            <th>Kode Supplier</th>
                                            <th>Nama Supplier</th>
                                            <th>No Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php $i =1; ?>
                                        <?php foreach ($supplier as $r) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $r['kode_supplier']; ?></td>
                                            <td><?= $r['nama_supplier']; ?></td>
                                            <td><?= $r['no_tlp']; ?></td>
                                            <td>
                                                <center>
                                                <a href="#" class="btn btn-info btn-circle"><i class="fas fa-info-circle"></i></a>
                                                <a href="<?= base_url('master/supplier/edit/'). $r['id'] ; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete<?= $r['id'];?>"><i class="fas fa-trash"></i></a>
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
  foreach ($supplier as $r) : ?>
<div class="modal fade" id="delete<?= $r['id'];?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data <?= $r['kode_supplier']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <form action="<?= base_url('master/supplier/delete/'.$r['id']); ?>" method="post">
      <div class="modal-body">
         <h6>Apakah Anda Yakin Menghapus data ini ?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
     </form>
    </div>
  </div>
</div>

<?php endforeach; ?>
            
