<?php
/**
 * Template part for displaying multi article duo grid
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 
$myposts = get_some_posts('Trip Blurbs');
?>
<section class="trip-blurbs">
<div class="grid grid-cols-1 sm:grid-cols-2">
    <ul class="blurb-titles">
    <?php
    foreach($myposts as $key => $blurb){
        ?>
        <li class="blurb-title font-primary text-3xl uppercase <?php if($key==0){ echo 'active';} ?>" data-blurb="<?php echo $key ?>"> > 
        <?php
        echo trim($blurb['title']);

        ?>
        </li>
        <?php
    }
    ?>
    </ul>

    <ul class="blurb-content">
    <?php
    foreach($myposts as $key => $blurb){
        ?>

        <li class="blurb-content <?php if($key!=0){ echo 'hidden';} ?>" data-blurb-key="<?php echo $key ?>">
        <?php

        echo trim($blurb['excerpt']);
        ?>
        </li>
        <?php
    }
    ?>
    </ul>
</div>
    <div class="flex igl-big-button justify-center mb-16 mt-10 text-2xl w-full text-center">
     <a href="#" class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button transition duration-300 mt-2 mb-2 inline-block uppercase text-center">learn more about traveling to india</a>
    </div>
</section>