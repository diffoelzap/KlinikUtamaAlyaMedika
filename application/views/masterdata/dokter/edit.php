                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    <div class="row">
                      <div class="col-lg-6">
                            <?=form_open_multipart('master/dokter/edit/'.$edit['id']); ?>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Kode Dokter</label> 
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kode_dokter"  name="kode_dokter" value="<?= $edit['kode_dokter']; ?>" readonly> 
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Dokter</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_dokter"  name="nama_dokter" value="<?= $edit['nama_dokter']; ?>">
                                        <?= form_error('nama_dokter', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Spesialis</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="spesialis"  name="spesialis" value="<?= $edit['spesialis']; ?>">
                                        <?= form_error('spesialis', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">No Telepon</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_tlp"  name="no_tlp" value="<?= $edit['no_tlp']; ?>">
                                        <!-- <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?> -->
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

