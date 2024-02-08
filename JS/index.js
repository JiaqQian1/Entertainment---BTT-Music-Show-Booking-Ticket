$(document).ready(() => {
  let navText = ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"];
  let autoplayEnabled = true;


  const owlCarousel = $('#music-carousel').owlCarousel({
    items: 1,                       
    dots: false,                   
    loop: true,                     
    nav: true,                      
    navText: navText,               
    autoplay: true,                
    autoplayTimeout: 3000,           
    autoplayHoverPause: true,
  });

  $(".menu a.btn").on("click", function() {
    const isLoggedIn = sessionStorage.getItem("isLoggedIn");

    if (isLoggedIn && isLoggedIn === "true") {
  
      if (autoplayEnabled) {
        owlCarousel.trigger('stop.owl.autoplay');
        autoplayEnabled = false;
      } else {
  
      }
    }
  });
});
