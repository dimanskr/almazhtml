<?php get_header(); ?>

<?php get_template_part( 'template-part', 'head' ); ?>

<?php get_template_part( 'template-part', 'topnav' ); ?>

<!-- start content container -->
<div class="row rsrc-content">

	<div class="col-xs-12 col-sm-12 col-md-12 rsrc-main">
		<div class="woocommerce">
			<?php if ( get_theme_mod( 'woo-breadcrumbs', 0 ) != 0 ) : ?>
				<?php woocommerce_breadcrumb(); ?>
			<?php endif; ?>
			<?php woocommerce_content(); ?>
        </div>
    </div><!-- /#content -->

</div>
<!-- end content container -->

<?php get_footer(); ?>
