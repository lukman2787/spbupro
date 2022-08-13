<?= $this->extend('layouts/backend', compact('title')) ?>

<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Role</a></li>
                    <li class="breadcrumb-item active">Tambah Role</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-sm bg-navy" href="<?= base_url('admin/role') ?>">Kembali <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-navy">
                <h3 class="card-title">Tambah Role</h3>
            </div>
            <?= view('App\Views\Auth\_message_block') ?>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('admin/user') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control form-control-sm  <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" placeholder="Masukan email" value="<?= old('email') ?>">
                                <?php if ($validation->hasError('email')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('email') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control form-control-sm  <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Masukan username" value="<?= old('username') ?>">
                                <?php if ($validation->hasError('username')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('username') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="group">Group</label>
                                <select name="group" id="group" class="form-control form-control-sm">
                                    <option selected disabled>--Pilih Group--</option>
                                    <?php foreach($groups as $group) : ?>
                                        <option value="<?= $group->id ?>"><?= $group->name ?></option>
                                    <?php endforeach ; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control form-control-sm  <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Masukan password" value="<?= old('password') ?>">
                                <?php if ($validation->hasError('password')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('password') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="pass_confirm">Konfirmasi Password</label>
                                <input type="password" name="pass_confirm" class="form-control form-control-sm  <?= $validation->hasError('pass_confirm') ? 'is-invalid' : '' ?>" placeholder="Masukan pass_confirm" value="<?= old('pass_confirm') ?>">
                                <?php if ($validation->hasError('pass_confirm')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('pass_confirm') ?></strong>
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

<?= $this->section('custom-scripts') ?>

<script>


</script>

<?= $this->endSection() ?>