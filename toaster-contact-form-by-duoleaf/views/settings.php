<?php wp_nonce_field($this->pluginInfo->name, $this->view->onceName); ?>
<h2><?php echo $this->pluginInfo->displayName; ?></h2>
<hr />
<div class="wrap">
    <form action="options-general.php?page=<?php echo $this->pluginInfo->name ?>" method="post">
        <?php
        if (isset($this->message)) {
            ?>
            <div class="updated fade"><p><?php echo $this->message; ?></p></div>  
            <?php
        }
        if (isset($this->errorMessage)) {
            ?>
            <div class="error fade"><p><?php echo $this->errorMessage; ?></p></div>  
            <?php
        }
        ?> 
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label><?php _e('Sent email to', $this->pluginInfo->name); ?></label>
                </th>
                <td>
                    <input type="text" name="emailTO" class="regular-text ltr"  value="<?php echo $this->view->settings->emailTO; ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Title', $this->pluginInfo->name); ?></label>
                </th>
                <td>
                    <input type="text" name="title" class="regular-text ltr"  value="<?php echo $this->view->settings->title; ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Name Field', $this->pluginInfo->name); ?></label>
                </th>
                <td>
                    <input type="text" name="nameField" class="regular-text ltr"  value="<?php echo $this->view->settings->nameField; ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Email Field', $this->pluginInfo->name); ?></label>
                </th>
                <td>
                    <input type="text" name="emailField" class="regular-text ltr"  value="<?php echo $this->view->settings->emailField; ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Message Field', $this->pluginInfo->name); ?></label>
                </th>
                <td>
                    <input type="text" name="messageField" class="regular-text ltr"  value="<?php echo $this->view->settings->messageField; ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Send Button', $this->pluginInfo->name); ?></label>
                </th>
                <td>
                    <input type="text" name="sendButton" class="regular-text ltr"  value="<?php echo $this->view->settings->sendButton; ?>" />
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label><?php _e('Sending Message', $this->pluginInfo->name); ?></label>
                </th>
                <td>
                    <input type="text" name="sendMessage" class="regular-text ltr"  value="<?php echo $this->view->settings->sendMessage; ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Fill all fields message', $this->pluginInfo->name); ?></label>
                </th>
                <td>
                    <input type="text" name="fillAllFieldsMessage" class="regular-text ltr"  value="<?php echo $this->view->settings->fillAllFieldsMessage; ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Success message', $this->pluginInfo->name); ?></label>
                </th>
                <td>
                    <textarea rows="5" cols="45" name="sucessMessage" class="regular-text ltr" ><?php echo $this->view->settings->sucessMessage; ?></textarea>
                </td>
            </tr>
        </table
        <p>
            <input name="submit" type="submit" name="Submit" class="button button-primary" value="<?php _e('Save', $this->pluginInfo->name); ?>" /> 
        </p>
    </form>
</div>