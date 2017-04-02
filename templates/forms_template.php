<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= BASE_URL ?>">
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title><?= PROJECT_NAME ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/components/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        body {
            min-height: 2000px !important;
            font-family: Calibri;
            font-size: 16px;
            line-height: 160%;
            text-align: justify;
            background-color: #f7f6f6;
        }

        .header {
            background-color: #FFE600;
            height: 80px;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        img, h4 {
            display: inline-block;
        }

        h4 {
            margin-left: 20%;
            padding-top: 10px;
        }

        img {
            width: 274px;
            height: 70px;
            margin-bottom: 20px;
            margin-left: 20px;
        }
    </style>


    <!-- jQuery -->
    <script src="vendor/components/jquery/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


</head>

<body>

<div class="header">
    <img src="assets/images/KHK_logo.png"/>
</div>

<!-- Main component for a primary marketing message or call to action -->
<?php if (!file_exists("views/$controller/{$controller}_$action.php")) error_out('The view <i>views/' . $controller . '/' . $controller . '_' . $action . '.php</i> does not exist. Create that file.'); ?>
<?php require "views/$controller/{$controller}_$action.php"; ?>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="vendor/components/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
