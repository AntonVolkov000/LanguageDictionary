<?php
require_once('Controller.php');

const TO_RUSSIAN = 0;
const WORDS = 0;
const UNLEARNED = 0;

$controller = new Controller;
$controller->connectDB();
$state = $controller->getState();
if (empty($state))
{
    $controller->initState();
}
$languages = $controller->getLanguages();
//нужно взять первый, чтобы в выпадающий список он не попал
if (empty($state['language_id'])) {
    $first_language = mysqli_fetch_array($languages, MYSQLI_ASSOC);
    $controller->setLanguageId($first_language['id']);
    $selected_language = $first_language;
} else {
    $selected_language = $controller->getLanguageById($state['language_id']);
}
//print_r($state);
$controller->disconnectDB();
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
                        <button class="header-button language-button" data-language-id="<?= $selected_language['id'] ?>"><?= $selected_language['name'] ?></button>
                        <div class="other-languages">
                                <?php while ($language = mysqli_fetch_array($languages, MYSQLI_ASSOC)): ?>
                                    <?php if ($language['name'] != $selected_language['name']): ?>
                                        <div class="other-language">
                                            <button class="language-button" data-language-id="<?= $language['id'] ?>"><?= $language['name'] ?></button>
                                            <div class="language-manage-buttons">
                                                <button class="delete-language language-manage-button">
                                                    <img src="images/cross.png" alt="cross">
                                                </button>
                                                <button class="rename-language language-manage-button">
                                                    <img src="images/pencil.png" alt="pencil">
                                                </button>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <button id="addLanguage" class="language-button">Add language</button>
                        </div>
                    <?php else: ?>
                        <button id="addLanguage" class="header-button language-button">Add language</button>
                    <?php endif; ?>
                </div>
                <button class="header-button translation_type-button" data-translation-type="<?= $state['translation_type'] ?>">
                    <?php if ($state['translation_type'] == TO_RUSSIAN): ?>
                        <span class="translation_type">
                            <span><?= $selected_language['name'] ?></span>
                            <span>to</span>
                            <span>Russian</span>
                        </span>
                    <?php else: ?>
                        <span class="translation_type">
                            <span>Russian</span>
                            <span>to</span>
                            <span><?= $selected_language['name'] ?></span>
                        </span>
                    <?php endif; ?>
                </button>
                <button class="header-button random-button">
                    <span class="random">Random</span>
                </button>
                <div class="small-button-container">
                    <button class="header-button add-button small_header-button">
                        Add
                    </button>
                    <button class="header-button check-button small_header-button">
                        Check
                    </button>
                </div>
                <button class="header-button content_type-button" data-content-type="<?= $state['content_type'] ?>">
                    <?php if ($state['content_type'] == WORDS): ?>
                        <span class="content_type">Words</span>
                    <?php else: ?>
                        <span class="content_type">Stable expressions</span>
                    <?php endif; ?>
                </button>
                <button class="header-button learned_type-button" data-learned-type="<?= $state['learned_type'] ?>">
                    <?php if ($state['learned_type'] == UNLEARNED): ?>
                        <span class="learned_type">Unlearned</span>
                    <?php else: ?>
                        <span class="learned_type">Learned</span>
                    <?php endif; ?>
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
                </div>
                <div class="content-button-container">
                    <button class="right-button content-button">
                        <img src="images/right-arrow.png" alt="right-arrow">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="popups">
        <div class="success_popup">
            Successful request
        </div>
        <div class="sure_popup">
            Are you sure?
            <div class="sure_popup_buttons">
                <button class="yes-button">Yes</button>
                <button class="no-button">No</button>
            </div>
        </div>
        <form class="rename-language_popup popup" action="" method="post" onsubmit="return false;">
            <input type="button" name="close">
            <label>
                <span>Language</span>
                <input type="text" name="languageName" autocomplete="off">
            </label>
            <input type="submit" value="rename" disabled>
        </form>
        <form class="add-language_popup popup" action="" method="post" onsubmit="return false;">
            <input type="button" name="close">
            <label>
                <span>Language</span>
                <input type="text" name="languageName" autocomplete="off">
            </label>
            <input type="submit" value="add" disabled>
        </form>
        <?php if ($state['content_type'] == WORDS): ?>
            <form class="add-word_popup popup" action="" method="post" onsubmit="return false;">
                <input type="button" name="close">
                <label>
                    <span>Word</span>
                    <input type="text" name="wordName" autocomplete="off">
                </label>
                <label>
                    <span>Translation</span>
                    <input type="text" name="wordTranslation" autocomplete="off">
                </label>
                <input type="submit" value="add" disabled>
            </form>
            <form class="change-word_popup popup" action="" method="post" onsubmit="return false;">
                <input type="button" name="close">
                <label>
                    <span>Word</span>
                    <input type="text" name="wordName" autocomplete="off">
                </label>
                <label>
                    <span>Translation</span>
                    <input type="text" name="wordTranslation" autocomplete="off">
                </label>
                <input type="submit" value="change" disabled>
            </form>
        <?php else: ?>
            <form class="add-stable_expression_popup popup" action="" method="post" onsubmit="return false;">
                <input type="button" name="close">
                <label>
                    <span>Stable expression</span>
                    <textarea name="stableExpressionName"></textarea>
                </label>
                <label>
                    <span>Translation</span>
                    <textarea name="stableExpressionTranslation"></textarea>
                </label>
                <input type="submit" value="add" disabled>
            </form>
            <form class="change-stable_expressions_popup popup" action="" method="post" onsubmit="return false;">
                <input type="button" name="close">
                <label>
                    <span>Stable expression</span>
                    <textarea name="stableExpressionName"></textarea>
                </label>
                <label>
                    <span>Translation</span>
                    <textarea name="stableExpressionTranslation"></textarea>
                </label>
                <input type="submit" value="change" disabled>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>