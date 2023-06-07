/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
// 
// Scripts
// 
const OTP = "لقد تم ارسال الرمز السري الى موبايلك";
const OTP_SUCSESS = "لقد تم تفعيل موبايلك بنجاح";
const NEXT = "التالي";
const FILL = "يجب تعبئة هذا الحقل" + "\n";
const EIGHT_CHARACTER = "يجب ان تكون كلمة المرور 6 خانات فاكثر  ";
const CONTAINS_LETTER = "يجب ان تحوي كلمة المرور على حرف واحد على الاقل ";
const CONTAINS_CLETTER = "يجب ان تحوي كلمة المرور على حرف كبير واحد على الاقل ";
CONTAINS_SPECIAL = "يجب ان تحوي كلمة المرور على احد الحروف الخاصة   ";
CONTAINS_DIGIT = "يجب ان تحوي كلمة المرور على عدد واحد على الاقل ";
MATCH_PASSWORD = "كلمة المرور غير متطابقة ";
PASSWORD_UPDATED_SUCCSESSFULL = "تم تغيير كلمة المرور بنجاح";
const MOBILE_NO_SHOULD_BE_10_Digits = "رقم الموبايل يجب ان يكون مكون من 10 خانات";
const ALERTIFIER_TIME = 1;
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});




// menu item link
function btnclick(_url) {
    //alert('ffff');
    $.ajax({
        url: _url,
        type: 'post',
        success: function (data) {
            $('#DIVID').html(data);


        },
        error: function () {
            $('#DIVID').text('An error occurred');
        }
    });
}

function menubtnclick1(_menuItem) {


    $.ajax({
        url: 'main.php',
        type: 'POST',
        data: {
            "menuItem": _menuItem,
        },
        success: function (response, data) {

            $('#DIVID').html(response);
            $.cache.set("DIVID", response);

        },
        error: function () {
            $('#DIVID').text('An error occurred');
        }

    });
    //return false;
}
function openModal(id) {
    alert('Open modal');
    // Get the record data
    var record = getDataById(id);

    // Populate the modal form with the record data
    document.getElementById('mname').value = record.name;
    document.getElementById('memail').value = record.email;
    document.getElementById('mphone').value = record.phone;

    // Open the modal form
    document.getElementById('myModal').style.display = 'block';
}

function alertifyMsg(delay, message) {
    alertify.set('notifier', 'delay', delay);
    alertify.set('notifier', 'position', 'top-right');
    alertify.success(message);

}

function actionclick(_action, _id, _admin, _status) {

    $.ajax({
        url: 'user_managment/user_action.php',
        type: 'POST',
        cache: false,
        data: {
            "action": _action,
            "id": _id,
            "admin": _admin,
            "userStatus": _status

        },
        success: function (response) {
            //   alert(response);
            var res = jQuery.parseJSON(response);
            if (res.status == 0) {
                alertify.set('notifier', 'delay', ALERTIFIER_TIME);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(res.message);
            }
            if (res.status == 500) {
                alertify.set('notifier', 'delay', ALERTIFIER_TIME);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(res.message);
            }
            // $('#DIVID').load(location.href + " #DIVID");
            $('#myTable').load(location.href + " #myTable");
        },
        error: function () {
            $('#DIVID').text('An error occurred');
        }
    });
}
function btnclick2(_url) {
    $.ajax({
        url: _url,
        type: 'post',
        success: function (data) {
            $('#preview').html(data);
        },
        error: function () {
            $('#preview').text('An error occurred');
        }
    });
}

