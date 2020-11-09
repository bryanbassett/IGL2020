<?php
/**
 * Template part for displaying multi article duo grid
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}
$posts = get_some_posts('Sponsorship');
if(!empty($posts)){
?>
<section class="text-gray-700 body-font mb-10">


  <?php $z=1;$x=1; foreach($posts as  $block){ ?>
  <div class="grid grid-flow-row auto-rows-max md:auto-rows-min grid-cols-1 sm:grid-cols-2 igl-image-grid-container mt-0 mb-0">
    <div class="p-8 order-2 sm:order-<?php $x==1 ? print(1)  : print(2);?> pl-16 pr-16">
      <div class="mt-8 mb-8">

      <div class="igl-grid-thumb w-full h-56 bg-cover bg-center" style="background-image:url('<?php echo $block['thumb']; ?>');"></div>
      <h3 class="text-5xl font-black uppercase  mb-2"><?php echo $block['title']; ?></h3>
      <p class="">
      <?php echo $block['excerpt']; ?> 
      </p>
      <a href=" <?php echo $block['speciallink']; ?> " class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button transition duration-300 mt-2 mb-2 inline-block">SPONSOR TODAY!</a>
      <!-- <a href="#" class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button-outline transition duration-300 mt-2 mb-2 inline-block">READ THE KIDS' STORIES</a> -->
      </div>
    </div>
    <div class=" bg-cover bg-center order-1 sm:order-<?php $x==1 ? print(2) : print(1);  $x==1 ? $x=2 : $x=1;?> igl-image-grid hidden sm:block" style="background-image:url('<?php echo wp_get_attachment_image_url(get_theme_mod( 'spons'.$z ));$z++; ?>');">
      <div class="igl-image-grid-excerpt igl-image-grid-excerpt-pers">  
        <span class="igl-image-grid-excerpt-text ">
        <?php echo $block['subtext']; ?>     
        </span>
      </div>
    </div>
  </div>
  <?php  } ?>






</section>
<?php  } ?>