                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title_detail; ?></h1> -->

                    <!-- /.container-fluid -->
                    <!-- Collapsable Card Example -->
                    <?php
                    if ($this->session->flashdata('massage')) 
                       {
                            echo ' <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>Sukses! </strong>'.$this->session->flashdata('massage');
                            echo '</div>';
                       }
                    ?>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Obat <?= $title_detail; ?></button></h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Kode Inap</label> 
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="kode_obat"  name="kode_rawat_inap" value="<?= $detail_inap['kode_rawat_inap']?>" readonly> 
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Nama Pasien</label> 
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="kode_obat"  name="nama_pasien" value="<?= $detail_inap['nama_pasien']?>" readonly> 
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Nama Dokter</label> 
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="kode_obat"  name="nama_dokter" value="<?= $detail_inap['nama_dokter']?>" readonly> 
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Tipe Kamar</label> 
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="kode_obat"  name="tipe_kamar" value="<?= $detail_inap['tipe_kamar']?> | <?= $detail_inap['nama_kamar']?>" readonly> 
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Tanggal Masuk</label> 
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="kode_obat"  name="tanggal_masuk" value="<?= $detail_inap['tanggal_masuk']?>" readonly> 
                                                </div>
                                        </div>
                                        <?php
                                            $tanggal_sekarang = date('Y-m-d');
                                            $tanggal_masuk = $detail_inap['tanggal_masuk'];
                                            $query = $this->db->query("SELECT DATEDIFF('$tanggal_sekarang','$tanggal_masuk') as selisih")->row_array();
                                            $selisih = $query['selisih'] + 1;
                                        ?>
                                        <?php if($detail_inap['active'] == 1) {?>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Lama Menginap</label> 
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="kode_obat"  name="selisih" value="<?= $selisih?>" readonly> 
                                                </div>
                                                <div class="col-sm-4">
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addTindakan">Tambah Tindakan</a>
                                                </div>
                                        </div>
                                        <?php } else { ?>
                                            <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Lama Menginap</label> 
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="kode_obat"  name="selisih" value="<?= $detail_inap['lama_menginap']?>" readonly> 
                                                </div>
                                             </div>
                                        <?php } ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Total Harga</h6>
                                        </div>
                                        <div class="card-body">
                                            Harga per tindakan = Rp. 
                                            <?php 
                                                if($total_harga['total'] == null) {
                                                    echo '0';
                                                }else{
                                                    echo number_format($total_harga['total']);
                                                }
                                            ?> <br>
                                            Harga Kamar * per Hari (<?= $selisih ?>) = Rp. 
                                            <?php 
                                                $total_kamar = $selisih * $total_harga['harga_kamar'];
                                                $total_keseluruhan = $total_kamar + $total_harga['total'];
                                                echo number_format($total_kamar);
                                            ?>  <br>
                                            Harga Total Keseluruhan = <b>Rp. <?= number_format($total_keseluruhan) ?></b>
                                        </div>
                                </div> 
                        </div>
                        
                    </div>
                    
                    
                            
        
                       <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Rawat</th>
                                            <th>Nama Tindakan</th>
                                            <th>Nama Obat</th>
                                            <th>Harga Per Tindakan</th>
                                            <?php if($detail_inap['active'] == 1) {?>
                                                <th>Aksi</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <?php $i =1; ?>
                                        <?php foreach ($detail_tindakan as $r) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $r['kode_rawat']; ?></td>
                                            <td><?= $r['nama_tindakan']; ?></td>
                                            <td><?= $r['nama_obat']; ?></td>
                                            <td><?= number_format($r['harga_tindakan']); ?> + hargaObat = (<?= number_format($r['harga_tindakan'] + $r['harga']); ?>)</td>
                                            <?php if($detail_inap['active'] == 1) {?>
                                            <td><a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete<?= $r['id'];?>"><i class="fas fa-trash"></i></a></td>
                                            <?php } ?>
                                            <!-- <td>
                                                <center>
                                                <a href="<?= base_url('transaksi/rawatinap/detail/'). $r['kode_rawat_inap'] ; ?>" class="btn btn-info">detail rawat</a>
                                                <!-- <a href="<?= base_url('stok/kadaluarsa/edit/'). $r['id'] ; ?>" class="btn btn-danger">Keluarkan</a> -->
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
        </div>

    <div class="modal fade" id="addTindakan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Tindakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <form action="<?= base_url('transaksi/rawatinap/tambah_tindakan') ?>" method="post">
      <div class="modal-body">
            <div class="form-group row">
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_kamar"  name="kode_rawat" value="<?= $detail_inap['kode_rawat_inap']?>" hidden>
                    <!-- <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?> -->
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Obat</label> 
                <div class="col-sm-6">
                    <select class="form-control" aria-label="Default select example" name="id_obat">
                        <option value="" selected>-- Pilih Obat --</option>
                        <?php foreach ($obat as $p) : ?>
                            <option value="<?= $p['id']?>"><?= $p['nama_obat']?> | <?= $p['harga']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Jenis Tindakan</label> 
                <div class="col-sm-6">
                    <select class="form-control" aria-label="Default select example" name="id_tindakan" required>
                        <option value="" selected>-- Pilih Tindakan --</option>
                        <?php foreach ($tindakan as $p) : ?>
                            <option value="<?= $p['id']?>"><?= $p['nama_tindakan']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Harga Tindakan</label> 
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_kamar"  name="harga_tindakan" value="0" required>
                    <!-- <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?> -->
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

<?php
  foreach ($detail_tindakan as $r) : ?>
<div class="modal fade" id="delete<?= $r['id'];?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data Tindakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <form action="<?= base_url('transaksi/rawatinap/delete/'.$r['id'].'/'.$r['kode_rawat']); ?>" method="post">
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

<!-- End of Main Content -->
