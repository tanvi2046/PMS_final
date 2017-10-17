<?php
include('connection.php');

class CreateProject extends connection{


    function createNewProject()
    {
		$con = new Connection();
        $conc=$con->connectionDB();

        $id=$_REQUEST['pro_id'];






            $sql = "select stage.stageaid,name,stageName,stage.startdate,stage.enddate from stage INNER JOIN project ON stage.projectID=project.projectID where stage.projectID='$id'";
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