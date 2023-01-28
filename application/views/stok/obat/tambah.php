                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    <div class="row">
                      <div class="col-lg-6">
                              <form action="<?= base_url('stok/obat/tambah'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Obat</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_obat"  name="nama_obat">
                                        <?= form_error('nama_obat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Kategori</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kategori"  name="kategori">
                                        <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Harga</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="harga"  name="harga">
                                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Deskripsi</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="deskripsi"  name="deskripsi">
                                        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
                                    <a href="<?= base_url('stok/obat/kembali'); ?>" class="btn btn-primary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form> 
                         </div>   
                    </div>
                    <!-- /.container-fluid -->

             </div>
    </div>

<!-- End of Main Content -->