<?php 
// ==================== Sign up system ============ //
//=== Sign-in fuctions created for the sign up system -Anmeldesystem- ===//

 function emptyInputSignup($username,$usermail,$userpassword,$userrepassword){
    $returned_result = false;
    if(empty($username) || empty($usermail) || empty($userpassword) || empty($userrepassword)){
        $returned_result = true;
        echo 'Error: Check empty fieled !!'; 

    }else {
        $returned_result = false;
    }
    return $returned_result;
}

function invalidsubsid($username){
    $returned_result = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/" ,$username)){
        $returned_result = true;
    }
    else{
        $returned_result = false; 
    }
    return $returned_result; 
}
function invalidemail($usermail){
    $returned_result = false; 
    if(!filter_var($usermail, FILTER_VALIDATE_EMAIL)){
        $returned_result = true; 
    }else{
        $returned_result = false; 
    }
    return $returned_result; 
}

function matchedpasseword($userpassword,$userrepassword){
  $returned_result = false;   
    if($userpassword !== $userrepassword){
        $returned_result = true;  
        echo'passwoord not matched';  
    }else {
        $returned_result = false; 
    }
    return $returned_result; 
}

function inputinfosexist($connection,$username, $usermail ){
    $sql = "SELECT * FROM users WHERE usersName = ? OR usersemail = ?;" ; 
    $stmt = mysqli_stmt_init($connection); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../login.php?error=stmtgetfailed");
        exit(); 
    }
    mysqli_stmt_bind_param($stmt, "ss",$username, $usermail); 
    mysqli_stmt_execute($stmt); 

    $data_result = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($data_result)){
        return $row; 
    }else{
        $returned_result =false; 
        return $returned_result; 
    }
    
    mysqli_stmt_close($connection); 

}


function creatusers($connection, $username,$usermail, $userpassword){
    $sql = "INSERT INTO users (usersName,usersemail,userspassword) VALUES (?,?,?) ;"; 
    $stmt = mysqli_stmt_init($connection); 

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: https://localhost/sfw_dev/sign-in.php?error=stmtgetfailed");
        exit(); 
    }

    $hashedpwd = password_hash($userpassword, PASSWORD_DEFAULT); 

    mysqli_stmt_bind_param($stmt, "sss",$username, $usermail,$hashedpwd); 
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt); 
    header("location: https://localhost/sfw_dev/profile.php"); 
    exit(); 
}



//================ login system ==========================//
// login fuctions created for the sign up system -Anmeldesystem-

 function emptyInputlogin($usermail,$userpassword){
    $returned_result = false;
    if(empty($usermail) || empty($userpassword) ){
        $returned_result = true;
        echo 'Error: Check empty filed !!'; 

    }else {
        $returned_result = false;
    }
    return $returned_result;
}




function loginuser($connection,$usermail,$userpassword){
    $useridexist = inputinfosexist($connection,$usermail,$usermail); 

    if($useridexist === false){
        header("location: https://localhost/sfw_dev/login.php?error=wronglogin"); 
        exit(); 
    }
    $hashedpwd = $useridexist["userspassword"]; 
    $checkpwdmaches = password_verify($userpassword,$hashedpwd); 

    if($checkpwdmaches === false){
        header("location: https://localhost/sfw_dev/login.php?error=notmachedpasswordqq"); 
        exit();  
    }
    else if($checkpwdmaches === true){
        session_start(); 
        $_SESSION["usersemail"] = $useridexist["usersemail"]; 
        $_SESSION["userspassword"] = $useridexist["userspassword"];
        $_SESSION["time_out_users"] = time(); 
        $_SESSION["usersName"] = $useridexist["usersName"]; 
        header("location: https://localhost/sfw_dev/profile.php"); 
        exit(); 
    }

}

function logged_in(){
    $usermail = $_SESSION["usersemail"]; 
    if($_SESSION["usersemail"]){
        return true;
        //user is logged in 
    }
    else{
        return false;
        //user not logged redirect to login page + error msg 
    }
}





 
 
