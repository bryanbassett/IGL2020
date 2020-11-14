<?php
/**
 * Template Name: Stories Template
 * 
 *
 * @package IGL 2020
 */
$slideid = 1;
if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} ?>
<?php	get_template_part( 'template-parts/news-bar'); ?>
<?php	get_template_part( 'template-parts/hero-alt'); ?>
<?php	get_template_part( 'template-parts/trip-blurbs'); ?>

<?php include( locate_template( 'template-parts/trip-slider.php', false, false) ); ?>
<?php $slideid=2;	get_template_part( 'template-parts/trip-come-and-see'); ?>
<?php  include( locate_template( 'template-parts/trip-slider.php', false, false) ); ?>
<section id="trip-more-info">
	<div class="container">
	<?php the_content() ?> 
	</div>

</section>
<!-- trip form -->
<?php	get_template_part( 'template-parts/featured-fund'); ?>

