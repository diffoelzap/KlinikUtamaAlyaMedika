                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    <div class="row">
                      <div class="col-lg-6">
                            <?=form_open_multipart('master/pasien/edit/'.$edit['id']); ?>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Kode Pasien</label> 
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kode_pasien"  name="kode_pasien" value="<?= $edit['kode_pasien']; ?>" readonly> 
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Pasien</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_pasien"  name="nama_pasien" value="<?= $edit['nama_pasien']; ?>">
                                        <?= form_error('nama_pasien', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Gender</label> 
                                        <div class="col-sm-10">
                                            <?php 
                                                if($edit['gender'] == 'L') {
                                                    echo ' <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="gender"  name="gender" value="L" checked> Laki - Laki
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="gender"  name="gender" value="P"> Perempuan
                                                    </div>';
                                                } else {
                                                    echo ' <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="gender"  name="gender" value="L"> Laki - Laki
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="gender"  name="gender" value="P" checked> Perempuan
                                                    </div>';
                                                }
                                            ?>
                                           
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

