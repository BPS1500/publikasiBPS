<div class="login-box">
    <!-- /.login-logo -->

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img src="<?= base_url('adminLTE') ?>/dist/img/LogoBPS.png" alt="Logo BPS" class="brand-image " width="130px" height="auto">
            <br>
            <a href="<?= base_url() ?>" class="h1"><b>AAJUSI</b></a>
            <h4>Aplikasi Pengajuan Publikasi</h4>
        </div>
        <div class="card-body">
            <!-- Notifikasi -->
            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Entry Form</h4>
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                            <li><?= esc($error) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php  } ?>

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-danger" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <p class="login-box-msg">Login Admin</p>
            <?php
            echo form_open('Login/CekLoginAdmin')
            ?>
            <div class="input-group mb-3">
                <input id="username" class="form-control" placeholder="Username" name="username">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input id="password" type="password" class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <a class="btn btn-success" href="<?= base_url('Login') ?>">Kembali</a>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <!-- /.col -->
            </div>
            <?php
            echo form_close('')
            ?>
        </div>
        <!-- /.card-body -->
    </div>
</div>