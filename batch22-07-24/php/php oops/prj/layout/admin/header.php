<?php
require_once dirname(__DIR__) . "/../include/web.php";
require_once dirname(__DIR__) . "/../include/table.php";

?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css
" rel="stylesheet">
  <style>
    #error {
      position: fixed;
      top: 10px;
      right: 5px;
      width: 300px;
      z-index: 999999;
    }
  </style>

</head>

<body>
  <?php
  require_once "nav.php";
  ?>

  <div id="error"> </div>