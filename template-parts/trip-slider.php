<?php
/**
 * Trip slider
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 
$myposts = get_some_posts('Trip Quotes');

?>
<section class="trip-sliders block relative <?php echo $slideid ?>">
<div class="">
<div class="tripslider-<?php echo $slideid ?>  ">
<?php foreach($myposts as $key => $blurb){ 
    if($slideid==1 ){
        if($key ==1 || $key == 3 || $key == 5){
            continue;
        }
    }
    if($slideid==2 ){
        if($key ==0 || $key == 2 || $key == 4){
            continue;
        }
    }
    ?>
    <div class="slide <?php echo $slideid ?> 1  bg-black gap-5 grid pb-10 italic pl-5 pr-5 pt-10 slide sm:pl-40 sm:pr-40 text-2xl text-white">
        <p class="quote"><?php echo trim($blurb['excerpt']); ?></p> 
        <p class="quotee p-5 pr-0 flex justify-end"><?php echo trim($blurb['subtext']); ?></p>
    </div>
<?php } ?>

</div>
</div>
</section>