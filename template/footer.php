<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<!--[if mso]>
 <center>
 <table><tr><td style="width:500px;overflow:hidden;background-color:#ffffff;" width="500px" bgcolor="#ffffff;">
<![endif]-->
<?php $bgmf_options = get_option( 'bgm_foot_set_opt' );?>
<?php $socials = get_option( 'bgm_social_set_opt' );?>
<?php if($before_footer!=''){ ?><div class="row" style="display: block;  ">
		<div class="cell spacer" style="height: 20px; display: inline-block;background-color: <?php  if($color_spacer_bg!=''){echo $color_spacer_bg;}else{ echo '#ecf0f3';}?>;">
		</div>
	</div><div style="display:block;margin:15px;background-color:<?php if($after_body_bg!=''){echo $after_body_bg;}else{ echo '#ffffff';}?>;color:<?php if($after_body_text!=''){echo $after_body_text;}else{ echo '#ffffff';}?>;"><?php echo stripslashes($before_footer);?></div><?php }?>
<!-- "Check Out Our Website" starts -->
<!--[if mso]>
 <table><tr><td style="width:500px;overflow:hidden;background-color:#ffffff;" width="500px" bgcolor="#ffffff;">
<![endif]-->
<div class="row" style="display: block; ">
		<div class="cell spacer" style="height: 20px; display: block;background-color: <?php  if($color_spacer_bg!=''){echo $color_spacer_bg;}else{ echo '#ecf0f3';}?>;">
		</div>
	</div>
<div class="table website" style="height: 215px; background-color: <?php if($logo_social_bg_color!=''){echo $logo_social_bg_color;}else{ echo '#ffffff';}?>; text-align: center; display: block; table-layout: fixed; ">
	
	<div class="row" style="display: block; ">
		<div class="cell CheckOut" style="display: inline-block; font-size: 10px;">
			<p style="color: <?php if($logo_social_text_color!=''){echo $logo_social_text_color;}else{ echo '#666666';}?>;  margin-top: 48px">
				Check Out Our Website
			</p>
			<p>
				<a href="<?php echo get_home_url();?>" target="_blank" style="color: #1981c0; border: 0;">
				<img src="<?php if(!empty($bgmf_options)&& array_key_exists('footer_logo',$bgmf_options)){echo $bgmf_options['footer_logo'];	
	}?>" style="border: 0; height: 28px; width: 103px;" title="<?php echo get_bloginfo( 'name', 'display' );?>" alt="<?php get_bloginfo( 'name', 'display' );?>">
				</a>
			</p>	
		</div>
		<?php if(!empty($socials)){echo'<p style="padding:10px;text-align:center;margin: 0 15px 15px;">';
				foreach($socials as $key=>$social):
								   $turl=plugins_url();
				echo'<a target="_blank" style="display:inline-block;margin:5px 3px;height: 35px; padding: 0; width: 35px;" href="'.$social.'"><img style="width:100%;" src="'.$turl.'/newslettor_exporter/assets/images/'.$key.'.png" /></a>';
				endforeach;
				echo'</p>';
			}
			?>
	</div>
</div>
<!-- "Check Out Our Website" ends -->
 <!--[if mso]>
 </td></tr></table><center><![endif]-->
<!-- "Check Out Our Website" starts -->

<!-- Footer starts -->
<div class="table footer" style="height: 80px; background-color: <?php if($copyright_bg_color!=''){echo $copyright_bg_color;}else{ echo '#ecf0f3';}?>; text-align: center; vertical-align: middle; display: block; table-layout: fixed; ">
  <!--[if mso]>
 <table><tr><td style="width:500px;overflow:hidden;background-color:#ffffff;" width="500px" bgcolor="#ffffff;">
<![endif]-->
	<div class="row" style="display: block;">
		<div class="cell spacer" style="height: 20px; display: inline-block; background-color:<?php  if($color_spacer_bg!=''){echo $color_spacer_bg;}else{ echo '#ecf0f3';}?>;">
		</div>
		<div class="cell FooterInfo" style="padding-top: 5px; display: inline-block;">
			<p style="color: <?php if($copyright_text_color!=''){echo $copyright_text_color;}else{ echo '#1981c0';}?>; text-align: center; vertical-align: middle; font-size: 10px;"><?php 
    
	if(!empty($bgmf_options)&& array_key_exists('copyright',$bgmf_options)){echo $bgmf_options['copyright'];	
	}
?></p>
			<p style="text-align: center; ">
				<a href="[LINK_PREFERENCES]" style="color: <?php if($copyright_link_color!=''){echo $copyright_link_color;}else{ echo '#666666';}?>; font-size: 10px;">Preferences</a>
				 &nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="[LINK_UNSUBSCRIBE]" style="color: <?php if($copyright_link_color!=''){echo $copyright_link_color;}else{ echo '#666666';}?>; font-size: 10px;">Unsubscribe</a>
				 &nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="[LINK_BROWSER]" style="color: <?php if($copyright_link_color!=''){echo $copyright_link_color;}else{ echo '#666666';}?>; font-size: 10px;">View this email in your browser</a>
			</p>
		</div>
	 </div>
  <!-- Footer ends -->
 <!--[if mso]>
 </td></tr></table><center><![endif]-->
</div>

<!--[if mso]>
 </td></tr></table><center><![endif]-->
</div>
<!-- Wrapper DIV ends -->
<!-- Wrapper Table ends -->
<!--[if mso]>
 </td></tr></table>
 </center>
<![endif]-->
</td>
</tr>
</tbody>
</table>
 