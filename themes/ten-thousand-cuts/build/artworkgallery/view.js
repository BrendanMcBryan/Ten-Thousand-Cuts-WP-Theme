/******/ (() => { // webpackBootstrap
/*!************************************!*\
  !*** ./src/artworkgallery/view.js ***!
  \************************************/
const scrollableDiv = document.getElementById('artgrid');
let scrollDirection = 1; // 1 for down, -1 for up
let scrollInterval;
let isHovered = false;
function autoScroll() {
  if (!isHovered) {
    scrollableDiv.scrollTop += scrollDirection;

    // Reverse direction if reaching top or bottom
    if (scrollableDiv.scrollTop + scrollableDiv.clientHeight >= scrollableDiv.scrollHeight || scrollableDiv.scrollTop <= 0) {
      scrollDirection *= -1;
    }
  }
}

// Start autoscrolling
scrollInterval = setInterval(autoScroll, 30);

// Pause on hover
scrollableDiv.addEventListener('mouseover', () => {
  isHovered = true;
});

// Resume on mouse leave
scrollableDiv.addEventListener('mouseout', () => {
  isHovered = false;
});
/******/ })()
;
//# sourceMappingURL=view.js.map