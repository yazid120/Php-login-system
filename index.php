<?php 
    /* 
    * @author  <yzd-zed>; 
    * realisation of web_app sjf-dev
    */ 
    
    //include('admin/accounts/sign-in.php');
    //session_start(); 
   //$session_stat = session_status();
   //print_r($session_stat);  
    
?>
<!DOCTYPE html>
<html translate="yes" lang="en-US" dir="ltr" class="dark-theme">
    <head>
        <meta charset="UTF-8" http-equiv="content-type" >
        <meta http-equiv="X-UA-compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="">
        <meta name="description" content="Dst-main_page">
        <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
        <meta property="og:language" content="en"/>
        <meta property="og:siteName" content="Dst.star" />
        <!-- Font Awesome Icon Library -->
        <!-- font-awesome custom link -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0563b00573.js" crossrongin="annoymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Boxicons CDN Link for CSS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
         <!--Custom css file-->
         <link rel="stylesheet" href="./admin/css/docs.css" type="text/css" media="screen">
         <!-- Unicons css inkons inport -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
        <title>Dst.star |Home</title>
</head>
    
    <?php 
    //--- represent the head section of the app@
        include_once('admin/docs/header.php'); ?>
    <body>
        <?php
        //--- represent the main content for the 
        //welcome section .
        include_once('admin/docs/home.php'); ?> 



    <?php 
    //--- represente the content for the
    //  footer section .
    include_once('admin/docs/footer.php'); 
    ?> 


        <script src="./js/main.js" defer></script>
        

    </body>
</html>