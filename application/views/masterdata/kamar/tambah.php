                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    <div class="row">
                      <div class="col-lg-6">
                              <form action="<?= base_url('master/kamar/tambah'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Kamar</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_kamar"  name="nama_kamar">
                                        <?= form_error('nama_kamar', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Tipe Kamar</label> 
                                        <div class="col-sm-10">
                                        <select class="form-control" aria-label="Default select example" name="tipe_kamar" required>
                                            <option value="" selected>-- Pilih Tipe Kamar --</option>
                                            <option value="A">A | Eksekutif</option>
                                            <option value="B">B | Ekonomi</option>
                                            <option value="C">C | Bisnis</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Jumlah</label> 
                                        <div class="col-sm-10">
                                        <input type="number" class="form-control" id="jumlah"  name="jumlah">
                                        <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
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