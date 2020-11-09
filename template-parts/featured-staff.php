<?php
/**
 * Template part for featured need
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}
$enableSam = get_theme_mod( 'sam_stephens_toggle' );
if($enableSam){
    $staff = get_some_posts('Sam Stephens');
    foreach($staff as $block){
?>
<section class="text-gray-700 body-font mt-0 mb-10">

<div class="grid grid-flow-row auto-rows-max md:auto-rows-min grid-cols-1 sm:grid-cols-2 igl-image-grid-container igl-background-secondary">

    <div class="p-8 order-2 sm:order-1 pl-16 pr-16">
        <div class="mt-8 mb-8">
            <p class="text-4xl text-white  mb-2  font-primary  uppercase text-left"><?php echo $block['title'] ?></p>
			<p class="text-1xl font-bold text-white  mb-4 text-left "><?php echo $block['excerpt'] ?></p>


            <p class="text-left text-white">
            <?php echo $block['subtext'] ?> 
            </p>

        </div>
    </div>


    <div class=" bg-cover bg-center  order-1 sm:order-2  m-10" style="background-image:url('<?php echo $block['thumb'] ?>');">

    </div>


</div>
</section>
<?php }} ?>