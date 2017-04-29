<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course</title>
    <?php wp_head(); ?>       
</head>

<body <?php body_class(); ?> >
    <!-- header -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="header-area">
                        <div class="row">
                            <div class="col-log-6 col-md-6">
                                <div class="header-top-left">
                                    <div class="top-email">
                                        <i class="fa fa-envelope"></i>
                                        <span>email@mail.com</span>
                                    </div>
                                    <div class="top-phone">
                                        <i class="fa fa-phone"></i>
                                        <span>8 999 999 99 99</span>                                            
                                    </div>
                                </div>
                            </div>
                            <?php ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> <!-- end header -->

    <!-- #menu -->
    <section id="menu">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Course</a>                        
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </form>
                    <?php course_menu('primary-menu'); ?>
                    <!--
                    <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                        <li class="active"><a href="#">Главная</a></li>
                        <li><a href="#">Категории</a></li>
                        <li><a href="#">Курсы</a></li>
                        <li><a href="#">Контакт</a></li>
                    </ul>
                    -->
                </div>
            </div>
        </nav>
    </section>