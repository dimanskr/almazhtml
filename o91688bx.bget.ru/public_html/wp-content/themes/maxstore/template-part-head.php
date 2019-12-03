<div class="container rsrc-container" role="main">
	<?php
	if ( is_front_page() || is_home() || is_404() ) {
		$heading = 'h1';
		$desc	 = 'h2';
	} else {
		$heading = 'h2';
		$desc	 = 'h3';
	}
	?>
	<div class="row">
		<?php // Site title/logo  ?>
		<!-- поле слева от логина где будет номер телефона вместо формы регистрации -->
		<div class="top-infobox col-sm-4 col-xs-12">
		<?php
			if ( get_theme_mod( 'infobox-text-right', '' ) != '' ) {
				echo wp_kses_post( get_theme_mod( 'infobox-text-right' ) );
			}
			?>
		</div>
		<header id="site-header" class="col-sm-4 col-xs-12 rsrc-header text-center" role="banner">
			<?php if ( get_theme_mod( 'header-logo', '' ) != '' ) : ?>
			<div class="rsrc-header-img">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
						src="<?php echo esc_url( get_theme_mod( 'header-logo' ) ); ?>"
						title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
			</div>
			<?php else : ?>
			<div class="rsrc-header-text">
				<<?php echo $heading ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
						title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
						rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
				</<?php echo $heading ?>>
				<<?php echo $desc ?> class="site-desc"><?php esc_attr( bloginfo( 'description' ) ); ?>
				</<?php echo $desc ?>>
			</div>
			<?php endif; ?>
		</header>

		<?php // Shopping Cart   ?>
		<?php if ( function_exists( 'maxstore_header_cart' ) ) { ?>
		<div class="header-cart text-right col-sm-4 col-xs-12">
			<?php maxstore_header_cart(); ?> <br>
		</div>
		<?php } ?>
	</div>
	<?php // if ( has_nav_menu( 'main_menu' ) ) : ?>
	<div class="rsrc-top-menu row">
		<nav id="site-navigation" class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
					<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'maxstore' ); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse navbar-1-collapse">
			<?php
			wp_nav_menu( array(
				'theme_location'	 => 'main_menu',
				'depth'				 => 3,
				'container'			 => false,
				'menu_class'		 => 'nav navbar-nav',
				'fallback_cb'		 => 'wp_bootstrap_navwalker::fallback',
				'walker'			 => new wp_bootstrap_navwalker() )
			);
			wp_nav_menu( array(
				'theme_location' 	 => 'registration',
				'container'			 => false,
				'menu_class'         => 'nav navbar-nav navbar-right',
				'fallback_cb'		 => 'wp_bootstrap_navwalker::fallback',
				'walker'			 => new wp_bootstrap_navwalker() )
			);
			?>
			</div>
		</nav>
	</div>
	<?php // endif; ?>
	<?php if ( is_active_sidebar( 'top-search-form' ) ) : ?>

	<div class="search">
		<div class="row">
			<div class="col-sm-12">
				<div id="search" class="">
					<?php dynamic_sidebar( 'top-search-form' ); ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'category-menu' ) ) : ?>
	<div class="category-menu">
		<div class="container">
			<div class="bg">
				<?php dynamic_sidebar( 'category-menu' ); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( get_theme_mod( 'search-bar-check', 1 ) == 1 && class_exists( 'WooCommerce' ) ) : ?>
	<?php get_template_part( 'template-part', 'searchbar' ); ?>
	<?php endif; ?>
