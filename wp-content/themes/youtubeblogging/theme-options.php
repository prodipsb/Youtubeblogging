<?php
/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 *
 */
require_once( dirname( __FILE__ ) . '/options/options.php' );

/*
 * 
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
	
	//$sections = array();
	$sections[] = array(
				'title' => __('A Section added by hook', 'mytube'),
				'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'mytube'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array()
				);
	
	return $sections;
	
}//function
//add_filter('mytube-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}//function
//add_filter('mytube-args-twenty_eleven', 'change_framework_args');

/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options(){
$args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = false;
//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;

//Add HTML before the form
//$args['intro_text'] = __('<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>', 'mytube');

//Setup custom links in the footer for share icons
$args['share_icons']['twitter'] = array(
										'link' => 'http://twitter.com/youtubeblogging',
										'title' => 'Follow Us on Twitter', 
										'img' => NHP_OPTIONS_URL.'img/glyphicons/twitter.png'
										);
$args['share_icons']['linked_in'] = array(
										'link' => 'http://www.facebook.com/youtueblogging',
										'title' => 'Like us on Facebook', 
										'img' => NHP_OPTIONS_URL.'img/glyphicons/facebook.png'
										);

//Choose to disable the import/export feature
//$args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = 'mytube';

//Custom menu icon
//$args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('MytubeBlog', 'mytube');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('YouTubeBlogging', 'mytube');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = 'theme_options';

//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';

//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 62;

//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';
		
//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		
$args['help_tabs'][] = array(
							'id' => 'mytube-1',
							'title' => __('Support', 'mytube'),
							'content' => __('<p>If you are facing any problem with our theme or theme option panel, head over to our <a href="http://community.mythemeshop.com">Support Forum</a></p>', 'mytube')
							);
$args['help_tabs'][] = array(
							'id' => 'mytube-3',
							'title' => __('Credit', 'mytube'),
							'content' => __('<p>Options Panel created using the <a href="http://leemason.github.com/NHP-Theme-Options-Framework/" target="_blank">NHP Theme Options Framework</a> Version 1.0.5</p>', 'mytube')
							);
$args['help_tabs'][] = array(
							'id' => 'mytube-2',
							'title' => __('Earn Money', 'mytube'),
							'content' => __('<p>Earn 50% commision on every sale by refering your friends and readers. Join our <a href="http://mythemeshop.com/affiliate-program/">Affiliate Program</a>.</p>', 'mytube')
							);

//Set the Help Sidebar for the options page - no sidebar by default										
//$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'mytube');



$sections = array();

$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/generalsetting.png',
				'title' => __('General Settings', 'mytube'),
				'desc' => __('<p class="description">This tab contains common setting options which will be applied to whole theme.</p>', 'mytube'),
				'fields' => array(
				
					array(
						'id' => 'mts_logo',
						'type' => 'upload',
						'title' => __('Logo Image', 'mytube'), 
						'sub_desc' => __('Upload your logo <strong>(Recommended size 188x70px)</strong> using the Upload Button or insert image URL.', 'mytube')
						),
					array(
						'id' => 'mts_favicon',
						'type' => 'upload',
						'title' => __('Favicon', 'mytube'), 
						'sub_desc' => __('Upload a <strong>16 x 16 px</strong> image that will represent your website\'s favicon. You can refer to this link for more information on how to make it: <a href="http://www.favicon.cc/" target="blank" rel="nofollow">http://www.favicon.cc/</a>', 'mytube')
						),
					array(
						'id' => 'mts_header_code',
						'type' => 'textarea',
						'title' => __('Header Code', 'mytube'), 
						'sub_desc' => __('Enter the code which you need to place <strong>before closing </head> tag</strong>. (ex: Google Webmaster Tools verification, Bing Webmaster Center, BuySellAds Script, Alexa verification etc.)', 'mytube')
						),
					array(
						'id' => 'mts_analytics_code',
						'type' => 'textarea',
						'title' => __('Footer Code', 'mytube'), 
						'sub_desc' => __('Enter the codes which you need to place in your footer. <strong>(ex: Google Analytics, Clicky, STATCOUNTER, Woopra, Histats, etc.)</strong>.', 'mytube')
						),
					array(
						'id' => 'mts_copyrights',
						'type' => 'textarea',
						'title' => __('Copyrights Text', 'mytube'), 
						'sub_desc' => __('You can change or remove our link from footer and use your own custom text. (Link back is always appreciated)', 'mytube'),
						'std' => 'All Right Reserve By YouTubeBlogging</a>.'
						),
					array(
						'id' => 'mts_pagenavigation',
						'type' => 'checkbox',
						'title' => __('Pagination', 'mytube'),
						'sub_desc' => __('Enable or disable paginated navigation, which replaces the <strong>"Older Posts"</strong> and <strong>"Newer Posts"</strong> links with helpful numbered page links.', 'mytube'),
						'std' => '1'
						),
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/stylesetting.png',
				'title' => __('Styling Options', 'mytube'),
				'desc' => __('<p class="description">Control the visual appearance of your theme, such as colors, layout and patterns, from here.</p>', 'mytube'),
				'fields' => array(
					array(
						'id' => 'mts_color_scheme',
						'type' => 'color',
						'title' => __('Primary Color Scheme', 'mytube'), 
						'sub_desc' => __('Replace red color with your own favorite color.', 'mytube'),
						'std' => '#EA141F'
						),
					array(
						'id' => 'mts_color_scheme_2',
						'type' => 'color',
						'title' => __('Secondary Color Scheme', 'mytube'), 
						'sub_desc' => __('Replace secondary blue color with your own favorite color.', 'mytube'),
						'std' => '#364956'
						),
					array(
						'id' => 'mts_bg_color',
						'type' => 'color',
						'title' => __('Background Color', 'mytube'), 
						'sub_desc' => __('Pick any color using the <strong>color picker</strong>, or enter a hex color value in the input field to make it the site background color for your theme.', 'mytube'),
						'std' => '#EBEBEB'
						),
					array(
						'id' => 'mts_bg_pattern_upload',
						'type' => 'upload',
						'title' => __('Custom Background Image', 'mytube'), 
						'sub_desc' => __('Upload your own custom background image or pattern.', 'mytube')
						),
					array(
						'id' => 'mts_custom_css',
						'type' => 'textarea',
						'title' => __('Custom CSS', 'mytube'), 
						'sub_desc' => __('You can enter your own custom CSS here to further customize your theme. This will override the default CSS used on your site.', 'mytube')
						),																				
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/singlepost.png',
				'title' => __('Single Posts', 'mytube'),
				'desc' => __('<p class="description">From here, you can control the appearance and functionality of your single posts page.</p>', 'mytube'),
				'fields' => array(
					array(
						'id' => 'mts_breadcrumb',
						'type' => 'button_set',
						'title' => __('Breadcrumbs', 'mytube'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Breadcrumbs are a great way to make your site more user-friendly. You can enable them by checking this box.', 'mytube'),
						'std' => '1'
						),
					array(
						'id' => 'mts_related_posts',
						'type' => 'button_set',
						'title' => __('Related Posts', 'mytube'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Use this button to show related posts with thumbnails below the content area in a post.', 'mytube'),
						'std' => '1'
						),
					array(
						'id' => 'mts_tags',
						'type' => 'button_set',
						'title' => __('Tag Links', 'mytube'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Use this button if you want to show a tag cloud below the related posts.', 'mytube'),
						'std' => '0'
						),
					array(
						'id' => 'mts_author_box',
						'type' => 'button_set',
						'title' => __('Author Box', 'mytube'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Use this button if you want to display author information below the article.', 'mytube'),
						'std' => '1'
						),
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/navsetting.png',
				'title' => __('Navigation', 'mytube'),
				'desc' => __('<p class="description"><div class="controls"><b>Navigation settings can now be modified from the <a href="nav-menus.php">Menus Section</a>.</b><br></div></p>', 'mytube')
				);
				
				
	$tabs = array();

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function
?>