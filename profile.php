<?php 
session_start(); 
require_once('./actions/users/functions.php'); 


if(logged_in() !== true){
    header('location: https://localhost/sfw_dev/login.php?Error:youhaventbeenlogged'); 
    exit(); 
}else{
    echo'<script>console.log("you are logged in")</script> '; 
}


if(users_session_expired() != false){
   header("location: https://localhost/sfw_dev/index.php?session_time_expired");
}
else{
    //echo date('d/m/Y H:i:s',time() - 3600 * 1) ; 
}

$session_stat = session_status(); 
 //echo $session_stat ; 
//echo "welcome " . $_SESSION["usersemail"];  echo ' and your password: ' .$_SESSION['userspassword']; 


 ?>


<!DOCTYPE html>
<html translate="yes" lang="EN/US" dir="ltr" >
    <head>
        <meta charset="utf-8" http-equiv="type-content" >
        <meta http-equiv="X-UA-compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="">
        <meta name="description" content="Dst-pofile_page">
        <!--Custom css file-->
        <link rel="stylesheet" href="./admin/css/profile.css">
        <title>Dst-profile</title>
    </head>
<body>
    <!-- navigation bar for .profile -->
    <nav class="navigation-bar-profile-menu-71b" name="nav-bar-handler">
        <div class="dst-logo_container" id="dst-logo">
            <img class="img-li" src="./admin/imgs/logo-g1-profile.png" alt="logo"
            style="height:60px;width: 137px; cursor: pointer" />
            
            <?php
            $courses_page = "https://localhost/sfw_dev/courses.php";
            ?>
           
        </div>
        <div classs="navigation-list-form">
            <ul class="nav-ls-wrapper" >
                <li class="list-content-tgf">
                    <a class="code-redirect_mench" href="
                    <?php echo $courses_page?>">Courses</a>
                </li>
                <li>
                    <a class="code-redirect_mench" href=""> Code</a> 
                </li>
                <li>
                   <a class="code-redirect_mench" href=""> Forum </a>
                </li>
                <li>
                    <a class="code-redirect_mench" href=""> Other</a>
                </li>
            </ul>
        </div>
        <!--------------- -Premium button- ---------->
        <div class="premium-btn-lst_mode">
            <button class="premium-class-line-button_init_line0A189"  id="premiun-btn" 
            tabindex="0" sl-test-data="active" name="making-premium-acc">Premium</button>
</div> 
    
   <div class="container_more_line-for_profile-points">
    <div class="point_xp-container-formend" id="menu_link"> 
    
        <img class="diamond_xp-img" alt="" src="./admin/imgs/Dst.Star-profile_diamond-xp.png" 
        style="height: 35; width: 30px" />
        <span class="points-received_lineXp" data-test="crown-stat">0</span>
    </div>
</nav>

    <div class="dropdown">
  <img onclick="show_menu()" class="dropbtn" src='./admin/imgs/dafault_profile_img_206976-1935138293.png' 
  style="height: 40px; width:40px; cursor:pointer">
  <div id="myDropdown" class="dropdown-content" >

  <div class="profile-menu_handler-container_wrappe-line" >
<h3 class="profile-name"><?php echo  $_SESSION["usersName"] .'';  ?> </h3> 

       
    </div>
    
  <ul>
  
    <div class="profile-menu_handler-container_wrappee"id="setting_handler">
    <h3 class="profile-name-ts"><?php echo $_SESSION['usersName'] .' '. 'Profile'?></h3>
    <h3 class="profile-iline-tst">operational team </h3>
    <hr class="line-separate-sect"></hr>
</div>
            <li class="prf-infos">
                <img class="profile_img_font" src="./admin/imgs/user.png" alt="" 
                name="profile-fit_content" style="width:40px; height:40px"/>
                <a class="my_profile_set_fit-anime" id="myprofile_at01" href="">My Profile</a>
            </li>
            <li class="prf-infos">
                <img class="profile_img_font" src="./admin/imgs/settings.png" alt=""
                name="settings-fit_content" style="width: 40px; height: 40px" />
                <a class="my_profile_set_fit-anime" id="settings_at02" href="">Settings</a>
            </li>
            <li class="prf-infos">
            <img class="profile_img_font" src="./admin/imgs/edit.png" alt=""
              name="edit-dit_content"  style="width: 40px; height: 40px" />
            <a class="my_profile_set_fit-anime" id="edit_profile_at03"href="">edit Profile</a>
            </li>
            <li class="prf-infos"> 
            <img class="profile_img_font" src="./admin/imgs/exit.png" alt=""
            name="logout-fit_content" style="width: 40px; height: 40px" />
            <?php
            if(isset($_SESSION["usersemail"])){
            echo"<a class='my_profile_set_fit-anime' id='logout_user' href='logout.php'>logout</a>"; 
            }
            ?>
            </li>
        </ul>
   
  </div>
</div>

    <?php

    if(isset($_SESSION["usersemail"])){
        //check the session if(positif == user_logged)otherWise(negatif == user_notlogged)
        //echo"<script> console.log('logged in !!') </script>"; 
    }
    
    else{
        echo"<script> console.log('you are not logged in !!')</script>"; 
    }

    ?>
    
</form>
    
    </div>
</div>
 
<?php 
      //Home dst star profile content in:/dst.star/profile/home_main
include_once('./admin/profile-docs/head-profile.php') ?> 

<?php
    //footer dst star profile content in:/dst.star/profile/footer
    include_once('./admin/profile-docs/footer-profile.php'); 
?>


    <script defer> 
     //menu drop/click scrip
     /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function show_menu() {
    let menu_list = document.getElementById("myDropdown"); 
  menu_list.classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
        
      }
    }
  }
} 

document.getElementById('premiun-btn').addEventListener('click', () =>{
    window.location.href = 'https://localhost/sfw_dev/Premium/premium-member.php'; 
})


</script>
<script defer src="./js/main.js"></script>

    

</body>
</html>