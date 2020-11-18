<?php
/**
 * Igl2020 Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package igl2020
 */



if ( ! function_exists( 'igl2020_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function igl2020_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'igl2020', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		add_theme_support( 'custom-logo'  );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		//used for the small images of projects
		add_image_size( 'igl-small-image', 400, 9999, false );

		//used for the large images of projects
		add_image_size( 'igl-large-image', 1920, 9999, false );

		// Used for single project full view
		add_image_size( 'igl-fullview-image', 2560, 2560, false );

		//used for blog archive
		add_image_size( 'igl-square-image', 350, 350, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'igl2020' ),
			'social' => esc_html__( 'Social Menu', 'igl2020' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'gallery',
			'video',
			'audio',
			'quote',
			'link',
		) );

		add_filter( 'attachment_link', 'igl2020_filter_attachment_links_on_singles', 2, 2 );
	}
endif; 
add_action( 'after_setup_theme', 'igl2020_setup' );

/**
 * We need to force ajax off attachment links on posts and pages since it is a chance to trigger a modal opening
 * and an ajax call
 * @param $link
 * @param $id
 *
 * @return string
 */
function igl2020_filter_attachment_links_on_singles( $link, $id  ){
	if ( wp_attachment_is_image( $id ) && ( is_singular( 'post' ) || is_page()) ) {
		return $link . '#';
	}
	return $link;
}

/*
 * Disable comments for specific thing
 */
function igl2020_remove_custom_post_comment() {
	//remove_post_type_support( 'jetpack-portfolio', 'comments' );
}
add_action( 'init', 'igl2020_remove_custom_post_comment' );

/**
 * Enqueue scripts and styles.
 */
function igl_scripts_styles() {

	$theme = wp_get_theme( get_template() );
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Main Style - we use this path instead of get_stylesheet_uri() so a child theme can extend this not override it.
	wp_enqueue_style( 'igl2020-style', get_template_directory_uri() . '/style.css', array( 'wp-mediaelement' ), $theme->get( 'Version' ) );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.css', array( 'wp-mediaelement' ), $theme->get( 'Version' ) );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick-theme.css', array( 'wp-mediaelement' ), $theme->get( 'Version' ) );

	$script_dependencies = array( 'jquery', 'wp-mediaelement' );


	wp_enqueue_script( 'slick-slider',  get_template_directory_uri().'/node_modules/slick-carousel/slick/slick.js', $script_dependencies,  $theme->get( 'Version' ), true );

	
	wp_register_script( 'igl-scripts', get_template_directory_uri() . '/assets/js/main/scripts.js', $script_dependencies, $theme->get( 'Version' ), true );



	// Enqueued script with localized data.
	//wp_enqueue_script( 'sss' );
	wp_enqueue_script( 'igl-scripts' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}




}
add_action( 'wp_enqueue_scripts', 'igl_scripts_styles' );




