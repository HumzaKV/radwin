<?php
global $assets;
$container = get_theme_mod('understrap_container_type');

if (!show_distributor_info()) {
    ?>
    <input type="text" id="check_ip" value=0 hidden>
    <?php
} else { ?>
    <input type="text" id="check_ip" value=1 hidden>
<?php }


?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="<?php echo site_url(); ?>/favicon.ico"/>
    <!--[if lte IE 8]>
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
    <![endif]-->
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js?v=<?= time(); ?>">

    </script>
    <?php wp_head(); ?>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5CD82R');
    </script>
    <!-- End Google Tag Manager -->

    <style type="text/css">
        <?php  echo (!show_distributor_info()) ? '.ip-connect{ display:none !important;}' : '.ip-connect{ inline-block !important;}'; ?>
        .admin-bar #wrapper-navbar nav {
            top: 32px;
        }

        .language.down_icon,
        nav.new_area .mobile-nav a.login {
            z-index: 999;
        }

        /*Mega Menu Css*/
        #mega-menu-wrap-megamenu #mega-menu-megamenu {
            padding: 0px 0px 0px 15px;
        }

        #mega-menu-wrap-megamenu {
            margin-left: 0;
            margin-right: auto;
            background: transparent;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu > li.mega-menu-item > a.mega-menu-link {
            color: #555;
            font-weight: 500;
            height: auto;
            padding-top: 5px;
            padding-bottom: 6px;
            font-size: 16px;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-row {
            padding: 40px 50px 40px;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu ul.mega-sub-menu ul.mega-sub-menu li {
            padding-left: 10px;
            position: relative;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu ul.mega-sub-menu ul.mega-sub-menu li:before {
            content: "\f105";
            position: absolute;
            left: -2px;
            display: block;
            font: 16px fontawesome;
            color: #36a0b3;
            top: 5px;
            margin: auto;
            width: 10px;
            height: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #mega-menu-wrap-megamenu ul.mega-sub-menu li.widget_text img {
            width: 200px;
            height: auto;
            margin: 0 auto;
            display: block;
        }

        #mega-menu-wrap-megamenu ul.mega-sub-menu li.widget_text h2 {
            color: #555;
            font-size: 15px;
            text-align: center;
            margin: 30px 0 0;
        }

        #mega-menu-wrap-megamenu ul.mega-sub-menu li.widget_text h2 a {
            color: #f05032;
            font-weight: 400;
            position: relative;
            padding-right: 25px;
            border: solid 1px;
            padding: 8px 20px 8px;
            border-radius: 0px;
            display: block;
            max-width: fit-content;
            margin: 0 auto;
        }

        /*#mega-menu-wrap-megamenu ul.mega-sub-menu li.widget_text h2 a:after { content: "\f178"; font: 16px fontawesome; position: absolute; right: 0; top: 0; bottom: 0; margin: auto; width: 16px; height: 15px; }*/
        #mega-menu-wrap-megamenu ul.mega-sub-menu li.widget_text h2 a:hover {
            color: #555555;
            text-decoration: none;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu > li.mega-menu-item > a.mega-menu-link:hover,
        #mega-menu-wrap-megamenu #mega-menu-megamenu > li.mega-menu-item.mega-toggle-on > a.mega-menu-link {
            background: transparent;
            color: #f05032;
            font-weight: 500;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu ul.mega-sub-menu ul.mega-sub-menu li ul.mega-sub-menu li:before {
            color: #ffce61;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item {
            border-bottom: 0px solid #333;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link {
            line-height: 1.7;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-row > ul.mega-sub-menu > li.simple_menu > ul.mega-sub-menu > li > a.mega-menu-link {
            font-weight: 400;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-row > ul.mega-sub-menu > li.simple_menu > ul.mega-sub-menu > li {
            padding-bottom: 0;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-row > ul.mega-sub-menu li.title-none > ul.mega-sub-menu li.mega-menu-item > a.mega-menu-link > span {
            visibility: hidden;
        }

        #mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-item > ul.mega-sub-menu li.mega-menu-row > ul.mega-sub-menu > li.mega-menu-column > ul.mega-sub-menu li.mega-menu-item > ul.mega-sub-menu > li.bold-title > a.mega-menu-link {
            font-weight: bold !important;
        }

        /* Changes */
        #mega-menu-wrap-megamenu ul#mega-menu-megamenu > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-row > ul.mega-sub-menu > li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link {
            pointer-events: none !important;
            font-weight: bold;
        }

        #mega-menu-wrap-megamenu ul#mega-menu-megamenu > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-row > ul.mega-sub-menu > li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link {
            position: relative;
            padding-left: 10px;
        }

        #mega-menu-wrap-megamenu ul#mega-menu-megamenu > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-row > ul.mega-sub-menu > li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link:before {
            position: absolute;
            content: "\f105";
            font: 16px fontawesome;
            color: #f05032;
            width: 10px;
            height: 12px;
            top: 5px;
            margin: auto;
            left: 0;
            display: inline-flex;
            align-items: center;
        }

        @media only screen and (max-width: 1366px) {
            /*#mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-row > ul.mega-sub-menu > li.mega-menu-columns-3-of-12.simple_menu { margin-right: 14px; }
            #mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-row > ul.mega-sub-menu > li.mega-menu-columns-3-of-12.simple_menu:last-child { margin-right: 0; }*/

        }


        @media screen and (max-width: 1366px) and (min-width: 1025px) {

            body nav.navbar .mobile-nav .fixing {
                width: max-content;
                float: right;
            }

            body nav.navbar .mobile-nav {
                width: 80%;
                padding: 0 0 0 20px;
            }

            body nav.navbar .mobile-nav a.language.down_icon {
                width: auto;
                font-size: 16px;
            }

            body nav.navbar .mobile-nav #mobilenav {
                width: 80%;
                float: left;
            }

        }

        @media screen and (max-width: 1024px) and (min-width: 768px) {
            body nav.navbar .mobile-nav {
                padding: 0 0 0 20px;
            }

            body nav.navbar .mobile-nav a.language.down_icon {
                width: auto;
                display: inline-block;
                font-size: 16px;
            }

            body nav.navbar .mobile-nav a.login {
                display: inline-block;
                margin: 0;
            }

            body nav.navbar .mobile-nav div#mobilenav {
                display: inline-block;
                vertical-align: middle;
            }

            /* body nav.navbar .mobile-nav {display: flex !important;align-items: center;} */
            #mega-menu-wrap-megamenu #mega-menu-megamenu > li.mega-menu-item > a.mega-menu-link {
                padding-top: 0px;
                padding-bottom: 0px;
                border-bottom: solid 1px #bfb5b5;
            }
        }

        @media only screen and (max-width: 767px) {
            html {
                overflow-x: hidden;
            }

            .mobile-nav {
                padding: 0 20px 0 0;
            }

            nav.new_area div#mobilenav {
                display: block;
            }

            .navbar.navbar-dark.fixed-top.site-navigation.new_area {
                position: static;
            }

            .mega-menu-toggle .mega-toggle-blocks-left,
            .mega-menu-toggle .mega-toggle-blocks-center {
                width: 0;
                height: 0;
                visibility: hidden;
                position: absolute;
            }

            nav.new_area .mobile-nav a.login {
                margin-right: 50px;
            }

            #mega-menu-wrap-megamenu .mega-menu-toggle {
                margin-top: -51px;
            }

            #mega-menu-wrap-megamenu .mega-menu-toggle {
                line-height: 51px;
                height: 51px;
            }

            #mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-row {
                padding: 0px 10px 0px;
            }

            #mega-menu-wrap-megamenu #mega-menu-megamenu > li.mega-menu-item > a.mega-menu-link {
                padding-top: 0px;
                padding-bottom: 0px;
                border-bottom: solid 1px #bfb5b5;
            }

            #mega-menu-wrap-megamenu #mega-menu-megamenu > li.mega-menu-item:last-child a.mega-menu-link {
                border-bottom: transparent;
            }

            #mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-row .mega-menu-column > ul.mega-sub-menu > li.mega-menu-item .textwidget {
                padding-top: 25px;
                margin-top: 0px;
                border-top: solid 1px #555555;
            }

            #mega-menu-wrap-megamenu .mega-menu-toggle .mega-toggle-blocks-right .mega-toggle-block {
                margin-right: 5px;
            }

            nav.new_area .mobile-nav {
                padding: 0 0px 0 0;
            }

            #mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-row > ul.mega-sub-menu > li.mega-menu-column {
                margin-bottom: 20px;
            }

            #mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-row > ul.mega-sub-menu > li.mega-menu-column:last-child {
                margin-bottom: 0;
            }

            #mega-menu-wrap-megamenu #mega-menu-megamenu li.mega-menu-item.mega-menu-megamenu ul.mega-sub-menu li.mega-2-columns > ul.mega-sub-menu > li.mega-menu-item {
                width: 100%;
            }

            body nav.navbar .mobile-nav a.language.down_icon {
                font-size: 16px;
            }
        }

    </style>
    <script>

    </script>

