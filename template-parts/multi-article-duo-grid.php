<?php
/**
 * Template part for displaying multi article duo grid
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}
$blocks = get_some_posts('Homepage Block');
$startvar = 1;
 ?>
<section class="text-gray-700 body-font">
<?php foreach($blocks as $key => $block){
    ?>
    <div class="grid grid-flow-row auto-rows-max md:auto-rows-min grid-cols-1 sm:grid-cols-2 igl-image-grid-container m-0 p-0">
    <?php

  ?>
  
  <div class=" bg-cover bg-center  order-1 sm:order-<?php echo $startvar ?>  igl-image-grid" style="background-image:url('<?php echo $block['thumb'] ?>');">
        <div class="igl-image-grid-excerpt">  
        <span class="igl-image-grid-excerpt-text">
        <?php echo $block['subtext'] ?>     
        </span>
        </div>
        </div>
        <?php if($startvar == 1){$startvar=2;}else{$startvar=1;}; ?>
        <div class="p-8 order-2 sm:order-<?php echo $startvar ?> pl-16 pr-16">
        <div class="mt-8 mb-8">
        <h3 class="text-4xl font-black uppercase mb-2"><?php echo $block['title'] ?> </h3>
        <p class="">
        <?php echo $block['excerpt'] ?> 
        </p>
        <?php $classforbutton= 'igl-red-button'; if($startvar==1){$classforbutton='igl-red-button-outline';} ?>
        <a href="<?php echo get_theme_mod( 'homepage_left_button_link' ); ?>" class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button <?php echo $classforbutton; ?> transition duration-300 mt-2 mb-2 inline-block">GIVE NOW</a>
        </div>
    </div>
<?php 
 
    echo '</div>';

  
}?>


</section>