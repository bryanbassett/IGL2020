<?php
/**
 * Hero Image for Home Page
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 
$hpsimgs = get_homepage_slider_images();
?>
<section class="flex flex-col flex-wrap inline-block m-auto ml-auto mr-auto p-0 sm:p-32   w-full h-full text-center relative homepagehero" >
    <div class="hpslider  w-full h-full  ">
    <?php foreach($hpsimgs as $hpimg){
      ?>  
        <div style="background-image:url('<?php echo $hpimg; ?>')" class="indhpslide"></div>
        
    <?php } ?>
    </div>
    <div class=" text-center ">

        <div class="mb-auto mt-auto">
            <h1 class="m-auto mb-4 pt-20 pb-20  text-5xl w-11/12  sm:w-6/12 sm:text-6xl text-white text-shadow uppercase">  <?php echo get_theme_mod( 'homepage_slogan' ); ?></h1>

            <div class="space-x-2 mb-3 sm:mb-0">
            <a href="<?php echo get_theme_mod( 'homepage_left_button_link' ); ?>" class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button transition duration-300 mt-2 mb-2 inline-block uppercase"><?php echo get_theme_mod( 'homepage_left_button' ); ?></a>
            <a href="<?php echo get_theme_mod( 'homepage_right_button_link' ); ?>" class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-white-button-outline transition duration-300 mt-2 mb-2 inline-block uppercase"><?php echo get_theme_mod( 'homepage_right_button' ); ?></a>
            </div>

        </div>
    </div>
</section>
