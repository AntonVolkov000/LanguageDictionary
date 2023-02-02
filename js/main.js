$(document).ready(function() {
    function activationSwitchOneElement(element) {
        if (element.hasClass("active")) {
            element.removeClass("active");
        } else {
            element.addClass("active");
        }
    }

    function activationSwitchTwoElements(element_1, element_2) {
        if (element_1.hasClass("active")) {
            element_1.removeClass("active");
            element_2.addClass("active");
        } else {
            element_1.addClass("active");
            element_2.removeClass("active");
        }
    }

    $(".language-button").click(function() {
        let other_languages = $(".other_languages");
        activationSwitchOneElement(other_languages);
    });

    $(".translation_type-button").click(function() {
        let translation_type_0 = $(".translation_type-0");
        let translation_type_1 = $(".translation_type-1");
        activationSwitchTwoElements(translation_type_0, translation_type_1);
    });

    $(".random-button").click(function() {
    });

    $(".content_type-button").click(function() {
        let content_type_0 = $(".content_type-0");
        let content_type_1 = $(".content_type-1");
        activationSwitchTwoElements(content_type_0, content_type_1);
    });

    $(".learned_type-button").click(function() {
        let learned_type_0 = $(".learned_type-0");
        let learned_type_1 = $(".learned_type-1");
        activationSwitchTwoElements(learned_type_0, learned_type_1);
    });

    $(".add-button").click(function() {
    });

    $(".manager").click(function() {
        let manager_container = $(this).parent(".manager-container");
        let manager_block = manager_container.children(".manager_block");
        activationSwitchOneElement(manager_block);
    });
});