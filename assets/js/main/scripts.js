let $ = jQuery;


  $('.tripslider-1').slick({
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 6000,
    speed: 800,
    slidesToShow: 1,
    adaptiveHeight: true,
    showArrows:true,
    responsive:true
  });

  $('.tripslider-2').slick({
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 6000,
    speed: 800,
    slidesToShow: 1,
    adaptiveHeight: true,
    showArrows:true,
    responsive:true
  });
  
  $('.hpslider').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 6000,
    speed: 800,
    slidesToShow: 1,
    adaptiveHeight: true,
    showArrows:false,
    responsive:true
  });

  let hamburger = document.getElementById('hamburgerbtn');
  let mobileMenu = document.getElementById('mobileMenu');
  hamburger.addEventListener('click', function(){
      mobileMenu.classList.toggle('active');
  });


  $('*').on('click tap touch',function(e){
    $('.dropper').removeClass('active');
  });

  $('.dropper').on('click tap touch',function(e){
    let x = this;
    let link = e.target.pathname;
  
    setTimeout(function(){
      $(x).addClass('active');
    },1)
    if(link==undefined || link=='/'){
      e.preventDefault();
      return false;
    }
  });

  $('.blurb-title').on('click tap touch',function(e){
    let blurbID = $(this).data('blurb');
    let thisBlurb = $(this);
    $( "li.blurb-title[data-blurb!="+blurbID+"]" ).removeClass('active');
    $( "li.blurb-title[data-blurb="+blurbID+"]" ).addClass('active');
    $( "li.blurb-content[data-blurb-key!="+blurbID+"]" ).addClass('hidden');
    $( "li.blurb-content[data-blurb-key="+blurbID+"]" ).removeClass('hidden');

  });
