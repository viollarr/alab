window.addEvent("domready",function(){function d(f){var e=document.id("numbertotal");if(e!=null){e.set("value",f);}}function b(e){document.id("opt"+e).set("style",{fontWeight:"bold"});}function a(){var h=number_field-1;var f=document.id("kbbcode-poll-options");var i=document.id("nb_options_allowed");d(number_field);var g=new Element("div",{id:"option"+number_field,text:KUNENA_POLL_OPTION_NAME+" "+number_field});document.id("helpbox").set("value",KUNENA_EDITOR_HELPLINE_OPTION);var e=new Element("input",{name:"polloptionsID[newoption"+h+"]",id:"field_option"+h,maxlength:"50",size:"30",onmouseover:'document.id("helpbox").set("value", "'+KUNENA_EDITOR_HELPLINE_OPTION+'")'});g.injectInside(f).injectBefore(i);e.inject(g);number_field++;}function c(e){var f=document.id("kbbcode-poll-options");var i=document.id("nb_options_allowed");var g=new Element("div");var h=new Element("span");var j=new Element("img",{src:KUNENA_ICON_ERROR});g.injectInside(f).injectBefore(i);g.set("id","option_error");j.injectInside(g);h.injectInside(g);h.set("text",e);}if(document.id("kbutton-poll-add")!=undefined){document.id("kbutton-poll-add").onclick=function(){var e=document.id("nb_options_allowed").get("value");if(e=="0"){if(number_field=="1"){a();a();}else{a();}}else{if(number_field<=e){if(number_field=="1"){a();a();}else{a();}}else{if(document.id("option_error")==undefined){c(KUNENA_POLL_NUMBER_OPTIONS_MAX_NOW);}}}};}if(document.id("kbutton-poll-rem")!=undefined){document.id("kbutton-poll-rem").onclick=function(){if(document.id("option_error")){document.id("option_error").dispose();}var g=document.id("kbbcode-poll-options");if(number_field>1){number_field=number_field-1;var f=document.id("option"+number_field);g.removeChild(f);var e=number_field-1;d(e);}};}});