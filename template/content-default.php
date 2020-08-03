<!--[if mso]><table align="left" border="0" cellpadding="0" cellspacing="0" border="1px" style="border-color:<?php  if($color_spacer_bg!=''){echo $color_spacer_bg;}else{ echo '#ecf0f3';}?>;" bgcolor="#fff" style='background-color:#fff'><tr><td style="height: 2px;  background-color:<?php  if($color_spacer_bg!=''){echo $color_spacer_bg;}else{ echo '#ecf0f3';}?>;">
</td></tr><tr><td style="padding:15px;background-color:#fff;" bgcolor="#fff"><![endif]-->
  <div class="table MainContent" style="display: block; table-layout: fixed; ">
	<div class="row" style="display: block; background-color: <?php if($color_post_body!=''){echo $color_post_body;}else{ echo '#ecf0f3';}?>; ">
		<div class="cell spacer" style="height: 20px; display: inline-block;background-color:<?php  if($color_spacer_bg!=''){echo $color_spacer_bg;}else{ echo '#ecf0f3';}?>;">
		</div>
	</div>
	<div class="row" style="display: block; ">
		<div class="cell ArticleInfo" style="display: inline-block;">
			<h2 class="title" style="color: <?php if($color_post_text!=''){echo $color_post_text;}else{ echo '#1981c0';}?>; margin: 15px 15px 0 15px; font-size: 15.5px;">
				<a href="<?php echo $url;?>" target="_blank" style="color: <?php if($color_post_link!=''){echo $color_post_link;}else{ echo '#1981c0';}?>; text-decoration: none; line-height: 135%;">
<?php echo $title;?>
				</a>
			</h2>
			<p class="date" style="color: <?php if($color_post_text!=''){echo $color_post_text;}else{ echo '#666666';}?>; margin: 5px 15px 10px 15px; font-size: 10px;">
				Published on <a href="<?php echo get_home_url();?>" style="color: <?php if($color_post_link!=''){echo $color_post_link;}else{ echo '#1981c0';}?>; text-decoration: none;"><?php echo get_bloginfo('name');?> </a>.
			</p>
		</div>
	</div>
	<div class="row" style="display: block; ">
		<div class="cell article" style="display: inline-block;">
			
			<p style="color: <?php if($color_post_text!=''){echo $color_post_text;}else{ echo '#666666';}?>; margin: 0 15px 15px; text-align: left;clear:both;">
<?php if($featured_img_url){?><span style="float: right<?php  //echo $imgfloat;?>; Float:right;" align="right">
				<a href="<?php echo $url;?>" target="_blank" style="color: <?php if($color_post_link!=''){echo $color_post_link;}else{ echo '#1981c0';}?>; border: 0;">
					<img align="right" src="<?php if($i==1){echo $featured_img_url_thumb;}else{echo $featured_img_url;} ?>"style=" max-width:500px;<?php if($i==1){echo 'margin: 0 0px 15px 0px;width: 100%;max-width:100%; height: auto;';}else{echo'margin: 0 0px 15px 15px;width: auto;max-width:100%; max-height: 120px;';}?>  padding: 0px; border: 0px; vertical-align: middle;" <?php if($i==1){echo'width="500px" height="150px"';}else{echo'width="150px" height="auto"';}?>>
				</a>
			</span><?php }?>
<?php 	$excerpt_option = get_option( 'bgm_advanced_opt' ); if(!empty($excerpt_option)&& array_key_exists('excerpt_size',$excerpt_option)){$bgm_excerpt=$excerpt_option['excerpt_size'];}else{$bgm_excerpt=30;}
echo implode(' ', array_slice(explode(' ', wp_strip_all_tags($content)), 0, $bgm_excerpt));
  
 // substr( wp_strip_all_tags($content),0,$bgm_excerpt);?></p>
			<p style=" margin: 0 15px 15px; text-align: left;display:inline-block;clear:both;"> <a href="<?php echo $url;?>" target="_blank" style="color: <?php if($color_post_readmore_text!=''){echo $color_post_readmore_text;}else{ echo '#1981c0';}?>;border:1px solid <?php if($color_post_readmore_border!=''){echo $color_post_readmore_border;}else{ echo '#1981c0';}?>;padding:5px 12px;text-decoration:none;background-color:<?php if($color_post_readmore_bg!=''){echo $color_post_readmore_bg;}else{ echo '';}?>">
			<?php echo __('Read More','bgm');?></a>
			</p>
		</div>
	 </div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
