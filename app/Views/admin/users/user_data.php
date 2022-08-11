<?= $this->extend('admin/layout/template') ?>
<?= $this->section('title') ?>
<title>Gawe &mdash; yukNikah</title>
<?= $this->endSection() ?>
<?= $this->section('title') ?>
<title>Gawe &mdash; yukNikah</title>
<?= $this->endSection() ?>
<?= $this->section('content-header') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
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
        <h3 class="card-title">Data User</h3>
        <div class="card-tools">
            <a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create User</a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body table-responsive">
        <input type="hidden" class="form-control" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <table class="table table-striped" id="tableuser">
            <thead>
                <tr>
                    <!-- <th style="width: 10px">No.</th> -->
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">

    </div>
    <!-- /.card-footer-->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableuser').DataTable({
            "order": [],
            "serverSide": true,

            "ajax": {
                url: "<?= site_url('users/fetch_all'); ?>",
                type: "POST",
                // "data": {
                //     "csrf_yuknikah": $('input[name=csrf_yuknikah]').val(),
                // },
                // "data": function(data) {
                //     data.csrf_test_name = $('input[name=csrf_yuknikah]').val();
                // },
                // "dataSrc": function(response) {
                //     $('input[name=csrf_yuknikah]').val(response.csrf_test_name);
                //     return response.data;
                // }
            }
        });
    });
</script>
<?= $this->endSection() ?>