<?php
  //require('./actions/users/sign-auth.php'); 
  //Google & facebook Api config files
  $session_stat = session_status(); 
  if ($session_stat = 0){
    session_start(); 
  }
  require_once ('config.php'); 
  require_once('google-config.php'); 
   
  


 $sign_in_moj = "Sign up\n"; $name_moj ="name\n " ; 
 $email_moj="Email\n "; $password_moj ="password\n "; 
 $re_password ="repeat password\n ";  $sign_btn_moj =" Register\n "; 


 $errorMsg=""; 

if(isset ($_GET["code"])){
    $token_access = $google_client -> fetchAccessTokenWithAuthCode($_GET["code"]); 

    if(!isset ($token_access['error']))
    {
       $google_client ->setAccessToken($token_access["access_token"]); 

       $_SESSION["access_token"] = $token_access["access_token"]; 

       $google_service = new Google_Service($google_client); 

       $data = $google_service->userinfo->get(); 
    }
    if(!isset($_SESSION['access_token'])){
        $auth_url = $google_client->createAuthUrl(); 
        /*$login_url =*/echo "<a href='$auth_url'>login here </a>"; 
    }
}

 /*if(isset $_POST[])
 $errorMsg = "<p class=error_msg>Error: Empty field </p>"; */
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="content-type" type="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
<meta name="google-signin-scope" content="profile email">


<!-----  css-file ------>
<link rel="stylesheet" href="./admin/css/desformat.css" >
<!-- Unicons css inkons inport -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
<!------- - Google api library link - ----->
<script src="https://apis.google.com/js/platform.js" async defer></script>

<title>Dst.star |sign_in page</title>
<body class="sgn-lgn-m">

    <div class="container-main">   
        <div class="container-marj-tp" >
     <div class="header-sign-in-form-log" name="sigup-formal">
        <h1 class="sign-in-head"><?php echo $sign_in_moj ;?></h1>
     </div>
     <section>
     <form class="form-container" method="POST" action="./actions/users/sign-auth.php">

     <?php // if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
     <?php echo $errorMsg ?>

        <div class="fill-up-content" name="user_name">
            <label class="tag-cont" for="user-name">
                <?php echo $name_moj ?>
            </label><br>
            <input class="fill-box" id="user-name" name="username"
              placeholder="Enter user name ..." maxlength="25"  />
        </div><br>

        <div class="fill-up-content" name="email">
            <label class="tag-cont" for="email">
                <?php echo $email_moj ?>
            </label><br>
            <input class="fill-box" id="e_mail" name="email"
            placeholder="Enter E-mail address..." maxlength="25"  />
        </div><br>
        <div class="fill-up-content" name="password">
            <label class="tag-cont" for="password">
                <?php echo $password_moj ?></label><br>
            <input class="fill-box" id="password" name="password"
            placeholder="Enter password ..." maxlength="30" type="password"  
            title="must containe at least 8 or more diffrent character" />

            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="eye" role="img" 
              width="16" height="15" viewBox="0 0 640 512" style="cursor:pointer"
              class="svg-inline--fa-eye-loc_show_hide_pwd">
              <path fill-rule="evenodd" d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 
              55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0
               1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 
               32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 
               32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167
               189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z" 
               fill=" rgb(80, 132, 115)"></path>
            </svg>
            <span id="show-hide" onclick="show_pwd()" class="show_into_btn" >show</span>
            
        </div><br>

        <div class="fill-up-content" name="re_password">
            <label class="tag-cont" for="repassword">
                <?php echo $re_password ?>
        </label><br>
        <input class="fill-box" id="re_pass" name="repassword" type="password"
        placeholder="repeat password ..." maxlength="30"  />
        </div><br>

        <div class="wrapp-sub-sign">
        <button class="sub-sign_in-btn" name="submit" type="submit" id="sign-in-btn" 
        value="" onclick="cursor_set()" >
               <?php echo $sign_btn_moj ?>
        </button>
        </div> 
        <a id="redirct-login"><p class="redirct-login-pg" >Already have an account? </p></a>

        
     </form>


     <?php
     //Signin Error handler  
   if(isset($_GET['error'])){
    if($_GET['error'] == "emptyfieled"){
        echo '<div class="error-msg">Error: Empty fields !!</div>'; 
    } 
    else if($_GET['error'] == "invalidesubs"){
        echo '<div class="error-msg">Error: the user name is incorrect</div>'; 
    }
    else if($_GET['error'] == "ivalidemail"){
        echo '<div class="error-msg">Error: incorrect email address </div>';
    }
    else if($_GET['error'] == "notmachedpasseword"){
        echo '<div class="error-msg">Error: The password and confirm password <br>
        does not matched </div>';
    }
    else if($_GET['error'] == "userexist"){

        echo '<div class="error-msg">Error: User exist before </div>'; 
    }

   }
