<div class="col-12 register-box d-flex justify-content-center">
    <div class="col-5 card card-outline card-primary ">
        <div class="card-header text-center">
            <img src="<?= base_url('adminLTE') ?>/dist/img/LogoBPS.png" alt="Logo BPS" class="brand-image " width="130px" height="auto">
            <br>
            <a href="<?= base_url() ?>" class="h1"><b>AAJUSI</b></a>
            <h4>Aplikasi Pengajuan Publikasi</h4>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Registrasi Penyusun</p>
            <?php echo form_open('Login/updatePenyusun') ?>
            <form method="post">
                <input type="text" name="id_penyusun" id="id_penyusun" value="<?= $q['id_penyusun']; ?>" hidden>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?= $q['nama_penyusun']; ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $q['username']; ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" value="<?= $q['password']; ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <?php echo form_close() ?>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->