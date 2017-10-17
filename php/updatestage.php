<?php
include('connection.php');

class CreateProject extends connection{
	
   
    function createNewProject()
    {
		$con = new Connection();
        $conc=$con->connectionDB();
        $name = $_REQUEST['name'];
        $id = $_REQUEST['id'];
       // $desc = $_REQUEST['desc'];
		$start=date('Y-m-d',strtotime($_REQUEST['start']));
		$end = date('Y-m-d',strtotime($_REQUEST['end']));







            $sql = "UPDATE `stage` SET `stageName`='$name',`startdate`='$start',`enddate`=$end WHERE stageaid=$id";
                // echo $sql;
            $query =  mysqli_query($conc,$sql);


           // $this->closeConnection();

            if ($query) {
                return 1;
            } else {
                return "fail";
            }

        }


    }

   $createusers=new CreateProject();

    echo $createusers->createNewProject();


?>