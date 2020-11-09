<?php
/**
 * Template Name: Home Page Template
 *
 * Aimed at being used as a static front page
 *
 * @package IGL 2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} ?>


<?php get_header(); ?>
<div class="site-header  site-header--placeholder"></div>
<div class="site-container  site-content ">
	<?php	get_template_part( 'template-parts/hero-home'); ?>
	<?php	get_template_part( 'template-parts/news-bar'); ?>
	<?php	get_template_part( 'template-parts/big-blurb'); ?>
	<?php	get_template_part( 'template-parts/multi-article-duo-grid'); ?>
</div>

<div class="site-footer">

</div>

<?php get_footer(); ?>
