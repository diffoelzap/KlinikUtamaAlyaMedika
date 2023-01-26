                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    <div class="row">
                      <div class="col-lg-6">
                              <form action="<?= base_url('master/pasien/tambah'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Pasien</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_pasien"  name="nama_pasien">
                                        <?= form_error('nama_pasien', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Gender</label> 
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="gender"  name="gender" value="L" checked> Laki - Laki
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="gender"  name="gender" value="P"> Perempuan
                                            </div>
                                       </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">No Telepon</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_tlp"  name="no_tlp">
                                        <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
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