                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    <div class="row">
                      <div class="col-lg-6">
                            <?=form_open_multipart('master/tindakan/edit/'.$edit['id']); ?>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Tindakan</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_tindakan"  name="nama_tindakan" value="<?= $edit['nama_tindakan']; ?>">
                                        <?= form_error('nama_tindakan', '<small class="text-danger pl-3">', '</small>'); ?>
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

