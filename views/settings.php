<?php wp_nonce_field($this->pluginInfo->name, $this->view->onceName); ?>
<div class="bootstrap-iso">
    <h2><?php echo $this->pluginInfo->displayName; ?></h2>
    <hr />
    <div class="wrap">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-pencil"></span> Settings
                    </div> 
                    <div class="panel-body">
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
                            <div class="col-md-6 col-xs-12">
                                <label><?php _e('Sent email to', $this->pluginInfo->name); ?></label>
                                <input type="text" name="emailTO" class="form-control"  value="<?php echo $this->view->settings->emailTO; ?>" />
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label><?php _e('Title', $this->pluginInfo->name); ?></label>
                                <input type="text" name="title" class="form-control"  value="<?php echo $this->view->settings->title; ?>" />
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label><?php _e('Name Field', $this->pluginInfo->name); ?></label>
                                <input type="text" name="nameField" class="form-control"  value="<?php echo $this->view->settings->nameField; ?>" />
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label><?php _e('Email Field', $this->pluginInfo->name); ?></label>
                                <input type="text" name="emailField" class="form-control"  value="<?php echo $this->view->settings->emailField; ?>" />
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label><?php _e('Message Field', $this->pluginInfo->name); ?></label>
                                <input type="text" name="messageField" class="form-control"  value="<?php echo $this->view->settings->messageField; ?>" />
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label><?php _e('Send Button', $this->pluginInfo->name); ?></label>
                                <input type="text" name="sendButton" class="form-control"  value="<?php echo $this->view->settings->sendButton; ?>" />
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label><?php _e('Sending Message', $this->pluginInfo->name); ?></label>
                                <input type="text" name="sendMessage" class="form-control"  value="<?php echo $this->view->settings->sendMessage; ?>" />
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label><?php _e('Fill all fields message', $this->pluginInfo->name); ?></label>
                                <input type="text" name="fillAllFieldsMessage" class="form-control"  value="<?php echo $this->view->settings->fillAllFieldsMessage; ?>" />
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label><?php _e('Success message', $this->pluginInfo->name); ?></label>
                                <textarea rows="5" cols="45" name="sucessMessage" class="form-control" ><?php echo $this->view->settings->sucessMessage; ?></textarea>
                            </div>
                            <div class="col-md-12 col-xs-12 voffset3">
                                <button name="submit" type="submit" class="btn btn-success pull-right" >
                                    <span class="glyphicon glyphicon-floppy-disk"></span>
                                    <?php _e('Save', $this->pluginInfo->name); ?>
                                </button>
                            </div>   

                        </form>
                    </div>
                </div>
            </div>
            <?php include 'panel.php'; ?>
        </div> 
    </div> 
</div> 