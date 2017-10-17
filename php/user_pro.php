<?php
include('connection.php');

class CreateProject extends connection{


    function createNewProject()
    {
		$con = new Connection();
        $conc=$con->connectionDB();




        $output = array();



            $sql1 = "select * from project";
                // echo $sql;
            $query1 =  mysqli_query($conc,$sql1);

        if ($query1) {
            $output['pro']= mysqli_fetch_all($query1,MYSQLI_ASSOC);
          //  return json_encode($rs);
        } else {
            return "fail";
        }

        $sql2 = "select * from user where user_type='student'";
        // echo $sql;
        $query2 =  mysqli_query($conc,$sql2);

        if ($query2) {
            $output['user']= mysqli_fetch_all($query2,MYSQLI_ASSOC);
            //return json_encode($rs);
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