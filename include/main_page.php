<?php
/* 
  Main page of Newsletter where all action will be done.
*/
?>
<div class="wrap newsletter-export-wrap">
<h1><?php echo __('Newsletter Export','bgm');?></h1>
<div class="request_post">
	<div class="req-header-inner">
	<form action="" method="POST" >
		<table class="wp-list-table widefat fixed striped" width="100%">
			<thead><tr>
				<th class="manage-column" scope="col" width="15%"><?php echo __('Post Type:','bgm');?></th>
                                <th class="manage-column" scope="col" width="15%"><?php echo __('Post Status:','bgm');?></th>
				<th class="manage-column" scope="col" width="15%"><?php echo __('No. of Posts:','bgm');?></th>
				<th class="manage-column" scope="col" width="15%"><?php echo __('Date From:','bgm');?></th>
			<th colspan="2" class="manage-column" scope="col" width="40%"><?php echo __('Date To:','bgm');?></th>

			</tr></thead>
			<tr>
				<td class="manage-column" scope="col" width="15%" >
					<select id="bgm_post_type" style="width:100%;" name="post_type" >
				    <?php  $ptypes = get_post_types();
					foreach( $ptypes as $ptype){
if(
  $ptype=='revision' || $ptype=='attachment' || $ptype=='nav_menu_item' || $ptype=='custom_css' || $ptype=='shortcode' || $ptype=='product_variation' || $ptype=='shop_order' || $ptype=='shop_order_refund' || $ptype=='shop_coupon' || $ptype=='shop_webhook' || $ptype=='acf-field' || $ptype=='acf-field-group' || $ptype=='customize_changeset'){}else{?>
					<option value="<?php echo $ptype;?>"><?php $pobj = get_post_type_object( $ptype );echo $pobj->labels->name;?></option>	
					<?php } } ?>
					</select>
				</td>
                                <td  class="manage-column" scope="col" width="15%">
					<select id="bgm_poststauts" style="width:100%;"  name="poststatus" >
                                            <option value="publish"><?php echo __('Publish','bgm');?></option>
                                            <option value="future"><?php  echo __('Scheduled','bgm');?></option>
                                            
                                           
                                            
</select>
				</td>
				<td  class="manage-column" scope="col" width="15%">
					<input id="bgm_showposts" style="width:100%;" type="number" max="50" min="5" name="showposts" value="20"  />
				</td>
				<td  class="manage-column" scope="col" width="15%">
					<input autocomplete="false" id="bgm_fromday" style="width:100%;" type="date"  name="fromday" placeholder="From"/>
				</td>
                                <td  class="manage-column" scope="col" width="15%">
					<input autocomplete="false" id="bgm_to_day" style="width:100%;" type="date"  name="to_day" placeholder="To" />
				</td>
                  <script>jQuery( function() { jQuery( "#schdate" ).datepicker();jQuery( "#bgm_fromday" ).datepicker(); jQuery( "#bgm_to_day" ).datepicker();});</script>
				<td class="manage-column" scope="col" width="25%">
					<input id="post_req_ajax_submit" style="width:100%;" type="button" Value="Find Post" name="submit" />
				</td>
		</table></form>
                  <div class="prev-news-calender popular-tags"  >
                   <div class="clearfix " style="clear:both;width:98%;text-align:right;padding-right:30px;padding-top:10px;padding-bottom:10px;"><input type="button" id="schedule-table" value="Schedule Table" style="" data-target="#schedule-modal" data-toggle="bgm_modal"/></div>
        
                   <div id="schedule-modal" class="bgm_modal fade" role="modal">
                    <style>.date_popup_wrap { background: transparent url("<?php echo trailingslashit( plugin_dir_url( __DIR__ ) );?>assets/images/add-new-event.png") no-repeat scroll left top; }</style>
                        <span class="close" data-target="#schedule-modal" data-dismiss="bgm_modal">&times;</span>
                         <div class="bgm_modal-dialog" >
                              <div class="bgm_modal-content clearfix">
                                  <div id="calendar_div" class="clearfix">
	                              <?php echo bgm_getCalenders(); ?>
                                  </div>
                              </div>
                        </div>
                   </div>
                 </div>
	</div>
