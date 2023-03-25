$(function() {
    //reset popup forms
    $('form.popup').trigger('reset');
    $('input[type=submit]').prop('disabled', true);

    //processing of popups
    let ajaxUrl = 'PostHandler.php';
    let successful_popup = $('.success_popup');

    function disablePopup(popup) {
        popup.css('opacity', '0');
        setTimeout(() => {
            popup.css('display', 'none');
            popup.trigger('reset');
            let submit_button = popup.find($('input[type=submit]'));
            submit_button.prop('disabled', true);
        }, 200);
    }

    $('input[name=close]').on('click', function () {
        let popup = $(this).parent('.popup');
        disablePopup(popup);
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

    function showSuccessfulPopup() {
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
    }

    function sendPostRequest(data) {
        $.post(ajaxUrl, data, function(response) {
            console.log(response);
            showSuccessfulPopup();
        }).fail(function () {

        })
    }

    $('.add-language_popup').on('submit', function () {
        let formData = $(this).serialize();
        let dictFormData = serializeToDictionary(formData);
        let data = {'addLanguage': dictFormData};
        sendPostRequest(data);
    });

    let languageIdForRename;

    $('.rename-language_popup').on('submit', function () {
        let formData = $(this).serialize();
        let dictFormData = serializeToDictionary(formData);
        dictFormData['languageId'] = languageIdForRename;
        let data = {'renameLanguage': dictFormData};
        sendPostRequest(data);
    });

    //processing of header buttons
    function switchActivation(element) {
        if (element.hasClass('active')) {
            element.removeClass('active');
        } else {
            element.addClass('active');
        }
    }

    $('.language-button').on('click', function() {
        let other_languages = $('.other-languages');
        switchActivation(other_languages);
    });
    
    function activationPopup(popup) {
        popup.css('display', 'flex');
        setTimeout(() => {
            popup.css('opacity', '1');
        }, 1);
    }

    $('#addLanguage').on('click', function () {
        activationPopup($('.add-language_popup'));
    });

    $('.other-language .language-button').on('click', function () {
        let languageId = $(this).data('language-id');
        let data = {'switchLanguage': {'languageId': languageId}};
        sendPostRequest(data);
    });

    $('.delete-language').on('click', function () {
        let languageId = $(this).parents('.other-language').find($('.language-button')).data('language-id');
        let data = {'deleteLanguage': {'languageId': languageId}};
        sendPostRequest(data);
    });

    $('.rename-language').on('click', function () {
        let languageButton = $(this).parents('.other-language').find($('.language-button'));
        languageIdForRename = languageButton.data('language-id');
        let languageName = languageButton.text();
        let renameLanguagePopup = $('.rename-language_popup');
        renameLanguagePopup.find($('input[name=languageName]')).val(languageName);
        activationPopup(renameLanguagePopup);
    });

    // $('.translation_type-button').on('click', function() {});

    // $('.random-button').on('click', function() {});

    // $('.content_type-button').on('click', function() {});

    // $('.learned_type-button').on('click', function() {});

    // $('.add-button').on('click', function() {});

    // $('.check-button').on('click', function() {});

    //processing of manage content buttons
    $('.manager').on('click', function() {
        let manager_container = $(this).parent('.manager-container');
        let manager_block = manager_container.children('.manager_block');
        switchActivation(manager_block);
    });
});