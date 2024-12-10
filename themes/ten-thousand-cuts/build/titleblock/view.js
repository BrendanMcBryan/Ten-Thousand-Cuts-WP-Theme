import * as __WEBPACK_EXTERNAL_MODULE__wordpress_interactivity_8e89b257__ from "@wordpress/interactivity";
/******/ var __webpack_modules__ = ({

/***/ "@wordpress/interactivity":
/*!*******************************************!*\
  !*** external "@wordpress/interactivity" ***!
  \*******************************************/
/***/ ((module) => {

module.exports = __WEBPACK_EXTERNAL_MODULE__wordpress_interactivity_8e89b257__;

/***/ })

/******/ });
/************************************************************************/
/******/ // The module cache
/******/ var __webpack_module_cache__ = {};
/******/ 
/******/ // The require function
/******/ function __webpack_require__(moduleId) {
/******/ 	// Check if module is in cache
/******/ 	var cachedModule = __webpack_module_cache__[moduleId];
/******/ 	if (cachedModule !== undefined) {
/******/ 		return cachedModule.exports;
/******/ 	}
/******/ 	// Create a new module (and put it into the cache)
/******/ 	var module = __webpack_module_cache__[moduleId] = {
/******/ 		// no module.id needed
/******/ 		// no module.loaded needed
/******/ 		exports: {}
/******/ 	};
/******/ 
/******/ 	// Execute the module function
/******/ 	__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 
/******/ 	// Return the exports of the module
/******/ 	return module.exports;
/******/ }
/******/ 
/************************************************************************/
/******/ /* webpack/runtime/make namespace object */
/******/ (() => {
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = (exports) => {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/ })();
/******/ 
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!********************************!*\
  !*** ./src/titleblock/view.js ***!
  \********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/interactivity */ "@wordpress/interactivity");


/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
const menuBurger = document.querySelector('.title_block__menu--burger');
const menu = document.querySelector('.title_block__menu--dropdown');

// menuBurger.addEventListener('click', (event) => {
//   // menu.style.display = 'block';
// });
// menuBurger.addEventListener('mouseout', (event) => {
//   menu.style.display = 'none';
// });

(0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.store)('tenthousandcuts', {
  actions: {
    toggleMenu: () => {
      console.log('toggle the Menu!');
      let sideMenu = document.querySelector('.title_block__menu--dropdown');
      let hamburger = document.querySelector('#menuBurger');
      let closeButton = document.querySelector('#CloseMenu');
      sideMenu.style.transform = 'translate(0%)';
      hamburger.style.opacity = '0';
      document.addEventListener('click', event => {
        const isClickInside = sideMenu.contains(event.target);
        const isClickHamburger = hamburger.contains(event.target);
        const isClickClose = closeButton.contains(event.target);
        if (!isClickInside && !isClickHamburger || isClickClose) {
          sideMenu.style.transform = 'translate(105%)';
          hamburger.style.opacity = '1';
        }
        // if ((!isClickInside && !isClickHamburger) || isClickClose) {
        //   sideMenu.style.transform = 'translate(105%)';
        // }
      });
      document.addEventListener('keydown', event => {
        if (event.keyCode == 27) {
          sideMenu.style.transform = 'translate(105%)';
        }
      });
    }
  }
});
})();


//# sourceMappingURL=view.js.map