function wp_nav_menu_no_ul()
{
    $options = array(
        'echo' => false,
        'container' => false,
        'theme_location' => 'primary',
        'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);

}

function default_page_menu() {
   wp_list_pages('title_li=');
} 

function latest_sticky($type) { 
 
	/* Get all sticky posts */
	$sticky = get_option( 'sticky_posts' );
	 $stickyarray;
	/* Sort the stickies with the newest ones at the top */
	rsort( $sticky );
	 
	/* Get the 5 newest stickies (change 5 for a different number) */
	$sticky = array_slice( $sticky, 0, 1 );
	 
	/* Query sticky posts */
	$the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1, 'category_name' => $type) );
	// The Loop
	if ( $the_query->have_posts() ) {
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$stickyarray['link'] = get_permalink();
			$stickyarray['title'] =  get_the_title();
			$stickyarray['thumb'] =  get_the_post_thumbnail_url();
			$stickyarray['excerpt'] =   substr(substr(get_the_excerpt(), 0, 260), 0, strrpos(substr(get_the_excerpt(), 0, 260), ' '));
			$stickyarray['date'] = get_the_date();
			$stickyarray['none'] = false;
		}

	} else {
		$stickyarray['none'] = true;
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	 
	return $stickyarray; 
	 
	} 

	function get_some_posts($type,$paginated = false,$paged = 0,$tag = null) { 
		$the_query;
		if($tag!=null){
			$the_query = new WP_Query( array( 'category_name' => $type,  'tag' => $tag) );
		}else{
			if($paginated == true){
				$the_query = new WP_Query( array( 'category_name' => $type,  'posts_per_page' => 6, 'paged' => $paged) );
			}else{
				$the_query = new WP_Query( array( 'category_name' => $type) );
			}
		}
	
		/* Query sticky posts */
		
		// The Loop
		$x = 0;
		if($paginated==true){
			$published_posts = $the_query->found_posts;
			$page_number_max = ceil($published_posts / 6);
		}else{
			$page_number_max = 100;
		}

		if ( $the_query->have_posts() ) {
			
			while ( $the_query->have_posts() ) {
				$querymax = $the_query->max_num_pages;
				$the_query->the_post();
				$stickyarray[$x]['link'] = get_permalink();
				$stickyarray[$x]['title'] =  get_the_title();
				$stickyarray[$x]['thumb'] =  get_the_post_thumbnail_url();
				if($type=='Trip Quotes' || $type=='Campaign Hero Blurb' || $type=='Sponsorship' || $type=='Featured Need' || $type=='Homepage Block' || $type == 'Staff' || $type == 'Sam Stephens' || $type == 'Featured Fund' || $type == 'Mission Opportunities' || $type == 'Trip Blurbs'){
					
					if($type=='Campaign Hero Blurb' || $type == 'Trip Blurbs'){
						$stickyarray[$x]['excerpt'] = get_the_content();
					}else{
						$stickyarray[$x]['excerpt'] =  strip_tags(get_the_content());
					}
				}else{
					$stickyarray[$x]['excerpt'] =   substr(substr(get_the_excerpt(), 0, 260), 0, strrpos(substr(get_the_excerpt(), 0, 260), ' '));
				}
				
				$stickyarray[$x]['date'] = get_the_date();
				$stickyarray[$x]['subtext'] = get_post_meta( get_the_ID(), 'sub-text', true );
				$stickyarray[$x]['buttontext'] = get_post_meta( get_the_ID(), 'buttontext', true );
				$stickyarray[$x]['email'] = get_post_meta( get_the_ID(), 'email', true );
				$stickyarray[$x]['speciallink'] = get_post_meta( get_the_ID(), 'special-link', true );
				$stickyarray[$x]['order'] = get_post_meta( get_the_ID(), 'hp-order', true );
				$stickyarray[$x]['disablefeaturedfund'] = get_post_meta( get_the_ID(), 'disable_ff', true );
				$max = false;
				if($paged==$page_number_max){$max=true;};
				$stickyarray[$x]['maxpage']  = $published_posts;
				$x++;
			}
			if($type=='Homepage Block'){
				$sort = array_column($stickyarray, 'order');
				array_multisort($sort, SORT_ASC, $stickyarray);
			}
	
		} else {
		
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		 
		return $stickyarray; 
		 
		} 

		class igl_Customize {

			public static function register ( $wp_customize ) {
				//1. Define a new section (if desired) to the Theme Customizer
				$wp_customize->add_section( 'igl_options', 
				array(
				'title'       => __( 'IGL Options', 'igl' ), //Visible title of section
				'priority'    => 35, //Determines what order this appears in
				'capability'  => 'edit_theme_options', //Capability needed to tweak
				'description' => __('Allows you to customize some example settings for igl.', 'igl'), //Descriptive tooltip

				) 
				);

				//2. Register new settings to the WP database...
				$wp_customize->add_setting( 'footer_text', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
				array(
				'default'    => '', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
				) 
				);      

				//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
				$wp_customize->add_control(  //Instantiate the color control class

				'footer_text', //Set a unique ID for the control
				array(
				'label'      => __( 'Footer Text', 'igl' ), //Admin-visible name of the control
				'type'		=>   'textarea',
				'settings'   => 'footer_text', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 10, //Determines the order this control appears in for the specified section
				'section'    => 'igl_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				) 
				);

				//2. Register new settings to the WP database...
				$wp_customize->add_setting( 'homepage_slogan', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
				array(
				'default'    => '', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
				) 
				);      

				//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
				$wp_customize->add_control(  //Instantiate the color control class

				'homepage_slogan', //Set a unique ID for the control
				array(
				'label'      => __( 'Homepage Slogan', 'igl' ), //Admin-visible name of the control
				'type'		 =>   'textarea',
				'settings'   => 'homepage_slogan', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 10, //Determines the order this control appears in for the specified section
				'section'    => 'static_front_page', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				) 
				);

				//2. Register new settings to the WP database...
				$wp_customize->add_setting( 'homepage_left_button', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
				array(
				'default'    => '', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
				) 
				);      

				//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
				$wp_customize->add_control(  //Instantiate the color control class

				'homepage_left_button', //Set a unique ID for the control
				array(
				'label'      => __( 'Homepage Left Button Text (&Nav Button)', 'igl' ), //Admin-visible name of the control
				'settings'   => 'homepage_left_button', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 10, //Determines the order this control appears in for the specified section
				'section'    => 'static_front_page', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				) 
				);


				//2. Register new settings to the WP database...
				$wp_customize->add_setting( 'homepage_left_button_link', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
				array(
				'default'    => '', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
				) 
				);      

				//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
				$wp_customize->add_control(  //Instantiate the color control class

				'homepage_left_button_link', //Set a unique ID for the control
				array(
				'label'      => __( 'Homepage Left Button Link (&Nav Button)', 'igl' ), //Admin-visible name of the control
				'settings'   => 'homepage_left_button_link', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 10, //Determines the order this control appears in for the specified section
				'section'    => 'static_front_page', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				) 
				);
				//2. Register new settings to the WP database...
				$wp_customize->add_setting( 'homepage_right_button', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
				array(
				'default'    => '', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
				) 
				);      

				//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
				$wp_customize->add_control(  //Instantiate the color control class

				'homepage_right_button', //Set a unique ID for the control
				array(
				'label'      => __( 'Homepage Right Button Text', 'igl' ), //Admin-visible name of the control
				'settings'   => 'homepage_right_button', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 10, //Determines the order this control appears in for the specified section
				'section'    => 'static_front_page', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				) 
				);


				//2. Register new settings to the WP database...
				$wp_customize->add_setting( 'homepage_right_button_link', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
				array(
				'default'    => '', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
				) 
				);      

				//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
				$wp_customize->add_control(  //Instantiate the color control class

				'homepage_right_button_link', //Set a unique ID for the control
				array(
				'label'      => __( 'Homepage Right Button Link', 'igl' ), //Admin-visible name of the control
				'settings'   => 'homepage_right_button_link', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 10, //Determines the order this control appears in for the specified section
				'section'    => 'static_front_page', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				) 
				);



				$wp_customize->add_setting( 'nav_button', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
				array(
				'default'    => '', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
				) 
				);      

				//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
				$wp_customize->add_control(  //Instantiate the color control class

				'nav_button', //Set a unique ID for the control
				array(
				'label'      => __( 'Nav Button Text', 'igl' ), //Admin-visible name of the control
				'settings'   => 'nav_button', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 10, //Determines the order this control appears in for the specified section
				'section'    => 'nav_menus', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				) 
				);


				//2. Register new settings to the WP database...
				$wp_customize->add_setting( 'nav_button_link', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
				array(
				'default'    => '', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
				) 
				);      

				//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
				$wp_customize->add_control(  //Instantiate the color control class

				'nav_button_link', //Set a unique ID for the control
				array(
				'label'      => __( 'Nav Button Link', 'igl' ), //Admin-visible name of the control
				'settings'   => 'nav_button_link', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 10, //Determines the order this control appears in for the specified section
				'section'    => 'nav_menus', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				) 
				);




				//2. Register new settings to the WP database...
				$wp_customize->add_setting( 'homepage_middle_header', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
				array(
				'default'    => '', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
				) 
				);      

				//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
				$wp_customize->add_control(  //Instantiate the color control class

				'homepage_middle_header', //Set a unique ID for the control
				array(
				'label'      => __( 'Homepage Middle Header', 'igl' ), //Admin-visible name of the control
				'settings'   => 'homepage_middle_header', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 10, //Determines the order this control appears in for the specified section
				'section'    => 'static_front_page', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				) 
				);
					
				//2. Register new settings to the WP database...
				$wp_customize->add_setting( 'homepage_middle_blurb', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
				array(
				'default'    => '', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
				) 
				);      

				//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
				$wp_customize->add_control(  //Instantiate the color control class

				'homepage_middle_blurb', //Set a unique ID for the control
				array(
				'label'      => __( 'Homepage Middle Header Blurb', 'igl' ), //Admin-visible name of the control
				'settings'   => 'homepage_middle_blurb', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 10, //Determines the order this control appears in for the specified section
				'section'    => 'static_front_page', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				) 
				);
				$wp_customize -> add_setting('spons1', array(
					'default' => '', 
					'type' => 'theme_mod'
				
				));
				$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'spons1', array(
					'label' => __( 'Sponsorships Extra Image 1', 'igl' ),
					'section' => 'igl_options',
					'mime_type' => 'image',
				  ) ) );

				  $wp_customize -> add_setting('spons2', array(
					'default' => '', 
					'type' => 'theme_mod'
				
				));
				$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'spons2', array(
					'label' => __( 'Sponsorships Extra Image 2', 'igl' ),
					'section' => 'igl_options',
					'mime_type' => 'image',
				  ) ) );

				  $wp_customize -> add_setting('spons3', array(
					'default' => '', 
					'type' => 'theme_mod'
				
				));
				$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'spons3', array(
					'label' => __( 'Sponsorships Extra Image 3', 'igl' ),
					'section' => 'igl_options',
					'mime_type' => 'image',
				  ) ) );

				  $wp_customize -> add_setting('spons4', array(
					'default' => '', 
					'type' => 'theme_mod'
				
				));
				$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'spons4', array(
					'label' => __( 'Sponsorships Extra Image 4', 'igl' ),
					'section' => 'igl_options',
					'mime_type' => 'image',
				  ) ) );

				  $wp_customize -> add_setting('tripslide1', array(
					'default' => '', 
					'type' => 'theme_mod'
				
				));
				$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'tripslide1', array(
					'label' => __( 'Trips Slider 1 Background', 'igl' ),
					'section' => 'igl_options',
					'mime_type' => 'image',
				  ) ) );
				  $wp_customize -> add_setting('tripslide2', array(
					'default' => '', 
					'type' => 'theme_mod'
				
				));
				$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'tripslide2', array(
					'label' => __( 'Trips Slider 2 Background', 'igl' ),
					'section' => 'igl_options',
					'mime_type' => 'image',
				  ) ) );
			   
				$newSettings = array(
					array(
						'slug' => 'sam_stephens_toggle',
						'name' => 'Sam Stephens Toggle',
						'section' => 'igl_options',
						'type' => 'checkbox'
					),
					array(
						'slug' => 'sponshorships_quote',
						'name' => 'Big Quote on Sponsorships Page',
						'section' => 'igl_options',
						'type' => 'textarea'
					),
					array(
						'slug' => 'sponshorships_quote_attribution',
						'name' => 'Sponsorship Quote Attribution',
						'section' => 'igl_options',
						'type' => 'textbox'
					),
					array(
						'slug' => 'top_alert_name',
						'name' => 'Alert Name (top of trip page)',
						'section' => 'igl_options',
						'type' => 'textbox'
					),
					array(
						'slug' => 'top_alert',
						'name' => 'Alert Text (top of trip page)',
						'section' => 'igl_options',
						'type' => 'textbox'
					),
					array(
						'slug' => 'top_alert_contact',
						'name' => 'Alert Contact Name (top of trip page)',
						'section' => 'igl_options',
						'type' => 'textbox'
					),
					array(
						'slug' => 'top_alert_email',
						'name' => 'Alert Contact Email (top of trip page)',
						'section' => 'igl_options',
						'type' => 'textbox'
					),
				);
				foreach($newSettings as $setting){
					
					
					$wp_customize->add_setting( $setting['slug'],
					array(
					'default'    => '', 
					'type'       => 'theme_mod', 
					'capability' => 'edit_theme_options', 
					'transport'  => 'refresh',
					) 
					);      
					$wp_customize->add_control($setting['slug'],
					array(
					'label'      => __( $setting['name'], 'igl' ), 
					'type'		 =>   $setting['type'],
					'settings'   => $setting['slug'], 
					'priority'   => 10,
					'section'    => $setting['section'], 
					) 
					);
				}

			}


		}
	
		add_action( 'customize_register' , array( 'igl_Customize' , 'register' ) );
	

		 // Setup the Theme Customizer settings and controls...
	
	

	function get_homepage_slider_images(){

	$the_query = new WP_Query( array( 'category_name' => 'homepage-slider-image') );
	$x = 0;
	$images = [];
	if ( $the_query->have_posts() ) {

	while ( $the_query->have_posts() ) {
	$the_query->the_post();
	$images[$x]=get_the_post_thumbnail_url();
	$x++;
	}

	}

	wp_reset_postdata();
	return $images;
	}

	add_filter('acf/settings/remove_wp_meta_box', '__return_false');

