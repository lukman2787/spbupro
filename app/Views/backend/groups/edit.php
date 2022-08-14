<?= $this->extend('layouts/backend', compact('title')) ?>

<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Role Pengguna</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Role</a></li>
                    <li class="breadcrumb-item active">Edit Role</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-sm bg-navy" href="<?= base_url('admin/group') ?>">Kembali <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-navy">
                <h3 class="card-title">Edit Role</h3>
            </div>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('admin/group', $group->id) ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Nama Group</label>
                                <input type="text" name="name" class="form-control form-control-sm  <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" placeholder="Masukan nama role" value="<?= $group->name ?? old('name') ?>">
                                <?php if ($validation->hasError('name')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('name') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi Role</label>
                                <input type="text" name="description" class="form-control form-control-sm " placeholder="Masukan deskripsi" value="<?= $group->description ?? old('description') ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="customCheckbox1">Izin <small class="text-danger"><?=  $validation->hasError('permission') ? $validation->getError('permission') : '' ?></small></label>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="check_all" type="checkbox" onClick="toggle(this)">
                                    <label for="check_all" class="custom-control-label">check semua</label>
                                </div>
                                <?php foreach ($permissions as $permission) : ?>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="<?= $permission->name ?>" name="permission[]" type="checkbox" value="<?= $permission->id ?>">
                                        <label for="<?= $permission->name ?>" class="custom-control-label"><?= $permission->name ?></label>
                                    </div>
                                <?php endforeach ?>
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

    function toggle(source) {
        checkboxes = document.getElementsByName('permission[]');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }

</script>

<?= $this->endSection() ?>