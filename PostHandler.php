<?php

require_once('Controller.php');

$controller = new Controller;
$controller->connectDB();

print_r($_POST);
switch (key($_POST)) {
    case 'addLanguage':
        $languageName = $_POST['addLanguage']['language_name'];
//        $controller->addLanguage($languageName);
        break;
    case 'switchLanguage':
        $languageId = $_POST['switchLanguage']['languageId'];
        $controller->switchLanguage($languageId);
        break;
}

$controller->disconnectDB();
