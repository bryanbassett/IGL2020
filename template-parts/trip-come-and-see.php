<?php
/**
 * Template part for displaying multi article duo grid
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 
$myposts = get_some_posts('Mission Opportunities');
?>
<section class="trip-come ">
<div class=" text-center">
    <hr class="bg-gray-500 border-0 h-px igl-divider-1 mb-6 ml-auto mr-auto text-gray-500 w-3/12">
    <p class="font-primary igl-text-secondary text-2xl cas-huge uppercase">COME & SEE</p>
    <p class=" fancy-font igl-text-accent text-5xl">God Working in South Asia</p>
</div>
<div class="missiongrid grid grid-cols-1 md:grid-cols-3 sm:gap-16 sm:grid-cols-2 sm:m-16">
    <?php if(!empty($myposts)){foreach($myposts as $key => $mop){ ?>
    <div class="come">
        <p class="font-primary igl-text-secondary text-2xl">Mission Opportunity #<?php echo $key+1; ?></p>
        <hr class="border-0 bg-gray-500 text-gray-500 h-px  ml-auto mr-auto mb-6 igl-divider-1 igl-divider-alt">
        <p class="font-primary igl-text-secondary uppercase text-4xl"><?php echo $mop['title']; ?></p>
        <p class=""><?php echo $mop['excerpt']; ?></p> 
    </div>

    <?php }} ?>
</div>
    <div class="flex igl-big-button justify-center mb-16 mt-10 text-2xl w-full text-center">
     <a href="#" class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button transition duration-300 mt-2 mb-2 inline-block uppercase text-center">learn more about traveling to india</a>
    </div>
</section>