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
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 6000,
    speed: 800,
    slidesToShow: 1,
    adaptiveHeight: false,
    showArrows:true,
    responsive:true
  });
  var stHeight = $('.tripslider-1 .slick-track').height();
  $('.tripslider-1 .slick-slide').css('height',stHeight + 'px' );
  var stHeight = $('.tripslider-2 .slick-track').height();
  $('.tripslider-2 .slick-slide').css('height',stHeight + 'px' );
  
  $('.hpslider').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 6000,
    speed: 800,
    slidesToShow: 1,
    adaptiveHeight: false,
    showArrows:false,
    responsive:true
  });

  let hamburger = document.getElementById('hamburgerbtn');
  let mobileMenu = document.getElementById('mobileMenu');
  hamburger.addEventListener('click', function(){
      mobileMenu.classList.toggle('active');
  });


  $('*').on('click tap touch ',function(e){
    $('.dropper').removeClass('active');
  });

  $('.dropper').on('click tap touch hover',function(e){
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

  $('.igl-staff-box').on('click tap touch',function(e){
    let email = 'mailto:'+$(this).data('email');
      setTimeout($.proxy(function() {
        var popup = window.open(email)
        setTimeout($.proxy(function() {
          this.close();
        }, popup), 100);
      }, this), 100)
  });
