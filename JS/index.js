$(document).ready(() => {
  
  let navText = ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"];

  $('#music-carousel').owlCarousel({
      items: 1,                       
      dots: false,                   
      loop: true,                     
      nav: true,                      
      navText: navText,               
      autoplay: true,                
      autoplayTimeout: 3000,           
      autoplayHoverPause: true,       
  });
});
