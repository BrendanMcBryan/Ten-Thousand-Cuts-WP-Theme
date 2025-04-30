// const scrollableDiv = document.getElementById('artgrid');
// let scrollDirection = 1; // 1 for down, -1 for up
// let scrollInterval;
// let isHovered = false;

// function autoScroll() {
//   if (!isHovered) {
//     scrollableDiv.scrollTop += scrollDirection;

//     // Reverse direction if reaching top or bottom
//     if (
//       scrollableDiv.scrollTop + scrollableDiv.clientHeight >=
//         scrollableDiv.scrollHeight ||
//       scrollableDiv.scrollTop <= 0
//     ) {
//       scrollDirection *= -1;
//     }
//   }
// }

// // Start autoscrolling
// scrollInterval = setInterval(autoScroll, 300);

// // Pause on hover
// scrollableDiv.addEventListener('mouseover', () => {
//   isHovered = true;
// });

// // Resume on mouse leave
// scrollableDiv.addEventListener('mouseout', () => {
//   isHovered = false;
// });



// const element = document.getElementById('artgrid');

// element.animate([
//   { opacity: 0, transform: 'translateY(-50px)' }, // Keyframe 1: Initial state
//   { element.scrollTop = element.scrollHeight}    // Keyframe 2: Final state
// ], {
//   duration: 1000, // Animation duration in milliseconds
//   easing: 'ease-in-out', // Easing function
//   iterations: 1 // Number of times to repeat the animation
// });

// function scrollToBottom(element, duration) {
//   let start = element.scrollTop;
//   let end = element.scrollHeight - element.clientHeight;
//   let startTime = null;

//   function animate(currentTime) {
//     startTime = startTime || currentTime;
//     let progress = (currentTime - startTime) / duration;

//     if (progress >= 1) {
//       progress = 1;
//     }

//     element.scrollTop = start + (end - start) * progress;

//     if (progress < 1) {
//       requestAnimationFrame(animate);
//     }
//   }
//   requestAnimationFrame(animate);
// }

// const myDiv = document.getElementById('artgrid');
// scrollToBottom(myDiv, 500); // Scrolls over 500ms

const scrollableDiv = document.getElementById('artgrid');
const content = document.getElementById('artgrid__strip');
const scrollDuration = 15000; // Time in milliseconds for one scroll cycle (down and up)

function smoothScroll(targetPosition, duration) {
  const startPosition = scrollableDiv.scrollTop;
  const startTime = performance.now();

  function animation(currentTime) {
    const elapsedTime = currentTime - startTime;
    const progress = Math.min(elapsedTime / duration, 1); // Ensure progress doesn't exceed 1

    scrollableDiv.scrollTop = startPosition + (targetPosition - startPosition) * progress;

    if (elapsedTime < duration) {
      requestAnimationFrame(animation);
    }
  }
  requestAnimationFrame(animation);
}

function startScrollLoop() {
  smoothScroll(content.clientHeight - scrollableDiv.clientHeight, scrollDuration / 2);

  setTimeout(() => {
    smoothScroll(0, scrollDuration / 2);

    setTimeout(startScrollLoop, scrollDuration / 2); // Restart the loop after scrolling back to the top
  }, scrollDuration / 2);
}

startScrollLoop();