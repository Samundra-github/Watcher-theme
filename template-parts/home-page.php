<?php
/*
Template Name: Home Page
Template Post Type: page
*/
?>

<?php get_template_part('/component/visitor', 'header'); ?>


<?php get_template_part('/component/header', 'section') ?>


<?php get_template_part('/component/homemovies', 'part') ?>


<?php get_template_part('/component/homemusic', 'part') ?>

<?php get_footer(); ?>