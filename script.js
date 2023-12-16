function registerstudentByA() {
    var em = document.getElementById("e").value;
    var fn = document.getElementById("f").value;
    var ln = document.getElementById("l").value;
    // alert(em);
    // alert(se);

    var f = new FormData();
    f.append("e", em);
    f.append("f", fn);
    f.append("l", ln);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "1") {
                document.getElementById("error").innerHTML = "Empty Fields";

            } else {
                alert("Registration Successed!");
                document.getElementById("f").value = "";
                document.getElementById("l").value = "";
                document.getElementById("e").value = "";
            }


        }


    };
    r.open("POST", "AdminregistStudent.php", true);
    r.send(f);
}

function gradeExamload(x) {
    var id = x;
    // alert(id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("loadexams").innerHTML = text;

        }


    };
    r.open("GET", "gradeExamload.php?id=" + id, true);
    r.send();

}

function gradeExamloadadmin(x) {
    var id = x;
    // alert(id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("loadexams").innerHTML = text;

        }


    };
    r.open("GET", "gradeExamloadadmin.php?id=" + id, true);
    r.send();

}



function searchexams(x) {
    var id = x;
    // alert(id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("loadexams").innerHTML = text;

        }


    };
    r.open("GET", "subjectExamload.php?id=" + id, true);
    r.send();
}

function searchexamsadmin(x) {
    var id = x;
    // alert(id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("loadexams").innerHTML = text;

        }


    };
    r.open("GET", "subjectExamloadadmin.php?id=" + id, true);
    r.send();
}



function viewresultstudent(id) {
    var id = id;
    // alert(id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("loadexams").innerHTML = text;

        }


    };
    r.open("GET", "viewresultacedemicProcess.php?id=" + id, true);
    r.send();


}

function viewresultstudentadmin(id) {
    var id = id;
    // alert(id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("loadexams").innerHTML = text;

        }


    };
    r.open("GET", "viewresultacedemicProcessadmin.php?id=" + id, true);
    r.send();


}




function releaseMarksStudent(id) {
    var id = id;
    // alert(id);
    var f = new FormData();
    f.append("id", id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "ok") {
                document.getElementById("releasebut" + id).innerHTML = "Released";
            }

        }


    };
    r.open("POST", "releasemarkstoStudent.php", true);
    r.send(f);
}

function paginationbut(x) {
    var page = x;


    var f1 = new FormData();
    f1.append("p", page);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var text = r.responseText;
            document.getElementById("tabPag").innerHTML = text;

        }
    };

    r.open("POST", "PaginationProcess.php", true);
    r.send(f1);
}

function acedemicSendEmail(id) {
    var id = id;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            alert(text);
        }

    };

    r.open("GET", "acedemicSendEmailProcess.php?id=" + id, true);
    r.send();



}
// var sendButton = function() {
//     var button = $('.sendButton');
//     button.on('click', function() {
//         $(this).hide().html('Sending <span class="loading"></span>').fadeIn('fast');
//         setTimeout(function() {
//             button.hide().html('Message sent &#10003;').fadeIn('fast');
//         }, 3000);
//     });
// };

// sendButton();

function sendmessage(id) {

    var id = id;
    var msgtxt = document.getElementById("msgtxt");
    var msvalue = msgtxt.value;
    // alert(mail);
    // alert(msvalue);

    var f = new FormData();
    f.append("id", id);
    f.append("t", msvalue);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {


                refresher(id);
                msgtxt.value = " ";

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "sendmessageAcedemicprocess.php", true);
    r.send(f);

}

function refresher(id) {

    setInterval(refreshmsgare(id), 500);
    setInterval(refreshrecentarea, 500);
}
// refres msg view area

function refreshmsgare(id) {

    var chatrow = document.getElementById("chatrow");

    var f = new FormData();
    f.append("i", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            chatrow.innerHTML = t;



        }
    }

    r.open("POST", "Adminrefreshmsgareaprocess.php", true);
    r.send(f);

}

// refreshrecentarea

function refreshrecentarea() {

    var rcv = document.getElementById("rcv");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rcv.innerHTML = t;

        }
    }

    r.open("POST", "refreshrecentareaprocess.php", true);
    r.send();

}
var k2;

function adminverification() {
    var e = document.getElementById("e").value;

    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("e", e);

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                var verificationmodal = document.getElementById("verificationmodal");
                var k2 = new bootstrap.Modal(verificationmodal);
                k2.show();

            } else {
                alert(t);

            }

        }
    };

    r.open("POST", "adminverificationprocess.php", true);
    r.send(f);

}

function verify() {
    var verificationcode = document.getElementById("v").value;
    // alert(verificationcode);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location = "adminpage.php";

            } else {
                alert(t);

            }


        }
    };

    r.open("GET", "verifyprocess.php?v=" + verificationcode, true);
    r.send();
}