
<?php settings_errors(); $active_tab='header';?>
<h1><?php echo __('Email Template Customization Options','bgm');?></h1>
<div class="bgm_setting">
<?php if( isset( $_GET[ 'tab' ] ) ) { $active_tab = $_GET[ 'tab' ];
        } else if( $active_tab == 'header' ) {  $active_tab = 'header';}
		else if( $active_tab == 'footer' ) { $active_tab = 'footer';	}
        else if( $active_tab == 'color' ) { $active_tab = 'color';	}		
        else if( $active_tab == 'social' ) { $active_tab = 'social';	}
        else if( $active_tab == 'advanced' ) { $active_tab = 'advanced';	}		
		else { $active_tab = 'header';}?>
<h2 class="nav-tab-wrapper">
		    <a href="?page=bgm_settings&tab=header" class="nav-tab <?php echo $active_tab == 'header' ? 'nav-tab-active' : ''; ?>"><?php echo __('Header Options','bgm');?></a>
            <a href="?page=bgm_settings&tab=footer" class="nav-tab <?php echo $active_tab == 'footer' ? 'nav-tab-active' : ''; ?>"><?php echo __('Footer Options','bgm');?></a>
			<a href="?page=bgm_settings&tab=social" class="nav-tab <?php echo $active_tab == 'social' ? 'nav-tab-active' : ''; ?>"><?php echo __('Social Network Options','bgm');?></a>
			<a href="?page=bgm_settings&tab=color" class="nav-tab <?php echo $active_tab == 'color' ? 'nav-tab-active' : ''; ?>"><?php echo __('Color Options','bgm');?> </a>
			<a href="?page=bgm_settings&tab=advanced" class="nav-tab <?php echo $active_tab == 'advanced' ? 'nav-tab-active' : ''; ?>"><?php echo __('Advanced Options','bgm');?></a>
</h2> 
<form action="options.php" method="post">
<div class="wrap">
<?php if( $active_tab == 'header' ) {
    settings_fields( 'header' );
    do_settings_sections( 'header' );    
}elseif( $active_tab == 'footer' ) {
    settings_fields( 'footer' );
    do_settings_sections( 'footer' );    
}elseif( $active_tab == 'social' ) {
    settings_fields( 'social' );
    do_settings_sections( 'social' );  
}elseif( $active_tab == 'color' ) {
    settings_fields( 'color' );
    do_settings_sections( 'color' );
}else {
    settings_fields( 'advanced' );
    do_settings_sections( 'advanced' );    
}
	submit_button('Save Options');
	echo'</div>';
	echo'</form>';
?>


</div>