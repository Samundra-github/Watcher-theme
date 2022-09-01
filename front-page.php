<?php 

global $user_ID;

if (!$user_ID) {

?>

    <?php get_template_part('/template-parts/home', 'page'); ?>

<?php
} else {

    get_header();
?>

<?php get_template_part('/component/header', 'section') ?>


<?php get_template_part('/component/homemovies', 'part') ?>


<?php get_template_part('/component/homemusic', 'part') ?>

<?php get_footer(); ?>
    <?php

}

    ?>

