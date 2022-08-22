<?= $this->extend('layouts/backend', compact('title')) ?>

<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Profile</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-sm bg-navy" href="<?= base_url('admin/dashboard') ?>">Kembali <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-navy">
                <h3 class="card-title">Edit Profile</h3>
            </div>
            <?= view('App\Views\Auth\_message_block') ?>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('admin/profile/' . $profile->id) ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="logo">Logo <small>tidak wajib diisi</small></label>
                                <input type="file" name="logo" class="form-control form-control-sm <?= $validation->hasError('logo') ? 'is-invalid' : '' ?>">
                                <?php if ($validation->hasError('logo')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('logo') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="background_image">Background Image <small>tidak wajib diisi</small></label>
                                <input type="file" name="background_image" class="form-control form-control-sm <?= $validation->hasError('background_image') ? 'is-invalid' : '' ?>">
                                <?php if ($validation->hasError('background_image')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('background_image') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="app_name">Nama Aplikasi <span class="text-danger">*</span></label>
                                <input type="text" name="app_name" class="form-control form-control-sm <?= $validation->hasError('app_name') ? 'is-invalid' : '' ?>" placeholder="Masukan nama" value="<?= $profile->app_name ?? old('app_name') ?>">
                                <?php if ($validation->hasError('app_name')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('app_name') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi <span class="text-danger">*</span></label>
                                <input type="text" name="description" class="form-control form-control-sm  <?= $validation->hasError('description') ? 'is-invalid' : '' ?>" placeholder="Masukan description" value="<?= $profile->description ?? old('description') ?>">
                                <?php if ($validation->hasError('description')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('description') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm bg-navy float-right mt-3">Simpan</button>
                </div>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection() ?>