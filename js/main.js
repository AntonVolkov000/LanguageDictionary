$(function() {
    //reset popup forms
    $('.add-language_popup').trigger('reset');
    $('.add-word_popup').trigger('reset');
    $('.change-word_popup').trigger('reset');
    $('.add-stable_expression_popup').trigger('reset');
    $('.change-stable_expressions_popup').trigger('reset');

    //processing of header buttons
    function activationSwitchOneElement(element) {
        if (element.hasClass('active')) {
            element.removeClass('active');
        } else {
            element.addClass('active');
        }
    }

    function activationSwitchTwoElements(element_1, element_2) {
        if (element_1.hasClass('active')) {
            element_1.removeClass('active');
            element_2.addClass('active');
        } else {
            element_1.addClass('active');
            element_2.removeClass('active');
        }
    }

    $('.language-button').on('click', function() {
        let other_languages = $('.other_languages');
        activationSwitchOneElement(other_languages);
    });

    $('.translation_type-button').on('click', function() {
        let translation_type_0 = $('.translation_type-0');
        let translation_type_1 = $('.translation_type-1');
        activationSwitchTwoElements(translation_type_0, translation_type_1);
    });

    // $('.random-button').on('click', function() {
    // });

    $('.content_type-button').on('click', function() {
        let content_type_0 = $('.content_type-0');
        let content_type_1 = $('.content_type-1');
        activationSwitchTwoElements(content_type_0, content_type_1);
    });

    $('.learned_type-button').on('click', function() {
        let learned_type_0 = $('.learned_type-0');
        let learned_type_1 = $('.learned_type-1');
        activationSwitchTwoElements(learned_type_0, learned_type_1);
    });

    // $('.add-button').on('click', function() {
    // });

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
    $('input[name="close"]').on('click', function () {
        let popup = $(this).parent('.popup');
        popup.css('opacity', '0');
        setTimeout(() => {
            popup.css('display', 'none');
        }, 200);
    });

    //ДОРАБОТАТЬ УБРАТЬ DISABLED, ЕСЛИ ВСЕ ПОЛЯ ЗАПОЛНЕНЫ
    //брать родителя, а у него детей(инпуты) и проверять, что они не пусты, если все не пусты, то разблокируй кнопку
    $('form :input').on('input', function () {
        console.log(123);
    });

    function serializeToDcitionary(text) {
        let items = text.split('&');
        let dictionary = {};
        for (let item of items) {
            let itemArray = item.split('=');
            dictionary[itemArray[0]] = itemArray[1];
        }
        return dictionary;
    }

    $('.add-language_popup').on('submit', function () {
        let ajaxUrl = 'PostHandler.php';
        let formData = $(this).serialize();
        let dictFormData = serializeToDcitionary(formData);
        let data = {'addLanguage': dictFormData};
        $.post(ajaxUrl, data, function(response) {
            console.log(response);
        });
        $(this).trigger('reset');
    });
});