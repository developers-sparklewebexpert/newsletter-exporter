jQuery(document).ready(function(){
jQuery('.ajaxnone-sel-post').live('click',function(){
if(jQuery(this).hasClass('selected')){alert('Already Selected'); return false;}

	jQuery(this).addClass('selected');
	var postdata=jQuery(this).html();
	var postid=jQuery(this).attr('data-id');
        if(jQuery('.post-selected >p[data-id="'+postid+'"]').length){alert('Already Selected'); return false;}
	var ptitle=jQuery(this).children('p').children('.title').html();
	
    jQuery('#sortable').append('<li class=" post post-selected ui-state-default widefat  striped " data-id="'+postid+'"><p data-id="'+postid+'"><a href="javascript:void(0)"class="title">'+ptitle+'</a><span data-id="'+postid+'" class="cloase ">&times;</span> <span class="fa fa-arrows "></span></p></li>');
	//jQuery('html,body').animate({scrollTop:0},500);
	
	jQuery(this).children('p').children('span').attr('class','fa fa-check ');
	});
	
	jQuery('#sortable .post .cloase').live('click',function(){
		var did=jQuery(this).attr('data-id');
		jQuery('#sortable li[data-id="'+did+'"]').remove();
		jQuery('li[data-id="'+did+'"]').removeClass('selected');
		jQuery('#non-sortable span[data-id="'+did+'"]').attr('class','fa fa-long-arrow-right');
	});
}); 

    jQuery(function() {
        jQuery( "#sortable" ).sortable({ 
            placeholder: "ui-sortable-placeholder" 
        });
		
    });
  jQuery(document).ready(function(){
	  jQuery('#getEmailPreview').on('click',function(){
		  if(jQuery('#sortable li').length<1){alert('No Post Items found in selected area. Please Add some post items.');return false;}
		  var pid='';var sid=''; var pstr='';
	  jQuery('#sortable li').each(function(){
		sid=jQuery(this).attr('data-id');
		pid=pid+','+sid;	
	  });
     if (pid.substring(0, 1) == ',') {	  
		 pstr = pid.substring(1);}
     else{
		 pstr = pid;
	 }	
      jQuery('.newsletter-export-wrap').css('opacity','0.3');
      jQuery('body').prepend('<div class="bgm-loader" style="text-align:center;"><p style="text-align:center;"><img alt="Newsletter Logo" src="'+ajax_posts.bgm_logo+'"/><br/><img src="/wp-admin/images/wpspin_light.gif"/></p><p style="text-align:center">Loading...</p></div>');
	  var layout= jQuery('select[name="layout"]').attr('value');
	  var posttype=jQuery('input[name="p_type"]').attr('value');
	  var em_tit=jQuery('#email-title').attr('value');
      if (jQuery('#email_preview').is(":checked")){
    var email_preview=1;}else{var email_preview=0;}
      
	 // var after_head=jQuery('#bg_content_after_title').val();
      if (jQuery("#wp-bg_content_after_title-wrap").hasClass("tmce-active")){
      var after_head=tinyMCE.activeEditor.getContent();
    }else{
      var after_head=jQuery('#bg_content_after_title').val();
    }
	 // var after_foot=jQuery('#bg_email_after_title_content').val();
        if (jQuery("#wp-bg_email_after_title_content-wrap").hasClass("tmce-active")){
      var after_foot=tinyMCE.activeEditor.getContent();
    }else{
      var after_foot=jQuery('#bg_email_after_title_content').val();
    }
      if (jQuery("#wp-bg_content_infographics-wrap").hasClass("tmce-active")){
      var infographics=tinyMCE.activeEditor.getContent();
    }else{
      var infographics=jQuery('#bg_content_infographics').val();
    }
   var sdate=jQuery('#schdate').val();
      
	  jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: {'p_id':pstr,
		           'p_type':posttype,
		           'layout':layout,
			         'etitle':em_tit,
               'sdate':sdate,
			         'after_head':after_head,
			         'before_foot':after_foot,
               'info':infographics,
               'email_preview':email_preview,
		          'action':'ajax_email_temp_prew',
			  },
		complete : function ( response ) {   
		
                        }, 
        success: function(data){
		jQuery('body').append('<div class="preview-modal"><div class="preview-modal-inner"><div class="preview-close"><button type="button">&times;</button></div><div class="preview-inner">'+data+'</div></div></div>');
		jQuery('body').css('overflow','hidden');
		//jQuery('html,body').animate({scrollTop:0},500);
        	jQuery('.bgm-loader').remove();	
          jQuery('#email_preview').removeAttr('checked');
          jQuery('.newsletter-export-wrap').css('opacity','1');
            },
        error : function(jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

});
});

//framecode

	jQuery('#getEmailCode').on('click',function(){
		if(jQuery('#sortable li').length<1){alert('No Post Items found in selected area. Please Add some post items');return false;}
    jQuery('.newsletter-export-wrap').css('opacity','0.2');
    jQuery('body').prepend('<div class="bgm-loader" style="text-align:center;"><p style="text-align:center;"><img alt="Newsletter Logo" src="'+ajax_posts.bgm_logo+'"/><br/><img src="/wp-admin/images/wpspin_light.gif"/></p><p style="text-align:center;">Loading...</p></div>');
		var pid='';var sid=''; var pstr='';
		jQuery('#sortable li').each(function(){
			sid=jQuery(this).attr('data-id');
			pid=pid+','+sid;	
		});
		if (pid.substring(0, 1) == ',') {	  
			pstr = pid.substring(1);}
		else{
			pstr = pid;
		}	 
		var layout= jQuery('select[name="layout"]').attr('value');
		var posttype=jQuery('input[name="p_type"]').attr('value');
		var em_tit=jQuery('#email-title').attr('value');
		//var after_head=jQuery('#bg_content_after_title').attr('value');
		//var after_foot=jQuery('#bg_email_after_title_content').attr('value');
	         if (jQuery("#wp-bg_content_after_title-wrap").hasClass("tmce-active")){
      var after_head=tinyMCE.activeEditor.getContent();
    }else{
      var after_head=jQuery('#bg_content_after_title').val();
    }
	 // var after_foot=jQuery('#bg_email_after_title_content').val();
        if (jQuery("#wp-bg_email_after_title_content-wrap").hasClass("tmce-active")){
      var after_foot=tinyMCE.activeEditor.getContent();
    }else{
      var after_foot=jQuery('#bg_email_after_title_content').val();
    }
      if (jQuery("#wp-bg_content_infographics-wrap").hasClass("tmce-active")){
      var infographics=tinyMCE.activeEditor.getContent();
    }else{
      var infographics=jQuery('#bg_content_infographics').val();
    }
    var sdate=jQuery('#schdate').val();
     
		jQuery.ajax({
			type: "POST",
			dataType: "html",
			url: ajax_posts.ajaxurl,
			data: {'p_id':pstr,
					'p_type':posttype,
					'layout':layout,
					'etitle':em_tit,
          'sdate':sdate,
					'after_head':after_head,
					'before_foot':after_foot,
          'info':infographics,
					'action':'ajax_email_temp_prew',
			},
			complete : function ( response ) { }, 
			success: function(data){
				jQuery('body').append('<div class="emailCodeModal" id="emailCodeModal"><!--button  id="codeTexrtCopy" type="button">Copy</button--><div class="emailcModal-close"><button type="button">&times;</button></div><div class="emailCodeModal-inner"><p style="color:#000;text-align:center;">Press <strong>F11</strong> when cursor is in the editor to toggle full screen editing. <strong>Esc</strong> can also be used to <i>exit</i> full screen editing.</p><textarea id="emailCodeModal-code">'+data+'</textarea></div></div>');
    
       jQuery('.bgm-loader').remove();	
        jQuery('.newsletter-export-wrap').css('opacity','1');
             var bgm_editor = CodeMirror.fromTextArea(document.getElementById("emailCodeModal-code"), {
      lineNumbers: true,
      theme: "night",
      mode: "text/html",
      matchBrackets: true,
      lineWrapping: true,
      extraKeys: {
        "F11": function(cm) {
          cm.setOption("fullScreen", !cm.getOption("fullScreen"));
        },
        "Esc": function(cm) {
          if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
        },
      "Alt-F": "findPersistent"
      }
    });
			},
			error : function(jqXHR, textStatus, errorThrown) {
				alert(textStatus);
			}

		});
	});
    
 /* jQuery('#codeTexrtCopy').live('click',function(){
jQuery('#emailCodeModal-code').focus();
 jQuery('#emailCodeModal-code').select();
  //document.execCommand('copy');
    bgm_editor.getValue().execCommand('copy');
   // window.prompt('Press ctrl/cmd+c to copy text');
   document.getSelection().removeAllRanges();
});
    
*/    
	jQuery('.preview-close').live('click',function(){
		jQuery('.preview-modal').remove();
		jQuery('body').css('overflow','');
	});
	jQuery('.emailcModal-close').live('click',function(){
		jQuery('.emailCodeModal').remove();
	});
    var media_uploader = null;
    jQuery('.bgm_upload').click(function() {
		var target=jQuery(this).attr('data-target');
        media_uploader = wp.media({
            title:'Upload Image',
            button: {text: 'Upload'},
			multiple:'false'
        });
	    media_uploader.on("select", function(){
			var json = media_uploader.state().get("selection").first().toJSON();
				var image_url = json.url;
				var image_caption = json.caption;
				var image_title = json.title;
				jQuery(target).attr("value",image_url);
		});
		media_uploader.open();
	});


jQuery('#setting_social_select option').on('click',function(){
	var icon=jQuery(this).attr('data-id');
	if(jQuery('.social-link-sortable #'+icon).length){ alert('Already selected by you.');return false;
  }
  else
  {
	jQuery('.social-link-sortable').append('<p id="'+icon+'"><label for="bgm_social_set_opt['+icon+']"><i width="80px" class="fa fa-'+icon+'"></i></label><input type="text" name="bgm_social_set_opt['+icon+']" style="width:60%;"><i style="faont-sixe:22px;"class="fa fa-arrows"></i><span class="remove-social-icon" data-id="#'+icon+'">&times;</span></p>');
  }	
});
jQuery('.remove-social-icon').live('click',function(){
	var itarget=jQuery(this).attr('data-id');
	jQuery(itarget).remove();
});

 
});
jQuery(function() {
        jQuery( ".social-link-sortable" ).sortable({ 
            placeholder: "ui-sortable-placeholder" 
        });
		
    });
