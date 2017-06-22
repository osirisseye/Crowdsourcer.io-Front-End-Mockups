<html>

<head>
    <title>
        <? echo $title; ?> | Crowdsourcer.io
    </title>
    <link href="<?php echo ROOT ?>/assets/fonts/stylesheet.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/css/main.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/css/new-main.css" rel="stylesheet">
    <link href="<?php echo ROOT ?>/assets/css/notifications.css" rel="stylesheet">
    <?= $is_mission_control ? '<link href="' . ROOT . '/assets/css/missioncontrol.css" rel="stylesheet">' : ""?>
    <link href="<?php echo ROOT ?>/assets/css/colour-scheme.css" rel="stylesheet">

    <script src="<?php echo ROOT ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo ROOT ?>/assets/js/n_m.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body>
    <!-- Navigation -->
    <nav id="site_header" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid nav-container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-center hidden-sm  hidden-md  hidden-lg" href="/"><span class="icon-logo"></span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="hidden-xs" id="">

                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="">Discover</a>
                    </li>
                                        <li>
                        <a href="">Create</a>
                    </li>
                    <li>
                        <a href="">Learn</a>
                    </li>
                </ul>
              <div class="navbar-center"><a class="" href="/"><span class="icon-logo"></span></a></div>
                <ul class="nav navbar-nav navbar-right">

                    <?php if ($loggedin) : ?>
                    <li>
                        <a href="">Logout</a>
                    </li>
                    <li>
                        <a href="">Account</a>
                    </li>
                    <li>
                        <a href="">My Projects</a>
                    </li>
		          <?php else : ?>
			         <li>
                        <a href="">Login</a>
                    </li>
                    <li>
                        <a href="">Register</a>
                    </li>
                <?php endif; ?>
                </ul>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-left  hidden-sm  hidden-md  hidden-lg">
                    <li>
                        <a href="">Discover</a>
                    </li>
                                        <li>
                        <a href="">Create</a>
                    </li>
                    <li>
                        <a href="">Learn</a>
                    </li>
                    <hr/>
                    <?php if ($loggedin) : ?>
                    <li>
                        <a href="">My Projects</a>
                    </li>
                    <li>
                        <a href="">Account</a>
                    </li>
                    <li>
                        <a href="">Logout</a>
                    </li>
		          <?php else : ?>
			         <li>
                        <a href="">Login</a>
                    </li>
                    <li>
                        <a href="">Register</a>
                    </li>
                <?php endif; ?>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container-fluid page_content">
