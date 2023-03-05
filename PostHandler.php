<?php

require_once('Controller.php');

print_r($_POST);
switch (key($_POST)) {
    case 'addLanguage':
        $language_name = $_POST['addLanguage']['language_name'];
//        addLanguage($language_name);
        break;
}

function addLanguage($language_name) {
    $controller = new Controller;
    $controller->connectDB();
    $controller->addLanguage($language_name);
    $controller->disconnectDB();
}
