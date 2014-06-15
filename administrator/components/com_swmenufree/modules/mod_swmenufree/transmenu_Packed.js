/* =================================================================================================
 * TransMenu
 * March, 2003
 *
 * Customizable multi-level animated DHTML menus with transparency.
 *
 * Copyright 2003-2004, Aaron Boodman (www.youngpup.net)
 * Modified by Sean White to add more features and work with swMenuFree (http://www.swmenupro.com)

 * =================================================================================================*/
function Accelimation(a,b,c,d){if(typeof d=="undefined")d=0;if(typeof unit=="undefined")unit="px";this.x0=a;this.x1=b;this.dt=c;this.zip=-d;this.unit=unit;this.timer=null;this.onend=new Function;this.onframe=new Function}function TransMenuItem(a,b,c,d,e,f,g){function j(b){var c=b?TransMenu.dingbatOff:TransMenu.spacerGif;var d=TransMenu.itemPadding+TransMenu.menuPadding;var e="padding:"+TransMenu.itemPadding+"px; padding-left:"+d+"px;";var i="padding:"+TransMenu.itemPadding+"px; padding-right:"+d+"px;";var j='<tr class="item">';if(TransMenu.sub_indicator&&(g==TransMenu.direction.left||g==TransMenu.direction.dleft)){j+='<td align="left" style="'+i+'border-right:0;" class="'+h+' transImage">'+'<img src="'+c+'" align="left"></td>';j+='<td style="'+e+'border-left:0;" id="'+f+'" class="'+h+'">'+a+"</td>"}else if(TransMenu.sub_indicator&&(g==TransMenu.direction.down||g==TransMenu.direction.right||g==TransMenu.direction.up)){j+='<td style="'+e+'border-right:0;" id="'+f+'" class="'+h+'" >'+a+"</td>";j+='<td  align="right" width="10" style="'+i+'border-left:0;" class="'+h+' transImage" >'+'<img src="'+c+'" align="right"></td>'}else{j+='<td id="'+f+'" class="'+h+'" >'+a+"</td>"}j+="</tr>";return j}this.toString=j;this.text=a;this.url=b;this.target=d;this.parentMenu=c;var h="";var i=f.substring(f.length-2,f.length);if(i=="-0"){h="top_item"}}function TransMenuSet(a,b,c,d){function n(){if(null!=g){l(g);g.hideTimer=null;g.hide();g=null}}function m(a){if(!a&&g)a=g;if(a&&g==a&&a.isOpen){n()}}function l(a){if(a.hideTimer){a.ondequeue();window.clearTimeout(a.hideTimer);a.hideTimer=null}}function k(a){a.onqueue();a.hideTimer=window.setTimeout("TransMenuSet.registry["+f.index+"].hide(TransMenu.registry["+a.index+"])",TransMenu.hideDelay)}function j(a){if(g==a&&a.isOpen){if(!a.hideTimer)k(a)}}function i(a){if(a!=g){if(g!=null)m(g);g=a;a.show()}else{l(a)}}function h(f){var g=new TransMenu(f,a,b,c,d,this);e[e.length]=g;return g}this.addMenu=h;this.showMenu=i;this.hideMenu=j;this.hide=m;this.hideCurrent=n;var e=[];var f=this;var g=null;this.index=TransMenuSet.registry.length;TransMenuSet.registry[this.index]=this}function TransMenu(a,b,c,d,e,f){function S(){var b=[];var c="transMenu"+(a.constructor!=TransMenuItem?" top":"");for(var d=0,e=null;e=this.items[d];d++){b[d]=e.toString(l[d])}return'<div id="'+g+'" class="'+c+'" style="">'+'<div class="content"><table class="items" cellpadding="0" cellspacing="0" border="0">'+b.join("")+"</table>"+'<div class="shadowBottom"></div>'+'<div class="shadowRight"></div>'+'<div class="background"></div>'+"</div></div>"}function R(){f.showMenu(p)}function Q(){f.hideMenu(p)}function P(){for(var a=0;a<l.length;a++){if(l[a]==this){G(n["item"][a]);break}}}function O(){if(!k){f.showMenu(p)}}function N(){if(!k){f.hideMenu(p)}}function M(){if(!k){f.showMenu(p);p.onmouseover()}}function L(){f.hideMenu(p)}function K(){f.showMenu(p)}function J(){if(!k){if(p.items[this._index].url){if(p.items[this._index].target=="1"){window.open(p.items[this._index].url,"_blank")}else if(p.items[this._index].target=="2"){window.open(p.items[this._index].url,"","toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550")}else if(p.items[this._index].target=="3"){location.href=void 0}else{location.href=p.items[this._index].url}}}}function I(){if(!k){if(l[this._index]){}else{G(this)}}}function H(){if(!k){F(this);if(l[this._index])j.showMenu(l[this._index]);else if(j)j.hide()}}function G(a){a.className="item";if(l[a._index]){}if(l[a._index])if(TransMenu.sub_indicator&&a.lastChild.firstChild.src){a.lastChild.firstChild.src=TransMenu.dingbatOff}}function F(a){a.className="item hover";if(l[a._index])if(TransMenu.sub_indicator&&a.lastChild.firstChild.src){a.lastChild.firstChild.src=TransMenu.dingbatOn}}function E(){for(var b=0,c=null;c=n.item[b];b++){c.onmouseover=H;c.onmouseout=I;c.onclick=J}if(typeof a.tagName!="undefined"){a.onmouseover=K;a.onmouseout=L}n["content"].onmouseover=M;n["content"].onmouseout=N}function D(){var a=document.getElementById(g);var b=a.all?a.all:a.getElementsByTagName("*");n={};n["clip"]=a;n["item"]=[];for(var c=0,d=null;d=b[c];c++){switch(d.className){case"items":case"content":case"background":case"shadowRight":case"shadowBottom":n[d.className]=d;break;case"item":d._index=n["item"].length;n["item"][d._index]=d;break}}p.elmCache=n}function C(){var a=n["items"].offsetWidth;var c=n["items"].offsetHeight;var d=navigator.userAgent.toLowerCase();n["clip"].style.width=a+TransMenu.shadowSize+2+"px";n["clip"].style.height=c+TransMenu.shadowSize+2+"px";n["content"].style.width=a+TransMenu.shadowSize+"px";n["content"].style.height=c+TransMenu.shadowSize+"px";h=c+TransMenu.shadowSize;i=a+TransMenu.shadowSize;s=b==TransMenu.direction.down||b==TransMenu.direction.up?h:i;if(b==TransMenu.direction.left||b==TransMenu.direction.up){s=-s}n["content"].style[r]=-s-TransMenu.shadowSize+"px";n["clip"].style.visibility="hidden";if(d.indexOf("mac")==-1||d.indexOf("gecko")>-1){n["background"].style.width=a+"px";n["background"].style.height=c+"px";n["shadowRight"].style.left=a+"px";n["shadowRight"].style.height=c-(TransMenu.shadowOffset-TransMenu.shadowSize)+"px";n["shadowRight"].style.backgroundColor=TransMenu.shadowColor;n["shadowBottom"].style.top=c+"px";n["shadowBottom"].style.width=a-TransMenu.shadowOffset+"px";n["shadowBottom"].style.backgroundColor=TransMenu.shadowColor}else{n["background"].firstChild.src=TransMenu.backgroundPng;n["background"].firstChild.width=a;n["background"].firstChild.height=c;n["shadowRight"].firstChild.src=TransMenu.shadowPng;n["shadowRight"].style.left=a+"px";n["shadowRight"].firstChild.width=TransMenu.shadowSize;n["shadowRight"].firstChild.height=c-(TransMenu.shadowOffset-TransMenu.shadowSize);n["shadowBottom"].firstChild.src=TransMenu.shadowPng;n["shadowBottom"].style.top=c+"px";n["shadowBottom"].firstChild.height=TransMenu.shadowSize;n["shadowBottom"].firstChild.width=a-TransMenu.shadowOffset}}function B(){if(!p.isOpen)n["clip"].style.visibility="hidden";k=false}function A(a){n["content"].style[r]=a+"px"}function z(){var a=parseInt(n["content"].style[r]);var b=p.isOpen?0:-s;if(q!=null)q.stop();q=new Accelimation(a,b,TransMenu.slideTime,m);q.onframe=A;q.onend=B;q.start()}function y(){var f=a.constructor==TransMenuItem;var g=f?a.parentMenu.elmCache["item"][a._index]:a;var j=g;var k=0;var l=0;var m=navigator.userAgent.toLowerCase();var o=-1;if(navigator.appName=="Microsoft Internet Explorer"){var m=navigator.userAgent;var p=new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");if(p.exec(m)!=null)o=parseFloat(RegExp.$1)}if(m.indexOf("opera")>=0){var q=0;var r=(window.innerWidth?window.innerWidth+document.body.scrollLeft:document.body.clientWidth+document.body.scrollLeft)-parseInt(n["clip"].style.width);var s=0;var t=(window.innerHeight?window.innerHeight+document.body.scrollTop:document.body.clientHeight+document.body.scrollTop)-parseInt(n["clip"].style.height)}else if(o==9){var q=0;var r=document.documentElement.clientWidth+document.documentElement.scrollLeft-parseInt(n["clip"].style.width);var s=0;var t=document.documentElement.clientHeight+document.documentElement.scrollTop-parseInt(n["clip"].style.height)}else{var q=0;var r=(window.innerWidth?window.innerWidth+window.scrollX:document.documentElement.clientWidth+document.documentElement.scrollLeft)-parseInt(n["clip"].style.width);var s=0;var t=(window.innerHeight?window.innerHeight+window.scrollY:document.documentElement.clientHeight+document.documentElement.scrollTop)-parseInt(n["clip"].style.height)}count=0;while(f?j.parentNode.className.indexOf("transMenu")==-1:j.offsetParent){if(j.id.indexOf("menu")>-1||f){k+=j.offsetLeft;l+=j.offsetTop}count++;if(j.scrollLeft)k-=j.scrollLeft;if(j.scrollTop)l-=j.scrollTop;j=j.offsetParent}if(g.childNodes[0]){}if(g.childNodes[0]){}if(a.constructor==TransMenuItem){k+=parseInt(j.parentNode.style.left);l+=parseInt(j.parentNode.style.top)}switch(e){case TransMenu.reference.topLeft:break;case TransMenu.reference.topRight:k+=g.offsetWidth;break;case TransMenu.reference.bottomLeft:l+=g.offsetHeight;break;case TransMenu.reference.bottomRight:k+=g.offsetWidth;l+=g.offsetHeight;break}k+=j.offsetLeft;l+=j.offsetTop;if(g.tagName=="TR"&&g.childNodes[0]&&m.indexOf("safari")>=0){start=m.indexOf("safari");ver=parseInt(m.substring(start+7,start+10));if(b==4){if(ver<500){l+=g.childNodes[0].offsetTop}}else{xx_offset=0;if(TransMenu.sub_indicator){xx_offset=g.childNodes[1].offsetWidth}if(ver<500){k+=g.childNodes[0].offsetLeft+g.childNodes[0].offsetWidth+xx_offset;l+=g.childNodes[0].offsetTop}}}if(g.tagName=="TR"&&m.indexOf("opera")>=0){}k+=c;l+=d;if(TransMenu.autoposition&&m.indexOf("opera")==-1){k=Math.max(Math.min(k,r),q);l=Math.max(Math.min(l,t),s)}var u=n["items"].offsetWidth;var v=n["items"].offsetHeight;h=v+TransMenu.shadowSize;i=u+TransMenu.shadowSize;if(b==TransMenu.direction.up){l-=h}if(b==TransMenu.direction.left||b==TransMenu.direction.dleft){k-=i}n["clip"].style.left=k+"px";n["clip"].style.top=l+"px"}function x(){if(o){p.isOpen=false;k=true;for(var b=0,c=null;c=n.item[b];b++)G(c);if(j)j.hide();z();if(TransMenu.selecthack){WCH.Discard(g)}if(a.parentMenu==null&&TransMenu.fontFace!="none"&&TransMenu.fontFace&&TransMenu.activeId!=a.id){Cufon.replace("#"+a.id,{color:TransMenu.fontColor,fontFamily:TransMenu.fontFace})}p.ondeactivate()}}function w(){if(o){p.isOpen=true;k=true;y();n["clip"].style.visibility="visible";n["clip"].style.zIndex=TransMenu._maxZ++;z();if(TransMenu.selecthack){WCH.Apply(g)}p.onactivate()}}function v(){D();E();C();o=true}function u(a,c,d){if(!a.parentMenu==this)throw new Error("Cannot add a menu here");var e=TransMenu.direction.right;var f=TransMenu.reference.topRight;if(b==TransMenu.direction.left||b==TransMenu.direction.dleft){e=TransMenu.direction.left;f=TransMenu.reference.topLeft}if(j==null)j=new TransMenuSet(e,c,d,f);var g=j.addMenu(a);l[a._index]=g;g.onmouseover=O;g.ondeactivate=P;g.onqueue=Q;g.ondequeue=R;return g}function t(a,c,d,e){var f=new TransMenuItem(a,c,this,d,e,g+"-"+this.items.length,b);f._index=this.items.length;this.items[f._index]=f}this.addItem=t;this.addMenu=u;this.toString=S;this.initialize=v;this.isOpen=false;this.show=w;this.hide=x;this.items=[];this.onactivate=new Function;this.ondeactivate=new Function;this.onmouseover=new Function;this.onqueue=new Function;this.ondequeue=new Function;this.index=TransMenu.registry.length;TransMenu.registry[this.index]=this;var g="TransMenu"+this.index;var h=null;var i=null;var j=null;var k=false;var l=[];var m=-1;var n=null;var o=false;var p=this;var q=null;var r=b==TransMenu.direction.down||b==TransMenu.direction.up||b==TransMenu.direction.dleft?"top":"left";var s=null}TransMenu.spacerGif="img/x.gif";TransMenu.dingbatOn="img/submenu-on.gif";TransMenu.dingbatOff="img/submenu-off.gif";TransMenu.dingbatSize=14;TransMenu.menuPadding=5;TransMenu.itemPadding=3;TransMenu.shadowSize=2;TransMenu.shadowOffset=3;TransMenu.shadowColor="#888";TransMenu.shadowPng="img/grey-40.png";TransMenu.backgroundColor="white";TransMenu.backgroundPng="img/white-90.png";TransMenu.hideDelay=1e3;TransMenu.slideTime=400;TransMenu.fontFace="none";TransMenu.activeId="none";TransMenu.fontColor="#000";TransMenu.preview=0;TransMenu.autoposition=1;TransMenu.reference={topLeft:1,topRight:2,bottomLeft:3,bottomRight:4};TransMenu.direction={down:1,right:2,up:3,left:4,dleft:5};TransMenu.registry=[];TransMenu._maxZ=100;TransMenu.isSupported=function(){var a=navigator.userAgent.toLowerCase();var b=navigator.platform.toLowerCase();var c=navigator.appName;var d=true;if(a.indexOf("gecko")>-1&&navigator.productSub>=20020605)d=true;else if(c=="Microsoft Internet Explorer"){if(document.getElementById){if(b.indexOf("mac")==0){d=/msie (\d(.\d*)?)/.test(a)&&Number(RegExp.$1)>=5.1}else d=true}}return d};TransMenu.initialize=function(){for(var a=0,b=null;b=this.registry[a];a++){b.initialize()}};TransMenu.renderAll=function(){var a=[];for(var b=0,c=null;c=this.registry[b];b++){a[b]=c.toString()}if(TransMenu.preview==1){$("#subwrap").append(a.join(""))}else{document.write(a.join(""))}};TransMenuSet.registry=[];Accelimation.prototype.start=function(){this.t0=(new Date).getTime();this.t1=this.t0+this.dt;var a=this.x1-this.x0;this.c1=this.x0+(1+this.zip)*a/3;this.c2=this.x0+(2+this.zip)*a/3;Accelimation._add(this)};Accelimation.prototype.stop=function(){Accelimation._remove(this)};Accelimation.prototype._paint=function(a){if(a<this.t1){var b=a-this.t0;this.onframe(Accelimation._getBezier(b/this.dt,this.x0,this.x1,this.c1,this.c2))}else this._end()};Accelimation.prototype._end=function(){Accelimation._remove(this);this.onframe(this.x1);this.onend()};Accelimation._add=function(a){var b=this.instances.length;this.instances[b]=a;if(this.instances.length==1){this.timerID=window.setInterval("Accelimation._paintAll()",this.targetRes)}};Accelimation._remove=function(a){for(var b=0;b<this.instances.length;b++){if(a==this.instances[b]){this.instances=this.instances.slice(0,b).concat(this.instances.slice(b+1));break}}if(this.instances.length==0){window.clearInterval(this.timerID);this.timerID=null}};Accelimation._paintAll=function(){var a=(new Date).getTime();for(var b=0;b<this.instances.length;b++){this.instances[b]._paint(a)}};Accelimation._B1=function(a){return a*a*a};Accelimation._B2=function(a){return 3*a*a*(1-a)};Accelimation._B3=function(a){return 3*a*(1-a)*(1-a)};Accelimation._B4=function(a){return(1-a)*(1-a)*(1-a)};Accelimation._getBezier=function(a,b,c,d,e){return c*this._B1(a)+e*this._B2(a)+d*this._B3(a)+b*this._B4(a)};Accelimation.instances=[];Accelimation.targetRes=10;Accelimation.timerID=null;if(window.attachEvent){var cearElementProps=["data","onmouseover","onmouseout","onmousedown","onmouseup","ondblclick","onclick","onselectstart","oncontextmenu"];window.attachEvent("onunload",function(){var a;for(var b=document.all.length;b--;){a=document.all[b];for(var c=cearElementProps.length;c--;){a[cearElementProps[c]]=null}}})}var WCH_Constructor=function(){function i(){a=typeof document.body.contentEditable!="undefined";b=typeof document.compatMode!="undefined";if(!a){if(document.styleSheets.length==0)document.createStyleSheet();var e=document.styleSheets[0];e.addRule(".WCHhider","visibility:visible");c=e.rules(e.rules.length-1)}d=false}function h(a){var b=null;switch(typeof a){case"object":b=a;break;case"string":b=document.getElementById(a);break}return b}function g(a,b){a.style.width=b.offsetWidth+"px";a.style.height=b.offsetHeight+"px";a.style.left=b.offsetLeft+"px";a.style.top=b.offsetTop+"px"}function f(a,c,d){var e=h(a);var f=(oTmp=h(c))?oTmp:document.getElementsByTagName("body")[0];if(!e||!f)return;var i=document.getElementById("WCHhider"+e.id);if(!i){var j=b?"filter:progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0);":"";var k=e.style.zIndex;if(k=="")k=e.currentStyle.zIndex;k=parseInt(k);if(isNaN(k))return null;if(k<2)return null;k--;var l="WCHhider"+e.id;f.insertAdjacentHTML("afterBegin",'<iframe class="WCHiframe" src="javascript:false;" id="'+l+'" scroll="no" frameborder="0" style="position:absolute;visibility:hidden;'+j+"border:0;top:0;left;0;width:0;height:0;background-color:#ccc;z-index:"+k+';"></iframe>');i=document.getElementById(l);g(i,e)}else if(d){g(i,e)}return i}if(!(document.all&&document.getElementById&&!window.opera&&navigator.userAgent.toLowerCase().indexOf("mac")==-1)){this.Apply=function(){};this.Discard=function(){};return}var a=false;var b=false;var c=null;var d=true;var e=this;this.Apply=function(b,e,g){if(d)i();if(a&&(oIframe=f(b,e,g))){oIframe.style.visibility="visible"}else if(c!=null){c.style.visibility="hidden"}};this.Discard=function(b,d){if(a&&(oIframe=f(b,d,false))){oIframe.style.visibility="hidden"}else if(c!=null){c.style.visibility="visible"}};};var WCH=new WCH_Constructor