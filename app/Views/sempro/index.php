<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Seminar</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Penjadwalan Seminar Proposal</h1>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissable show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissable show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error !</b>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">

        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="noschedule-tab" data-toggle="tab" href="#noschedule"
                           role="tab" aria-controls="noschedule" aria-selected="true">Belum Dapat Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="schedule-tab" data-toggle="tab" href="#schedule"
                           role="tab" aria-controls="schedule" aria-selected="false">Sudah Dapat Jadwal</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="noschedule" role="tabpanel" aria-labelledby="noschedule-tab">
                        <div class="table-responsive">
                            <table class="table table-striped table-md" id="table1">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nim</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($tb_sempro as $key => $value) : ?>
                                    <?php if ($value->id_ruangan == null) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value->nim_sempro?></td>
                                            <td><?= $value->nama_sempro?></td>
                                            <td>
                                                <a href="<?= site_url('sempro/' . $value->id_sempro . '/edit') ?>"
                                                   class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="schedule" role="tabpanel"
                         aria-labelledby="schedule-tab">
                        <div class="table-responsive">
                            <table class="table table-striped table-md" id="table2">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Ruangan</th>
                                    <th>Jam</th>
                                    <th>Tanggal</th>
                                    <th>Ketua Penguji</th>
                                    <th>Dosen Pembimbing 1</th>
                                    <th>Dosen Pembimbing 2</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($tb_sempro as $key => $value) : ?>
                                    <?php if ($value->id_ruangan !== null) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value->nim_sempro ?></td>
                                            <td><?= $value->nama_sempro ?></td>
                                            <td><?= $value->nama_ruangan ?></td>
                                            <td><?= $value->jam_sempro ?></td>
                                            <td><?= $value->tanggal_sempro ?></td>
                                            <td><?= $value->penguji1_nama ?></td>
                                            <td><?= $value->penguji2_nama ?></td>
                                            <td><?= $value->penguji3_nama ?></td>
                                            <td>
                                                <a href="<?= site_url('sempro/' . $value->id_sempro . '/edit') ?>"
                                                   class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="<?= site_url('sempro/' . $value->id_sempro) ?>" method="post"
                                                      class="d-inline" id="del-<?= $value->id_sempro ?>">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger btn-sm"
                                                            data-confirm="Hapus Data?|Apakah Anda yakin?"
                                                            data-confirm-yes="submitDel(<?= $value->id_sempro ?>)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
