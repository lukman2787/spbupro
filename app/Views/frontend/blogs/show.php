<?= $this->extend('layouts/frontend', compact('title')) ?>

<?= $this->section('content') ?>

<div id="breadcrumb">
    <div class="container">
        <div class="breadcrumb">
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li>Blog</li>
        </div>
    </div>
</div>

<section class="container">
    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <h3><?= $post->title ?></h3>
                <p>
                    <?= $post->created_at ?> |
                    <?php foreach($categories as $category) {
                        echo $category->name . ' ';
                    } ?>
                    | <?= $post->username ?> |
                    Bagikan :
                    <a href="whatsapp://send?text=<?= base_url('blog/' . $post->slug) ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Bagikan dong ke whatsapp kamu"><i class="fa fa-whatsapp"></i></a>
                    <a href="" class="btn btn-sm btn-success"><i class="fa fa-facebook"></i></a>
                </p>
                <hr>
                <div class="wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible;-webkit-animation-duration: 1000ms; -moz-animation-duration: 1000ms; animation-duration: 1000ms;-webkit-animation-delay: 300ms; -moz-animation-delay: 300ms; animation-delay: 300ms;">
                    <img src="<?= base_url('/uploads/post/' . $post->image) ?>" class="img-responsive" style="width: 100%; height: 400px; object-fit: cover; object-position: center;">
                    <!-- <h4><?= esc($post->title) ?></h4> -->
                    <div style="margin-bottom: 30px; margin-top: 30px">
                        <?= $post->body ?>
                    </div>
                </div>
      <!-- <div class="col-md-5 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible;-webkit-animation-duration: 1000ms; -moz-animation-duration: 1000ms; animation-duration: 1000ms;-webkit-animation-delay: 600ms; -moz-animation-delay: 600ms; animation-delay: 600ms;"> -->
            </div>
            <!--/.col-md-8-->

            <aside class="col-md-4">
                

                <!-- <div class="widget categories">
                    <h3>Recent Comments</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single_comments">
                                <img src="images/blog/avatar3.png" alt="" />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span>
                                </div>
                            </div>
                            <div class="single_comments">
                                <img src="images/blog/avatar3.png" alt="" />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span>
                                </div>
                            </div>
                            <div class="single_comments">
                                <img src="images/blog/avatar3.png" alt="" />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> -->
                <!--/.recent comments-->


            </aside>
        </div>
        <!--/.row-->
    </div>
</section>
<!--/#blog-->

<?= $this->endSection() ?>