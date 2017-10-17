<?php
include('connection.php');

class CreateProject extends connection{


    function createNewProject()
    {
		$con = new Connection();
        $conc=$con->connectionDB();








            $sql = "select p.*,GROUP_CONCAT(user.username) as project_students from project p left JOIN user_project on user_project.projectID=p.projectID LEFT join user on user.userID=user_project.userID GROUP BY p.projectID";
                // echo $sql;
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