<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'SPBUpro-Home' ?></title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MJG92HK');</script>
    <!-- End Google Tag Manager -->
    <meta name="google-site-verification" content="r-JzRqkZxfshrFVfAxVcVBBGOJOyg_HRPq9KNPFQKNU" />
    <meta name="title" content="<?= $post->meta_title ?? 'SPBU Pro Media | Tuturial Coding & Programming Friendly' ?>">
    <meta name="description" content="<?= $post->meta_description ?? 'Kami hadir untuk membagikan sc code aplikasi gratis | Sharing tuturial-tutorial yang friendly | Melayani jasa pembuatan aplikasi berbasis website' ?>">
    <meta name="keyword" content="<?= $post->meta_keyword ?? 'Coding, PHP, Programming' ?>">
    
    <meta property="og:title" content="<?= $post->meta_title ?? 'SPBU Pro Media | Tuturial Coding & Programming Friendly' ?>" />
    <meta property="og:description" content="<?= $post->meta_description ?? 'Kami hadir untuk membagikan sc code aplikasi gratis | Sharing tuturial-tutorial yang friendly | Melayani jasa pembuatan aplikasi berbasis website' ?>" />
    <meta property="og:url" content="<?= current_url(true) ?>" />
    <meta property="og:image" itemprop="image" content="<?= base_url('uploads/post/' . isset($post->image)) ?>" />
    <meta property="og:image:width" content="300">
	<meta property="og:image:height" content="300">
    <meta property="og:site_name" content="SPBU Pro Media">
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="<?= $post->updated_at ?? '' ?>" />

    <!-- Bootstrap -->
    <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/atom-one-dark.min.css">
    <link href="<?= base_url() ?>/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/frontend/css/animate.css">
    <link href="<?= base_url() ?>/frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= base_url() ?>/frontend/css/style.css" rel="stylesheet" />
    <!-- =======================================================
    Theme Name: Company
    Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->

    <?= $this->renderSection('custom-styles') ?>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MJG92HK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <header>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand">
                            <a href="<?= base_url() ?>">
                                <h1><span><?php
                                $profile = new App\Models\ProfileModel();
                                echo $profile->first()->app_name;
                                ?></span></h1>
                            </a>
                        </div>
                    </div>

                    <div class="navbar-collapse collapse">
                        <div class="menu">
                            <ul class="nav nav-tabs" role="tablist">
                                <?php $uri = current_url(true);?>
                                <li role="presentation"><a href="<?= base_url() ?>" class="<?= $uri->getSegment(1) === '' ? 'active' : '' ?>">Home</a></li>
                                <!-- <li role="presentation"><a href="<?= base_url() ?>/frontend/about.html">About Us</a></li> -->
                                <!-- <li role="presentation"><a href="<?= base_url() ?>/frontend/services.html">Services</a></li> -->
                                <!-- <li role="presentation"><a href="<?= base_url() ?>/frontend/portfolio.html">Portfolio</a></li> -->
                                <li role="presentation"><a href="<?= base_url('blog') ?>" class="<?= $uri->getSegment(1) === 'blog' ? 'active' : '' ?>">Blog</a></li>
                                <?php if (logged_in()) : ?>
                                    <li role="presentation"><a href="<?= base_url('admin/dashboard') ?>" class="<?= $uri->getSegment(1) === 'admin' ? 'active' : '' ?>">Dashboard</a></li>
                                <?php endif ?>
                                <!-- <li role="presentation"><a href="<?= base_url() ?>/frontend/contact.html">Contact</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <?= $this->renderSection('content') ?>

    <footer>
        <div class="footer">
            <div class="container">
                <div class="social-icon">
                    <div class="col-md-4">
                        <ul class="social-network">
                            <li><a href="https://facebook.com/ikhsanheriyawan" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?= base_url() ?>" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://github.com/ikhsanheriyawan2404" class="github tool-tip" title="Github"><i class="fa fa-github"></i></a></li>
                            <li><a href="<?= base_url() ?>" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UC6DF1maLv7V7jS3EgsXe6tQ/videos" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-4">
                    <div class="copyright">
                        &copy; 2022 - <?= date('Y') ?> <?= $profile->first()->app_name ?>. All Rights Reserved. <a href="<?= base_url('privacy_policy') ?>">Kebijakan Privasi</a>
                        <div class="credits">
                            <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company
              -->
                            Designed by <a href="<?= base_url() ?>/frontend/#">BootstrapMade</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pull-right">
                <a href="<?= base_url() ?>/frontend/#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
            </div>
        </div>
    </footer>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url() ?>/frontend/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/frontend/js/jquery-migrate.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url() ?>/frontend/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/frontend/js/jquery.prettyPhoto.js"></script>
    <script src="<?= base_url() ?>/frontend/js/jquery.isotope.min.js"></script>
    <script src="<?= base_url() ?>/frontend/js/wow.min.js"></script>
    <script src="<?= base_url() ?>/frontend/js/functions.js"></script>
    <!-- Load highlight.js from a CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>

    <!-- Optionally load a template from a CDN -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/atom-one-light.min.css" integrity="sha512-o5v54Kh5PH0dgnf9ei0L+vMRsbm5fvIvnR/XkrZZjN4mqdaeH7PW66tumBoQVIaKNVrLCZiBEfHzRY4JJSMK/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    
    <!-- Script Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9611135992226535"
     crossorigin="anonymous"></script>

    <?= $this->renderSection('custom-scripts') ?>

</body>

</html>