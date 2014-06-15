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
(function($){var docElement=document.documentElement;var smile=':)';var $input=document.createElement('input');var $div=document.createElement('div');$.support.input={};$.support.input.attr=(function(at){var o={},i;for(i=0,n=at.length;i<n;i++){o[at[i]]=!!(at[i]in $input);}
return o;})('placeholder max min pattern number'.split(' '));$.support.input.type=(function(props){var o={};for(var i=0,bool,inputElemType,defaultView,len=props.length;i<len;i++){$input.setAttribute('type',inputElemType=props[i]);bool=$input.type!=='text';if(bool){$input.value=smile;$input.style.cssText='position:absolute;visibility:hidden;';if(/^range$/.test(inputElemType)&&$input.style.WebkitAppearance!==undefined){docElement.appendChild($input);defaultView=document.defaultView;bool=defaultView.getComputedStyle&&defaultView.getComputedStyle($input,null).WebkitAppearance!=='textfield'&&($input.offsetHeight!==0);docElement.removeChild($input);}else if(/^(search|tel)$/.test(inputElemType)){}else if(/^(url|email)$/.test(inputElemType)){bool=$input.checkValidity&&$input.checkValidity()===false;}else if(/^color$/.test(inputElemType)){docElement.appendChild($input);docElement.offsetWidth;bool=$input.value!=smile;docElement.removeChild($input);}else{bool=$input.value!=smile;}}
o[props[i]]=!!bool;}
return o;})('search tel url email datetime date month week time datetime-local number range color'.split(' '));$.support.draggable=(function(){return'draggable'in $div;});$.fn.drag=function(){if(!$.support.draggable){$(this).draggable({axis:$(this).data('axis')});}else{$(this).bind('dragstart',function(e){e.dataTransfer.setData('Text',this.id);});}
return this;};$.fn.range=function(){if(!$.support.input.type.range){var self=this;var step=$(this).attr('step')||1;var min=$(this).attr('min');var max=$(this).attr('max');if(typeof min=='undefined'){min=0;}
if(typeof max=='undefined'){max=100;}
var slider=$('<div />').attr({id:$(this).attr('id'),'class':$(this).attr('class'),name:$(this).attr('name')}).slider({min:parseInt(min),max:parseInt(max),step:parseInt(step),value:$(this).val(),slide:function(e,ui){$(self).val(ui.value).change();},start:function(){$(self).mousedown();},stop:function(){$(self).mouseup();}}).insertBefore(this);$(this).hide();return slider;}
return this;};$.fn.number=function(){if(!$.support.input.type.number){return this.change(function(){var v=parseFloat($(this).val()),pv=$(this).attr('placeholder');if(typeof pv=='undefined'){pv='';}
if($.isNumeric(v)===false){$(this).val(pv);}});}
return this;};$.fn.placeholder=function(){if(!$.support.input.attr.placeholder){return this.each(function(){var v=$(this).attr('placeholder'),iv=$(this).val();if(iv===''||iv==v){$(this).addClass('placeholder').val(v).click(function(){if($(this).hasClass('placeholder')){$(this).val('').removeClass('placeholder');}}).blur(function(){iv=$(this).val();if(iv===''||iv==v){$(this).addClass('placeholder').val(v);}});}
$(this).change(function(){iv=$(this).val();if(iv===''){$(this).addClass('placeholder').val(v);}else{$(this).removeClass('placeholder');}});});}
return this;};$.fn.min=function(){if(!$.support.input.attr.min){return this.change(function(){var m=parseFloat($(this).attr('min')),v=parseFloat($(this).val()),pv=$(this).attr('placeholder');if(pv!='undefined'&&pv==v){return this;}
if(v<m){$(this).val(m);}});}
return this;};$.fn.max=function(){if(!$.support.input.attr.max){return this.change(function(){var m=parseFloat($(this).attr('max')),v=parseFloat($(this).val()),pv=$(this).attr('placeholder');if(pv!='undefined'&&pv==v){return this;}
if(v>m){$(this).val(m);}});}
return this;};$.fn.pattern=function(){this.change(function(){var pattern=$(this).attr('pattern'),v=$(this).val(),pv=$(this).attr('placeholder');if(pv!='undefined'&&pv==v){return this;}
if(!new RegExp('^(?:'+pattern+')$').test(v)){var n=new RegExp('('+pattern+')').exec(v);if(n){$(this).val(n[0]);}}});return this;};})(jQuery);