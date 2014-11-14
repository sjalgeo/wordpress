<?php
/*
 *
 * Set the text domain for the theme or plugin.
 *
 */
define('SJAWP_TEXT_DOMAIN', 'sjawp-opts');

/*
 *
 * Require the framework class before doing anything else, so we can use the defined URLs and directories.
 * If you are running on Windows you may have URL problems which can be fixed by defining the framework url first.
 *
 */
//define('Redux_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('Redux_Options')){
    require_once(dirname(__FILE__) . '/options/defaults.php');
}

/*
 *
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function fsbwp_add_another_section($sections){
    //$sections = array();
    $sections[] = array(
        'title' => __('A Section added by hook', SJAWP_TEXT_DOMAIN),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', SJAWP_TEXT_DOMAIN),
		'icon' => 'paper-clip',
		'icon_class' => 'icon-large',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}
//add_filter('redux-opts-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by a theme, good for child themes to override or add to the args array.
 *
 */
function fsbwp_change_framework_args($args){
    //$args['dev_mode'] = false;
    
    return $args;
}
//add_filter('redux-opts-args-twenty_eleven', 'change_framework_args');


/*
 *
 * Most of your editing will be done in this section.
 *
 * Here you can override default values, uncomment args and change their values.
 * No $args are required, but they can be over ridden if needed.
 *
 */
