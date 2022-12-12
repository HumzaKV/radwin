<?php

/**
 * Radwin Core
 * @package Radwin
 * @author Sudarshan Thiagarajan <st@sudarshan.me>
 * @version 1.0.0
 */

/**
 * Load composer dependencies.
 */

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

define('THEME_PATH', get_template_directory());
define('THEME_URL', get_template_directory_uri());

$autoload_path = dirname(__FILE__) . '/vendor/autoload.php';
if (file_exists($autoload_path)) {
    require_once $autoload_path;
}

require get_template_directory() . '/inc/variables.php';
require get_template_directory() . '/inc/register-globals.php';
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/security.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-comments.php';
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';
require get_template_directory() . '/inc/woocommerce.php';
require get_template_directory() . '/inc/editor.php';
require get_template_directory() . '/inc/rad-core.php';
require get_template_directory() . '/inc/rad-version.php';
require get_template_directory() . '/inc/events-calendar.php';
require get_template_directory() . '/inc/distributors.php';
require get_template_directory() . '/inc/brochures.php';
require get_template_directory() . '/component-templates/global-components.php';


function theme_files()
{
    // //jquery cdn
    // wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', false);
    // wp_enqueue_script('jquery');

    // Style.css
    wp_register_style('style-file', THEME_URL . '/style.css', false, time());
    wp_enqueue_style('style-file');

    // fancybox files
    wp_register_style('fancybox', THEME_URL . '/js/jquery.fancybox.min.css', false, time());
    wp_enqueue_style('fancybox');
    wp_register_script('fancybox', THEME_URL . '/js/jquery.fancybox.min.js', array('jquery', 'jquery-ui-core'), time(), true);
    wp_enqueue_script('fancybox');

    // Owl Carousel Files
    wp_register_style('owl-carousel', THEME_URL . '/owl-carousel/owl.carousel.css', false, time());
    wp_enqueue_style('owl-carousel');
    wp_register_script('owl-carousel', THEME_URL . '/owl-carousel/owl.carousel.js', array('jquery'), time(), true);
    wp_enqueue_script('owl-carousel');

    // Owl Carousel Files
    wp_register_style('owl-animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', false);
    wp_enqueue_style('owl-animate');

    // aos Animation on Scroll
    wp_register_style('aos', THEME_URL . '/js/aos.css', false, '2.2.1');
    wp_enqueue_style('aos');
    wp_register_script('aos', THEME_URL . '/js/aos.js', array('jquery', 'jquery-ui-core'), '2.2.1', true);
    wp_enqueue_script('aos');

    //Vivus.js
    wp_register_script('vivus', get_stylesheet_directory_uri() . '/js/vivus.js', true);
    wp_enqueue_script('vivus');

    // //resource js
    // wp_register_script('resources', get_stylesheet_directory_uri() . '/js/resource-filter.js', time() , true );
    // wp_enqueue_script('resources');
}

add_action('wp_enqueue_scripts', 'theme_files');

function register_my_menu() {
    register_nav_menu('megamenu', __('Mega Menu'));
}
add_action('init', 'register_my_menu');

