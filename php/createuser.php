<?php
include('connection.php');

class CreateUser extends connection{
	
   
    function createNewUser()
    {
		$con = new Connection();
        $conc=$con->connectionDB();
        $f_name = $_REQUEST['fname'];
        $l_name = $_REQUEST['lname'];
		$username=$_REQUEST['username'];
		$user_pass = $_REQUEST['pass'];
        $user_email = $_REQUEST['email'];
        $user_type = $_REQUEST['type'];


        $check_sql = "select username from user where username='$username'";
		//echo $check_sql;

        $check_query =  mysqli_query($conc,$check_sql);

        $rs =   mysqli_fetch_array($check_query);
        //print_r($rs);
        if ($rs['username'] == $username) {
            return "user already exist";
        } else {

            $sql = "INSERT INTO user(fname, lname, username, email ,user_type,password) VALUES ('$f_name','$l_name', '$username', '$user_email','$user_type','$user_pass');";
             //    echo $sql;
            $query =  mysqli_query($conc,$sql);


           // $this->closeConnection();

            if ($query) {
                return "success";
            } else {
                return "fail";
            }

        }
    }

    }

   $createusers=new CreateUser();

    echo $createusers->createNewUser();


?>