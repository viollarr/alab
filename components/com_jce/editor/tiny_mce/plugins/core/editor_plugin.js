/*  
 * JCE Editor                 2.2.0
 * @package                 JCE
 * @url                     http://www.joomlacontenteditor.net
 * @copyright               Copyright (C) 2006 - 2012 Ryan Demmer. All rights reserved
 * @license                 GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
 * @date                    20 June 2012
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * NOTE : Javascript files have been compressed for speed and can be uncompressed using http://jsbeautifier.org/
 */
(function(tinymce){var DOM=tinymce.DOM,Event=tinymce.dom.Event,is=tinymce.is,each=tinymce.each;tinymce.create('tinymce.ui.ButtonDialog:tinymce.ui.Button',{ButtonDialog:function(id,s,ed){this.parent(id,s,ed);this.settings=s=tinymce.extend({content:'',buttons:[]},this.settings);this.editor=ed;this.onRenderDialog=new tinymce.util.Dispatcher(this);this.onShowDialog=new tinymce.util.Dispatcher(this);this.onHideDialog=new tinymce.util.Dispatcher(this);s.dialog_container=s.dialog_container||DOM.doc.body;},showDialog:function(){var t=this,ed=this.editor,s=this.settings,p1,p2,e=DOM.get(t.id),m;if(t.isDisabled())
return;if(!t.isDialogRendered){t.renderDialog();}
if(t.isDialogVisible)
return t.hideDialog();e=DOM.get(t.id);DOM.show(t.id+'_dialog');this.storeSelection();if(s.url){var iframe=DOM.get(t.id+'_iframe');iframe.src=s.url;}
p2=DOM.getPos(e);DOM.setStyles(t.id+'_dialog',{left:p2.x,top:p2.y+e.clientHeight+5,zIndex:200000});e=0;if(this.isActive()){DOM.addClass(t.id+'_dialog',this.classPrefix+'DialogActive');}else{DOM.removeClass(t.id+'_dialog',this.classPrefix+'DialogActive');}
Event.add(ed.getDoc(),'mousedown',t.hideDialog,t);Event.add(DOM.doc,'mousedown',function(e){if(DOM.getParent(e.target,'#'+t.id+'_dialog')){return;}
t.hideDialog();});t.onShowDialog.dispatch(t);if(t._focused){t._keyHandler=Event.add(t.id+'_dialog','keydown',function(e){if(e.keyCode==27)
t.hideDialog();});}
t.isDialogVisible=1;},storeSelection:function(){this.editor.bookmark=this.editor.selection.getBookmark(1);},restoreSelection:function(){if(tinymce.isIE)
this.editor.selection.moveToBookmark(this.editor.bookmark);},renderDialog:function(){var t=this,m,s=this.settings,w,v,ed=this.editor;s['class']+=' '+ed.getParam('skin')+'Skin';if(v=ed.getParam('skin_variant')){s['class']+=' '+ed.getParam('skin')+'Skin'+v.substring(0,1).toUpperCase()+v.substring(1);}
s['class']+=ed.settings.directionality=="rtl"?' mceRtl':'';w=DOM.add(s.dialog_container,'div',{role:'presentation',id:t.id+'_dialog','class':s['class'],style:'position:absolute;left:0;top:-1000px;'});w=DOM.add(w,'div',{'class':this.classPrefix+'Dialog'});m=DOM.add(w,'div',{'class':this.classPrefix+'DialogContent'});if(s.width){DOM.setStyle(w,'width',s.width);}
if(tinymce.is(s.content,'string')){DOM.setHTML(m,s.content);}else{DOM.add(m,s.content);}
if(s.url){DOM.add(m,'iframe',{'id':t.id+'_iframe','src':s.url,style:{'border':0,'width':'100%','height':'100%'},onload:function(){t.isDialogRendered=true;t.onRenderDialog.dispatch(t);}});}
m=DOM.add(w,'div',{'class':this.classPrefix+'DialogButtons'});each(s.buttons,function(o){var btn=DOM.add(m,'a',{'class':'mceDialogButton','id':t.id+'_button_'+o.id},o.title||'');if(o.click){Event.add(btn,'click',function(e){var s=o.click.call(o.scope||t,e);if(s){t.hideDialog();}});};});if(!s.url){t.isDialogRendered=true;t.onRenderDialog.dispatch(t);}
return w;},setButtonDisabled:function(button,state){var id=this.id+'_button_'+button;if(state){DOM.addClass(id,'disabled');}else{DOM.removeClass(id,'disabled');}},setButtonLabel:function(button,label){DOM.setHTML(this.id+'_button_'+button,label);},hideDialog:function(e){var t=this;if(e&&e.type=="mousedown"&&DOM.getParent(e.target,function(e){return e.id===t.id||e.id===t.id+'_open';}))
return;if(!e||!DOM.getParent(e.target,'.mceDialog')){t.setState('Selected',0);Event.remove(DOM.doc,'mousedown',t.hideDialog,t);DOM.hide(t.id+'_dialog');}
t.isDialogVisible=0;},postRender:function(){var t=this,s=t.settings;Event.add(t.id,'click',function(){if(!t.isDisabled()){if(s.onclick)
s.onclick(t.value);t.showDialog();}});},destroy:function(){this.parent();Event.clear(this.id+'_dialog');DOM.remove(this.id+'_dialog');}});})(tinymce);