// load_script_footer Function
function load_script_footer()
{
    ?>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script> -->
    <script>
        jQuery(function($) {
    // $('a.mega-menu-link[href=#]').attr('href', 'javascript:void(0)');

    //Aos Animation to scroll
            AOS.init();

            $('.testimonials').owlCarousel({
                loop: true,
                margin: 10,
                center: true,
                nav: false,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });

            $('.our_story').owlCarousel({
                loop: true,
                stagePadding: 165,
                nav: false,
                dots: true,
                margin: 50,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        stagePadding: 0,
                        items: 1
                    },
                    600: {
                        stagePadding: 0,
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });


            $(document).on('mouseenter', 'ul.members li , .popup-img-area', function(e) {
                console.log('hover')
        // const myVivus = new Vivus($(e.target).find('svg').get(0), {
        //         type: 'sync',
        //         duration: 300,
        //         start: 'autostart',
        //         dashGap: 0,
        //         forceRender: false
        //     },
        //     function() {
        //         if (window.console) {
        //             console.log('Animation finished. [log triggered from callback]');
        //         }
        //     });
        // myVivus.stop().reset().play(5);
            })

    // $(".toggle-content").hide();
            $(".toggle-title").click(function() {
                $(this).next(".toggle-content").slideToggle("normal");
                $(this).toggleClass('active');
            });

    // Notification Bar
            if ($('.notification-bar-wrap').length > 0) {
                $('body').addClass('notification_active');
            }
            $('.notification-bar-wrap a.close-note').on('click', function() {
                $('.notification-bar-wrap').hide();
                $('body.page').removeClass('notification_active');
            });


    // SVG Bar Code
            window.couple;
            if ($('#couple').length > 1) {
                window.couple = new Vivus('couple', {
                    type: 'sync',
                // duration: 300,
                    start: 'autostart',
                    dashGap: 0,
                    forceRender: false,
                },
                function() {
                    if (window.console) {
                        console.log('Animation finished. [log triggered from callback]');
                    }
                });
            }

    // SVG Bar Code
            window.couple_new;
            if ($('#couple_new').length > 1) {
                window.couple_new = new Vivus('couple_new', {
                    type: 'sync',
                // duration: 300,
                    start: 'autostart',
                    dashGap: 0,
                    forceRender: false
                },
                function() {
                    if (window.console) {
                        console.log('Animation finished. [log triggered from callback]');
                    }
                });
            }

            let slider = $('.slider_pro').owlCarousel({
                items: 1,
                margin: 0,
                loop: false,
                rewind: true,
        // rewindSpeed : 50,
        // slideSpeed: 6000,
        // paginationSpeed: 50,
                autoplay: true,
                autoplayTimeout: 5000,
        // mouseDrag: true,
        // singleItem: true,
                transitionStyle: "fade",
                animateIn: 'animate__fadeIn',
                animateOut: 'animate__fadeOut'
            });

            let mob_slider = $('.mob_slider_pro').owlCarousel({
                items: 1,
                margin: 0,
                loop: false,
                rewind: true,
        // rewindSpeed : 50,
        // slideSpeed: 6000,
        // paginationSpeed: 50,
                autoplay: true,
                autoplayTimeout: 5000,
        // mouseDrag: true,
        // singleItem: true,
                transitionStyle: "fade",
                animateIn: 'animate__fadeIn',
                animateOut: 'animate__fadeOut'
            });

            $('.animate-rings-banner').css({
                'transform': 'scale(1)',
                'transition': '1s'
            });

    // slider.on('change.owl.carousel', function (event) {
    //     $('.animate-rings-banner-kv').css({'transform': 'scale(0)', 'transition': 'unset' , 'opacity' : '0'});
    // });

    // slider.on('changed.owl.carousel', function (event) {
    //     // window.couple_new.reset().play();
    //     // window.couple.reset().play();
    //     setTimeout(() => {
    //         $('.animate-rings-banner-kv').css({'transform': 'scale(1)', 'transition': '1s' , 'opacity' : '0.6'});
    //     }, 1000);
    // });


            $.urlParam = function(name) {
                var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                if (results == null) {
                    return null;
                } else {
                    return results[1] || 0;
                }
            }

            getCookie = function(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(";");
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == " ") c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }


            if (window.location.href.indexOf("suint") > -1) {
                if (navigator.userAgent.toLowerCase().indexOf("android") > -1) {
                    window.location.href = 'https://play.google.com/store/apps/details?id=com.radwin.WinTouch2';
                }
                if (navigator.userAgent.toLowerCase().indexOf("iphone") > -1) {
                    window.location.href = 'https://apps.apple.com/us/app/wintouch/id1499664592?mt=8';
                }
            }


            var hsCookieBanner = '.hs-cookie-notification-position-bottom'
            $(hsCookieBanner).on('load', function() {
                console.log('wGreat')
                if (getCookie('hubspot_cookiebanner')) {
                    console.log('wGreat')
                    var checkDivLength = setInterval(function() {
                        if ($(hsCookieBanner).length > 0) {
                    //Hide your element
                            $(hsCookieBanner).hide();
                            clearInterval(checkDivLength);
                        }
                    }, 100);
                }
            }());

        });
    </script>

    <?php

    if (isset($_GET['qrcode']) && $_GET['qrcode'] == 'success') {
        $cookie_name = "hubspot_cookiebanner";
        $cookie_value = "hide";
        setcookie($cookie_name, $cookie_value, time() + (3600), "/"); // 86400 = 1 day
        wp_redirect(home_url());
    }
}

add_action('wp_footer', 'load_script_footer', 999);

add_action('wp_head', 'load_menu');

