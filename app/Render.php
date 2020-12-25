<?php

    /**
     * Display a page
     * @param String $path Relative path of the view in the Views directory
     * @param $params Parameters that can be used in the page
     */
    function View(String $path, $params = null)
    {
        include_once "Views/" . $path . ".php";
        die;
    }

    function redirect(String $url, $params = null)
    {
        header("Location: " . $url);
        die;
    }

?>