<?php 

function requiredPlugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name'               => 'Contact Form DB', // The plugin name.
            'slug'               => 'contact-form-7-to-database-extension', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/contact-form-7-to-database-extension-2.10.32.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name'               => 'Rocket Theme - Override Morphing Search', // The plugin name.
            'slug'               => 'rocket-override-morphing-search', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/rocket-override-morphing-search.zip', // The plugin source.
            'required'  => false,
            'force_activation' => false,
            'force_deactivation' => false
        ),
        array(
            'name'               => 'Infinte Post Scroll', // The plugin name.
            'slug'               => 'clever-infinite-scroll', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/plugins/clever-infinite-scroll.zip', // The plugin source.
            'required'  => false,
            'force_activation' => false,
            'force_deactivation' => false
        ),
        array(
            'name'      => 'Redirection for Contact Form 7', //repo name
            'slug'      => 'wpcf7-redirect', //url
            'required'  => true,
            'force_activation' => false,
            'force_deactivation' => false
        ),
        array(
            'name'      => 'Max Mega Menu', //repo name
            'slug'      => 'megamenu', //url
            'required'  => true,
            'force_activation' => false,
            'force_deactivation' => false
        ),
        array(
            'name'      => 'Yoast SEO', //repo name
            'slug'      => 'wordpress-seo', //url
            'required'  => true,
            'force_activation' => true,
            'force_deactivation' => false
        ),
        array(
            'name'      => 'WP Activity Log', //repo name
            'slug'      => 'wp-security-audit-log', //url
            'required'  => true,
            'force_activation' => true,
            'force_deactivation' => true
        ),
        array(
            'name'      => 'Broken Link Checker', //repo name
            'slug'      => 'broken-link-checker', //url
            'required'  => true,
            'force_activation' => true,
            'force_deactivation' => true
        ),
        array(
            'name'      => 'Contact Form 7', //repo name
            'slug'      => 'contact-form-7', //url
            'required'  => true,
            'force_activation' => true,
            'force_deactivation' => false
        ),
        array(
            'name'      => 'Advanced Custom Fields', //repo name
            'slug'      => 'advanced-custom-fields', //url
            'required'  => false,
            'force_activation' => false,
            'force_deactivation' => false
        ),
        array(
            'name'      => 'Zone Ratings', //repo name
            'slug'      => 'zone-ratings', //url
            'source'    => '/zekinah/Zone-Ratings/archive/master.zip',
            'external_url' => 'https://github.com/zekinah/Zone-Ratings',
            'version'	=> '1.9.0',
            'required'  => false,
            'force_activation' => false,
            'force_deactivation' => false
        ),
        array(
            'name'      => 'Zone Cookie', //repo name
            'slug'      => 'zone-cookie', //url
            'source'    => '/zekinah/Zone-Cookie/archive/master.zip',
            'external_url' => 'https://wordpress.org/plugins/zone-cookie/',
            'version'	=> '1.0.3',
            'required'  => false,
            'force_activation' => false,
            'force_deactivation' => false
        ),
        array(
            'name'      => 'Zone Redirect', //repo name
            'slug'      => 'zone-redirect', //url
            'source'    => '/zekinah/Zone-Redirect/archive/master.zip',
            'external_url' => 'https://wordpress.org/plugins/zone-redirect/',
            'version'	=> '1.0.4',
            'required'  => false,
            'force_activation' => false,
            'force_deactivation' => false
        )	
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Rocket Framework Recommended Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Rocket Theme Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}