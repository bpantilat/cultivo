// Brand Logo Carousel
var swiper = new Swiper('#brand_logo-carousel', {
	slidesPerView: 5,
  spaceBetween: 30,
  centeredSlides: true,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: false,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
   breakpoints: {
    1024: {
      slidesPerView: 5,
      spaceBetween: 40,
    },
    900: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    }
  }
});


// Hamburger Animation Menu
$(document).ready(function(){
  $(".hamburger").click(function(){
    $(this).toggleClass("is-active");
  });
});


// Append Blog Function
 function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}
async function ActivtiyBlog() {
  $('.loading').show();
  await sleep(2000);
  $('.blog-info').append('<div class="blog-inline-content"><div class="col-md-8"><div class="left-content"><small class="sm-title">Considerations of Context</small><h2 class="lg-title">I realy think this could go viral it needs to be the same.</h2><h5 class="cal">October 30</h5></div></div><div class="col-md-4"><div class="right-image"><img src="assets/images/projects/img-02.jpg" alt="Blog 01" class="img-fluid blog-image"></div></div></div>');
  $('.loading').hide();
}