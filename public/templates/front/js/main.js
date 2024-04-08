['.popular-posts-carousel', '.images-carousel'].forEach(selector => {
  new Flickity(document.querySelector(selector), {
    cellAlign: 'left',
    contain: true,
    wrapAround: true,
    percentPosition: selector === '.images-carousel'
  });
});

