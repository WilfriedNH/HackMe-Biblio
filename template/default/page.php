<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php _c('SITE_TITLE') ?></title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le styles -->
        <!-- <link href="style/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="style/bootstrap/bootstrap-responsive.css" rel="stylesheet"> -->

        <link href="style/bootstrap/default_style.css" rel="stylesheet">

        <!-- <link rel="stylesheet/less" href="style/bootstrap/bootstrap.less" /> -->
        <!-- <script type="text/javascript" src="js/less/less-1.2.1.min.js"></script> -->
        <script type="text/javascript" src="js/jQuery/jquery-1.7.1.min.js"></script>

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="favicon.ico">
    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.php"><?php _c('SITE_TITLE'); ?></a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <?php
                            $links = array('index.php' => 'Accueil', 'books.php' => 'Ouvrages');
                            if (isUser()) {
                                $links = array_merge($links, array('profile.php' => 'Compte ' . (isAdmin() ? 'administrateur' : 'utilisateur')));
                            }
                            foreach ($links as $key => $value) {
                                echo '<li' . (trim(strrchr($_SERVER['PHP_SELF'], '/'), '/') == $key ? ' class="active"' : '') . '><a href="' . $key . '">' . $value . '</a></li>';
                            }
                            ?>
                        </ul>
                        <?php if (isUser()): ?>
                        <p class="navbar-text pull-right">Connecté en tant que <a href="profile.php"><?php uname(); ?></a> <a href="logout.php" class="label label-important"><i class="icon-white icon-remove"></i></a></p>
                        <?php endif; ?>
                        <?php if (isAdmin()) : ?>
                            <span style="position: absolute; top: 10px; right: 10px; z-index: 999;" class="label label-important">ADMIN</span>
                        <?php endif; ?>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
            <?php displayFlash(); ?>

            {{content}}

            <hr>

            <footer>
                <?php if(false){?><a style="float: right;" class="label" href="admin.php">Admin</a><?php }?>
                <span style="float: right;" class="label label-success"><i class="icon-white icon-book"></i> <?php _c('SITE_TITLE') ?></span>
                <a href="https://github.com/WilfriedNH/HackMe-Biblio"><span style="float: left;" class="label label-info"><i class="icon-white icon-folder-open"></i> Script sur GitHub</span></a>
            </footer>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(".alert-message").alert();
            $(".alert").alert();
            $(".popover").popover('show');
        </script>
    </body>
</html>