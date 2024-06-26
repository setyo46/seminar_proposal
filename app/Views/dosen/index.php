<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Dosen</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>Dosen</h1>
            <div class="section-header-button">
                <a href="<?= site_url("dosen/new") ?>" class="btn btn-primary">Tambah Data</a>
            </div>
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
                <div class="card-header">
                    <h4>Data Dosen</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-md" id="table1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>NIDN</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Handphone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($tb_user as $key => $value) : ?>
                                 <?php if ($value->level_userid != 'Operator') : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value->nidn_dosen ?></td>
                                        <td><?= $value->nama_dosen ?></td>
                                        <td><?= $value->alamat_dosen ?></td>
                                        <td><?= $value->nohp_dosen ?></td>
                                        <td><?= $value->email_dosen ?></td>
                                        <td>
                                            <a href="<?= site_url('dosen/edit/' . $value->id_dosen) ?>"
                                               class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="<?= site_url('dosen/delete/' . $value->id_dosen) ?>" method="post"
                                                  class="d-inline" id="del-<?= $value->id_dosen ?>">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm"
                                                        data-confirm="Hapus Data?|Apakah Anda yakin?"
                                                        data-confirm-yes="submitDel(<?= $value->id_dosen ?>)">
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
    </section>
<?= $this->endSection() ?>