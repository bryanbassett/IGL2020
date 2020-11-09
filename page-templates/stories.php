<?php
/**
 * Template Name: Stories Template
 * 
 *
 * @package IGL 2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} ?>
<?php	get_template_part( 'template-parts/news-bar'); ?>
<?php	get_template_part( 'template-parts/simple-title'); ?>

<?php	$storyType = $_GET['sub']; if($storyType=='' || $storyType==null){get_template_part( 'template-parts/hero-alt-small');} ?>


<?php	get_template_part( 'template-parts/multi-article-story-grid'); ?>
<?php	get_template_part( 'template-parts/featured-fund'); ?>

