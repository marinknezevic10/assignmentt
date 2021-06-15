<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['page_title']. " | " . WEBSITE_NAME ?></title>
    <link rel="stylesheet" href="<?= ASSETS ?>template/css/components.css">
    <link rel="stylesheet" href="<?= ASSETS ?>template/css/icons.css">
    <link rel="stylesheet" href="<?= ASSETS ?>template/css/responsee.css">
    <link rel="stylesheet" href="<?= ASSETS ?>template/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?= ASSETS ?>template/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="<?= ASSETS ?>template/css/lightcase.css">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="<?= ASSETS ?>template/css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,400,600,900&subset=latin-ext" rel="stylesheet"> 
    <script type="text/javascript" src="<?= ASSETS ?>template/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?= ASSETS ?>template/js/jquery-ui.min.js"></script>      
  </head>

  <body class="size-1140">
    <div id="page-wrapper">
      <!-- HEADER -->
      <header role="banner" class="position-absolute margin-top-30 margin-m-top-0 margin-s-top-0">    
        <!-- Top Navigation -->
        <nav class="background-transparent background-transparent-hightlight full-width sticky">

        

          <div class="s-12 l-10">
            <div class="top-nav right">
              <p class="nav-text"></p>
              <ul class="right chevron">
              
              <?php if(isset($_SESSION['user_name'])): ?>

                <li>Hi <?= $_SESSION['user_name']?></li>

              <?php endif; ?>

                <li><a href="<?php ROOT ?>home">Home</a></li>
                <li><a href="<?php ROOT ?>about">About Us</a></li>             
                <li><a href="<?php ROOT ?>contact">Contact</a></li>

                <?php if(!isset($_SESSION['user_name'])): ?>
                <li><a href="<?php ROOT ?>login">Login</a></li>
                <li><a href="<?php ROOT ?>signup">Signup</a></li>
                <?php else: ?>
                <li><a href="<?php ROOT ?>logout">Logout</a></li>
                <li><a href="<?php ROOT ?>upload">Upload</a></li>
                <?php endif; ?>
              </ul>
            </div>
          </div>  
        </nav>
      </header>
      