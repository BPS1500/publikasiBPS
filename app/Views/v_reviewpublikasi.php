<style>
    a {
        text-decoration: none;
        color: #fff;
    }
</style>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="tabel_review" class="table-bordered table-hover" width="100%">
                <thead class=" table table-primary align-middle" style="text-align: center;">
                    <tr>
                        <th style="width: 10px">No</th>
                        <th style="width: 10px">Jenis</th>
                        <th>Judul Publikasi</th>
                        <th>Fungsi Pengusul</th>
                        <th>Penyusun</th>
                        <th>Tautan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Tanggal Perbaikan</th>
                        <th>Status</th>

                        <th style="width: 130px">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    <?php $no = 1;
                    foreach ($ReviewPublikasi as $key => $value) { ?>

                        <tr>
                            <td style="text-align: center;"><?= $no++  ?>.</td>
                            <td style="text-align: center;"><?php if ($value['id_jenispublikasi'] == 1) {
                                                                echo "ARC";
                                                            } else {
                                                                echo "NON ARC";
                                                            }


                                                            ?></td>

                            <td><?= $value['judul_publikasi_ind'] ?></td>
                            <td style="text-align: center;"><?= $value['nama_fungsi'] ?></td>
                            <td style="text-align: left;"><?= $value['nama_penyusun'] ?></td>
                            <td><a class="btn btn-primary" href="<?= $value['link_publikasi'] ?>" target="_blank"><i class="fas fa-book"></i> </a><?php if ($value['link_spsnrkf'] != null) { ?> <a class="btn btn-secondary" href="<?= $value['link_spsnrkf'] ?>" target="_blank"><i class="fas fa-file-signature"></i></a><?php } ?><?php if ($value['link_spsnres2'] != null) { ?> <a class="btn btn-success" href="<?= $value['link_spsnres2'] ?>" target="_blank"><i class="fas fa-file-signature"></i></a><?php } ?></td>
                            <td><?= date("d/m/Y H:i", strtotime($value['tgl_pengajuan']));  ?></td>
                            <td><?= date("d/m/Y H:i", strtotime($value['tgl_repisi']));  ?></td>
                            <td class="<?= $value['bgcolor']; ?>"><?= $value['status_review']; ?></td>


                            <td style="text-align: center;" align=center>
                                <a href="<?= base_url('ReviewPublikasi/Komentar') ?>/<?= $value['id_publikasi'] ?>" class="btn btn-primary btn-sm ubah" data-data=<?= $value['id_publikasi'] ?>>
                                    <i class="fas fa-comment"></i>
                                </a>

                                <button type="button" data-data=<?= $value['id_publikasi'] ?> class="btn btn-warning  btn-sm btn-status" data-toggle="modal" data-target="#modal-sm2">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" onclick="return confirm('Apakah anda ingin menghapus data?')" class="btn btn-danger btn-sm"><a href="<?= base_url('ReviewPublikasi/delete_reviewpublikasi') . '/' . $value['id_publikasi'] ?>"><i class="fas fa-trash"></i></a>

                                </button>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
</div>


<!-- MODAL KOMENTAR -->

<div class="modal fade" id="modal-sm1">
    <?php echo form_open('ReviewPublikasi/addCatatanPemeriksa') ?>
    <form>
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Komentar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="input" class="id-data-modal" name="id">

                    <div class="form-group">
                        <label> Catatan Pemeriksaan</label>
                        <input class="form-control" name="catatan" placeholder="Catatan Pemeriksaan" required>
                    </div>
                    <div class="form-group">
                        <label> Pemeriksa</label>
                        <input class="form-control" name="pemeriksa" placeholder="Nama Pemeriksa" required>
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



<!-- END MODAL KOMENTAR -->

<!-- MODAL STATUS -->

<div class="modal fade" id="modal-sm2">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="container ">
                    <!-- btn Approved -->
                    <?php echo form_open('ReviewPublikasi/setStatus') ?>
                    <!-- <form> -->
                    <input type="hidden" class="getId" name="id-publikasi">
                    <input type="hidden" name="status" value="3">
                    <button type="submit" style="margin-bottom: 2px;" class="btn btn-block btn-success btn-sm swalDefaultSuccess">Disejui</button>
                    <!-- </form> -->
                    <?php echo form_close() ?>

                    <!-- btn On Review -->
                    <?php echo form_open('ReviewPublikasi/setStatus') ?>
                    <input type="hidden" class="getId" name="id-publikasi">
                    <input type="hidden" name="status" value="1">
                    <button type="submit" style="margin-bottom: 2px;" class="btn btn-block btn-info btn-sm swalDefaultWarning">Diperiksa</button>
                    <?php echo form_close() ?>

                    <!-- btn need Review -->
                    <?php echo form_open('ReviewPublikasi/setStatus') ?>
                    <input type="hidden" class="getId" name="id-publikasi">
                    <input type="hidden" name="status" value="2">
                    <button type="submit" style="margin-bottom: 2px;" class="btn btn-block btn-warning btn-sm swalDefaultWarning">Butuh Perbaikan</button>
                    <?php echo form_close() ?>

                    <!-- btn Reject -->
                    <?php echo form_open('ReviewPublikasi/setStatus') ?>
                    <input type="hidden" class="getId" name="id-publikasi">
                    <input type="hidden" name="status" value="4">
                    <button type="submit" style="margin-bottom: 2px;" class="btn btn-block btn-danger btn-sm swalDefaultError">Ditolak</button>
                    <?php echo form_close() ?>
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- END MODAL STATUS -->

<!-- Jquery : -->

<script>
    $(document).ready(function() {

        $('.btn-status').on('click', function() {
            // set class getId dengan value id_publikasi :

            const id_publikasi = $(this).data('data');

            $('.getId').val(id_publikasi);
        })



    })
</script>