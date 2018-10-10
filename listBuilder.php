<?php
session_start();
?>
<!DOCTYPE html>
<!--
Author: Emily Stanek
Student ID: 000320919
Created: Sept 24, 2018

Once the input is validated in formValidation.php, the "Get Started" button
leads to this list building page. The user may enter as many items as they like, 
and they appear in the shopping list container. Once they are finished, they can
press the "Finished" button and it takes the user to the summary.php page
-->
<html>
    <head>
        <title>Build a Shopping List</title>
        <meta charset="UTF-8">
        <style>
            body {
                background-image: url("background.png");
                font-family: sans-serif;
                color: #3f3f3f;
            }
            .button{
                width: 80px;
                border: 2px solid #cc66ff;
                padding: 10px;
                border-radius: 10px;
                font-size: 14px;
                text-align: center;
                margin-top: 15px;
            }
            #addItemContainer {
                margin-top: 50px;
                margin-left: 25%;
                background-color: white;
                width: 50%;
                height: 80px;
                text-align: center;
                line-height: 1.5;
                border: 2px solid cyan;
                border-radius: 10px;
                box-shadow: 0px 3px 15px #666666;
            }
            #item {
                padding: 10px;
                width: 200px;
                font-size: 14px;
            }
            h4 {
                padding-top: 20px;
                color: #cc66ff;
                margin-top: -10px;
            }
            #listContainer {
                margin-top: 20px;
                margin-left: 25%;
                background-color: white;
                width: 50%;
                height: 400px;
                text-align: center;
                line-height: 1.5;
                border: 2px solid cyan;
                border-radius: 10px;
                box-shadow: 0px 3px 15px #666666;
            }
            h2 {
                padding-top: 10px;
                color: #cc66ff;
                font-size: 24px;
            }
            li {
                list-style: none;
            }
        </style>
    </head>
    <body>
        <div id="addItemContainer">
            <form action="" method="GET">
                <input type="text" name="newItem" id="item" placeholder="Type New Item Here..." required="">
                <input type="submit" value="Add" class="button">
                <input type="button" value="Finished" class="button" onclick="window.location.href = 'https://csunix.mohawkcollege.ca/~000320919/Assignment2/summary.php'">
                <br>
                <?php
                //if the newItem text box is not set
                if (!isset($_GET["newItem"])) {
                    $_SESSION["newItem"] = filter_input(INPUT_GET, "newItem", FILTER_SANITIZE_STRING);
                    $_SESSION["list"] = Array();
                }
                //output variables and array_push to add newItem to the shopping list array
                $newItem = $_SESSION["newItem"] = filter_input(INPUT_GET, "newItem", FILTER_SANITIZE_STRING);
                $list = $_SESSION["list"];
                if (in_array($newItem, $list)) {
                    echo "Item already exists on the list!";
                } else {
                    array_push($list, $newItem);
                }
                $_SESSION["list"] = $list;
                ?>

            </form>
        </div>
        <div id="listContainer">
            <h2>Your Shopping List</h2>
            <ul>
                <!-- prints out each list item in the array on a new line -->
                <?php for ($i = 0; $i < count($list); $i++) { ?>
                    <li><?php echo $list[$i]; ?></li>
                    <?php
                }
                ?>
                </li>
            </ul>

        </div>
    </body>
</html>
