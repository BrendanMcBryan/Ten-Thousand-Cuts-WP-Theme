/*! For license information please see woo-product-usage-notice.js.LICENSE.txt */
(()=>{"use strict";var e={93359:(e,M,c)=>{var o=c(99196),i=Symbol.for("react.element"),r=(Symbol.for("react.fragment"),Object.prototype.hasOwnProperty),j=o.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,N={key:!0,ref:!0,__self:!0,__source:!0};function t(e,M,c){var o,t={},n=null,s=null;for(o in void 0!==c&&(n=""+c),void 0!==M.key&&(n=""+M.key),void 0!==M.ref&&(s=M.ref),M)r.call(M,o)&&!N.hasOwnProperty(o)&&(t[o]=M[o]);if(e&&e.defaultProps)for(o in M=e.defaultProps)void 0===t[o]&&(t[o]=M[o]);return{$$typeof:i,type:e,key:n,ref:s,props:t,_owner:j.current}}M.jsx=t,M.jsxs=t},81514:(e,M,c)=>{e.exports=c(93359)},99196:e=>{e.exports=window.React}},M={};function c(o){var i=M[o];if(void 0!==i)return i.exports;var r=M[o]={exports:{}};return e[o](r,r.exports,c),r.exports}c.n=e=>{var M=e&&e.__esModule?()=>e.default:()=>e;return c.d(M,{a:M}),M},c.d=(e,M)=>{for(var o in M)c.o(M,o)&&!c.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:M[o]})},c.o=(e,M)=>Object.prototype.hasOwnProperty.call(e,M),c.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})};var o={};(()=>{c.r(o);const e=window.wp.element,M=window.wp.i18n,i=window.wp.components,r=window.wp.primitives;var j=c(81514);const N=(0,j.jsx)(r.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",children:(0,j.jsx)(r.Path,{d:"M7 7.2h8.2L13.5 9l1.1 1.1 3.6-3.6-3.5-4-1.1 1 1.9 2.3H7c-.9 0-1.7.3-2.3.9-1.4 1.5-1.4 4.2-1.4 5.6v.2h1.5v-.3c0-1.1 0-3.5 1-4.5.3-.3.7-.5 1.2-.5zm13.8 4V11h-1.5v.3c0 1.1 0 3.5-1 4.5-.3.3-.7.5-1.3.5H8.8l1.7-1.7-1.1-1.1L5.9 17l3.5 4 1.1-1-1.9-2.3H17c.9 0 1.7-.3 2.3-.9 1.5-1.4 1.5-4.2 1.5-5.6z"})}),t=(0,j.jsx)(r.SVG,{viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg",children:(0,j.jsx)(r.Path,{fillRule:"evenodd",clipRule:"evenodd",d:"M6.68822 16.625L5.5 17.8145L5.5 5.5L18.5 5.5L18.5 16.625L6.68822 16.625ZM7.31 18.125L19 18.125C19.5523 18.125 20 17.6773 20 17.125L20 5C20 4.44772 19.5523 4 19 4H5C4.44772 4 4 4.44772 4 5V19.5247C4 19.8173 4.16123 20.086 4.41935 20.2237C4.72711 20.3878 5.10601 20.3313 5.35252 20.0845L7.31 18.125ZM16 9.99997H8V8.49997H16V9.99997ZM8 14H13V12.5H8V14Z"})}),n=(0,j.jsx)(r.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",children:(0,j.jsx)(r.Path,{d:"M15.5 9.5a1 1 0 100-2 1 1 0 000 2zm0 1.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zm-2.25 6v-2a2.75 2.75 0 00-2.75-2.75h-4A2.75 2.75 0 003.75 15v2h1.5v-2c0-.69.56-1.25 1.25-1.25h4c.69 0 1.25.56 1.25 1.25v2h1.5zm7-2v2h-1.5v-2c0-.69-.56-1.25-1.25-1.25H15v-1.5h2.5A2.75 2.75 0 0120.25 15zM9.5 8.5a1 1 0 11-2 0 1 1 0 012 0zm1.5 0a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z",fillRule:"evenodd"})}),s=window.wc.experimental,I=window.wc.tracks,u=window.wp.url,D=window.wc.wcSettings,d=window.wp.apiFetch;var g=c.n(d);const x=({action:e,productId:M,nonce:c},o)=>{const i=(0,u.addQueryArgs)(new URL("admin-ajax.php",(0,D.getSetting)("adminUrl")).toString(),{action:e,product_id:M,_ajax_nonce:c});g()({url:i,method:"GET",headers:{"Content-Type":"application/json"}}).then((e=>{o&&o(e)}))};function T({renewUrl:c,subscribeUrl:o,productId:r,productName:u,productRegularPrice:D,dismissAction:d,dismissNonce:g,remindLaterAction:T,remindLaterNonce:y,subscriptionState:a,screenId:z}){const[L,w]=(0,e.useState)(!0);(0,e.useEffect)((()=>{L&&(0,I.recordEvent)("product_usage_notice_opened",{product_id:r,screen_id:z})}),[L,r,z]);const A=a.expired,O=()=>{(({remindLaterAction:e,productId:M,remindLaterNonce:c},o)=>{x({action:e,productId:M,nonce:c},o)})({remindLaterAction:T,productId:r,remindLaterNonce:y},(()=>{w(!1),(0,I.recordEvent)("product_usage_notice_maybe_later_clicked",{product_id:r,screen_id:z})}))},m=()=>{const e=A?(0,M.__)("Reactivate your subscription and benefit from:","woocommerce"):(0,M.__)("Purchase a subscription to benefit from:","woocommerce"),c=[{key:"get-updates",icon:N,title:(0,M.__)("Improvements and security updates","woocommerce"),content:(0,M.__)("Access the latest features and product updates.","woocommerce")},{key:"get-supports",icon:t,title:(0,M.__)("Help when you need it","woocommerce"),content:(0,M.__)("Get streamlined support from our global support team.","woocommerce")},{key:"supporting-ecosystem",icon:n,title:(0,M.__)("Supporting the ecosystem","woocommerce"),content:(0,M.__)("A subscription helps us to continuously improve your extensions, themes, and WooCommerce experience.","woocommerce")}];return(0,j.jsxs)("div",{className:"woocommerce-subscription-benefits",children:[(0,j.jsx)("h3",{children:e}),c.map((({key:e,icon:M,title:c,content:o})=>(0,j.jsxs)("div",{className:"woocommerce-subscription-benefits__item",children:[(0,j.jsx)("div",{className:"woocommerce-subscription-benefits__icon",children:(0,j.jsx)(i.Icon,{icon:M})}),(0,j.jsxs)("div",{className:"woocommerce-subscription-benefits__content",children:[(0,j.jsx)(s.Text,{as:"h4",lineHeight:"20px",children:c}),(0,j.jsx)(s.Text,{as:"p",children:o})]})]},e)))]})};return L?(0,j.jsx)(i.Modal,{style:{borderRadius:"2px"},onRequestClose:()=>{(({dismissAction:e,productId:M,dismissNonce:c},o)=>{x({action:e,productId:M,nonce:c},o)})({dismissAction:d,productId:r,dismissNonce:g},(()=>{w(!1),(0,I.recordEvent)("product_usage_notice_dismissed",{product_id:r,screen_id:z})}))},className:"woocommerce-product-usage-notice",children:(0,j.jsxs)(i.Flex,{gap:0,align:"stretch",direction:["column-reverse","row"],children:[(0,j.jsx)(i.FlexItem,{children:(()=>{const e=A?(0,M.__)("Expired","woocommerce"):(0,M.__)("Unregistered","woocommerce"),N=A?(0,M.sprintf)((0,M.__)("Renew %s","woocommerce"),u):(0,M.sprintf)((0,M.__)("Subscribe to %s","woocommerce"),u),t=A?(0,M.sprintf)((0,M.__)("Renew for $%s","woocommerce"),D):(0,M.sprintf)((0,M.__)("Subscribe for $%s","woocommerce"),D);return(0,j.jsxs)(i.Card,{className:"primary",children:[(0,j.jsxs)(i.CardHeader,{children:[(0,j.jsx)("div",{children:(0,j.jsx)(s.Text,{className:"subscription-status subscription-status__expired",children:e})}),(0,j.jsx)("h2",{children:N})]}),(0,j.jsx)(i.CardBody,{children:m()}),(0,j.jsxs)(i.CardFooter,{children:[(0,j.jsx)(i.Button,{onClick:O,variant:"secondary",children:(0,M.__)("Maybe later","woocommerce")}),(0,j.jsx)(i.Button,{isPrimary:!0,target:"_blank",href:A?c:o,onClick:()=>A?(w(!1),void(0,I.recordEvent)("product_usage_notice_renew_clicked",{product_id:r,screen_id:z})):(w(!1),void(0,I.recordEvent)("product_usage_notice_subscribe_clicked",{product_id:r,screen_id:z})),children:t})]})]})})()}),(0,j.jsx)(i.FlexItem,{children:(0,j.jsx)(i.Card,{className:"secondary",children:(0,j.jsx)(i.CardMedia,{children:(0,j.jsx)(i.ResponsiveWrapper,{naturalWidth:240,naturalHeight:240,children:(0,j.jsx)("img",{src:"data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjYwIiBoZWlnaHQ9IjI1NCIgdmlld0JveD0iMCAwIDI2MCAyNTQiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTk4LjM4OCA5OC44MTczQzIxOC4xMTkgNzUuNTEyNCAyMjUuMDU0IDUwLjY1OCAyMTMuOTM4IDMyLjQ2MjZDMTk1LjU4NSAyLjQyMTEgMTM0Ljk3NSAxLjg5MTcxIDc4LjU1NjQgMzEuMjk1NEMyMi4xNDgzIDYwLjY5NzYgLTguNzA1MzYgMTA4Ljg5MSA5LjY1NzYgMTM4LjkzMUMyMS41OTM0IDE1OC40NjkgNTEuNDA3IDE2NS41MjMgODYuMzEyNiAxNTkuOThDODcuNDIyMiAxNjUuMjEgODkuNzg2NiAxNzAuMTg4IDkzLjIyNzEgMTc0Ljc5MUM3My4zOTgzIDE4MC41MTkgNTkuNzQ4NiAxOTIuNDY1IDU4Ljk5MTcgMjA3LjE5NEM1Ny44MzUxIDIyOS43IDg3LjIxODcgMjUwLjE3IDEyNC42MjYgMjUyLjkxMkMxNjIuMDM0IDI1NS42NjUgMTkzLjI5IDIzOS42NDggMTk0LjQ0NyAyMTcuMTQyQzE5NC43MDMgMjEyLjE0NiAxOTMuNDU1IDIwNy4yNSAxOTAuOTQ4IDIwMi42MjdDMjI3Ljg5MSAxOTYuODE3IDI1Ni44MDMgMTc2Ljc0MSAyNTkuNzU0IDE1Mi4zNThDMjYyLjg0MiAxMjYuODQ5IDIzNi40OTEgMTA0Ljk1MyAxOTguMzg4IDk4LjgxNzNaIiBmaWxsPSIjRTZFMkRFIiBmaWxsLW9wYWNpdHk9IjAuNSIvPgo8cGF0aCBkPSJNMjM4LjMxMyAyMzkuODEzQzIzOC4zMTMgMjM5LjgxMyAyMzYgMjI3LjQzOSAyMzUuNTkxIDIyNC41NjNDMjM1LjI2MyAyMjIuNzUyIDIzNC45MzYgMjIxLjAyMiAyMzQuNDQ1IDIxOS40ODdDMjMzLjg3MSAyMTcuMzk5IDIzMi45NCAyMTYuMDQ4IDIzMS43NjMgMjE1LjIxOUMyMzEuNzMyIDIxNS4xOTggMjMxLjU4OSAyMTUuMDk2IDIzMS41NTggMjE1LjA3NkMyMzAuMzcxIDIxNC4yNTcgMjI4Ljc4NSAyMTMuODU4IDIyNi42MjUgMjE0LjA0MkMyMjUuMDE4IDIxNC4xMDMgMjIzLjI3OSAyMTQuNCAyMjEuNDY3IDIxNC43MjhDMjE4LjYzMiAyMTUuMzMxIDIwNi4yMTggMjE3LjQ1IDIwNi4yMTggMjE3LjQ1TDIwOC4wNiAyMjcuNzM2TDIxNy41NDcgMjI2LjAyN0MyMTEuOTY5IDIzMy45MjggMjAyLjkzMiAyMzguNjg3IDE5My4wNzYgMjM4LjY3N0MxNzYuNTQ3IDIzOC42NzcgMTYzLjEwOSAyMjUuMjI4IDE2My4xMDkgMjA4LjY5OUgxNTIuNjA5QzE1Mi42MDkgMjMxLjAxMSAxNzAuNzU1IDI0OS4xNjcgMTkzLjA3NiAyNDkuMTc3QzIwNi40OTQgMjQ5LjE3NyAyMTguNzc1IDI0Mi42NTggMjI2LjI4OCAyMzEuODZMMjI4LjAxNyAyNDEuNjQ1TDIzOC4zMDMgMjM5LjgyM0wyMzguMzEzIDIzOS44MTNaIiBmaWxsPSIjRDFDMUZGIi8+CjxwYXRoIGQ9Ik0xOTQuMzM1IDE2NC45ODdDMTgwLjkxOCAxNjQuOTg3IDE2OC42MzYgMTcxLjUwNyAxNjEuMTI0IDE4Mi4zMDRMMTU5LjM5NCAxNzIuNTJMMTQ5LjEwOCAxNzQuMzQyQzE0OS4xMDggMTc0LjM0MiAxNTEuNDIxIDE4Ni43MTUgMTUxLjgzMSAxODkuNTkxQzE1Mi4xNTggMTkxLjQwMyAxNTIuNDg2IDE5My4xMzIgMTUyLjk3NyAxOTQuNjY4QzE1My41NSAxOTYuNzU1IDE1NC40ODIgMTk4LjEwNiAxNTUuNjU5IDE5OC45MzVDMTU1LjY4OSAxOTguOTU2IDE1NS44MzMgMTk5LjA1OCAxNTUuODYzIDE5OS4wNzlDMTU3LjA1IDE5OS44OTcgMTU4LjYzNyAyMDAuMjk3IDE2MC43OTYgMjAwLjExMkMxNjIuNDAzIDIwMC4wNTEgMTY0LjE0MyAxOTkuNzU0IDE2NS45NTUgMTk5LjQyN0MxNjguNzkgMTk4LjgyMyAxODEuMjA0IDE5Ni43MDQgMTgxLjIwNCAxOTYuNzA0TDE3OS4zNjIgMTg2LjQxOEwxNjkuODc0IDE4OC4xMjhDMTc1LjQ1MiAxODAuMjI3IDE4NC40ODkgMTc1LjQ2NyAxOTQuMzQ1IDE3NS40NzhDMjA2LjY3OCAxNzUuNDc4IDIxNy4yOTEgMTgyLjk2OSAyMjEuODg3IDE5My42NDRDMjI1LjE3MiAxOTIuMTgxIDIyOC4yOTQgMTkwLjU4NCAyMzEuMjUxIDE4OC44NjVDMjI0LjkwNiAxNzQuODAyIDIxMC43NjIgMTY0Ljk3NyAxOTQuMzU2IDE2NC45NzdMMTk0LjMzNSAxNjQuOTg3WiIgZmlsbD0iIzcyMEVFQyIvPgo8cGF0aCBkPSJNMjIxLjg3NiAxOTMuNjQ0QzIyNS4xNjIgMTkyLjE4MSAyMjguMjgzIDE5MC41ODQgMjMxLjI0MSAxODguODY1QzIyOC42IDE4My4wMjEgMjI0LjYwOSAxNzcuOTM0IDIxOS42NzYgMTczLjk1M0wyMDkuODQgMTc5LjgyN0MyMTUuMTUyIDE4My4wNjIgMjE5LjQgMTg3Ljg3MiAyMjEuODc2IDE5My42MzRWMTkzLjY0NFoiIGZpbGw9IiMzQzA4N0UiLz4KPHBhdGggZD0iTTE3MC41NjIgNjguNDQ5OUMxNzQuNTk1IDY4LjQ0OTkgMTc4LjIxOCA2OS40NTI5IDE4MS42NDYgNzEuMDdWNTYuMzUyNkMxODEuNjQ2IDQ3LjI4NDcgMTc2LjQwNiA0Mi4wNDQ2IDE2Ny4zMzkgNDIuMDQ0NkgxOC41NjgyQzkuNTAwMzcgNDIuMDQ0NiA0LjI2MDI1IDQ3LjA4IDQuMjYwMjUgNTYuMzUyNlYxNDUuNjZINzQuMjEzOEM3MC43ODUyIDE1MC45IDY3LjM1NjYgMTU2Ljk0OSA2Ny4zNTY2IDE2NEM2Ny4zNTY2IDE3OC4zMDggNzguNDQwNyAxODkuODAyIDkyLjc1ODkgMTg5LjgwMkMxMDcuMDc3IDE4OS44MDIgMTE4LjE2MSAxNzguMTE0IDExOC4xNjEgMTY0QzExOC4xNjEgMTU2Ljc0NCAxMTQuOTM3IDE1MC42OTUgMTExLjMwNCAxNDUuNjZIMTgxLjY1N1YxMTYuNjM0QzE3OC4yMjggMTE4LjI1MiAxNzQuNjA1IDExOS4yNTUgMTcwLjU3MyAxMTkuMjU1QzE1Ni4yNjUgMTE5LjI1NSAxNDQuNzcxIDEwOC4xNyAxNDQuNzcxIDkzLjg1MjJDMTQ0Ljc3MSA3OS41MzQgMTU2LjI2NSA2OC40NDk5IDE3MC41NzMgNjguNDQ5OUgxNzAuNTYyWiIgZmlsbD0iI0QxQzFGRiIvPgo8cGF0aCBkPSJNODQuMDA4NiAxMDguMzY1SDE4Ljc0MjVWMTE1LjgyNkg4NC4wMTg4VjEwOC4zNjVIODQuMDA4NloiIGZpbGw9IiM3MjBFRUMiLz4KPHBhdGggZD0iTTY0Ljk5MjcgMTIzLjI4N0gxOC43NDI1VjEzMC43NDhINjUuMDAyOVYxMjMuMjg3SDY0Ljk5MjdaIiBmaWxsPSIjNzIwRUVDIi8+CjxwYXRoIGQ9Ik04NC4wMDc5IDU3LjI1MzFIMTguNzcyNVYxMDAuNjQ4SDg0LjAxODFWNTcuMjUzMUg4NC4wMDc5WiIgZmlsbD0iIzcyMEVFQyIvPgo8cGF0aCBkPSJNODQuMDA3OSA1Ny4yNTMxTDE4Ljc3MjUgMTAwLjY0OEg4NC4wMTgxVjU3LjI1MzFIODQuMDA3OVoiIGZpbGw9IiMzQzA4N0UiLz4KPC9zdmc+Cg==",alt:""})})})})})]})}):null}const{renewUrl:y,subscribeUrl:a,productId:z,productName:L,productRegularPrice:w,dismissAction:A,dismissNonce:O,remindLaterAction:m,remindLaterNonce:l,colorScheme:E,subscriptionState:p,screenId:k}=window.wooProductUsageNotice,C=document.createElement("div");C.setAttribute("id","woo-product-usage-notice"),(0,e.createRoot)(document.body.appendChild(C)).render((0,j.jsx)(T,{renewUrl:y,subscribeUrl:a,productId:z,productName:L,productRegularPrice:w,dismissAction:A,dismissNonce:O,remindLaterAction:m,remindLaterNonce:l,colorScheme:E,subscriptionState:p,screenId:k}))})(),(window.wc=window.wc||{}).wooProductUsageNotice=o})();