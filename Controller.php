<?php

class Controller
{
    public $mysqli;

    public function connectDB()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->mysqli = new mysqli("langvoc", "root", "root", "langvoc");
    }

    public function disconnectDB()
    {
        $this->mysqli->close();
    }

    public function initState()
    {
        $result = $this->mysqli->query("INSERT INTO state VALUES (NULL, 0, 0, 0)");
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    public function getState()
    {
        $result = $this->mysqli->query("SELECT * FROM state");
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    public function setLanguageId($languageId)
    {
        $this->mysqli->query("UPDATE state SET language_id = ".$languageId);
    }

    public function setTranslationId($translationId)
    {
        $this->mysqli->query("UPDATE state SET transaction_id = ".$translationId);
    }

    public function setContentType($contentType)
    {
        $this->mysqli->query("UPDATE state SET content_type = ".$contentType);
    }

    public function setLearnedType($learnedType)
    {
        $this->mysqli->query("UPDATE state SET learned_tye = ".$learnedType);
    }

    public function addLanguage($languageName)
    {
        $this->mysqli->query("INSERT INTO languages (name) VALUES ('".$languageName."')");
    }

    public function deleteLanguage($languageId)
    {
        $this->mysqli->query("DELETE FROM languages WHERE id = ".$languageId);
    }

    public function renameLanguage($languageId, $languageName)
    {
        $this->mysqli->query("UPDATE languages SET name = '".$languageName."' WHERE id = ".$languageId);
    }

    public function switchLanguage($languageId)
    {
        $this->mysqli->query("UPDATE state SET language_id = ".$languageId);
    }

    public function getLanguages()
    {
        return $this->mysqli->query("SELECT * FROM languages");
    }

    public function getLanguageById($languageId)
    {
        $result = $this->mysqli->query("SELECT * FROM languages WHERE id = ".$languageId);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
}