                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    <div class="row">
                      <div class="col-lg-6">
                            <?=form_open_multipart('master/obat/edit/'.$edit['id']); ?>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Kode Obat</label> 
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $edit['kode_obat']; ?>" readonly> 
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Obat</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_obat"  name="nama_obat" value="<?= $edit['nama_obat']; ?>">
                                        <?= form_error('nama_obat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Stok</label> 
                                        <div class="col-sm-10">
                                        <input type="number" class="form-control" id="nama_obat"  name="stok" value="<?= $edit['stok']; ?>">
                                        <!-- <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Kategori</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_obat"  name="kategori" value="<?= $edit['kategori']; ?>">
                                        <!-- <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Deskripsi</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_obat"  name="deskripsi" value="<?= $edit['deskripsi']; ?>">
                                        <!-- <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                        </div>
                                </div>
                                
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                            </form> 
                         </div>   
                    </div>
                    <!-- /.container-fluid -->

             </div>
    </div>

<!-- End of Main Content -->

