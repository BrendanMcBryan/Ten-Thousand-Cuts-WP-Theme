import Masonry from 'masonry-layout';

var elem = document.querySelector('.artgrid__strip');
var msnry = new Masonry(elem, {
  // options
  itemSelector: '.artgrid__art',

  columnWidth: '.grid-sizer',
  gutter: '.gutter-sizer',
  percentPosition: true,

  // gutter:10,
});
