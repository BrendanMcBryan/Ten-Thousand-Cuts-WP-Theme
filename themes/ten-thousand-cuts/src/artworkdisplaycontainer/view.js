import Glide from '@glidejs/glide';

var nextButton = document.querySelector('#next');
var prevButton = document.querySelector('#prev');

const randomStart = Math.floor(Math.random() * 10 + 1);
//random number between 1 and 10.

var glide = new Glide('#homeSlide', {
  type: 'carousel',
  perView: 1,
  focusAt: 'center',
  hoverpause: true,
  startAt: randomStart,
  autoplay: 2 * 1000,
  animationDuration: 10 * 1000,
  animationTimingFunc: 'ease-in-out',
  rewind: true,
  rewindDuration: 10 * 1000,
  breakpoints: {
    800: {
      perView: 2,
    },
    480: {
      perView: 1,
    },
  },
});

nextButton.addEventListener('click', function (event) {
  event.preventDefault();

  glide.go('>');
});

prevButton.addEventListener('click', function (event) {
  event.preventDefault();

  glide.go('<');
});

glide.mount();

// var elem = document.querySelector('.carousel');
// var flkty = new Flickity(elem, {
//   // options
//   imagesLoaded: true,
//   percentPosition: true,
//   freeScroll: true,
//   wrapAround: true,
//   autoPlay: 16 * 1000,
//   pauseAutoPlayOnHover: false,
//   prevNextButtons: false,
//   pageDots: false,
//   // fade: true,
//   // adaptiveHeight: true,
//   freeScroll: true,
//   freeScrollFriction: 0.03,
//   selectedAttraction: 0.01,
//   friction: 0.1,
// });
