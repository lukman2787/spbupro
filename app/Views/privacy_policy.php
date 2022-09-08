<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'SPBUpro-Home' ?></title>

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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/atom-one-dark.min.css">
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
                                <?php $uri = current_url(true); ?>
                                <li role="presentation"><a href="<?= base_url() ?>" class="<?= $uri->getSegment(1) === '' ? 'active' : '' ?>">Home</a></li>
                                <!-- <li role="presentation"><a href="<?= base_url() ?>/frontend/about.html">About Us</a></li> -->
                                <!-- <li role="presentation"><a href="<?= base_url() ?>/frontend/services.html">Services</a></li> -->
                                <!-- <li role="presentation"><a href="<?= base_url() ?>/frontend/portfolio.html">Portfolio</a></li> -->
                                <li role="presentation"><a href="<?= base_url('blog') ?>" class="<?= $uri->getSegment(1) === 'blog' ? 'active' : '' ?>">Blog</a></li>
                                <!-- <li role="presentation"><a href="<?= base_url() ?>/frontend/contact.html">Contact</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

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
                    <div class="wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible;-webkit-animation-duration: 1000ms; -moz-animation-duration: 1000ms; animation-duration: 1000ms;-webkit-animation-delay: 300ms; -moz-animation-delay: 300ms; animation-delay: 300ms;">
                        <h3>Privacy Policy Untuk SPBU Pro Media</h3>
                        <hr>
                        <div style="margin-bottom: 30px; margin-top: 30px">
<p>Di SPBUProMedia, dapat diakses dari spbupromedia.com, salah satu prioritas utama kami adalah privasi pengunjung kami. Dokumen Kebijakan Privasi ini berisi jenis informasi yang dikumpulkan dan dicatat oleh spbupromedia.com dan bagaimana kami menggunakannya.</p>

<p>Jika Anda memiliki pertanyaan tambahan atau memerlukan informasi lebih lanjut tentang Kebijakan Privasi kami, jangan ragu untuk menghubungi kami.</p>

<h3>Informasi yang Kami Kumpulkan</h3>

<p>spbupromedia.com mengikuti prosedur standar menggunakan file log. File-file ini mencatat pengunjung ketika mereka mengunjungi situs web. Semua perusahaan hosting melakukan ini dan merupakan bagian dari analisis layanan hosting. Informasi yang dikumpulkan oleh file log termasuk alamat protokol internet (IP), jenis browser, Penyedia Layanan Internet (ISP), tanggal dan waktu, halaman rujukan/keluar, dan mungkin jumlah klik. Ini tidak terkait dengan informasi apa pun yang dapat diidentifikasi secara pribadi. Tujuan informasi adalah untuk menganalisis tren, mengelola situs, melacak pergerakan pengguna di situs web, dan mengumpulkan informasi demografis.</p>

<h3>Cookies</h3>

<p>Seperti situs web lainnya, spbupromedia.com menggunakan ‘cookie’. Cookie digunakan untuk menyimpan informasi seperti preferensi pengunjung dan halaman yang diakses atau dikunjungi pengunjung pada situs web ini. Informasi tersebut kami gunakan untuk mengoptimalkan pengalaman pengguna dengan menyesuaikan konten halaman web kami.</p>

<h3>Kebijakan Privasi Pihak Ketiga</h3>

<p>Kebijakan Privasi spbupromedia.com tidak berlaku untuk pengiklan atau situs web lain. Karena itu, kami menyarankan Anda untuk membaca seksama masing-masing Kebijakan Privasi dari pihak ketiga untuk informasi yang lebih rinci. Anda berhak untuk menonaktifkan cookies pada browser Anda.</p>

<h3>Informasi Anak</h3>

<p>Salah satu prioritas kami adalah membantu perlindungan untuk anak-anak saat menggunakan internet. Kami mendorong orang tua dan wali untuk mengamati, berpartisipasi, memantau, dan membimbing aktivitas online mereka.</p>
<p>spbupromedia.com tidak dengan sengaja mengumpulkan informasi identifikasi pribadi apa pun dari anak-anak di bawah umur. Jika menurut Anda anak Anda memberikan informasi semacam ini di situs web kami, kami sangat menganjurkan Anda untuk segera menghubungi kami dan kami akan melakukan upaya terbaik kami untuk segera hapus informasi tersebut dari catatan kami.</p>

<h3>Persetujuan</h3>

<p>Dengan menggunakan situs web kami, Anda dengan ini menyetujui Kebijakan Privasi kami dan menyetujui syarat dan ketentuannya.</p>
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
                        &copy; 2022 - <?= date('Y') ?> <?= $profile->first()->app_name ?>. All Rights Reserved.
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

    <?= $this->renderSection('custom-scripts') ?>

</body>

</html>