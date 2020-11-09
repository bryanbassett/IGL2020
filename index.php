<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package igl2020
 * @since igl2020 1.0
 */
$post_categories = wp_get_post_categories( get_the_ID() );
global $cats;
$cats = array();
     
foreach($post_categories as $c){
    $cat = get_category( $c );
    $cats[] = $cat->name;
}


get_header(); ?>
<div class="site-header  site-header--placeholder"></div>
<div class="site-container  site-content ">

<?php 


if(in_array('Story',$cats)){
	get_template_part(  'page-templates/story');
}else if(in_array('General Content',$cats)){
	get_template_part(  'page-templates/general-content');
}else if(in_array('General Campaign',$cats)){
	get_template_part(  'page-templates/general-campaign');
}else{
	get_template_part(  'page-templates/'.$post->post_name);
}
?>  
</div>

<div class="site-footer">

</div>

<?php get_footer(); ?>
