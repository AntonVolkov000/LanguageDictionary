<?php

require_once('Controller.php');

$controller = new Controller;
$controller->connectDB();

//print_r($_POST);
switch (key($_POST)) {
    case 'addLanguage':
        $languageName = $_POST['addLanguage']['languageName'];
//        $controller->addLanguage($languageName);
        break;
    case 'switchLanguage':
        $languageId = $_POST['switchLanguage']['languageId'];
        $controller->switchLanguage($languageId);
        break;
    case 'deleteLanguage':
        $languageId = $_POST['deleteLanguage']['languageId'];
//        $controller->deleteLanguage($languageId);
        break;
    case 'renameLanguage':
        $languageId = $_POST['renameLanguage']['languageId'];
        $languageName = $_POST['renameLanguage']['languageName'];
//        $controller->renameLanguage($languageId, $languageName);
        break;
}

$controller->disconnectDB();
