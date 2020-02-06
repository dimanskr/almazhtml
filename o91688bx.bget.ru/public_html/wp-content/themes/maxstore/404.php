<?php get_header(); ?>

<?php get_template_part( 'template-part', 'head' ); ?>

<!-- start content container -->
<div class="row rsrc-content">

	<?php //left sidebar ?>
	<?php get_sidebar( 'left' ); ?>

	<div class="col-md-<?php maxstore_main_content_width(); ?> rsrc-main">
		<div class="error-template text-center">
			<h1><?php esc_html_e( 'Внимание!', 'maxstore' ); ?></h1>
			<h2><?php esc_html_e( 'Ошибка 404', 'maxstore' ); ?></h2>
			<div class="error-details">
				<p><?php esc_html_e( 'Извините, возникла ошибка. Запрашиваемая страница не найдена!', 'maxstore' ); ?></p>
			</div>
			<p>
				<a class="btn btn-primary btn-md outline" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                    <span class="fa fa-home"></span><?php esc_html_e( ' На главную', 'maxstore' ); ?>
				</a>
			</p>
		</div>
	</div>

	<?php //get the right sidebar ?>
	<?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>
