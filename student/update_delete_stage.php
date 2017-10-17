

<html>
<head>



<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../index_files/mbcsmbmcp.css" type="text/css" />
 <link  rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="../css/view.css" media="all">


    <link rel="stylesheet" type="text/css" href="../css/demos.css" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../css/css/jsgrid.css" />
    <link rel="stylesheet" type="text/css" href="../css/css/theme.css" />
    <script src="../js/jquery.min.js"></script>
<!--    <script src="db.js"></script>-->

    <script src="../js/src/jsgrid.core.js"></script>
    <script src="../js/src/jsgrid.load-indicator.js"></script>
    <script src="../js/src/jsgrid.load-strategies.js"></script>
    <script src="../js/src/jsgrid.sort-strategies.js"></script>
    <script src="../js/src/jsgrid.field.js"></script>
    <script src="../js/src/fields/jsgrid.field.text.js"></script>
    <script src="../js/src/fields/jsgrid.field.number.js"></script>
    <script src="../js/src/fields/jsgrid.field.select.js"></script>
    <script src="../js/src/fields/jsgrid.field.checkbox.js"></script>
    <script src="../js/src/fields/jsgrid.field.control.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script>
        $(function(){
            $("#mbmcpebul_wrapper").load("nav_left.html");
        });
        var proId= '<?php echo $_GET['pro_id'];?>';

    </script>
</head>
<body style="background-color: transparent;">
<div class="col-md-12">
<img src="../images/finallogo.png" width="200" height="150">
</div>
<div id="mbmcpebul_wrapper" class="col-md-2">

</div>
<div id="jsGrid" style="height:500px;" class="col-md-10" >

</div>
</body>
</html>

<script>
$(function() {
var db=null;
    var rs='';
    $.ajax({
        url: '/pms/php/viewstage.php?pro_id='+proId,
        dataType: 'JSON',
        //data: data,
        method: 'POST',
        async: false,
        success: function callback(data) {
            //alert(data)
              rs=data;



        }
    });

    db = {

        loadData: function(filter) {
            return $.grep(rs, function(rs) {
                return (!filter.name || rs.name.indexOf(filter.name) > -1)
                    && (!filter.desc ||  rs.contact_no.indexOf(filter.desc) > -1)
                    && (!filter.section || rs.section.indexOf(filter.section) > -1)
                    && (!filter.rwy_div || rs.rwy_div === filter.rwy_div);
                // && (filter.Married === undefined || client.Married === filter.Married);
            });
        },
        updateItem: function(args) {
            //alert(args)
            //  showDetailsDialog("Edit", args.item);
            $.ajax({
                url: '/pms/php/updatestage.php?name='+args.stageName+"&start="+args.startdate+"&end="+args.enddate+"&id="+args.stageaid,
                dataType: 'JSON',
                //data: data,
                method: 'POST',
                async: true,
                success: function callback(data) {
                   if(data==1){
                     alert("stage  updated");
                   }else{
                    alert("woops something is wrong");

                   }
                }
            });
        }
    };
    window.db = db;


//    deleteItem: function(deletingClient) {
//        var clientIndex = $.inArray(deletingClient, this.clients);
//        this.clients.splice(clientIndex, 1);
//    }

    $("#jsGrid").jsGrid({
        height: "70%",
        width: "80%",
        filtering: false,
        editing: true,
        inserting: false,
        sorting: false,
        paging: true,
        autoload: true,
        pageSize: 10,
        pageButtonCount: 5,
//        deleteItem: function(item){
//          //  alert(item.id);
//            if(confirm("Are you sure you want to delete this?")){
//
//            $.ajax({
//                url: '/pms/php/deleteproject.php?id='+item.projectID,
//                dataType: 'JSON',
//                //data: data,
//                method: 'POST',
//                async: false,
//                success: function callback(data) {
//                    if(data==1){
//                        alert("Record deleted")
//                    }else{
//                        alert("There is something wrong")
//                    }
//
//                 //   rs=data;
//
//                }
//            });
//            }
//            else{
//                return false;
//            }
//        },

        controller: db,
        fields: [
            { name: "stageaid", type: "text", width: 150 },
            { name: "name", type: "text", width: 150 },
            { name: "stageName", type: "text", width: 200 },
            { name: "startdate", type: "text", width: 200 },
            { name: "enddate", type: "text", width: 200 },
            { type: "control" }

            //  { name: "Division", type: "select", items: db.countries, valueField: "Id", textField: "Name" }
            //{ name: "Married", type: "checkbox", title: "Is Married", sorting: false },
            //  { type: "control" }
        ]
    });

});

</script>