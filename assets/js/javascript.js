
// Function to check Whether both passwords
// is same or not.
//document.getElementById("sign_up").addEventListener("click", signup('template/login-template44.php'));

// $(document).ready(function (e) {
//     $("#sign_up").on('click', (function (e) {
//         e.preventDefault();
//         $.ajax({
//             url: "template/login-template44.php",
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
//                     $("#signupid").html(data).fadeIn();
//                     // $("#form")[0].reset();
//                 }
//             },
//             error: function (e) {
//                 $("#err").html(e).fadeIn();
//             }
//         });
//     }));
// });

function test(form) {

    alert('السلام عليم');
    password1 = form.password.value;
    alert(password1);
    return false;

};

function signup(_url) {
    $.ajax({
        url: _url,
        type: 'post',
        success: function (data) {
            $('#signupid').html(data);
            window.history.pushState("object or string", "Title", "/tender_scme/");
        },
        error: function () {
            $('#signupid').text('An error occurred');
        }
    });
};
function reoveryEamil(_url) {
    alert('h');
    $.ajax({

        url: _url,
        type: 'post',
        success: function (data) {
            alert('s');
            $('#signupid').html(data);
        },
        error: function () {
            alert('f');
            $('#signupid').text('An error occurred');
        }

    });
    //alert('hf');
};

function OpenMe(_url) {
    var height = 200;
    var width = 400;
    var top = window.innerHeight - height;
    var top = window.innerHeight - height;
    var top = 50;
    var left = 50;
    window.open(
        _url,
        '_blank',
        'windowname,location=yes,height=' + height + ',width=' + width + ',top=' + 0 + ',left=' + 0 + ',scrollbars=yes'
    );
}


function checkPassword(form) {
    //return false;
    password1 = form.password1.value;
    password2 = form.password2.value;
    //  approved = form.approved;
    var approved = document.getElementById("approved");


    var msg = '';

    // If password not entered
    if (password1 == '') {
        //alert("الرجاء ادخال كلمة السر");
        msg = 'الرجاء ادخال كلمة السر';
        document.getElementById("msg").innerHTML = (msg);
        // return false;
    }

    // If confirm password not entered
    else if (password2 == '') {
        msg = "الرجاء ادخال تأكيد كلمة السر";
        document.getElementById("msg").innerHTML = (msg);
        // alert("Please enter confirm password");
        // false;
    }
    // If Not same return False.    
    else if (password1 != password2) {
        //  alert("\nPassword did not match: Please try again...")
        msg = "كلمة السر غير متطابقة الرجاء المحاولة مرة اخرى";
        document.getElementById("msg").innerHTML = (msg)
        //  return false;
    }

    if (!approved.checked) {
        msg += "<br>";
        msg += "يرجى الموافقة على القواعد والاحكام";
        document.getElementById("msg").innerHTML = (msg);
        //text.style.display = "block";
        document.getElementById("lcb").className = "text-danger";
        //document.getElementById("approved").className = "text-danger";
        //document.getElementById('form-check-label').style.color = '#FF0000'; 
        // return false;
    } else {
        document.getElementById("lcb").className = "text-regular";
    }
    if (msg.length > 0) return false;

    // If same return True.
    // else {
    //     alert("Password Match: Welcome to GeeksforGeeks!")
    //     return true;
    // }
}