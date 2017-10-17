<?php
include('connection.php');

class CreateProject extends connection{
	
   
    function createNewProject()
    {
		$con = new Connection();
        $conc=$con->connectionDB();
        $id = $_REQUEST['pro_id'];
        $name = $_REQUEST['title'];
        $desc = $_REQUEST['desc'];
		$start=date('Y-m-d',strtotime($_REQUEST['start']));
		$end = date('Y-m-d',strtotime($_REQUEST['end']));







            $sql = "INSERT INTO notification(projectID,title, description, startdate, enddate) VALUES ($id,'$name','$desc', '$start', '$end');";
                // echo $sql;
            $query =  mysqli_query($conc,$sql);


           // $this->closeConnection();

            if ($query) {
                return "success";
            } else {
                return "fail";
            }

        }


    }

   $createusers=new CreateProject();

    echo $createusers->createNewProject();


?>