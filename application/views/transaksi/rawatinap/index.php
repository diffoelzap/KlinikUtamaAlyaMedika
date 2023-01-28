                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <?php
                        $query = "SELECT max(`id`) as kodeTerbesar
                            FROM `transaksi_rawat_inap`";
                        $data = $this->db->query($query)->result_array();
                        foreach ($data as $d) {
                            $dataInap = $d['kodeTerbesar'];
                        }
                        $urutan = (int) substr($dataInap, 0, 3);
                        $urutan++;
                        $huruf = "RI";
                        $kode = $huruf . sprintf("%03s", $urutan);
                    ?>

                    <div class="row">
                      <div class="col-lg-12">
                              <form action="<?= base_url('transaksi/rawatinap/tambah'); ?>" method="post">
                              <div class="form-group row">
                                        <div class="col-sm-1">
                                             <input type="text" class="form-control" id="nama_kamar"  name="kode_rawat_inap" value="<?= $kode?>" readonly>
                                        </div>
                                        <div class="col-sm-2">
                                        <select class="form-control" aria-label="Default select example" name="id_pasien" required>
                                            <option value="" selected>-- Pilih Pasien--</option>
                                            <?php foreach ($pasien as $p) : ?>
                                               <option value="<?= $p['id']?>"><?= $p['kode_pasien']?> | <?= $p['nama_pasien']?></option>
                                            <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                        <select class="form-control" aria-label="Default select example" name="id_kamar" required>
                                            <option value="" selected>-- Pilih Tipe Kamar --</option>
                                            <?php foreach ($kamar as $p) : ?>
                                               <option value="<?= $p['id']?>"><?= $p['kode_kamar']?> | <?= $p['nama_kamar']?></option>
                                            <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                        <select class="form-control" aria-label="Default select example" name="id_dokter" required>
                                            <option value="" selected>-- Pilih Dokter --</option>
                                            <?php foreach ($dokter as $p) : ?>
                                               <option value="<?= $p['id']?>"><?= $p['kode_dokter']?> | <?= $p['nama_dokter']?></option>
                                            <?php endforeach;?>
                                            </select>
                                        </div>
                                        
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form> 
                         </div>   
                    </div>
                    <?php                            
                    if ($this->session->flashdata('massage')) 
                       {
                            echo ' <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>Sukses! </strong>'.$this->session->flashdata('massage');
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
                                            <th>Kode Rawat</th>
                                            <th>Nama Pasien</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php $i =1; ?>
                                        <?php foreach ($rawat_inap as $r) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $r['kode_rawat_inap']; ?></td>
                                            <td><?= $r['nama_pasien']; ?></td>
                                            <td><?= $r['tanggal_masuk']; ?></td>
                                            <td>
                                                <?php if($r['tanggal_keluar'] == '0000-00-00') {
                                                        echo 'Belum Keluar';
                                                }else{
                                                    echo $r['tanggal_keluar'];
                                                } ?>
                                            </td>
                                            <td>
                                                <center>
                                                <a href="<?= base_url('transaksi/rawatinap/detail/'). $r['kode_rawat_inap'] ; ?>" class="btn btn-info">Detail Rawat</a>
                                                <?php
                                                    if($r['tanggal_keluar'] == '0000-00-00'){ ?>
                                                <a href="<?= base_url('transaksi/rawatinap/rawat_selesai/'). $r['kode_rawat_inap'].'/'.$r['tanggal_masuk'] ; ?>" class="btn btn-danger">Rawat Selesai</a>
                                                <?php } ?>
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
                    <!-- /.container-fluid -->                                        
             </div>
    </div>

<!-- End of Main Content -->