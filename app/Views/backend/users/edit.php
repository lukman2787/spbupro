<?= $this->extend('layouts/backend', compact('title')) ?>

<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pengguna</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
                    <li class="breadcrumb-item active">Edit Pengguna</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-sm bg-navy" href="<?= base_url('admin/user') ?>">Kembali <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-navy">
                <h3 class="card-title">Edit Pengguna</h3>
            </div>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('admin/user/', $user->id) ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control form-control-sm  <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" placeholder="Masukan email" value="<?= $user->email ?? old('email') ?>">
                                <?php if ($validation->hasError('email')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('email') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control form-control-sm  <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Masukan username" value="<?= $user->username ?? old('username') ?>">
                                <?php if ($validation->hasError('username')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('username') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="group">Group</label>
                                <select name="group" id="group" class="form-control form-control-sm <?= $validation->hasError('group') ? 'is-invalid' : '' ?>">
                                    <option selected disabled>--Pilih Group--</option>
                                    <?php foreach($groups as $value) : ?>
                                        <option value="<?= $value->id ?>" <?= $value->id == $userGroup[0]['group_id'] ? 'selected' : '' ?>><?= $value->name ?></option>
                                    <?php endforeach ; ?>
                                </select>
                                <?php if ($validation->hasError('group')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('group') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm bg-navy float-right">Simpan</button>
                </div>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection() ?>