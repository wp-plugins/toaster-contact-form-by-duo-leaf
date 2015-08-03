<script type = "text/javascript">
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<div class='tcf-container'>
    <div class='tcf-title'>
        <?php echo $this->view->settings->title; ?><span class='tcf-arrow-up'></span>
    </div>
    <div class='tcf-content'>
        <form>
            <input type="text" name="field-name" size="40" value="<?php echo $this->view->settings->nameField; ?>" id="tcf-field-name" data-default-text="<?php echo $this->view->settings->nameField; ?>" /><br />
            <input type="text" name="field-email" size="40" value="<?php echo $this->view->settings->emailField; ?>" id="tcf-field-email" data-default-text="<?php echo $this->view->settings->emailField; ?>" /><br />
            <textarea rows="4" name="field-message" id="tcf-field-message" data-default-text="<?php echo $this->view->settings->messageField; ?>" ><?php echo $this->view->settings->messageField; ?></textarea><br />
            <span id='tcf-message-fill-all-fields'><?php echo $this->view->settings->fillAllFieldsMessage; ?></span>
            <a id="tcf-content-send" href="#" data-sending-messsage="<?php echo $this->view->settings->sendMessage; ?>"><?php echo $this->view->settings->sendButton; ?></a><br />
        </form>
        <div id="tcf-form-success">
            <br />
            <p><strong><?php echo $this->view->settings->sucessMessage; ?></strong></p>
        </div>
    </div>
</div>

