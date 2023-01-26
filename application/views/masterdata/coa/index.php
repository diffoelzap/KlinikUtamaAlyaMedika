        <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
                     
                    </div>

                    <?php 
                       if ($this->session->flashdata('massage')) 
                       {
                            echo ' <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>Sukses! </strong>'.$this->session->flashdata('massage');
                            echo '</div>';
                       }else if ($this->session->flashdata('massage_edit')) 
                       {
                            echo ' <div class="alert alert-warning alert-dismissible" role="alert">
                            <strong>Sukses! </strong>'.$this->session->flashdata('massage_edit');
                            echo '</div>';
                       }else if ($this->session->flashdata('massage_delete')) 
                       {
                            echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>Sukses! </strong>'.$this->session->flashdata('massage_delete');
                            echo '</div>';
                       }
                    ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Akun</th>
                                            <th>Nama Akun</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php $i =1; ?>
                                        <?php foreach ($coa as $r) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $r['kode_akun']; ?></td>
                                            <td><?= $r['nama_akun']; ?></td>
                                            <td><?= $r['keterangan']; ?></td>
                                            <td>
                                                <center>
                                                <a href="#" class="btn btn-info btn-circle"><i class="fas fa-info-circle"></i></a>
                                               </center>
                                            </td>
                                            <!-- <a href="" class="badge badge-warning">Access</a>
                                            <a href="" class="badge badge-success">Edit</a>
                                            <a href="" class="badge badge-danger">Delete</a> -->
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          
            