function validateCurrentPassword1() {
    alert('l');
    $.ajax({
        url: 'change_password.php',
        type: 'post',
        success: function (data) {
            $('#DIVID').html(data);
        },
        error: function () {
            $('#DIVID').text('An error occurred');
        }
    });
}
function validateCurrentPassword() {
    //alert(currentPassword);
    $(".currentPasswordMsg").html('');
    $(".currentPasswordMsg").hide();
    var isCorrect = false

    currentNewPassword = $("#currentPassword").val();
    // res = $("#res").val();
    //alert('res');
    $.ajax({
        url: 'change_password.php',
        type: 'post',
        data: { 'currentNewPassword': currentNewPassword },

        success: function (response, data) {

            $('#DIVID').html(response);
            // alert(document.getElementById($(".currentPasswordMsg")).getAttribute('value'));
            // alert($(".currentPasswordMsg").attr('data-fullText'));
            // alert($(".currentPasswordMsg").html());
            if ($.trim(($(".currentPasswordMsg").html())).length > 0) {
                $("#currentPassword").val(currentNewPassword);
                // $(".ptxt").addClass('pass_show');
                $(".currentPasswordMsg").addClass('alert-danger');
                $(".currentPasswordMsg").show();
                // alert(1);
                // return true;


            } else {
                $("#currentPassword").val(currentNewPassword);
                //alert(2)
                //alert("true");
                isCorrect = true;
                return true;
            }


        },
        error: function () {
            alert(3);
            $('#DIVID').text('An error occurred');

        }
    });

    return isCorrect;


}
function validateConfirmPassword(nPassword, cPassword) {
    $(".confirmPasswordMsg").html('');
    // newPassword = $("#newPassword").val();
    // confirmPassword = $("#confirmPassword").val();
    newPassword = nPassword;
    confirmPassword = cPassword;
    confirmPasswordMsg = "";
    if ((newPassword != confirmPassword)) {
        confirmPasswordMsg = confirmPasswordMsg + MATCH_PASSWORD + "<br>";
        $(".confirmPasswordMsg").addClass(' alert-danger').html(confirmPasswordMsg)
        $(".confirmPasswordMsg").show();
        return false;
    } else {
        // alert('t');
        return true;

    }
}
function validateNewPassword(password) {
    // newPassword = $(".newPassword").val();
    newPassword = password;

    $(".newPasswordMsg").html('');
    var newPasswordMsg = "";
    //$(".confirmPasswordMsg").hide();
    if (newPassword.length < 6) {
        newPasswordMsg = newPasswordMsg + EIGHT_CHARACTER + "<br>";
    }
    // //alert(/\d/.test(newPassword));
    if (!(/\d/.test(newPassword))) {
        newPasswordMsg = newPasswordMsg + CONTAINS_DIGIT + "<br>";
    }
    if (!(/[a-zA-Z]/.test(newPassword) || /[\u0621-\u064A]/.test(newPassword))) {
        newPasswordMsg = newPasswordMsg + CONTAINS_LETTER + "<br>";
    }
    // if (!(/[A-Z]/.test(newPassword))) {
    //     newPasswordMsg = newPasswordMsg + CONTAINS_LETTER + "<br>";
    // }
    if (!(/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(newPassword))) {
        newPasswordMsg = newPasswordMsg + CONTAINS_SPECIAL + "";
    }
    if (newPasswordMsg.length > 0) {
        $(".newPasswordMsg").addClass(' alert-danger').html(newPasswordMsg)
        $(".newPasswordMsg").show();
        return false;

    } else {
        //alert('true')
        return true;
    }


}

