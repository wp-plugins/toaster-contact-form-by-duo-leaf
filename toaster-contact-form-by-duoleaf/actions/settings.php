<?php

$this->view->settings = new dl_tcf_Settings();

require(WP_PLUGIN_DIR . '/' . $this->pluginInfo->name . '/views/settings.php');
