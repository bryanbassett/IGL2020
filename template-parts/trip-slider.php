<?php
/**
 * Template part for displaying multi article duo grid
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 
$myposts = get_posts( array(
    'posts_per_page' => 3,
    'category'       => 3,
    'paged' => 2
) );

?>
<section class="trip-sliders block relative <?php echo $slideid ?>">
<div class="">
<div class="tripslider-<?php echo $slideid ?>  ">
    <div class="slide <?php echo $slideid ?> 1  bg-black gap-5 grid pb-10 italic pl-5 pr-5 pt-10 slide sm:pl-40 sm:pr-40 text-2xl text-white">
        <p class="quote">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p> 
        <p class="quotee p-5 pr-0 flex justify-end">Teacher Training Trips</p>
    </div>
    <div class="slide <?php echo $slideid ?> 2  bg-black gap-5 grid pb-10 italic pl-5 pr-5 pt-10 slide sm:pl-40 sm:pr-40 text-2xl text-white">
        <p class="quote">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p> 
        <p class="quotee  p-5 pr-0 flex justify-end">Teacher Training Trips</p>
    </div>
    <div class="slide <?php echo $slideid ?> 3 1 bg-black gap-5 grid pb-10 italic pl-5 pr-5 pt-10 slide sm:pl-40 sm:pr-40 text-2xl text-white">
        <p class="quote">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p> 
        <p class="quotee p-5 pr-0 flex justify-end">Teacher Training Trips</p>
    </div>

</div>
</div>
</section>