</div>
<div class="main-post-grid ">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="all-posts-grid card">
	   <h2 class="all-title"><?php echo __('ALL ITEMS LIST','bgm');?></h2>
	   <p class="all-desc"><?php echo __('Please click on list for add to selected list.','bgm');?></p>
		<?php
		
		$bdm_query=new wp_query(
		array(
		"post_type"=>'post',
                'post_status'=>array('publish','future'),
		"showposts"=>'20',
		'date_query' => array(
			array(
            'after' => '365 days ago'
			)
		)
		)
		);?>
		<div  class="wp-list-table widefat fixed striped pages post-all-list-inner ajax-filter-post">
		<?php if($bdm_query->have_posts()):?>
		<ul id="non-sortable">
			<?php while($bdm_query->have_posts()): $bdm_query->the_post();?>
			<li  class=" ui-state-default post  widefat  striped ajaxnone-sel-post" data-id="<?php the_id();?>">
			
			<p data-id="<?php the_id();?>"><a href="javascript:void(0)"class="title"><?php the_title();?> </a>     <span data-id="<?php the_id();?>"   class="fa  fa-long-arrow-right "></span>  <strong style="float:right"> &nbsp;<?php echo get_the_date();?> &nbsp;&nbsp;</strong>
			</p>
			
			</li>
			<?php endwhile;?>
			</ul>
			<?php else:?>
			<p style="padding:20px 0px;text-align:center;color:#f00;"><?php echo __('No posts Found in your criteria, Please Reset your Sorting options.','bgm');?></p>
			<?php endif;?>
		</div>
	</div>
	<div class="selected-posts-grid card">
	 
	   <h2 class="all-title"><?php echo __('SELECTED ITEMS LIST','bgm');?></h2>
	   <p class="all-desc"><?php echo __('( You can Drag and Drop to sort order )','bgm');?></p>
	   <div  class="wp-list-table widefat fixed striped pages post-all-list-inner all-selected-ajax-grid">
			<ul id="sortable" >
			</ul>
			
			
			
		</div>
		
		<div class="other-options">
			<h2><?php echo __('Email Template Title <small>(optional)</small>','bgm');?></h2>
			<p><input style="width:100%;" type="text" id="email-title" /></p>
			<div class="email-after-title">
				<h2><?php echo __('Add Infographics Image <small>(optional)</small>','bgm');?></h2>
				<?php echo wp_editor( '', 'bg_content_infographics', array('textarea_name' => 'bg_content_infographics',
	'textarea_rows'=>'3'));?>
			</div>
                         <div class="email-after-title">
				<h2><?php echo __('Content After Email Header <small>(optional)</small>','bgm');?></h2>
				<?php echo wp_editor( '', 'bg_content_after_title', array('textarea_name' => 'bg_content_after_title',
	'textarea_rows'=>'4'));?>
			</div>
			<div class="email-after-title">
				<h2 ><?php echo __('Content Before Email Footer <small>(optional)</small>','bgm');?></h2>
				<?php echo wp_editor( '', 'bg_email_after_title_content', array('textarea_name' => 'bg_email_after_title_content',
	'textarea_rows'=>'4'));?>
			</div>
		</div>
		<div class="result-id" style="width:100%;clear:both;display:block;">
			 <input type="hidden" id="allsel_pid" value="" />
			 <div style="width:100%;clear:both;display:block;"> <select name="layout" style="width:50%;">
				<option value="default"><?php echo __('Default','bgm');?></option>
				<option value="grid"><?php echo __('Grid','bgm');?></option>
			   <!--option value="modern"><?php echo __('Modern','bgm');?></option-->	
			  </select>
        <input autocomplete="false" id="schdate" style="width:48%;" type="date"  placeholder="Schedule Date" >
      <script>jQuery( function() { jQuery( "#schdate" ).datepicker({altFormat : 'yy-mm-dd'});});</script>
      </div>
			  <input type="hidden" name="p_type" value="<?php echo $ptype;?>"/>
			</div>
	
			<div class="result-action" style="display:block;"> 
				<input type="button" value="Get Email Template Code" id="getEmailCode" />
				<input type="button" value="Email Template Preview" id="getEmailPreview" />
        <label for="email_preview"><input type="checkbox" autofill="false" name="email_preview"  id="email_preview" /><small><abbr title="Preview email will be sent to your email Immediately.">Live Preview </abbr></small></label>
			</div>
	</div>
</div>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/codemirror.min.css" integrity="sha256-Zg9EoB1hB8n8EVhx/D07lT5dD3ZZqjJbxlDmHx8jsMc=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/codemirror.min.js" integrity="sha256-eue5ceZRwKVQ1OXOZSyU7MXCTZMlqsPi/TOIqh1Vlzo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/addon/display/fullscreen.css" integrity="sha256-SpuaNYgDjBMdeyjrjtsC+U5fpSDpftPNv7oO8HQvG7w=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/addon/display/fullscreen.min.js" integrity="sha256-QeFt/TH4ztFsP63z3GJAB2Gx771BLpDiFn74Np4aCtg=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/theme/3024-night.min.css" integrity="sha256-2KFs42xyMNW4uFhgByGByfB8YZL0oHH5eE0hC5/xwgI=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/mode/xml/xml.js" integrity="sha256-sB8UtHQubuS61s0F+Ui6xNwJHrTXcd3zjCgfb4bOnK4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/addon/search/jump-to-line.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/addon/search/match-highlighter.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/addon/search/matchesonscrollbar.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/addon/search/matchesonscrollbar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/addon/search/search.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.31.0/addon/search/searchcursor.min.js"></script>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById(" emailCodeModal-code"), {
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

</script>
  <style>.CodeMirror{min-height:452px;}</style>
<div>