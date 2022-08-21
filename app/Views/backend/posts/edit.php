<?= $this->extend('layouts/backend', compact('title')) ?>

<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Post</a></li>
                    <li class="breadcrumb-item active">Edit Post</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-sm bg-navy" href="<?= base_url('admin/post') ?>">Kembali <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-navy">
                <h3 class="card-title">Edit Post</h3>
            </div>
            <?= view('App\Views\Auth\_message_block') ?>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('admin/post') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" name="title" class="form-control form-control-sm  <?= $validation->hasError('title') ? 'is-invalid' : '' ?>" placeholder="Masukan title" value="<?= $post->title ?? old('title') ?>">
                                <?php if ($validation->hasError('title')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('title') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <select name="category[]" id="category" class="form-control form-control-sm <?= $validation->hasError('category') ? 'is-invalid' : '' ?>" multiple>
                                <option></option>
                                    <?php foreach($categories as $category) : ?>
                                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                    <?php endforeach ; ?>
                                </select>
                                <?php if ($validation->hasError('category')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('category') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="meta_keyword">Meta Keyword</label>
                                <input type="text" name="meta_keyword" class="form-control form-control-sm <?= $validation->hasError('meta_keyword') ? 'is-invalid' : '' ?>" placeholder="Masukan meta_keyword" value="<?= $post->meta_keyword ?? old('meta_keyword') ?>">
                                <?php if ($validation->hasError('meta_keyword')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('meta_keyword') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Deskripsi</label>
                                <input type="text" name="meta_description" class="form-control form-control-sm  <?= $validation->hasError('meta_description') ? 'is-invalid' : '' ?>" placeholder="Masukan meta_description" value="<?= $post->meta_description ?? old('meta_description') ?>">
                                <?php if ($validation->hasError('meta_description')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('meta_description') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <input type="file" name="image" class="form-control form-control-sm <?= $validation->hasError('image') ? 'is-invalid' : '' ?>">
                                <?php if ($validation->hasError('image')) : ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $validation->getError('image') ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="body">Isi</label>
                            <textarea name="body" id="body" class="form-control"><?= $post->body ?? old('body') ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm bg-navy float-right mt-3">Simpan</button>
                </div>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection() ?>

<?= $this->section('custom-styles') ?>
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('backend') ?>/plugins/select2/css/select2.min.css">
<!-- include summernote -->
<link href="<?= base_url('backend') ?>/plugins/summernote/summernote-bs4.min.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('custom-scripts') ?>

<script src="<?= base_url('backend') ?>/plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url('backend') ?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- CKEditor 5 -->
<script src="<?= base_url('backend') ?>/plugins/ckeditor5/build/ckeditor.js"></script>
<script>

    $(document).ready(function() {
        $('#category').select2({
            placeholder: "Pilih kategori",
            allowClear: true
        });
        // $('#body').summernote({
        //     placeholder: 'Tulis isi konten...',
        //     height: 300,                 // set editor height
        //     minHeight: null,             // set minimum height of editor
        //     maxHeight: null,             // set maximum height of editor
        //     focus: true                  // set focus to editable area after initializing summernote
        // });
        ClassicEditor
        .create( document.querySelector('#body'), {
            codeBlock: {
                languages: [
                    // Do not render the CSS class for the plain text code blocks.
                    { language: 'plaintext', label: 'Plain text', class: '' },
                    { language: 'html', label: 'HTML' },

                    // Use the "php-code" class for PHP code blocks.
                    { language: 'php', label: 'PHP', class: 'php-code' },

                    // Use the "js" class for JavaScript code blocks.
                    // Note that only the first ("js") class will determine the language of the block when loading data.
                    { language: 'javascript', label: 'JavaScript', class: 'js javascript js-code' },

                    // Python code blocks will have the default "language-python" CSS class.
                    { language: 'python', label: 'Python' }
                ]
            }
        })
        .catch( error => {
            console.error( error );
        });
    });

</script>

<?= $this->endSection() ?>
