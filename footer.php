<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package igl2020
 * @since igl2020 1.0
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

?>

</div><!-- #page -->

<footer class="text-white body-font">
 
  <div class="igl-background-background">
    <div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col footer-main-contain">
    <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap md:text-left text-center order-first">
      
    <div class="w-full sm:w-1/3 px-4 igl-footer-connect">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/iglwhitelogo.png">
        <nav class="list-none mb-10">
         
          
          <span class="inline-flex justify-left font-primary text-3xl w-full igl-text-accent">CONNECT WITH IGL</span>

      <span class="inline-flex justify-left font-primary text-1xl w-full mt-2">BY MAIL AT:</span>
      <span class="inline-flex justify-left font-primary text-1xl w-full">PO BOX 356, HUDSON, OH 44236</span>
        </nav>
      </div>

      <div class="w-full sm:w-1/3 px-4 footer-signup">
        <div class="container mx-auto  flex flex-wrap flex-col">
			<div class="flex  flex-wrap">
				<p class="text-white  text-2xl font-primary font-bold text-md  mb-2">RECEIVE FIELD & PRAYER UPDATES </p>
      
        <input class="block h-12  w-full  w-40 bg-transparent    border border-gray-400 focus:outline-none focus:border-indigo-500 text-base py-2 px-4 mb-3 text-2xl" placeholder="Name" type="text">
				<input class="block h-12  w-full  w-40 bg-transparent    border border-gray-400 focus:outline-none focus:border-indigo-500 text-base py-2 px-4 mb-3 text-2xl" placeholder="Email" type="text">
				<button class="block h-12   px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-white-button-alt transition duration-300 ">SIGN UP</button>
			</div>
		</div>
      </div>

      <div class="  w-full sm:w-1/3 px-4">
        <span class="igl-footer-blurb">
        <?php echo get_theme_mod( 'footer_text' ); ?>
        </span>
        <div class="grid grid-cols-3 igl-logos">
          <img src="<?php echo get_template_directory_uri()?>/assets/images/starsquare.png" class="">
          <img src="<?php echo get_template_directory_uri()?>/assets/images/bbb.png" class="">
          <img src="<?php echo get_template_directory_uri()?>/assets/images/ecfa.png" class="">
        </div>
      </div>

    </div>
  </div>
      
    </div>
  </div>
</footer>


<?php wp_footer();?>
</body>
</html>
