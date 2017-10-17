<?php
include('connection.php');

class CreateProject extends connection{


    function createNewProject()
    {
		$con = new Connection();
        $conc=$con->connectionDB();








            $sql = "select title,notification.description,name from notification INNER JOIN project on project.projectID=notification.projectID";
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