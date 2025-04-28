/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./src/artworkgalleryb/view.js ***!
  \*************************************/
__webpack_require__.r(__webpack_exports__);
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'masonry-layout'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'infinite-scroll'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());



//-------------------------------------//

let grid = document.querySelector('.grid');
let msnry = new Object(function webpackMissingModule() { var e = new Error("Cannot find module 'masonry-layout'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())(grid, {
  itemSelector: 'none',
  // select none at first
  columnWidth: '.grid__col-sizer',
  gutter: '.grid__gutter-sizer',
  percentPosition: true,
  stagger: 30,
  // nicer reveal transition
  visibleStyle: {
    transform: 'translateY(0)',
    opacity: 1
  },
  hiddenStyle: {
    transform: 'translateY(100px)',
    opacity: 0
  }
});

// initial items reveal
imagesLoaded(grid, function () {
  grid.classList.remove('are-images-unloaded');
  msnry.options.itemSelector = '.grid__item';
  let items = grid.querySelectorAll('.grid__item');
  msnry.appended(items);
});

//-------------------------------------//
// hack CodePen to load pens as pages

var nextPenSlugs = ['202252c2f5f192688dada252913ccf13', 'a308f05af22690139e9a2bc655bfe3ee', '6c9ff23039157ee37b3ab982245eef28'];
function getPenPath() {
  let slug = nextPenSlugs[this.loadCount];
  if (slug) {
    return `/desandro/debug/${slug}`;
  }
}

//-------------------------------------//
// init Infinte Scroll

let infScroll = new Object(function webpackMissingModule() { var e = new Error("Cannot find module 'infinite-scroll'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())(grid, {
  path: getPenPath,
  append: '.grid__item',
  outlayer: msnry,
  status: '.page-load-status'
});
/******/ })()
;
//# sourceMappingURL=view.js.map