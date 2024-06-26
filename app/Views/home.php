<?php if (session()->level_iduser == 'Koordinator' ): ?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Dashboard</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Mahasiswa</h4>
                            </div>
                            <div class="card-body">
                                <?=countData('tb_mahasiswa')?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Dosen</h4>
                            </div>
                            <div class="card-body">
                                <?=countData('tb_dosen')?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pendaftar Seminar</h4>
                            </div>
                            <div class="card-body">
                                <?=countData('tb_dafsempro')?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Seminar Proposal</h4>
                            </div>
                            <div class="card-body">
                                <?=countData('tb_sempro')?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>
<?php endif; ?>

<?php if (session()->level_iduser == 'Operator' ): ?>
    <?= $this->extend('layout/default') ?>

    <?= $this->section('content') ?>
    <title>Dashboard</title>
    <?= $this->endSection() ?>


    <?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pendaftar Seminar</h4>
                            </div>
                            <div class="card-body">
                                <?=countData('tb_dafsempro')?>
                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="col-lg-3 col-md-6 col-sm-6 col-12">-->
<!--                    <div class="card card-statistic-1">-->
<!--                        <div class="card-icon bg-danger">-->
<!--                            <i class="far fa-newspaper"></i>-->
<!--                        </div>-->
<!--                        <div class="card-wrap">-->
<!--                            <div class="card-header">-->
<!--                                <h4>Total Dosen</h4>-->
<!--                            </div>-->
<!--                            <div class="card-body">-->
<!--                                --><?php //=countData('tb_dosen')?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-3 col-md-6 col-sm-6 col-12">-->
<!--                    <div class="card card-statistic-1">-->
<!--                        <div class="card-icon bg-warning">-->
<!--                            <i class="far fa-file"></i>-->
<!--                        </div>-->
<!--                        <div class="card-wrap">-->
<!--                            <div class="card-header">-->
<!--                                <h4>Reports</h4>-->
<!--                            </div>-->
<!--                            <div class="card-body">-->
<!--                                1,201-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </section>
    <?= $this->endSection() ?>
<?php endif; ?>
