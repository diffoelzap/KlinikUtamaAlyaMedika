        <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
                        <a href="<?= base_url('stok/obat/tambah')?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                    </div>
                    
                     <!-- Collapsable Card Example -->
                     <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Obat <?= $info['nama_obat']; ?></button></h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Kode Obat</label> 
                                                <div class="col-sm-1">
                                                    <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $info['kode_obat']; ?>" readonly> 
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Nama Obat</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $info['nama_obat']; ?>" readonly> 
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Stok</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $info['stok']; ?>" readonly> 
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Kategori</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $info['kategori']; ?>" readonly> 
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Deskripsi</label> 
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="kode_obat"  name="kode_obat" value="<?= $info['deskripsi']; ?>" readonly> 
                                                </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <a href="<?= base_url('master/obat/kembali'); ?>" class="btn btn-primary">Kembali</a>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            
