<?php if (!defined('ABSPATH')) exit; ?>

<?php do_action('woocommerce_email_header', $email_heading); ?>

<p><?php echo sprintf(__("Ваш аккаунт на сайте компании '%s' одобрен. ", 'woocommerce'), $blogname ); ?>
<?php echo sprintf(__("Перейдите в личный кабинет по ссылке: %s, указав Ваш email и пароль.", 'woocommerce'), make_clickable(esc_url( wc_get_page_permalink('myaccount')))); ?></p>

<div style="clear:both;"></div>

<?php do_action('woocommerce_email_footer'); ?>

