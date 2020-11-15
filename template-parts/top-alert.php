<?php
/**
 * Hero Image for Home Page
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}
$alert = get_theme_mod( 'top_alert' );
$alertname = get_theme_mod( 'top_alert_name' );
$alertcontact = get_theme_mod( 'top_alert_contact' );
$alertemail = get_theme_mod( 'top_alert_email' );
if(!empty($alert)){
?>
<section class="alert">
	<div class="igl-background-primary ">
		<div class="container mx-auto py-4 px-5 flex flex-wrap flex-col">
			<div class="flex md:flex-no-wrap flex-wrap justify-center ">
                <p class="-m-1 flex signuptext sm:h-1 text-2xl text-center text-md text-white"><span class="font-primary text-2xl"><?php echo $alertname ?>:</span> 
                <?php echo $alert ?> For more info, contact <?php echo $alertcontact ?> at <a  class="bold" href="<?php echo $alertemail ?>"><?php echo $alertemail?></a>
            </p>
			</div>
		</div>
	</div>
  </section>
<?php  } ?>