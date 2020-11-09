<?php
/**
 * Template Name: Story Template
 * 
 *
 * @package IGL 2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 

?>
<?php	get_template_part( 'template-parts/news-bar'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="bg-center entry-header flex flex-col inline-block m-auto ml-auto mr-auto mt-0 text-center" >
		
		<div class="mb-auto mt-auto">
			<h1 class="m-auto  pt-4 pb-4  text-6xl w-11/12  sm:w-6/12  igl-text-secondary  font-primary uppercase"><?php the_title() ?></h1>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content m-auto sm:w-7/12 w-11/12">
		
		
		<?php the_content(); ?>
		

	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
<?php	get_template_part( 'template-parts/featured-fund'); ?>

