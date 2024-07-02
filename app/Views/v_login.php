<div class="login-logo">
    <img src="<?= base_url('adminLTE') ?>/dist/img/LogoBPS.png" alt="Logo BPS" class="brand-image " width="150px" height="auto">
    <br>
    <a href="<?= base_url() ?>" class="font-weight-bold"><b>AAJUSI</b></a>
    <br>
    <h4><b>Aplikasi Pengajuan Publikasi</b></h4>
</div>
<div class="row">
    <div class="login-box">
        <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Admin</h3>

                    <p>Login Untuk Admin</p>
                </div>
                <div class="icon">
                    <i class="fas fa fa-user"></i>
                </div>
                <a href="<?= base_url('Login/LoginAdmin') ?>" class="small-box-footer">Login <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="login-box">
        <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>Penyusun</h3>

                    <p>Login Untuk Penyusun</p>
                </div>
                <div class="icon">
                    <i class="fas fa fa-users"></i>
                </div>
                <a href="<?= base_url('Login/LoginPenyusun') ?>" class="small-box-footer">Login <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>