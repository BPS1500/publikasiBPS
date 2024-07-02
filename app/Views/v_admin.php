<div class="col-lg-6 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">

            <h3><?= $dataDashboard['masterarc'] ?></h3>

            <table cellspacing="0" cellpadding="0" style=" font-size:18px">
                <thead>
                    <tr>
                        <th width=5%></th>
                        <th width=90%></th>
                        <th width=5%></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan=2><b>PUBLIKASI ARC</b></td>
                        <td><b><?= $dataDashboard['masterarc'] ?></b></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>Publikasi Masuk</td>
                        <td><?= $dataDashboard['arc'] ?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Status Publikasi</td>
                        <td></td>
                    </tr>

                    <?php for ($i = 0; $i < 4; $i++) {  ?>
                        <tr>
                            <td></td>
                            <td>- <?= $status[$i]['status_review'] ?></td>
                            <td><?= $dataDashboard['arcstatus'][$i + 1] ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>


        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-6 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">

            <h3><?= $dataDashboard['masternonarc'] ?></h3>

            <table cellspacing="0" cellpadding="0" style=" font-size:18px">
                <thead>
                    <tr>
                        <th width=5%></th>
                        <th width=90%></th>
                        <th width=5%></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan=2><b>PUBLIKASI NON ARC</b></td>
                        <td><b><?= $dataDashboard['masternonarc'] ?></b></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>Publikasi Masuk</td>
                        <td><?= $dataDashboard['nonarc'] ?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Status Publikasi</td>
                        <td></td>
                    </tr>

                    <?php for ($i = 0; $i < 4; $i++) {  ?>
                        <tr>
                            <td></td>
                            <td>- <?= $status[$i]['status_review'] ?></td>
                            <td><?= $dataDashboard['nonarcstatus'][$i + 1] ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>


        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->