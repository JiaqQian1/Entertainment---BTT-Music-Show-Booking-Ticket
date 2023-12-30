$(document).ready(() => {
  let navText = ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"];
  let autoplayEnabled = true;

  // 初始化 Owl Carousel
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

  // 添加点击事件处理程序，以在用户点击 "Log Out" 时停止轮播
  $(".menu a.btn").on("click", function() {
    // 获取登录状态
    const isLoggedIn = sessionStorage.getItem("isLoggedIn");

    // 检查用户是否已登录
    if (isLoggedIn && isLoggedIn === "true") {
      // 如果用户已登录，停止轮播
      if (autoplayEnabled) {
        owlCarousel.trigger('stop.owl.autoplay');
        autoplayEnabled = false;
      } else {
        // 如果用户点击 "Log Out" 但轮播已经停止，可以在此处执行其他操作
      }
    }
  });
});
