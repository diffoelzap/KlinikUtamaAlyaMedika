                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    <div class="row">
                      <div class="col-lg-6">
                            <?=form_open_multipart('master/supplier/edit/'.$edit['id']); ?>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Kode Supplier</label> 
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kode_dokter"  name="kode_supplier" value="<?= $edit['kode_supplier']; ?>" readonly> 
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Dokter</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_dokter"  name="nama_supplier" value="<?= $edit['nama_supplier']; ?>">
                                        <?= form_error('nama_supplier', '<small class="text-danger pl-3">', '</small>'); ?>
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

