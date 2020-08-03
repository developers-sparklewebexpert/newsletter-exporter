<?php 

function newsletter_email() {
    $sms = get_option('bgm_advanced_opt' );
    $recepients = trim($sms['schedule_email_sendor']);
    $cdate=date("Y-m-d");
    $tdate=date("Y-m-d", strtotime('tomorrow'));
    
    
    if(get_option('schedule_newsletter_'.$cdate ) && empty(get_option('reminder_sent_24hr_before_newsletter_'.$cdate ))){
    $subject = 'Reminder: Your Next Newsletter Scheduled to '. $cdate ;
    $message = 'Your Newsletter is Scheduled Today. Please  visit <a href="'.get_home_url().'/wp-admin/admin.php?page=bgm_exporter"> "'.get_home_url().'/wp-admin/admin.php?page=bgm_exporter" for more info.';
    wp_mail($recepients, $subject, $message);
	update_option('reminder_sent_24hr_before_newsletter_'.$cdate,1 );
    }
    if(get_option('schedule_newsletter_'.$tdate ) && empty(get_option('reminder_sent_today_newsletter_'.$tdate ))){
    $subject = 'Reminder: Your Next Newsletter Scheduled to '. $tdate ;
    $message = 'Tommarow is your Next Newsletter Schedule. Please  visit <a href="'.get_home_url().'/wp-admin/admin.php?page=bgm_exporter"> "'.get_home_url().'/wp-admin/admin.php?page=bgm_exporter" </a> for more info.';
    wp_mail($recepients, $subject, $message);
	update_option('reminder_sent_today_newsletter_'.$tdate,1 );
   }
   else{}
    
}
add_action ('newsletter_email_schedule', 'newsletter_email');
 
function bgm_getAllMonths($selected = ''){
	$options = '';
	for($i=1;$i<=12;$i++)
	{
		$value = ($i < 10)?'0'.$i:$i;
		$selectedOpt = ($value == $selected)?'selected':'';
		$options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
	}
	return $options;
}
function bgm_getYearList($selected = ''){
	$options = '';
	for($i=2015;$i<=2025;$i++)
	{
		$selectedOpt = ($i == $selected)?'selected':'';
		$options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
	}
	return $options;
}
function bgm_addSchedule(){
 ob_start();
 if(isset($_POST['date'])){$date =$_POST['date'];}else{die();}
$sc_meta='schedule_newsletter_'.$date;
$bgm_add_sc=update_option($sc_meta,'scheduled');
if($bgm_add_sc){echo'<p style="color:#00f;">Scheduled Added Successfully';}else{echo'<p style="color:#f00;">Something Wrong..';}
$out=ob_get_clean();
die($out);
}
function bgm_deleteSchedule(){
 ob_start();
if(isset($_POST['date'])){$date =$_POST['date'];}else{die();}
$sc_meta='schedule_newsletter_'.$date;
$bgm_add_sc=delete_option($sc_meta);
if($bgm_add_sc){echo'<p style="color:#00f;">Scheduled Deleted Successfully';}else{echo'<p style="color:#f00;">Something Wrong..';}
$out=ob_get_clean();
die($out);
}