function load_menu(){
                if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) )
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // the IP address to query
                    else
                        $ip = $_SERVER['REMOTE_ADDR']; // the IP address to query

                    $_country = json_decode( file_get_contents('http://ip-api.com/json/'. $ip) );

                    if( $_country && $_country->status == 'success' ) {
                        $country_code = $_country->countryCode;
                        if ( $country_code == 'US' || $country_code == 'CA' ) {
                            printf('<script>jQuery( ".usahide" ).addClass( "usashow");</script>');
                            ?>
                            
                      <?php
                  }
              }
                }

// Story Custom Post Type
                add_action('init', 'our_story_post_type');
                function our_story_post_type()
                {
                    register_post_type(
                        'stories',
                        array(
                            'labels' => array(
                                'name' => __('Our Story'),
                                'singular_name' => __('Our Story')
                            ),
                            'supports' => array(
                                'title',
                                'editor',
                                'thumbnail'
                            ),
                            'public' => true,
                            'has_archive' => true,
                            'menu_icon' => 'dashicons-media-archive',
                            'rewrite' => array('slug' => 'our-story')
                        )
                    );
                }

// Story Custom Post Type END

// Story Shortcode START
                add_shortcode('our_story', 'codex_our_story');
                function codex_our_story()
                {
                    ob_start();
                    ?>
                    <div class="our_story_wrap">
                        <div class="owl-carousel our_story">
                            <?php
                            $arg = array(
                                'post_type' => 'stories',
                                'posts_per_page' => -1,
                            );
                            $po = new WP_Query($arg);
                            ?>
                            <?php if ($po->have_posts()) { ?>

                                <?php while ($po->have_posts()) { ?>
                                    <?php $po->the_post();
                                    $storyid = get_the_ID();
                                    $show_button_on_listing = get_field('show_button_on_listing', $storyid);
                                    ?>
                                    <div class="item">
                                        <div class="thumbnail"><?php echo get_the_post_thumbnail(get_the_ID(), 'post_size'); ?></div>
                                        <div class="content">
                                            <div class="title"><?php the_title(); ?></div>
                                            <div class="except"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></div>
                                            <?php if ($show_button_on_listing == true) { ?>
                                                <div class="more"><a href="<?php the_permalink(); ?>" class="btn-style">Know More</a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php }
                            } ?>

                        </div>
                    </div>
                    <?php
                    wp_reset_postdata();
                    return ob_get_clean();
                }

// Story Shortcode END

// MultiPost Custom Post Type
                add_action('init', 'codex_multipost');
                function codex_multipost()
                {
                    $labels = array(
                        'name' => _x('MultiPost', 'post type general name', 'your-plugin-textdomain'),
                        'singular_name' => _x('MultiPost', 'post type singular name', 'your-plugin-textdomain'),
                        'menu_name' => _x('MultiPost', 'admin menu', 'your-plugin-textdomain'),
                        'name_admin_bar' => _x('MultiPost', 'add new on admin bar', 'your-plugin-textdomain'),
                        'add_new' => _x('Add New', 'MultiPost', 'your-plugin-textdomain'),
                        'add_new_item' => __('Add New MultiPost', 'your-plugin-textdomain'),
                        'new_item' => __('New MultiPost', 'your-plugin-textdomain'),
                        'edit_item' => __('Edit MultiPost', 'your-plugin-textdomain'),
                        'view_item' => __('View MultiPost', 'your-plugin-textdomain'),
                        'all_items' => __('All MultiPost', 'your-plugin-textdomain'),
                        'search_items' => __('Search MultiPost', 'your-plugin-textdomain'),
                        'parent_item_colon' => __('Parent MultiPost:', 'your-plugin-textdomain'),
                        'not_found' => __('No MultiPost found.', 'your-plugin-textdomain'),
                        'not_found_in_trash' => __('No MultiPost found in Trash.', 'your-plugin-textdomain')
                    );

                    $args = array(
                        'labels' => $labels,
                        'description' => __('Description.', 'your-plugin-textdomain'),
                        'public' => true,
                        'publicly_queryable' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'query_var' => true,
                        'rewrite' => array('slug' => 'multipost'),
                        'capability_type' => 'post',
                        'has_archive' => true,
                        'hierarchical' => false,
                        'show_admin_column' => true,
                        'menu_position' => null,
                        'menu_icon' => 'dashicons-format-aside',
                        'supports' => array('title', 'editor', 'thumbnail'),
                    );

                    register_post_type('multipost', $args);

                    register_taxonomy(
                        'multipost-cat',
                        'multipost',
                        array(
                            'label' => __('MultiPost Categories'),
                            'rewrite' => array('slug' => 'multipost-cat'),
                            'hierarchical' => true,
                        )
                    );
                }

// MultiPost Custom Post Type END


// SVG Image Animation START
                add_shortcode('vector_svg_animation', 'codex_svg_animation');
                function codex_svg_animation()
                {
                    ob_start();
                    ?>
                    <div class="vector_animate">
                        <!--        onclick="hand_writing.reset().play();"-->
                        <svg version="1.1" id="couple" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                        y="0px" viewBox="0 0 805.9 120" style="enable-background:new 0 0 805.9 120;" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                fill: none;
                                stroke: #FFCF61;
                                stroke-width: 2;
                                stroke-linecap: round;
                                stroke-miterlimit: 10;
                            }

                            .st1 {
                                fill: none;
                                stroke: #009DB8;
                                stroke-width: 2;
                                stroke-linecap: round;
                                stroke-miterlimit: 10;
                            }

                            .st2 {
                                fill: none;
                                stroke: #F05032;
                                stroke-width: 2;
                                stroke-linecap: round;
                                stroke-miterlimit: 10;
                            }

                            .st3 {
                                fill: none;
                                stroke: #BCBCBC;
                                stroke-width: 2;
                                stroke-linecap: round;
                                stroke-miterlimit: 10;
                            }
                        </style>
                        <path class="st0"
                        d="M412.2,60.2c7.4-2.5,14.5-5.8,21.7-8.7c7.6-3.1,15.2-6.2,22.8-9.3c8-3.2,16.1-6.5,24.6-7.3
                        c13.8-1.3,27.7,3.6,38.5,12.2c8.7,7,15.7,15.9,23,24.4c10.2,11.8,21.4,23.1,35.3,30.1c14.9,7.4,33.8,8.3,48.4-0.2
                        c15.7-9.1,30.8-19.4,45.3-30.2c11.6-8.6,22.5-18.1,34.5-26.2c23.2-15.5,50.9-29.6,79.3-30.2c14.5-0.3,29.5,3.4,41,12.2" />
                        <path class="st0"
                        d="M413,59.9c-26.3,11-55.6,22.1-82.7,30.8c-8.7,2.8-17.5,5.5-26.3,8c-19.1,5.5-38.4,10.1-58,12.9
                        c-12.5,1.8-25.5,3-38,0.6c-12.4-2.4-24.1-8.5-34.4-15.7c-4.6-3.2-9-6.7-13.3-10.3c-9.7-8.2-17.9-17.8-26.4-27.1
                        c-7.1-7.7-14.6-15-22.4-21.9C95.2,22.7,72.7,11.8,50.6,18.5c-22,6.6-39.3,28.6-47.5,49.2c-2.6,6.6-4.4,13.5-5.7,20.4" />
                        <path class="st1"
                        d="M407.2,69.5c-0.7,0.4,25.4-9.3,38.2-13.5c15-4.9,30.4-10.3,46.2-6.1c10.2,2.6,19.1,8.8,27,15.8
                        c12.2,10.6,23.3,22.5,36.3,32c8.1,5.9,17.2,10.8,27.1,12.3c8.1,1.2,16.4,0.2,24.1-2.3c13.4-4.2,25.4-12.3,36.5-20.6
                        c22.4-16.9,42.9-36.2,66.6-51.3c1.9-1.2,3.7-2.4,5.6-3.5c21.4-12.9,46.9-23.6,72.4-20.8c13,1.4,25.5,6.2,35.6,14.4" />
                        <path class="st1" d="M407.9,69.2c-27.2,9-54.5,18-82.2,25.3c-23.3,6.2-47,10.8-70.9,13.7c-26.6,3.3-54.3,2.6-78.5-10.2
                        c-11.5-6.1-21.6-14.6-31.2-23.3c-9.4-8.5-18.8-16.9-28.4-25.2c-9.6-8.2-19.1-16.2-31.2-20.6c-17.4-6.3-36.9-5.6-52.8,4.1
                        C21,40.4,11.3,51.4,4.1,63.2C-1.9,73.1-6.4,84-8.6,95.5" />
                        <path class="st2" d="M398.4,80.2c14.8-4.5,29.7-8.8,44.6-13.1c10.3-3,20.8-6.1,31.5-5.2c16.4,1.2,31.7,11.4,44,21.6
                        c9.6,8,19.4,15.8,30.2,21.9c7.8,4.3,16.2,7.8,25,8.5c26.2,2.1,49.9-16,68.7-32c20.6-17.5,40.2-36.3,62.8-51.2
                        c10.2-6.8,21-12.8,32.5-17c13.6-5.1,28.3-7.7,42.8-6.1s28.6,7.4,39,17.6" />
                        <path class="st2" d="M411.9,76.2c-41.7,12.7-108.3,31.5-164.4,31.7c-30.7,0.1-63.1-5.6-89.2-22.6c-13.7-8.9-25.5-20.4-39-29.6
                        c-19.3-13-41.4-26.6-65.7-22.6c-5.2,0.8-10.2,2.4-15,4.6C11.9,49.6-4.2,76.3-12.6,103.1" />
                        <path class="st3"
                        d="M392.1,90.3c12.1-2.9,35.9-10.1,54.4-13.3c8.9-1.5,18.1-1.8,27.1-0.2c8.7,1.6,16.9,5.3,24.5,9.6
                        c0.4,0.2,0.8,0.4,1.2,0.7c13.9,8.1,26.7,18.4,41.7,24.5c21.1,8.4,42.4,5.1,61.8-6.1c19.2-11.1,34.8-27.2,51-42
                        c17.6-16.2,35.6-32.4,56.5-44.2c7.3-4.1,14.9-7.7,22.8-10.5c9.1-3.2,18.7-5.2,28.3-5.7c19.9-0.9,39.1,6,53,20.4" />
                        <path class="st3" d="M404.6,87c-27.3,7.8-55.4,12.6-83.6,15.6c-28.5,2.9-57.6,4.8-86.3,3.4c-13.4-0.7-26.7-2.2-39.7-5.4
                        c-13.2-3.3-25.2-8.9-36.9-15.7c-12.5-7.2-24.6-15.1-37.1-22.4c-21.2-12.4-45-27.1-70.5-23C25.9,43.4,5.7,61-7.2,81.6
                        c-2.4,3.9-4.6,7.9-6.6,12.1c-2.6,5.5-4.7,11.1-6.4,16.9" />
                    </svg>

                </div>
                <?php
                wp_reset_postdata();
                return ob_get_clean();
            }

