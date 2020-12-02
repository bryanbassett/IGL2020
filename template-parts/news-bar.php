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
		<div class="mx-auto py-4 px-5 flex flex-wrap flex-col">
			<div class="flex  flex-wrap justify-center ">
				<p class="flex font-bold font-primary h-full mb-auto mt-auto signuptext text-2xl text-center text-md text-white">SIGN UP FOR FIELD & PRAYER UPDATES: </p>
				<?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true" tabindex="1"]'); ?>
			</div>
		</div>
	</div>
  </section>