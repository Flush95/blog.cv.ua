<?php
    require "db.php";

    /*$comment = R::dispense("comments");
    $comment->pub_date = date("Y-m-d H:i:s");
    $comment->comment_text = "you";
    $comment->user = $_SESSION['logged_user']->id;

    $comment1 = R::dispense("comments");
    $comment1->pub_date = date("Y-m-d H:i:s");
    $comment1->comment_text = "Comment 2";
    $comment1->user = $_SESSION['logged_user']->id;

    $articles = R::dispense("articles");
    $articles->author = "Bla";
    $articles->title = "BlaBlaBla";
    $articles->text = "BlaBlaBla BlaBlaBlaBlaBlaBla BlaBlaBlaBlaBlaBlaBlaBlaBlaBlaBlaBla BlaBlaBlaBlaBlaBla";
    $articles->pub_time = date("Y-m-d H:i:s");

    $articles->ownItemList[] = $comment;
    $articles->ownItemList[] = $comment1;

    R::store($articles);*/

    /*$articles = R::load("articles", 1);

    echo "Title: $articles->title";

    foreach($articles->ownCommentsList as $comment ) {
        echo "<p>comment $comment->comment_text </p>";
    }*/

    /* Categories table create with relation
    $articles = R::load("articles", 1);

    $category = R::dispense("categories");
    $category->name = "Культура";
    $category->ownAriclesList[] = $articles;
    R::store($category);*/
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<!DOCTYPE html>
<html lang="en">

    <?php include "views/head.php"?>

    <body id="page-top">
        <!-- Navigation-->
        <?php include "views/menu.php"?>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">News Portal</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Коротко обо всем</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Последние статьи</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">

                    <?php

                        $articles = R::findAll("articles", " ORDER BY `pub_time` DESC LIMIT 6 ");

                        $count = 1;
                        foreach ($articles as $art) {
                    ?>
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="portfolio-item mx-auto" data-toggle="modal"
                                data-target="#portfolioModal<?php echo $count; ?>">
                                <p class="font-weight-bold"><?php echo substr($art->title, 0, 65); ?>..</p>
                                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="imgCards" src="<?php echo $art->image; ?>" alt=""/>

                                    <div class="row">
                                        <div class="col-md-6"><p class="font-weight-light text-left"><span class="badge badge-info"><?php echo $art->author; ?></span></p></div>
                                        <div class="col-md-6"><p class="font-weight-light text-right">
                                            <span class="badge badge-secondary"><?php echo date("Y-m-d", strtotime($art->pub_time)); ?></span>
                                        </p></div>
                                    </div>
                                </div>
                            </div>

                    <?php
                            $count++;
                        }

                    ?>


                </div>
                <button onclick="location.href = '/views/articles.php'"; class="btn btn-outline-primary btn-lg btn-block">Все статьи</button>
            </div>

        </section>

        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">

                    <!-- Footer Social Icons-->
                    <div class="col-lg-12 mb-12 mb-lg-12">
                        <h4 class="text-uppercase mb-4">Around the Web</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/profile.php?id=100011139099245"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://github.com/Flush95"><i class="fab fa-fw fa-github"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/emilianburla/"><i class="fab fa-fw fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://web.telegram.org/#/im?p=@flush95"><i class="fab fa-fw fa-telegram"></i></a>
                    </div>

                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Your Website 2021</small></div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Portfolio Modals-->
        <?php

            $count_modal = 1;
            foreach($articles as $full_art) {
        ?>
        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $count_modal; ?>" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label"><?php echo $full_art->title; $_SESSION['logged_user']['article_id'] = $full_art->id; ?></h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="<?php echo $full_art->image; ?>" alt="" />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-5 font-weight-light text-justify"><?php echo $full_art->text; ?></p>
                                    <div class="row">
                                        <div class="col-md-6"><p class="text-left"><span class="badge badge-success"> <?php echo $full_art->author ?></span></p></div>
                                        <div class="col-md-6"><p class="text-right"><span class="badge badge-light"><?php echo $full_art->pub_time; ?></span></p></div>
                                    </div>
                                    <?php
                                        /*var_dump($_SESSION['logged_user']);*/
                                        if ($_SESSION['logged_user']->login != "") {
                                            include "views/comment_form.php";
                                        }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $count_modal++;
        }
        ?>





        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
