<?php
/**
 * Hero Image for Home Page
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} ?>
<section class="flex flex-col flex-wrap inline-block m-auto ml-auto mr-auto p-0  text-center <?php  echo $post->post_name; ?> " style=" background-position: center; background-image: url('<?php echo (wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'))[0]; ?>'); background-size: cover">
    <div class="bg-black bg-opacity-50 extrabg h-full m-0 p-0 w-full">
        <div class="mb-auto mt-auto">
            <h1 class="m-auto mb-4 pt-20 pb-20  text-5xl w-11/12  sm:w-6/12  text-white text-shadow sponsorship-text uppercase"><?php the_title() ?></h1>

            <div class="mt-10 bigmargin">
            <h2 class="m-auto mb-4 pt-20 pb-20  text-3xl w-11/12  sm:w-6/12 text-white text-shadow sponsorship-subtext"><?php echo get_post_meta( get_the_id(),'sub-text',true); echo get_post_meta( get_the_id(),'big-tag',true); ?></h2>
            <div class="hero-arrow mb-0 mt-10"></div>
            </div>

        </div>
    </div>
</section>
