var k10;

function login() {
    var username = document.getElementById("uname").value;
    var password = document.getElementById("upas").value;
    var utype = document.getElementById("ut").value;


    //     alert(fname);
    //     alert(lname);
    //     alert(email);
    //     alert(utype);
    //     alert(utitle);

    var f = new FormData();
    f.append("u", username);
    f.append("p", password);
    f.append("t", utype);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            if (text == "1") {
                document.getElementById("errL").innerHTML = "! Empty Fields";
            } else if (text == "2") {
                document.getElementById("errL").innerHTML = "! Empty Fields";
            } else if (text == "4") {
                document.getElementById("errL").innerHTML = "! Empty User Type";
            } else if (text == "5") {
                window.location = "teacher.php";
            } else if (text == "6") {
                window.location = "student.php";
            } else if (text == "7") {
                window.location = "acedemic.php";
            } else if (text == "8") {
                window.location = "login.php";
            } else if (text == "9") {

                sendverificationcode(username, utype);
                var history = document.getElementById("loginemailid");
                var k10 = new bootstrap.Modal(history);
                k10.show();
                // window.location = "sendverificationcode.php?u=" + username + "&s=" +utype;

            } else {
                window.location = "login.php";
            }

        }


    };
    r.open("POST", "loginprocess.php", true);
    r.send(f);
}


// function sweetalert2() {
//     var history = document.getElementById("loginemailid");
//     var k10 = new bootstrap.Modal(history);
//     k10.show();

// }

function refreshrequest() {
    window.location = "login.php";
}

function verification() {
    var e = document.getElementById("v").value;
    var username = document.getElementById("uname").value;
    var password = document.getElementById("upas").value;
    var utype = document.getElementById("ut").value;


    var f = new FormData();
    f.append("v", e);
    f.append("us", username);
    f.append("up", password);
    f.append("ut", utype);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "ok") {
                alert("Verified.You can Login Now");
                document.getElementById('b3').onclick = function() {
                    swal("Good job!", "You clicked the button!", "success");
                };

                window.location = "login.php";
            } else {
                window.location = "login.php";
            }

        }
    };

    r.open("POST", "verificationcodesend.php", true);
    r.send(f);

}

function sendverificationcode(username, utype) {
    // alert(username);
    // alert(utype);
    var u = username;
    var t = utype;


    var f = new FormData();
    f.append("u", u);
    f.append("t", t);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                // var verificationmodal = document.getElementById("verificationmodal");
                // var k2 = new bootstrap.Modal(verificationmodal);
                // k2.show();
                alert(t);
            } else {
                window.location = "login.php";

            }

        }
    };

    r.open("POST", "sendverificationcode.php", true);
    r.send(f);
}