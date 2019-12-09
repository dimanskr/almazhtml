<?php
////////////////////////////////////////////////////////////////////
// Settig Theme-options
////////////////////////////////////////////////////////////////////
include_once trailingslashit(get_template_directory()) . 'lib/plugin-activation.php';
include_once trailingslashit(get_template_directory()) . 'lib/theme-config.php';
include_once trailingslashit(get_template_directory()) . 'lib/metaboxes.php';
include_once trailingslashit(get_template_directory()) . 'lib/include-kirki.php';
require_once trailingslashit(get_template_directory()) . 'lib/customize-pro/class-customize.php';

/* * Подключение настроек темы из bootstrap3 */
// require get_template_directory() . '/includes/theme-settings.php';
/* * Подключение области виджетов из bootstrap3 */
// require get_template_directory() . '/includes/widget-areas.php';

/* * Подключение скриптов и стилей из bootstrap3  */
// require get_template_directory() . '/includes/enqueue-script-style.php';

/* * Вспомогательные функции из bootstrap3  */
require get_template_directory() . '/includes/helpers.php';

/* * Подключение option-tree в теме и его функций из bootstrap3  */
require get_template_directory() . '/includes/option-tree-functions.php';

/* * Подключение функций корзины в headerиз bootstrap3  */
// require get_template_directory() . '/includes/wc-functions-cart.php';

add_action('after_setup_theme', 'maxstore_setup');

if (!function_exists('maxstore_setup')):

    function maxstore_setup()
{
        // Theme lang
        load_theme_textdomain('maxstore', get_template_directory() . '/languages');

        // Add Title Tag Support
        add_theme_support('title-tag');

        // Register Menus
        register_nav_menus(
            array(
                'main_menu' => __('Main Menu', 'maxstore'),
                'registration' => __('Registration and cart Menu', 'maxatore'),
            )
        );

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(300, 300, true);
        add_image_size('maxstore-single', 848, 400, true);
        add_image_size('maxstore-home-top', 300, 300, true);

        add_theme_support('automatic-feed-links');

        add_theme_support('woocommerce');
        if (get_theme_mod('woo_gallery_zoom', 0) == 1) {
            add_theme_support('wc-product-gallery-zoom');
        }
        if (get_theme_mod('woo_gallery_lightbox', 1) == 1) {
            add_theme_support('wc-product-gallery-lightbox');
        }
        if (get_theme_mod('woo_gallery_slider', 0) == 1) {
            add_theme_support('wc-product-gallery-slider');
        }
    }

endif;

////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////
function maxstore_theme_stylesheets()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.4', 'all');
    wp_enqueue_style('maxstore-stylesheet', get_stylesheet_uri(), array(), '1.5.0', 'all');
    // load Font Awesome css
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7');
    wp_enqueue_style('almaz-style', get_template_directory_uri() . '/css/almaz.css', array());

}

add_action('wp_enqueue_scripts', 'maxstore_theme_stylesheets');

////////////////////////////////////////////////////////////////////
// Register Bootstrap JS with jquery
////////////////////////////////////////////////////////////////////
function maxstore_theme_js()
{
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '3.3.4');
    wp_enqueue_script('maxstore-theme-js', get_template_directory_uri() . '/js/customscript.js', array('jquery'), '1.5.0');
}

add_action('wp_enqueue_scripts', 'maxstore_theme_js');

////////////////////////////////////////////////////////////////////
// Register Custom Navigation Walker include custom menu widget to use walkerclass
////////////////////////////////////////////////////////////////////

require_once trailingslashit(get_template_directory()) . 'lib/wp_bootstrap_navwalker.php';

////////////////////////////////////////////////////////////////////
// Register Widgets
////////////////////////////////////////////////////////////////////

add_action('widgets_init', 'maxstore_widgets_init');

