<?php
session_start();
include('connection.php');

class LoginUser extends connection
{
    function __construct()
    {
        $this->connectionDB();
    }

  function login()
  {
      $user_name = $_REQUEST['username'];
      $user_pass = $_REQUEST['password'];
	  $con = new Connection();
        $conc=$con->connectionDB();

      $check_sql = "select username,password,user_type,userID from user where username='$user_name' and password='$user_pass'";
	 // echo $check_sql;
      $check_query = mysqli_query($conc,$check_sql);

      $rs = mysqli_fetch_array($check_query);
      //print_r($rs);
      if ($rs['username'] == $user_name && $rs['password']==$user_pass) {
          $_SESSION['username']=$rs['username'];
          $_SESSION['type']=$rs['user_type'];
          $_SESSION['userID']=$rs['userID'];

          return  $_SESSION['type'];
      }else{
          return "failed";
      }
  }

}
   $loginuser=new LoginUser();

     echo $loginuser->login();
   
?>