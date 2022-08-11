<?= $this->extend('layout/template') ?>
<?= $this->section('title') ?>
<title>Gawe &mdash; yukNikah</title>
<?= $this->endSection() ?>
<?= $this->section('content-header') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Gawe</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('gawe') ?>">Gawe</a></li>
                    <li class="breadcrumb-item active">Update</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Gawe / Acara</h3>

        <div class="card-tools">
            <a href="<?= site_url('gawe') ?>" class="btn btn-warning btn-sm"><i class="fas fa-arrow-left"></i> Back Gawe</a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <form action="<?= site_url('gawe/' . $gawe->id_gawe) ?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="card-body col-md-6">
                <div class="form-group">
                    <label for="nama_gawe">Nama gawe / Acara *</label>
                    <input type="text" name="nama_gawe" id="nama_gawe" class="form-control" value="<?= $gawe->nama_gawe; ?>" required>
                </div>
                <div class="form-group">
                    <label for="date_gawe">Tanggal Acara *</label>
                    <input type="date" name="date_gawe" id="date_gawe" class="form-control" value="<?= $gawe->date_gawe; ?>" required>
                </div>
                <div class="form-group">
                    <label for="info_gawe">Info</label>
                    <textarea name="info_gawe" id="info_gawe" class="form-control"><?= $gawe->info_gawe ?></textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
    <!-- /.card-footer-->
</div>
<?= $this->endSection() ?>