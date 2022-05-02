$(document).ready(function () {
  $('.carousel').slick({
    prevArrow:
      '<button class="slick-prev" aria-label="Previous" type="button">&lt;</button>',
    nextArrow:
      '<button class="slick-next" aria-label="Next" type="button">&gt;</button>',

    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4
  });
});
