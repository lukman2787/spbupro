<?= $this->extend('layout/template') ?>
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
                <h1 class="m-0">Crud</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Tutorial Crud</li>
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
            <button type="button" name="add_record" id="add_record" class="btn btn-success btn-sm">Add</button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped" id="tablecrud">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
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
<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" />
                        <span id="name_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" />
                        <span id="email_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span id="gender_error" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tablecrud').DataTable({
            "order": [],
            "serverSide": true,
            "ajax": {
                url: "<?= base_url('ajaxcrud/fetch_all'); ?>",
                type: "POST",
            }
        });
        // $('#example2').DataTable({
        //     "paging": true,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": false,
        //     "responsive": true,
        // });
        $('#add_record').click(function() {

            $('#user_form')[0].reset();

            $('.modal-title').text('Add Data');

            $('#name_error').text('');

            $('#email_error').text('');

            $('#gender_error').text('');

            $('#action').val('Add');

            $('#submit_button').val('Add');

            $('#userModal').modal('show');

        });

        $('#user_form').on('submit', function(event) {

            event.preventDefault();

            $.ajax({

                url: "<?php echo base_url('ajaxcrud/action'); ?>",

                method: "POST",

                data: $(this).serialize(),

                dataType: "JSON",

                beforeSend: function() {

                    $('#submit_button').val('wait...');

                    $('#submit_button').attr('disabled', 'disabled');

                },

                success: function(data) {

                    $('#submit_button').val('Add');

                    $('#submit_button').attr('disabled', false);

                    if (data.error == 'yes') {

                        $('#name_error').text(data.name_error);

                        $('#email_error').text(data.email_error);

                        $('#gender_error').text(data.gender_error);

                    } else {

                        $('#userModal').modal('hide');

                        $('#message').html(data.message);

                        $('#tablecrud').DataTable().ajax.reload();

                        setTimeout(function() {

                            $('#message').html('');

                        }, 5000);

                    }

                }

            })

        });

        $(document).on('click', '.edit', function() {

            var id = $(this).data('id');

            $.ajax({

                url: "<?php echo base_url('ajaxcrud/fetch_single_data'); ?>",

                method: "POST",

                data: {
                    id: id
                },

                dataType: 'JSON',

                success: function(data) {

                    $('#name').val(data.name);

                    $('#email').val(data.email);

                    $('#gender').val(data.gender);

                    $('.modal-header').text('Edit Data');

                    $('#name_error').text('');

                    $('#email_error').text('');

                    $('#gender_error').text('');

                    $('#action').val('Edit');

                    $('#submit_button').val('Edit');

                    $('#userModal').modal('show');

                    $('#hidden_id').val(id);

                }

            })

        });

        $(document).on('click', '.delete', function() {

            var id = $(this).data('id');

            if (confirm("Are you sure you want to remove it?")) {

                $.ajax({

                    url: "<?php echo base_url('ajaxcrud/delete'); ?>",

                    method: "POST",

                    data: {
                        id: id
                    },

                    success: function(data) {

                        $('#message').html(data);

                        $('#tablecrud').DataTable().ajax.reload();

                        setTimeout(function() {

                            $('#message').html('');

                        }, 5000);

                    }

                })

            }

        });
    });
</script>
<?= $this->endSection() ?>