</head>
<?php
$in_notification_bar = get_field('insert_notification_bar', 'option');
//$show_note_bar  = get_field('show_notification_bar', 'option');
$array_ids = array();
foreach ($in_notification_bar as $key => $n_bar) {
    $temp = $n_bar['show_notification_bar'];
    $array_ids = array_merge($array_ids, $temp);
}
$custom_class = '';
if (in_array(get_the_ID(), array_column($array_ids, 'ID'))) {
    $custom_class = 'notification_active';
}
$currentIP = geoip_detect_get_info_from_current_ip();
$custom_class .= ' header-' . $currentIP->country_code;
?>
<body <?php body_class($custom_class); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5CD82R"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
foreach ($in_notification_bar as $key => $n_bar) {
    $notification_color = $n_bar['notification_bg_color'];
    $notification_text = $n_bar['notification_content_text'];
    $notification_link = $n_bar['notification_link'];
    $show_notebar = $n_bar['show_notification_bar'];
    if (in_array(get_the_ID(), array_column($show_notebar, 'ID'))) {
        ?>
        <div class="notification-bar-wrap" style="background-color:<?php echo $notification_color ?>;">
            <div class="container">
                <div class="notification_wrap">
                    <div class="notification-text">
                        <?php echo $notification_text; ?>
                    </div>
                    <div class="notification-link">
                        <?php
                        if ($notification_link) {
                            $link_url = $notification_link['url'];
                            $link_title = $notification_link['title'];
                            $link_target = $notification_link['target'] ? $notification_link['target'] : '_self';
                            printf('<a href="%s" class="btn-style" target="%s">%s</a>', $link_url, $link_target, $link_title);
                        }

                        ?>  </div>
                </div>
            </div>
            <a href="javascript:void(0);" class="close-note">+</a>
        </div>
    <?php }
}
?>
<div class="hfeed site" id="page">

    <div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

        <a class="skip-link screen-reader-text sr-only"
           href="#content"><?php _e('Skip to content', 'understrap'); ?></a>
            <nav class="navbar navbar-dark fixed-top site-navigation new_area" itemscope="itemscope"
                 itemtype="http://schema.org/SiteNavigationElement">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 pull-left hidden-xl-up ">
                            <div class="mobile-nav hidden-lg-up">
                                <div class="fixing" style="display: inline-block;">
                                    <?php if (get_global_option('show_switcher') == true) { ?>
                                        <a href="#" class="language down_icon">
                                            <?php echo ICL_LANGUAGE_CODE; ?>
                                        </a>
                                        <?php
                                        $languages = icl_get_languages('skip_missing=1');
                                        if (count($languages) > 0) {
                                            echo '<ul class="list" style="display: none;">';
                                            foreach ($languages as $l) {
                                                echo "<li><a href='" . $l['url'] . "'>" . $l['translated_name'] . "</a></li>";
                                            }
                                            echo '</ul>';
                                        }
                                    } ?>
                                    <a href="https://radwinportal.amp.vg/" target="_blank" class="login">
                                        <img class="icon inactive" src="<?php echo $assets; ?>login-icon.svg" alt="logo">
                                        <span>Login</span>
                                    </a>
                                </div>
                                <!--                             <a id="mobmenu" href="#mobilemenu"><img src="<?php echo $assets; ?>mobile-nav.svg"></a> -->
                                <div id="mobilenav">
                                    <?php wp_nav_menu(
                                        array(
                                            'theme_location' => 'megamenu',
                                            'container_class' => 'sitemainmenu',
                                            'menu_class' => 'nav navbar-nav',
                                            'fallback_cb' => '',
                                            'menu_id' => 'mobilemenu',
                                            'walker' => new wp_bootstrap_navwalker_mobile(),
                                        )
                                    ); ?>
                                </div>
                            </div>

                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"
                               title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"
                               style="width: 153px; height: 51px;">
                                <img src="<?php echo $assets; ?>logo.svg" alt="logo">
                            </a>
                        </div>

                    </div>

                    <div class="navbar-header text-center">
                        <?php if (!has_custom_logo()) { ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"
                               title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                <img src="<?php echo $assets; ?>logo.svg" alt="logo">
                            </a>
                        <?php } else {
                            the_custom_logo();
                        } ?>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'megamenu',
                                'container_class' => 'mega_menu',
                                'menu_class' => 'nav mega-nav',
                                'fallback_cb' => '',
                                'menu_id' => 'megamenu',
                                'walker' => new wp_bootstrap_navwalker(),
                            )
                        );
                        ?>

                        <div class="navbar-toggleable-md exCollapsingNavbar top-extra-navbar">
                            <ul class="nav navbar-nav">
                                <li class="search">
                                    <a href="#">
                                        <img class="icon-closed" src="<?php echo $assets; ?>search-icon.svg" alt="Search Icon">
                                        <img class="icon-open" src="<?php echo $assets; ?>search-icon-open.svg" alt="Search Icon">
                                    </a>
                                    <?php echo get_search_form(); ?>
                                </li>
                                <?php if (get_global_option('show_switcher') == true) { ?>
                                    <li class="language">
                                        <?php if (get_global_option('show_switcher') == true) { ?>
                                            <a href="#" class="language down_icon">
                                                <?php echo ICL_LANGUAGE_CODE; ?>
                                            </a>
                                            <?php
                                            $languages = icl_get_languages('skip_missing=0');
                                            if (count($languages) > 0) {
                                                echo '<ul class="list" style="display: none;">';
                                                foreach ($languages as $l) {
                                                    echo "<li><a href='" . $l['url'] . "'>" . $l['translated_name'] . "</a></li>";
                                                }
                                                echo '</ul>';
                                            }
                                        } ?>
                                    </li>
                                <?php } ?>
                                <li class="login">
                                    <a href="https://radwinportal.amp.vg/" target="_blank">
                                        <img class="icon inactive" src="<?php echo $assets; ?>login-icon.svg" alt="Login Icon">
                                        <span>Login</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- .container -->
            </nav><!-- .site-navigation -->

    </div><!-- .wrapper-navbar end -->
