<?php
/**
 * Theme Customizer
 *
 * @package TeamOne
 */
function teamone_customize_register($wp_customize){
	$wp_customize->add_section('teamone_theme_options', array(
        'title'    => esc_attr__('Theme Options', 'teamone'),
        'priority' => 125,
    ));
	
	$wp_customize->add_section('social_icons', array(
        'title'    => esc_attr__('Social Media Icons', 'teamone'),
        'priority' => 135,
    ));
	
	
	$wp_customize->add_setting(
    'twitter_account',
    array(
        'default' => '',
		'sanitize_callback' => 'esc_url_raw',
    )
	);

	$wp_customize->add_control(
    'twitter_account',
    	array(
        	'label' => esc_attr__('Twitter Account URL', 'teamone'),
        	'section' => 'social_icons',
        	'type' => 'text',
    	)
	);

	$wp_customize->add_setting(
    	'facebook_account',
    	array(
        	'default' => '',
			'sanitize_callback' => 'esc_url_raw',
    	)
	);

	$wp_customize->add_control(
    	'facebook_account',
    	array(
        	'label' => esc_attr__('Facebook Account URL', 'teamone'),
        	'section' => 'social_icons',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
    	'linkedin_account',
    	array(
        	'default' => '',
			'sanitize_callback' => 'esc_url_raw',
    	)
	);

	$wp_customize->add_control(
    	'linkedin_account',
    	array(
        	'label' => esc_attr__('LinkedIn Account URL', 'teamone'),
        	'section' => 'social_icons',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
    	'dribble_account',
    	array(
        	'default' => '',
			'sanitize_callback' => 'esc_url_raw',
    	)
	);

	$wp_customize->add_control(
    	'dribble_account',
    	array(
        	'label' => esc_attr__('Dribble Account URL', 'teamone'),
        	'section' => 'social_icons',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
    	'pinterest_account',
    	array(
        	'default' => '',
			'sanitize_callback' => 'esc_url_raw',
    	)
	);

	$wp_customize->add_control(
    	'pinterest_account',
    	array(
        	'label' => esc_attr__('pInterest Account URL', 'teamone'),
        	'section' => 'social_icons',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
    	'flickr_account',
    	array(
        	'default' => '',
			'sanitize_callback' => 'esc_url_raw',
    	)
	);

	$wp_customize->add_control(
    	'flickr_account',
    	array(
        	'label' => esc_attr__('Flickr Account URL', 'teamone'),
        	'section' => 'social_icons',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
    	'vimeo_account',
    	array(
        	'default' => '',
			'sanitize_callback' => 'esc_url_raw',
    	)
	);

	$wp_customize->add_control(
    	'vimeo_account',
    	array(
        	'label' => esc_attr__('Vimeo Account URL', 'teamone'),
        	'section' => 'social_icons',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
    	'youtube_account',
    	array(
        	'default' => '',
			'sanitize_callback' => 'esc_url_raw',
    	)
	);

	$wp_customize->add_control(
    	'youtube_account',
    	array(
        	'label' => esc_attr__('YouTube Account URL', 'teamone'),
        	'section' => 'social_icons',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
    	'tumblr_account',
    	array(
        	'default' => '',
			'sanitize_callback' => 'esc_url_raw',
    	)
	);

	$wp_customize->add_control(
    	'tumblr_account',
    	array(
        	'label' => esc_attr__('Tumblr Account URL', 'teamone'),
        	'section' => 'social_icons',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
    	'instagram_account',
    	array(
        	'default' => '',
			'sanitize_callback' => 'esc_url_raw',
    	)
	);

	$wp_customize->add_control(
    	'instagram_account',
    	array(
        	'label' => esc_attr__('Instagram Account URL', 'teamone'),
        	'section' => 'social_icons',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
    	'googleplus_account',
    	array(
        	'default' => '',
			'sanitize_callback' => 'esc_url_raw',
    	)
	);

	$wp_customize->add_control(
    	'googleplus_account',
    	array(
        	'label' => esc_attr__('Google Plus Account URL', 'teamone'),
        	'section' => 'social_icons',
        	'type' => 'text',
    	)
	);
	
$wp_customize->add_setting( 'logo_img',
    	array(
			'sanitize_callback' => 'esc_url_raw',
    	)
 );
 
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'logo_img',
        array(
            'label' => esc_attr__('Upload a Logo Image', 'teamone'),
            'section' => 'teamone_theme_options',
            'settings' => 'logo_img'
        )
    )
);
}
add_action('customize_register', 'teamone_customize_register');