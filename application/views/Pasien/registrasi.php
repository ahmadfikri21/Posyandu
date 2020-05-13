                        <div class="container">
                        <div class="panel-registrasi">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
                            </div>
                            <form class="user" method="post" action="<?php echo base_url('Homepage/registrasi'); ?>">
                                <div class="form-group">
                                    <h5>Nama</h5>
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Name" value="<?php echo set_value('nama'); ?>">
                                    <?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <h5>Username</h5>
                                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
                                    <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <h5>Password</h5>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-1 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        <?php echo form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>E-mail</h5>
                                    <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="E-mail" value="<?php echo set_value('email'); ?>">
                                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <h5>Alamat</h5>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Address" value="<?php echo set_value('alamat'); ?>">
                                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <h5>Nomor Telepon</h5>
                                    <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Phone Number" value="<?php echo set_value('no_telp'); ?>">
                                    <?php echo form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar
                                </button>
                            </form>
                            <hr>

                            <div class="text-center regis">
                                <a class="small" href="<?php echo base_url(); ?>Homepage/login">Sudah punya akun? login disini!</a>
                            </div>
                        </div>
                        </div>
                        