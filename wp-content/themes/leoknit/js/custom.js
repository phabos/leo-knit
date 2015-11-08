jQuery( document ).ready(function( $ ) {
  $('#header1').arctext({radius: 250});
  $('#header2').arctext({radius: 250, dir: -1});

  $('.slickslider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true
  });
});
