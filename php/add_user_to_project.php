<?php
include('connection.php');

class CreateUser extends connection{
	
   
    function createNewUser()
    {
        $con = new Connection();
        $conc = $con->connectionDB();
        $pro_id = $_REQUEST['pro_id'];
        $user_id = $_REQUEST['stu_id'];


        $check_sql = "select userID	 from user_project where projectID=$pro_id";
        //echo $check_sql;

        $check_query = mysqli_query($conc, $check_sql);

        $rs = mysqli_fetch_array($check_query);
        //print_r($rs);
        if ($rs['userID'] == $user_id) {
            return "user already added";
        } else {
            $sql = "INSERT INTO `user_project`(`userID`, `projectID`) VALUES ($user_id,$pro_id)";
            //   echo $sql;
            $query = mysqli_query($conc, $sql);


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