<?php
include('connection.php');

class CreateProject extends connection{


    function createNewProject()
    {
		$con = new Connection();
        $conc=$con->connectionDB();


            $sql = "SELECT user.username,user_project.id , project.name as project FROM user_project INNER JOIN user ON user_project.userID = user.userID INNER JOIN project ON user_project.projectID = project.projectID";
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