<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Site Metas -->
    <title>SPBU-Pro</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?= base_url(); ?>theme/images/hms.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?= base_url(); ?>theme/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>theme/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>theme/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>theme/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>theme/css/hms-style.css">

    <!-- Modernizer for Portfolio -->
    <script src="<?= base_url(); ?>theme/js/modernizer.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php $this->load->view('v_header'); ?>

    <div class="slider-area">
        <div class="slider-wrapper owl-carousel">
            <?php foreach ($header_home->result() as $data) { ?>
                <div class="slider-item home-one-slider-otem slider-item-four slider-bg-one" style="background-image: url(<?= base_url(); ?>uploads/homepage-image/<?= $data->gambar; ?>)">
                    <div class="container">
                        <div class="row">
                            <div class="slider-content-area">
                                <div class="slide-text">
                                    <h1 class="homepage-three-title"><?= $data->judul; ?> <br><span>Transportation</span> Services</h1>
                                    <h2><?= limit_words($data->isi, 3) . ' ...'; ?></h2>
                                    <div class="slider-content-btn">
                                        <a class="button btn btn-light btn-radius btn-brd" href="<?= base_url(); ?>">Read More</a>
                                        <a class="button btn btn-light btn-radius btn-brd" href="<?= site_url('contact'); ?>">Contact</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div id="about" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">
                        <h4>About Us</h4>
                        <h2>PT Harum Manis Logistik (HMS)</h2>
                        <p class="lead"><?= $company_profile->judul; ?></p>
                        <p> <?= limit_words($company_profile->isi, 60); ?> . . . .</p>
                        <a href="<?= site_url('about/detail_about/') . $company_profile->slug; ?>" class="btn btn-light btn-radius btn-brd grd1">Learn More</a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="<?= base_url(); ?>uploads/about-image/<?= $company_profile->gambar; ?>" alt="" class="img-responsive img-rounded">
                        <a href="<?= base_url(); ?>theme/http://www.youtube.com/watch?v=waKclt046Mw" data-rel="prettyPhoto[gal]" class="playbutton"><i class="flaticon-play-button"></i></a>
                    </div><!-- end media -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="hr1">

            <div class="row">
                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="<?= base_url(); ?>uploads/about-image/<?= $visi_misi->gambar; ?>" alt="" class="img-responsive img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="message-box">
                        <h4></h4>
                        <h2><?= $visi_misi->judul; ?></h2>
                        <p class="lead">PT. Harum Mnis Logistik (HMS)</p>
                        <p><?= limit_words($visi_misi->isi, 60); ?></p>
                        <a href="<?= site_url('about/detail_about/') . $visi_misi->slug; ?>" class="btn btn-light btn-radius btn-brd grd1">Learn More</a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="parallax section parallax-off" data-stellar-background-ratio="0.9" style="background-image:url('<?= base_url(); ?>theme/uploads/parallax_04.jpg');">
        <div class="container">
            <div class="row text-center stat-wrap">
                <?php foreach ($album_vehicle as $data_vehicle) {
                    $album_id = $data_vehicle->albumvehicle_id;
                    $query_gallery = $this->db->query("SELECT * FROM gallery_vehicle WHERE albumvehicle_id = '$album_id'");
                    $total_gallery = $query_gallery->num_rows();
                    if ($total_gallery > 0) {
                        $jml_photo = $total_gallery;
                    } else {
                        $jml_photo = 0;
                    }
                ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <span data-scroll class="global-radius icon_wrap effect-1"><i class="flaticon-school-bus"></i></span>
                        <p class="stat_count"><?= $jml_photo; ?></p>
                        <h3><?= $data_vehicle->nama; ?></h3>
                    </div><!-- end col -->
                <?php } ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="services" class="parallax section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3><?= $quote_services->judul; ?></h3>
                <p class="lead"><?= $quote_services->quote; ?></p>
            </div><!-- end title -->

            <div class="owl-services owl-carousel owl-theme">
                <?php foreach ($our_services as $data_services) { ?>
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <a href="<?= base_url(); ?>uploads/services-image/<?= $data_services->gambar; ?>" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                            <img src="<?= base_url(); ?>uploads/services-image/<?= $data_services->gambar; ?>" alt="" class="img-responsive img-rounded">
                        </div>
                        <div class="service-dit">
                            <h3><?= $data_services->judul; ?></h3>
                            <p><?= $data_services->isi; ?></p>
                        </div>
                    </div>
                <?php } ?>
                <!-- end service -->
            </div><!-- end row -->

            <hr class="hr1">

            <div class="text-center">
                <a data-scroll href="<?= site_url('services'); ?>" class="btn btn-light btn-radius btn-brd">Lihat Layanan Kami</a>
            </div>
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="parallax section noover" data-stellar-background-ratio="0.7" style="background-image:url('<?= base_url(); ?>theme/uploads/parallax_05.png');">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6">
                    <div class="customwidget text-left">
                        <h1>Fast Delivery</h1>
                        <p>Dengan Sistem GPS Kami, <br>Dapat kontrol pengiriman lebih efektif</p>
                        <ul class="list-inline">
                            <li><i class="fa fa-check"></i> Profesional</li>
                            <li><i class="fa fa-check"></i> One Stop Solution</li>
                            <li><i class="fa fa-check"></i> Tepat Waktu</li>
                            <li><i class="fa fa-check"></i> Maintenance Support</li>
                        </ul><!-- end list -->
                        <a href="<?= base_url(); ?>theme/#services" data-scroll class="btn btn-light btn-radius btn-brd">Learn More</a>
                    </div>
                </div><!-- end col -->
                <div class="col-md-6">
                    <div class="text-center image-center hidden-sm hidden-xs">
                        <img src="<?= base_url(); ?>theme/uploads/device_03.png" alt="" class="img-responsive wow fadeInUp">
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="features" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <?php foreach ($quote_deliveried as $data_deliveried) { ?>
                    <h3><?= $data_deliveried->judul; ?></h3>
                    <p class="lead"><?= $data_deliveried->quote; ?></p>
                <?php } ?>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="features-left">
                        <?php foreach ($deliveries_left->result() as $key => $data_deliveries) { ?>
                            <li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.<?= $key ?>s">
                                <i class="flaticon-school-bus"></i>
                                <div class="fl-inner">
                                    <h4><?= $data_deliveries->perusahaan; ?></h4>
                                    <p><?= $data_deliveries->tujuan; ?></p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-md-4 hidden-xs hidden-sm">
                    <img src="<?= base_url(); ?>theme/uploads/logo_delivery.png" class="img-center img-responsive" alt="">
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="features-right">
                        <?php foreach ($deliveries_right->result() as $key => $data_deliveries) { ?>
                            <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.<?= $key ?>s">
                                <i class="flaticon-school-bus"></i>
                                <div class="fr-inner">
                                    <h4><?= $data_deliveries->perusahaan; ?></h4>
                                    <p><?= $data_deliveries->tujuan; ?></p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="testimonials" class="parallax section db parallax-off" style="background-image:url('<?= base_url(); ?>theme/uploads/parallax_03.jpg');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Testimonials</h3>
                <p class="lead">We thanks for all our awesome testimonials! There are hundreds of our happy customers! <br>Let's see what others say about GoodWEB Solutions website template!</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="testi-carousel owl-carousel owl-theme">
                        <div class="testimonial clearfix">
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
                                <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                            </div>
                            <div class="testi-meta">
                                <img src="<?= base_url(); ?>theme/uploads/testi_01.png" alt="" class="img-responsive alignleft">
                                <h4>James Fernando <small>- Manager of Racer</small></h4>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Awesome Services!</h3>
                                <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                            </div>
                            <div class="testi-meta">
                                <img src="<?= base_url(); ?>theme/uploads/testi_02.png" alt="" class="img-responsive alignleft">
                                <h4>Jacques Philips <small>- Designer</small></h4>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
                                <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                            </div>
                            <div class="testi-meta">
                                <img src="<?= base_url(); ?>theme/uploads/testi_03.png" alt="" class="img-responsive alignleft">
                                <h4>Venanda Mercy <small>- Newyork City</small></h4>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->
                        <div class="testimonial clearfix">
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
                                <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                            </div>
                            <div class="testi-meta">
                                <img src="<?= base_url(); ?>theme/uploads/testi_01.png" alt="" class="img-responsive alignleft">
                                <h4>James Fernando <small>- Manager of Racer</small></h4>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Awesome Services!</h3>
                                <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                            </div>
                            <div class="testi-meta">
                                <img src="<?= base_url(); ?>theme/uploads/testi_02.png" alt="" class="img-responsive alignleft">
                                <h4>Jacques Philips <small>- Designer</small></h4>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
                                <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                            </div>
                            <div class="testi-meta">
                                <img src="<?= base_url(); ?>theme/uploads/testi_03.png" alt="" class="img-responsive alignleft">
                                <h4>Venanda Mercy <small>- Newyork City</small></h4>
                            </div>
                            <!-- end testi-meta -->
                        </div><!-- end testimonial -->
                    </div><!-- end carousel -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="hr1">

            <div class="row logos">
                <?php foreach ($client->result() as $client_data) { ?>
                    <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                        <a href="#"><img src="<?= base_url(); ?>uploads/client-image/<?= $client_data->img_logo; ?>" alt="" class="img-repsonsive"></a>
                    </div>
                <?php } ?>
            </div><!-- end row -->

        </div><!-- end container -->
    </div><!-- end section -->

    <?php $this->load->view('v_footer'); ?>

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="<?= base_url(); ?>theme/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="<?= base_url(); ?>theme/js/custom.js"></script>
    <script src="<?= base_url(); ?>theme/js/portfolio.js"></script>
    <script src="<?= base_url(); ?>theme/js/hoverdir.js"></script>

</body>

</html>