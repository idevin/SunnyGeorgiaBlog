require('slick-carousel/slick/slick.min')
require('slick-carousel/slick/slick.css')
require('slick-carousel/slick/slick-theme.css')

$('.featured-carousel').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  dots: true,
  focusOnSelect: true,
  touchMove: true,
  arrows: true,

  nextArrow: `<button class="slick-next">
                  <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2 2L10 10L2 18" stroke="#A0AEBF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </button>`,

  prevArrow: `<button class="slick-prev">
                <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 2L2 10L10 18" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>`,

  responsive: [
    {
      breakpoint: 640,
      settings: {
        slidesToShow: 1,
        centerMode: true,
        centerPadding: '50px',
        dots: false,
        arrows: false
      }
    }
  ]
})
