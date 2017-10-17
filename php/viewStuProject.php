<?php
include('connection.php');

class CreateProject extends connection{


    function createNewProject()
    {
		$con = new Connection();
        $conc=$con->connectionDB();
        session_start();

        $uid=$_SESSION['userID'];








         //   $sql = "SELECT project.* FROM `user_project` LEFT JOIN project ON user_project.projectID=project.projectID where user_project.userID=$uid";
                //echo $sql;
        $sql="select p.*,GROUP_CONCAT(user.username) as project_students from project p left JOIN user_project on user_project.projectID=p.projectID LEFT join user on user.userID=user_project.userID where user_project.userID=$uid GROUP BY p.projectID";
            $query =  mysqli_query($conc,$sql);


           // $this->closeConnection();

            if ($query) {
               $rs= mysqli_fetch_all($query,MYSQLI_ASSOC);
                return json_encode($rs);
            } else {
                return "fail";
            }

        }


    }

   $createusers=new CreateProject();

    echo $createusers->createNewProject();


?>