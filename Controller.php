<?php

class Controller
{
    public $mysqli;

    public function connectDB()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->mysqli = new mysqli("langvoc", "root", "root", "langvoc");
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

    public function addLanguage($languageName)
    {
        $this->mysqli->query("INSERT INTO languages (name) VALUES ('".$languageName."')");
    }

    public function deleteLanguage($languageId)
    {
        $this->mysqli->query("DELETE FROM languages WHERE id = ".$languageId);
    }

    public function switchLanguage($languageId)
    {
        $this->mysqli->query("DELETE FROM languages WHERE id = ".$languageId);
    }

    public function getLanguages()
    {
        $result = $this->mysqli->query("SELECT * FROM languages");
        return $result;
//        $language_ids = [];
//        $language_names = [];
//        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
//        {
//            $language_ids[] = $row['id'];
//            $language_names[] = $row['name'];
//        }
//        return [$language_ids, $language_names];
    }
}