<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content=""/>
    <title>Sample App - Test</title>
    <!-- title icon -->
    <!-- Bootstrape CSS -->
    <link href="public/css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="public/css/bootstrap/bootstrap-theme.css" rel="stylesheet">
    <link href="public/css/layout.css" rel="stylesheet">

    <!-- Jquery UI CSS -->
    <link href="public/DataTables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="public/jquery/jquery-ui.min.css" rel="stylesheet">

    <!-- Includes Scripts  -->
    <script src="public/jquery/jquery-1.10.2.min.js"></script>
    <script src="public/jquery/jquery-ui.min.js"></script>
    <!-- Bootstrap Scripts -->
    <script src="public/js/bootstrap/bootstrap.js"></script>
    <script src="public/js/address.js"></script>
    <script src="public/js/common.js"></script>

    <script type="text/javascript" src="public/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="public/js/jquery.dataTables.min.js"></script>    
</head>

<body>
    <?php 
        require_once './includes/define_var.php';
        require_once './classess/class.db.php';
        require_once './classess/class.sql.php';
     ?>
    <!-- Header Section -->
    <header>
        <div class="header text-left">Sample App</div>
    </header>

    <div class="container">           