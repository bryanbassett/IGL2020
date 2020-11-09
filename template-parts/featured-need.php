<?php
/**
 * Template part for featured need
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 
$posts = get_some_posts('Featured Need');
if(!empty($posts)){foreach($posts as $block){

?>
<section class="text-gray-700 body-font mt-0 mb-10">

<div class="grid grid-flow-row auto-rows-max md:auto-rows-min grid-cols-1 sm:grid-cols-2 igl-image-grid-container">

    <div class=" bg-cover bg-center  order-1 sm:order-none  igl-image-grid" style="background-image:url('<?php echo $block['thumb'] ?>');">
            <div class="igl-image-grid-excerpt">  
                <span class="igl-image-grid-excerpt-text">
                <?php echo $block['subtext'] ?>     
                </span>
            </div>
    </div>
    <div class="p-8 order-2 sm:order-none pl-16 pr-16">
        <div class="mt-8 mb-8">
			<p class="text-4xl font-black  mb-2  fancy-font igl-text-accent">Featured Need!</p>
			<hr class="border-0 bg-gray-500 text-gray-500 h-px  ml-auto mr-auto mb-6 igl-divider-1 igl-divider-alt">
			<p class="text-5xl font-black  mb-2  font-primary igl-text-secondary uppercase"><?php echo $block['title'] ?></p>

            <p class="">
            <?php echo $block['excerpt'] ?>
			</p>
			<div class="text-left">
				<a href="<?php echo $block['speciallink'] ?>" class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button transition duration-300 mt-2 mb-2 inline-block">SPONSOR TODAY!</a>
			<!--	<a href="#" class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button-outline transition duration-300 mt-2 mb-2 inline-block">READ PASTOR STORIES</a> -->
			</div>
        </div>
    </div>




</div>
</section>
<?php }} ?>