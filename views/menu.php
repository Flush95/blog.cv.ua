<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">
                    <?php
                        if (isset($_SESSION['logged_user'])) {
                            echo $_SESSION['logged_user']->login;
                        }
                    ?>
                </a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/login.php">Log in</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/views/registration.php">Registration</a></li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <?php
                                if (isset($_SESSION['logged_user'])) {
                            ?>
                                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php">Выйти</a>
                            <?php
                                } else {

                            ?>
                                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="login.php">Войти</a>
                            <?php }?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>