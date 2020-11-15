<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package igl2020
 * @since igl2020 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head();  ?>
<!-- <?php 
$cats = '';
$pid = get_the_id();
$post_categories = get_the_category($pid);
foreach($post_categories as $c){
  $cats = $c->slug.' ';
}


 ?> fff -->
</head>

<body class="min-h-screen w-full <?php echo $cats; ?>">
  <?php wp_body_open(); ?>
  <div id="page">
      <header class="navbar navbar-default navbar-fixed-top">
        <nav class="md:flex md:justify-between">
          <div class="flex ">
              
              <?php   the_custom_logo( ); ?>

              <p id="hamburgerbtn" class="md:hidden ml-auto ">
                <svg class="menuicon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                  <title>Toggle Menu</title>
                  <g>
                  <line class="menuicon__bar" x1="13" y1="16.5" x2="37" y2="16.5"/>
                  <line class="menuicon__bar" x1="13" y1="24.5" x2="37" y2="24.5"/>
                  <line class="menuicon__bar" x1="13" y1="24.5" x2="37" y2="24.5"/>
                  <line class="menuicon__bar" x1="13" y1="32.5" x2="37" y2="32.5"/>
                  
                  </g>
                </svg>
              </p>
          </div>
          <div class="flex-row md:flex md:mr-4">
            <ul class="hidden md:flex-none md:block md:col-span-3 md:ml-auto" id="mobileMenu">
              <?php  wp_nav_menu_no_ul(); ?>
            </ul>
            <a style="      text-align: center;  margin: .2em;
      margin-right: 0;
      width: 80%;" href="<?php echo get_theme_mod( 'homepage_left_button_link' ); ?>" class="duration-300 hover:shadow-xl igl-button igl-red-button md:col-span-2 px-8 rounded-lg shadow-md transition uppercase"><?php echo get_theme_mod( 'homepage_left_button' ); ?></a>
          </div>
        </nav>
        
      </header>
