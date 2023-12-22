<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Edit Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("ruangan") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data Ruangan</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Edit Data Ruangan</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('ruangan/update/' . $tb_ruangan->id_ruangan) ?>" method="post"
                      autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Nim</label>
                        <input type="text" name="nama_ruangan" value="<?= $tb_ruangan->nama_ruangan ?>"
                               class="form-control" required autofocus>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">Submit</i></button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>