// SVG Image Animation END


// remove wp version param from any enqueued scripts
            function vc_remove_wp_ver_css_js($src)
            {
                if (strpos($src, 'ver='))
                    $src = remove_query_arg('ver', $src);
                return $src;
            }

// add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
// add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);


// backend style
            add_action('admin_head', 'my_custom_style');
            function my_custom_style()
            {
                echo '
                <style>
                div#wpcontent div#wpbody div#wpbody-content .wrap form#posts-filter table.wp-list-table.widefat.fixed.striped.table-view-list.posts { table-layout: unset; }
                div#wpcontent div#wpbody div#wpbody-content .wrap form#posts-filter table.wp-list-table.widefat.fixed.striped.table-view-list.posts  thead tr th#wpseo-score { float: inherit; }
                </style>';
            }


            function wpb_loggedin_user_role_class($classes)
            {
                if (is_page_template('page-templates/careers.php')) {
                    global $wp_query;
                    if (!empty($wp_query->query['comeet_pos'])) {
                        $classes[] = 'single-job-page';
                    }
                }
                return $classes;
            }

            add_filter('body_class', 'wpb_loggedin_user_role_class');


            add_shortcode('new_svg_code', 'new_svg_generate');

            function new_svg_generate()
            {
                ob_start(); ?>

                <svg version="1.1" id="couple_new" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" viewBox="0 0 805.9 120" style="enable-background:new 0 0 805.9 120; -webkit-transform: scaleX(-1);
                transform: scaleX(-1);" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: none;
                        stroke: #FFCF61;
                        stroke-width: 2;
                        stroke-linecap: round;
                        stroke-miterlimit: 10;
                    }

                    .st1 {
                        fill: none;
                        stroke: #009DB8;
                        stroke-width: 2;
                        stroke-linecap: round;
                        stroke-miterlimit: 10;
                    }

                    .st2 {
                        fill: none;
                        stroke: #F05032;
                        stroke-width: 2;
                        stroke-linecap: round;
                        stroke-miterlimit: 10;
                    }

                    .st3 {
                        fill: none;
                        stroke: #BCBCBC;
                        stroke-width: 2;
                        stroke-linecap: round;
                        stroke-miterlimit: 10;
                    }
                </style>
                <path class="st0"
                d="M412.2,60.2c7.4-2.5,14.5-5.8,21.7-8.7c7.6-3.1,15.2-6.2,22.8-9.3c8-3.2,16.1-6.5,24.6-7.3
                c13.8-1.3,27.7,3.6,38.5,12.2c8.7,7,15.7,15.9,23,24.4c10.2,11.8,21.4,23.1,35.3,30.1c14.9,7.4,33.8,8.3,48.4-0.2
                c15.7-9.1,30.8-19.4,45.3-30.2c11.6-8.6,22.5-18.1,34.5-26.2c23.2-15.5,50.9-29.6,79.3-30.2c14.5-0.3,29.5,3.4,41,12.2" />
                <path class="st0"
                d="M413,59.9c-26.3,11-55.6,22.1-82.7,30.8c-8.7,2.8-17.5,5.5-26.3,8c-19.1,5.5-38.4,10.1-58,12.9
                c-12.5,1.8-25.5,3-38,0.6c-12.4-2.4-24.1-8.5-34.4-15.7c-4.6-3.2-9-6.7-13.3-10.3c-9.7-8.2-17.9-17.8-26.4-27.1
                c-7.1-7.7-14.6-15-22.4-21.9C95.2,22.7,72.7,11.8,50.6,18.5c-22,6.6-39.3,28.6-47.5,49.2c-2.6,6.6-4.4,13.5-5.7,20.4" />
                <path class="st1" d="M407.2,69.5c-0.7,0.4,25.4-9.3,38.2-13.5c15-4.9,30.4-10.3,46.2-6.1c10.2,2.6,19.1,8.8,27,15.8
                c12.2,10.6,23.3,22.5,36.3,32c8.1,5.9,17.2,10.8,27.1,12.3c8.1,1.2,16.4,0.2,24.1-2.3c13.4-4.2,25.4-12.3,36.5-20.6
                c22.4-16.9,42.9-36.2,66.6-51.3c1.9-1.2,3.7-2.4,5.6-3.5c21.4-12.9,46.9-23.6,72.4-20.8c13,1.4,25.5,6.2,35.6,14.4" />
                <path class="st1" d="M407.9,69.2c-27.2,9-54.5,18-82.2,25.3c-23.3,6.2-47,10.8-70.9,13.7c-26.6,3.3-54.3,2.6-78.5-10.2
                c-11.5-6.1-21.6-14.6-31.2-23.3c-9.4-8.5-18.8-16.9-28.4-25.2c-9.6-8.2-19.1-16.2-31.2-20.6c-17.4-6.3-36.9-5.6-52.8,4.1
                C21,40.4,11.3,51.4,4.1,63.2C-1.9,73.1-6.4,84-8.6,95.5" />
                <path class="st2" d="M398.4,80.2c14.8-4.5,29.7-8.8,44.6-13.1c10.3-3,20.8-6.1,31.5-5.2c16.4,1.2,31.7,11.4,44,21.6
                c9.6,8,19.4,15.8,30.2,21.9c7.8,4.3,16.2,7.8,25,8.5c26.2,2.1,49.9-16,68.7-32c20.6-17.5,40.2-36.3,62.8-51.2
                c10.2-6.8,21-12.8,32.5-17c13.6-5.1,28.3-7.7,42.8-6.1s28.6,7.4,39,17.6" />
                <path class="st2" d="M411.9,76.2c-41.7,12.7-108.3,31.5-164.4,31.7c-30.7,0.1-63.1-5.6-89.2-22.6c-13.7-8.9-25.5-20.4-39-29.6
                c-19.3-13-41.4-26.6-65.7-22.6c-5.2,0.8-10.2,2.4-15,4.6C11.9,49.6-4.2,76.3-12.6,103.1" />
                <path class="st3" d="M392.1,90.3c12.1-2.9,35.9-10.1,54.4-13.3c8.9-1.5,18.1-1.8,27.1-0.2c8.7,1.6,16.9,5.3,24.5,9.6
                c0.4,0.2,0.8,0.4,1.2,0.7c13.9,8.1,26.7,18.4,41.7,24.5c21.1,8.4,42.4,5.1,61.8-6.1c19.2-11.1,34.8-27.2,51-42
                c17.6-16.2,35.6-32.4,56.5-44.2c7.3-4.1,14.9-7.7,22.8-10.5c9.1-3.2,18.7-5.2,28.3-5.7c19.9-0.9,39.1,6,53,20.4" />
                <path class="st3" d="M404.6,87c-27.3,7.8-55.4,12.6-83.6,15.6c-28.5,2.9-57.6,4.8-86.3,3.4c-13.4-0.7-26.7-2.2-39.7-5.4
                c-13.2-3.3-25.2-8.9-36.9-15.7c-12.5-7.2-24.6-15.1-37.1-22.4c-21.2-12.4-45-27.1-70.5-23C25.9,43.4,5.7,61-7.2,81.6
                c-2.4,3.9-4.6,7.9-6.6,12.1c-2.6,5.5-4.7,11.1-6.4,16.9" />
            </svg>


            <?php wp_reset_postdata();
            return '' . ob_get_clean();
        }

        add_action('init', 'enable_custom_sitemap');

        function enable_custom_sitemap()
        {
            global $wpseo_sitemaps;
            if (isset($wpseo_sitemaps) && !empty($wpseo_sitemaps)) {
                $wpseo_sitemaps->register_sitemap('TYPE', 'create_TYPE_sitemap');
            }
        }

        add_filter('wpseo_enable_xml_sitemap_transient_caching', '__return_false');


        $sitemap = get_field("upload_sitemap", 'option');
