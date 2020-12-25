<?php

    session_start();

    require_once "vendor/autoload.php";

    require_once "app/config.php";
    require_once "app/Render.php";

    require_once "app/http/Router.php";

    require_once "routes/web.php";

?>