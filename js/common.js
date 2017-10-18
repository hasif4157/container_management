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
