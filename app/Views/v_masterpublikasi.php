<style>
    a {
        text-decoration: none;
        color: #fff;
    }
</style>

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myImportModal">
                    <i class="fas fa-upload"></i> Impor
                </button>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table-bordered table-hover" id="tblmasterpub" name="tblmasterpub">
                <thead class=" table table-primary align-middle" style="text-align: center;">
                    <tr>
                        <th width='50px'>No</th>
                        <th width='40px'>Jenis Publikasi</th>
                        <th>Judul Publikasi (Indonesia)</th>
                        <th>Judul Publikasi (Inggris)</th>
                        <th>Frekuensi Terbit</th>
                        <th>Bahasa</th>
                        <th>Katalog</th>

                        <th>No ISSN</th>

                        <th width='100px'>Action</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    <?php $no = 1;
                    foreach ($MasterPublikasi as $key => $value) { ?>

                        <tr>
                            <td style="text-align: center;"><?= $no++ ?>.</td>
                            <td style="text-align: center;"><?php
                                                            if ($value['id_jenispublikasi'] == 1) {
                                                                echo "ARC";
                                                            } else {
                                                                echo "NON ARC";
                                                            }


                                                            ?></td>
                            <td><?= $value['judul_publikasi_ind'] ?></td>
                            <td><i><?= $value['judul_publikasi_eng'] ?></i></td>
                            <td style="text-align: center;"><?= $value['frekuensi_terbit'] ?></td>
                            <td style="text-align: center;"><?= $value['bahasa'] ?></td>
                            <td style="text-align: center;"><?= $value['katalog'] ?></td>
                            <td style="text-align: center;"><?= $value['no_issn'] ?></td>
                            <td style="text-align: center;" align=center>

                                <button type="button" class="btn btn-warning btn-sm edit_btn" data-id=<?= $value['id'] ?> data-toggle="modal" data-target="#modal-lg1">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" onclick="return confirm('Apakah anda ingin menghapus data?')" class="btn btn-danger btn-sm"><a href="<?= base_url('Masterpublikasi/hapus') . '/' . $value['id'] ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Import -->
<div class="modal fade" id="myImportModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

            </div>

            <div class="modal-body">
                <span style="color:black"><a style="color:blue" href="<?= base_url('files/templatemasterpub.xlsx') ?>">Download Template disini </a></span>
                <form action="<?= base_url('Masterpublikasi/FileUpload') ?>" , method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <input class="" id="file" name="file" type="file" require accept=".xlsx" />
            </div>
            <div class="modal-footer">
                <button type="submit" id="btn_import" class="btn btn-success">Import</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Masterpublikasi/Add') ?>
                <form>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group" id="jp">
                                <label> Jenis Publikasi</label>
                                <select name="id_jenispublikasi" class="form-control triger_jenis_publikasi" id="id_jenispublikasi" required @change="onChange($event)">
                                    <option value="">--Pilih Jenis Publikasi--</option>
                                    <option value="1">ARC</option>
                                    <option value="2">NON ARC</option>
                                </select>

                                <input type="hidden" class="setJenis" name="jenis_publikasi">
                            </div>
                            <div class="form-group">
                                <label> Judul Publikasi (Indonesia)</label>
                                <input class="form-control" name="judul_publikasi_indonesia" placeholder="Judul Publikasi (Indonesia)" required>
                            </div>
                            <div class="form-group">
                                <label> Judul Publikasi (Inggris)</label>
                                <input class="form-control" name="judul_publikasi_inggris" placeholder="Judul Publikasi (Inggris)" required>
                            </div>
                            <div class="form-group">
                                <label> Katalog</label>
                                <input class="form-control" name="katalog" placeholder="Katalog" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> Nama Penyusun</label>
                                <input class="form-control" name="nama_penyusun" placeholder="Nama Penyusun" required>
                            </div>
                            <div class="form-group">
                                <label> Frekuensi Terbit</label>
                                <select name="frekuensi_terbit" id="frekuensi_terbit" class="form-control">
                                    <?php foreach ($frekuensi as $freq) { ?>
                                        <option <?php if ($freq['id_freq'] == "3") {
                                                    echo "selected=selected";
                                                } ?> value="<?= $freq['id_freq']; ?>"><?= $freq['frekuensi_terbit'];                                                                                ?> </option>
                                    <?php }; ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Bahasa</label>
                                <select name="bahasa" id="bahasa" class="form-control">
                                    <?php foreach ($bahasa as $bahasa) { ?>
                                        <option <?php if ($bahasa['id_bahasa'] == "1") {
                                                    echo "selected=selected";
                                                } ?> value="<?= $bahasa['id_bahasa']; ?>"><?= $bahasa['bahasa'];                                                                                ?> </option>
                                    <?php }; ?>

                                </select>
                            </div>

                            <!-- <div class="form-group">
                                <label> Frekuensi Terbit</label>
                                <input class="form-control" name="frekuensi_terbit" placeholder="Frekuensi Terbit" required>
                            </div>
                            <div class="form-group">
                                <label> Bahasa</label>
                                <input class="form-control" name="bahasa" placeholder="Bahasa" required>
                            </div> -->
                            <div class="form-group">
                                <label> No ISSN</label>
                                <input class="form-control" name="no_issn" placeholder="No ISSN" required>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>
        <?php echo form_close() ?>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END Modal Tambah -->

<!-- Modal Edit -->
<div class="modal fade" id="modal-lg1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Masterpublikasi/Edit') ?>
                <form>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group" id="jp">
                                <!-- <label> Jenis Publikasi</label> -->
                                <!-- <select name="id_jenispublikasi" class="form-control edit_jenis_publikasi" id="id_jenispublikasi" required @change="onChange($event)">
                                    <option value="">--Pilih Jenis Publikasi--</option>
                                    <option value="1">ARC</option>
                                    <option value="2">NON ARC</option>
                                </select> -->

                                <input type="hidden" class="id" name="id">
                            </div>
                            <div class="form-group">
                                <label> Judul Publikasi (Indonesia)</label>
                                <input class="form-control edit_judul_publikasi" name="judul_publikasi_indonesia" placeholder="Judul Publikasi (Indonesia)" required>
                            </div>
                            <div class="form-group">
                                <label> Judul Publikasi (Inggris)</label>
                                <input class="form-control edit_judul_publikasi_ig" name="judul_publikasi_inggris" placeholder="Judul Publikasi (Inggris)" required>
                            </div>
                            <div class="form-group">
                                <label> Katalog</label>
                                <input class="form-control edit_katalog" name="katalog" placeholder="katalog" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> Nama Penyusun</label>
                                <input class="form-control edit_nama_penyusun" name="nama_penyusun" placeholder="Nama Penyusun" required>
                            </div>
                            <div class="form-group">
                                <label> Frekuensi Terbit</label>
                                <input class="form-control edit_frekuensi" name="frekuensi_terbit" placeholder="Frekuensi Terbit" required>
                            </div>
                            <div class="form-group">
                                <label> Bahasa</label>
                                <input class="form-control edit_bahasa" name="bahasa" placeholder="Bahasa" required>
                            </div>

                            <div class="form-group">
                                <label> No ISSN</label>
                                <input class="form-control edit_no_issn" name="no_issn" placeholder="No ISSN" required>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>
        <?php echo form_close() ?>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END Modal edit -->




<script>
    $(document).ready(function() {

        console.log("test terhubugiin");

        // $('.triger_jenis_publikasi').change(function() {
        //     var value = $(this).val();

        //     if (value == 1) {
        //         $('.setJenis').val('ARC');
        //     } else {
        //         $('.setJenis').val('NON ARC');
        //     }
        // })


        // get data edit :
        $('.edit_btn').on('click', function() {

            var id = $(this).data('id');
            console.log(id);

            $.ajax({
                type: 'post',
                url: "<?= base_url('Masterpublikasi/getDataEdit') ?>",
                data: {
                    id: id,
                },
                dataType: 'json',

                success: function(response) {
                    console.log(response[0]);
                    $('.id').val(response[0].id);
                    $('.edit_judul_publikasi').val(response[0].judul_publikasi_ind);
                    $('.edit_judul_publikasi_ig').val(response[0].judul_publikasi_eng);
                    $('.edit_nama_penyusun').val(response[0].nama_penyusun);
                    $('.edit_frekuensi').val(response[0].frekuensi_terbit);
                    $('.edit_no_issn').val(response[0].no_issn);
                    $('.edit_bahasa').val(response[0].bahasa)
                    $('.edit_katalog').val(response[0].katalog)


                }
            })


        })


    })
</script>