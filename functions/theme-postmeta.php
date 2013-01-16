<?php

/*-----------------------------------------------------------------------------------

	Custom Post/Portfolio Meta boxes

-----------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------*/
/*	Add metaboxes
/*-----------------------------------------------------------------------------------*/

function add_meta_settings() {  
    #POST TYPE
	// add_meta_box(  
 //        'meta_settings', // $id  
 //        'Intro & Sidebar', // $title  
 //        'show_meta_settings', // $callback  
 //        'post', // $page  
 //        'normal', // $context  
 //        'high'); // $priority
	# PORTFOLIO TYPE
	add_meta_box(  
        'meta_settings', // $id  
        'Intro & Sidebar', // $title  
        'show_meta_settings', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority
}  
add_action('add_meta_boxes', 'add_meta_settings');

function add_meta_medias() {  
    add_meta_box(  
        'meta_medias', // $id  
        'Medias', // $title  
        'show_meta_medias', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
	
	 add_meta_box(  
        'meta_medias', // $id  
        'Medias', // $title  
        'show_meta_medias', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority
}  
add_action('add_meta_boxes', 'add_meta_medias');

function add_social_settings() {  
    add_meta_box(  
        'social_settings', // $id  
        'Social Settings', // $title  
        'show_social_settings', // $callback  
        'post', // $page  
        'side', // $context  
        'low'); // $priority 
	
	add_meta_box(  
        'social_settings', // $id  
        'Social Settings', // $title  
        'show_social_settings', // $callback  
        'portfolio', // $page  
        'side', // $context  
        'low'); // $priority 
}  
add_action('add_meta_boxes', 'add_social_settings');





/*-----------------------------------------------------------------------------------*/
/*	Define fields
/*-----------------------------------------------------------------------------------*/

$prefix = '_sr';  
$meta_settings = array(  
    array(  
        'label'=> 'Intro',  
        'desc'  => 'This intro appears in the preview',  
        'id'    => $prefix.'_intro',  
        'type'  => 'textarea'  
     ),
	array(  
        'label'=> 'Sidebar Text',  
        'desc'  => 'This Text appears on the sidebar above title and date.',  
        'id'    => $prefix.'_text',  
        'type'  => 'textarea'  
     )
 );


$prefix = '_sr';  
$meta_medias = array(  
	/*array(  
	    'label' => 'Featured Video',  
	    'desc'  => 'Choose a featured video. This will be shown on the preview (frontpage).',  
	    'id'    => $prefix.'_featuredvideo',  
	    'type'  => 'textarea'  
	),*/
	array(  
	    'label' => 'Medias',  
	    'desc'  => 'Add Images or Videos. <br />Images min 660px width',  
	    'id'    => $prefix.'_medias',  
	    'type'  => 'medias'  
	)
 );


$social_settings = array(  
	array(  
         'label'=> 'Show Comments amount',  
         'desc'  => 'Check, if you want to display the <b>Comments</b> amount.',  
         'id'    => $prefix.'_showcommentsamount',  
         'type'  => 'checkbox'  
     ),
	array(  
         'label'=> 'Show Views amount',  
         'desc'  => 'Check, if you want to display the <b>Views</b> amount.',  
         'id'    => $prefix.'_showviewsamount',  
         'type'  => 'checkbox'  
     ),
	array(  
         'label'=> 'Allow Likes',  
         'desc'  => 'Check this, if you want to enable the <b>Likes</b>.',  
         'id'    => $prefix.'_showlikesamount',  
         'type'  => 'checkbox'  
     ),
	array(  
         'label'=> 'Facebook',  
         'desc'  => 'Enable <strong>Facebook share</strong> for this post',  
         'id'    => $prefix.'_facebookshare',  
         'type'  => 'checkbox'  
     ),
	array(  
         'label'=> 'Twitter',  
         'desc'  => 'Enable visitors to <strong>tweet this</strong> post',  
         'id'    => $prefix.'_tweetthis',  
         'type'  => 'checkbox'  
     )/*,
	array(  
         'label'=> 'Google+',  
         'desc'  => 'Enable visitors to share with Google+',  
         'id'    => $prefix.'_googleplus',  
         'type'  => 'checkbox'  
     )*/
 );




/*-----------------------------------------------------------------------------------*/
/*	Callback Show fields
/*-----------------------------------------------------------------------------------*/

function show_meta_settings() {  
 	global $meta_settings, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_settings_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   
    // Begin the field table and loop  
    echo '<table class="form-table">';  
    foreach ($meta_settings as $field) {  
    	// get value of this field if it exists for this post  
    	$meta = get_post_meta($post->ID, $field['id'], true);  
    	// begin a table row with  
    	echo '<tr> 
    			<th><label for="'.$field['id'].'">'.$field['label'].'</label><br /><span class="sr_description">'.$field['desc'].'</span></th> 
    			<td>';  
    			switch($field['type']) {  
                    
					// input text
    				case 'text':  
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />';  
					break;
					
					// textarea
					case 'textarea':  
					    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>';  
					break;					
					 
                 } //end switch  
    	 echo '</td></tr>';  
	} // end foreach  
	echo '</table>'; // end table  
}  




function show_meta_medias() {  
 	global $meta_medias, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_medias_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   
    // Begin the field table and loop  
    echo '<table class="form-table">';  
    foreach ($meta_medias as $field) {  
    	// get value of this field if it exists for this post  
    	$meta = get_post_meta($post->ID, $field['id'], true);  
    	// begin a table row with  
    	echo '<tr> 
    			<th><label for="'.$field['id'].'">'.$field['label'].'</label><br /><span class="sr_description">'.$field['desc'].'</span></th> 
    			<td>';  
    			switch($field['type']) {  
                    
					// textarea
					case 'textarea':  
					    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>';  
					break;
					
					// image  
					case 'image':  
					    
					    if ($meta) { $image = wp_get_attachment_image_src($meta, 'medium'); $image = $image[0]; }  else { $image = ''; } 
					    echo    '	<input class="add_featured_image button" type="button" value="Add Featured Image" />
									<input name="'.$field['id'].'" type="hidden" class="image_val" value="'.$meta.'" /> 
					                <small> <a href="#" class="remove-image">Remove Image</a></small> <br />
									<img src="'.$image.'" class="preview_image" alt="" /><br /> 
					                    ';  
					break;
					
					
					// medias  
					case 'medias':  
						echo '<input class="add_image button" type="button" value="Add Image" /> 
								<input class="add_video button" type="button" value="Add Video" />
								<textarea name="'.$field['id'].'" style="display:none;" class="medias">'.$meta.'</textarea><br />
					            <ul id="sr_preview" class="preview">';
					    if ($meta) {
							$meta = substr($meta, 3);
							$meta = explode('~~~', $meta);
					        foreach($meta as $row) {
								$object = explode('~~', $row);
								$type = $object[0];
								$id = $object[1];
								$val = $object[2];
								if ($type == 'image') {
									$image = wp_get_attachment_image_src($val, 'medium'); $image = $image[0];
									//echo '<li><a class="image-remove button" href="#" rel="-'.$id.',">-</a> <span class="value"><img src="'.$image.'"></span></li>'; 
									echo '<li class="media-image"><a id="image-remove"  class="media-remove button" href="#" rel="'.$id.'">-</a> <span class="media-image"><img src="'.$image.'"></span><textarea id="hidden-value">~~~'.$row.'</textarea></li>';
								} else {
									echo '<li class="media-video"><a id="video-remove" class="media-remove button" href="#" rel="'.$id.'">-</a> <textarea id="video-code">'.$val.'</textarea><textarea id="hidden-value">~~~'.$row.'</textarea></li>';
								}
					        }  
					    }  
					    echo '</ul>';				
					break;
										
					 
                 } //end switch  
    	 echo '</td></tr>';  
	} // end foreach  
	echo '</table>'; // end table  
} 



function show_social_settings() {  
 	global $social_settings, $post;
	$prefix = 'sr';
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_social_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   
    // Begin the field table and loop  
    echo '<table class="form-table">';  
    foreach ($social_settings as $field) {  
    	// get value of this field if it exists for this post  
    	$meta = get_post_meta($post->ID, $field['id'], true);  
    	// begin a table row with  
    	echo '<tr> 
    			<th><label for="'.$field['id'].'">'.$field['label'].'</label><br /><span class="sr_description">'.$field['desc'].'</span></th> 
    			<td style="width: 100px;">';  
    			switch($field['type']) {  
                    
					// checkbox
					case 'checkbox':  
					    echo '<input type="hidden" name="'.$field['id'].'" id="'.$field['id'].'" value=""/>';
					    echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/><br />';
						if ($field['id'] == $prefix.'_showcommentsamount') { echo '<span class="sr_prev">('; echo comments_number('0', '1', '%').' Comments)</span>'; }
						if ($field['id'] == $prefix.'_showviewsamount') { echo '<span class="sr_prev">('.getPostViews(get_the_ID()).' Views)</span>'; }
					break;					
					 
                 } //end switch  
    	 echo '</td></tr>';  
	} // end foreach  
	echo '</table>'; // end table  
} 




/*-----------------------------------------------------------------------------------*/
/*	Save Datas
/*-----------------------------------------------------------------------------------*/

function save_meta_settings($post_id) {  
    global $meta_settings;  
  
    // verify nonce  
    if (!isset($_POST['meta_settings_nonce']) || !wp_verify_nonce($_POST['meta_settings_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($meta_settings as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'save_meta_settings');



function save_meta_medias($post_id) {  
    global $meta_medias;  
  
    // verify nonce  
    if (!isset($_POST['meta_medias_nonce']) || !wp_verify_nonce($_POST['meta_medias_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($meta_medias as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'save_meta_medias');



function save_social_settings($post_id) {  
    global $social_settings;  
  
    // verify nonce  
    if (!isset($_POST['meta_social_nonce']) || !wp_verify_nonce($_POST['meta_social_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($social_settings as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
		if (isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];  
			if ($new && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			} 
		}
    } // end foreach  
}  
add_action('save_post', 'save_social_settings');




/*-----------------------------------------------------------------------------------*/
/*	Register and load function javascript
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'sr_admin_meta_js' ) ) {
    function sr_admin_meta_js($hook) {
		wp_register_script('functions-script', get_template_directory_uri() . '/functions/js/functions_script.js', 'jquery');
		wp_enqueue_script('functions-script');
		
		wp_register_style('functions-style', get_template_directory_uri() . '/functions/css/functions.css');
		wp_enqueue_style('functions-style');
    }
    
    add_action('admin_enqueue_scripts','sr_admin_meta_js',10,1);
}


?>