jQuery(document).ready(function(){
 jQuery('#post_req_ajax_submit').on('click',function(){
   jQuery('.newsletter-export-wrap').css('opacity','0.2');
   jQuery('body').prepend('<div class="bgm-loader" style="text-align:center;"><p style="text-align:center;"><img alt="Newsletter Logo" src="'+ajax_posts.bgm_logo+'"/><br/><img src="/wp-admin/images/wpspin_light.gif"/></p><p style="text-align:center;">Loading...</p></div>');
 var ptype=jQuery('.req-header-inner #bgm_post_type').val();
 var pstatus=jQuery('.req-header-inner #bgm_poststauts').val();

 var from=jQuery('.req-header-inner #bgm_fromday').val();
 var to=jQuery('.req-header-inner #bgm_to_day').val();	
var showposts=jQuery('.req-header-inner #bgm_showposts').val();	
jQuery('.ajax-filter-post').addClass('ajax-loading');
 
	  jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: {'post_type':ptype, 'pstatus':pstatus,'showposts':showposts,'from':from,'to':to,'action':'bgm_all_filter_post'}, 
        success: function(data){
          jQuery('.newsletter-export-wrap').css('opacity','1');
		jQuery('.ajax-filter-post').html(data);
                jQuery('.ajax-filter-post').removeClass('ajax-loading');
          jQuery('.bgm-loader').remove();
                jQuery('.ajax-filter-post .ajaxnone-sel-post p').each(function(){
                 var sl_id=  jQuery(this).attr('data-id');
                 if(jQuery('.post-selected >p[data-id="'+sl_id+'"]').length){jQuery(this).parent('li').addClass('selected');
                jQuery(this).children('span').attr('class','fa fa-check ');
                    }
        	
                 });
                
            },
        error : function(jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }

});

});

