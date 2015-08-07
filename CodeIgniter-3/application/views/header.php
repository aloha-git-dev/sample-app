<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo url_title("Address Details"); ?></title>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" type="text/css" media="all"/>
<link rel="stylesheet" href=<?php echo base_url(). "assets/bootstrap/css/bootstrap.min.css" ?> type="text/css" media="all"/>
<link rel="stylesheet" href=<?php echo base_url(). "assets/css/style.css" ?> type="text/css" media="all"/>
<script src= <?php echo base_url(). "/assets/js/jquery-1.10.2.js"; ?> ></script>
<script src= "//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" type="text/javascript"  ></script>
<script src= <?php echo base_url(). "/assets/bootstrap/js/bootstrap.min.js"; ?> type="text/javascript"  ></script>
</head>
<body>

<header>
    <div class="row">
       <div class="col-md-12 col-md-offset-1 text-left"><?php echo heading('Test Application', 2) ;?>   </div>
    </div>
</header>
<div id="container">    
    <div class="container-fluid">  