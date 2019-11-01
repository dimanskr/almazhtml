<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */


/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
    $content_width = 1170;
}


/**
 * The Bootstrap Basic main class.
 */
require_once get_template_directory() . '/inc/BootstrapBasic.php';


/**
 * Register commonly use scripts and styles.
 */
$BootstrapBasic = new \BootstrapBasic();
unset($BootstrapBasic);

/*
 * Подключение настроек темы
 */
require get_template_directory() . '/includes/theme-settings.php';
/*
 * Подключение области виджетов
 */
require get_template_directory() . '/includes/widget-areas.php';

/*
 * Подключение скриптов и стилей
 */
require get_template_directory() . '/includes/enqueue-script-style.php';

/*
 * Вспомогательные функции
 */
require get_template_directory() . '/includes/helpers.php';

/*
 * Подключение option-tree в теме и его функций
 */
require get_template_directory() . '/includes/option-tree-functions.php';

/*
 * Подключение функций корзины в header
 */
require get_template_directory() . '/includes/wc-functions-cart.php';



/**
 * admin page displaying help.
 */
if (is_admin()) {
    require get_template_directory() . '/inc/BootstrapBasicAdminHelp.php';
    $bbsc_adminhelp = new BootstrapBasicAdminHelp();
    add_action('admin_menu', array($bbsc_adminhelp, 'themeHelpMenu'));
    unset($bbsc_adminhelp);
}


/**
 * Make WordPress 5 (Gutenberg) editor support Bootstrap CSS.
 */
require_once get_template_directory() . '/inc/BootstrapBasicWp5.php';
$BbWp5 = new BootstrapBasicWp5();
unset($BbWp5);


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Custom dropdown menu and navbar in walker class
 */
require get_template_directory() . '/inc/BootstrapBasicMyWalkerNavMenu.php';


/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * --------------------------------------------------------------
 * Theme widget & widget hooks
 * --------------------------------------------------------------
 */
require get_template_directory() . '/inc/widgets/BootstrapBasicSearchWidget.php';
require get_template_directory() . '/inc/template-widgets-hook.php';

