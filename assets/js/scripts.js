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

function recover_() {
    alert('x');

};


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
// // History API 
// if (window.history && window.history.pushState) {
//     const state = { page_id: 1, user_id: 5 };
//     const url = "index.php";
//     history.pushState("", null, url);
//     $(window).on("popstate", function (event) {
//         if (!event.originalEvent.state) {
//             history.pushState("index.php", null, url);
//             return;
//         }
//     });
// }
// if( window.history && window.history.pushState ){

//     history.pushState( "nohb", null, "" );
//     $(window).on( "popstate", function(event){
//       if( !event.originalEvent.state ){
//         history.pushState( "nohb", null, "" );
//         return;
//       }
//     });
//   }

// $(window).on('popstate', function (event) {
//     alert("pop");
// });

// function addClicker(link) {
//     link.addEventListener("click", function (e) {
//         swapPhoto(link.href);
//         history.pushState(null, null, link.href);
//         e.preventDefault();
//     }, false);
// }
// window.onpopstate = function () {
//    // alert("pop!");
// }

//window.onpopstate = function () {
//  alert("pop!");
// var res = localStorage.getItem('pre');
// localStorage.removeItem('query');
// alert(res);
// menubtnclick(res);

// $('#DIVID').load(href);
// href = (href == "") ? "/" : href;
// uri = window.location.href.split("#/");
// window.location.href = uri[0] + "#/" + href;

// var res = localStorage.getItem('query');
// alert(res);
// menubtnclick('dashboard');
// addClicker(document.getElementById("dashboard"));
// addClicker(document.getElementById("a_users"));
// var res = localStorage.getItem('response');
// history.pushState(null, "", 'index.php');
// document.write(res.toString());
// $('#DIVID').html(res);
//}
// if (typeof (window.history.pushState) == 'function') {
//     var query = document.getElementById("dashboard");
//     var stateObj = {
//         title: title,
//         url: query,
//     };
//     window.history.pushState(stateObj, title, query);
//     //  document.location.href.substring(0, document.location.href.lastIndexOf('/') + 1)
// }

// addEventListener('popstate', event => {
//     let state = event.state;
//     alert(state);
//     if (state === null) {
//         // special case: This is the state before pushState was called
//         // We know what that should be:
//         state = { value: 'dashboard' };
//     }
//     div.textContent = state.value;
//     console.log('location: ' + document.location + ', state: ' + JSON.stringify(event.state));
// });



// history.pushState({ page: 1 }, "title 1", "?page=1");
// history.pushState({ page: 2 }, "title 2", "?page=2");
// history.replaceState({ page: 3 }, "title 3", "?page=3");
// history.back(); // alerts "location: http://example.com/example.html?page=1, state: {"page":1}"
//history.back(); // alerts "location: http://example.com/example.html, state: null"
//history.go(2);

//var x = null;
// window.onstorage = event => { // can also use window.addEventListener('storage', event => {
//     if (event.key != 'now') return;
//     alert(event.key + ':' + event.newValue + " at " + event.url);
// };
// // var t=document.getElementById($("#")).getAttribute('value')
// var t = localStorage.getItem('now')
// window.onhashchange = function () {
//     // history.popState();
//     // var link = document.getElementById('x');
//     //  var link2 = localStorage.getItem('link');


//     // alert(link);
//     // alert(link2);
//     // window.location.reload(link);
//     // alert('Pop2');
//     // res = localStorage.getItem('pre');
//     // x = res.split(/[ ,]+/);
//     // alert(x[x.length - 1]);
//     // alert(x[x.length - 2]);

//     // menubtnclick(x[x.length - 2]);
//     //blah blah blah
// }
// window.addEventListener("popstate", (event) => {

// });

// $(document).ready(function () {

//     // Listen for clicks on the sidebar menu items.
//     $('.nav-link8').on('click', function () {
//         // Get the id of the clicked menu item.
//         var menuItemId = $(this).attr('id');
//         //  alert(menuItemId);
//         // Fetch the content of the main section for the clicked menu item.
//         $.get('main.php', { menuItemId: menuItemId }, function (content) {
//             // Replace the content of the main section with the content that was returned from the PHP function.
//             $('#DIVID').html(content);

