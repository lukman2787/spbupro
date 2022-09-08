<?= $this->extend('layouts/frontend', compact('title')) ?>]

<?= $this->section('content') ?>

<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="item active" style="background-image: url(/uploads/profile/<?= $profile->background_image ?>)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h2 class="animation animated-item-1">Selamat Datang Di <span><?= $profile->app_name ?></span></h2>
                                <p class="animation animated-item-2"><?= $profile->description ?></p>
                                <a class="btn-slide animation animated-item-3" href="#feature">Terjun lebih dalam!</a>
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="images/slider/img3.png" class="img-responsive">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.item-->
        </div>
        <!--/.carousel-inner-->
    </div>
    <!--/.carousel-->
</section>
<!--/#main-slider-->

<div class="feature" id="feature">
    <div class="container">
        <div class="text-center">
            <div class="col-md-3">
                <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <i class="fa fa-book"></i>
                    <h2>Pengembangan Web</h2>
                    <p>Menerima layanan kustom pembuatan website dengan framework PHP (Laravel & CodeIgniter)</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <i class="fa fa-laptop"></i>
                    <h2>Konsultan IT</h2>
                    <p>Membantu menemukan solusi di setiap problematika dunia IT.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <i class="fa fa-heart-o"></i>
                    <h2>Source Code Gratis</h2>
                    <p>Menyediakan proyek-proyek gratis dan open source untuk dikembangkan bersama dan referensi belajar bagi pemula.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
                    <i class="fa fa-cloud"></i>
                    <h2>Tutorial Friendly Code</h2>
                    <p>Membagikan beberapa tutorial seputar coding dan programming mulai dari dasar sampai lanjut.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about">
    <div class="container">
        <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>About Us</h2>
            <img src="<?= base_url('uploads/profile/' . $profile->background_image) ?>" class="img-responsive" />
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
                pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
            </p>
        </div>

        <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <h2>Template built with Twitter Bootstrap</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
                pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
            </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque </p>
        </div>
    </div>
</div>

<div class="lates">
    <div class="container">
        <div class="text-center">
            <h2>Latest Blog</h2>
        </div>
        <?php foreach($posts as $post) : ?>
            <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img style="width: 100%; height: 200px; object-fit: cover; object-position: center" src="<?= base_url('/uploads/post/' . $post->image) ?>" class="img-responsive" />
                <h3><a href="<?= base_url('blog/' . $post->slug) ?>"><?= $post->title ?></a></h3>
                <?= substr_replace($post->body, "... Baca selengkapnya", 200) ?>
            </div>
        <?php endforeach ?>
    </div>
</div>
<!-- 
<section id="partner">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Our Partners</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="partners">
            <ul>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="images/partners/partner5.png"></a></li>
            </ul>
        </div>
    </div>
    <!--/.container-->
</section> -->
<!--/#partner-->

<section id="conatcat-info">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="pull-left">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="media-body">
                        <h2>Mempunyai pertanyaan atau membutuhkan solusi?</h2>
                        <p>Kami siap membantu dan melayani kebutuhan anda. Silahkan hubungi kontak ini. <a href="https://wa.me/082117088123">+6282117088123</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.container-->
</section>
<!--/#conatcat-info-->

<?= $this->endSection() ?>