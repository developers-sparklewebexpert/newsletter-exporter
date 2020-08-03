<?php 
  register_setting("header","bgm_head_set_opt");
	register_setting("footer","bgm_foot_set_opt");
	register_setting("color","bgm_color_set_opt");
	register_setting("social","bgm_social_set_opt");
	register_setting("advanced","bgm_advanced_opt");
	
   add_settings_section(
	'header',
	'<h1>'.__('Email Template Header Options','bgm').'</h1>',
	'header_callback', 
	'header');
   add_settings_field(
	'header_logo', 
	__('Upload Template Header logo','bgm'),
	'header_logo_callback',
	'header',
	'header');
	
	//footer
	
	add_settings_section(
	'footer',
	'<h1>'.__('Email Template Footer Options','bgm').'</h1>',
	'footer_callback', 
	'footer');
	add_settings_field(
	'header_logo', 
	__('Upload Template Footer logo','bgm'),
	'footer_logo_callback',
	'footer',
	'footer');
    add_settings_field(
	'copyright', 
	__('Please Write copyright and footer text','bgm'),
	'footer_copyright_callback',
	'footer',
	'footer');
	//section Social
	add_settings_section(
	'social',
	'<h1>'.__('Social Network Options','bgm').'</h1>',
	'social_callback', 
	'social');
	add_settings_field(
	'social_icon', 
	__('Select Social Media Website.','bgm'),
	'social_media_callback',
	'social',
	'social');
	//section Advanced
	add_settings_section(
	'advanced',
	'<h1>'.__('Advanced Options','bgm').'</h1>',
	'advanced_callback', 
	'advanced');
	add_settings_field(
	'excerpt_length', 
	__('Enter Expert Content Length.','bgm'),
	'excerpt_size_callback',
	'advanced',
	'advanced');

        add_settings_field(
	'schedule_email_sendor', 
	__('Enter Email for Newsletter Scheduled Alert .','bgm'),
	'schedule_email_sendor_callback',
	'advanced',
	'advanced');
	//section color
	add_settings_section(
	'color',
	'<h1>'.__('Color Options','bgm').'</h1>',
	'color_callback', 
	'color');
	add_settings_field(
	'color_tem_bg', 
	__('Template Background Color:','bgm'),
	'template_bg_color',
	'color',
	'color');
        add_settings_field(
	'color_body_bg', 
	__('Template Body Background Color:','bgm'),
	'body_bg_color',
	'color',
	'color');
        add_settings_field(
	'color_spacer_bg', 
	__('Content break Spacer Color:','bgm'),
	'spacer_bg_color',
	'color',
	'color');
	add_settings_field(
	'color_header_bg', 
	__('Header Background Color:','bgm'),
	'header_bg_color',
	'color',
	'color');
	add_settings_field(
	'color_header_text', 
	__('Header Text Color:','bgm'),
	'header_text_color',
	'color',
	'color');
	add_settings_field(
	'color_header_link', 
	__('Header Link Color:','bgm'),
	'header_link_color',
	'color',
	'color');
	 add_settings_field(
	'color_header_af_bg', 
	__('Header After content Background Color:','bgm'),
	'af_head_bg_color',
	'color',
	'color');
	add_settings_field(
	'color_header_af_text', 
	__('Header After content Text Color:','bgm'),
	'af_head_text_color',
	'color',
	'color');
	add_settings_field(
	'color_header_af_link', 
	__('Header After Title Color:','bgm'),
	'af_head_link_color',
	'color',
	'color');
	add_settings_field(
	'color_post_body', 
	__('Email Single Article Background Color:','bgm'),
	'single_article_bg_color',
	'color',
	'color');
	add_settings_field(
	'color_post_text', 
	__('Email Single Article Text Color:','bgm'),
	'single_article_text_color',
	'color',
	'color');
	add_settings_field(
	'color_post_link', 
	__('Email Single Article Link Color:','bgm'),
	'single_article_link_color',
	'color',
	'color');
	/*add_settings_field(
	'color_post_readmore_link', 
	__('Email Single Article Read More Link Color:','bgm'),
	'single_article_readmore_link_color',
	'color',
	'color');*/
	add_settings_field(
	'color_post_readmore_bg', 
	__('Email Single Article Read More Background Color:','bgm'),
	'single_article_readmore_bg_color',
	'color',
	'color');
	add_settings_field(
	'color_post_readmore_border', 
	__('Email Single Article Read More border Color:','bgm'),
	'single_article_readmore_border_color',
	'color',
	'color');
	add_settings_field(
	'color_post_readmore_text', 
	__('Email Single Article Read More Text Color:','bgm'),
	'single_article_readmore_text_color',
	'color',
	'color');
	 add_settings_field(
	'after_body_bg', 
	__('After Body Content Backgound Color:','bgm'),
	'after_body_content_bg_color',
	'color',
	'color');
	add_settings_field(
	'after_body_text', 
	__('After Body Content Text Color:','bgm'),
	'after_body_content_text_color',
	'color',
	'color');
	/*add_settings_field(
	'after_body_link', 
	__('After Body Content Link Color:','bgm'),
	'after_body_content_link_color',
	'color',
	'color');*/
	add_settings_field(
	'logo_social_bg_color', 
	__('Logo and Social Media Section Background Color:','bgm'),
	'logo_social_bg_color',
	'color',
	'color');
	add_settings_field(
	'logo_social_text_color', 
	__('Logo and Social Media Section Text Color:','bgm'),
	'logo_social_text_color',
	'color',
	'color');
	add_settings_field(
	'copyright_bg_color', 
	__('Copyright Box Background Color:','bgm'),
	'copyright_bg_color',
	'color',
	'color');
	add_settings_field(
	'copyright_text_color', 
	__('Copyright Text Color:','bgm'),
	'copyright_text_color',
	'color',
	'color');
	add_settings_field(
	'copyright_link_color', 
	__('Copyright Link Color:','bgm'),
	'copyright_link_color',
	'color',
	'color');
	/*add_settings_field(
	'footer_bg_color', 
	__('Footer Background Color:','bgm'),
	'footer_bg_color',
	'color',
	'color');
	add_settings_field(
	'footer_text_color', 
	__('Footer Text Color:','bgm'),
	'footer_text_color',
	'color',
	'color');
	add_settings_field(
	'footer_link_color', 
	__('Footer Link Color:','bgm'),
	'footer_link_color',
	'color',
	'color');*/
     function color_callback(){ 
	echo __( '', 'bgm' );
	}
	function header_callback(){ 
	echo __( '', 'bgm' );
	}
	 function header_logo_callback(){
    $bgm_options = get_option( 'bgm_head_set_opt' );		
	echo '<p><input id="bgm_header_logo" type="text" name="bgm_head_set_opt[header_logo]" value="'.$bgm_options['header_logo'].'" style="width:80%;"/><span><input type="button" class="bgm_upload" data-target="#bgm_header_logo" value="'.__('Upload','bgm').'"/></span></p><p><b><small>You can Directly paste Url of image or Upload by upload button</small></b></p>';
	}
	 function footer_callback(){ 
	echo __( '', 'bgm' );
	}
	 function footer_logo_callback(){
    $bgm_options = get_option( 'bgm_foot_set_opt' );		
	echo '<p><input id="bgm_footer_logo" type="text" name="bgm_foot_set_opt[footer_logo]" value="'.$bgm_options['footer_logo'].'" style="width:80%;"/><span><input type="button" class="bgm_upload" data-target="#bgm_footer_logo" value="'.__('Upload','bgm').'"/></span></p><p><b><small>You can Directly paste Url of image or Upload by upload button</small></b></p>';
	}
	 function footer_copyright_callback(){
    $bgm_options = get_option( 'bgm_foot_set_opt' );		
	echo wp_editor( $bgm_options['copyright'], 'copyright', array('textarea_name' => 'bgm_foot_set_opt[copyright]',
	'textarea_rows'=>'5'));
	}
	 function social_callback(){ 
	echo __( '', 'bgm' );
	}
	 function social_media_callback(){
    $social_options = get_option( 'bgm_social_set_opt' );		
	echo '<select id="setting_social_select" >
	<option data-id="facebook"> Facebook </option>
	<option data-id="twitter"> Twitter </option>
	<option data-id="linkedin"> LinkedIn </option>
	<option data-id="google-plus"> Google+ </option>
	<option data-id="youtube"> YouTube </option>
	<option data-id="pinterest"> Pinterest </option>
	<option data-id="instagram"> Instagram </option>
	<option data-id="tumblr"> Tumblr </option>
	<option data-id="flickr"> Flickr </option>
	<option data-id="reddit"> Reddit </option>
	<option data-id="whatsapp"> WhatsApp </option>
	<option data-id="quora"> Quora </option>
	</select>';
	echo'<div class="social-link setting-social-selected clearfix"><p>Select Social Media From above dropdown and enter page url in box .</p><div class="social-link-sortable">';
	if(!empty($social_options)):
	foreach($social_options as $key=>$social){
	echo'<p id="'.$key.'"><label for="bgm_social_set_opt['.$key.']"><i width="80px" class="fa fa-'.$key.'"></i></label><input type="text" name="bgm_social_set_opt['.$key.']" value="'.$social.'" style="width:60%;"><i style="faont-sixe:22px;"class="fa fa-arrows"></i><span class="remove-social-icon" data-id="#'.$key.'">&times;</span></p>';
	}
	endif;
	echo'</div></div>'; 
	}
	
	function advanced_callback(){ 
	echo __( '', 'bgm' );
	}
	function excerpt_size_callback(){
		$excerpt_option = get_option('bgm_advanced_opt' );
		if(!empty($excerpt_option)&& array_key_exists('excerpt_size',$excerpt_option)){$bgm_excerpt=$excerpt_option['excerpt_size'];}else{$bgm_excerpt='';}
		echo '<div class="bgm-excerpt-size">';
		echo'<input type="number" min="20" max="100" placeholder="No of Words." width="100%" name="bgm_advanced_opt[excerpt_size]" value="'.$bgm_excerpt.'">';
                echo'<label for="bgm_advanced_opt[excerpt_size]">  Excerpt Length of post in template(Length in No. of words)</label>';
		echo'</div>';
	}
