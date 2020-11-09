<?php
/**
 * Hero Image for Home Page
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 
$fpost = latest_sticky('Story');


?>

<section class="featured-story flex flex-col  inline-block m-auto ml-auto mr-auto p-10 sm:pt-10  text-center mt-0  " style="background-image: url('<?php echo $fpost['thumb']; ?>'); background-size: cover; background-position:center">
   <a href="<?php echo $fpost['link']; ?>">
        <div class="mb-auto mt-auto">
            <p class="m-auto  text-2xl w-11/12  sm:w-6/12 text-white italic">Featured Story</p>
            <p class="m-auto  pt-4 pb-4  text-6xl w-11/12  sm:w-6/12  text-white text-shadow font-primary uppercase"><?php echo $fpost['title']; ?></p>
            <p class="m-auto   text-2xl w-11/12  sm:w-6/12 text-white italic"><?php echo $fpost['date']; ?></p>
            <p class="m-auto mb-4 pt-4 pb-4  text-1xl w-11/12  sm:w-6/12 text-white text-shadow "><?php echo $fpost['excerpt']; ?>... <span class="text-bold text-italic">read more</span></p>
        </div>
    </a>
</section>