function bgm_getCalender()
		{
			ob_start();
                     if(isset($_POST['month'])){ $month=$_POST['month'];}else{$month='';}
                     if(isset($_POST['year'])){$year=$_POST['year'];}else{$year='';}
			$dateYear = ($year != '')?$year:date("Y");
			$dateMonth = ($month != '')?$month:date("m");
			$date = $dateYear.'-'.$dateMonth.'-01';
			$currentMonthFirstDay = date("N",strtotime($date));
			$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
			$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
			$boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42; ?>
			<div id="calender_section" class="clearfix">
				<h2>
				<a href="javascript:void(0);" onclick="bgm_getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt;&lt;</a>
				<select name="month_dropdown" class="month_dropdown dropdown"><?php echo bgm_getAllMonths($dateMonth); ?></select>
				<select name="year_dropdown" class="year_dropdown dropdown"><?php echo bgm_getYearList($dateYear); ?></select>
				<a href="javascript:void(0);" onclick="bgm_getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&gt;&gt;</a>
				</h2>
				<div id="event_list" class="none clearfix"></div>
				<div id="calender_section_top" class="clearfix">
					<ul>
						<li>Sun</li>
						<li>Mon</li>
						<li>Tue</li>
						<li>Wed</li>
						<li>Thu</li>
						<li>Fri</li>
						<li>Sat</li>
					</ul>
				</div>
				<div id="calender_section_bot" class="clearfix">
					<ul>
					<?php 
						$dayCount = 1; 
						for($i=1;$i<=$boxDisplay;$i++){
							if(($i >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $i <= ($totalDaysOfMonthDisplay)){
							//Current date
							$currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
							
							$bgm_event=get_option('schedule_newsletter_'.$currentDate);
							
							
							//Define date cell color
							if(($bgm_event=='scheduled') && strtotime($currentDate) == strtotime(date("Y-m-d"))){
								echo '<li date="'.$currentDate.'" class="grey date_cell active">';
							}
                                                       elseif(($bgm_event=='expired') && strtotime($currentDate) == strtotime(date("Y-m-d"))){
								echo '<li date="'.$currentDate.'" class="grey date_cell expired">';
							}
                                                        elseif(($bgm_event=='scheduled') && strtotime($currentDate) != strtotime(date("Y-m-d"))){
								echo '<li date="'.$currentDate.'" class="light_sky date_cell active">';
							}
                                                       elseif(($bgm_event=='expired') && strtotime($currentDate) != strtotime(date("Y-m-d"))){
								echo '<li date="'.$currentDate.'" class="light_sky date_cell expired">';
							}
                                                        elseif($bgm_event==''){
								echo '<li date="'.$currentDate.'" class="light_sky date_cell">';
							}else{
								echo '<li date="'.$currentDate.'" class="date_cell">';
							}
							//Date cell
							echo '<span>';
							echo $dayCount;

							echo '</span>';
                                                         //Hover event popup
							echo '<div id="date_popup_'.$currentDate.'" 	class="date_popup_wrap">';                                              if(($bgm_event!=='')&& ($bgm_event=='expired')){$messge='Schedule Expires';}
                                                      elseif(($bgm_event!=='')&& ($bgm_event=='scheduled')){$messge='Scheduled <br><a date="'.$currentDate.'" class="scheduleDelete" href="javascript:void(0)">Delete</a>';}
                                                      else{$messge='<a date="'.$currentDate.'" class="scheduleAdd" href="javascript:void(0)">Add Schedule</a>';}
							echo '<div class="date_window">';
							echo '<div class="popup_event">'.$messge.'</div>';
							
							echo '</div></div>';
							echo '</li>';
							$dayCount++;
						?>
						<?php }else{ ?>
						<li><span>&nbsp;</span></li>
						<?php }
						}	 ?>
						</ul>
				</div>
			</div>
<?php
$out=ob_get_clean();
die($out);
}
function bgm_getCalenders()
		{
			
                     if(isset($_POST['month'])){ $month=$_POST['month'];}else{$month='';}
                     if(isset($_POST['year'])){$year=$_POST['year'];}else{$year='';}
			$dateYear = ($year != '')?$year:date("Y");
			$dateMonth = ($month != '')?$month:date("m");
			$date = $dateYear.'-'.$dateMonth.'-01';
			$currentMonthFirstDay = date("N",strtotime($date));
			$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
			$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
			$boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42; ?>
			<div id="calender_section" class="clearfix">
				<h2>
				<a href="javascript:void(0);" onclick="bgm_getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt;&lt;</a>
				<select name="month_dropdown" class="month_dropdown dropdown"><?php echo bgm_getAllMonths($dateMonth); ?></select>
				<select name="year_dropdown" class="year_dropdown dropdown"><?php echo bgm_getYearList($dateYear); ?></select>
				<a href="javascript:void(0);" onclick="bgm_getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&gt;&gt;</a>
				</h2>
				<div id="event_list" class="none clearfix"></div>
				<div id="calender_section_top" class="clearfix">
					<ul>
						<li>Sun</li>
						<li>Mon</li>
						<li>Tue</li>
						<li>Wed</li>
						<li>Thu</li>
						<li>Fri</li>
						<li>Sat</li>
					</ul>
				</div>
				<div id="calender_section_bot" class="clearfix">
					<ul>
					<?php 
						$dayCount = 1; 
						for($i=1;$i<=$boxDisplay;$i++){
							if(($i >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $i <= ($totalDaysOfMonthDisplay)){
							//Current date
							$currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
							
							$bgm_event=get_option('schedule_newsletter_'.$currentDate);
							
							
							//Define date cell color
							if(($bgm_event=='scheduled') && strtotime($currentDate) == strtotime(date("Y-m-d"))){
								echo '<li date="'.$currentDate.'" class="grey date_cell active">';
							}
                                                       elseif(($bgm_event=='expired') && strtotime($currentDate) == strtotime(date("Y-m-d"))){
								echo '<li date="'.$currentDate.'" class="grey date_cell expired">';
							}
                                                       elseif(($bgm_event=='scheduled') && strtotime($currentDate) != strtotime(date("Y-m-d"))){
								echo '<li date="'.$currentDate.'" class="light_sky date_cell active">';
							}
                                                       elseif(($bgm_event=='expired') && strtotime($currentDate) != strtotime(date("Y-m-d"))){
								echo '<li date="'.$currentDate.'" class="light_sky date_cell expired">';
							}
                                                        elseif($bgm_event==''){
								echo '<li date="'.$currentDate.'" class="light_sky date_cell">';
							}else{
								echo '<li date="'.$currentDate.'" class="date_cell">';
							}
							//Date cell
							echo '<span>';
							echo $dayCount;

							echo '</span>';
                                                        //Hover event popup
							echo '<div id="date_popup_'.$currentDate.'" 	class="date_popup_wrap">';                                              if(($bgm_event!=='')&& ($bgm_event=='expired')){$messge='Schedule Expires';}
elseif(($bgm_event!=='')&& ($bgm_event=='scheduled')){$messge='Scheduled <br><a date="'.$currentDate.'" class="scheduleDelete" href="javascript:void(0)">Delete</a>';}
else{$messge='<a date="'.$currentDate.'" class="scheduleAdd" href="javascript:void(0)">Add Schedule</a>';}
							echo '<div class="date_window">';
							echo '<div class="popup_event">'.$messge.'</div>';
							
							echo '</div></div>';


							echo '</li>';
							$dayCount++;
						?>
						<?php }else{ ?>
						<li><span>&nbsp;</span></li>
						<?php }
						}	 ?>
						</ul>
				</div>
			</div>
<?php

}	
 function ajax_email_temp_prew(){
	ob_start();
//$type=$_POST['p_type'];	
$allids=$_POST['p_id'];
$email_title=$_POST['etitle'];
$after_header=$_POST['after_head'];
$before_footer=$_POST['before_foot'];
$pids=explode(',',$allids);	
$infogr=$_POST['info'];
$layout=$_POST['layout'];
$i=1;$j=2;
$sdatess=$_POST['sdate'];
   if($sdatess==''){$sdates=date("Y.m.d");}else{
   $sdats=strtotime($sdatess);$sdates=date('Y.m.d',$sdats);}
include plugin_dir_path( __DIR__ ).'/template/header.php';	
foreach ($pids as $pid) :
$post = get_post($pid);
$title=$post->post_title;
$content=$post->post_content;
$id=$post->ID;
$featured_img_url = get_the_post_thumbnail_url($id,'thumbnail');
$featured_img_url_thumb = get_the_post_thumbnail_url($id,'medium');
$ptype=$post->post->post_type;
$url=get_permalink($id);

if(($i==$j)){$j=$j+2;$imgfloat='right';}else{$imgfloat='left';}
if($layout=='grid'){
include plugin_dir_path( __DIR__ ).'/template/content-grid.php';
}
elseif($layout=='masonry'){
include plugin_dir_path( __DIR__ ).'/template/content-masonry.php';	
}
elseif($layout=='modern'){
include plugin_dir_path( __DIR__ ).'/template/content-modern.php';	
}
else{
include plugin_dir_path( __DIR__ ).'/template/content-default.php';	
}
$i++;
endforeach;
echo'<div style="clear:both;"></div>';
include plugin_dir_path( __DIR__ ).'/template/footer.php';	
$out=ob_get_clean();
 //Testing Live Email Preview
   if(isset($_POST['email_preview']) && $_POST['email_preview']=='1'){
    $subject = 'Newsletter Live Email Preview';
    $uto='info@healthstatus.com';
    $from='info@healthstatus.com';
    $sms = get_option('bgm_advanced_opt' );
    $recepients = trim($sms['schedule_email_sendor']);
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$uto."\r\n". 'Reply-To: '.$from."\r\n" .'X-Mailer: PHP/' . phpversion();
    $message = $out;
    wp_mail($recepients, $subject, $message,$headers);  
   }
die($out);
}

function bgm_all_filter_post(){
ob_start();
$ptype=$_POST['post_type'];
if(isset($_POST['pstatus'])){$status=$_POST['pstatus'];}else{$status='publish';}
if(isset($_POST['from'])){$from=$_POST['from'];}else{$from='';}
if(isset($_POST['to'])){$to=$_POST['to'];}else{$to='';}
if(isset($_POST['showposts'])){$count=$_POST['showposts'];}else{$count='20';}
	$bdm_query=new WP_Query(array(
		"post_type"=>$ptype,
                "post_status"=>$status,
		"showposts"=>$count,
		'date_query' => array(
			array(
                          'after' => $from,
                          'before' => $to
			)
		)
		)
		);?>
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
<?php $result=ob_get_clean();
die($result);	
}
