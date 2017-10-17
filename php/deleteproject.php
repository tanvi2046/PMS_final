<?php
include('connection.php');

class CreateProject extends connection{
	
   
    function createNewProject()
    {
		$con = new Connection();
        $conc=$con->connectionDB();
        $id = $_REQUEST['id'];







            $sql = "DELETE FROM `project` WHERE projectID=$id";
                // echo $sql;
            $query =  mysqli_query($conc,$sql);


           // $this->closeConnection();

            if ($query) {
                return 1;
            } else {
                return 0;
            }

        }


    }

   $createusers=new CreateProject();

    echo $createusers->createNewProject();


?>