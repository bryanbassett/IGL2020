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
        <div class="bg-white bg-opacity-75 camp-left p-0 lg:p-20 text-center">
            <div class="h-full">
                <div class="flex flex-col h-full mb-auto mt-auto">
                    <div class="campsidetext m-auto mb-10 mt-10 lg:m-auto text-5xl text-white uppercase w-11/12">  <?php echo str_replace('<p></p>','',preg_replace(array('<p>','</p>',),array('',''),$camphero['excerpt'],1)); ?></div>

                    <div class="space-x-2 mb-3 lg:mb-0">
                    <a href="<?php echo $camphero['speciallink']; ?>" class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button transition duration-300 mt-2 mb-2 inline-block uppercase"><?php echo $camphero['subtext']; ?></a>
                    </div>

                    </div>
                </div>
                
            </div>
        <div class="camp-right">
        </div>
    </div>
 
   
</section>
