<?php get_header(); ?>	
		<!-- Hero unit with BxSlider -->
		<section class="hero-unit separated-bottom">
			<!-- BxSlider -->
			<ul class="bx-slider list-unstyled">

                  <?php 
                     $args = array('post_type' => 'slider-items', 'posts_per_page' => -1);

                     $myquery = new wp_query($args);

                     if($myquery->have_posts()): 
                     	while($myquery->have_posts()):$myquery->the_post();

                  ?>

                  <li><?php the_post_thumbnail('slider-larger'); ?></li>

              <?php endwhile;
               endif;
                wp_reset_postdata();?>

			</ul>
			<!-- Appointment form -->
			<div class="hero-form-large">
				<div class="container">
					<div class="row">
     						
					<?php echo do_shortcode('[contact-form-7 id="13" title="Slider Contact" html_id="index-appointment-form" html_class="col-md-7 col-lg-6"]') ; ?>

					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.hero-form-large -->
		</section><!-- hero unit -->

		<!-- Services section -->
		<section class="services container text-center separated-bottom">
			<div class="row">
				

                   <?php 
                     $args = array('post_type' => 'department-items', 'posts_per_page' => 4, 'order' =>'ASC');

                     $myquery = new wp_query($args);

                     if($myquery->have_posts()): 
                     	while($myquery->have_posts()):$myquery->the_post();

                  ?>
                    
                   <article class="col-sm-3">

                  	<?php the_post_thumbnail('department-smaller'); ?>
					<h2 class="text-title"><?php the_title(); ?></h2>
					<?php the_content(); ?>

                    </article>

                   <?php endwhile;
                    endif;
                   wp_reset_postdata();?>

				

			
			</div>
		</section><!-- /.services section-->

		<!-- Specialization tabs -->
		<div class="secondary separated-bottom padded-top padded-bottom">
			<section class="container">
				<div class="row">
					<div class="col-sm-6 col-md-4">	
						<ul class="nav nav-pills nav-stacked tabbed-pills">

								<?php 
				                     $args = array('post_type' => 'specialist-items', 'posts_per_page' => 4);

				                     $myquery = new wp_query($args);

				                     if($myquery->have_posts()): 
				                     	while($myquery->have_posts()):$myquery->the_post();

				                  ?>
								
						        	<li><a href="#tab-<?php the_ID(); ?>" data-toggle="tab"><?php the_title(); ?></a></li>

				                   <?php endwhile;
				                    endif;
				                   wp_reset_postdata();?>
						</ul>
					</div>

					<div class="tab-content col-sm-6 col-md-8">


						<?php 
				                     $args = array('post_type' => 'specialist-items', 'posts_per_page' => 4);

				                     $myquery = new wp_query($args);

				                     if($myquery->have_posts()): 
				                     	while($myquery->have_posts()):$myquery->the_post();

				                  ?>

						<div class="tab-pane fade in row" id="tab-<?php the_ID(); ?>">
							<figure class="col-xs-5 col-sm-4">

								<?php the_post_thumbnail('specialist-medium', array('class' => 'img-responsive')); ?>
							</figure>
							<article class="tab-pane-body col-xs-7 col-sm-8">

								<?php the_content();?>
							</article>
						</div>

						<?php endwhile;
	                      endif;
	                  	 wp_reset_postdata();?>

                         

					</div><!-- /.tab-content -->
				</div><!-- /.row -->
			</section><!-- /.container -->
		</div><!-- /.secondary -->

		<!-- Welcome section -->
		<section class="welcome container">
			<h2 class="section-title">Welcome to our center</h2>
			<div class="row separated-bottom">
				<figure class="col-sm-5">
					<img src="<?php echo get_template_directory_uri(); ?>/img/our-center.jpg" alt="//" class="img-responsive" />
				</figure>
				<article class="col-sm-7">
					<h4 class="text-title">Meet our Center today</h4>
					<p>Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, liber regione eu sit. Mea cu case ludus integre, vide viderer eleifend ex mea. His at soluta regione diceret, cum et atqui placerat petentium. Per amet nonumy periculis ei.</p>
					<p>Deleniti apeirian temporibus eam cu, ad mea ipsum sadipscing, sed ex assum omnium contentiones. Nobis suavitate moderatius has eu, highlight curi ancillae pericula ei nam, ferri ipsum quaeque est ea. Ex omnis menandri conceptam his.</p>
					<p>Deleniti apeirian temporibus eam cu, ad mea ipsum sadipscing, sed ex assum omnium contentiones. Nobis suavitate moderatius has eu, epicuri ancillae pericula ei nam, ferri ipsum quaeque est ea. Ex omnis menandri.</p>
				</article>
			</div>
			<div class="row separated-bottom">
				<article class="col-sm-7">
					<h4 class="text-title">Featured Video Presentation</h4>
					<p>Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, liber regione eu sit. Mea cu case ludus integre, <mark class="highlight-sec">vide viderer eleifend ex mea</mark>. His at soluta regione diceret, cum et atqui placerat petentium. Per amet nonumy periculis ei.</p>
					<p>Deleniti apeirian <mark class="highlight-pri">temporibus eam cu, ad mea</mark> ipsum sadipscing, sed ex assum omnium contentiones. Nobis suavitate moderatius has eu, highlight curi ancillae pericula ei nam, ferri ipsum quaeque est ea. Ex omnis menandri conceptam his.</p>
					<p>Deleniti apeirian temporibus eam cu, ad mea ipsum sadipscing, sed ex assum omnium contentiones. Nobis suavitate moderatius has eu, epicuri ancillae pericula ei nam, ferri ipsum quaeque est ea. Ex omnis menandri.</p>
				</article>
				<div class="col-sm-5 video-placeholder">
					<iframe src="http://player.vimeo.com/video/58039801_5f93676c.html" width="500" height="292" style="border: 0;" allowfullscreen=""></iframe>
				</div>
			</div>
		</section><!-- /.welcome section -->

		<!-- Features section -->
		<section class="features container separated-bottom">
			<h2 class="section-title">Why select this Clinic</h2>
			<div class="row list-features">
				<article class="col-xs-6 col-md-3">
					<div class="pull-left icon-holder">
						<span class="entypo-heart-empty"></span>
					</div>
					<h4 class="text-title"><a href="#">Title of the news example</a></h4>
					<p>This template includes lots of customizations and combinations.</p>
				</article>
				<article class="col-xs-6 col-md-3">
					<div class="pull-left icon-holder">
						<span class="entypo-clock"></span>
					</div>
					<h4 class="text-title"><a href="#">Save time and money</a></h4>
					<p>This template includes lots of customizations and combinations.</p>
				</article>
				<article class="col-xs-6 col-md-3">
					<div class="pull-left icon-holder">
						<span class="entypo-user"></span>
					</div>
					<h4 class="text-title"><a href="#">User experience design</a></h4>
					<p>This template includes lots of customizations and combinations.</p>
				</article>
				<article class="col-xs-6 col-md-3">
					<div class="pull-left icon-holder">
						<span class="entypo-pencil"></span>
					</div>
					<h4 class="text-title"><a href="#">Write articles with style</a></h4>
					<p>This template includes lots of customizations and combinations.</p>
				</article>
				<article class="col-xs-6 col-md-3">
					<div class="pull-left icon-holder">
						<span class="entypo-comment"></span>
					</div>
					<h4 class="text-title"><a href="#">Clients testimonials</a></h4>
					<p>This template includes lots of customizations and combinations.</p>
				</article>
				<article class="col-xs-6 col-md-3">
					<div class="pull-left icon-holder">
						<span class="entypo-globe"></span>
					</div>
					<h4 class="text-title"><a href="#">Worldwide Support</a></h4>
					<p>This template includes lots of customizations and combinations.</p>
				</article>
				<article class="col-xs-6 col-md-3">
					<div class="pull-left icon-holder">
						<span class="entypo-calendar"></span>
					</div>
					<h4 class="text-title"><a href="#">Events at the Calendar</a></h4>
					<p>This template includes lots of customizations and combinations.</p>
				</article>
				<article class="col-xs-6 col-md-3">
					<div class="pull-left icon-holder">
						<span class="entypo-monitor"></span>
					</div>
					<h4 class="text-title"><a href="#">Responsive Design</a></h4>
					<p>This template includes lots of customizations and combinations.</p>
				</article>
			</div><!-- /.row -->
		</section><!-- /.features section -->

		<!-- Lastest news -->
		<section class="container carousel-section separated-bottom">
			<h2 class="section-title">Lastest news</h2>
			<div class="carousel-container">
				<div class="carousel-controls clearfix">
					<div class="prev-carousel-1"></div>
					<div class="next-carousel-1"></div>
				</div>
				<ul class="list-unstyled blog-carousel">
					<li>
						<article class="thumbnail blog-item">
							<figure>
								<a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/news/news-thumbnail-01.jpg" alt="//" /></a>
							</figure>
							<h4 class="text-title"><a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html">Health Blog Example</a></h4>
							<p>Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, liber regione eu sit.</p>
						</article>
					</li>
					<li>
						<article class="thumbnail blog-item">
							<figure>
								<a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/news/news-thumbnail-02.jpg" alt="//" /></a>
							</figure>
							<h4 class="text-title"><a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html">Health Blog Example</a></h4>
							<p>Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, liber regione eu sit.</p>
						</article>
					</li>
					<li>
						<article class="thumbnail blog-item">
							<figure>
								<a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/news/news-thumbnail-03.jpg" alt="//" /></a>
							</figure>
							<h4 class="text-title"><a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html">Health Blog Example</a></h4>
							<p>Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, liber regione eu sit.</p>
						</article>
					</li>
					<li>
						<article class="thumbnail blog-item">
							<figure>
								<a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/news/news-thumbnail-04.jpg" alt="//" /></a>
							</figure>
							<h4 class="text-title"><a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html">Health Blog Example</a></h4>
							<p>Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, liber regione eu sit.</p>
						</article>
					</li>
					<li>
						<article class="thumbnail blog-item">
							<figure>
								<a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/news/news-thumbnail-05.jpg" alt="//" /></a>
							</figure>
							<h4 class="text-title"><a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html">Health Blog Example</a></h4>
							<p>Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, liber regione eu sit.</p>
						</article>
					</li>
					<li>
						<article class="thumbnail blog-item">
							<figure>
								<a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/news/news-thumbnail-01.jpg" alt="//" /></a>
							</figure>
							<h4 class="text-title"><a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html">Health Blog Example</a></h4>
							<p>Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, liber regione eu sit.</p>
						</article>
					</li>
					<li>
						<article class="thumbnail blog-item">
							<figure>
								<a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/news/news-thumbnail-02.jpg" alt="//" /></a>
							</figure>
							<h4 class="text-title"><a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html">Health Blog Example</a></h4>
							<p>Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, liber regione eu sit.</p>
						</article>
					</li>
					<li>
						<article class="thumbnail blog-item">
							<figure>
								<a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/news/news-thumbnail-03.jpg" alt="//" /></a>
							</figure>
							<h4 class="text-title"><a href="<?php echo get_template_directory_uri(); ?>/blog-right-sidebar.html">Health Blog Example</a></h4>
							<p>Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, liber regione eu sit.</p>
						</article>
					</li>
				</ul><!-- /.blog-carousel -->
			</div><!-- /.carousel-container -->
		</section><!-- /section -->

<?php get_footer(); ?>