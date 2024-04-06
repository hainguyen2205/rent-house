var elem = document.querySelector('.popular-posts-carousel');
var elem2 = document.querySelector('.images-carousel');
var flkty = new Flickity( elem, {
  cellAlign: 'left',
  contain: true,
  wrapAround: true

});
var flkty2 = new Flickity( elem2, {
  // imagesLoaded: true,
  percentPosition: true,
  contain: true,
  wrapAround: true
});
var flkty2 = new Flickity( '.images-carousel', {
});
var flkty = new Flickity( '.popular-posts-carousel', {
});