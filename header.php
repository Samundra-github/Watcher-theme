<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/fontawesome/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <!-- Navigation Menu -->

    <nav class="watcher-navbar">
        <div class="container">
            <div class="watcher-desktop-nav">
                <div class="d-flex justify-content-between align-items-center">
                    <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    } else {
                        echo "Watcher";
                    }
                    ?>
    
                    <?php wp_nav_menu(array('theme location' => 'headerMenu')); ?>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="watcher-mobile-nav">
            <div class="container">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="sidenav">
                        <ul class="container">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'headerMenu'
                            ));
                            ?>
                        </ul>
                    </div>

                    <div class="mobile-navbar">
                        <?php
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        } else {
                            echo "Thrive LDN";
                        }
                        ?>

                        <div class="openNav">
                            <i class="fa fa-xmark"></i>
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>

    <!-- JQuery -->
    <script>
        $(document).ready(function() {
            $(".openNav").click(function() {
                $(".sidenav").toggleClass("active_nav");
                $(".openNav").toggleClass("active_nav");
            });
        });
    </script>