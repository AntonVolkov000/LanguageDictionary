<?php
require_once('Controller.php');

const TO_RUSSIAN = 0;
const WORDS = 0;
const LEARNED = 0;

$controller = new Controller;
$controller->connectDB();
$state = $controller->getState();
if (empty($state))
{
    $controller->initState();
}
//$controller->addLanguage("English");
//$controller->deleteLanguage(3);
$languages = $controller->getLanguages();
//print_r($languages)
//print_r($state)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Language Vocabulary</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
    <div class="content-main">
        <div class="container">
            <header>
                <div class="language-button-block">
                    <?php if ($languages->num_rows != 0): ?>
                        <button class="header-button language-button">English</button>
                        <div class="other_languages">
                            <button class="language-button">Russian</button>
                            <button id="addLanguage" class="language-button">Add language</button>
                        </div>
                    <?php else: ?>
                        <button id="addLanguage" class="header-button language-button">Add language</button>
                    <?php endif; ?>
                </div>
                <button class="header-button translation_type-button">
                    <span class="translation_type translation_type-0 active">
                        <span>English</span>
                        <span>to</span>
                        <span>Russian</span>
                    </span>
                    <span class="translation_type translation_type-1">
                        <span>Russian</span>
                        <span>to</span>
                        <span>English</span>
                    </span>
                </button>
                <button class="header-button random-button">
                    <span class="random">Random</span>
                </button>
                <button class="header-button content_type-button">
                    <span class="content_type content_type-0 active">Words</span>
                    <span class="content_type content_type-1">Stable expressions</span>
                </button>
                <button class="header-button learned_type-button">
                    <span class="learned_type learned_type-0 active">Unlearned</span>
                    <span class="learned_type learned_type-1">Learned</span>
                </button>
                <button class="header-button add-button">
                    Add
                </button>
            </header>
            <div class="main">
                <div class="content-button-container">
                    <button class="left-button content-button">
                        <img src="images/left-arrow.png" alt="left-arrow">
                    </button>
                </div>
                <div class="content">

                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                        <div class="manager-container">
                            <button class="manager">
                                <img src="images/manager.png" alt="manager">
                            </button>
                            <div class="manager_block">
                                <button class="add_to_learned">add to learned</button>
                                <button class="change">change</button>
                                <button class="delete">delete</button>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                        <div class="manager-container">
                            <button class="manager">
                                <img src="images/manager.png" alt="manager">
                            </button>
                            <div class="manager_block">
                                <button class="add_to_learned">add to learned</button>
                                <button class="change">change</button>
                                <button class="delete">delete</button>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                    <div class="column">
                        <div class="text_name">11111</div>
                        <div class="text_translation">22222</div>
                    </div>
                </div>
                <div class="content-button-container">
                    <button class="right-button content-button">
                        <img src="images/right-arrow.png" alt="right-arrow">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <form class="add-language_popup popup" action="" method="post" onsubmit="return false;">
        <input type="button" name="close">
        <label>
            <span>Language</span>
            <input type="text" name="word_name">
        </label>
        <input type="submit" value="add" disabled>
    </form>
    <?php if ($state['content_type'] == WORDS): ?>
        <form class="add-word_popup popup" action="" method="post" onsubmit="return false;">
            <input type="button" name="close">
            <label>
                <span>Word</span>
                <input type="text" name="word_name">
            </label>
            <label>
                <span>Translation</span>
                <input type="text" name="word_translation">
            </label>
            <input type="submit" value="add" disabled>
        </form>
        <form class="change-word_popup popup" action="" method="post" onsubmit="return false;">
            <input type="button" name="close">
            <label>
                <span>Word</span>
                <input type="text" name="word_name">
            </label>
            <label>
                <span>Translation</span>
                <input type="text" name="word_translation">
            </label>
            <input type="submit" value="change" disabled>
        </form>
    <?php else: ?>
        <form class="add-stable_expression_popup popup" action="" method="post" onsubmit="return false;">
            <input type="button" name="close">
            <label>
                <span>Stable expression</span>
                <textarea name="stable_expression_name"></textarea>
            </label>
            <label>
                <span>Translation</span>
                <textarea name="stable_expression_translation"></textarea>
            </label>
            <input type="submit" value="add" disabled>
        </form>
        <form class="change-stable_expressions_popup popup" action="" method="post" onsubmit="return false;">
            <input type="button" name="close">
            <label>
                <span>Stable expression</span>
                <textarea name="stable_expression_name"></textarea>
            </label>
            <label>
                <span>Translation</span>
                <textarea name="stable_expression_translation"></textarea>
            </label>
            <input type="submit" value="change" disabled>
        </form>
    <?php endif; ?>
</body>
</html>