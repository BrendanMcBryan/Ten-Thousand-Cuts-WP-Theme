"use strict";(self.webpackJSONPwpmdb=self.webpackJSONPwpmdb||[]).push([[56],{98056:(e,t,a)=>{a.r(t),a.d(t,{default:()=>j});var n=a(19496),c=a(52888),i=a(24819),s=a(24467),r=a(17762),l=a(62206),o=a(58347),u=a(1626),_=(a(86140),a(74634)),d=a(98791),m=a(33782),v=a(82597),b=a(50536),p=a(57524),g=e=>e.dbi_api_data;function f(e,t){return(0,p.JU)(g,"settings",e,t)}var k=a(50403);function x(e){return async t=>await t((0,m.ZY)({preRequest:(0,s.vA)((()=>{t((0,v.m_)("licence_action",!0)),t((0,v.jd)("licence"))})),asyncFn:e,requestFailed:e=>{var a,n;t((a=e,n="licence_action",e=>(e((0,v.Yt)("licence",(0,r.__)("API error: ")+(0,b.A)(a))),e((0,v.m_)(n,!1)),!1)))},requestSuccess:e=>{t((0,v.m_)("licence_action",!1))}}))}function y(e,t){return a=>{var c=e.data,i=c.errors;if(i){if(a((0,v.m_)(t,!1)),Object.keys(i).length>0){var s=Object.keys(i),r=(0,n.A)(s,1)[0];c.hasOwnProperty("licence_status")&&(r=c.licence_status),a(w(r))}a((0,u.b)(_.I,i))}else a(w("active_licence"))}}function h(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:x,t=arguments.length>1&&void 0!==arguments[1]&&arguments[1],a=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"ui";return async(n,c)=>{var i=(0,o.k)("licence",c()),r=f("api_time",c()),l=Date.now()-r,v=f("license_check_context",c());if(t||!(l<36e5)||a!==v){var b=await n(e((0,m.ty)("/check-license",{licence:i,context:"all",message_context:a},!1,n)));if(!b)return null;var p=b.data;return n(y(b,"check_licence")),(0,s.vA)((()=>{n((0,u.b)(_.xo,b.data)),n((0,u.b)(_.Ut,Date.now())),n((0,u.b)(_.eG,a)),n((e=>{(0,m.ty)("/local-site-details").then((t=>{t.success&&e((0,u.b)(k.Ui,t.data))}))})),t&&n((0,d.sT)())})),p}}}function E(e,t){if(!t)return null;var a=t.data,n=a.errors,c=a.error_type;return e(y(t,"licence_action")),"undefined"!==typeof t.data.dbrains_api_down?(e((0,u.b)(_.hm,!0)),e((0,d.sT)()),e(h())):e((0,u.b)(_.hm,!1)),!(n&&!Object.keys(n).includes("subscription_expired"))&&(1===Number(t.data.is_first_activation)&&"subscription_expired"!==c&&e((0,u.b)(_.bl,"first_activation")),"subscription_expired"!==c&&e((0,u.b)(_.ZD,!0)),t.success&&t.data&&(0,s.vA)((async()=>{"subscription_expired"!==c&&e(w("active_licence")),e((0,d.sT)()),e((0,v.cD)("masked_licence",t.data.masked_licence)),e((0,u.b)(_.xo,t.data)),"subscription_expired"!==c&&e((0,u.b)(_.I,[])),e(h())})),setTimeout((()=>{e((0,u.b)(_.ZD,!1))}),2500),t)}function w(e){return async t=>t((0,u.b)(_.QI,e))}const N=(0,s.Ng)((e=>({settingsStatus:(0,o.k)("status",e)})),{checkLicenceAgain:function(e,t){return async(a,n)=>{a((0,v.m_)("check_again",!0));var c=x;e&&!t&&(c=()=>{return t=e,async e=>{var a=await e(x((0,m.ty)("/activate-license",{licence_key:t,context:"all",message_context:"settings"},!1,e)));return E(e,a)};var t});var i=await a(h(c,!0));return a((0,v.m_)("check_again","success")),i}}})((e=>{var t,a,n=!1,i=e.settingsStatus,s=e.settings;return s&&(t=s.licence,a=s.masked_licence),i.check_again&&(n=!0===i.check_again),c.createElement(c.Fragment,null,c.createElement("div",{className:"flex-container licence-action"},c.createElement("a",{onClick:()=>{e.checkLicenceAgain(t,a)}},(0,r.__)("Check my license again","wp-migrate-db")),c.createElement("div",{className:"relative"},n&&c.createElement(l.xj,{className:"license-notification-spinner"}))))}));var S=a(88292),A=e=>{var t=e.settings,a=t.status,n=t.errors,i=a.disable_ssl;return c.createElement(c.Fragment,null,c.createElement("div",{className:"flex-container licence-action"},c.createElement("button",{className:"btn-tooltip-stroke",onClick:()=>e.disableSSL()},(0,r.nv)((0,r.__)("Temporarily disable SSL for connections to %s","wp-migrate-db"),"api.deliciousbrains.com")),c.createElement(S.L3,{position:!1,condition:i,errorMsg:n.disable_ssl,spinnerCond:i&&!0===i})))};const L=(0,s.Ng)((e=>({settingsStatus:(0,o.k)("status",e)})),{reactivateLicense:function(){return async e=>{e((0,v.m_)("reactivate_license",!0));var t=await e(x((0,m.ty)("/reactivate-license",{context:"all",message_context:"settings"},!1,e))),a=E(e,t);return e((0,v.m_)("reactivate_license","success")),e(h(x,!0)),a}}})((e=>{var t=!1,a=e.settingsStatus,n=e.className,i=e.btnText;return a.reactivate_license&&(t=!0===a.reactivate_license),c.createElement(c.Fragment,null,c.createElement("div",{className:"flex-container licence-action"},c.createElement("a",{onClick:()=>{e.reactivateLicense()},className:n||""},i||(0,r.__)("Reactivate license","wp-migrate-db")),c.createElement("div",{className:"relative"},t&&c.createElement(l.xj,{className:"license-notification-spinner"}))))}));const j=e=>{var t=(0,s.d4)((e=>e.dbi_api_data.licence)),a=t.license_ui_status,r=t.licence_status,l=(0,c.useState)(null),o=(0,n.A)(l,2),u=o[0],_=o[1],d=["subscription_expired","licence_not_found","no_activations_left"];return(0,c.useEffect)((()=>{(0,i.includes)(d,r)?_(c.createElement(N,e)):"activation_deactivated"===r&&_(c.createElement(L,e))}),[]),u||(""===a?null:"check_again"===a?c.createElement(N,e):"connection_failed"===a?c.createElement(A,e):null)}}}]);