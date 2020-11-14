<?php
/**
 * Template part for news bar
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} ?>
<section class="newsbar">
	<div class="igl-background-secondary font-primary">
		<div class="container mx-auto py-4 px-5 flex flex-wrap flex-col">
			<div class="flex md:flex-no-wrap flex-wrap justify-center ">
				<p class="text-white  text-2xl font-primary font-bold text-md  mr-2 text-center sm:h-1 mb-1">SIGN UP TO SERVE WITH FIELD & PRAYER UPDATES: </p>
				<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true" tabindex="49"]'); ?>
			</div>
		</div>
	</div>
  </section>