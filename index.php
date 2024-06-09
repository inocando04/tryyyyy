<?php
    require "app/controller/PagesController.php";
    require "config/uri/uri_setter.php";
    require "app/model/access_db/process/init_database.php";

    $pagesController = new PagesController();
    $URISegments = explode("/", $_SERVER["REQUEST_URI"]);

    if (array_key_exists(2, $URISegments)) {
        $requestedPage = $URISegments[2];
        $_SESSION['requestedPage'] = $requestedPage;

        require "app/model/view_manipulator/header_setter.php";

        switch ($requestedPage) {
            case "home" || "login" || "register" || "system":
                $pagesController->main();
                break;
            default:
                $pagesController->error(404);
                break;
        }
    } else {
        echo "condition failed to meet";
    }
?>
