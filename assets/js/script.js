var tfcToasterVisible = false;
var tfcToasterHeightOpened = 340;
var tfcToasterHeightClosed = 40;




/*
 * Functions
 */

function tfcOpenToaster() {
    jQuery(".tcf-container").animate({height: tfcToasterHeightOpened}, 300);
    tfcToasterVisible = true;

    var arrow = jQuery(".tcf-arrow-up");
    arrow.addClass('tcf-arrow-down');
    arrow.removeClass('tcf-arrow-up');
}

function tfcCloseToaster() {
    jQuery(".tcf-container").animate({height: tfcToasterHeightClosed}, 300);
    tfcToasterVisible = false;
    document.cookie = "toaster-closed";

    var arrow = jQuery(".tcf-arrow-down");
    arrow.addClass('tcf-arrow-up');
    arrow.removeClass('tcf-arrow-down');
}

//    function tfcShouldToasterStayClosed() {
//        return document.cookie.indexOf("toaster-closed") < 0;
//    }

function tfcIsFormValid() {

    isFormValid = true;

    jQuery(".tcf-container input[type='text'], .tcf-container textarea").each(function () {
        if (jQuery(this).val() === '' || jQuery(this).data('default-text') === jQuery(this).val()) {
            isFormValid = false;
        }
    });

    return isFormValid;
}

function tfcSendForm($btn) {

    jQuery("#tcf-message-fill-all-fields").hide();
    $btn.text($btn.data("sending-messsage"));
    $btn.addClass("toaster-content-sending");

    var data = {
        'action': 'toaster_contact_form',
        'nameField': jQuery('#tcf-field-name').val(),
        'emailField': jQuery('#tcf-field-email').val(),
        'messageField': jQuery('#tcf-field-message').val()
    };
    jQuery.post(ajaxurl, data, function (response) {
        jQuery(".tcf-content form").hide();
        jQuery("#tcf-form-success").show();
    });
}


jQuery(document).ready(function () {

    /*
     * Events
     */

    jQuery(".tcf-title").click(function () {
        if (!tfcToasterVisible) {
            tfcOpenToaster();
        } else {
            tfcCloseToaster();
        }
    });


    jQuery(".tcf-container input[type='text'],.tcf-container textarea").focusin(function () {
        if (jQuery(this).data('default-text') === jQuery(this).val()) {
            jQuery(this).val('');
        }
    }).focusout(function () {
        if (jQuery(this).val() === '') {
            jQuery(this).val(jQuery(this).data('default-text'));
        }
    });


    jQuery("#tcf-content-send").click(function () {
        $btn = jQuery(this);
        if (!$btn.hasClass('tcf-content-sending')) {

            if (tfcIsFormValid()) {
                tfcSendForm($btn);
            } else {
                jQuery("#tcf-message-fill-all-fields").fadeIn();
            }

        }
    });

//    if (tfcShouldToasterStayClosed()) {
//        jQuery(document).mouseleave(function (e) {
//            if (!tfcShouldToasterStayClosed() && e.clientY < 20) {
//                tfcopenToaster();
//            }
//        });
//    }

});