import*as e from"@wordpress/interactivity";var t={d:(e,o)=>{for(var r in o)t.o(o,r)&&!t.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:o[r]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t)};const o=(n={store:()=>e.store},c={},t.d(c,n),c),r=document.querySelector(".title_block__menu--burger");var n,c;document.querySelector(".title_block__menu--dropdown"),r.addEventListener("click",(e=>{})),(0,o.store)("tenthousandcuts",{actions:{toggleMenu:()=>{console.log("toggle the Menu!");let e=document.querySelector(".title_block__menu--dropdown"),t=document.querySelector("#menuBurger"),o=document.querySelector("#CloseMenu");e.style.transform="translate(0%)",t.style.opacity="0",document.addEventListener("click",(r=>{const n=e.contains(r.target),c=t.contains(r.target),s=o.contains(r.target);(!n&&!c||s)&&(e.style.transform="translate(105%)",t.style.opacity="1")})),document.addEventListener("keydown",(t=>{27==t.keyCode&&(e.style.transform="translate(105%)")}))}}});