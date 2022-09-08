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
                <?php foreach($posts as $post) : ?>
                <div class="blog-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-10 blog-content">
                            <a href="#"><img class="img-responsive img-fluid rounded" style="width: 100%; height: 270px; object-fit: cover; object-position: center" alt="SPBU Pro Media" src="<?= base_url('/uploads/post/' . $post->image) ?? base_url('/uploads/profile/' . $profile->background_image) ?>"/></a>
                            <h4><?= $post->title ?></h4>
                            <a href="<?= base_url('blog/' . $post->slug) ?>" class="btn btn-primary">Baca selengkapnya <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!--/.blog-item-->
                <?php endforeach ?>

                <ul class="pagination pagination-lg">
                    <!-- <li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Next Page<i class="fa fa-long-arrow-right"></i></a></li> -->
                    <?= $pager->links() ?>
                </ul>
                <!--/.pagination-->
            </div>
            <!--/.col-md-8-->

            <aside class="col-md-4">
                <div class="widget search">
                    <form role="form" action="<?= base_url('blog') ?>">
                        <input type="text" name="search_query" class="form-control search_box" placeholder="Search Here">
                    </form>
                </div>
                <!--/.search-->

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


                <div class="widget categories">
                    <h3>Categories</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category">
                                <?php foreach($categories as $category) : ?>
                                    <li><a href="#"><?= $category->name ?> <span class="badge">04</span></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/.categories-->

                <!-- <div class="widget archieve">
                    <h3>Archieve</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="blog_archieve">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> December 2015 <span class="pull-right">(97)</span></a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> November 2015 <span class="pull-right">(32)</span></a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> October 2015 <span class="pull-right">(19)</span></a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> September 2015 <span class="pull-right">(08)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <!--/.archieve-->

                <!-- <div class="widget tags">
                    <h3>Tag Cloud</h3>
                    <ul class="tag-cloud">
                        <li><a class="btn btn-xs btn-primary" href="#">Apple</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Barcelona</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Office</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Ipod</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Stock</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Race</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">London</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Football</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Porche</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Gadgets</a></li>
                    </ul>
                </div> -->
                <!--/.tags-->

                <!-- <div class="widget blog_gallery">
                    <h3>Our Gallery</h3>
                    <ul class="sidebar-gallery">
                        <li><a href="#"><img src="images/blog/gallery1.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery2.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery3.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery4.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery5.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery6.png" alt="" /></a></li>
                    </ul>
                </div> -->
                <!--/.blog_gallery-->
            </aside>
        </div>
        <!--/.row-->
    </div>
</section>
<!--/#blog-->

<?= $this->endSection() ?>

<?= $this->section('custom-styles') ?>
<!-- <style>
    .img {
        width: 100%;
        max-width: inherit;
        position: absolute;
        top: 50%;
        /* left: 50%;
        -webkit-transform: translate(-50%, -50%) scale(1.5);
        -moz-transform: translate(-50%, -50%) scale(1.5);
        -o-transform: translate(-50%, -50%) scale(1.5);
        transform: translate(-50%, -50%) scale(1.5); */
    }
</style> -->
<?= $this->endSection() ?>