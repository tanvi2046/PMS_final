<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Create Users</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="all">
    <link rel="stylesheet" href="../index_files/mbcsmbmcp.css" type="text/css" />
    <link  rel="stylesheet" href="../css/bootstrap.min.css">


    <!--<script type="text/javascript" src="../js/view.js"></script>-->



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>

    <!--<script src="../js/jquery.min.js"></script>-->

    <!--<script src="../js/bootstrap.min.js"></script>-->
    <script>
        $(function(){
            $("#mbmcpebul_wrapper").load("../nav_left.html");
        });
        var proId= '<?php echo $_GET['pro_id'];?>';

    </script>


    <style>
        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }


        .mytext{
            border:0;padding:10px;background:whitesmoke;
        }
        .text{
            width:75%;display:flex;flex-direction:column;
        }
        .text > p:first-of-type{
            width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
        }
        .text > p:last-of-type{
            width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
        }
        .text-l{
            float:left;padding-right:10px;
        }
        .text-r{
            float:right;padding-left:10px;
        }
        .avatar{
            display:flex;
            justify-content:center;
            align-items:center;
            width:25%;
            float:left;
            padding-right:10px;
        }
        .macro{
            margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
        }
        .msj-rta{
            float:right;background:whitesmoke;
        }
        .msj{
            float:left;background:white;
        }
        .frame{
            background:#e0e0de;
            height:450px;
            overflow:hidden;
            padding:0;
        }
        .frame > div:last-of-type{
            position:absolute;bottom:5px;width:100%;display:flex;
        }
        /*ul {*/
            /*width:100%;*/
            /*list-style-type: none;*/
            /*padding:18px;*/
            /*position:absolute;*/
            /*bottom:32px;*/
            /*display:flex;*/
            /*flex-direction: column;*/

        /*}*/
        .msj:before{
            width: 0;
            height: 0;
            content:"";
            top:-5px;
            left:-14px;
            position:relative;
            border-style: solid;
            border-width: 0 13px 13px 0;
            border-color: transparent #ffffff transparent transparent;
        }
        .msj-rta:after{
            width: 0;
            height: 0;
            content:"";
            top:-5px;
            left:14px;
            position:relative;
            border-style: solid;
            border-width: 13px 13px 0 0;
            border-color: whitesmoke transparent transparent transparent;
        }
        input:focus{
            outline: none;
        }
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: #d4d4d4;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: #d4d4d4;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: #d4d4d4;
        }
        :-moz-placeholder { /* Firefox 18- */
            color: #d4d4d4;
        }
    </style>
</head>
<body id="main_body"  >


    <div class="col-md- 2">
        <img src="../images/finallogo.png" width="200" height="150">
        <!--<img id="top" src="../images/top.png" alt="">-->
    </div>
    <div class="col-md-12">
        <div class="col-md-2"  id="mbmcpebul_wrapper" style="width: 136px;">

        </div>
       <div style="margin-top: 0px;margin-left: 0px;">
        <div class="col-sm-3 col-sm-offset-4 frame" >
                <ul id="newUL"></ul>
                <div>
                    <div class="msj-rta macro" style="margin:auto">
                        <div class="text text-r" style="background:whitesmoke !important">
                            <input class="mytext" placeholder="Type a message"/>
                        </div>
                    </div>
                </div>
            </div>



    </div>
    <!--<div id="footer">-->
        <!--Generated by <a> Apollo X</a>-->
    <!--</div>-->
    <!--<img id="bottom" src="../images/bottom.png" alt="">-->

</body>
</html>

<script>
    // wait for the DOM to be loaded
    $(document).ready(function() {
        // bind 'myForm' and provide a simple callback function
        $('#form_47332').ajaxForm(function(response) {
            if(response=='success'){
               alert("user added to project");
                location.reload();
            }else{
                alert("something is wrong");
            }
        });



        $.ajax({
            url: '/pms/php/user_pro.php',
            dataType: 'JSON',
            //data: data,
            method: 'POST',
            async: true,
            success: function callback(data) {
                var str='<option value="" selected="selected"></option>';
                var str1=' <option value="" selected="selected"></option>';
                for(var i=0;i<data.pro.length;i++){
                    str=str+'<option value="'+data.pro[i].projectID+'" >'+data.pro[i].name+'</option>';
                }

                for(var i=0;i<data.user.length;i++){
                    str1=str1+'<option value="'+data.user[i].userID+'" >'+data.user[i].username+'</option>';
                }

                $("#pro_id").html(str);
                $("#stu_id").html(str1);


            }
        });



    });


    var me = {};
    me.avatar = "/pms/images/ava1.jpg";

    var you = {};
    you.avatar = "/pms/images/ava2.jpg";

    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0'+minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return strTime;
    }

    //-- No use time. It is a javaScript effect.
    function insertChat(who, text, sen){
        var control = "";
        var date = formatAMPM(new Date());

        if (who == "me"){

            control = '<li style="width:100%">' +
            '<div class="msj macro">' +
            '<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ me.avatar +'" /></div>' +
            '<div class="text text-l">' +
            '<p>'+ text +'</p>' +
            '<p><small>Sender:'+sen+'</small></p>' +
            '<p><small>'+date+'</small></p>' +
            '</div>' +
            '</div>' +
            '</li>';
        }else{
            control = '<li style="width:100%;">' +
            '<div class="msj-rta macro">' +
            '<div class="text text-r">' +
            '<p>'+text+'</p>' +
            '<p><small>Sender:'+sen+'</small></p>' +
            '<p><small>'+date+'</small></p>' +

            '</div>' +
            '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="'+you.avatar+'" /></div>' +
            '</li>';
        }
        setTimeout(
            function(){
                $("#newUL").append(control);

            }, 0);

    }

    function resetChat(){
        $("#newUL").empty();
    }

    $(".mytext").on("keyup", function(e){
        if (e.which == 13){
            var text = $(this).val();
            if (text !== ""){
                insertChat("me", text);
                $(this).val('');

                $.ajax({
                    url: '/pms/php/createmessage.php?id='+proId +'&msg='+text,
                    dataType: 'JSON',
                    //data: data,
                    method: 'POST',
                    async: true,
                    success: function callback(data) {

                    }
                });

            }
        }
    });
    //- Clear Chat
    resetChat()


    $.ajax({
        url: '/pms/php/viewmessages.php?id='+proId,
        dataType: 'JSON',
        //data: data,
        method: 'POST',
        async: true,
        success: function callback(data) {
            for(var i=0; i <data.length;i++) {
                if(data[i].sender=='admin') {
                    insertChat("me", data[i].message,data[i].sender);
                }else{
                    insertChat("you", data[i].message,data[i].sender);

                }
            }
        }
    });
    //-- Print Messages
//    insertChat("me", "Hello Tom...", 0);
//    insertChat("you", "Hi, Pablo", 1500);
//    insertChat("me", "What would you like to talk about today?", 3500);
//    insertChat("you", "Tell me a joke",7000);
//    insertChat("me", "Spaceman: Computer! Computer! Do we bring battery?!", 9500);
//    insertChat("you", "LOL", 12000);


    //-- NOTE: No use time on insertChat.

</script>