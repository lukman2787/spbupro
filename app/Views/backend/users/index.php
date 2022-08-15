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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-sm bg-navy" href="<?= base_url('admin/user/new') ?>">Tambah <i class="fa fa-plus"></i></a>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->include('backend/components/alerts') ?>
        <div class="card">
            <div class="card-header bg-navy">
                <h3 class="card-title">Data Pengguna</h3>
            </div>
            <div class="card-body table-responsive">
                <table id="dataTable" class="table table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th width="3%">No</th>
                            <th>username</th>
                            <th>Email</th>
                            <th>Group</th>
                            <th style="text-align: center;" width="3%"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach($users as $key => $user) :
                        $i++ ?>
                            <tr>
                                <td class="text-center"><?= $i ?>.</td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td>
                                    <?php foreach($user->getRoles() as $group) : ?>
                                        <a href=""><?= $group ?></a>
                                    <?php endforeach ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="badge bg-navy dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)" data-id="<?= $user->id ?>" id="showBook" class="btn btn-sm btn-primary">View</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/user/'. $user->id .'/edit') ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="<?= base_url('admin/user/' . $user->id) ?>" method="POST">
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

<?= $this->section('custom-styles') ?>

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('backend') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('backend') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('backend') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<?= $this->endSection() ?>

<?= $this->section('custom-scripts') ?>

<!-- DataTables  & Plugins -->
<script src="<?= base_url('backend') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('backend') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('backend') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('backend') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>

    $(document).ready( function () {
        $('#dataTable').DataTable();
    });

</script>

<?= $this->endSection() ?>