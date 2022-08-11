<?= $this->extend('layout/template') ?>
<?= $this->section('title') ?>
<title>grup &mdash; yukNikah</title>
<?= $this->endSection() ?>
<?= $this->section('title') ?>
<title>grup &mdash; yukNikah</title>
<?= $this->endSection() ?>
<?= $this->section('content-header') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Group</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">grup</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php if (session()->getFlashdata('success')) { ?>
    <!-- div.alert.alert-success.alert-dismissible.show.fade -->
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">x</button>
            <b>Sukses !</b>
            <?= session()->getFlashdata('success'); ?>
        </div>
    </div>
<?php } ?>
<?php if (session()->getFlashdata('error')) { ?>
    <!-- div.alert.alert-success.alert-dismissible.show.fade -->
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">x</button>
            <b>Gagal !</b>
            <?= session()->getFlashdata('error'); ?>
        </div>
    </div>
<?php } ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Grup Kontak</h3>

        <div class="card-tools">
            <a href="<?= site_url('groups/new') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create groups</a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Group</th>
                    <th>Info Group</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datagroup as $key => $value) { ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $value->nama_group; ?></td>
                        <td><?= $value->info_group; ?></td>
                        <td class="text-center" style="width: 10%">
                            <a href="<?= site_url('groups/edit/' . $value->id_group) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <form action="<?= site_url('groups/') . $value->id_group ?>" method="post" class="d-inline" onsubmit="return confirm('Yaklin hapus data')">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
    </div>
    <!-- /.card-footer-->
</div>
<?= $this->endSection() ?>