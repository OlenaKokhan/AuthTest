<?php
require_once 'classes/Helper.php';

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12"></div>
        <div class="col-md-4 col-sm-12 col-xs-12 hello">

            <?php if (\classes\Helper::isAuthorized()): ?>
                <?php include 'views/auth_view.php';?>
            <?php elseif (\classes\Helper::isRogue()): ?>
                <?php include 'views/rogue_view.php';?>
            <?php else: ?>
                <?php include 'views/main_view.php';?>
            <?php endif; ?>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12"></div>
    </div>
</div>


<script src="./js/login.js"></script>

</body>
</html>
