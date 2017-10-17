

<html>
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../index_files/mbcsmbmcp.css" type="text/css" />
    <link  rel="stylesheet" href="../css/bootstrap.min.css">

    <style>
html { 
  background: url(../images/background.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
img {
    display: inline-block;
    float:left;
}

</style>
    <script src="../js/jquery.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(function(){
            $("#mbmcpebul_wrapper").load("nav_left.html");
        });
    </script>
</head>
<body style="background-color: transparent;">
<div class="col-md-12">
<img src="../images/finallogo.png" width="200" height="150">
</div>
<div class="col-md-12">

<div class="col-md-2">
<div id="mbmcpebul_wrapper" style="width: 136px;">
</div>
</div>

<div class="col-md-10">
<div class="col-6 col-lg-4">
    <h2>Project</h2>
    <p>Here we can view project. </p>
    <p><a class="btn btn-secondary" href="/pms/student/view_project.html" role="button">View details &raquo;</a></p>
</div><!--/span-->
<!--<div class="col-6 col-lg-4">-->
<!--    <h2>User</h2>-->
<!--    <p>Here we can create user add user to project and remove project. </p>-->
<!--    <p><a class="btn btn-secondary" href="/pms/admin/creae_user.html" role="button">View details &raquo;</a></p>-->
<!--</div><!--/span-->
<!--<div class="col-6 col-lg-4">-->
<!--    <h2>Notification</h2>-->
<!--    <p>Here we can generate notification against any project. </p>-->
<!--    <p><a class="btn btn-secondary" href="/pms/admin/create_notification.html" role="button">View details &raquo;</a></p>-->
<!--</div><!--/span-->
<!---->
<!---->
<!--<div class="col-6 col-lg-4">-->
<!--    <h2>Appointment</h2>-->
<!--    <p>It shows a form that needed to be filled for appointment. </p>-->
<!--    <p><a class="btn btn-secondary" href="/pms/admin/appointment.html" role="button">View details &raquo;</a></p>-->
<!--</div><!--/span-->

</div>
</div>
</body>
</html>

<?php

session_start();
$loc='http://' . $_SERVER['HTTP_HOST'];
if(!isset($_SESSION['username'])){
    header("Location:".$loc. "/pms/loginpage.php");

}

if($_SESSION['type']=='admin'){
    header("Location:".$loc. "/pms");

}
?>
