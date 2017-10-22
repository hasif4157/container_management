/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$("#chk_all_view").click(function () {
    $('.chk_view').not(this).prop('checked', this.checked);
});

$("#chk_all_edit").click(function () {
    $('.chk_edit').not(this).prop('checked', this.checked);
});

$("#chk_all_del").click(function () {
    $('.chk_del').not(this).prop('checked', this.checked);
});

//client phone number
$('body').on('click', '#app_ph', function () {
    var html = '';
    var html = html + '<div class="form-group">';
    var html = html + '<label>Phone</label>';
    var html = html + '<div class="input-group">';
    var html = html + '<span class="input-group-addon">';
    var html = html + '<i class="fa fa-mobile" aria-hidden="true"></i>';
    var html = html + '</span>';
    var html = html + '<input type="text" name="loc_phone[]" class="form-control" placeholder="Enter Phone Number">';
    var html = html + '</div>';
    var html = html + '</div>';

    $('#get_phdiv').append(html);
});

//append warehouse
$('body').on('click', '.addCF', function () {
    append_warehouse(1);

});
append_warehouse(0);

$("#customFields").on('click', '.remCF', function () {
    $(this).parent().parent().remove();
});

function append_warehouse(warehouse) {
    var status = "get_location";
    var data = {status: status};
    $.ajax({
        url: 'get_location.php',
        data: data,
        type: 'POST',
        async: false,
        success: function (data) {
            
            var json_loc = jQuery.parseJSON(data);
            var user = $('#user_saved').val();
            var html = '';
            html = html + '<table cellspacing="0" cellpadding="0">';
            html = html + '<tr>';
            html = html + '<td>';
            html = html + '<label>Container#</label>';
            html = html + '<input type="text" class="form-control input-sm container" placeholder="" >';
            html = html + '</td>';
            html = html + '<td>';
            html = html + '<label>Arrival Date</label>';
            html = html + '<div>';
            html = html + '<input class="form-control input-sm dt_color arrival datepicker" type="text" value="">';
            html = html + '</div>';
            html = html + '</td>';
            html = html + '<td><label>Closing Date</label>';
            html = html + '<div>';
            html = html + '<input class="form-control input-sm dt_color closing datepicker" type="text" value="">';
            html = html + '</div>';
            html = html + '</td>';
            html = html + '<td><label>Destination</label>';
            html = html + '<select class="form-control input-sm dest" id="dest_off">';
            html = html + '<option>Select Destination</option>';
            for (var i = 0; i < json_loc.length; i++) {
                html = html + '<option value="' + json_loc[i].id + '">' + json_loc[i].loc_name + '</option>';
            }
            html = html + '</select>';
            html = html + '</td>';
            html = html + '<td><label>Who Saved</label>';
            html = html + '<input type="text" class="form-control input-sm whosave" value=' + user + ' readonly >';
            html = html + '</td>';
            if (warehouse == 0) {
                html = html + '  <td><button type="button" class="btn blue nbt_plus addCF">+</button> </td> ';
            } else {
                html = html + '<td><button type="button" class="btn blue nbt_plus remCF">-</button>';
                html = html + '</td>';
            }
            html = html + '</tr>';
            html = html + '</table>';
            
            warehouse++;
            
            $('#customFields').append(html);

        }

    });


}

$(document).ready(function () {
    $('.groupOfTexbox').keypress(function (event) {
        return isNumber(event, this)
    });
});
// THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
function isNumber(evt, element) {

    var charCode = (evt.which) ? evt.which : event.keyCode

    if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) && // “-” CHECK MINUS, AND ONLY ONE.
            (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57))
        return false;

    return true;
}

$(document).ready(function () {
    $('.mobtextbox').keypress(function (event) {
        return ismob(event, this)
    });
});
// THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
function ismob(evt, element) {

    var charCode = (evt.which) ? evt.which : event.keyCode

    if (
            (charCode != 43 || $(element).val().indexOf('+') != -1) && // “-” CHECK MINUS, AND ONLY ONE.

            (charCode < 48 || charCode > 57))
        return false;

    return true;
}


