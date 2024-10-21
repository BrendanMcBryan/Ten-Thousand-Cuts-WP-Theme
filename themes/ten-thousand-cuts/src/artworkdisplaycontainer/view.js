/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

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
  startAt: 1,
  autoplay: 1,
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

// nextButton.addEventListener('click', function (event) {
//   event.preventDefault();

//   glide.go('>');
// });

// prevButton.addEventListener('click', function (event) {
//   event.preventDefault();

//   glide.go('<');
// });

// glide.mount();

// let slideIndex = 1;
// showSlides(slideIndex);

// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   let i;
//   let slides = document.getElementsByClassName("mySlides");
//   let dots = document.getElementsByClassName("dot");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
// }

var elem = document.querySelector('.carousel');
var flkty = new Flickity(elem, {
  // options
  imagesLoaded: true,
  percentPosition: true,
  freeScroll: true,
  wrapAround: true,
  autoPlay: 16 * 1000,
  pauseAutoPlayOnHover: false,
  prevNextButtons: false,
  pageDots: false,
  // fade: true,
  // adaptiveHeight: true,
  freeScroll: true,
  freeScrollFriction: 0.03,
  selectedAttraction: 0.01,
  friction: 0.1,
});
