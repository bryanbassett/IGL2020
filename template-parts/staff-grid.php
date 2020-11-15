<?php
/**
 * Template part for displaying multi article duo grid
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 
$staff = get_some_posts('Staff');
?>
<section class="text-gray-700 body-font mb-20 mt-10 w-11/12 sm:w-9/12 ml-auto mr-auto">


 
  <div class="auto-rows-max gap-10 grid grid-cols-1  lg:grid-cols-3 mb-3 md:auto-rows-min mt-0 sm:grid-cols-2 sm:mb-4 xl:grid-cols-4">
     <?php foreach($staff as $block){ ?> 
    <div class="order-1  igl-staff-box igl-border-secondary text-center cursor-pointer" data-email="<?php echo $block['email'] ?>">
        <div class="igl-grid-thumb w-full h-56 bg-cover bg-center igl-grid-thumb-alt " style="background-image:url('<?php echo $block['thumb'] ?>');"></div>
        <p class="font-primary igl-text-secondary text-3xl uppercase  text-center flex justify-center uppercase"><?php echo $block['title'] ?></p>
        <p class="text-black  text-1xl p-2 pl-0 text-italic text-center bold"><?php echo $block['excerpt'] ?></p>
        <a class=" secondary-link igl-text-secondary text-1xl p-2 pl-0 small text-center underline break-all"><?php echo $block['email'] ?></a>
    </div>
     <?php } ?> 
    
  </div>

  <hr class="border-0 bg-gray-500 text-gray-500 h-px  ml-auto mr-auto mb-6 igl-divider-1 igl-divider-alt igl-divider-background mt-20 w-10/12">
  
  
  



</section>