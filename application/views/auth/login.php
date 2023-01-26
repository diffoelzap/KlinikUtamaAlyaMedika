<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login </h1>
                                </div>
                                <?php 
                                if ($this->session->flashdata('wrong')) 
                                {
                                        echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                                        <strong>Failed! </strong>'.$this->session->flashdata('wrong');
                                        echo '</div>';
                                }else if ($this->session->flashdata('not_activited')) 
                                {
                                        echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                                        <strong>Failed! </strong>'.$this->session->flashdata('not_activited');
                                        echo '</div>';
                                }else if ($this->session->flashdata('not_registered')) 
                                {
                                        echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                                        <strong>Failed! </strong>'.$this->session->flashdata('not_registered');
                                        echo '</div>';
                                }else if ($this->session->flashdata('created')) 
                                {
                                        echo ' <div class="alert alert-success alert-dismissible" role="alert">
                                        <strong>Success! </strong>'.$this->session->flashdata('created');
                                        echo '</div>';
                                }else if ($this->session->flashdata('actived')) 
                                {
                                        echo ' <div class="alert alert-success alert-dismissible" role="alert">
                                        <strong>Success! </strong>'.$this->session->flashdata('actived');
                                        echo '</div>';
                                }else if ($this->session->flashdata('token_expired')) 
                                {
                                        echo ' <div class="alert alert-success alert-dismissible" role="alert">
                                        <strong>Success! </strong>'.$this->session->flashdata('token_expired');
                                        echo '</div>';
                                }else if ($this->session->flashdata('logout')) 
                                {
                                        echo ' <div class="alert alert-success alert-dismissible" role="alert">
                                        <strong>Success! </strong>'.$this->session->flashdata('logout');
                                        echo '</div>';
                                }else if ($this->session->flashdata('failed_email')) 
                                {
                                        echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                                        <strong>Failed! </strong>'.$this->session->flashdata('failed_email');
                                        echo '</div>';
                                }else if ($this->session->flashdata('failed_token')) 
                                {
                                        echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                                        <strong>Failed! </strong>'.$this->session->flashdata('failed_token');
                                        echo '</div>';
                                }else if ($this->session->flashdata('password_change')) 
                                {
                                        echo ' <div class="alert alert-success alert-dismissible" role="alert">
                                        <strong>Success! </strong>'.$this->session->flashdata('failed_token');
                                        echo '</div>';
                                }
                                ?>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukan Email" value="<?= set_value('email'); ?>"><?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password"><?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword');?>">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registrasi'); ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>