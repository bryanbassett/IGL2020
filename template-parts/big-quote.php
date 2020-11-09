<?php
/**
 * Template part for news bar
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 
$sponsorquote = get_theme_mod( 'sponshorships_quote' );
$sponsorattr = get_theme_mod( 'sponshorships_quote_attribution' );
if(!empty($sponsorquote)){
?>

<section>
	<div class="container mx-auto flex px-5  items-center justify-center flex-col pt-20  mt-0">
		
		<div class="text-center  w-full">
		
			<h2 class="fancy-font igl-text-accent sm:text-5xl text-4xl text-left tracking-tight">"<?php echo $sponsorquote ?>"</h2>
			<p class="mb-8 leading-relaxed w-7/12 ml-auto font-primary text-4xl uppercase text-right mt-1  igl-text-accent ">- <?php echo $sponsorattr ?></p>
		</div>
	</div>
</section>
<?php } ?>