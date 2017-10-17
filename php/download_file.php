<?php
include('connection.php');

class CreateProject extends connection{


    function createNewProject()
    {
		$con = new Connection();
        $conc=$con->connectionDB();




        $output = array();

        $id=$_REQUEST['id'];



            $sql1 = "select * from project_files where projectID='$id'";
                // echo $sql;
            $query1 =  mysqli_query($conc,$sql1);

        if ($query1) {
            $output= mysqli_fetch_all($query1,MYSQLI_ASSOC);
          //  return json_encode($rs);
        } else {
            return "fail";
        }




           // $this->closeConnection();

           return json_encode($output);

        }


    }

   $createusers=new CreateProject();

    echo $createusers->createNewProject();


?>