
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pledge Management System</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <!--HEADER-->
    <?php
     if($_SESSION['header_tracker'] === 'out'){
        include __DIR__ . '/../partials/header_out.php';      
     } 

     if ($_SESSION['header_tracker'] === 'in'){
        include __DIR__ . '/../partials/header_in.php';  
     }
     ?>

     <!--MAIN-CONTAINER-->
    <div class="main_container">
        <?php
        if (file_exists('app/model/get_route/routing_page.php')) {
            include 'app/model/get_route/routing_page.php';
        } else {
            echo "Error: File not found.";
        }
        ?>
    </div>

    <script src="public/js/functions/script.js"></script>
</body>
</html>