jQuery('[data-toggle="bgm_modal"]').on('click',function(){var bgm_m_target=jQuery(this).attr('data-target');jQuery(bgm_m_target).addClass('active');});
jQuery('[data-dismiss="bgm_modal"]').on('click',function(){var bgm_m_target=jQuery(this).attr('data-target');jQuery(bgm_m_target).removeClass('active');});
});


                function bgm_getCalendar(target_div,year,month){
                  jQuery('.newsletter-export-wrap').css('opacity','0.2');
			jQuery.ajax({
				type:'POST',dataType: "html",
				url:ajax_posts.ajaxurl,
				data:'action=bgm_getCalender&year='+year+'&month='+month,
				success:function(data){
          jQuery('.newsletter-export-wrap').css('opacity','1');
					jQuery('#'+target_div).html(data);
				}
			});
		}
		
                function bgm_addSchedule(date){
                  jQuery('.newsletter-export-wrap').css('opacity','0.2');
			jQuery.ajax({
				type:'POST',dataType: "html",
				url:ajax_posts.ajaxurl,
				data:'action=bgm_addSchedule&date='+date,
				success:function(data){
          jQuery('.newsletter-export-wrap').css('opacity','1');
					jQuery('#event_list').html(data);
                                        //jQuery('date_popup_'+date).html('<div class="date_window"><div class="popup_event">Scheduled <br><a date="'+date+'" class="scheduleDelete" href="javascript:void(0)">Delete</a></div></div>');
                                        jQuery('.date_cell[date="'+date+'"]').addClass('active');
					jQuery('#event_list').slideDown('slow');
				}
			});
		}
                function bgm_deleteSchedule(date){
                  jQuery('.newsletter-export-wrap').css('opacity','0.2');
			jQuery.ajax({
				type:'POST',dataType: "html",
				url:ajax_posts.ajaxurl,
				data:'action=bgm_deleteSchedule&date='+date,
				success:function(data){
          jQuery('.newsletter-export-wrap').css('opacity','1');
					jQuery('#event_list').html(data);
                                       // jQuery('date_popup_'+date).html('<div class="date_window"><div class="popup_event"><a date="'+date+'" class="scheduleAdd" href="javascript:void(0)">Add Schedule</a></div></div>');
                                        jQuery('.date_cell[date="'+date+'"]').removeClass('active');
					jQuery('#event_list').slideDown('slow');
				}
			});
		}

                  


		jQuery(document).ready(function(){
			jQuery('.scheduleAdd').live('click',function(){
				date = jQuery(this).attr('date');
			        bgm_addSchedule(date);
                                jQuery(this).parent('.popup_event').html('<div class="popup_event">Scheduled <br><a date="'+date+'" class="scheduleDelete" href="javascript:void(0)">Delete</a></div>');
			});
                        jQuery('.scheduleDelete').live('click',function(){
				date = jQuery(this).attr('date');
			        bgm_deleteSchedule(date);
                                jQuery(this).parent('.popup_event').html('<div class="popup_event"><a date="'+date+'" class="scheduleAdd" href="javascript:void(0)">Add Schedule</a></div>');
			});
			
			jQuery('.month_dropdown').live('change',function(){
				bgm_getCalendar('calendar_div',jQuery('.year_dropdown').val(),jQuery('.month_dropdown').val());
			});
			jQuery('.year_dropdown').live('change',function(){
				bgm_getCalendar('calendar_div',jQuery('.year_dropdown').val(),jQuery('.month_dropdown').val());
			});
			jQuery(document).click(function(){
				jQuery('#event_list').slideUp('slow');
			});
		});
