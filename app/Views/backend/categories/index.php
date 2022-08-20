<?= $this->extend('layouts/backend') ?>

<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kategori</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Categories</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-sm bg-navy" href="<?= base_url('admin/category/new') ?>">Tambah <i class="fa fa-plus"></i></a>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->include('backend/components/alerts') ?>
        <div class="card">
            <div class="card-header bg-navy">
                <h3 class="card-title">Data Kategori</h3>
            </div>
            <div class="card-body table-responsive">
                <table id="dataTable" class="table table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th width="3%">No</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th style="text-align: center;" width="3%"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 0;
                        foreach($categories as $category) :
                        $i++ ?>
                        <tr>
                            <td class="text-center"><?= $i ?>.</td>
                            <td><?= $category->name ?></td>
                            <td><?= $category->slug ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="badge bg-navy dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0)" data-id="<?= $category->id ?>" id="showBook" class="btn btn-sm btn-primary">View</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/category/'. $category->id .'/edit') ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="<?= base_url('admin/category/' . $category->id) ?>" method="post">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Apakah yakin ingin menghapus ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection() ?>