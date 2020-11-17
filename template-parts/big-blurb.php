<?php
/**
 * Template part for news bar
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} ?>
<section>
	<div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col pt-20 igl-blurb-container">
		
		<div class="text-center lg:w-2/3 w-full">
		<p class="text-center"><hr class="border-0 bg-gray-500 text-gray-500 h-px w-6/12 ml-auto mr-auto mb-6 igl-divider-1"></p>
			<h2 class="title-font text-5xl sm:text-6xl mb-4  text-gray-900 igl-text-secondary uppercase">  <?php echo get_theme_mod( 'homepage_middle_header' ); ?></h1>
			<p class="mb-8 leading-relaxed w-7/12 text-center ml-auto mr-auto">  <?php echo get_theme_mod( 'homepage_middle_blurb' ); ?></p>
		</div>
	</div>
</section>