// if(isset($_GET['dev'] ) == 1){
//     $file_new =  file_get_contents($sitemap);
//     var_dump( file_put_contents($_SERVER['DOCUMENT_ROOT'].'/new-sitemap.xml', $file_new));
//     die();
// }
        if (!empty($sitemap)) {
            $file_new = file_get_contents($sitemap);
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/new-sitemap.xml', $file_new);

            add_filter('wpseo_sitemap_index', 'add_sitemap_custom_items');
            function add_sitemap_custom_items($var)
            {
        // make filter magic happen here...
                $invoice_date = date('Y-m-d\TH:i:s');
                $var = '
                <sitemap>
                <loc>' . site_url() . '/new-sitemap.xml</loc>
                <lastmod>' . $invoice_date . '+00:00</lastmod>
                </sitemap>';

        /* Add Additional Sitemap
        * This section can be removed or reused as needed
        */


        /* DO NOT REMOVE ANYTHING BELOW THIS LINE
        * Send the information to Yoast SEO
        */
        return $var;
    }
}

// Register Team Post Type
add_action('init', 'team_post_type');
function team_post_type()
{
    register_post_type(
        'team_members',
        array(
            'labels' => array(
                'name' => __('Team Member'),
                'singular_name' => __('Team Member')
            ),
            'supports' => array(
                'title',
                'editor',
                'thumbnail'
            ),
            'public' => true,
            'publicly_queryable' => false,
            'has_archive' => true,
            'menu_icon' => 'dashicons-groups',
        )
    );
}

