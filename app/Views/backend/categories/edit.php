<?= $this->extend('layouts/backend', compact('title')) ?>

<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/category') ?>">Category</a></li>
                    <li class="breadcrumb-item active">Create Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-sm bg-navy" href="<?= base_url('admin/category') ?>">Kembali <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-navy">
                <h3 class="card-title">Create Category</h3>
            </div>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('admin/category', $category->id) ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" class="form-control form-control-sm  <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" placeholder="Input category name" value="<?= $category->name ?? old('name') ?>">
                                <?php if ($validation->hasError('name')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('name') ?></strong>
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