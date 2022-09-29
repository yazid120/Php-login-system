<?php 
  //require('./actions/users/login-auth.php');
  //Start session
  //session_start();
  require_once('config.php'); 
  require_once('vendor/autoload.php'); 

$login_moj ="login\n";
$mail_moj="email\n"; $password_moj="password\n"; 

$errorMsg=""; 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-----  css-file ------>
    <link rel="stylesheet" href="./admin/css/desformat.css" >
    <!------- - Google api library link - ----->
<script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>Dst.star |login page</title>
</head>

<?php
$not_member_error = '<div class="not_memb_error-message">You need to be member in order 
to access courses</div>'; 

if(isset($_GET['Error'])){
  if($_GET['Error'] == 'you_to_be_logged_in_inorder_toaccess'){
    echo $not_member_error; 
  }
}

?> 

<body class="sgn-lgn-m">

  <div class="login-main-container">

    <div class="login-conatainer-marj">
        <div class="login-header-main-format" name="top-pos-login-cont">
            <h1 class="login-text"><?php echo $login_moj ; ?></h1>
        </div>
      <section>
      <form class="log-form-container"  method="POST" action="./actions/users/login-auth.php">
        <?php // if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
        <?php echo $errorMsg ?>
            
        <div class="fill-up-content" name="email">
            <label class="tag-cont" for="email-id">
                <?php echo $mail_moj ?>
            </label><br>
            <input class="fill-box" id="mail-form" name="email"
              placeholder="Enter mail address ..." maxlength="25"  />
        </div><br>
        <div class="fill-up-content" name="password">
            <label class="tag-cont" for="password">
                <?php echo $password_moj ?>
            </label><br>
            <input class="fill-box" id="password-nm" name="password" type="password"
              placeholder="Enter password ..." maxlength="30"  />
              
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
        </div>
        <a id="forgot_passwrd"><p class="forgot-passwrd-content">forgot password?</p></a> 

        <div class="wrapp-login">
        <button class="sub-login-btn"  name="submit_login" id="login-btn "
        value="" ><?php echo $login_moj ?></button>
        </div>
        <a id="redirect-sign-in"><p class="redirct-login-pg" >dont have an account yet</p></a>
            
        </form> 
      <?php
      //Error handling for login system
        if(isset($_GET['error'])){
        if($_GET['error'] == "emptyfiled"){
         echo '<div class="error-msg">Error: Empty fields!! </div>'; 
        }
        else if ($_GET['error'] == "wronglogin"){
          echo '<div class="error-msg">Error: User does not exist  </div>';
        }
        else if ($_GET['error'] ='notmachedpasswordqq'){
          echo '<div class="error-msg">Error: Wrong password !!</div>';
        }
        else{
          echo '<div class="error-msg">Error: Something went wrong
           please try again.</div>'; 
        }
        
        }
      ?>
      <script type="text/javascript">
        //let login_btn = document.getElementById('login-btn'); 
        //console.log(login_btn); 
      </script>

      </section>
        <hr>
     <p class="or-para-aff">OR</p>
  <div class="social-sign-in-redirect-session" name="sign-in-with-social">
        
        <div class="social-madia-main-btns" id="social-btn"> 
            <button class="part-gndg-btnauth-google" data-provider="google"
             id="sign-btn-google" value="" >
             <svg class="google-svg-icon" width="18" height="18" aria-label="hidden">
             <path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 0 0 2.38-5.88c0-.57-.05-.66-.15-1.18Z" fill="#fff"></path>
             <path d="M4.5 10.52a4.8 4.8 0 0 1 0-3.04V5.41H1.83a8 8 0 0 0 0 7.18l2.67-2.07Z" fill="#fff"></path>
             <path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 0 0 1.83 5.4L4.5 7.49a4.77 4.77 0 0 1 4.48-3.3Z" fill="#fff"></path>
             <path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 0 1-7.18-2.54H1.83v2.07A8 8 0 0 0 8.98 17Z" fill="#fff"></path>
             </svg>
               Continue with Google
            </button>
            <button class="part-fndc-btnauth-facebook" data-provider="facebook"
            id="sign-in-facebook" value="" >
            <svg class="facebook-svg-icon" width="18" height="18" aria-label="hidden">
            <path d="M3 1a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H3Zm6.55 16v-6.2H7.46V8.4h2.09V6.61c0-2.07 
            1.26-3.2 3.1-3.2.88 0 1.64.07 1.87.1v2.16h-1.29c-1 0-1.19.48-1.19 1.18V8.4h2.39l-.31 2.42h-2.08V17h-2.5Z" fill="#fff"></path>
            </svg>
            <a  href="<?php echo $login_url?>"> 
             Continue with Facebook </a> </button>
            
        </div>

     </div>
     

    </div>
  </div>

  <?php include_once('admin/docs/footer.php'); ?>
  <script >
    let password = document.getElementById('password-nm'); 
    let show_pwd_log = document.getElementById('show-hide'); 
    
    function show_pwd(){
        //change the value of the password input from 
        //Value-password to value-text

      if(password.type == 'password'){
        password.type = 'text'; 
        show_pwd_log.innerHTML = "hide"; 
      }
      else if(password.type == 'text'){
        password.type = 'password';
        show_pwd_log.innerHTML ="show"; 
      }
      
    }
  </script>

  <script type="text/javascript">
    //Redirection
    document.querySelector('#redirect-sign-in').addEventListener('click' ,() => {
      window.location.href=('https://localhost/sfw_dev/sign-in.php'); 
    }
    )
    document.querySelector('#forgot_passwrd').addEventListener('click' ,function(){
      window.location.href=('https://localhost/sfw_dev/forget-password.php'); 

    })
    </script>


</body>
</html>