//             // Use the history.pushState() method to create a new entry in the browser's history.
//             history.pushState({}, "", "");
//             $.cache.set("DIVID", content);
//         });
//     });
// });

function menubtnclick1(_menuItem) {

    // var pre = localStorage.getItem('pre');
    // // alert('previous clicked' + pre);
    // if (pre == null || !pre || pre.length == 0) {
    //     pre = _menuItem;
    //     localStorage.setItem('pre', pre);
    // }
    // else {
    //     pre = pre + ',' + _menuItem;
    //     localStorage.setItem('pre', pre);
    // }
    // var link = document.getElementById('x');
    // localStorage.setItem('link', link);
    // history.pushState({ page: _menuItem }, "title " + _menuItem, "?link=" + _menuItem);
    $.ajax({
        url: 'main.php',
        type: 'POST',
        data: {
            "menuItem": _menuItem,
        },
        success: function (response, data) {


            // mobject = y + _menuItem;
            //  var mobject = localStorage.getItem('query')
            // localStorage.setItem('now', _menuItem + y);
            // alert(data);
            // localStorage.setItem("response", response);
            $('#DIVID').html(response);
            $.cache.set("DIVID", response);

            // history.pushState({ page: 1 }, "title 1", "?page=1");

            // updateAjax(url)
            //updateAjax('test.html');
            // if (_menuItem == 'dashboard') {
            //     $('#test').html(response);
            // }
            //  document.write(response);
            // history.pushState({}, "", "");
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



function actionclick(_action, _id, _admin, _status) {
    alert('d');
    // sessionStorage.setItem('link', '_menuItem');
    //alert('ffff');
    $.ajax({
        url: 'user_managment/user_action.php',
        type: 'POST',
        cache: false,
        data: {
            "action": _action,
            "id": _id,
            "admin": _admin,
            "userStatus": _status,

        },
        success: function (response, data) {
            //localStorage.setItem("response", response);

            //success(response);
            $('#DIVID').html(response);
            // document.write(response);
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
// $(document).ready(function () {
//     $("#newPassword").change(function () {
//         alert('x');
//         //do stuff
//     });
// })
// function myFunction() {
//     alert('hi');

// }
function validateCurrentPassword1() {
    // alert('l');
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
function validateConfirmPassword() {
    $(".confirmPasswordMsg").html('');
    newPassword = $("#newPassword").val();
    confirmPassword = $("#confirmPassword").val();
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
function validateNewPassword() {
    newPassword = $("#newPassword").val();
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

function recover(_userID) {

    //  $(".currentPasswordMsg").hide();
    $(".newPasswordMsg").hide();
    $(".confirmPasswordMsg").hide();
    // var currentPasswordMsg = '';
    var newPasswordMsg = '';
    var confirmPasswordMsg = '';
    var userID = _userID;


    // alert(currentPassword.value);
    // currentPassword = $("#currentPassword").val();
    newPassword = $("#newPassword").val();
    confirmPassword = $("#confirmPassword").val();
    // recover_password = $("#recover_password").val();
    newPasswordMsg = validateNewPassword();
    confirmPasswordMsg = validateConfirmPassword();

    if (validateNewPassword() && validateConfirmPassword()) {
        //alert('x');
        var input = {
            "userID": _userID,
            "newPassword": newPassword,
            "confirmPassword": confirmPassword,
        };
        $.ajax({
            url: 'index.php',
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

                //  $("#DIVID").html(response);
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
function changePassword() {
    // alert('change password');
    $(".currentPasswordMsg").hide();
    $(".newPasswordMsg").hide();
    $(".confirmPasswordMsg").hide();
    var currentPassword = '';
    var newPasswordMsg = '';
    var confirmPasswordMsg = '';

    // alert(currentPassword.value);
    currentPassword = $("#currentPassword").val();
    newPassword = $("#newPassword").val();
    confirmPassword = $("#confirmPassword").val();
    newPasswordMsg = validateNewPassword();
    confirmPasswordMsg = validateConfirmPassword();
    if (validateNewPassword() && validateConfirmPassword()) {
        //alert('x');
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
                alert(PASSWORD_UPDATED_SUCCSESSFULL);
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