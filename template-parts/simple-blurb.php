<?php
/**
 * blurb on team page
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} ?>
<section class="flex flex-col inline-block m-auto ml-auto mr-auto p-0 sm:pt-10  text-center">
    
    <div class="m-10 ml-auto mr-auto mt-0 simple-blurb sm:w-7/12 text-left w-11/12">  
        <?php
        the_content();
        ?> 
    </div>
 

</section>