?>
<div class="privacy_policy-nd_terms-content_main" id="tr-pri-container">
            <span class="service-on-signing">By sign in you agree, for our  
        <a class="privacy_terms-end_style">Terms of Services </a>and<br>
        <a class="privacy_terms-end_style">privacy policy</a>.</span>
        </div>
     </section>

     <!------------- Social media sign buttons ------------->
     <hr>
     <p class="or-para-aff">OR</p>
  <div class="social-sign-in-redirect-session" name="sign-in-with-social">
        
        <div class="social-madia-main-btns" id="social-btn"> 
            <a href="<?php echo $google_login ?>">
            <button class="part-gndg-btnauth-google" data-provider="google"
             id="sign-btn-google" value="" >
             <svg class="google-svg-icon" width="18" height="18" aria-label="hidden">
             <path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 0 0 2.38-5.88c0-.57-.05-.66-.15-1.18Z" fill="#fff"></path>
             <path d="M4.5 10.52a4.8 4.8 0 0 1 0-3.04V5.41H1.83a8 8 0 0 0 0 7.18l2.67-2.07Z" fill="#fff"></path>
             <path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 0 0 1.83 5.4L4.5 7.49a4.77 4.77 0 0 1 4.48-3.3Z" fill="#fff"></path>
             <path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 0 1-7.18-2.54H1.83v2.07A8 8 0 0 0 8.98 17Z" fill="#fff"></path>
             </svg>
               Sign up with Google
            </button></a>
             <a  href="<?php echo $login_url?>"> 
            <button class="part-fndc-btnauth-facebook" data-provider="facebook"
            id="sign-in-facebook" value="">
            <svg class="facebook-svg-icon" width="18" height="18" aria-label="hidden">
            <path d="M3 1a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H3Zm6.55 16v-6.2H7.46V8.4h2.09V6.61c0-2.07 
            1.26-3.2 3.1-3.2.88 0 1.64.07 1.87.1v2.16h-1.29c-1 0-1.19.48-1.19 1.18V8.4h2.39l-.31 2.42h-2.08V17h-2.5Z" fill="#fff"></path>
            </svg>
           
             Sign up with Facebook 
            </button></a>

        </div>

     </div>
     
     
    
</div>

     
</div>

<?php include_once('admin/docs/footer.php'); ?>
<script >
    //Change the password in for hidding/showing pwd
    
    function show_pwd(){
        let shhid = document.getElementById('show-hide');
        let password = document.getElementById('password');

        if( password.type == 'password'){
            password.type = 'text';
            shhid.innerHTML  =  "hide"; 
        }else if( password.type == 'text'){
            password.type = 'password'; 
            shhid.innerHTML = "show"; 
        }
    }   

     
    //Set the cursor %% if the fields are empty
    function cursor_set(){
        let fields_signin = document.querySelector('fill-box'); 
    let button_signin = document.querySelector('sub-sign_in-btn');
    if(fields_signin.value.lenght == 0){
        //button_signin.style.cursor = "not-allowed"; 
        document.getElementById("sub-sign_in-btn").style.cursor = "no-drop";
        console.log('not allowed cursor'); 
    }
    else{
        console.log('full field'); 
    }

    }

    
</script>

    <script type="text/javascript" >
        //redirect to login_page function
        document.querySelector('#redirct-login')
        .addEventListener('click', () => {
            window.location.href=('https://localhost/sfw_dev/login.php'); 

        }) 

    </script> 
    <script src="./js/login_signup.js" defer></script>
    
  

</body>
</html>