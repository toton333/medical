<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>Medical</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Medical HTML Template" />
		<meta name="author" content="CoralixThemes" />
		
		<!-- CSS -->
		<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo get_template_directory_uri(); ?>/css/styles.css" rel="stylesheet" />
		<link href="<?php echo get_template_directory_uri(); ?>/css/default-skin.css" rel="stylesheet" />

		<!-- Modernizr -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.86027.js"></script>
		<!-- Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <?php wp_head(); ?>

</head>
	<body>
		<!-- Top Bar -->

		<div class="container top-bar">
			<div class="row">
				<p class="col-sm-6"><i class="icon-phone"></i> FREE Consultation +555 515 18</p>
				<div class="col-sm-6">
					<ul class="nav nav-pills navbar-right">
						<li><a href="<?php echo get_template_directory_uri(); ?>/contact.html">Apoinment</a></li>
						<li><a href="<?php echo get_template_directory_uri(); ?>/#">Register</a></li>
						<li class="dropdown">
							<a href="<?php echo get_template_directory_uri(); ?>/#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/en.gif" alt="en" /> English <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo get_template_directory_uri(); ?>/#"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/fr.gif" alt="fr" /> French</a></li>
								<li><a href="<?php echo get_template_directory_uri(); ?>/#"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/it.gif" alt="it" /> Italian</a></li>
								<li><a href="<?php echo get_template_directory_uri(); ?>/#"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/es.gif" alt="es" /> Spanish</a></li>
								<li><a href="<?php echo get_template_directory_uri(); ?>/#"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/in.gif" alt="in" /> Indian</a></li>
								<li><a href="<?php echo get_template_directory_uri(); ?>/#"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/pt.gif" alt="pt" /> Portuguese</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.row -->
		</div><!-- /.top-bar -->

		<!-- Header & navbar-->
		<header class="navbar">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand logo-nav" href="<?php echo get_template_directory_uri(); ?>/index.html"><img src="<?php echo get_template_directory_uri(); ?>/img/Medical-logo.png" alt="//" /></a>
				</div><!-- /.nav-header -->

				





                      <?php


                  /*using walker method 1 no jquery needed */
                        wp_nav_menu(
                      	array(
                      	 
                      	 'theme_location' => 'primary', 
                      	 'depth' => 3,
                      	 'container' => 'nav',

                         'container_class' => 'collapse navbar-collapse navbar-collapse navbar-right',
                         'menu_class' => 'nav navbar-nav',
                         'walker'	 => new Bootstrap_Walker_Nav_Menu()


                             )
                         );





                    /* using walker method 2 jquery needed but clear understanding of adding class to menu elements
                       wp_nav_menu(
                      	array(
                      	 
                      	 'theme_location' => 'primary', 
                      	 'depth' => 0,
                      	 'container' => 'nav',

                         'container_class' => 'collapse navbar-collapse navbar-collapse navbar-right',
                         'menu_class' => 'nav navbar-nav',
                         'walker'	 => new My_Custom_Nav_Walker()


                             )
                         );

                       */

                    
                        




                      /* without walker


                       wp_nav_menu(
                      	array(
                      	 'menu' => 'Menu 1',
                      	 'theme_location' => 'primary', 
                      	 'container' => 'nav',

                         'container_class' => 'collapse navbar-collapse navbar-collapse navbar-right',
                         'menu_class' => 'nav navbar-nav'
                             )
                         );

                         */
                       ?>

					
			</div><!-- /.container -->
		</header><!-- /header --> 