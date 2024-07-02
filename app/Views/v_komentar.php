<div class="col-md-10">
    <div class="card-footer card-comments">

        <!-- tambah : -->
        <a style="margin-bottom: 5px;" class="btn btn-primary btn-sm ubah" data-toggle="modal" data-target="#modal-sm1">
            Tambah Komentar
        </a>
        <br>

        <div id="accordion">
            <?php foreach ($Komentar as $komen => $value) : ?>
                <div class="card">
                    <div class="card-header" id="heading<?= $value['id_komentar']; ?>">
                        <h5 class="mb-0">
                            <button style="text-align: left;" class="btn  btn-link" data-toggle="collapse" data-target="#collapse<?= $value['id_komentar']; ?>" aria-expanded="true" aria-controls="collapse<?= $value['id_komentar']; ?>">
                                <img class="img-circle img-sm" src="<?= base_url('AdminLTE') ?>/dist/img/admin128.png" alt="User Image"> <?= $value['pemeriksa'] ?>
                                <span style="font-size: small;"><?= ' (' . $value['tgl_komen_admin'] . ')'; ?></span>

                            </button>
                            <?php if ($value['selesai'] == '0') { ?>
                                <a href="<?= base_url('ReviewPublikasi/Komentar_Selesai') ?>/<?= $value['id_komentar'] . '/' . $value['id_publikasi'] ?>/1" class="btn btn-primary btn-sm float-right">Belum Sesuai</a>
                            <?php } else { ?>
                                <a href="<?= base_url('ReviewPublikasi/Komentar_Selesai') ?>/<?= $value['id_komentar'] . '/' . $value['id_publikasi'] ?>/0" class="btn btn-success btn-sm float-right">Sesuai</a>
                            <?php } ?>
                            <a class="btn btn-primary btn-sm float-right ubah" data-toggle="modal" data-target="#modal-sm1"><i class="fas fa-edit"></i></a>
                        </h5>
                    </div>
                    <div id="collapse<?= $value['id_komentar']; ?>" class="collapse <?= $value['id_komentar']; ?>" class="collapse <?php if ($value['selesai'] == '0') {
                                                                                                                                        echo "show";
                                                                                                                                    } ?>" aria-labelledby="heading<?= $value['id_komentar']; ?>" data-parent="#accordion">
                        <div class="card-body">
                            <?= $value['catatan'] ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- /.card-comment -->
    </div>
</div>
<!-- /.card -->




<div class="modal fade" id="modal-sm1">
    <?php echo form_open('ReviewPublikasi/addCatatanPemeriksa') ?>
    <form>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Komentar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" class="id-data-modal" value="<?= $id_publikasi ?>" name="id_publikasi">


                    <div class="form-group">
                        <label>Catatan Pemeriksaan</label>
                        <input class="form-control" name="pemeriksa" placeholder="Nama Pemeriksa" required>

                        <textarea id="summernote_admin" name="catatan"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </form>
    <?php echo form_close() ?>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-sm2">
    <?php echo form_open('ReviewPublikasi/addCatatanPemeriksa') ?>
    <form>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Komentar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <input type="hidden" class="id-data-modal id" value="<?= $id_publikasi ?>" name="id_komentar">


                    <div class="form-group">
                        <label>Catatan Pemeriksaan</label>
                        <input class="form-control edit_pemeriksa" name="pemeriksa" placeholder="Nama Pemeriksa" required>

                        <textarea class="edit_komentar" id="summernote_admin" name="catatan"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </form>
    <?php echo form_close() ?>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {

        console.log("test terhubugn");


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


                }
            })


        })


    })
</script>