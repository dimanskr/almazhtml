<?php /**
Подключение OptionTree в тему. Required: set ‘ot_theme_mode’ filter to true.
*/
add_filter( 'ot_theme_mode', '__return_true' );
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
add_filter( 'ot_show_docs', '__return_true' );


function mytheme_customize_css()
{
	?>
	<style type="text/css">

		<?php $header__footer_bg = ot_get_option( 'header__footer_bg', array() ); ?>
		#search,
		.navbar-default,
		.woocommerce-pagination,
		.navbar-nav > li > .dropdown-menu,
		.p-p-content,
		.p-p-tab,
		.category-menu .bg,
		.category-filter,
		.bal-box-next a,
		.search-bg,
		.m_news,
		#site-footer,
		.well,
		.checkout-product .panel-default > .panel-heading,
		.checkout-product .panel-body
		{
			background-color: <?php if($header__footer_bg['background-color']){echo $header__footer_bg['background-color'] ; }else{ echo '#ffffff';} ?>;
			background-repeat:<?php if($header__footer_bg['background-repeat']){echo $header__footer_bg['background-repeat'] ; }else{ echo 'repeat-x';} ?>;
			background-attachment:<?php if($header__footer_bg['background-attachment']){echo $header__footer_bg['background-attachment'] ; }else{ echo 'fixed';} ?>;
			background-position:<?php if($header__footer_bg['background-position']){echo $header__footer_bg['background-position'] ; }else{ echo 'top';} ?>;
			background-image:url(<?php if($header__footer_bg['background-image']){echo $header__footer_bg['background-image'] ; }else{ echo get_template_directory_uri().'/img/bg.jpg';} ?>) ;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'mytheme_customize_css');
