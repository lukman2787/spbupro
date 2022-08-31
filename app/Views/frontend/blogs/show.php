<?= $this->extend('layouts/frontend', compact('title')) ?>

<?= $this->section('content') ?>

<div id="breadcrumb">
    <div class="container">
        <div class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
        </div>
    </div>
</div>

<section id="blog" class="container">
    <div class="blog">
        <div class="row">
            <div class="col-md-8">
      <h3><?= $post->title ?></h3>
      <hr>
      <div class="wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible;-webkit-animation-duration: 1000ms; -moz-animation-duration: 1000ms; animation-duration: 1000ms;-webkit-animation-delay: 300ms; -moz-animation-delay: 300ms; animation-delay: 300ms;">
        <img src="<?= base_url('/uploads/post/' . $post->image) ?>" class="img-responsive">
        <h4><?= esc($post->title) ?></h4>
        <?= $post->body ?>
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