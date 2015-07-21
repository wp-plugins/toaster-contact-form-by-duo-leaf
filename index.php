<?php

/**
 * Plugin Name: Toaster Contact Form by Duo Leaf
 * Plugin URI: http://DuoLeaf.com/toaster-contact-from-wordpress-plugin/
 * Version: 1.0.1
 * Author: Duo Leaf
 * Author URI: http://DuoLeaf.com/
 * Description: This plugin creates contact form on the bottom right corner of your site, with a 'toaster' like effect.
 * License: GPLv3 or later
 */
class dl_tcf_ToasterWidget {

    /** @var dl_tcf_PluginInfo */
    public $pluginInfo;

    /**
     * Constructor
     */
    public function __construct($pluginInfo) {

        $this->pluginInfo = $pluginInfo;

        require_once(WP_PLUGIN_DIR . '/' . $this->pluginInfo->name . '/core/settings.php');

        add_action('admin_menu', array(&$this, 'adminPanelsAndMetaBoxes'));
        add_action('wp_enqueue_scripts', array(&$this, 'enqueueScriptsECss'));
        add_action('admin_enqueue_scripts', array(&$this, 'adminEnqueueScripts'));
        add_action('wp_footer', array(&$this, 'widgetInject'));
        add_action('wp_ajax_nopriv_toaster_contact_form', array(&$this, 'postAjax'));
        add_action('wp_ajax_toaster_contact_form', array(&$this, 'postAjax'));
    }

    function postAjax() {

        $settings = new dl_tcf_Settings();

        $emailBody = $settings->nameField . ': ' . $_POST['nameField'] . "\n";
        $emailBody .= $settings->emailField . ': ' . $_POST['emailField'] . "\n";
        $emailBody .= $settings->messageField . ': ' . $_POST['messageField'] . "\n";

        echo wp_mail($settings->emailTO, 'Contact Form', $emailBody);

        wp_die();
    }

    function adminPanelsAndMetaBoxes() {
        add_submenu_page('options-general.php', $this->pluginInfo->displayName, $this->pluginInfo->displayName, 'manage_options', $this->pluginInfo->name, array(&$this, 'adminPanel'));
    }

    function adminPanel() {
        $this->view = new stdClass();


        if (isset($_POST['submit'])) {

            $settings = new dl_tcf_Settings();

            $settings->title = $_POST['title'];
            $settings->sendButton = $_POST['sendButton'];
            $settings->sendMessage = $_POST['sendMessage'];
            $settings->fillAllFieldsMessage = $_POST['fillAllFieldsMessage'];
            $settings->nameField = $_POST['nameField'];
            $settings->emailField = $_POST['emailField'];
            $settings->messageField = $_POST['messageField'];
            $settings->sucessMessage = $_POST['sucessMessage'];
            $settings->emailTO = $_POST['emailTO'];

            $settings->save();
        }

        require(WP_PLUGIN_DIR . '/' . $this->pluginInfo->name . '/actions/settings.php');
    }

    public function widgetInject() {

        if (is_admin() OR is_feed() OR is_robots() OR is_trackback()) {
            return;
        }
        $this->view = new stdClass();

        $this->view->settings = new dl_tcf_Settings();

        include(WP_PLUGIN_DIR . '/' . $this->pluginInfo->name . '/views/contact-form.php');
    }

    public function enqueueScriptsECss() {
        wp_register_script('dl_tfc_javascript', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/js/script.js', array('jquery'), NULL, true);
        wp_enqueue_script('dl_tfc_javascript');

        wp_enqueue_style('dl_tfc_css', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/css/styles.css', array(), null, 'all');
        wp_enqueue_script('dl_tfc_css');
    }

    function adminEnqueueScripts() {
        wp_register_script('dl_tfc_bootstrap', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/js/bootstrap.min.js', array('jquery'), NULL);
        wp_enqueue_script('dl_tfc_bootstrap');

        wp_enqueue_style('dl_tfc_css_bootstrap', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/css/bootstrap-iso.css', array(), null, 'all');
        wp_enqueue_script('dl_tfc_css_bootstrap');
        wp_enqueue_style('dl_tfc_css_bootstrap_theme', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/css/bootstrap-theme.css', array(), null, 'all');
        wp_enqueue_script('dl_tfc_css_bootstrap_theme');
    }

}

require_once(WP_PLUGIN_DIR . '/toaster-contact-form-by-duoleaf/core/plugin-info.php');
$dl_tcf_pluginInfo = new dl_tcf_PluginInfo();
$dl_tcf_toasterWidget = new dl_tcf_ToasterWidget($dl_tcf_pluginInfo);
