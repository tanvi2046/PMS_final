<?php
include('connection.php');

class CreateUser extends connection{
	
   
    function createNewUser()
    {
        session_start();

        $con = new Connection();
        $conc=$con->connectionDB();
        $p_id = $_REQUEST['id'];
        $msg = $_REQUEST['msg'];
        $user = $_SESSION['type'];



            $sql = "INSERT INTO `project_messages`(`projectID`, `message`, `sender`) VALUES ($p_id,'$msg','$user');";
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

   $createusers=new CreateUser();

    echo $createusers->createNewUser();


?>