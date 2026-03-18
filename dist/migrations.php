<?php
include 'migrate_controller.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }


        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 500px;
            border-radius: 20px;
            padding: 10px 0;
        }

        h3 {
            margin: 0;
            padding: 0;
            font-weight: 400;
            color: #666;
            text-align: center;
            background-color: #eee;
            width: 100%;
            border-radius: 5px;
            margin: 5px;
            padding: 5px 0;
        }

        p {
            padding: 0;
            margin: 0;
            width: 100%;
            text-align: center;
            border-radius: 5px;
            font-weight: 400;
            color: #666;
            font-size: 18px;
            padding: 5px 0;
            margin: 3px;
        }

        .success {
            background-color: #89e489;
        }

        .error {
            background-color: #f5b2af;
        }

        hr {
            border: 10px solid #666;
            width: 100%;
        }

        strong {
            color: #093509;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h3>Trying to connect to the database engine...</h3>
            <?= $mysql_connected; ?>
            <h3>Trying to create the database...</h3>
            <?= $db_created; ?>
            <h3>Trying to select the database...</h3>
            <?= $db_selected; ?>
            <hr>
            <h3>Trying to create the database tables...</h3>
            <?php foreach ($table_arr as $prompt) {
                echo $prompt;
            }
            ?>
            <h3>Creating admin account...</h3>
            <?= $admin_created; ?>
            <h3>Populating site location data...</h3>
            <?= $site_created; ?>
            <h3>Migrating sample intern data into the db...</h3>
            <?= $intern_created; ?>
            <hr>
            <?= $display_total; ?>
            <hr>
            <?= $result_operations; ?>
        </div>
    </div>
</body>

</html>