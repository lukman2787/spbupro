<?= $this->extend('layouts/frontend', compact('title')) ?>

<?= $this->section('content') ?>

<div id="breadcrumb">
    <div class="container">
        <div class="breadcrumb">
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li><a href="<?= base_url('blog') ?>">Blog</a></li>
            <li><?= $post->title ?></li>
        </div>
    </div>
</div>

<section class="container">
    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <h3><?= $post->title ?></h3>
                <p>
                    <?= date('d-M-Y', strtotime($post->created_at)) ?> |
                    <?php foreach($categories->getPostCategory($post->id) as $category) : ?>
                        <a href="<?= base_url('blog/category/' . $category->slug) ?>"><?= $category->name ?></a>
                    <?php endforeach ?>
                    |
                    Bagikan :
                    <a href="whatsapp://send?text=<?= base_url('blog/' . $post->slug) ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Bagikan dong ke whatsapp kamu"><i class="fa fa-facebook"></i></a>
                    <a href="" class="btn btn-sm btn-success"><i class="fa fa-facebook"></i></a>
                </p>
                <hr>
                <div class="wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible;-webkit-animation-duration: 1000ms; -moz-animation-duration: 1000ms; animation-duration: 1000ms;-webkit-animation-delay: 300ms; -moz-animation-delay: 300ms; animation-delay: 300ms;">
                    <img src="<?= base_url('/uploads/post/' . $post->image) ?>" alt="SPbu Pro Media" class="img-responsive" style="width: 100%; height: 400px; object-fit: cover; object-position: center;">
                    <!-- <h4><?= esc($post->title) ?></h4> -->
                    <div style="margin-bottom: 30px; margin-top: 30px">
                        <?= $post->body ?>
                    </div>
                </div>
                <!-- <div class="col-md-5 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible;-webkit-animation-duration: 1000ms; -moz-animation-duration: 1000ms; animation-duration: 1000ms;-webkit-animation-delay: 600ms; -moz-animation-delay: 600ms; animation-delay: 600ms;"> -->
            </div>
            <!--/.col-md-8-->

            <aside class="col-md-4">
                
                <div class="widget categories">
                    <h3>Kategori</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category">
                                <?php foreach($categories->findAll() as $category) : ?>
                                    <li><a href="<?= base_url('blog/category/' . $category->slug) ?>"><?= $category->name ?> <span class="badge"><?= $categories->countPostsBelongsToCategory($category->id) ?></span></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/.categories-->

                <div class="widget categories">
                    <h3>Post Terkait</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php foreach ($posts->getPostsBelongsToCategory($category->slug) as $value) : ?>
                            <div class="single_comments">
                                <p><?= $value->title ?></p>
                                <div class="entry-meta small muted">
                                    <span><?= date('d-m-Y', strtotime($value->created_at)) ?></span>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <!--/.recent comments -->


            </aside>
        </div>
        <!--/.row -->
    </div>
</section>
<!--/#blog-->

<?= $this->endSection() ?>

<?= $this->section('custom-scripts') ?>
<style>
    pre {
        /* word-wrap: break-word;
        white-space: pre;
        overflow-x: auto;
        font-size: 0.95em;
        line-height: 1.5; */
        /* max-height: fit-content; */
        /* overflow: scroll; */
        /* color:#f8f8f2; */
        /* background-color:#282a36; */
        /* -moz-tab-size:2; */
        /* -o-tab-size:2; */
        tab-size:2;
        /* display:grid; */
        padding: 0px;
        font-size: 16px;
    }

    code {
        font-family: Consolas, "Andale Mono WT", "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", "DejaVu Sans Mono", "Bitstream Vera Sans Mono", "Liberation Mono", "Nimbus Mono L", Monaco, "Courier New", Courier, monospace;
        white-space: nowrap;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('custom-scripts') ?>

<!-- Initialize highlight.js -->
<script>hljs.highlightAll();</script>

<?= $this->endSection() ?>