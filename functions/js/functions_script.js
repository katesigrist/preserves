jQuery(function(jQuery) {  
  	
	/*
	ADD FEATURED IMAGE
	*/
    jQuery('.add_featured_image').click(function() {  
        formfield = jQuery(this).siblings('.image_val');  
        preview = jQuery(this).siblings('.preview_image');  
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');  
        window.send_to_editor = function(html) {  
            imgurl = jQuery('img',html).attr('src');  
            classes = jQuery('img', html).attr('class');  
            id = classes.replace(/(.*?)wp-image-/, '');
            formfield.val(id);  
            preview.attr('src', imgurl);  
            tb_remove();  
        }  
        return false;  
    });  
  
    jQuery('.remove-image').click(function() {  
        jQuery(this).parent().siblings('.image_val').val('');  
        jQuery(this).parent().siblings('.preview_image').attr('src', '');  
        return false;  
    });  	
	
	
		
	
	/*
	ADD MEDIA-IMAGE
	*/
	jQuery('.add_image').click(function() {

		valuefield = jQuery(this).siblings('.medias');  
        currentvalue = jQuery(this).siblings('.medias').val();
        preview = jQuery(this).siblings('.preview');
		
		image_items = jQuery(preview).find('li.media-image').size();
		
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');  
        window.send_to_editor = function(html) {
						
			jQuery(preview).append('<li class="media-image"><a id="image-remove"  class="media-remove button" href="#" rel="'+(image_items+1)+'">-</a> <span class="media-image"><img src=""></span></li>');
			currentpreview = jQuery(preview).find('li:last');
			
			imgurl = jQuery('img',html).attr('src');  
            classes = jQuery('img', html).attr('class');  
            id = classes.replace(/(.*?)wp-image-/, '');
			
			jQuery('span', currentpreview).html('<img src="'+imgurl+'">');
			//jQuery('a', currentpreview).attr('rel', '-'+id+',');
			jQuery(currentpreview).append('<textarea id="hidden-value">~~~image~~'+(image_items+1)+'~~'+id+'</textarea>');
			
			newvalue = currentvalue+'~~~image~~'+(image_items+1)+'~~'+id;
            valuefield.val(newvalue);  
            tb_remove();  
		}
		
	    return false;  
	});
	
	
	
	/*
	ADD MEDIA-VIDEO
	*/
	jQuery('.add_video').click(function() {

		valuefield = jQuery(this).siblings('.medias');  
        currentvalue = jQuery(this).siblings('.medias').val();
        preview = jQuery(this).siblings('.preview');
		
		video_items = jQuery(preview).find('li.media-video').size();
		
		jQuery(preview).append('<li class="media-video"><a id="video-remove" class="media-remove button" href="#" rel="'+(video_items+1)+'">-</a> <textarea id="video-code"></textarea></li>');
		currentpreview = jQuery(preview).find('li:last');
		
		jQuery(currentpreview).append('<textarea id="hidden-value">~~~video~~'+(video_items+1)+'~~</textarea>');
		
		newvalue = currentvalue+'~~~video~~'+(video_items+1)+'~~';
        valuefield.val(newvalue); 
		
	    return false;  
	});
	
	
	jQuery(".preview").on("change", 'textarea#video-code', function() {
		infos = jQuery(this).siblings('a');
		id = jQuery(infos).attr('rel');
		oldvalue = jQuery(this).siblings('textarea#hidden-value').val();
		
		// save new value
		newvalue = '~~~video~~'+id+'~~'+jQuery(this).val();
		jQuery(this).siblings('textarea#hidden-value').val(newvalue);
		
		fullval = jQuery(this).parent('li');
		fullval = jQuery(fullval).parent('ul');
		valuefield = jQuery(fullval).siblings('.medias');
		fullval = jQuery(fullval).siblings('.medias').val();
		
		
		replacevalue = fullval.replace(oldvalue, newvalue);
		jQuery(valuefield).val(replacevalue);
	});
	
	
	
	/*
	REMOVE VIDEO
	*/
	jQuery(".preview").on("click", '.media-remove', function() {  
        deletevalue = jQuery(this).siblings('textarea#hidden-value').val();
				
		li = jQuery(this).parent('li');
		ul = jQuery(li).parent('ul');
		valuefield = jQuery(ul).siblings('.medias');
		fullval = jQuery(valuefield).val();
		
		replacevalue = fullval.replace(deletevalue, '');
		jQuery(valuefield).val(replacevalue);
		
		jQuery(li).remove();
		
        return false;  
    }); 
		
  
}); 