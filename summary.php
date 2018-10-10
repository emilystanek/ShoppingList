<?php
session_start();
?>
<!DOCTYPE html>
<!--
Author: Emily Stanek
Student ID: 000320919
Created: Sept 24, 2018

The info from index.html and the listBuilder.php page are displayed as a summary
for the user
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping List Summary</title>
        <style>
            body {
                background-image: url("background.png");
                font-family: sans-serif;
                color: #3f3f3f;
            }
            #container {
                margin-top: 50px;
                margin-left: 30%;
                background-color: white;
                width: 40%;
                height: 600px;
                text-align: center;
                border: 2px solid cyan;
                border-radius: 10px;
                box-shadow: 0px 3px 15px #666666;
            }
            h4 {
                color: #ff66cc;
            }
            h1 {
                padding-top: 10px;
                color: #cc66ff;
                font-size: 24px;
                text-align: center;
                padding-bottom: 8px;
            }
            li{
                text-align: left;
                margin-left: 40%;
                font-family: monospace;
                color: grey;
                font-size: 14px;
            }
            hr{
                width: 80%;
                border: 1px solid cyan;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <h1>Summary of Shopping List <br> for <?php echo $_SESSION["storeName"]; ?></h1>
            <hr>
            <!-- lists store info from index.html -->
            <h4><?php echo "{$_SESSION["storeName"]} | {$_SESSION["address"]} | {$_SESSION["city"]} | {$_SESSION["postalCode"]}" ?></h4>

            <?php
            $list = $_SESSION["list"];
            //prints out list items on single lines
            for ($i = 1; $i < count($list); $i++) {
                ?>
                <li><?php echo $list[$i]; ?></li>
                <?php
            }
            ?>
        </div>
    </body>
</html>
