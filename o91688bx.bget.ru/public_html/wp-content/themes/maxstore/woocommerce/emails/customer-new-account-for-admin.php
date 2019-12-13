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

<p>
<ul>
        <li><?php echo sprintf(__('Почта: %s', 'woocommerce'), $user_email); ?></li>
        <li><?php echo sprintf(__('Клиент: %s', 'woocommerce'), $billing_first_name); ?></li>
		<li><?php echo sprintf(__('Адрес: %s', 'woocommerce'), $billing_address_1); ?></li>
        <li><?php echo sprintf(__('Компания: %s', 'woocommerce'), $billing_company); ?></li>
		<li><?php echo sprintf(__('Телефон: %s', 'woocommerce'), $billing_phone); ?></li>
</ul>

</p>

		<p><?php printf( __('Перейти к одобрению пользователя по ссылке %s.', 'woocommerce' ), make_clickable( esc_url( get_home_url(null, 'wp-admin/users.php') ) ) ); ?></p>
		
		<div style="clear:both;"></div>

<?php do_action( 'woocommerce_email_footer');  ?>
