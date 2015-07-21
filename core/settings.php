<?php

class dl_tcf_Settings {

    public $title;
    public $sendButton;
    public $sendMessage;
    public $fillAllFieldsMessage;
    public $nameField;
    public $emailField;
    public $messageField;
    public $sucessMessage;
    public $emailTO;

    public function __construct() {
        $this->title = get_option("dl_tcf_title", "Contact us now!");
        $this->sendButton = get_option("dl_tcf_sendButton", "Send");
        $this->sendMessage = get_option("dl_tcf_sendMessage", "Sending...");
        $this->fillAllFieldsMessage = get_option("dl_tcf_fillAllFieldsMessage", "Please, fill all fields.");
        $this->nameField = get_option("dl_tcf_nameField", "Name");
        $this->emailField = get_option("dl_tcf_emailField", "Email");
        $this->messageField = get_option("dl_tcf_messageField", "Message");
        $this->sucessMessage = get_option("dl_tcf_sucessMessage", "Send with success!");
        $this->emailTO = get_option("dl_tcf_emailTO", "");
    }

    public function save() {
        update_option("dl_tcf_title", $this->title);
        update_option("dl_tcf_sendButton", $this->sendButton);
        update_option("dl_tcf_sendMessage", $this->sendMessage);
        update_option("dl_tcf_fillAllFieldsMessage", $this->fillAllFieldsMessage);
        update_option("dl_tcf_nameField", $this->nameField);
        update_option("dl_tcf_emailField", $this->emailField);
        update_option("dl_tcf_messageField", $this->messageField);
        update_option("dl_tcf_sucessMessage", $this->sucessMessage);
        update_option("dl_tcf_emailTO", $this->emailTO);
    }

}
