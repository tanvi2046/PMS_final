<?php
include('connection.php');

define ("MAX_SIZE","9000");
function getExtension($str)
{
    $i = strrpos($str,".");
    if (!$i) { return ""; }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}


//$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","doc","xls","csv","pdf");
$con = new Connection();
$conc=$con->connectionDB();
$pro = $_REQUEST['pro1'];
$name=$_REQUEST['name'];
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    $dirpath="../uploads/";
    if (!is_dir($dirpath)) {
        mkdir($dirpath, true);
        //echo $dirpath;

    }

    $uploaddir = $dirpath; //a directory inside
    //foreach ($_FILES['file']['name'] as $name => $value) {

        $filename = stripslashes($_FILES['file']['name']);
        $size = filesize($_FILES['file']['tmp_name']);
        $ext = getExtension($filename);

        $ext = strtolower($ext);

        if ($size < (MAX_SIZE * 6024)) {
            $image_name = time() . $filename;
          //  echo "<img src='" . $uploaddir . $image_name . "' class='imgList'>";
            $newname = $uploaddir . $image_name;
            $loc='http://' . $_SERVER['HTTP_HOST'].'/pms/uploads/'. $image_name;


            move_uploaded_file($_FILES['file']['tmp_name'], $newname);

            $sql = "INSERT INTO `project_files`(`projectID`, `file_path`,`name`) VALUES ($pro,'$loc','$name')";
           //  echo $sql;
            $query =  mysqli_query($conc,$sql);


            // $this->closeConnection();
           // echo $query;

            if ($query) {
                echo "success";
            } else {
                echo "fail";
            }


        }



    //}
}
?>
