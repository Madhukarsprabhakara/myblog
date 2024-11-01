<?php

/**
 * file for holding dashboard welcome page for theme
 */
if (!function_exists('mediator_welcome_notice')) :
    function mediator_welcome_notice()
    {
        if (get_option('mediator_dashboard_dismissed_notice')) {
            return;
        }
        global $pagenow;
        $current_screen  = get_current_screen();

        if (is_admin()) {
            if ($current_screen->id !== 'dashboard' && $current_screen->id !== 'themes') {
                return;
            }
            if (is_network_admin()) {
                return;
            }
            if (!current_user_can('manage_options')) {
                return;
            }


?>
            <div class="mediator-admin-notice notice notice-info is-dismissible content-install-plugin theme-info-notice" id="mediator-dismiss-notice">
                <div class="info-content">
                    <h3><span class="theme-name"><span><?php echo __('Thank you for using Mediator. In order to complete the task correctly, kindly install and activate the recommended plugin.', 'mediator'); ?></span></h3>
                    <p class="notice-text"><?php echo __('TemplateGalaxy: Please install and activate TemplateGalaxy pluign from our website to use additional patterns, templates  and import demo with "one click demo import" feature.', 'mediator') ?></p>
                    <p class="notice-text"><?php echo __('Advanced Import: This is required only for the one-click demo import features and can be deleted once the demo is imported.', 'mediator') ?></p>
                    <a href="#" id="install-activate-button" class="button admin-button info-button"><?php echo __('Getting started with a single click', 'mediator'); ?></a>
                    <a href="<?php echo admin_url(); ?>themes.php?page=about-mediator" class="button admin-button info-button"><?php echo __('Explore Mediator', 'mediator'); ?></a>
                </div>


            </div>
    <?php
        }
    }
endif;
add_action('admin_notices', 'mediator_welcome_notice');
function mediator_dashboard_dismissble_notice()
{
    update_option('mediator_dashboard_dismissed_notice', 1);
}
add_action('wp_ajax_mediator_dashboard_dismissble_notice', 'mediator_dashboard_dismissble_notice');
add_action('wp_ajax_mediator_dismissble_notice', 'mediator_dismissble_notice');
// Hook into a custom action when the button is clicked
add_action('wp_ajax_mediator_install_and_activate_plugins', 'mediator_install_and_activate_plugins');
add_action('wp_ajax_nopriv_mediator_install_and_activate_plugins', 'mediator_install_and_activate_plugins');
add_action('wp_ajax_mediator_rplugin_activation', 'mediator_rplugin_activation');
add_action('wp_ajax_nopriv_mediator_rplugin_activation', 'mediator_rplugin_activation');

// Function to install and activate the plugins



function check_plugin_installed_status($pugin_slug, $plugin_file)
{
    return file_exists(ABSPATH . 'wp-content/plugins/' . $pugin_slug . '/' . $plugin_file) ? true : false;
}

/* Check if plugin is activated */


function check_plugin_active_status($pugin_slug, $plugin_file)
{
    return is_plugin_active($pugin_slug . '/' . $plugin_file) ? true : false;
}

require_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/misc.php');
require_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
function mediator_install_and_activate_plugins()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    check_ajax_referer('mediator_nonce', 'nonce');
    // Define the plugins to be installed and activated
    $recommended_plugins = array(
        array(
            'slug' => 'templategalaxy',
            'file' => 'templategalaxy.php',
            'name' => __('TemplateGalaxy', 'mediator')
        ),
        array(
            'slug' => 'advanced-import',
            'file' => 'advanced-import.php',
            'name' =>  __('Advanced Import', 'mediator')
        )
        // Add more plugins here as needed
    );

    // Include the necessary WordPress functions


    // Set up a transient to store the installation progress
    set_transient('install_and_activate_progress', array(), MINUTE_IN_SECONDS * 10);

    // Loop through each plugin
    foreach ($recommended_plugins as $plugin) {
        $plugin_slug = $plugin['slug'];
        $plugin_file = $plugin['file'];
        $plugin_name = $plugin['name'];

        // Check if the plugin is active
        if (is_plugin_active($plugin_slug . '/' . $plugin_file)) {
            update_install_and_activate_progress($plugin_name, 'Already Active');
            continue; // Skip to the next plugin
        }

        // Check if the plugin is installed but not active
        if (is_mediator_plugin_installed($plugin_slug . '/' . $plugin_file)) {
            $activate = activate_plugin($plugin_slug . '/' . $plugin_file);
            if (is_wp_error($activate)) {
                update_install_and_activate_progress($plugin_name, 'Error');
                continue; // Skip to the next plugin
            }
            update_install_and_activate_progress($plugin_name, 'Activated');
            continue; // Skip to the next plugin
        }

        // Plugin is not installed or activated, proceed with installation
        update_install_and_activate_progress($plugin_name, 'Installing');

        // Fetch plugin information
        $api = plugins_api('plugin_information', array(
            'slug' => $plugin_slug,
            'fields' => array('sections' => false),
        ));

        // Check if plugin information is fetched successfully
        if (is_wp_error($api)) {
            update_install_and_activate_progress($plugin_name, 'Error');
            continue; // Skip to the next plugin
        }

        // Set up the plugin upgrader
        $upgrader = new Plugin_Upgrader();
        $install = $upgrader->install($api->download_link);

        // Check if installation is successful
        if ($install) {
            // Activate the plugin
            $activate = activate_plugin($plugin_slug . '/' . $plugin_file);

            // Check if activation is successful
            if (is_wp_error($activate)) {
                update_install_and_activate_progress($plugin_name, 'Error');
                continue; // Skip to the next plugin
            }
            update_install_and_activate_progress($plugin_name, 'Activated');
        } else {
            update_install_and_activate_progress($plugin_name, 'Error');
        }
    }

    // Delete the progress transient
    $redirect_url = admin_url('themes.php?page=advanced-import');

    // Delete the progress transient
    delete_transient('install_and_activate_progress');
    // Return JSON response
    wp_send_json_success(array('redirect_url' => $redirect_url));
}

