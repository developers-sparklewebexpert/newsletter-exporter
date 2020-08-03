<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php $header_opt = get_option( 'bgm_head_set_opt' );
$coloropt = get_option( 'bgm_color_set_opt'); if(!empty($coloropt)){extract($coloropt);}?>
   <!-- Wrapper Table starts -->

<table class="WrapperTable" style="margin: 0; background-color: <?php if($color_tem_bg!=''){echo $color_tem_bg;}else{ echo '#ecf0f3';}?>;  vertical-align: top; width: 100%; height: 100%; padding: 10px 0px 0px 0px; border-spacing: 0; border-collapse: collapse; font-family: Arial, Helvetica, sans-serif; font-size: 12px; position: absolute; top: 0; left: 0; line-height: 150%; ">
<tbody>
<tr>
<td>
<!--[if mso]>
 <center>
 <table><tr><td style="width:500px;overflow:hidden;background-color:#fff;" width="500px" bgcolor="#fff;">
<![endif]-->
<!-- Wrapper DIV starts -->
<div class="class WrapperDIV" style="background-color: <?php if($color_body_bg!=''){echo $color_body_bg;}else{ echo '#ffffff';}?>; display: block; table-layout: fixed; max-width: 500px; width:100%;margin: 10px auto 0px auto!important; position: relative; top: 20px; ">

<!-- Table Header (in the form of DIV) starts -->
<div class="table NewsletterHeader" style="background-color: <?php if($color_header_bg!=''){echo $color_header_bg;}else{ echo '#f7f8fa';}?>; display: block; table-layout: fixed; ">
	<div class="row" style="display: block; ">
	<!--[if mso]><table bgcolor="#fff" style="background-color:#fff;" width="100%"><tr><td><![endif]-->
		<div class="cell logo" style="margin: 0; display: inline-block; float: left; height: 50px; overflow: hidden; margin-top: 0px;">
		<!--[if mso]><table ><tr><td><![endif]-->
			<p align="left" style="float: left; margin-top: 0px; float: left; margin-left: 10px; ">
			<a href="<?php echo get_home_url();?>" target="_blank" style="color: <?php echo ($color_header_link!='')?$color_header_link:'#1981c0';?>; font-weight: bold;">
					<?php echo'<img src="' .  $header_opt['header_logo']  . '" style="border: 0px; height: 28px; width: 103px; " title="' . get_bloginfo( 'name', 'display' ) . '" alt="' . get_bloginfo( 'name', 'display' ) . '">';?>
				</a>
			</p>
			<!--[if mso]></td><![endif]-->
			<!--[if mso]><td><![endif]-->
			<p align="right" style="text-align: top; float: left;  margin-top: 4px; margin-left: 278px; font-size: 12px; color: <?php  if($color_header_text!=''){echo $color_header_text;}else{ echo '#1981c0';}?>; line-height: 150%; ">
Date: <?php echo $sdates;?>
			</p>
			<!--[if mso]></td></tr></table><![endif]-->
		</div>
		<div style="clear: both;"></div>
		
		<!--[if mso]></td></tr></table><![endif]-->
		
	</div>
</div>
 <?php  if($email_title!=''){ ?><div class="cell spacer" style="height: 20px; display: block;background-color: <?php  if($color_spacer_bg!=''){echo $color_spacer_bg;}else{ echo '#ecf0f3';}?>;"></div><div style="table-layout: fixed; text-align:center;clear:both;display:block;margin:5px 15px 0px 15px;background-color:<?php  if($color_header_af_bg!=''){echo $color_header_af_bg;}else{ echo '#ffffff';}?>;color:<?php  if($color_header_af_text!=''){echo $color_header_af_text;}else{ echo '#666666';}?>;"><h1 style="color:<?php  if($color_header_af_link!=''){echo $color_header_af_link;}else{ echo '#1981c0';}?>; text-decoration: none; line-height: 135%;"><?php echo stripslashes($email_title); ?></h2></div>
<?php }?>
   <?php  if($after_header!=''){ ?><div class="cell spacer" style="height: 20px; display: block;background-color: <?php  if($color_spacer_bg!=''){echo $color_spacer_bg;}else{ echo '#ecf0f3';}?>;"></div><div style="margin:15px;display:block;table-layout: fixed;background-color:<?php  if($color_header_af_bg!=''){echo $color_header_af_bg;}else{ echo '#ffffff';}?>;color:<?php  if($color_header_af_text!=''){echo $color_header_af_text;}else{ echo '#666666';}?>;"><?php echo stripslashes($after_header);?></div><?php }?>

<?php  if($infogr!=''){ ?><div class="cell spacer" style="height: 20px; display: block;background-color: <?php  if($color_spacer_bg!=''){echo $color_spacer_bg;}else{ echo '#ecf0f3';}?>;"></div><div style="margin:15px;display:block;table-layout: fixed;background-color:<?php  if($color_header_af_bg!=''){echo $color_header_af_bg;}else{ echo '#ffffff';}?>;color:<?php  if($color_header_af_text!=''){echo $color_header_af_text;}else{ echo '#666666';}?>;"><?php echo stripslashes($infogr);?></div><?php }?>