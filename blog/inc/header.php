
<?php include_once("config.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Blog</title>
        <link rel="stylesheet" type="text/css" href="<?= OSNOVNI_URL;?>public/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= OSNOVNI_URL;?>public/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="<?= OSNOVNI_URL;?>public/css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="<?= OSNOVNI_URL;?>public/css/jquery-ui.theme.css">
        <link rel="stylesheet" type="text/css" href="<?= OSNOVNI_URL;?>DataTables/media/css/jquery.dataTables.min.css">

    </head>
    <body data-spy="scroll" data-target="#my-navbar">
        <nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar"> <!--Begin navigation-->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?= OSNOVNI_URL;?>" class="navbar-brand">Petar Kostic</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                <?php 
                 if (isset($_SESSION['username']) && isset($_SESSION['level'])) { ?>
                    <?php $id = $_SESSION['id']; ?>
                      <a href="<?= OSNOVNI_URL;?>inc/logout.php"  class="btn btn-default login navbar-btn navbar-right">Log out</a>
              <?php } else {?>
                      <a href="#login" data-toggle="modal" class="btn btn-default login navbar-btn navbar-right">Log In</a> 
                     <?php } ?>
                    <ul class="nav navbar-nav">
                        <li><a href="<?= OSNOVNI_URL;?>">Home</a></li>
                        <?php if (isset($_SESSION['username'])&& isset($_SESSION['level']))
                        {
                        ?>
                        <li><a href="<?= OSNOVNI_URL;?>articles/">List Article</a></li>
                        <li><a href="<?= OSNOVNI_URL;?>create/">Create Article</a></li>
                        <li><a href="<?= OSNOVNI_URL;?>update/">Update Article</a></li>
                        <li><a href="<?= OSNOVNI_URL;?>delete/">Delete Article</a></li>
                    <?php
                    } 
                    ?>
                    </ul>
                </div>
            </div>
        </nav><!--End navigation-->