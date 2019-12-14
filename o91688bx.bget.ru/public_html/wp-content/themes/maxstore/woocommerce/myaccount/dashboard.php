<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<p><?php
	/* translators: 1: user display name 2: logout url */
	printf(
		__( 'Здравствуйте %1$s.', 'woocommerce' ),
		'<strong>' . esc_html( $current_user->billing_first_name ) . '</strong>'
	);
?></p>

<p><?php
	printf(
		__( 'Из консоли аккаунта Вы можете посмотреть недавние заказы, изменить личные данные и пароль.', 'woocommerce' )
	);
?></p>

<?php
	// printf(
	// 	__( '<p><a href="/wp-content/uploads/2017/11/Demonstracionnoe-oborudovanie.pdf" target="_blank" download="Стоимость демонстрационного оборудования.pdf"> <img src="/wp-content/uploads/2017/11/pdf.png" alt="PDF">Брошюра стоимости демонстрационного оборудования</a></p>', 'woocommerce' )
	// 	);
	// printf(
	// 	__( '<p><a href="/wp-content/uploads/2017/11/Stoimost-yuvelirnykh-izdeliy.pdf" target="_blank" download="Стоимость ювелирных изделий.pdf"> <img src="/wp-content/uploads/2017/11/pdf.png" alt="PDF">Брошюра стоимости ювелирных изделий</a></p>', 'woocommerce' )
	// 	);
	// printf(
	// 	__( '<p><a href="/wp-content/uploads/2017/11/Flokirovanaya-Upakovka.pdf" target="_blank" download="Флокированная упаковка.pdf"> <img src="/wp-content/uploads/2017/11/pdf.png" alt="PDF">Каталог флокированной упаковки</a></p>', 'woocommerce' )
	// 	);
?>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
