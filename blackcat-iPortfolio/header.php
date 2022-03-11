<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blackcat-iPortfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>


	<header id="header" class="site-header">


		<div class="d-flex flex-column">

			<div class="profile">
				<img src="<?php echo get_template_directory_uri().'/assets/img/profile-img.jpg' ?> " alt = "" class="img-fluid rounded-circle"> 

				<?php $website_title = get_field('header_website_title', 'option');
				if ($website_title) { ?>


					<h1 class="text-light"><a href="index.html"> <?php echo $website_title;   ?> </a> </h1>


					</a></h1>
				<?php	 } else {
					echo 'Please <a href="' . home_url() . '/wp-admin/admin.php?page=acf-options-theme-settings"> add</a>awebsite title';
				}
				?>
				<h1 class="text-light"><?php the_field('header_website_description', 'option');  ?>
				</h1>

			</div>

		<div class="topbar-left">
         

	

		</div>

			<nav id="navbar" class="nav-menu navbar">
		


				<?php
				wp_nav_menu(array(
					'theme_location'    => 'primary',
					'depth'             => 2,
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				));


				?>
			</nav><!-- .nav-menu -->
			<div class="social-links mt-3 text-center">
				<?php if (have_rows('header_social_media', 'option')) : ?>
					<?php while (have_rows('header_social_media', 'option')) : the_row(); ?>
						<a href="<?php the_sub_field('social_url'); ?>" target="_blank" class="instagram"><?php the_sub_field('social_icon'); ?></a>

					<?php endwhile; ?>
				<?php else : ?>
					<?php
					echo 'Please <a href="' . home_url() . '/wp-admin/admin.php?page=acf-options-theme-settings"> add </a>social media';
					?>
				<?php endif; ?>

				<!-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
					<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a> -->
				<!-- <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a> -->
				<!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
				<!-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
			</div>
			<?php	wp_nav_menu( array( 'theme_location' => 'secondary', 'container_class' => 'my_extra_menu_class' ) ); ?>


		</div>
	</header><!-- #masthead -->