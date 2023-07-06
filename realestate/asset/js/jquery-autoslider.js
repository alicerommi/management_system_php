$(document).ready(function(){

  $(".Modern-Slider").slick({
    autoplay:true,
    autoplaySpeed:16000,
    speed:1200,
    slidesToShow:1,
    slidesToScroll:1,
    pauseOnHover:false,
    dots:true,
    pauseOnDotsHover:true,
    cssEase:'linear',
   // fade:true,
    draggable:false,
    prevArrow:'<button class="PrevArrow"></button>',
    nextArrow:'<button class="NextArrow"></button>',
  });

})
