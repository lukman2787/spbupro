<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'SPBUpro-Home' ?></title>

    <!-- Bootstrap -->
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
                            <a href="<?= base_url() ?>/frontend/index.html">
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
                            <li><a href="<?= base_url() ?>/frontend/#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?= base_url() ?>/frontend/#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?= base_url() ?>/frontend/#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?= base_url() ?>/frontend/#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="<?= base_url() ?>/frontend/#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-4">
                    <div class="copyright">
                        &copy; Company Theme. All Rights Reserved.
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

</body>

</html>