function recover(_userID, nPassword, cPassword, _action) {
    //alert('x' + _action);
    $(".newPasswordMsg").hide();
    $(".confirmPasswordMsg").hide();
    var newPasswordMsg = '';
    var confirmPasswordMsg = '';
    newPassword = nPassword;
    confirmPassword = cPassword;
    newPasswordMsg = validateNewPassword(newPassword);
    confirmPasswordMsg = validateConfirmPassword(newPassword, confirmPassword);
    if (validateNewPassword(newPassword) && validateConfirmPassword(newPassword, confirmPassword)) {

        $.ajax({
            url: _action == 'recovry' ? 'index.php' : '../index.php',
            type: 'POST',
            data: {
                "userID": _userID,
                "newPassword": newPassword,
                "confirmPassword": confirmPassword,
                "action": _action
            },
            cashe: false,
            success: function (response, data) {
                if (_action == "recover") {
                    //  alert(response);
                    //  alert(PASSWORD_UPDATED_SUCCSESSFULL);
                    console.log('xsxx');
                    window.history.pushState("object or string", "Title", "/tender_scme/");
                    document.write(response);
                    $('#feedback-info').html(PASSWORD_UPDATED_SUCCSESSFULL);
                    $('#feedback-info').removeClass('d-none');
                    alertifyMsg(5, PASSWORD_UPDATED_SUCCSESSFULL);
                } else {
                    alert(PASSWORD_UPDATED_SUCCSESSFULL);
                    //alert(response);
                    console.log('eeee');
                    // $('#divid').load(location.href + " #divid");
                    //$('#signupid').html(response);
                    //head
                    // window.Location('../index.php');
                    // alertifyMsg(5, PASSWORD_UPDATED_SUCCSESSFULL);
                    location.replace("index.php");

                    //document.write(response);
                }


            },
            error: function () {
                // alert('not ')
                console.log('xfsxx');
                //  $("#DIVID").html('data');
            }
        });

    } else {
        return false;
    }
    // return false;
    //alert('out');



};
function reassign(_userID, nPassword, cPassword) {
    alert('xx');
    // alert(nPassword + " " + cPassword);
    //  $(".currentPasswordMsg").hide();
    $(".newPasswordMsg").hide();
    $(".confirmPasswordMsg").hide();
    // var currentPasswordMsg = '';
    var newPasswordMsg = '';
    var confirmPasswordMsg = '';
    var userID = _userID;


    // alert(currentPassword.value);
    // currentPassword = $("#currentPassword").val();
    // newPassword = $("#newPassword").val();
    // confirmPassword = $("#confirmPassword").val();
    newPassword = nPassword;
    confirmPassword = cPassword;
    // recover_password = $("#recover_password").val();
    newPasswordMsg = validateNewPassword(newPassword);
    confirmPasswordMsg = validateConfirmPassword(newPassword, confirmPassword);
    if (validateNewPassword(newPassword) && validateConfirmPassword(newPassword, confirmPassword)) {
        // alert('x');
        var input = {
            "userID": _userID,
            "newPassword": newPassword,
            "confirmPassword": confirmPassword,
        };
        $.ajax({
            url: 'user_mamgment/reset_password_user_action.php',
            type: 'POST',
            data: {
                "userID": _userID,
                "newPassword": newPassword,
                "confirmPassword": confirmPassword,
            },
            cashe: false,
            success: function (response, data) {
                alert(PASSWORD_UPDATED_SUCCSESSFULL);
                //alert('newPassword');
                console.log('xsxx');
                //  window.Location('logout.php');
                window.history.pushState("object or string", "Title", "/tender_scme/");

                document.write(response);
                //$('#DIVID').load(location.href + " #DIVID");
                //$("#DIVID").html(response);
                //   $(".validation-message").html(response);
                //$(".validation-message").addClass('alert-danger');
                //  $(".validation-message").show();

            },
            error: function () {
                // alert('not ')
                console.log('xfsxx');
                //  $("#DIVID").html('data');
            }
        });

    } else {
        return false;
    }
    // return false;
    //alert('out');



};
// $(document).ready(function () {
//     $('#submit').click(function () {
//         alert('ss');
//         $(".newPasswordMsg").hide();
//         $(".confirmPasswordMsg").hide();
//         // var currentPasswordMsg = '';
//         var newPasswordMsg = '';
//         var confirmPasswordMsg = '';
//         var userID = 2;


