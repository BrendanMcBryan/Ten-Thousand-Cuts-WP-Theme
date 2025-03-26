import { store } from '@wordpress/interactivity';

/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
const menuBurger = document.querySelector('.title_block__menu--burger');
const menu = document.querySelector('.title_block__menu--dropdown');

// menuBurger.addEventListener('click', (event) => {
//   // menu.style.display = 'block';
// });
// menuBurger.addEventListener('mouseout', (event) => {
//   menu.style.display = 'none';
// });

function openPopup() {
  document.getElementById('myPopup').style.display = 'flex';
}

function closePopup() {
  document.getElementById('myPopup').style.display = 'none';
}

// Close the popup if the user clicks outside of it
window.addEventListener('click', function (event) {
  if (event.target == document.getElementById('myPopup')) {
    closePopup();
  }
});

// store('tenthousandcuts', {
//   actions: {
//     toggleMenu: () => {
//       console.log('toggle the Menu!');
//       let sideMenu = document.querySelector('.title_block__menu--dropdown');
//       let hamburger = document.querySelector('#menuBurger');
//       let closeButton = document.querySelector('#CloseMenu');

//       sideMenu.style.transform = 'translate(0%)';
//       hamburger.style.opacity = '0';

//       document.addEventListener('click', (event) => {
//         const isClickInside = sideMenu.contains(event.target);
//         const isClickHamburger = hamburger.contains(event.target);
//         const isClickClose = closeButton.contains(event.target);
//         if ((!isClickInside && !isClickHamburger) || isClickClose) {
//           sideMenu.style.transform = 'translate(105%)';
//           hamburger.style.opacity = '1';
//         }
//         // if ((!isClickInside && !isClickHamburger) || isClickClose) {
//         //   sideMenu.style.transform = 'translate(105%)';
//         // }
//       });

//       document.addEventListener('keydown', (event) => {
//         if (event.keyCode == 27) {
//           sideMenu.style.transform = 'translate(105%)';
//         }
//       });
//     },
//   },
// });
