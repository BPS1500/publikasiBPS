<div class="col-md-12">
    <div class="card">
        <div class="card-header row">
            <div class="col-md-10">
                <h3 class="card-title"><?= $judul ?></h3>
            </div>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah Penyusun</button>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive">

            <table class="table table-striped" name="tabel_penyusun" id="tabel_penyusun">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($q as $q) { ?>
                        <tr>
                            <td><?= $q['id_penyusun']; ?></td>
                            <td><?= $q['nama_penyusun']; ?></td>
                            <td><?= $q['username']; ?></td>
                            <td><a href="<?= base_url('Login/regisPenyusun/') . $q['id_penyusun']; ?>" class="btn btn-primary btn-sm">Edit</a> <a onclick="return confirm('AAJUSSII,, Yakin mau hapus penyusun ini?');" href="<?= base_url('Login/deletePenyusun/') . $q['id_penyusun']; ?>" class="btn btn-danger btn-sm">Hapus</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">


                <div class="c">
                    <div class=" ">
                        <div class="card-header text-center">
                            <img src="<?= base_url('adminLTE') ?>/dist/img/LogoBPS.png" alt="Logo BPS" class="brand-image " width="130px" height="auto">
                            <br>
                            <a href="<?= base_url() ?>" class="h1"><b>AAJUSI</b></a>
                            <h4>Aplikasi Pengajuan Publikasi</h4>
                        </div>
                        <div class="card-body">
                            <p class="login-box-msg">Registrasi Penyusun</p>
                            <?php echo form_open('Login/addPenyusun') ?>
                            <form>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
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


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>