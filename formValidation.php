<?php
session_start();
?>
<!DOCTYPE html>
<!--
Author: Emily Stanek
Student ID: 000320919
Created: Sept 24, 2018

The input from index.html is filtered and sanitized, and is compared against
regular expressions to ensure proper input, if there is an error in the input 
an error message is displayed as well as a "Go Back" button. If the input is
good the user may proceed to listBuilder.php
-->
<html>
    <head>
        <title>Store Information</title>
        <meta charset="UTF-8">
        <style>
            body {
                background-image: url("background.png");
                font-family: sans-serif;
                color: #3f3f3f;
            }
            .button{
                border: 2px solid #cc66ff;
                padding: 10px;
                border-radius: 10px;
                font-size: 14px;
                text-align: center;
                margin-top: 15px;
            }
            #formValidation{
                margin-top: 50px;
                margin-left: 30%;
                background-color: white;
                width: 40%;
                height: 300px;
                text-align: center;
                line-height: 1.5;
                border: 2px solid cyan;
                border-radius: 10px;
                box-shadow: 0px 3px 15px #666666;
            }
            #message{
                padding-top:20px;
            }
            h4 {
                padding-top: 20px;
                color: #cc66ff;
            }
        </style>
    </head>
    <body>
        <?php
        // filters out bad input
        $_SESSION["storeName"] = filter_input(INPUT_GET, "storeName", FILTER_SANITIZE_STRING);
        $_SESSION["address"] = filter_input(INPUT_GET, "address", FILTER_SANITIZE_STRING);
        $_SESSION["city"] = filter_input(INPUT_GET, "city", FILTER_SANITIZE_STRING);
        $_SESSION["postalCode"] = filter_input(INPUT_GET, "postalCode", FILTER_SANITIZE_STRING);
        //if the storeName does not match the regular expression, an error message is displayed
        if (!preg_match('/^[A-Z]|[\d][\w]+\s/', $_SESSION["storeName"])) {
            $message = nl2br("The store name must be capitalized. /n");
        }
        //if the address does not match the regular expression, an error message is displayed
        if (!preg_match('/[1-9]+ [A-Z][a-z]+ (Ave\.)|(St\.)|(Blvd\.)|(Rd\.) [NSEW]/', $_SESSION["address"])) {
            $message = nl2br("Address is not formatted correctly. \n Please enter an address formatted like so: 10 Main St. N \n");
        }
        //if the city does not match the regular expression, an error message is displayed
        if (!preg_match('/^[A-Z][a-z]+/', $_SESSION["city"])) {
            $message = nl2br("City is not entered correctly. \n Please make sure it starts with a capital and is only one word. \n");
        }
        //if the postalCode does not match the regular expression, an error message is displayed
        if (!preg_match('/^[A-Z][0-9][A-Z] ?[0-9][A-Z][0-9]$/', $_SESSION["postalCode"])) {
            $message = nl2br("Postal code is not formatted correctly. \n Please enter a postal code formatted like so: A0A 0A0 \n");
        }
        ?>
        <br>
        <div id ="formValidation">
            <!-- if all input matches the regular expressions, the info is displayed and a "Go Back" and "Get Started" button are displayed -->
            <?php if (preg_match('/^[A-Z]|[\d][\w]+\s/', $_SESSION["storeName"]) && preg_match('/[1-9]+ [A-Z][a-z]+ (Ave\.)|(St\.)|(Blvd\.)|(Rd\.) [NSEW]/', $_SESSION["address"]) && preg_match('/^[A-Z][a-z]+/', $_SESSION["city"]) && preg_match('/^[A-Z][0-9][A-Z] ?[0-9][A-Z][0-9]$/', $_SESSION["postalCode"])) : ?>
                <h4><?php echo nl2br("{$_SESSION["storeName"]} \n {$_SESSION["address"]} \n {$_SESSION["city"]} \n {$_SESSION["postalCode"]}") ?></h4>
                <br>
                <input type="button" value="Go Back" class="button" onclick="window.location.href = 'https://csunix.mohawkcollege.ca/~000320919/Assignment2/index.html'" />
                or
                <input type="button" value="Get Started" class="button" onclick="window.location.href = 'https://csunix.mohawkcollege.ca/~000320919/Assignment2/listBuilder.php'" />
            <!-- if all input doesn't match the regular expressions an error message indicating the error is displayed and a "Go Back" button 
            is displayed -->
            <?php else : ?>
                <div id="message">
                    <?php echo $message ?>
                </div>
                <input type="button" value="Go Back" class="button" onclick="window.location.href = 'https://csunix.mohawkcollege.ca/~000320919/Assignment2/index.html'" />
            <?php endif; ?>
        </div>
    </body>
</html>