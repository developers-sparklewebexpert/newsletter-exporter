<?php
/*
* Plugin Name:Newsletter Export
* Version: 1.1.3
* Author:Raj Kumar Singh.
* Author URI:https://developers-india.com
* Plugin URI:http://plugins.webcloud.store/newsletter
* Description: This plugin will export selected post content based on post type and with custom order and generate custom email template in different layout with different custom modification options. 
*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class bgm_options{
	 public $version = '1.0.0';
	 public static function init() {

        $bgm_options = new self();

    }
	 public function __construct() {
		$this->setup_actions(); 
		$this->define_constants(); 
	 }
	 private function setup_actions() {
		add_action( 'admin_menu',array( $this, 'bgm_plugin_options') ,5);
		add_action('admin_enqueue_scripts', array( $this,'bgm_inc_assets'));
		add_action('admin_init', array( $this,'display_bgm_email_settings_fields'));
		add_action('wp_ajax_ajax_email_temp_prew','ajax_email_temp_prew');
                add_action('wp_ajax_noprev_ajax_email_temp_prew','ajax_email_temp_prew');
                add_action('wp_ajax_bgm_all_filter_post','bgm_all_filter_post');
                add_action('wp_ajax_noprev_bgm_all_filter_post','bgm_all_filter_post');
                add_action('wp_ajax_bgm_getAllMonths','bgm_getAllMonths');
                add_action('wp_ajax_noprev_bgm_getAllMonths','bgm_getAllMonths');
                add_action('wp_ajax_bgm_getYearList','bgm_getYearList');
                add_action('wp_ajax_noprev_bgm_getYearList','bgm_getYearList');
                add_action('wp_ajax_bgm_getCalender','bgm_getCalender');
                add_action('wp_ajax_noprev_bgm_getCalender','bgm_getCalender');
                
                add_action('wp_ajax_bgm_addSchedule','bgm_addSchedule');
                add_action('wp_ajax_noprev_bgm_addSchedule','bgm_addSchedule');
                add_action('wp_ajax_bgm_deleteSchedule','bgm_deleteSchedule');
                add_action('wp_ajax_noprev_bgm_deleteSchedule','bgm_deleteSchedule');
		include trailingslashit( plugin_dir_path( __FILE__ ) ).'include/bgm-ajax-request.php';
	 }
	 
	 
	 
	 
	 
private function define_constants() {

        define( 'BGM_VERSION',    $this->version );
        define( 'BGM_BASE_URL',   trailingslashit( plugin_dir_path( __FILE__ )) );
        define( 'BGM_BASE_URI',   trailingslashit( plugin_dir_url( __FILE__ ) ) );
        define( 'BGM_ASSETS_URI', trailingslashit( BGM_BASE_URI . 'assets' ) );
       

    }	 
     public function bgm_plugin_options($active_tab = ''){
        $page=add_menu_page( 'Newsletter Export', 'Newsletter Export', 'read','bgm_exporter', array( $this, 'bgm_options_render' ),'dashicons-email-alt',4);
		add_submenu_page( 'bgm_exporter','Template Settings','Template Settings', 'read','bgm_settings',array( $this,'bgm_exporter_settings'));
                add_submenu_page( 'bgm_exporter','Header','Header Settings', 'read','admin.php?page=bgm_settings&tab=header');
                add_submenu_page( 'bgm_exporter','Footer','Footer Settings', 'read','admin.php?page=bgm_settings&tab=footer');
                add_submenu_page( 'bgm_exporter','Social','Social Settings', 'read','admin.php?page=bgm_settings&tab=social');
                add_submenu_page( 'bgm_exporter','Color','Color Settings', 'read','admin.php?page=bgm_settings&tab=color');
        //add_action( 'load-' . $page, array( $this, 'help_tab' ) );
     }
     
     public function bgm_inc_assets(){
	   wp_enqueue_media();
	wp_enqueue_script( 'jquery-ui-core', array( 'jquery' ) );
        wp_enqueue_script( 'jquery-ui-sortable', array( 'jquery', 'jquery-ui-core' ) );
	wp_enqueue_style( 'bgm-admin-style', BGM_ASSETS_URI.'/css/bgm-admin-style.css' );
   	
        wp_enqueue_style( 'font-awesome', BGM_ASSETS_URI.'/css/font-awesome.min.css' );
	wp_enqueue_script( 'jquery-ui-droppable');
        
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'bgm-color-script', BGM_ASSETS_URI.'/js/color.js',array( 'wp-color-picker' ), false, true);
        wp_enqueue_script( 'bgm-admin-script', BGM_ASSETS_URI.'/js/combine_script.js');
   $header_opt = get_option( 'bgm_head_set_opt' );  
	wp_localize_script( 'bgm-admin-script', 'ajax_posts', array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'noposts' => __('No more posts found', 'bgm'),
			'loading' => __('loading... ', 'bgm'),
     'bgm_logo'=>$header_opt['header_logo'],
		));
	 }
	public function bgm_options_render(){
		require BGM_BASE_URL.'/include/main_page.php';
		
		
	}
    public function bgm_exporter_settings(){
		require BGM_BASE_URL.'/include/settings.php';
	}	
    public function display_bgm_email_settings_fields(){
		require BGM_BASE_URL.'/include/setting-feilds.php';
	}
	
	
	}
add_action( 'plugins_loaded', array( 'bgm_options', 'init' ), 10 );

function bgm_custom_cron_schedule( $schedules ) {
    $schedules['hourlyreminder'] = array(
        'interval' => 3600, 
        'display'  => __( 'Every 1 hours' ),
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'bgm_custom_cron_schedule' );
function newsletter_email_cron() {
    if( !wp_next_scheduled( 'newsletter_email_schedule' ) ) {  
       wp_schedule_event( time(), 'hourlyreminder', 'newsletter_email_schedule' );  
    }
}
add_action('wp', 'newsletter_email_cron');


