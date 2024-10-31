import Glide from '@glidejs/glide';

// var nextButton = document.querySelector('#next');
// var prevButton = document.querySelector('#prev');

const randomStart = Math.floor(Math.random() * 10 + 1);
//random number between 1 and 10.

var glide = new Glide('#homeSlide', {
  type: 'carousel',
  perView: 1,
  focusAt: 'center',
  hoverpause: true,
  startAt: randomStart,
  autoplay: 4 * 1000,
  animationDuration: 5 * 1000,
  animationTimingFunc: 'ease-in-out',
  rewind: true,
  rewindDuration: 5 * 1000,
  breakpoints: {
    1000: {
      perView: 1,
    },
    530: {
      perView: 1,
    },
  },
});

// nextButton.addEventListener('click', function (event) {
//   event.preventDefault();

//   glide.go('>');
// });

// prevButton.addEventListener('click', function (event) {
//   event.preventDefault();

//   glide.go('<');
// });

glide.mount();
