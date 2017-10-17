/**
 * Created by bodla on 7/21/2017.
 */
var sec_str='<option value="0">Select Section</option>';
var res_arr=[];
var selected_section_id="";
function fill_sections(div){
    $.ajax({
        url: 'services/section.php?division_name='+div,
        dataType: 'JSON',
        //data: data,
        method: 'POST',
        async: true,
        success: function callback(data) {
            res_arr=data;
            for(var i=0;i<data.length;i++){
                 sec_str=sec_str+'<option value="'+data[i].section_id+'">'+data[i].section_id+'</option>'
            }
            $('#division').val(div);

            $('#sec_name').html(sec_str);

           // alert(data);
        }
    });

}



function validatePhone() {
    var a = document.getElementById('ph').value;

    var filter = /^[0-9-+]+$/;

    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}

$(document).ready(function() {


    $('#ph').blur(function(e) {
        if (validatePhone()) {
            $('#spnPhoneStatus').html('Valid');
            $('#spnPhoneStatus').css('color', 'green');
        }
        else {
            $('#spnPhoneStatus').html('Invalid');
            $('#spnPhoneStatus').css('color', 'red');
        }
    });

    $('#contact_form').ajaxForm(function(res) {
        if(res==1){
          $('#myalert').html('Contact created successfully');
            $("#myalert").removeClass("alert-warning");

            $("#myalert").addClass("alert-success");
            $('body').scrollTop(0);
            setTimeout(function(){
                location.reload();
            },3000)



        }
        //alert(res);
    });
});


function insert_contact(){
    var name=$("#iow").val();
    var ph=$("#ph").val();
    var divi=$("#division").val();


    $.ajax({
        url: 'services/insert_contact.php?name='+name+'&contact='+ph+"&section="+selected_section_id+"&div="+divi,
        dataType: 'JSON',
        //data: data,
        method: 'POST',
        async: true,
        success: function callback(data) {


      //       alert(data);
        }
    });

}

function getSectionName(id){
    var name=$("#iow").val();

    if(name==""){
        $('#sec_name').val('0');
        $('#spnNameStatus').html('Please enter name first');
        $('#spnNameStatus').css('color', 'red');

    }else {

        selected_section_id = id.value;

        $.ajax({
            url: 'services/check_duplication.php?name=' + name + "&section=" + selected_section_id,
            //  dataType: 'JSON',
            //data: data,
            method: 'POST',
            async: true,
            success: function callback(data) {
                if (data == 1) {
                    $('#spnNameStatus').html('Invalid name already exist');
                    $('#spnNameStatus').css('color', 'red');
                    var name = $("#iow").val('');
                    $('#sec_name').val('0');


                } else {
                    $('#spnNameStatus').html('Valid Name');
                    $('#spnNameStatus').css('color', 'green');
                }
                //  alert(data);
            }
        });

        for (var i = 0; i < res_arr.length; i++) {
            if (res_arr[i].section_id == id.value) {
                $('#section').val(res_arr[i].section_name)
            }
        }
    }

}



$(function() {
var db=null;
    var rs=null;
    $.ajax({
        url: 'services/get_all_iows.php?division_name='+res[0],
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
                    && (!filter.contact_no ||  rs.contact_no.indexOf(filter.contact_no) > -1)
                    && (!filter.section || rs.section.indexOf(filter.section) > -1)
                    && (!filter.rwy_div || rs.rwy_div === filter.rwy_div);
                // && (filter.Married === undefined || client.Married === filter.Married);
            });
        },
        updateItem: function(args) {
            //alert(args)
            //  showDetailsDialog("Edit", args.item);
            $.ajax({
                url: 'services/update_contact.php?name='+args.name+'&contact='+args.contact_no+"&section="+args.section+"&div="+args.rwy_div+"&id="+args.id,
                dataType: 'JSON',
                //data: data,
                method: 'POST',
                async: true,
                success: function callback(data) {
                   if(data==1){
                     alert("contact updated");
                   }else{
                    alert("woops something is wrong");

                   }
                }
            });
        }
    };
    window.db = db;


    //deleteItem: function(deletingClient) {
    //    var clientIndex = $.inArray(deletingClient, this.clients);
    //    this.clients.splice(clientIndex, 1);
    //}

    $("#jsGrid").jsGrid({
        height: "70%",
        width: "100%",
        filtering: false,
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 10,
        pageButtonCount: 5,
        deleteItem: function(item){
          //  alert(item.id);
            if(confirm("Are you sure you want to delete this?")){

            $.ajax({
                url: 'services/delete_contact.php?id='+item.id,
                dataType: 'JSON',
                //data: data,
                method: 'POST',
                async: false,
                success: function callback(data) {
                    if(data==1){
                        alert("Record deleted")
                    }else{
                        alert("There is something wrong")
                    }

                 //   rs=data;

                }
            });
            }
            else{
                return false;
            }
        },

        controller: db,

        fields: [
            { name: "name", type: "text", width: 150 },
            { name: "contact_no", type: "number", width: 200 },
            { name: "section", type: "text", width: 200 },
            { name: "rwy_div", type: "text", width: 200 },
            { type: "control" }

            //  { name: "Division", type: "select", items: db.countries, valueField: "Id", textField: "Name" }
            //{ name: "Married", type: "checkbox", title: "Is Married", sorting: false },
            //  { type: "control" }
        ]
    });

});

