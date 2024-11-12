(()=>{"use strict";var e,n={851:(e,n,o)=>{const r=window.wp.blockEditor,s=window.wp.blocks,t=JSON.parse('{"UU":"tenthousandcuts/banner"}'),a=window.wp.apiFetch;var i=o.n(a);const c=window.wp.components,l=window.wp.element,d=window.ReactJSXRuntime;(0,s.registerBlockType)(t.UU,{edit:function({attributes:e,setAttributes:n}){const o=(0,r.useBlockProps)();return(0,l.useEffect)((function(){e.imgURL||n({imgURL:ourThemeData.themePath+"/assets/images/Museum Window.webp"})}),[]),(0,l.useEffect)((function(){if(e.imgID){async function o(){const o=await i()({path:`/wp/v2/media/${e.imgID}`,method:"GET"});n({imgURL:o.source_url})}o()}}),[e.imgID]),(0,d.jsxs)("div",{...o,children:[(0,d.jsx)(r.InspectorControls,{children:(0,d.jsxs)(c.PanelBody,{title:"Background",initialOpen:!0,children:[(0,d.jsx)(c.PanelRow,{children:(0,d.jsx)(c.ToggleControl,{label:"Has Down Arrow?",onChange:e=>n({hasDownArrow:e}),help:e.hasDownArrow?"Has Disc.":"No Disc.",checked:e.hasDownArrow})}),(0,d.jsx)(c.PanelRow,{children:(0,d.jsx)(r.MediaUploadCheck,{children:(0,d.jsx)(r.MediaUpload,{onSelect:function(e){n({imgID:e.id})},value:e.imgID,render:({open:e})=>(0,d.jsx)(c.Button,{onClick:e,children:"Choose Image"})})})})]})}),(0,d.jsxs)("div",{className:"page-banner",children:[(0,d.jsx)("div",{className:"page-banner__bg-image",style:{backgroundImage:`url('${e.imgURL}')`}}),(0,d.jsx)("div",{className:"page-banner__content container t-center c-white",children:(0,d.jsx)(r.InnerBlocks,{allowedBlocks:["core/spacer","tenthousandcuts/artworkdisplaycontainer"]})}),(0,d.jsx)("div",{className:"downarrow",children:(0,d.jsx)("i",{class:"fa-solid fa-chevron-down",children:"you can add down arrow"})})]})]})},save:function(){return(0,d.jsx)(r.InnerBlocks.Content,{})}})}},o={};function r(e){var s=o[e];if(void 0!==s)return s.exports;var t=o[e]={exports:{}};return n[e](t,t.exports,r),t.exports}r.m=n,e=[],r.O=(n,o,s,t)=>{if(!o){var a=1/0;for(d=0;d<e.length;d++){o=e[d][0],s=e[d][1],t=e[d][2];for(var i=!0,c=0;c<o.length;c++)(!1&t||a>=t)&&Object.keys(r.O).every((e=>r.O[e](o[c])))?o.splice(c--,1):(i=!1,t<a&&(a=t));if(i){e.splice(d--,1);var l=s();void 0!==l&&(n=l)}}return n}t=t||0;for(var d=e.length;d>0&&e[d-1][2]>t;d--)e[d]=e[d-1];e[d]=[o,s,t]},r.n=e=>{var n=e&&e.__esModule?()=>e.default:()=>e;return r.d(n,{a:n}),n},r.d=(e,n)=>{for(var o in n)r.o(n,o)&&!r.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:n[o]})},r.o=(e,n)=>Object.prototype.hasOwnProperty.call(e,n),(()=>{var e={956:0,116:0};r.O.j=n=>0===e[n];var n=(n,o)=>{var s,t,a=o[0],i=o[1],c=o[2],l=0;if(a.some((n=>0!==e[n]))){for(s in i)r.o(i,s)&&(r.m[s]=i[s]);if(c)var d=c(r)}for(n&&n(o);l<a.length;l++)t=a[l],r.o(e,t)&&e[t]&&e[t][0](),e[t]=0;return r.O(d)},o=self.webpackChunkten_thousand_cuts=self.webpackChunkten_thousand_cuts||[];o.forEach(n.bind(null,0)),o.push=n.bind(null,o.push.bind(o))})();var s=r.O(void 0,[116],(()=>r(851)));s=r.O(s)})();