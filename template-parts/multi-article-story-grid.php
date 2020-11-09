<?php
/**
 * Template part for displaying multi article duo grid
 *
 * @package igl2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 
$stories = get_some_posts('Story');
//$paged = get_query_var( 'paged', 1 );
$storyType = '';
$storyType = $_GET['sub'];
$pagedVar = $_GET['paged'];
if($pagedVar == '' || $pagedVar == null){
  $pagedVar = 1;
}

if($storyType != '' || $storyType != null){
  $stories = get_some_posts($storyType,true,$paged);
}else{
  $stories = get_some_posts('Story',true,$paged);
}
$max = $stories[0]['maxpage'];

?>
<section id="storygrid" class="text-gray-700 body-font mb-20 mt-10 w-11/12 sm:w-9/12 ml-auto mr-auto storygrid">


  <?php 
  $numItems = count($stories);
  $i = 0;

  foreach($stories as $key => $story){

    if($key==0){
      echo '  <div class="grid grid-flow-row auto-rows-max md:auto-rows-min grid-cols-1 sm:grid-cols-2 md:grid-cols-3 igl-image-grid-container mt-0 mb-3 sm:mb-4">';
    }
    if($key==3){
      echo '  <div class="grid grid-flow-row auto-rows-max md:auto-rows-min grid-cols-1 sm:grid-cols-2 md:grid-cols-3 igl-image-grid-container mt-0 mb-3 sm:mb-4">';
    }
    $colorClass = '';
    if($key == 0 || $key==3){
      $colorClass = 'secondary'; 
    }
    if($key == 1 || $key==4){
      $colorClass = 'primary'; 
    }
    if($key == 2 || $key==5){
      $colorClass = 'accent'; 
    }
    ?>
    <div class="flex flex-col justify-between m-0 order-1 sm:m-2 order-1  m-0 sm:m-2">
        <a href="<?php echo $story['link'] ?>">
          <div class="igl-grid-thumb w-full h-56 bg-cover bg-center igl-grid-thumb-alt" style="background-image:url('<?php echo $story['thumb'] ?>');"></div>
          <p class="font-primary igl-text-<?php echo $colorClass ?> text-4xl uppercase mt-2"><?php echo $story['title'] ?></p>
          <p class="text-black  text-1xl p-2 pl-0 text-italic"><?php echo $story['date'] ?></p>
          <p class="text-black text-1xl p-2 pl-0"><?php echo $story['excerpt'] ?>...</p>
          <a href="<?php echo $story['link'] ?>" class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-<?php echo $colorClass ?>-button-outline transition duration-300 mt-4  inline-block w-full text-center mb-3 sm:m-0">READ MORE</a> 
        </a>
    </div>

<?php
    $i++;
  
    if($key==2 || $i === $numItems){
      echo '</div>';
    }
   
  } 
  ?>

 
  <?php 
      $pagecounter = ceil($max / 6);
     
  if($pagecounter!=$pagedVar){?>
  <div class="readmorezone w-full flex">
    <?php 

    ?>

  <div onclick="getAnotherPageOfStories(<?php echo $pagedVar+1 ?>,'<?php echo $storyType; ?>')"  class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button transition duration-300 mt-10  inline-block ml-auto mr-auto text-center">READ MORE</div> 
  </div>
  <?php }else if($pagedVar>1 && $pagecounter!=$pagedVar) {
  ?>
    <div onclick="getAnotherPageOfStories(<?php echo $pagedVar-1 ?>,'<?php echo $storyType; ?>')"  class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button transition duration-300 mt-10  inline-block ml-auto mr-auto text-center">PREVIOUS</div> 
    <div onclick="getAnotherPageOfStories(<?php echo $pagedVar+1 ?>,'<?php echo $storyType; ?>')"  class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button transition duration-300 mt-10  inline-block ml-auto mr-auto text-center">READ MORE</div> 

  <?php
  }else if($pagedVar>1){
    ?>
        <div onclick="getAnotherPageOfStories(<?php echo $pagedVar-1 ?>,'<?php echo $storyType; ?>')"  class="py-1 px-8 rounded-lg shadow-md hover:shadow-xl igl-button igl-red-button transition duration-300 mt-10  inline-block ml-auto mr-auto text-center">PREVIOUS</div> 

    <?php
  } ?>
  

<script>
  $ = jQuery;
  function getAnotherPageOfStories(page,sub){
      let href = '/stories?paged='+page+'&sub='+sub;
      $.ajax({
        url:href,
        type:'GET',
        success: function(data){
            $('#storygrid').html($(data).find('#storygrid').html());
            
  
        }
     });
     setTimeout(function(){
      //$("html, body").animate({ scrollTop: 0 }, "slow");
      $('html, body').animate({
    scrollTop: $("#storygrid").offset().top
}, 2000);
     },1);
    }
  
  
</script>

</section>