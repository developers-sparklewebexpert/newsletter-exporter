<article class="clearfix">
  <?php $p_url=get_the_permalink();?>
	<?php if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			}else{?>
			
			<div class="entry-header-thumbnail">
				<div style="height:300px;width:auto;">
					<a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium',array('class'=>'img-responsive')); ?></a>
				</div>
			</div>
		
	<?php }?>
       	
	<h2><?php the_title();?></h2>
	<div class="entry-content post-content">
		<?php echo substr(get_the_content(),0,330);?> ...
		<p class="read-more-post text-left"><a href="<?php echo $p_url;?>"><?php echo __('Read more','bussiness');?> <i class="fa fa-long-arrow-right"></i></a></p>
	</div>
    <div style="clear:both;"></div>	
</article>

