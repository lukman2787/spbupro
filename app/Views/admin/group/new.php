<?= $this->extend('layout/template') ?>
<?= $this->section('title') ?>
<title>Gawe &mdash; yukNikah</title>
<?= $this->endSection() ?>
<?= $this->section('content-header') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Group</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('groups') ?>">Group</a></li>
                    <li class="breadcrumb-item active">New</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Buat Group Kontak</h3>

        <div class="card-tools">
            <a href="<?= site_url('groups') ?>" class="btn btn-warning btn-sm"><i class="fas fa-arrow-left"></i> Back Groups</a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <form action="<?= site_url('groups') ?>" method="post" autocomplete="off">
            <!-- <?= csrf_field() ?> -->
            <div class="card-body col-md-6">
                <div class="form-group">
                    <label for="nama_group">Nama Group *</label>
                    <input type="text" name="nama_group" id="nama_group" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="info_group">Info</label>
                    <textarea name="info_group" id="info_group" class="form-control"></textarea>
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