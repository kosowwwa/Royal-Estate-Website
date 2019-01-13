<header data-block-type="headers" data-id="1" class="">
    <div class="noContainer">
        <nav class="navbar navbar-expand-md no-gutters">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="col-4 col-md-2 text-right text-md-center order-lg-6"><p><a href="index.php"><img src="assets/imgs//logo.png" height="30" alt="image"></a></p></div>

            <div class="collapse navbar-collapse col-12 col-md-5 order-lg-1" id="navbarNav2">
                <ul class="navbar-nav col-5">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dienstleistungen.php">Dienstleistungen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="angebote.php">Angebote</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="team.php">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontakt.php">Kontakt</a>
                    </li>
                </ul>
            </div>

            <ul class="navbar-nav justify-content-end col-sm-5 order-lg-12 d-none d-md-flex">
                <?php
                    if( !isset($_SESSION['loggedin']) ):
                        $test = "";
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php
                        elseif( !is_null($_SESSION['loggedin']) ):
                            $test = '
                                        <div class="loggedIn">
                                            <div class="noContainer">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <ul class="nav" style="float: right;margin-right: 7px;">
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="#">Profile</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="#">Angebote</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="#">Benutzer</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="#">Website-Einstellungen</a>
                                                            </li>
                                                        </ul>
                                                        <div style="clear: both;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>

                    <?php
                    endif
                ?>
            </ul>
        </nav>
    </div>
    <?php
        echo $test;

    ?>
</header>