add_action('template_redirect', 'redirect_post_type_single');
function redirect_post_type_single()
{
    if (is_singular('resources')) {
        global $post;
        $empty = get_field('empty_resource', get_the_ID());
        $redirect_url = home_url() . '/resources/';
        if ($empty) {
            wp_redirect($redirect_url);
            exit();
        }
    }
}


add_action('init', 'schedule_event_cron');
function schedule_event_cron()
{
    if (!wp_next_scheduled('daily_delete_past_events')) {
        wp_schedule_event(time(), 'daily', 'daily_delete_past_events');
    }
}

add_action('daily_delete_past_events', 'delete_past_events_fn');
function delete_past_events_fn()
{
    // do something every hour
    $args = array(
        'numberposts' => -1,
        'post_type' => 'tribe_events',
        'post_status' => 'any',
        'meta_query' => array(
            array(
                'key' => '_EventStartDate',
                'value' => date('Y-m-d'),
                'compare' => '<',
                'type' => 'DATE',
            )
        )
    );
    $past_events = get_posts($args);
    if (!empty($past_events)) {
        foreach ($past_events as $event) {
            wp_delete_post($event->ID, true);
        }
    }
}


// Add inline CSS in the admin head with the style tag
function my_custom_admin_head() {
    echo '<style>body.wp-admin.post-type-resources .postbox-container #product_typediv , body.wp-admin.post-type-resources .postbox-container #resource_categorydiv{
     display:none !important;
 }</style>';
}
add_action('admin_head', 'my_custom_admin_head');