//         // alert(currentPassword.value);
//         // currentPassword = $("#currentPassword").val();
//         var newPassword = $("#newPassword").val();
//         var confirmPassword = $("#confirmPassword").val();
//         // recover_password = $("#recover_password").val();
//         newPasswordMsg = validateNewPassword();
//         confirmPasswordMsg = validateConfirmPassword();
//         if (validateNewPassword() && validateConfirmPassword()) {
//             //alert('x');
//             var input =
//                 $.ajax({
//                     type: 'POST',
//                     url: 'recovery_password_controller.php',

//                     data: {
//                         user_id: '2',
//                         newPassword: newPassword,
//                         confirmPassword: confirmPassword,
//                     },
//                     // contentType: 'application/json',
//                     success: function (response, data) {
//                         alert(data);
//                         alert(PASSWORD_UPDATED_SUCCSESSFULL);
//                         //alert('newPassword');
//                         console.log('xsxx');
//                         //  window.Location('index.php');

//                         document.write(response);

//                         //$("#signupid").html(response);
//                         //   $(".validation-message").html(response);
//                         //$(".validation-message").addClass('alert-danger');
//                         //  $(".validation-message").show();

//                     },
//                     error: function () {
//                         // alert('not ')
//                         console.log('xfsxx');
//                         //  $("#DIVID").html('data');
//                     }
//                 });

//         } else {
//             return false;
//         }
//     });
// });
function changePassword(nPassword, cPassword) {
    //  alert('change password' + ' ' + nPassword + ' ' + cPassword);
    $(".currentPasswordMsg").hide();
    $(".newPasswordMsg").hide();
    $(".confirmPasswordMsg").hide();
    var currentPassword = '';
    var newPasswordMsg = '';
    var confirmPasswordMsg = '';

    // alert(currentPassword.value);
    currentPassword = $("#currentPassword").val();
    // newPassword = $("#newPassword").val();
    // confirmPassword = $("#confirmPassword").val();
    newPassword = nPassword;
    // confirmPassword = cPassword;
    // newPasswordMsg = validateNewPassword(newPassword);
    confirmPasswordMsg = validateConfirmPassword(newPassword, confirmPassword);
    //alert('xx');
    if (validateNewPassword(newPassword) && validateConfirmPassword(newPassword, confirmPassword)) {
        //  alert('x');
        var input = {
            "currentPassword": currentPassword,
            "newPassword": newPassword,
            "confirmPassword": confirmPassword,



        };
        $.ajax({
            url: 'change_password.php',
            type: 'POST',
            data: input,
            success: function (response) {
                //  alert(response);
                // alert(PASSWORD_UPDATED_SUCCSESSFULL);
                var res = jQuery.parseJSON(response);
                // alert(res.message);
                //alert(res.message);
                if (res.status == 0) {
                    alertifyMsg(1, res.message);

                } if (res.status == 500) { alertifyMsg(1, res.message); }
                //alert('newPassword');
                console.log('xsxx');

                $("#DIVID").html(response);
                //   $(".validation-message").html(response);
                //$(".validation-message").addClass('alert-danger');
                //  $(".validation-message").show();

            },
            error: function () {
                // alert('not ')
                console.log('xfsxx');
                $("#DIVID").html('data');
            }
        });

    } else {
        return false;
    }
    // return false;
    //alert('out');




}
function recoverPassword2() {
    alert('x');




}


function sendOTP(_er) {


    $(".error").html("").hide();
    //$(".resend").hide();
    //$("#resendBtn").hide();
    //  $(".resend").html("").hide();
    var number = $("#mobile_no").val();
    if (number.length == 10 && number != null) {
        alert(OTP);
        var input = {
            "mobile_number": number,
            "action": "send_otp"
        };
        $.ajax({
            url: 'mobile_verificatoin_controller.php',
            type: 'POST',
            data: input,
            success: function (response) {
                console.log('xsxx');
                $("#new-user-card").html(response);

            }
        });
    } else {
        console.log('xexx');
        $(".error").html(MOBILE_NO_SHOULD_BE_10_Digits);
        $(".error").addClass('alert alert-warning d-none');
        $(".error").show();
    }
}


