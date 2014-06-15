jQuery.noConflict();

jQuery(document).ready(function(){
	jQuery('#button-show').remove().prependTo(document.body);
	jQuery('#tppromospace').remove().prependTo(document.body);

	jQuery('#button-close').live('click', function(){
		jQuery('#tppromospace' ).animate( { opacity: '0' }, { queue: false, duration: 750 });
		jQuery('#tppromospace').delay(500).slideUp(400); 
		jQuery.cookie('tppromospace', '1');
		jQuery('#button-close').hide();
		jQuery('#button-show').show();
	});

	jQuery('#button-show').live('click', function(){
		jQuery('#tppromospace').css({ opacity: 1 });
		jQuery('#tppromospace').slideDown(500); 
		jQuery.cookie('tppromospace', '2');
		jQuery('#tppromospace').show();
		jQuery('#button-close').show();
		jQuery('#button-show').hide();
	});

	if(jQuery.cookie('tppromospace') == 1){
		jQuery('#tppromospace').hide();
		jQuery('#button-close').hide();
		jQuery('#button-show').show();
	}else if(jQuery.cookie('tppromospace') == 2){
		jQuery('#tppromospace').show();
		jQuery('#button-close').show();
		jQuery('#button-show').hide();
	}else{
		if(start_show==1){
			jQuery('#tppromospace').show();
			jQuery('#button-close').show();
			jQuery('#button-show').hide();
		}else{
			jQuery('#tppromospace').hide();
			jQuery('#button-close').hide();
			jQuery('#button-show').show();
		}
	}
});