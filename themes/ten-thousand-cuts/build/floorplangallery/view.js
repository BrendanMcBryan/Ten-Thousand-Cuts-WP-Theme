var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./src/floorplangallery/view.js ***!
  \**************************************/
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

const filterGallery = () => {
  const filterButtons = document.querySelectorAll('.filter-button');
  const galleryItems = document.querySelectorAll('.floorplan');
  filterButtons.forEach(button => {
    button.addEventListener('click', () => {
      clearActiveFilterStyle();
      button.classList.add('active');
      const filterValue = button.dataset.filter;
      galleryItems.forEach(item => {
        if (filterValue === 'all' || item.dataset.filtertype === filterValue) {
          item.style.opacity = '1';
          setTimeout(() => {
            item.style.display = 'block';
          }, 500);
        } else {
          item.style.opacity = '0';
          setTimeout(() => {
            item.style.display = 'none';
          }, 500);
        }
      });
    });
  });
};
const clearActiveFilterStyle = () => {
  const filterButtons = document.querySelectorAll('.filter-button');
  filterButtons.forEach(button => {
    button.classList.remove('active');
  });
};
filterGallery();

//# sourceMappingURL=view.js.map