function verifyOTP(_er) {
    $(".error").html("").hide();
    $(".success").html("").hide();

    // $(".resend").hide();
    // // $("#resendBtn").hide();
    // $(".resend").hide();
    // $(".DIVID").load('mobile_verification_response_form.php', function () {
    //     $(".resend").hide();
    // })



    var otp = $("#mobileOtp").val();
    // id="resend"

    var input = {
        "mobile_otp": otp,
        "action": "verify_otp"
    };
    if (otp.length == 6 && otp != null) {
        //alert('ok');
        $.ajax({

            url: 'mobile_verificatoin_controller.php',
            type: 'POST',
            dataType: "json",
            data: input,
            //contentType: "application/json; charset=utf-8",
            //dataType: "json",
            /// dataType: input,



            success: function (response) {

                $("." + response.type).html(response.message);
                $("." + response.type).show();
                $('#verify').hide();
                $('#mobileOtp').prop("disabled", true);
                $('#mobileOtp').hide();
                $('#mobileOtpLbl').hide();
                //$("." + response.type).append("<div class=\"col-md-12 mb-1\"><a class=\"btn btn-lg btn-success btn-block col-md-12 mb-1\" href='activate_mobile.php'>" + NEXT + "</a></div>");
                $(".resend").append("<div class=\"col-md-12 mb-1\"><a class=\"btn btn-lg btn-success btn-block col-md-12 mb-1\" href=\"#\" onclick=\"btnclick('activate_mobile.php')\">" + NEXT + "</a></div>");

                //alert(OTP_SUCSESS);
                //location.href = "activate_mobile.php"




                // $("." + res.type).html(response.message)
                // $("." + res.type).show();
            },
            error: function () {
                alert('dd');

                // $(".success").html(response.message)
                // $(".success").show();
            }
        });
    } else {
        $(".error").html(_er)
        $(".error").show();
    }
}

function validatePassword() {
    alert("ddd");
    //return false;

    var currentPassword, newPassword, confirmPassword, output = true;

    currentPassword = document.frmChange.currentPassword;
    newPassword = document.frmChange.newPassword;
    confirmPassword = document.frmChange.confirmPassword;
    alert(currentPassword.value);
    // return false;
    if (!currentPassword.value) {
        // alert('gg');
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "required";
        output = false;
    }
    else if (!newPassword.value) {
        newPassword.focus();
        document.getElementById("new_password").innerHTML = "required";
        output = false;
    }
    else if (!confirmPassword.value) {
        confirmPassword.focus();
        document.getElementById("confirm_password").innerHTML = "required";
        output = false;
    }
    if (newPassword.value != confirmPassword.value) {
        newPassword.value = "";
        confirmPassword.value = "";
        newPassword.focus();
        document.getElementById("confirm_password").innerHTML = "not same";
        output = false;
    }
    return output;
}




// $(document).ready(function (e) {
//     $("#form0").on('submit', (function (e) {
//         e.preventDefault();
//         $.ajax({
//             url: "process_upload.php",
//             type: "POST",
//             data: new FormData(this),
//             contentType: false,
//             cache: false,
//             processData: false,
//             beforeSend: function () {
//                 //$("#preview").fadeOut();
//                 $("#err").fadeOut();
//             },
//             success: function (data) {
//                 if (data == 'invalid') {
//                     // invalid file format.
//                     $("#err").html("Invalid File !").fadeIn();
//                 }
//                 else {
//                     // view uploaded file.
//                     $("#preview").html(data).fadeIn();
//                     $("#form")[0].reset();
//                 }
//             },
//             error: function (e) {
//                 $("#err").html(e).fadeIn();
//             }
//         });
//     }));
// });


function msg2() {
    alert("ff23");
};