$('body').on('click','#add_location', function(){
   var loc_type=$('#loc_type').val();
   var loc_name=$('#loc_name').val();
   var loc_addr=JSON.stringify($('#loc_addr').val());
   var loc_email=$('#loc_email').val();
   var loc_phone=JSON.stringify($('#loc_phone').val());
   var loc_fax=$('#loc_fax').val();
   var loc_zip=$('#loc_zip').val();
   var loc_cp=$('#loc_cp').val();
   var loc_cpp=JSON.stringify($('#loc_cpp').val());
   var ord_color=$('#ord_color').val();
   

   if(loc_type == ''){
       $('#loc_type').css('border','1px solid red');
       $('#loc_type').focus();
   }
   else if(loc_name == ''){
       $('#loc_type').css('border','1px solid #ccc');
       $('#loc_name').css('border','1px solid red');
       $('#loc_name').focus();
   }
   else if(($('#loc_addr').val()) == ''){
       $('#loc_name').css('border','1px solid #ccc');
       $('#loc_addr').css('border','1px solid red');
       $('#loc_addr').focus();
   }
   else if(loc_phone == ''){
       $('#loc_addr').css('border','1px solid #ccc');
       $('#loc_phone').css('border','1px solid red');
       $('#loc_phone').focus();
   }
   else if(loc_cp == ''){
       $('#loc_phone').css('border','1px solid #ccc');
       $('#loc_cp').css('border','1px solid red');
       $('#loc_cp').focus();
   }
   else {
       var json='';
       json = json + '{';
       json = json + '"loc_type":"'+loc_type+'",';
       json = json + '"loc_name":"'+loc_name+'",';
       json = json + '"loc_addr":'+loc_addr+',';
       json = json + '"loc_email":"'+loc_email+'",';
       json = json + '"loc_phone":'+loc_phone+',';
       json = json + '"loc_fax":"'+loc_fax+'",';
       json = json + '"loc_zip":"'+loc_zip+'",';
       json = json + '"loc_cp":"'+loc_cp+'",';
       json = json + '"loc_cpp":'+loc_cpp+',';
       json = json + '"ord_color":"'+ord_color+'"';
       json = json + '}';
     
      Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to add location details?',
            title: 'Add Location Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $.ajax({
                        url: "process_add_location.php",
                        async: true,
                        type: 'POST',
                        data: "json=" + encodeURIComponent(json),
                        success: function (data) {
                           if (data == 1) {
                                Lobibox.notify('success', {
                                    delay: false,
                                    sound: true,
                                    closeOnEsc: window.setTimeout(function () {
                                        window.location.href = "manage_location.php";

                                    }, 2000),
                                    title: 'Success',
                                    msg: 'Success Message : Location Added Successfully'
                                });
                            }

                        }
                    });
                }
            }
        });
   }
    
});

$('body').on('click','#update_location', function(){
   var loc_type=$('#loc_type').val();
   var loc_name=$('#loc_name').val();
   var loc_addr=JSON.stringify($('#loc_addr').val());
   var loc_email=$('#loc_email').val();
   var loc_phone=JSON.stringify($('#loc_phone').val());
   var loc_fax=$('#loc_fax').val();
   var loc_zip=$('#loc_zip').val();
   var loc_cp=$('#loc_cp').val();
   var loc_cpp=JSON.stringify($('#loc_cpp').val());
   var ord_color=$('#ord_color').val();
   var up_id=$('#up_id').val();
   

   if(loc_type == ''){
       $('#loc_type').css('border','1px solid red');
       $('#loc_type').focus();
   }
   else if(loc_name == ''){
       $('#loc_type').css('border','1px solid #ccc');
       $('#loc_name').css('border','1px solid red');
       $('#loc_name').focus();
   }
   else if(($('#loc_addr').val()) == ''){
       $('#loc_name').css('border','1px solid #ccc');
       $('#loc_addr').css('border','1px solid red');
       $('#loc_addr').focus();
   }
   else if(loc_phone == ''){
       $('#loc_addr').css('border','1px solid #ccc');
       $('#loc_phone').css('border','1px solid red');
       $('#loc_phone').focus();
   }
   else if(loc_cp == ''){
       $('#loc_phone').css('border','1px solid #ccc');
       $('#loc_cp').css('border','1px solid red');
       $('#loc_cp').focus();
   }
   else {
       var json='';
       json = json + '{';
       json = json + '"up_id":"'+up_id+'",';
       json = json + '"loc_type":"'+loc_type+'",';
       json = json + '"loc_name":"'+loc_name+'",';
       json = json + '"loc_addr":'+loc_addr+',';
       json = json + '"loc_email":"'+loc_email+'",';
       json = json + '"loc_phone":'+loc_phone+',';
       json = json + '"loc_fax":"'+loc_fax+'",';
       json = json + '"loc_zip":"'+loc_zip+'",';
       json = json + '"loc_cp":"'+loc_cp+'",';
       json = json + '"loc_cpp":'+loc_cpp+',';
       json = json + '"ord_color":"'+ord_color+'"';
       json = json + '}';
     
      Lobibox.confirm({
            iconClass: false,
            msg: 'Are you sure you want to edit location details?',
            title: 'Edit Location Details',
            callback: function ($this, type, e) {
                if (type == 'yes') {
                    $.ajax({
                        url: "process_edit_location.php",
                        async: true,
                        type: 'POST',
                        data: "json=" + encodeURIComponent(json),
                        success: function (data) {
                           if (data == 1) {
                                Lobibox.notify('success', {
                                    delay: false,
                                    sound: true,
                                    closeOnEsc: window.setTimeout(function () {
                                        window.location.href = "manage_location.php";

                                    }, 2000),
                                    title: 'Success',
                                    msg: 'Success Message : Location Updated Successfully'
                                });
                            }

                        }
                    });
                }
            }
        });
   }
    
});