<?php
include('connection.php');

class CreateProject extends connection{
	
   
    function createNewProject()
    {
		$con = new Connection();
        $conc=$con->connectionDB();
        $name = $_REQUEST['name'];
        $id = $_REQUEST['pro_id'];
		$start=date('Y-m-d',strtotime($_REQUEST['start']));
		$end = date('Y-m-d',strtotime($_REQUEST['end']));







            $sql = "INSERT INTO stage(`projectID`, `stageName`, `startdate`, `enddate`) VALUES ($id,'$name', '$start', '$end');";
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