// Function to check if a plugin is installed but not active
function is_mediator_plugin_installed($plugin_slug)
{
    $plugins = get_plugins();
    return isset($plugins[$plugin_slug]);
}

// Function to update the installation and activation progress
function update_install_and_activate_progress($plugin_name, $status)
{
    $progress = get_transient('install_and_activate_progress');
    $progress[] = array(
        'plugin' => $plugin_name,
        'status' => $status,
    );
    set_transient('install_and_activate_progress', $progress, MINUTE_IN_SECONDS * 10);
}

function mediator_dashboard_menu()
{
    add_theme_page(esc_html__('About mediator', 'mediator'), esc_html__('About mediator', 'mediator'), 'edit_theme_options', 'about-mediator', 'mediator_theme_info_display');
}
add_action('admin_menu', 'mediator_dashboard_menu');
function mediator_theme_info_display()
{ ?>
    <div class="dashboard-about-mediator">
        <h1> <?php echo __('Welcome to mediator- FSE WordPress Theme for Blogging', 'mediator') ?></h1>
        <p><?php echo __('mediator is a cutting-edge WordPress theme that seamlessly integrates with Full Site Editing, offering a block-based approach to website design. Tailored specifically for bloggers, this theme combines the power of WordPress\'s latest features with a sleek and minimalistic design, providing a seamless and enjoyable blogging experience. Explore more about mediator at https://websiteinwp.com/mediator-free-wordpress-theme-for-blogger/', 'mediator') ?></p>
        <h3><span class="theme-name"><span><?php echo __('Recommended Plugins:', 'mediator'); ?></span></h3>
        <p class="notice-text"><?php echo __('TemplateGalaxy: Please install and activate TemplateGalaxy pluign from our website to use additional patterns, templates  and import demo with "one click demo import" feature.', 'mediator') ?></p>
        <p class="notice-text"><?php echo __('Advanced Import: This is required only for the one-click demo import features and can be deleted once the demo is imported.', 'mediator') ?></p>
        <a href="#" id="install-activate-button" class="installing-all-pluign button admin-button info-button"><?php echo __('Getting started with a single click', 'mediator'); ?></a>
        <h3 class="mediator-baisc-guideline-header"><?php echo __('Basic Theme Setup', 'mediator') ?></h3>
        <div class="mediator-baisc-guideline">
            <div class="featured-box">
                <ul>
                    <li><strong><?php echo __('Setup Header Layout:', 'mediator') ?></strong>
                        <ul>
                            <li> - <?php echo __('Go to Appearance -> Editor -> Patterns -> Template Parts -> Header:', 'mediator') ?></li>
                            <li> - <?php echo __('click on Header > Click on Edit (Icon) -> Add or Remove Requirend block/content as your requirement.:', 'mediator') ?></li>
                            <li> - <?php echo __('Click on save to update your layout', 'mediator') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="featured-box">
                <ul>
                    <li><strong><?php echo __('Setup Footer Layout:', 'mediator') ?></strong>
                        <ul>
                            <li> - <?php echo __('Go to Appearance -> Editor -> Patterns -> Template Parts -> Footer:', 'mediator') ?></li>
                            <li> - <?php echo __('click on Footer > Click on Edit (Icon) > Add or Remove Requirend block/content as your requirement.:', 'mediator') ?></li>
                            <li> - <?php echo __('Click on save to update your layout', 'mediator') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="featured-box">
                <ul>
                    <li><strong><?php echo __('Setup Templates like Homepage/404/Search/Page/Single and more templates Layout:', 'mediator') ?></strong>
                        <ul>
                            <li> - <?php echo __('Go to Appearance -> Editor -> Templates:', 'mediator') ?></li>
                            <li> - <?php echo __('click on Template(You need to edit/update) > Click on Edit (Icon) > Add or Remove Requirend block/content as your requirement.:', 'mediator') ?></li>
                            <li> - <?php echo __('Click on save to update your layout', 'mediator') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="featured-box">
                <ul>
                    <li><strong><?php echo __('Restore/Reset Default Content layout of Template(Like: Frontpage/Blog/Archive etc.)', 'mediator') ?></strong>
                        <ul>
                            <li> - <?php echo __('Go to Appearance -> Editor -> Templates:', 'mediator') ?></li>
                            <li> - <?php echo __('Click on Manage all Templates', 'mediator') ?></li>
                            <li> - <?php echo __('Click on 3 Dots icon at right side of respective Template', 'mediator') ?></li>
                            <li> - <?php echo __('Click on Clear Customization', 'mediator') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="featured-box">
                <ul>
                    <li><strong><?php echo __('Restore/Reset Default Content layout of Template Parts(Header/Footer/Sidebar)', 'mediator') ?></strong>
                        <ul>
                            <li> - <?php echo __('Go to Appearance -> Editor -> Patterns:', 'mediator') ?></li>
                            <li> - <?php echo __('Click on Manage All Template Parts', 'mediator') ?></li>
                            <li> - <?php echo __('Click on 3 Dots icon at right side of respective Template parts', 'mediator') ?></li>
                            <li> - <?php echo __('Click on Clear Customization', 'mediator') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="featured-list">
            <div class="half-col free-features">
                <h3><?php echo __('Mediator Features (Free)', 'mediator') ?></h3>
                <ul>
                    <li> <strong>- <?php echo __('Base Templates Ready', 'mediator') ?></strong>
                        <ul>
                            <li> <?php echo __('404 Template', 'mediator') ?></li>
                            <li> <?php echo __('Archive Template', 'mediator') ?></li>
                            <li> <?php echo __('Blank Template', 'mediator') ?></li>
                            <li> <?php echo __('Front Page Template', 'mediator') ?></li>
                            <li> <?php echo __('Blog Home Template', 'mediator') ?></li>
                            <li> <?php echo __('Index Page Template', 'mediator') ?></li>
                            <li> <?php echo __('Search Template', 'mediator') ?></li>
                            <li> <?php echo __('Page Template', 'mediator') ?></li>

                        </ul>
                    <li>
                    <li><strong> - <?php echo __('9 Global Styles Variations', 'mediator') ?></strong></li>
                    <li><strong> - <?php echo __('Fully Customizable Header Layout', 'mediator') ?></strong></li>
                    <li> <strong>- <?php echo __('Fully Customizable Footer Layout', 'mediator') ?></strong></li>
                    <li><strong> - <?php echo __('Multiple Typography Option', 'mediator') ?></strong></li>
                    <li> <strong>- <?php echo __('Advanced Color Options', 'mediator') ?></strong></li>
                    <li> <strong>- <?php echo __('Grid Layout for Post Display', 'mediator') ?></strong></li>
                    <li> <strong>- <?php echo __('List Layout for Post Display', 'mediator') ?></strong></li>
                </ul>
            </div>
            <div class="half-col pro-features">
                <h3><?php echo __('Premium Version Offer', 'mediator') ?></h3>
                <ul>
                    <li><?php echo __('Featured Post Slider Patterns', 'mediator') ?></li>
                    <li><?php echo __('News Ticker Patterns', 'mediator') ?></li>
                    <li><?php echo __('Featured Post Vertical Carousel Patterns', 'mediator') ?></li>
                    <li><?php echo __('Post Carousel Patterns', 'mediator') ?></li>
                    <li><?php echo __('Social Share Icons display shortcode as Pattern', 'mediator') ?></li>
                    <li><?php echo __('Breadcrumb display shortcode as Pattern', 'mediator') ?></li>
                    <li><?php echo __('Related Posts display shortcode as Pattern', 'mediator') ?></li>
                    <li><?php echo __('Current Date display shortcode as Pattern', 'mediator') ?></li>
                    <li><?php echo __('Current Time display shortcode as Pattern', 'mediator') ?></li>
                </ul>
                <a href="https://websiteinwp.com/plan-and-pricing/" class="upgrade-btn button" target="_blank"><?php echo __('Upgrade to Pro', 'mediator') ?></a>
            </div>
        </div>
    </div>
<?php
}
