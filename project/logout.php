
<?php
 
session_start();
 
// To check if session is started.
if(isset($_SESSION["user"]))
{
    if(time()-$_SESSION["login_time_stamp"] >100) 
    {
        session_unset();
        session_destroy();
        header("Location:login.php");
    }
}
else
{
    header("Location:login.php");
}
?>