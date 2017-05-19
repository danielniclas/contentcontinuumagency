<?php

if ( ! function_exists('aton_qodef_social_options_map') ) {

	function aton_qodef_social_options_map() {

		aton_qodef_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__('Social Networks', 'aton'),
				'icon'  => 'fa fa-share-alt'
			)
		);

		/**
		 * Enable Social Share
		 */
		$panel_social_share = aton_qodef_add_admin_panel(array(
			'page'  => '_social_page',
			'name'  => 'panel_social_share',
			'title' => esc_html__('Enable Social Share', 'aton')
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Social Share', 'aton'),
			'description'	=> esc_html__('Enabling this option will allow social share on networks of your choice', 'aton'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_panel_social_networks, #qodef_panel_show_social_share_on'
			),
			'parent'		=> $panel_social_share
		));

		$panel_show_social_share_on = aton_qodef_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'  			=> 'panel_show_social_share_on',
			'title' 			=> esc_html__('Show Social Share On', 'aton'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_post',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Posts', 'aton'),
			'description'	=> esc_html__('Show Social Share on Blog Posts', 'aton'),
			'parent'		=> $panel_show_social_share_on
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_page',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Pages', 'aton'),
			'description'	=> esc_html__('Show Social Share on Pages', 'aton'),
			'parent'		=> $panel_show_social_share_on
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_attachment',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Media', 'aton'),
			'description'	=> esc_html__('Show Social Share for Images and Videos', 'aton'),
			'parent'		=> $panel_show_social_share_on
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_portfolio-item',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Portfolio Item', 'aton'),
			'description'	=> esc_html__('Show Social Share for Portfolio Items', 'aton'),
			'parent'		=> $panel_show_social_share_on
		));

		if(aton_qodef_is_woocommerce_installed()){
			aton_qodef_add_admin_field(array(
				'type'			=> 'yesno',
				'name'			=> 'enable_social_share_on_product',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Product', 'aton'),
				'description'	=> esc_html__('Show Social Share for Product Items', 'aton'),
				'parent'		=> $panel_show_social_share_on
			));
		}

		/**
		 * Social Share Networks
		 */
		$panel_social_networks = aton_qodef_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'				=> 'panel_social_networks',
			'title'				=> esc_html__('Social Networks', 'aton'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		/**
		 * Facebook
		 */
		aton_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'facebook_title',
			'title'		=> 'Share on Facebook'
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_facebook_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'aton'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Facebook', 'aton'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_facebook_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_facebook_share_container = aton_qodef_add_admin_container(array(
			'name'		=> 'enable_facebook_share_container',
			'hidden_property'	=> 'enable_facebook_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'facebook_icon',
			'default_value'	=> '',
			'label'			=> 'Upload Icon',
			'parent'		=> $enable_facebook_share_container
		));

		/**
		 * Twitter
		 */
		aton_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'twitter_title',
			'title'		=> 'Share on Twitter'
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_twitter_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'aton'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Twitter', 'aton'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_twitter_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_twitter_share_container = aton_qodef_add_admin_container(array(
			'name'		=> 'enable_twitter_share_container',
			'hidden_property'	=> 'enable_twitter_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'twitter_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'aton'),
			'parent'		=> $enable_twitter_share_container
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'twitter_via',
			'default_value'	=> '',
			'label'			=> esc_html__('Via', 'aton'),
			'parent'		=> $enable_twitter_share_container
		));

		/**
		 * Google Plus
		 */
		aton_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'google_plus_title',
			'title'		=> esc_html__('Share on Google Plus', 'aton')
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_google_plus_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'aton'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Google Plus', 'aton'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_google_plus_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_google_plus_container = aton_qodef_add_admin_container(array(
			'name'		=> 'enable_google_plus_container',
			'hidden_property'	=> 'enable_google_plus_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'google_plus_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'aton'),
			'parent'		=> $enable_google_plus_container
		));

		/**
		 * Linked In
		 */
		aton_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'linkedin_title',
			'title'		=> esc_html__('Share on LinkedIn', 'aton')
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_linkedin_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'aton'),
			'description'	=> esc_html__('Enabling this option will allow sharing via LinkedIn', 'aton'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_linkedin_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_linkedin_container = aton_qodef_add_admin_container(array(
			'name'		=> 'enable_linkedin_container',
			'hidden_property'	=> 'enable_linkedin_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'linkedin_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'aton'),
			'parent'		=> $enable_linkedin_container
		));

		/**
		 * Tumblr
		 */
		aton_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'tumblr_title',
			'title'		=> esc_html__('Share on Tumblr', 'aton')
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_tumblr_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'aton'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Tumblr', 'aton'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_tumblr_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_tumblr_container = aton_qodef_add_admin_container(array(
			'name'		=> 'enable_tumblr_container',
			'hidden_property'	=> 'enable_tumblr_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'tumblr_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'aton'),
			'parent'		=> $enable_tumblr_container
		));

		/**
		 * Pinterest
		 */
		aton_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'pinterest_title',
			'title'		=> esc_html__('Share on Pinterest', 'aton')
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_pinterest_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'aton'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Pinterest', 'aton'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_pinterest_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_pinterest_container = aton_qodef_add_admin_container(array(
			'name'				=> 'enable_pinterest_container',
			'hidden_property'	=> 'enable_pinterest_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'pinterest_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'aton'),
			'parent'		=> $enable_pinterest_container
		));

		/**
		 * VK
		 */
		aton_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'vk_title',
			'title'		=> esc_html__('Share on VK', 'aton')
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_vk_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'aton'),
			'description'	=> esc_html__('Enabling this option will allow sharing via VK', 'aton'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_vk_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_vk_container = aton_qodef_add_admin_container(array(
			'name'				=> 'enable_vk_container',
			'hidden_property'	=> 'enable_vk_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		aton_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'vk_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'aton'),
			'parent'		=> $enable_vk_container
		));

		if(defined('QODEF_TWITTER_FEED_VERSION')) {
            $twitter_panel = aton_qodef_add_admin_panel(array(
                'title' => esc_html__('Twitter', 'aton'),
                'name'  => 'panel_twitter',
                'page'  => '_social_page'
            ));

            aton_qodef_add_admin_twitter_button(array(
                'name'   => 'twitter_button',
                'parent' => $twitter_panel
            ));
        }

        if(defined('QODEF_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = aton_qodef_add_admin_panel(array(
                'title' => esc_html__('Instagram', 'aton'),
                'name'  => 'panel_instagram',
                'page'  => '_social_page'
            ));

            aton_qodef_add_admin_instagram_button(array(
                'name'   => 'instagram_button',
                'parent' => $instagram_panel
            ));
        }
	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_social_options_map',17);
}