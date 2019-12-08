<?php
/**
 * The theme header
 *
 * @package bootstrap-basic
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes();?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes();?>> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">

  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url');?>">

  <!--wordpress head-->
  <?php wp_head();?>
</head>
<body <?php body_class('common-home');?>>
		<!--[if lt IE 8]>
			<p class="ancient-browser-alert">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/" target="_blank">upgrade your browser</a>.</p>
		<![endif]-->
     <header>
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <ul class="list-inline header-call">
              <li><span>+7<?php echo ot_get_option('phone_number') ?></span></li>
            </ul>
          </div>
          <div class="col-sm-4">
            <div id="logo">
              <?php
$logo_id = get_theme_mod('custom_logo');
$logo_image = wp_get_attachment_image_src($logo_id, 'full');
if (!empty($logo_image)):
    echo diman_logo();
    ?>
		                <?php else: ?>
                  <h1 class="site-title-heading">
                    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name');?></a>
                  </h1>
                  <div class="site-description">
                    <small>
                      <?php bloginfo('description');?>
                    </small>
                  </div>
                <?php endif;?>
              </div>
            </div>
            <div class="col-sm-4">
              <div  class="s-header__basket-wr woocommerce">
                <?php global $woocommerce;?>
                <a href="<?php echo $woocommerce->cart->get_cart_url() ?>" class="basket-btn basket-btn_fixed-xs">
                  <span class="basket-btn__label">Ваш заказ</span>
                  <span class="basket-btn__counter">(<?php echo sprintf($woocommerce->cart->cart_contents_count); ?>)</span>
                </a>
                <div class="mini-card-content ">
                  <?php the_widget('WC_Widget_Cart', 'title=');?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-primary-collapse">
                <span class="sr-only"><?php _e('Toggle navigation', 'bootstrap-basic');?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div class="collapse navbar-collapse navbar-primary-collapse">
              <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new BootstrapBasicMyWalkerNavMenu()));?>
              <?php wp_nav_menu(array('theme_location' => 'registration', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right', 'walker' => new BootstrapBasicMyWalkerNavMenu()));?>
            </div><!--.navbar-collapse-->
          </nav>
          <div class="search" id="search">
            <div class="col-sm-12">
            <?php dynamic_sidebar('search');?>
          </div>
        </div>
      </div>
    </header>
    <div id="content" class="site-content container">
      <!-- <div class="category-menu">
        <div class="container">
          <div class="bg">
            <?php //wp_nav_menu(array('theme_location' => 'category', 'container' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        jQuery(document).ready(function() {
          jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop() > 110) {
              jQuery('.category-menu').fadeIn(900)
            } else {
              jQuery('.category-menu').fadeOut(700)
            }
          });
        });

      </script> -->
