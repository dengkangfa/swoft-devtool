webpackJsonp([17],{Gwy3:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=n("4YfN"),a=n.n(s),i=n("KatZ"),r=n("ZXMi"),v={name:"ServerInfo",components:a()({},i),data:function(){return{stats:[]}},created:function(){this.fetchList()},mounted:function(){},computed:{},methods:{fetchList:function(){var t=this;Object(r.j)().then(function(e){var n=e.data;console.log(n),t.stats=n})}}},c={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("v-subheader",[n("h2",[t._v(t._s(this.$route.name))])]),t._v(" "),n("v-layout",{attrs:{row:""}},[n("v-flex",{attrs:{xs12:"",sm6:"",md4:"",lg3:""}},[n("v-card",[n("v-card-title",[n("h4",[t._v("Server stats")])]),t._v(" "),n("v-divider"),t._v(" "),n("v-list",{attrs:{dense:""}},t._l(t.stats,function(e,s){return n("v-list-tile",{key:s},[n("v-list-tile-content",[t._v(t._s(s))]),t._v(" "),n("v-list-tile-content",{staticClass:"align-end"},[t._v(t._s(e))])],1)}))],1)],1)],1)],1)},staticRenderFns:[]};var o=n("Z0/y")(v,c,!1,function(t){n("pThg")},"data-v-1b645fb6",null);e.default=o.exports},pThg:function(t,e){}});
//# sourceMappingURL=17.67dda113bfdbc6494e70.js.map