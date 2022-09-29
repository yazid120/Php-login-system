?php
session_start(); 
require_once('database-handler.php'); 
require_once('functions.php'); 


    
    if(isset($_POST["submit"])){
    $username = $_POST[username']; //UserName value inside the sql db 
    $usermail =  $_POST[usermail']; //UserEmail value inside the sql db
    $userpassword = $_POST[username']; //User password  value inside the sql db
    $userrepassword = $_POST['userrepassword']; // ****

    if(emptyInputSignup($username, $usermail, $userpassword, $userrepassword) !== false){
        header("location: https://localhost/sfw_dev/sign-in.php?error=emptyfieled"); 
        
        exit(); 
    }
    if(invalidsubsid($username ) !== false){
        header("location: https://localhost/sfw_dev/sign-in.php?error=invalidesubs"); 
        exit(); 
    }
    if(invalidemail($usermail ) !== false){
        header("location: https://localhost/sfw_dev/sign-in.php?error=ivalidemail"); 
        exit(); 
    }
    if(matchedpasseword($userpassword,$userrepassword) !== false){
        header("location: https://localhost/sfw_dev/sign-in.php?error=notmachedpasseword"); 
        exit(); 
    }
    if (inputinfosexist($connection,$username,$usermail) !== false){
        header("location: https://localhost/sfw_dev/sign-in.php?error=userexist"); 
        exit(); 
    }
    else{
        header("location: https://localhost/sfw_dev/sign-in.php?sign_in"); 
    }
    

    creatusers($connection, $username,$usermail, $userpassword); 

    }