function maxstore_widgets_init()
{
    register_sidebar(
        array(
            'name' => __('Right Sidebar', 'maxstore'),
            'id' => 'maxstore-right-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

    //!!! меню регистрации в шапку
    register_sidebar(array(
        'name' => __('Регистрация в шапке', 'maxstore'),
        'id' => 'top-right-area',
        'description' => __('Register menu', 'maxstore'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(
        array(
            'name' => __('Left Sidebar', 'maxstore'),
            'id' => 'maxstore-left-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    //!!! левый, средний, правый и нижний виджеты в футере
    register_sidebar(
        array(
            'name' => __('Footer Left Section', 'maxstore'),
            'id' => 'footer-left-area',
            'description' => __('Левый виджет в футере', 'maxstore'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    register_sidebar(
        array(
            'name' => __('Footer Middle Section', 'maxstore'),
            'id' => 'footer-middle-area',
            'description' => __('Средний виджет в футере', 'maxstore'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    register_sidebar(
        array(
            'name' => __('Footer Right Section', 'maxstore'),
            'id' => 'footer-right-area',
            'description' => __('Правый виджет в футере', 'maxstore'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    register_sidebar(
        array(
            'name' => __('Footer Bottom Section', 'maxstore'),
            'id' => 'footer-bottom-area',
            'description' => __('Нижний виджет в футере', 'maxstore'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    register_sidebar(
        array(
            'name' => __('Поиск', 'maxstore'),
            'id' => 'top-search-form',
            'description' => __('Поиск в header', 'maxstore'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    register_sidebar(
        array(
            'name' => __('Top category menu', 'maxstore'),
            'id' => 'category-menu',
            'description' => __('Категории меню', 'maxstore'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
}

////////////////////////////////////////////////////////////////////
// Register hook and action to set Main content area col-md- width based on sidebar declarations
////////////////////////////////////////////////////////////////////

add_action('maxstore_main_content_width_hook', 'maxstore_main_content_width_columns');

function maxstore_main_content_width_columns()
{

    $columns = '12';

    if (get_theme_mod('rigth-sidebar-check', 1) != 0) {
        $columns = $columns - absint(get_theme_mod('right-sidebar-size', 3));
    }

    if (get_theme_mod('left-sidebar-check', 0) != 0) {
        $columns = $columns - absint(get_theme_mod('left-sidebar-size', 3));
    }

    echo $columns;
}

function maxstore_main_content_width()
{
    do_action('maxstore_main_content_width_hook');
}

////////////////////////////////////////////////////////////////////
// Set Content Width
////////////////////////////////////////////////////////////////////

function maxstore_content_width()
{
    $GLOBALS['content_width'] = apply_filters('maxstore_content_width', 800);
}
add_action('after_setup_theme', 'maxstore_content_width', 0);

////////////////////////////////////////////////////////////////////
// Theme Info page
////////////////////////////////////////////////////////////////////

if (is_admin() && !is_child_theme()) {
    include_once trailingslashit(get_template_directory()) . 'lib/welcome/welcome-screen.php';
}

if (!function_exists('maxstore_breadcrumb')):

////////////////////////////////////////////////////////////////////
    // Breadcrumbs
    ////////////////////////////////////////////////////////////////////
    function maxstore_breadcrumb()
{
        global $post, $wp_query;

        $home = esc_html_x('Home', 'breadcrumb', 'maxstore');
        $delimiter = ' &raquo; ';
        $homeLink = home_url();
        if (is_home() || is_front_page()) {

            // no need for breadcrumbs in homepage
        } else {
            echo '<div id="breadcrumbs" >';
            echo '<div class="breadcrumbs-inner text-right">';

            // main breadcrumbs lead to homepage

            echo '<span><a href="' . esc_url($homeLink) . '">' . '<i class="fa fa-home"></i><span>' . $home . '</span>' . '</a></span>' . $delimiter . ' ';

            // if blog page exists

            if ('page' == get_option('show_on_front') && get_option('page_for_posts')) {
                echo '<span><a href="' . esc_url(get_permalink(get_option('page_for_posts'))) . '">' . '<span>' . esc_html__('Blog', 'maxstore') . '</span></a></span>' . $delimiter . ' ';
            }

            if (is_category()) {
                $thisCat = get_category(get_query_var('cat'), false);
                if ($thisCat->parent != 0) {
                    $category_link = get_category_link($thisCat->parent);
                    echo '<span><a href="' . esc_url($category_link) . '">' . '<span>' . get_cat_name($thisCat->parent) . '</span>' . '</a></span>' . $delimiter . ' ';
                }

                $category_id = get_cat_ID(single_cat_title('', false));
                $category_link = get_category_link($category_id);
                echo '<span><a href="' . esc_url($category_link) . '">' . '<span>' . single_cat_title('', false) . '</span>' . '</a></span>';
            } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $link = get_post_type_archive_link(get_post_type());
                if ($link) {
                    printf('<span><a href="%s">%s</a></span>', esc_url($link), $post_type->labels->name);
                    echo ' ' . $delimiter . ' ';
                }
                echo get_the_title();
            } else {
                $category = get_the_category();
                if ($category) {
                    foreach ($category as $cat) {
                        echo '<span><a href="' . esc_url(get_category_link($cat->term_id)) . '">' . '<span>' . $cat->name . '</span>' . '</a></span>' . $delimiter . ' ';
                    }
                }

                echo get_the_title();
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404() && !is_search()) {
            $post_type = get_post_type_object(get_post_type());
            echo $post_type->labels->singular_name;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            echo '<span><a href="' . esc_url(get_permalink($parent)) . '">' . '<span>' . $parent->post_title . '</span>' . '</a></span>';
            echo ' ' . $delimiter . ' ' . get_the_title();
        } elseif (is_page() && !$post->post_parent) {
            echo '<span><a href="' . esc_url(get_permalink()) . '">' . '<span>' . get_the_title() . '</span>' . '</a></span>';
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_post($parent_id);
                $breadcrumbs[] = '<span><a href="' . esc_url(get_permalink($page->ID)) . '">' . '<span>' . get_the_title($page->ID) . '</span>' . '</a></span>';
                $parent_id = $page->post_parent;
            }

            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs) - 1) {
                    echo ' ' . $delimiter . ' ';
                }

            }

            echo $delimiter . '<span><a href="' . esc_url(get_permalink()) . '">' . '<span>' . the_title_attribute('echo=0') . '</span>' . '</a></span>';
        } elseif (is_tag()) {
            $tag_id = get_term_by('name', single_cat_title('', false), 'post_tag');
            if ($tag_id) {
                $tag_link = get_tag_link($tag_id->term_id);
            }

            echo '<span><a href="' . esc_url($tag_link) . '">' . '<span>' . single_cat_title('', false) . '</span>' . '</a></span>';
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo '<span><a href="' . esc_url(get_author_posts_url($userdata->ID)) . '">' . '<span>' . $userdata->display_name . '</span>' . '</a></span>';
        } elseif (is_404()) {
            echo esc_html__('Error 404', 'maxstore');
        } elseif (is_search()) {
            echo esc_html__('Search results for', 'maxstore') . ' ' . get_search_query();
        } elseif (is_day()) {
            echo '<span><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . '<span>' . get_the_time('Y') . '</span>' . '</a></span>' . $delimiter . ' ';
            echo '<span><a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . '<span>' . get_the_time('F') . '</span>' . '</a></span>' . $delimiter . ' ';
            echo '<span><a href="' . esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))) . '">' . '<span>' . get_the_time('d') . '</span>' . '</a></span>';
        } elseif (is_month()) {
            echo '<span><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . '<span>' . get_the_time('Y') . '</span>' . '</a></span>' . $delimiter . ' ';
            echo '<span><a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . '<span>' . get_the_time('F') . '</span>' . '</a></span>';
        } elseif (is_year()) {
            echo '<span><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . '<span>' . get_the_time('Y') . '</span>' . '</a></span>';
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }

            echo esc_html__('Page', 'maxstore') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }

        }

        echo '</div></div>';
    }
}

endif;

////////////////////////////////////////////////////////////////////
// Social links
////////////////////////////////////////////////////////////////////
if (!function_exists('maxstore_social_links')):

    /**
     * This function is for social links display on header
     *
     * Get links through Theme Options
     */
    function maxstore_social_links()
{
        $twp_social_links = array(
            'twp_social_facebook' => 'facebook',
            'twp_social_twitter' => 'twitter',
            'twp_social_google' => 'google-plus',
            'twp_social_instagram' => 'instagram',
            'twp_social_pin' => 'pinterest',
            'twp_social_youtube' => 'youtube',
            'twp_social_reddit' => 'reddit',
            'twp_social_linkedin' => 'linkedin',
            'twp_social_skype' => 'skype',
            'twp_social_vimeo' => 'vimeo',
            'twp_social_flickr' => 'flickr',
            'twp_social_dribble' => 'dribbble',
            'twp_social_envelope-o' => 'envelope-o',
            'twp_social_rss' => 'rss',
        );
        ?>
			<div class="social-links">
				<ul>
					<?php
    $i = 0;
        $twp_links_output = '';
        foreach ($twp_social_links as $key => $value) {
            $link = get_theme_mod($key, '');
            if (!empty($link)) {
                $twp_links_output .=
                '<li><a href="' . esc_url($link) . '" target="_blank"><i class="fa fa-' . strtolower($value) . '"></i></a></li>';
            }
            $i++;
        }
        echo $twp_links_output;
        ?>
				</ul>
			</div><!-- .social-links -->
			<?php
    }

endif;

////////////////////////////////////////////////////////////////////
// WooCommerce section
////////////////////////////////////////////////////////////////////
if (class_exists('WooCommerce')) {

////////////////////////////////////////////////////////////////////
    // WooCommerce header cart
    ////////////////////////////////////////////////////////////////////
    if (!function_exists('maxstore_cart_link')) {

        function maxstore_cart_link()
        {
            if (get_theme_mod('cart-top-icon', 1) == 1) {
                ?>
<a class="cart-contents text-right" href="<?php echo esc_url(wc_get_cart_url()); ?>"
	title="<?php esc_attr_e('View your shopping cart', 'maxstore');?>">
	<i class="fa fa-shopping-cart"><span
			class="count"><?php echo absint(WC()->cart->get_cart_contents_count()); ?></span></i><span
		class="amount-title hidden-sm hidden-xs"><?php echo esc_html_e('Cart ', 'maxstore'); ?></span><span
		class="amount-cart"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span>
</a>
<?php
}
        }

    }
    if (!function_exists('maxstore_head_wishlist')) {

        function maxstore_head_wishlist()
        {
            if (function_exists('YITH_WCWL')) {
                $wishlist_url = YITH_WCWL()->get_wishlist_url();
                ?>
<div class="top-wishlist text-right">
	<a href="<?php echo esc_url($wishlist_url); ?>" title="<?php esc_attr_e('Wishlist', 'maxstore');?>"
		data-toggle="tooltip" data-placement="top">
		<div class="fa fa-heart">
			<div class="count"><span><?php echo absint(yith_wcwl_count_products()); ?></span></div>
		</div>
	</a>
</div>
<?php
}
        }

    }
    // Header wishlist icon ajax update
    add_action('wp_ajax_yith_wcwl_update_single_product_list', 'maxstore_head_wishlist');
    add_action('wp_ajax_nopriv_yith_wcwl_update_single_product_list', 'maxstore_head_wishlist');

    if (!function_exists('maxstore_header_cart')) {

        function maxstore_header_cart()
        {
            ?>
<div class="header-cart-inner">
	<?php maxstore_cart_link();?>
	<ul class="site-header-cart menu list-unstyled">
		<li>
			<?php the_widget('WC_Widget_Cart', 'title=');?>
		</li>
	</ul>
</div>
<?php
if (get_theme_mod('wishlist-top-icon', 0) != 0) {
                maxstore_head_wishlist();
            }
        }

    }
    if (!function_exists('maxstore_header_add_to_cart_fragment')) {
        add_filter('woocommerce_add_to_cart_fragments', 'maxstore_header_add_to_cart_fragment');

        function maxstore_header_add_to_cart_fragment($fragments)
        {
            ob_start();

            maxstore_cart_link();

            $fragments['a.cart-contents'] = ob_get_clean();

            return $fragments;
        }

    }
////////////////////////////////////////////////////////////////////
    // Change number of products displayed per page
    ////////////////////////////////////////////////////////////////////
    add_filter('loop_shop_per_page', 'maxstore_new_loop_shop_per_page', 20);

    function maxstore_new_loop_shop_per_page($cols)
    {
        // $cols contains the current number of products per page based on the value stored on Options -> Reading
        // Return the number of products you wanna show per page.
        $cols = absint(get_theme_mod('archive_number_products', 24));
        return $cols;
    }
////////////////////////////////////////////////////////////////////
    // Change number of products per row
    ////////////////////////////////////////////////////////////////////
    add_filter('loop_shop_columns', 'maxstore_loop_columns');
    if (!function_exists('maxstore_loop_columns')) {

        function maxstore_loop_columns()
        {
            return absint(get_theme_mod('archive_number_columns', 4));
        }

    }

////////////////////////////////////////////////////////////////////
    // Archive product wishlist button
    ////////////////////////////////////////////////////////////////////
    function maxstore_wishlist_products()
    {
        if (function_exists('YITH_WCWL')) {
            global $product;
            $url = add_query_arg('add_to_wishlist', $product->get_id());
            $id = $product->get_id();
            $wishlist_url = YITH_WCWL()->get_wishlist_url();
            ?>
<div class="add-to-wishlist-custom add-to-wishlist-<?php echo esc_attr($id); ?>">
	<div class="yith-wcwl-add-button show" style="display:block"> <a href="<?php echo esc_url($url); ?>"
			rel="nofollow" data-product-id="<?php echo esc_attr($id); ?>" data-product-type="simple"
			class="add_to_wishlist"><?php _e('Add to Wishlist', 'maxstore');?></a><img
			src="<?php echo get_template_directory_uri() . '/img/loading.gif'; ?>" class="ajax-loading" alt="loading"
			width="16" height="16"></div>
	<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> <span
			class="feedback"><?php esc_html_e('Added!', 'maxstore');?></span> <a
			href="<?php echo esc_url($wishlist_url); ?>"><?php esc_html_e('View Wishlist', 'maxstore');?></a></div>
	<div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"> <span
			class="feedback"><?php esc_html_e('The product is already in the wishlist!', 'maxstore');?></span> <a
			href="<?php echo esc_url($wishlist_url); ?>"><?php esc_html_e('Browse Wishlist', 'maxstore');?></a>
	</div>
	<div class="clear"></div>
	<div class="yith-wcwl-wishlistaddresponse"></div>
</div>
<?php
}
    }

    add_action('woocommerce_before_shop_loop_item', 'maxstore_wishlist_products', 9);

    function maxstore_woocommerce_breadcrumbs()
    {
        return array(
            'delimiter' => ' &raquo; ',
            'wrap_before' => '<div id="breadcrumbs" ><div class="breadcrumbs-inner text-right">',
            'wrap_after' => '</div></div>',
            'before' => '',
            'after' => '',
            'home' => esc_html_x('Home', 'woocommerce breadcrumb', 'maxstore'),
        );
    }

    add_filter('woocommerce_breadcrumb_defaults', 'maxstore_woocommerce_breadcrumbs');
}
////////////////////////////////////////////////////////////////////
// WooCommerce end
////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////
// Excerpt functions
////////////////////////////////////////////////////////////////////
function maxstore_excerpt_length($length)
{
    if (is_single()) {
        return 15;
    } else {
        return 40;
    }
}

add_filter('excerpt_length', 'maxstore_excerpt_length', 999);

function maxstore_excerpt_more($more)
{
    return '&hellip;';
}

add_filter('excerpt_more', 'maxstore_excerpt_more');

/*!!! dropdown select вместо цифр для quantity совместно с файликом quantity-input */
add_filter('woocommerce_quantity_input_args', 'my_quantity_input_args', 10, 2);
function my_quantity_input_args($args, $product)
{

    // add style to the $default;
    $args['style'] = apply_filters('woocommerce_quantity_style', 'float:left;', $product);

    // check for min
    if (empty($args['min_value'])) {
        $args['min_value'] = 1;
    }

    // check for max
    if (empty($args['max_value'])) {
        $args['max_value'] = 25;
    }
    // I'm not sure w    here to get your max_qty.

    return $args;
}

//!!! добавляем функцию сортировки по весу

add_filter('woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args');
function custom_woocommerce_get_catalog_ordering_args($args)
{
    $orderby_value = isset($_GET['orderby']) ? woocommerce_clean($_GET['orderby']) : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));
    if ('weasc' == $orderby_value) {
        $args['orderby'] = 'meta_value_num'; //поле по которому сортируем
        $args['order'] = 'ASC'; //по возрастанию (ASC) или убыванию (DESC)
        $args['meta_key'] = '_weight'; //по конкретному совпадению ключа
    }
    if ('wedesc' == $orderby_value) {
        $args['orderby'] = 'meta_value_num'; //поле по которому сортируем
        $args['order'] = 'DESC'; //по возрастанию (ASC) или убыванию (DESC)
        $args['meta_key'] = '_weight'; //по конкретному совпадению ключа
    }
    return $args;
}
add_filter('woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby');

//!!! убираем лишние сортировки и добавляем по весу

function custom_woocommerce_catalog_orderby($orderby)
{

    // unset($orderby["popularity"]); // по популярности
    unset($orderby["rating"]); // по рейтингу
    // unset($orderby["date"]); по новизне или по дате
    unset($orderby["price"]); //по цене возврастания
    unset($orderby["price-desc"]); // по цене убывания
    $orderby['weasc'] = 'Вес по возрастанию';
    $orderby['wedesc'] = 'Вес по убыванию';
    return $orderby;
}
add_filter("woocommerce_catalog_orderby", "custom_woocommerce_catalog_orderby", 20);

// !!! убираем проверку сложности пароля при регистрации

add_action('wp_print_scripts', 'remove_wc_password_meter', 100);
function remove_wc_password_meter()
{
    wp_dequeue_script('wc-password-strength-meter');
}

/**
 * !!!Добаляем новые поля в меню регистрации.
 *
 * @воззвращает строку Полей регистрации HTML.
 */
function wooc_extra_register_fields()
{
    ?>

<p class="form-row form-row-wide">
	<label for="reg_billing_first_name"><?php _e('Контактное лицо', 'woocommerce');?> <span
			class="required">*</span></label>
	<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_first_name"
		id="reg_billing_first_name"
		value="<?php if (!empty($_POST['billing_first_name'])) {
        esc_attr_e($_POST['billing_first_name']);
    }
    ?>" />
</p>

<p class="form-row form-row-wide">
	<label for="reg_billing_address_1"><?php _e('Регион или город', 'woocommerce');?> <span
			class="required">*</span></label>
	<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_address_1"
		id="reg_billing_address_1"
		value="<?php if (!empty($_POST['billing_address_1'])) {
        esc_attr_e($_POST['billing_address_1']);
    }
    ?>" />
</p>

<p class="form-row form-row-wide">
	<label for="reg_billing_company"><?php _e('Компания', 'woocommerce');?> <span class="required">*</span></label>
	<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_company"
		id="reg_billing_company"
		value="<?php if (!empty($_POST['billing_company'])) {
        esc_attr_e($_POST['billing_company']);
    }
    ?>" />
</p>

<p class="form-row form-row-wide">
	<label for="reg_billing_phone"><?php _e('Телефон', 'woocommerce');?> <span class="required">*</span></label>
	<input type="tel" class="woocommerce-Input woocommerce-Input--phone input-text" name="billing_phone"
		id="reg_billing_phone"
		value="<?php if (!empty($_POST['billing_phone'])) {
        esc_attr_e($_POST['billing_phone']);
    }
    ?>" />
</p>

<?php
}
add_action('woocommerce_register_form_start', 'wooc_extra_register_fields');

/**
 * !!! Проверка дополнительных полей регистрации.
 *
 * @param  строка $username          Current username.
 * @param  строка $email             Current email.
 * @param  объект $validation_errors WP_Error object.
 *
 * @return void
 */
function wooc_validate_extra_register_fields($username, $email, $validation_errors)
{
    if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
        $validation_errors->add('billing_first_name_error', __('Введите контактное лицо!', 'woocommerce'));
    }

    if (isset($_POST['billing_address_1']) && empty($_POST['billing_address_1'])) {
        $validation_errors->add('billing_address_1_error', __('Введите регион или адрес!', 'woocommerce'));
    }

    if (isset($_POST['billing_company']) && empty($_POST['billing_company'])) {
        $validation_errors->add('billing_company_error', __('Введите название компании!', 'woocommerce'));
    }

    if (isset($_POST['billing_phone']) && empty($_POST['billing_phone'])) {
        $validation_errors->add('billing_phone_error', __('Введите номер телефона!', 'woocommerce'));
    }
}
add_action('woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3);

/** !!!Сохранение дополнительных полей регистрации.
 *
 * @param  int  $customer_id Current customer ID.
 *
 * @return void
 */

function wooc_save_extra_register_fields($customer_id)
{
    if (isset($_POST['billing_first_name'])) {
        // WordPress default first name field.
        // update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );

        // WooCommerce billing first name.
        update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
    }

    if (isset($_POST['billing_address_1'])) {
        // WooCommerce billing address
        update_user_meta($customer_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']));
    }

    if (isset($_POST['billing_company'])) {
        // WooCommerce billing postcode
        update_user_meta($customer_id, 'billing_company', sanitize_text_field($_POST['billing_company']));
    }

    if (isset($_POST['billing_phone'])) {
        // WooCommerce billing phone
        update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
    }
}

add_action('woocommerce_created_customer', 'wooc_save_extra_register_fields');

/**
 * Выключение автоматической регистрации нового пользователя без одобрения
 */

function ws_new_user_approve_autologout()
{
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        $user_id = $current_user->ID;

        if (get_user_meta($user_id, 'pw_user_status', true) === 'approved') {$approved = true;} else { $approved = false;}

        if ($approved) {
            return $redirect_url;
        } else { //when user not approved yet, log them out
            wp_logout();
            return make_clickable(esc_url(wc_get_page_permalink('myaccount'))) . "?approved=false";
        }
    }
}
add_action('woocommerce_registration_redirect', 'ws_new_user_approve_autologout', 2);

// надпись на странице регистрации
function ws_new_user_approve_registration_message()
{
    // надпись на странице для входа и регистрации для незарегистрированного пользователя
    $not_approved_message = '<p class="Регистрация"><strong>Уважаемые дамы и господа! </strong>Регистрация только для юридических лиц и ИП!</p>';

    if (isset($_REQUEST['approved'])) {
        $approved = $_REQUEST['approved'];
        if ($approved == 'false') {
            echo '<p class="Успешная регистрация">Регистрация прошла успешно! Вы будете уведомлены после утверждения вашей учетной записи.</p>';
        } else {
            echo $not_approved_message;
        }

    } else {
        echo $not_approved_message;
    }

}
add_action('woocommerce_before_customer_login_form', 'ws_new_user_approve_registration_message', 2);

//функция Email уведомления о регистрации клиенту и администратору
//контент повзаимствован из: woocommerce/classes/class-wc-email.php
function ws_new_user_send_email($user_id)
{

    global $woocommerce;
    //создаем почтовую программу
    $mailer = $woocommerce->mailer();

    if (!$user_id) {
        return;
    }

    $user = new WP_User($user_id);

    $user_email = stripslashes($user->user_email);
    $billing_first_name = stripslashes($user->billing_first_name);
    $billing_address_1 = stripslashes($user->billing_address_1);
    $billing_company = stripslashes($user->billing_company);
    $billing_phone = stripslashes($user->billing_phone);

    // $user_pass  = "Как при регистрации";

    $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

    // ЗАПИСЬ СООБЩЕНИЯ АДМИНИСТРАТОРУ
    // эта надпись в шапке письма отображается:
    $email_heading_admin = "Одобрение клиента " . $billing_first_name . " ";

    // надпись сверху письма и в адресе
    $subject = apply_filters('woocommerce_email_subject_customer_new_account', sprintf(__('Регистрация на сайте %s ', 'woocommerce'), $blogname), $user);

    // открываем буфер для записи
    ob_start();

    // создаем сообщение присоединяя к указанному файлу значения переменных
    woocommerce_get_template('emails/customer-new-account-for-admin.php', array(
        'user_email' => $user_email,
        'billing_first_name' => $billing_first_name,
        'billing_address_1' => $billing_address_1,
        'billing_company' => $billing_company,
        'billing_phone' => $billing_phone,
        'blogname' => $blogname,
        'email_heading' => $email_heading_admin,
    ));

    // Записываем сообщение из буфера и очищаем его
    $message_for_admin = ob_get_clean();

    // ЗАПИСЬ СООБЩЕНИЯ О РЕГИСТРАЦИИ КЛИЕНТУ
    // эта надпись в шапке письма отображается:
    $email_heading_user = "Уважаемый клиент " . $billing_first_name . "!";

    // открытие буфера для записи
    ob_start();

    // создание сообщения для пользователя
    woocommerce_get_template('emails/customer-new-account-for-user.php', array(
        'user_email' => $user_email,
        'billing_first_name' => $billing_first_name,
        'blogname' => $blogname,
        'email_heading' => $email_heading_user,
    ));

    // запись сообщения в переменную
    $message_for_user = ob_get_clean();

    // Отправка почты пользователю и администратору о регистрации
    woocommerce_mail(get_bloginfo('admin_email'), $subject, $message_for_admin, $headers = "Content-Type: text/htmlrn", $attachments = "");
    woocommerce_mail($user_email, $subject, $message_for_user, $headers = "Content-Type: text/htmlrn", $attachments = "");

}
add_action('woocommerce_created_customer', 'ws_new_user_send_email', 10, 1);

//функция Email уведомления об одобрении клиенту
function ws_new_user_approve_send_approved_email($user_id)
{

    global $woocommerce;
    //Instantiate mailer
    $mailer = $woocommerce->mailer();

    if (!$user_id) {
        return;
    }

    $user = new WP_User($user_id);

    $user_email = stripslashes($user->user_email);
    $billing_first_name = stripslashes($user->billing_first_name);

    $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

    $subject = apply_filters('woocommerce_email_subject_customer_new_account', sprintf(__('Ваш аккаунт на сайте %s одобрен!', 'woocommerce'), $blogname), $user);
    $email_heading = "Уважаемый " . $billing_first_name . "!";

    // открытие буфера для записи
    ob_start();

    // форммирование сообщения из файла с использованием переменных
    woocommerce_get_template('emails/customer-account-approved.php', array(
        'user_email' => $user_email,
        'billing_first_name' => $billing_first_name,
        'blogname' => $blogname,
        'email_heading' => $email_heading,
    ));

    // запись сообщения из буфера и стирание буфера
    $message = ob_get_clean();

    // Send the mail
    woocommerce_mail($user_email, $subject, $message, $headers = "Content-Type: text/htmlrn", $attachments = "");
}
add_action('new_user_approve_approve_user', 'ws_new_user_approve_send_approved_email', 10, 1);

function ws_new_user_approve_send_denied_email($user_id)
{
    return;
}
add_action('new_user_approve_deny_user', 'ws_new_user_approve_send_denied_email', 10, 1);

/**
 * * показать общий вес под корзиной и в письме
 */

add_action('woocommerce_cart_collaterals', 'myprefix_cart_extra_info');
add_action('woocommerce_email_after_order_table', 'myprefix_cart_extra_info');
function myprefix_cart_extra_info()
{
    global $woocommerce;
    echo '<div class="cart-extra-info">';
    echo '<p class="total-weight"><strong>' . __('Общий вес:', 'woocommerce');
    echo ' ' . $woocommerce->cart->cart_contents_weight . ' г. ';
    echo '</strong></p>';
    echo '</div>';
}

add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');

function translate_text($translated)
{
    $translated = str_ireplace('Подытог', 'Итого', $translated);
    return $translated;
}

//Увеличение количества вариаций продукта до 150
/* define ( 'WC_MAX_LINKED_VARIATIONS', 100 ); */

/* отображение 50ти вариаций на странице редактирования вариативного товара */
add_filter('woocommerce_admin_meta_boxes_variations_per_page', 'handsome_bearded_guy_increase_variations_per_page');
function handsome_bearded_guy_increase_variations_per_page()
{
    return 50;
}

/* add_filter( 'woocommerce_product_tabs', 'wc_remove_description_tab', 11, 1 );
function wc_remove_description_tab( $tabs ) {
if ( is_user_logged_in() ) {
unset( $tabs['description'] );
}
} */

/* Изменяем размер изображений в корзине */
/* add_image_size( 'cart_image_size', 150, 150, false );
add_filter( 'woocommerce_cart_item_new', function( $image, $cart_item, $cart_item_key ){
$product = $cart_item['data'];
return $product->get_image( 'cart_image_size' );
}, 3, 100 ); */
/*  */

/* input вместо счетчика  */
/*
function woocommerce_quantity_input($data = null) {
global $product;
if (!$data) {
$defaults = array(
'input_name'   => 'quantity',
'input_value'   => '1',
'max_value'     => apply_filters( 'woocommerce_quantity_input_max', '', $product ),
'min_value'     => apply_filters( 'woocommerce_quantity_input_min', '', $product ),
'step'         => apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
'style'         => apply_filters( 'woocommerce_quantity_style', 'float:left;', $product )
);
} else {
$defaults = array(

'input_name'   => $data['input_name'],

'input_value'   => $data['input_value'],
'step'         => apply_filters( 'cw_woocommerce_quantity_input_step', '1', $product ),

'max_value'     => apply_filters( 'cw_woocommerce_quantity_input_max', '', $product ),

'min_value'     => apply_filters( 'cw_woocommerce_quantity_input_min', '', $product ),

'style'         => apply_filters( 'cw_woocommerce_quantity_style', 'float:left;', $product )

);

}
if ( ! empty( $defaults['min_value'] ) )
$min = $defaults['min_value'];
else $min = 1;
if ( ! empty( $defaults['max_value'] ) )
$max = $defaults['max_value'];
else $max = 15;
if ( ! empty( $defaults['step'] ) )
$step = $defaults['step'];
else $step = 1;
$options = '';
for ( $count = $min; $count <= $max; $count = $count+$step ) {

$selected = $count === $defaults['input_value'] ? ' selected' : '';

$options .= '<option value="' . $count . '"'.$selected.'>' . $count . '</option>';
}
echo '<div class="cw_quantity_select quantity" style="' . $defaults['style'] . '"><select name="' . esc_attr( $defaults['input_name'] ) . '" title="' . _x( 'Qty', 'Product Description', 'woocommerce' ) . '" class="cw_qty">' . $options . '</select></div>';

}  */

// Скрипт кнопок - и + добавления товара
function kia_add_script_to_footer()
{
    if (!is_admin()) {?>
<script>
	jQuery(document).ready(function ($) {

		$(document).on('click', '.plus', function (e) { // replace '.quantity' with document (without single quote)
			$input = $(this).prev('input.qty');
			var val = parseInt($input.val());
			var step = $input.attr('step');
			step = 'undefined' !== typeof (step) ? parseInt(step) : 1;
			$input.val(val + step).change();
		});
		$(document).on('click', '.minus', // replace '.quantity' with document (without single quote)
			function (e) {
				$input = $(this).next('input.qty');
				var val = parseInt($input.val());
				var step = $input.attr('step');
				step = 'undefined' !== typeof (step) ? parseInt(step) : 1;
				if (val > 0) {
					$input.val(val - step).change();
				}
			});
	});
</script>
<?php }
}
add_action('wp_footer', 'kia_add_script_to_footer');

/*  отключить название на картинке товара при наведении */
add_filter('wp_get_attachment_image_attributes', 'remove_image_text');
function remove_image_text($attr)
{
    // unset( $attr['alt'] );
    unset($attr['title']);
    return $attr;
}

/* отключение ссылкок на странице категорий !!! пока не нужно*/
/* add_action('woocommerce_before_shop_loop_item', 'remove_link', 1);
function remove_link() {
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
} */

/* Открытие ссылок товаров в новом окне
remove_action( 'woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 10 );
// add a hook to my custom function
add_action ( 'woocommerce_before_shop_loop_item', 'ami_function_open_new_tab', 10 );
function ami_function_open_new_tab() {
echo '<a target="_blank" href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">';
} */

/* Добавление кнопки просмотра товара на товаре каталога */
// add_action( 'woocommerce_after_shop_loop_item', 'add_my_morebutton', 5);
// function add_my_morebutton( ) {
// echo '<a href="' . get_the_post_thumbnail_url( $product_id, 'shop_single' ) . '"  rel="lightbox" class="quickview button">Изображение</a>'; }

/* заключаем блок описаний товара в каталоге  в обертку*/
// add_action( 'woocommerce_before_shop_loop_item_title', 'div_start_loop_product_block', 25 );
// add_action( 'woocommerce_after_shop_loop_item_title', 'div_start_loop_product_block', 15 );
// function div_start_loop_product_block() {
//     echo '<div class="loop_product">';
// }
// add_action( 'woocommerce_after_shop_loop_item', 'div_end_loop_product_block', 25 );
// function div_end_loop_product_block() {
//     echo '</div><!-- /loop_product-->';
// }
/* удаляем похожие товары на странице товара */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/* разрешаем создавать 90 вариаций товара */
if (!defined('WC_MAX_LINKED_VARIATIONS')) {
    define('WC_MAX_LINKED_VARIATIONS', 90);
}
/* заключаем картинку в обертку  и добавляем отображение веса */

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

if (!function_exists('woocommerce_template_loop_product_thumbnail')) {
    function woocommerce_template_loop_product_thumbnail()
    {
        echo woocommerce_get_product_thumbnail();
    }
}
if (!function_exists('woocommerce_get_product_thumbnail')) {
    function woocommerce_get_product_thumbnail($size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0)
    {
        global $post, $woocommerce, $product;
        $output = '<div class= "p-b-image">';

        if (has_post_thumbnail()) {
            $output .= get_the_post_thumbnail($post->ID, $size);
        }
        $weight = $product->get_weight();
        if ($product->has_weight()) {
            $output .= '<div class="p-b-weight">' . $weight . 'г.' . '</div>';
            $output .= '</div>';
        }
        return $output;
    }
}
// меняем переход по ссылке к товару на изображение товара в категории
// add_action ('woocommerce_before_shop_loop_item', 'custom_loop_product_link_open', 1);
// function custom_loop_product_link_open(){
//     // For product category archives pages only
//     if(is_product_category()){
//         // Remove default image link
//         remove_action ('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
//         // Add custom image link function
//         add_action ('woocommerce_before_shop_loop_item', 'change_loop_product_link_open', 10);
//     }
// }
// function change_loop_product_link_open(){
//     global $product; // Get the WC_Product object

//     echo '<a href="' . get_the_post_thumbnail_url( $product->get_id(), 'full' )  . '" rel="lightbox" class="woocommerce-LoopProduct-link">';
// }

// скрыть цену товара так как она нам не нужна
add_filter('woocommerce_get_price_html', function ($price) {
    if (is_admin()) {
        return $price;
    }

    return '';
});

/*
 * Remove "Add to Cart" button from the product category
 */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

/**
 * Show the product title in the product loop. By default this is an H4.
 */
function woocommerce_template_loop_product_title()
{
    echo '<h4 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">' . get_the_title() . '</h4>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Show product weight on archive pages
 */
// add_action( 'woocommerce_shop_loop_item_title', 'rs_show_weights', 2 );

// function rs_show_weights() {

//     global $product;
//     $weight = $product->get_weight();
//     // $sku = $product->get_sku();

//     if ( $product->has_weight() ) {
//         echo '<div class="p-b-weight">Вес: ' . $weight . ' г.' . '</div>';
//     }
// }

// Ссылка на каталог со страницы товаров
add_action('woocommerce_before_single_product_summary', 'back_link_at_product_page', 10);
function back_link_at_product_page()
{
    echo '<div class="col-md-12 text-center p-p-back">';
    echo '<a onclick="history.back();return false;">Вернуться назад</a>';
    echo '</div>';
}
// перенос отображения колличества товаров вниз
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
add_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
/* скпипт отображения верхнего меню категорий при прокрутке страницы*/
function menu_add_script_to_footer()
{
    if (is_shop() || is_product_category()) {?>
<script>
/* top menu of categories products */
jQuery( document ).ready( function ( $ ) {
    $( ".category-menu" ).hide();
    $( function () {
        $( window ).scroll( function () {
            if ( $( this ).scrollTop() > 120 ) {
                $( '.category-menu' ).fadeIn(900);
            } else {
                $( '.category-menu' ).fadeOut(700);
            }
        } );
    } );
} );
</script>
<?php }
}
add_action('wp_footer', 'menu_add_script_to_footer');
/* отступ от админ панели сверху если пользователь это Я - администратор */
function top_menu_customize_css()
{
    if (is_user_logged_in() && is_super_admin() && !is_admin()) {?>
	<style type="text/css">
	.category-menu {top: 35px !important;}
	</style>
    <?php } // end if ;
}
add_action('wp_head', 'top_menu_customize_css');
