
            <?php if($ptype=='page'){?>
<div class="column" style="Float: left;width:50%;text-align: left;color: #8e959c;font-size: 14px;line-height: 21px;font-family: sans-serif;">
            
              <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="line-height:25px;font-size:1px">&nbsp;</div>
    </div>

   <div style="Margin-left: 20px;Margin-right: 20px;">
      <h3 style="Margin-top: 0;Margin-bottom: 12px;font-style: normal;font-weight: normal;color: #0376B9;font-size: 18px;line-height: 26px;font-family: Avenir,sans-serif;text-align:center;"><strong><?php echo $title;?></strong></h3>
    </div>
     <div style="Margin-left: 20px;Margin-right: 20px;">
      <p style="Margin-top: 0;Margin-bottom: 20px;"> <?php 	$excerpt_option = get_option( 'bgm_social_set_opt' ); if(!empty($excerpt_option)&& array_key_exists('excerpt_size',$excerpt_option)){$bgm_excerpt=$excerpt_option['excerpt_size'];}else{$bgm_excerpt=330;}
	  echo substr($content,0,$bgm_excerpt);?>...</p>
    </div>
            
              <div style="Margin-left: 20px;Margin-right: 20px;">
      <div class="btn btn--flat btn--medium" style="Margin-bottom: 20px;text-align: left;">
        <!--[if !mso]--><a style="border-radius: 4px;display: inline-block;font-size: 12px;font-weight: bold;line-height: 22px;padding: 10px 20px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff !important;background-color: #0376B9;font-family: Avenir, sans-serif;" href="<?php echo $url;?>">Read More</a><!--[endif]-->
      <!--[if mso]><p style="line-height:0;margin:0;">&nbsp;</p><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="<?php echo $url;?>" style="width:101px" arcsize="10%" fillcolor="#0376B9" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,9px,0px,9px"><center style="font-size:12px;line-height:22px;color:#FFFFFF;font-family:Avenir,sans-serif;font-weight:bold;mso-line-height-rule:exactly;mso-text-raise:4px">Read More</center></v:textbox></v:roundrect><![endif]--></div>
    </div>

   <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="line-height:15px;font-size:1px">&nbsp;</div>
    </div>
            
            </div>
<?php }else{?>
         <div class="column" style="Float: left;width:50%;text-align: left;color: #8e959c;font-size: 14px;line-height: 21px;font-family: sans-serif;">
            
              <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="line-height:25px;font-size:1px">&nbsp;</div>
    </div>
              <div style="Margin-left: 20px;Margin-right: 20px;">
        <div style="font-size: 12px;font-style: normal;font-weight: normal;Margin-bottom: 20px;" align="center">
          <a href="<?php echo $url;?>"><img style="border: 0;display: block;height: auto;width: 100%;max-width: 450px;" alt="<?php echo title;?>" src="<?php echo $featured_img_url;?>" width="260"></a>
        </div>
      </div>
            
              <div style="Margin-left: 20px;Margin-right: 20px;">
      <h3 style="Margin-top: 0;Margin-bottom: 12px;font-style: normal;font-weight: normal;color: #0376B9;font-size: 18px;line-height: 26px;font-family: Avenir,sans-serif;"><strong><?php echo $title;?></strong></h3>
    </div>
            
              <div style="Margin-left: 20px;Margin-right: 20px;">
      <p style="Margin-top: 0;Margin-bottom: 20px;"> <?php $excerpt_option = get_option( 'bgm_advanced_opt' ); if(!empty($excerpt_option)&& array_key_exists('excerpt_size',$excerpt_option)){$bgm_excerpt=$excerpt_option['excerpt_size'];}else{$bgm_excerpt=330;}
	  echo substr($content,0,$bgm_excerpt);?>...</p>
    </div>
            
              <div style="Margin-left: 20px;Margin-right: 20px;">
      <div class="btn btn--flat btn--medium" style="Margin-bottom: 20px;text-align: left;">
        <!--[if !mso]--><a style="border-radius: 4px;display: inline-block;font-size: 12px;font-weight: bold;line-height: 22px;padding: 10px 20px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff !important;background-color: #0376B9;font-family: Avenir, sans-serif;" href="<?php echo $url;?>">Read More</a><!--[endif]-->
      <!--[if mso]><p style="line-height:0;margin:0;">&nbsp;</p><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="<?php echo $url;?>" style="width:101px" arcsize="10%" fillcolor="#0376B9" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,9px,0px,9px"><center style="font-size:12px;line-height:22px;color:#FFFFFF;font-family:Avenir,sans-serif;font-weight:bold;mso-line-height-rule:exactly;mso-text-raise:4px">Read More</center></v:textbox></v:roundrect><![endif]--></div>
    </div>
            
              <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="line-height:15px;font-size:1px">&nbsp;</div>
    </div>
            
            </div>
<?php }?>