function fsbwp_setup_framework_options(){
    $args = array();

    // Setting dev mode to true allows you to view the class settings/info in the panel.
    // Default: true
    $args['dev_mode'] = false;

	// Set the icon for the dev mode tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['dev_mode_icon'] = 'info-sign';

	// Set the class for the dev mode tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	$args['dev_mode_icon_class'] = 'icon-large';

    // If you want to use Google Webfonts, you MUST define the api key.
    //$args['google_api_key'] = 'xxxx';

    // Define the starting tab for the option panel.
    // Default: '0';
    //$args['last_tab'] = '0';

    // Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
    // If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
    // If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
    // Default: 'standard'
    //$args['admin_stylesheet'] = 'standard';

    // Add HTML before the form.
    $args['intro_text'] = __('<p>Utilities for various Wordpress websites.</p>', SJAWP_TEXT_DOMAIN);

    // Add content after the form.
    $args['footer_text'] = __('<p>Please ensure all details are correct.</p>', SJAWP_TEXT_DOMAIN);

    // Set footer/credit line.
    //$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', SJAWP_TEXT_DOMAIN);

    // Setup custom links in the footer for share icons
//    $args['share_icons']['twitter'] = array(
//        'link' => 'http://twitter.com/ghost1227',
//        'title' => 'Follow me on Twitter',
//        'img' => Redux_OPTIONS_URL . 'img/social/Twitter.png'
//    );
//    $args['share_icons']['linked_in'] = array(
//        'link' => 'http://www.linkedin.com/profile/view?id=52559281',
//        'title' => 'Find me on LinkedIn',
//        'img' => Redux_OPTIONS_URL . 'img/social/LinkedIn.png'
//    );

    // Enable the import/export feature.
    // Default: true
    $args['show_import_export'] = false;

	// Set the icon for the import/export tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: refresh
	//$args['import_icon'] = 'refresh';

	// Set the class for the import/export tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	$args['import_icon_class'] = 'icon-large';

    // Set a custom option name. Don't forget to replace spaces with underscores!
    $args['opt_name'] = 'FSBWP_Options';

    // Set a custom menu icon.
    //$args['menu_icon'] = '';

    // Set a custom title for the options page.
    // Default: Options
    $args['menu_title'] = __('SJA Plugin', SJAWP_TEXT_DOMAIN);

    // Set a custom page title for the options page.
    // Default: Options
    $args['page_title'] = __('SJA Utilities Plugin', SJAWP_TEXT_DOMAIN);

    // Set a custom page slug for options page (wp-admin/themes.php?page=***).
    // Default: redux_options
    $args['page_slug'] = 'sja_options';

    // Set a custom page capability.
    // Default: manage_options
    //$args['page_cap'] = 'manage_options';

    // Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
    // Default: menu
    //$args['page_type'] = 'submenu';

    // Set the parent menu.
    // Default: themes.php
    // A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    //$args['page_parent'] = 'options_general.php';

    // Set a custom page location. This allows you to place your menu where you want in the menu order.
    // Must be unique or it will override other items!
    // Default: null
    //$args['page_position'] = null;

    // Set a custom page icon class (used to override the page icon next to heading)
    //$args['page_icon'] = 'icon-themes';

	// Set the icon type. Set to "iconfont" for Font Awesome, or "image" for traditional.
	// Redux no longer ships with standard icons!
	// Default: iconfont
	//$args['icon_type'] = 'image';

    // Disable the panel sections showing as submenu items.
    // Default: true
    //$args['allow_sub_menu'] = false;
        
    // Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
    $args['help_tabs'][] = array(
        'id' => 'redux-opts-1',
        'title' => __('Theme Information 1', SJAWP_TEXT_DOMAIN),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', SJAWP_TEXT_DOMAIN)
    );
    $args['help_tabs'][] = array(
        'id' => 'redux-opts-2',
        'title' => __('Theme Information 2', SJAWP_TEXT_DOMAIN),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', SJAWP_TEXT_DOMAIN)
    );

    // Set the help sidebar for the options page.                                        
    $args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', SJAWP_TEXT_DOMAIN);

    $sections = array();

    $sections[] = array(
        // Redux uses the Font Awesome iconfont to supply its default icons.
        // If $args['icon_type'] = 'iconfont', this should be the icon name minus 'icon-'.
        // If $args['icon_type'] = 'image', this should be the path to the icon.
        'icon' => 'cogs',
        // Set the class for this icon.
        // This field is ignored unless $args['icon_type'] = 'iconfont'
        'icon_class' => 'icon-large',
        'title' => __('Fresh Store Details', SJAWP_TEXT_DOMAIN),
        'desc' => __('<p class="description">To setup a Fresh Store with Wordpress, you must first activate the API at your Fresh Store.</p>', SJAWP_TEXT_DOMAIN),
        // Lets leave this as a blank section, no options just some intro text set above.
        //'fields' => array()
//        'fields' => array(
//            array(
//                'id' => 'fsb_enabled',
//                'type' => 'checkbox',
//                'title' => __('Enabled', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Enable Connection between Wordpress and your Fresh Store', SJAWP_TEXT_DOMAIN),
//                'desc' => __('', SJAWP_TEXT_DOMAIN),
//                'switch' => true,
//                'std' => '1' // 1 = checked | 0 = unchecked
//            ),
//            array(
//                'id' => 'fsbname', // The item ID must be unique
//                'type' => 'text', // Built-in field types include:
//                // text, textarea, editor, checkbox, multi_checkbox, radio, radio_img, button_set,
//                // select, multi_select, color, date, divide, info, upload
//                'title' => __('Store Name', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Select a name for your store to identify it within Wordpress', SJAWP_TEXT_DOMAIN),
//                'desc' => __('', SJAWP_TEXT_DOMAIN),
//                //'validate' => '', // Built-in validation includes:
//                //  email, html, html_custom, no_html, js, numeric, comma_numeric, url, str_replace, preg_replace
//                //'msg' => 'custom error message', // Override the default validation error message for specific fields
//                //'std' => '', // This is the default value and is used to set an option on theme activation.
//                //'class' => '' // Set custom classes for elements if you want to do something a little different
//                //'rows' => '6' // Set the number of rows shown for the textarea. Default: 6
//            ),
//            array(
//                'id' => 'fsbkey', // The item ID must be unique
//                'type' => 'text', // Built-in field types include:
//                // text, textarea, editor, checkbox, multi_checkbox, radio, radio_img, button_set,
//                // select, multi_select, color, date, divide, info, upload
//                'title' => __('API Key', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Enter the API Key of your Fresh Store.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is retrieved from the Fresh Store Dashboard.', SJAWP_TEXT_DOMAIN),
//                //'validate' => '', // Built-in validation includes:
//                //  email, html, html_custom, no_html, js, numeric, comma_numeric, url, str_replace, preg_replace
//                //'msg' => 'custom error message', // Override the default validation error message for specific fields
//                //'std' => '', // This is the default value and is used to set an option on theme activation.
//                //'class' => '' // Set custom classes for elements if you want to do something a little different
//                //'rows' => '6' // Set the number of rows shown for the textarea. Default: 6
//            ),
//            array(
//                'id' => 'fsbsecret', // The item ID must be unique
//                'type' => 'text', // Built-in field types include:
//                // text, textarea, editor, checkbox, multi_checkbox, radio, radio_img, button_set,
//                // select, multi_select, color, date, divide, info, upload
//                'title' => __('API Secret Key', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Enter the API Secret Key of your Fresh Store.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is retrieved from the Fresh Store Dashboard.', SJAWP_TEXT_DOMAIN),
//                //'validate' => '', // Built-in validation includes:
//                //  email, html, html_custom, no_html, js, numeric, comma_numeric, url, str_replace, preg_replace
//                //'msg' => 'custom error message', // Override the default validation error message for specific fields
//                //'std' => '', // This is the default value and is used to set an option on theme activation.
//                //'class' => '' // Set custom classes for elements if you want to do something a little different
//                //'rows' => '6' // Set the number of rows shown for the textarea. Default: 6
//            ),
//            array(
//                'id' => 'fsburl', // The item ID must be unique
//                'type' => 'text', // Built-in field types include:
//                // text, textarea, editor, checkbox, multi_checkbox, radio, radio_img, button_set,
//                // select, multi_select, color, date, divide, info, upload
//                'title' => __('Store URL', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('The base url of your Fresh Store.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('', SJAWP_TEXT_DOMAIN),
//                //'validate' => '', // Built-in validation includes:
//                //  email, html, html_custom, no_html, js, numeric, comma_numeric, url, str_replace, preg_replace
//                //'msg' => 'custom error message', // Override the default validation error message for specific fields
//                //'std' => '', // This is the default value and is used to set an option on theme activation.
//                //'class' => '' // Set custom classes for elements if you want to do something a little different
//                //'rows' => '6' // Set the number of rows shown for the textarea. Default: 6
//            ))
    );

//    $sections[] = array(
//		// Redux uses the Font Awesome iconfont to supply its default icons.
//		// If $args['icon_type'] = 'iconfont', this should be the icon name minus 'icon-'.
//		// If $args['icon_type'] = 'image', this should be the path to the icon.
//		'icon' => 'paper-clip',
//		// Set the class for this icon.
//		// This field is ignored unless $args['icon_type'] = 'iconfont'
//		'icon_class' => 'icon-large',
//        'title' => __('Getting Started', SJAWP_TEXT_DOMAIN),
//		'desc' => __('<p class="description">This is the description field for this section. HTML is allowed</p>', SJAWP_TEXT_DOMAIN),
//        // Lets leave this as a blank section, no options just some intro text set above.
//        //'fields' => array()
//    );

//    $sections[] = array(
//		'icon' => 'edit',
//		'icon_class' => 'icon-large',
//        'title' => __('Text Fields', SJAWP_TEXT_DOMAIN),
//        'desc' => __('<p class="description">This is the description field for this section. Again HTML is allowed2</p>', SJAWP_TEXT_DOMAIN),
//        'fields' => array(
//            array(
//                'id' => '1', // The item ID must be unique
//                'type' => 'text', // Built-in field types include:
//                // text, textarea, editor, checkbox, multi_checkbox, radio, radio_img, button_set,
//                // select, multi_select, color, date, divide, info, upload
//                'title' => __('Text Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('This is a little space under the field title which can be used for additonal info.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                //'validate' => '', // Built-in validation includes:
//                //  email, html, html_custom, no_html, js, numeric, comma_numeric, url, str_replace, preg_replace
//                //'msg' => 'custom error message', // Override the default validation error message for specific fields
//                //'std' => '', // This is the default value and is used to set an option on theme activation.
//                //'class' => '' // Set custom classes for elements if you want to do something a little different
//                //'rows' => '6' // Set the number of rows shown for the textarea. Default: 6
//			),
//            array(
//                'id' => '2',
//                'type' => 'text',
//                'title' => __('Text Option - Email Validated', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('This is a little space under the field title which can be used for additonal info.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate' => 'email',
//                'msg' => 'custom error message',
//                'std' => 'test@test.com'
//            ),
//            array(
//                'id' => 'password',
//                'type' => 'password',
//                'title' => __('Password Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('This is a little space under the field title which can be used for additonal info.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN)
//            ),
//            array(
//                'id' => 'multi_text',
//                'type' => 'multi_text',
//                'title' => __('Multi Text Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('This is a little space under the field title which can be used for additonal info.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//            ),
//            array(
//                'id' => '3',
//                'type' => 'text',
//                'title' => __('Text Option - URL Validated', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('This must be a URL.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate' => 'url',
//                'std' => 'http://reduxframework.com'
//            ),
//            array(
//                'id' => '4',
//                'type' => 'text',
//                'title' => __('Text Option - Numeric Validated', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('This must be numeric.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate' => 'numeric',
//                'std' => '0',
//                'class' => 'small-text'
//            ),
//            array(
//                'id' => 'comma_numeric',
//                'type' => 'text',
//                'title' => __('Text Option - Comma Numeric Validated', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('This must be a comma seperated string of numerical values.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate' => 'comma_numeric',
//                'std' => '0',
//                'class' => 'small-text'
//            ),
//            array(
//                'id' => 'no_special_chars',
//                'type' => 'text',
//                'title' => __('Text Option - No Special Chars Validated', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('This must be a alpha numeric only.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate' => 'no_special_chars',
//                'std' => '0'
//            ),
//            array(
//                'id' => 'str_replace',
//                'type' => 'text',
//                'title' => __('Text Option - Str Replace Validated', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('You decide.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate' => 'str_replace',
//                'str' => array('search' => ' ', 'replacement' => 'thisisaspace'),
//                'std' => '0'
//            ),
//            array(
//                'id' => 'preg_replace',
//                'type' => 'text',
//                'title' => __('Text Option - Preg Replace Validated', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('You decide.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate' => 'preg_replace',
//                'preg' => array('pattern' => '/[^a-zA-Z_ -]/s', 'replacement' => 'no numbers'),
//                'std' => '0'
//            ),
//            array(
//                'id' => 'custom_validate',
//                'type' => 'text',
//                'title' => __('Text Option - Custom Callback Validated', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('You decide.', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate_callback' => 'validate_callback_function',
//                'std' => '0'
//            ),
//            array(
//                'id' => '5',
//                'type' => 'textarea',
//                'title' => __('Textarea Option - No HTML Validated', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('All HTML will be stripped', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate' => 'no_html',
//                'std' => 'No HTML is allowed in here.'
//            ),
//            array(
//                'id' => '6',
//                'type' => 'textarea',
//                'title' => __('Textarea Option - HTML Validated', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('HTML Allowed', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate' => 'html', // See http://codex.wordpress.org/Function_Reference/wp_kses_post
//                'std' => 'HTML is allowed in here.'
//            ),
//            array(
//                'id' => '7',
//                'type' => 'textarea',
//                'title' => __('Textarea Option - HTML Validated Custom', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Custom HTML Allowed', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate' => 'html_custom',
//                'std' => 'Some HTML is allowed in here.',
//                'allowed_html' => array('') // See http://codex.wordpress.org/Function_Reference/wp_kses
//            ),
//            array(
//                'id' => '8',
//                'type' => 'textarea',
//                'title' => __('Textarea Option - JS Validated', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('JS will be escaped', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'validate' => 'js'
//            ),
//            array(
//                'id' => '9',
//                'type' => 'editor',
//                'title' => __('Editor Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Can also use the validation methods if required', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'std' => 'OOOOOOhhhh, rich editing.',
//            ),
//            array(
//                'id' => 'editor2',
//                'type' => 'editor',
//                'title' => __('Editor Option 2', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Can also use the validation methods if required', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'std' => 'OOOOOOhhhh, rich editing with auto paragraphs disabled.',
//                'autop' => false
//            )
//        )
//    );
    
//    $sections[] = array(
//		'icon' => 'check',
//		'icon_class' => 'icon-large',
//        'title' => __('Radio/Checkbox Fields', SJAWP_TEXT_DOMAIN),
//        'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', SJAWP_TEXT_DOMAIN),
//        'fields' => array(
//            array(
//                'id' => 'switch',
//                'type' => 'checkbox',
//                'title' => __('Switch Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'switch' => true,
//                'std' => '1' // 1 = checked | 0 = unchecked
//            ),
//            array(
//                'id' => '10',
//                'type' => 'checkbox',
//                'title' => __('Checkbox Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'switch' => false,
//                'std' => '1' // 1 = checked | 0 = unchecked
//            ),
//            array(
//                'id' => '11',
//                'type' => 'multi_checkbox',
//                'title' => __('Multi Checkbox Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'options' => array('1' => 'Opt 1', '2' => 'Opt 2', '3' => 'Opt 3'), // Must provide key => value pairs for multi checkbox options
//                'std' => array('1' => '1', '2' => '0', '3' => '0') // See how std has changed? You also dont need to specify opts that are 0.
//            ),
//            array(
//                'id' => '12',
//                'type' => 'radio',
//                'title' => __('Radio Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'options' => array('1' => 'Opt 1', '2' => 'Opt 2', '3' => 'Opt 3'), // Must provide key => value pairs for radio options
//                'std' => '2'
//            ),
//            array(
//                'id' => '13',
//                'type' => 'radio_img',
//                'title' => __('Radio Image Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'options' => array(
//                    '1' => array('title' => 'Opt 1', 'img' => 'images/align-none.png'),
//                    '2' => array('title' => 'Opt 2', 'img' => 'images/align-left.png'),
//                    '3' => array('title' => 'Opt 3', 'img' => 'images/align-center.png'),
//                    '4' => array('title' => 'Opt 4', 'img' => 'images/align-right.png')
//                ), // Must provide key => value(array:title|img) pairs for radio options
//                'std' => '2'
//            ),
//            array(
//                'id' => 'radio_img',
//                'type' => 'radio_img',
//                'title' => __('Radio Image Option For Layout', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This uses some of the built in images, you can use them for layout options.', SJAWP_TEXT_DOMAIN),
//                'options' => array(
//                    '1' => array('title' => '1 Column', 'img' => Redux_OPTIONS_URL . 'img/1col.png'),
//                    '2' => array('title' => '2 Column Left', 'img' => Redux_OPTIONS_URL . 'img/2cl.png'),
//                    '3' => array('title' => '2 Column Right', 'img' => Redux_OPTIONS_URL . 'img/2cr.png')
//                ), // Must provide key => value(array:title|img) pairs for radio options
//                'std' => '2'
//            )
//        )
//    );
    
//    $sections[] = array(
//		'icon' => 'list-alt',
//		'icon_class' => 'icon-large',
//        'title' => __('Select Fields', SJAWP_TEXT_DOMAIN),
//        'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', SJAWP_TEXT_DOMAIN),
//        'fields' => array(
//            array(
//                'id' => '14',
//                'type' => 'select',
//                'title' => __('Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'options' => array('1' => 'Opt 1', '2' => 'Opt 2', '3' => 'Opt 3'), // Must provide key => value pairs for select options
//                'std' => '2'
//            ),
//            array(
//                'id' => '15',
//                'type' => 'multi_select',
//                'title' => __('Multi Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'options' => array('1' => 'Opt 1', '2' => 'Opt 2', '3' => 'Opt 3'), // Must provide key => value pairs for radio options
//                'std' => array('2', '3')
//            )
//        )
//    );
    
//    $sections[] = array(
//		'icon' => 'cogs',
//		'icon_class' => 'icon-large',
//        'title' => __('Custom Fields', SJAWP_TEXT_DOMAIN),
//        'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', SJAWP_TEXT_DOMAIN),
//        'fields' => array(
//            array(
//                'id' => '16',
//                'type' => 'color',
//                'title' => __('Color Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Only color validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'std' => '#FFFFFF'
//            ),
//            array(
//                'id' => 'color_gradient',
//                'type' => 'color_gradient',
//                'title' => __('Color Gradient Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Only color validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'std' => array('from' => '#000000', 'to' => '#FFFFFF')
//            ),
//            array(
//                'id' => '17',
//                'type' => 'date',
//                'title' => __('Date Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN)
//            ),
//            array(
//                'id' => '18',
//                'type' => 'button_set',
//                'title' => __('Button Set Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN),
//                'options' => array('1' => 'Opt 1', '2' => 'Opt 2', '3' => 'Opt 3'), // Must provide key => value pairs for radio options
//                'std' => '2'
//			),
//            array(
//                'id' => '19',
//                'type' => 'upload',
//                'title' => __('Upload Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN)
//            ),
//            array(
//                'id' => 'pages_select',
//                'type' => 'pages_select',
//                'title' => __('Pages Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a drop down menu of all the sites pages.', SJAWP_TEXT_DOMAIN),
//                'args' => array() // Uses get_pages()
//            ),
//            array(
//                'id' => 'pages_multi_select',
//                'type' => 'pages_multi_select',
//                'title' => __('Pages Multiple Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a multi select menu of all the sites pages.', SJAWP_TEXT_DOMAIN),
//                'args' => array('number' => '5') // Uses get_pages()
//            ),
//            array(
//                'id' => 'posts_select',
//                'type' => 'posts_select',
//                'title' => __('Posts Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a drop down menu of all the sites posts.', SJAWP_TEXT_DOMAIN),
//                'args' => array('numberposts' => '10') // Uses get_posts()
//            ),
//            array(
//                'id' => 'posts_multi_select',
//                'type' => 'posts_multi_select',
//                'title' => __('Posts Multiple Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a multi select menu of all the sites posts.', SJAWP_TEXT_DOMAIN),
//                'args' => array('numberposts' => '10') // Uses get_posts()
//            ),
//            array(
//                'id' => 'tags_select',
//                'type' => 'tags_select',
//                'title' => __('Tags Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a drop down menu of all the sites tags.', SJAWP_TEXT_DOMAIN),
//                'args' => array('number' => '10') // Uses get_tags()
//            ),
//            array(
//                'id' => 'tags_multi_select',
//                'type' => 'tags_multi_select',
//                'title' => __('Tags Multiple Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a multi select menu of all the sites tags.', SJAWP_TEXT_DOMAIN),
//                'args' => array('number' => '10') // Uses get_tags()
//            ),
//            array(
//                'id' => 'cats_select',
//                'type' => 'cats_select',
//                'title' => __('Cats Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a drop down menu of all the sites cats.', SJAWP_TEXT_DOMAIN),
//                'args' => array('number' => '10') // Uses get_categories()
//            ),
//            array(
//                'id' => 'cats_multi_select',
//                'type' => 'cats_multi_select',
//                'title' => __('Cats Multiple Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a multi select menu of all the sites cats.', SJAWP_TEXT_DOMAIN),
//                'args' => array('number' => '10') // Uses get_categories()
//            ),
//            array(
//                'id' => 'menu_select',
//                'type' => 'menu_select',
//                'title' => __('Menu Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a drop down menu of all the sites menus.', SJAWP_TEXT_DOMAIN),
//                //'args' => array() // Uses wp_get_nav_menus()
//            ),
//            array(
//                'id' => 'select_hide_below',
//                'type' => 'select_hide_below',
//                'title' => __('Select Hide Below Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field requires certain options to be checked before the below field will be shown.', SJAWP_TEXT_DOMAIN),
//                'options' => array(
//                    '1' => array('name' => 'Opt 1 field below allowed', 'allow' => 'true'),
//                    '2' => array('name' => 'Opt 2 field below hidden', 'allow' => 'false'),
//                    '3' => array('name' => 'Opt 3 field below allowed', 'allow' => 'true')
//                ), // Must provide key => value(array) pairs for select options
//                'std' => '2'
//            ),
//            array(
//                'id' => 'menu_location_select',
//                'type' => 'menu_location_select',
//                'title' => __('Menu Location Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a drop down menu of all the themes menu locations.', SJAWP_TEXT_DOMAIN)
//            ),
//            array(
//                'id' => 'checkbox_hide_below',
//                'type' => 'checkbox_hide_below',
//                'title' => __('Checkbox to hide below', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a checkbox which will allow the user to use the next setting.', SJAWP_TEXT_DOMAIN),
//            ),
//            array(
//                'id' => 'post_type_select',
//                'type' => 'post_type_select',
//                'title' => __('Post Type Select Option', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('No validation can be done on this field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This field creates a drop down menu of all registered post types.', SJAWP_TEXT_DOMAIN),
//                //'args' => array() // Uses get_post_types()
//            ),
//            array(
//                'id' => 'custom_callback',
//                //'type' => 'nothing', // Doesn't need to be called for callback fields
//                'title' => __('Custom Field Callback', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('This is a completely unique field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is created with a callback function, so anything goes in this field. Make sure to define the function though.', SJAWP_TEXT_DOMAIN),
//                'callback' => 'my_custom_field'
//            ),
//            array(
//                'id' => 'google_webfonts',
//                'type' => 'google_webfonts',
//                'title' => __('Google Webfonts', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('This is a completely unique field type', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is a simple implementation of the developer API for Google Webfonts. Don\'t forget to set your API key!', SJAWP_TEXT_DOMAIN)
//            )
//        )
//    );

//    $sections[] = array(
//		'icon' => 'eye-open',
//		'icon_class' => 'icon-large',
//        'title' => __('Non Value Fields', SJAWP_TEXT_DOMAIN),
//        'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', SJAWP_TEXT_DOMAIN),
//        'fields' => array(
//            array(
//                'id' => '20',
//                'type' => 'text',
//                'title' => __('Text Field', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Additional Info', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN)
//            ),
//            array(
//                'id' => '21',
//                'type' => 'divide'
//            ),
//            array(
//                'id' => '22',
//                'type' => 'text',
//                'title' => __('Text Field', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Additional Info', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN)
//            ),
//            array(
//                'id' => '23',
//                'type' => 'info',
//                'desc' => __('<p class="description">This is the info field, if you want to break sections up.</p>', SJAWP_TEXT_DOMAIN)
//            ),
//            array(
//                'id' => '24',
//                'type' => 'text',
//                'title' => __('Text Field', SJAWP_TEXT_DOMAIN),
//                'sub_desc' => __('Additional Info', SJAWP_TEXT_DOMAIN),
//                'desc' => __('This is the description field, again good for additional info.', SJAWP_TEXT_DOMAIN)
//            )
//        )
//    );
                
    $tabs = array();

    if (function_exists('wp_get_theme')){
        $theme_data = wp_get_theme();
        $item_uri = $theme_data->get('ThemeURI');
        $description = $theme_data->get('Description');
        $author = $theme_data->get('Author');
        $author_uri = $theme_data->get('AuthorURI');
        $version = $theme_data->get('Version');
        $tags = $theme_data->get('Tags');
    }else{
        $theme_data = get_theme_data(trailingslashit(get_stylesheet_directory()) . 'style.css');
        $item_uri = $theme_data['URI'];
        $description = $theme_data['Description'];
        $author = $theme_data['Author'];
        $author_uri = $theme_data['AuthorURI'];
        $version = $theme_data['Version'];
        $tags = $theme_data['Tags'];
     }
    
    $item_info = '<div class="redux-opts-section-desc">';
    $item_info .= '<p class="redux-opts-item-data description item-uri">' . __('<strong>Theme URL:</strong> ', SJAWP_TEXT_DOMAIN) . '<a href="' . $item_uri . '" target="_blank">' . $item_uri . '</a></p>';
    $item_info .= '<p class="redux-opts-item-data description item-author">' . __('<strong>Author:</strong> ', SJAWP_TEXT_DOMAIN) . ($author_uri ? '<a href="' . $author_uri . '" target="_blank">' . $author . '</a>' : $author) . '</p>';
    $item_info .= '<p class="redux-opts-item-data description item-version">' . __('<strong>Version:</strong> ', SJAWP_TEXT_DOMAIN) . $version . '</p>';
    $item_info .= '<p class="redux-opts-item-data description item-description">' . $description . '</p>';

//    if ( strtolower ($author_uri) == "http://www.freshdevelopment.org/" ){
//        $item_info .= '<p class="redux-opts-item-data description item-description">* This theme was designed to work with the Fresh Plugin</p>'; }

//    $item_info .= '<p class="redux-opts-item-data description item-tags">' . __('<strong>Tags:</strong> ', SJAWP_TEXT_DOMAIN) . implode(', ', $tags) . '</p>';
    $item_info .= '</div>';

//    $tabs['item_info'] = array(
//		'icon' => 'info-sign',
//		'icon_class' => 'icon-large',
//        'title' => __('Theme Information', SJAWP_TEXT_DOMAIN),
//        'content' => $item_info
//    );
    
    if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
        $tabs['docs'] = array(
			'icon' => 'book',
			'icon_class' => 'icon-large',
            'title' => __('Documentation', SJAWP_TEXT_DOMAIN),
            'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
        );
    }

//    $docs = '<div class="redux-opts-section-desc">';
//    $docs .= '<h4>Information about the Widgets</p>';
//    $docs .= '<p class="redux-opts-item-data description item-description">Information on using shortcodes</p>';
//    $docs .= '</div>';
//
//    $tabs['fsb_docs'] = array(
//        'icon' => 'info-sign',
//        'icon_class' => 'icon-large',
//        'title' => __('Fresh Plugin Docs', SJAWP_TEXT_DOMAIN),
//        'content' => $docs
//    );

    global $Redux_Options;
    $Redux_Options = new Redux_Options($sections, $args, $tabs);

}
add_action('init', 'fsbwp_setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function fsbwp_my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function fsbwp_validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    /*
    do your validation
    
    if(something) {
        $value = $value;
    } elseif(somthing else) {
        $error = true;
        $value = $existing_value;
        $field['msg'] = 'your custom error message';
    }
    */
    
    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}
