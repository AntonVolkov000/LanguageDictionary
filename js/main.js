$(function() {
    //reset popup forms
    $('form.popup').trigger('reset');
    $('input[type=submit]').prop('disabled', true);


    //processing of header buttons
    function activationSwitchOneElement(element) {
        if (element.hasClass('active')) {
            element.removeClass('active');
        } else {
            element.addClass('active');
        }
    }

    $('.language-button').on('click', function() {
        let other_languages = $('.other_languages');
        activationSwitchOneElement(other_languages);
    });

    // $('.translation_type-button').on('click', function() {});

    // $('.random-button').on('click', function() {});

    // $('.content_type-button').on('click', function() {});

    // $('.learned_type-button').on('click', function() {});

    // $('.add-button').on('click', function() {});

    //processing of manage content buttons
    $('.manager').on('click', function() {
        let manager_container = $(this).parent('.manager-container');
        let manager_block = manager_container.children('.manager_block');
        activationSwitchOneElement(manager_block);
    });

    $('#addLanguage').on('click', function () {
        let add_language_popup = $('.add-language_popup');
        add_language_popup.css('display', 'flex');
        setTimeout(() => {
            add_language_popup.css('opacity', '1');
            }, 1);
    });

    //processing of popup forms
    let ajaxUrl = 'PostHandler.php';
    let successful_popup = $('.success_popup');
    
    $('input[name=close]').on('click', function () {
        let popup = $(this).parent('.popup');
        popup.css('opacity', '0');
        setTimeout(() => {
            popup.css('display', 'none');
        }, 200);
    });

    $('form input, form textarea').on('input', function () {
        let popup = $(this).parents('.popup');
        let fields = popup.find($('input[type=text], textarea'));
        let fullness = true;
        for (let field of fields) {
            if (field.value === '') {
                fullness &&= false;
            }
        }
        let submit_button = popup.find($('input[type=submit]'));
        if (fullness) {
            submit_button.prop('disabled', false);
        } else {
            submit_button.prop('disabled', true);
        }
    });

    function serializeToDictionary(text) {
        let items = text.split('&');
        let dictionary = {};
        for (let item of items) {
            let itemArray = item.split('=');
            dictionary[itemArray[0]] = itemArray[1];
        }
        return dictionary;
    }
    
    function sendPostRequest(data, from) {
        $.post(ajaxUrl, data, function(response) {
            console.log(response);
            from.trigger('reset');
            let submit_button = from.find($('input[type=submit]'));
            submit_button.prop('disabled', true);

            successful_popup.css('display', 'block');
            setTimeout(() => {
                successful_popup.css('opacity', '1');
            }, 1);

            setTimeout(() => {
                successful_popup.css('opacity', '0');
                setTimeout(() => {
                    successful_popup.css('display', 'none');
                }, 200);
            }, 1500);
        });
    }

    // console.log($('.header-button').data('language-id'));

    $('.add-language_popup').on('submit', function () {
        let formData = $(this).serialize();
        let dictFormData = serializeToDictionary(formData);
        let data = {'addLanguage': dictFormData};
        let form = $(this);
        sendPostRequest(data, form);
    });
});