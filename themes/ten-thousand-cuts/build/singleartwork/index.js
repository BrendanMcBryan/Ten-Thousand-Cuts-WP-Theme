/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/singleartwork/edit.js":
/*!***********************************!*\
  !*** ./src/singleartwork/edit.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./editor.scss */ "./src/singleartwork/editor.scss");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__);
/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */


/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */

function Edit() {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("p", {
    ...(0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps)(),
    children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Singleartwork – hello from the editor!', 'singleartwork')
  });
}

/***/ }),

/***/ "./src/singleartwork/editor.scss":
/*!***************************************!*\
  !*** ./src/singleartwork/editor.scss ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/singleartwork/style.scss":
/*!**************************************!*\
  !*** ./src/singleartwork/style.scss ***!
  \**************************************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/mini-css-extract-plugin/dist/loader.js):\nHookWebpackError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nSassError: Undefined mixin.\n   ╷\n40 │ ┌     @include atSmall {\n41 │ │       max-width: 100%;\n42 │ └     }\n   ╵\n  src/singleartwork/style.scss 40:5  root stylesheet\n    at tryRunOrWebpackError (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/HookWebpackError.js:86:9)\n    at __webpack_require_module__ (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5276:12)\n    at __webpack_require__ (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5233:18)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5305:20\n    at symbolIterator (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3485:9)\n    at done (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3527:9)\n    at Hook.eval [as callAsync] (eval at create (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:15:1)\n    at Hook.CALL_ASYNC_DELEGATE [as _callAsync] (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/tapable/lib/Hook.js:18:14)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5211:43\n    at symbolIterator (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3482:9)\n    at timesSync (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:2297:7)\n    at Object.eachLimit (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3463:5)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5173:16\n    at symbolIterator (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3485:9)\n    at timesSync (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:2297:7)\n    at Object.eachLimit (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3463:5)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5141:15\n    at symbolIterator (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3485:9)\n    at done (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3527:9)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5087:8\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:3518:6\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/HookWebpackError.js:67:2\n    at Hook.eval [as callAsync] (eval at create (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:15:1)\n    at Cache.store (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Cache.js:111:20)\n    at ItemCacheFacade.store (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/CacheFacade.js:141:15)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:3517:11\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Cache.js:97:5\n    at Hook.eval [as callAsync] (eval at create (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:16:1)\n    at Cache.get (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Cache.js:79:18)\n    at ItemCacheFacade.get (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/CacheFacade.js:115:15)\n    at Compilation._codeGenerationModule (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:3485:9)\n    at codeGen (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5075:11)\n    at symbolIterator (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3482:9)\n    at timesSync (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:2297:7)\n    at Object.eachLimit (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3463:5)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5105:14\n    at processQueue (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/util/processAsyncTree.js:61:4)\n    at process.processTicksAndRejections (node:internal/process/task_queues:85:11)\n-- inner error --\nError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nSassError: Undefined mixin.\n   ╷\n40 │ ┌     @include atSmall {\n41 │ │       max-width: 100%;\n42 │ └     }\n   ╵\n  src/singleartwork/style.scss 40:5  root stylesheet\n    at Object.<anonymous> (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/css-loader/dist/cjs.js??ruleSet[1].rules[4].use[1]!/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/postcss-loader/dist/cjs.js??ruleSet[1].rules[4].use[2]!/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/sass-loader/dist/cjs.js??ruleSet[1].rules[4].use[3]!/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/src/singleartwork/style.scss:1:7)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/javascript/JavascriptModulesPlugin.js:453:10\n    at Hook.eval [as call] (eval at create (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/tapable/lib/HookCodeFactory.js:19:10), <anonymous>:7:1)\n    at Hook.CALL_DELEGATE [as _call] (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/tapable/lib/Hook.js:14:14)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5278:39\n    at tryRunOrWebpackError (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/HookWebpackError.js:81:7)\n    at __webpack_require_module__ (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5276:12)\n    at __webpack_require__ (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5233:18)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5305:20\n    at symbolIterator (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3485:9)\n    at done (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3527:9)\n    at Hook.eval [as callAsync] (eval at create (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:15:1)\n    at Hook.CALL_ASYNC_DELEGATE [as _callAsync] (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/tapable/lib/Hook.js:18:14)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5211:43\n    at symbolIterator (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3482:9)\n    at timesSync (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:2297:7)\n    at Object.eachLimit (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3463:5)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5173:16\n    at symbolIterator (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3485:9)\n    at timesSync (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:2297:7)\n    at Object.eachLimit (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3463:5)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5141:15\n    at symbolIterator (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3485:9)\n    at done (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3527:9)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5087:8\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:3518:6\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/HookWebpackError.js:67:2\n    at Hook.eval [as callAsync] (eval at create (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:15:1)\n    at Cache.store (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Cache.js:111:20)\n    at ItemCacheFacade.store (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/CacheFacade.js:141:15)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:3517:11\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Cache.js:97:5\n    at Hook.eval [as callAsync] (eval at create (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:16:1)\n    at Cache.get (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Cache.js:79:18)\n    at ItemCacheFacade.get (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/CacheFacade.js:115:15)\n    at Compilation._codeGenerationModule (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:3485:9)\n    at codeGen (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5075:11)\n    at symbolIterator (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3482:9)\n    at timesSync (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:2297:7)\n    at Object.eachLimit (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/neo-async/async.js:3463:5)\n    at /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/Compilation.js:5105:14\n    at processQueue (/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/webpack/lib/util/processAsyncTree.js:61:4)\n    at process.processTicksAndRejections (node:internal/process/task_queues:85:11)\n\nGenerated code for /Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/css-loader/dist/cjs.js??ruleSet[1].rules[4].use[1]!/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/postcss-loader/dist/cjs.js??ruleSet[1].rules[4].use[2]!/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/node_modules/sass-loader/dist/cjs.js??ruleSet[1].rules[4].use[3]!/Users/brendanmcbryan/Local Sites/ten-thousand-cuts/app/public/wp-content/themes/ten-thousand-cuts/src/singleartwork/style.scss\n1 | throw new Error(\"Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\\nSassError: Undefined mixin.\\n   ╷\\n40 │ ┌     @include atSmall {\\n41 │ │       max-width: 100%;\\n42 │ └     }\\n   ╵\\n  src/singleartwork/style.scss 40:5  root stylesheet\");");

/***/ }),

/***/ "react/jsx-runtime":
/*!**********************************!*\
  !*** external "ReactJSXRuntime" ***!
  \**********************************/
/***/ ((module) => {

"use strict";
module.exports = window["ReactJSXRuntime"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./src/singleartwork/block.json":
/*!**************************************!*\
  !*** ./src/singleartwork/block.json ***!
  \**************************************/
/***/ ((module) => {

"use strict";
module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"tenthousandcuts/singleartwork","version":"0.1.0","title":"Single Artwork","category":"theme","icon":"align-left","description":"Block For displaying Artowrk information. Used on Single Artwork Page.","example":{},"supports":{"html":false},"textdomain":"singleartwork","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css","render":"file:./render.php","viewScript":"file:./view.js"}');

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
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
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!************************************!*\
  !*** ./src/singleartwork/index.js ***!
  \************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/singleartwork/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./src/singleartwork/edit.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./block.json */ "./src/singleartwork/block.json");
/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * Internal dependencies
 */



/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_3__.name, {
  /**
   * @see ./edit.js
   */
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"]
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map