function schedule_email_sendor_callback(){
		$schedule_email_sendor = get_option('bgm_advanced_opt' );
		if(!empty($schedule_email_sendor)&& array_key_exists('schedule_email_sendor',$schedule_email_sendor)){$bgm_schedule_email_sendor=$schedule_email_sendor['schedule_email_sendor'];}else{$bgm_schedule_email_sendor='';}
		echo '<div class="bgm-schedule_email_sendor">';
		
		echo'<input type="email" placeholder="Enter Email" width="100%" name="bgm_advanced_opt[schedule_email_sendor]" value="'.$bgm_schedule_email_sendor.'">';
               echo'<label for="bgm_advanced_opt[schedule_email_sendor]">  Newsletter Schedule Alert</label>';
		echo'</div>';
	}

	
	 function template_bg_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
     if(!empty($col_options)&& array_key_exists('color_tem_bg',$col_options)){$value=$col_options['color_tem_bg'];}
    else{$value='';}	
	echo '<p><input id="color_tem_bg" type="text" name="bgm_color_set_opt[color_tem_bg]" value="'.$value.'"  class="bgm-color-picker" />';
	}
       function body_bg_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
     if(!empty($col_options)&& array_key_exists('color_body_bg',$col_options)){$value=$col_options['color_body_bg'];}
    else{$value='';}	
	echo '<p><input id="color_body_bg" type="text" name="bgm_color_set_opt[color_body_bg]" value="'.$value.'"  class="bgm-color-picker" />';
	}
     function spacer_bg_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
     if(!empty($col_options)&& array_key_exists('color_spacer_bg',$col_options)){$value=$col_options['color_spacer_bg'];}
    else{$value='';}	
	echo '<p><input id="color_spacer_bg" type="text" name="bgm_color_set_opt[color_spacer_bg]" value="'.$value.'"  class="bgm-color-picker" />';
	}
  
	 function header_bg_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
    if(!empty($col_options)&& array_key_exists('color_header_bg',$col_options)){$value=$col_options['color_header_bg'];}
    else{$value='';}	
	echo '<p><input id="color_header_bg" type="text" name="bgm_color_set_opt[color_header_bg]" value="'.$value.'" class="bgm-color-picker"/>';
	}
	function header_text_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
    if(!empty($col_options)&& array_key_exists('color_header_text',$col_options)){$value=$col_options['color_header_text'];}
    else{$value='';}		
	echo '<p><input id="color_header_text" type="text" name="bgm_color_set_opt[color_header_text]" value="'.$value.'" class="bgm-color-picker" />';
	}
	function header_link_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
    if(!empty($col_options)&& array_key_exists('color_header_link',$col_options)){$value=$col_options['color_header_link'];}
    else{$value='';}	
	echo '<p><input id="color_header_link" type="text" name="bgm_color_set_opt[color_header_link]" value="'.$value.'" class="bgm-color-picker"/>';
	}
	function af_head_bg_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
    if(!empty($col_options)&& array_key_exists('color_header_af_bg',$col_options)){$value=$col_options['color_header_af_bg'];}
    else{$value='';}		
	echo '<p><input id="color_header_af_bg" type="text" name="bgm_color_set_opt[color_header_af_bg]" value="'.$value.'" class="bgm-color-picker"/>';
	}
	function af_head_text_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('color_header_af_text',$col_options)){$value=$col_options['color_header_af_text'];}
    else{$value='';}	
	echo '<p><input id="color_header_af_text" type="text" name="bgm_color_set_opt[color_header_af_text]" value="'.$value.'" class="bgm-color-picker"/>';
	}
	function af_head_link_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
    if(!empty($col_options)&& array_key_exists('color_header_af_link',$col_options)){$value=$col_options['color_header_af_link'];}
    else{$value='';}		
	echo '<p><input id="color_header_af_link" type="text" name="bgm_color_set_opt[color_header_af_link]" value="'.$value.'" class="bgm-color-picker"/>';
	}
	function single_article_bg_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('color_post_body',$col_options)){$value=$col_options['color_post_body'];}
    else{$value='';}		
	echo '<p><input id="color_post_body" type="text" name="bgm_color_set_opt[color_post_body]" value="'.$value.'" class="bgm-color-picker" />';
	}
	function single_article_text_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('color_post_text',$col_options)){$value=$col_options['color_post_text'];}
    else{$value='';}		
	echo '<p><input id="color_post_text" type="text" name="bgm_color_set_opt[color_post_text]" value="'.$value.'" class="bgm-color-picker" />';
	}
	function single_article_link_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
     if(!empty($col_options)&& array_key_exists('color_post_link',$col_options)){$value=$col_options['color_post_link'];}
    else{$value='';}	
	echo '<p><input id="color_post_link" type="text" name="bgm_color_set_opt[color_post_link]" value="'.$value.'" class="bgm-color-picker" />';
	}
	function single_article_readmore_bg_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('color_post_readmore_link',$col_options))   {$value=$col_options['color_post_readmore_link'];}
 else{$value='';}	
	echo '<p><input id="color_post_readmore_link" type="text" name="bgm_color_set_opt[color_post_readmore_link]" value="'.$value.'" class="bgm-color-picker" />';
	}
	function single_article_readmore_border_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
   if(!empty($col_options)&& array_key_exists('color_post_readmore_bg',$col_options)){$value=$col_options['color_post_readmore_bg'];}
   else{$value='';}		
	echo '<p><input id="color_post_readmore_bg" type="text" name="bgm_color_set_opt[color_post_readmore_bg]" value="'.$value.'" class="bgm-color-picker" />';
	}
	function single_article_readmore_text_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('color_post_readmore_border',$col_options))
  {$value=$col_options['color_post_readmore_border'];}
    else{$value='';}
	echo '<p><input id="color_post_readmore_border" type="text" name="bgm_color_set_opt[color_post_readmore_border]" value="'.$value.'" class="bgm-color-picker"/>';
	}
	function single_article_readmore_link_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('color_post_readmore_text',$col_options))
   {$value=$col_options['color_post_readmore_text'];}
    else{$value='';}	
	echo '<p><input id="color_post_readmore_text" type="text" name="bgm_color_set_opt[color_post_readmore_text]" value="'.$value.'" class="bgm-color-picker" />';
	}
	function after_body_content_bg_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('after_body_bg',$col_options)){$value=$col_options['after_body_bg'];} 
     else{$value='';}	
	echo '<p><input id="after_body_bg" type="text" name="bgm_color_set_opt[after_body_bg]" value="'.$value.'" class="bgm-color-picker"/>';
	}
	function after_body_content_text_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
    if(!empty($col_options)&& array_key_exists('after_body_text',$col_options)){$value=$col_options['after_body_text'];}
    else{$value='';}	
	echo '<p><input id="after_body_text" type="text" name="bgm_color_set_opt[after_body_text]" value="'.$value.'" class="bgm-color-picker"/>';
	}
	function after_body_content_link_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('after_body_link',$col_options)){$value=$col_options['after_body_link'];}	
     else{$value='';}
	echo '<p><input id="after_body_link" type="text" name="bgm_color_set_opt[after_body_link]" value="'.$value.'" class="bgm-color-picker"/>';
	}
	function logo_social_bg_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
    if(!empty($col_options)&& array_key_exists('logo_social_bg_color',$col_options)){$value=$col_options['logo_social_bg_color'];}
   else{$value='';}	
	echo '<p><input id="logo_social_bg_color" type="text" name="bgm_color_set_opt[logo_social_bg_color]" value="'.$value.'" class="bgm-color-picker"/>';
	}
	function logo_social_text_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
    if(!empty($col_options)&& array_key_exists('logo_social_text_color',$col_options))
    {$value=$col_options['logo_social_text_color'];}	
     else{$value='';}
	echo '<p><input id="logo_social_text_color" type="text" name="bgm_color_set_opt[logo_social_text_color]" value="'.$value.'" class="bgm-color-picker" />';
	}
	function copyright_bg_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('copyright_bg_color',$col_options)){$value=$col_options['copyright_bg_color'];}	
     else{$value='';}
	echo '<p><input id="copyright_bg_color" type="text" name="bgm_color_set_opt[copyright_bg_color]"  class="bgm-color-picker"/>';
	}
	function copyright_text_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('copyright_text_color',$col_options))
    {$value=$col_options['copyright_text_color'];}	
     else{$value='';}
	echo '<p><input id="copyright_text_color" type="text" name="bgm_color_set_opt[copyright_text_color]" value="'.$value.'" class="bgm-color-picker" />';
	}
	function copyright_link_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('copyright_link_color',$col_options))
    {$value=$col_options['copyright_link_color'];}	
     else{$value='';}
	echo '<p><input id="copyright_link_color" type="text" name="bgm_color_set_opt[copyright_link_color]" value="'.$value.'" class="bgm-color-picker" />';
	}
	function footer_bg_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
    if(!empty($col_options)&& array_key_exists('footer_bg_color',$col_options)){$value=$col_options['footer_bg_color'];}	
     else{$value='';}
	echo '<p><input id="footer_bg_color" type="text" name="bgm_color_set_opt[footer_bg_color]"  class="bgm-color-picker"/>';
	}
	function footer_text_color(){
    $col_options = get_option( 'bgm_color_set_opt' );	
    if(!empty($col_options)&& array_key_exists('footer_text_color',$col_options)){$value=$col_options['footer_text_color'];}	
     else{$value='';}
	echo '<p><input id="footer_text_color" type="text" name="bgm_color_set_opt[footer_text_color]" value="'.$value.'" class="bgm-color-picker"/>';
	}
	function footer_link_color(){
    $col_options = get_option( 'bgm_color_set_opt' );
    if(!empty($col_options)&& array_key_exists('footer_link_color',$col_options)){$value=$col_options['footer_link_color'];}	
     else{$value='';}
	echo '<p><input id="footer_link_color" type="text" name="bgm_color_set_opt[footer_link_color]" value="'.$value.'" class="bgm-color-picker"/>';
	}