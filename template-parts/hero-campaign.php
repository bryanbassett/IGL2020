<?php
/**
 * Hero Image for Home Page
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 
global $post;
$post_slug = $post->post_name;
$camphero = get_some_posts('Campaign Hero Blurb',false,0,$post->post_name);
$camphero = $camphero[0];
?>
<section class="flex flex-col flex-wrap inline-block m-auto ml-auto mr-auto p-0 bg-cover bg-center  w-full h-full text-center relative campaignhero" style="background-image:url('<?php echo get_the_post_thumbnail_url( ); ?>')">

    <div class="grid grid-cols-1 lg:grid-cols-2 campgrid">
        <div class="bg-opacity-75 bg-white camp-left lg:flex lg:min-h-screen lg:pb-auto lg:pt-auto md:h-full md:pt-32 p-1 text-center">
            <div class="h-full">
                <div class="flex flex-col h-full mb-auto mt-auto">
                    <div class="campsidetext lg:mb-10 lg:mt-10 lg:text-5xl m-auto md:pb-auto md:pt-auto md:text-6xl pt-16 sm:pt-0 sm:text-4xl text-4xl text-5xl text-white uppercase w-11/12">  <?php echo str_replace('<p></p>','',preg_replace(array('<p>','</p>',),array('',''),$camphero['excerpt'],1)); ?></div>

                    <div class="lg:mb-0 mb-3 md:pb-40 space-x-2">
                    <a href="<?php echo $camphero['speciallink']; ?>" class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button transition duration-300 mt-2 mb-2 inline-block uppercase"><?php echo $camphero['subtext']; ?></a>
                    </div>

                    </div>
                </div>
                
            </div>
        <div class="camp-right hidden lg:block">
        </div>
    </div>
 
   
</section>
