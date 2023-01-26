                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    <div class="row">
                      <div class="col-lg-6">
                            <?=form_open_multipart('master/kamar/edit/'.$edit['id']); ?>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Kode Kamar</label> 
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kode_kamar"  name="kode_kamar" value="<?= $edit['kode_kamar']; ?>" readonly> 
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Kode Kamar</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_kamar"  name="nama_kamar" value="<?= $edit['nama_kamar']; ?>">
                                        <?= form_error('nama_kamar', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Tipe Kamar</label> 
                                        <div class="col-sm-10">
                                        <select class="form-control" aria-label="Default select example" name="tipe_kamar">
                                                <?php
                                                    if ($edit['tipe_kamar'] == 'A') {
                                                        echo '<option value="A" selected>A | Eksekutif</option>
                                                              <option value="B">B | Ekonomi</option>
                                                              <option value="C">C | Bisnis</option>';
                                                    } else if ($edit['tipe_kamar'] == 'B') {
                                                        echo '<option value="A">A | Eksekutif</option>
                                                        <option value="B" selected>B | Ekonomi</option>
                                                        <option value="C">C | Bisnis</option>';
                                                    } else {
                                                        echo '<option value="A" selected>A | Eksekutif</option>
                                                        <option value="B">B | Ekonomi</option>
                                                        <option value="C" selected>C | Bisnis</option>';
                                                    } 
                                                ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Jumlah</label> 
                                        <div class="col-sm-10">
                                        <input type="number" class="form-control" id="jumlah"  name="jumlah" value="<?= $edit['jumlah']; ?>">
                                        <!-- <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?> -->
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

