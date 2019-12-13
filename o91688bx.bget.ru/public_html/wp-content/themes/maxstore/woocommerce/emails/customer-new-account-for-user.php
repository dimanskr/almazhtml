<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading); ?>

<p><?php printf( __('Вы зарегистрировались на сайте %s, ', 'woocommerce' ), make_clickable( esc_url( get_home_url() ) ) ); ?>
<?php echo sprintf(__("Указав электронную почту %s. После одобрения аккаунта модератором Вы сможете осуществлять заказ товаров. Спасибо за регистрацию.", 'woocommerce'), $user_email); ?></p>

<div style="clear:both;"></div>

<?php do_action( 'woocommerce_email_footer');  ?>
