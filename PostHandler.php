<?php

require_once('Controller.php');

print_r($_POST);
switch (key($_POST)) {
    case 'addLanguage':
//        addLanguage();
        break;
    default:
        print_r(2);
}

function addLanguage() {
    $controller = new Controller;
    $controller->connectDB();
    $controller->addLanguage();
}
