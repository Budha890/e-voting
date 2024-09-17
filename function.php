<?php 

function loginToV($userid, $fname , $role)//Login to the application using given parameters
{
    if(!isset($_SESSION['userid'])&&!isset($_SESSION['role'])&&!isset($_SESSION['fname']))//If user is not already logged in, set session
    {
        $_SESSION['userid'] = $userid;
        $_SESSION['fname'] = $fname;
        $_SESSION['role'] = $role;
        
    }

}


function isLoggedIn(){
if(isset($_SESSION['userid'])&&isset($_SESSION['fname'])&&isset($_SESSION['role'])){
    
    return array(
        "userid" =>$_SESSION['userid'],
        "fname" =>$_SESSION['fname'],
        "role" =>$_SESSION['role']			
        );
}
    return FALSE;
}

?>