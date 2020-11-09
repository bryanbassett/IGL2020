<?php
/**
 * Hero Image for Home Page
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} ?>
<section class="flex flex-col  inline-block m-auto ml-auto mr-auto p-10 sm:pt-10  text-center mt-0  herosmallbg igl-background-background" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-size: cover; background-position:center;">
    <div class="mb-auto mt-auto">
        <h1 class="m-auto  pt-4 pb-4  text-6xl w-11/12  sm:w-6/12  text-white text-shadow font-primary uppercase"><?php the_title() ?></h1>
    </div>
</section>
