function addlessons(id) {
    var id = id;

    var grade = document.getElementById("g").value;
    var lesson = document.getElementById("n").value;
    var fileselector = document.getElementById("f");

    // alert(id);
    // alert(subject);
    // alert(grade);
    // alert(fileselector);
    var form = new FormData();
    form.append("id", id);

    form.append("g", grade);
    form.append("n", lesson);
    form.append("file", fileselector.files[0]);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Upload Successed");
                window.location = "teacher.php";

            } else {
                document.getElementById("error").innerHTML = t;
            }



        }
    };


    r.open("POST", "lessonuploadprocess.php", true);
    r.send(form);
}

function studentfix() {


    var studentselect = document.getElementById("u");

    var gradeselectid = document.getElementById("g").value;
    // alert(brandselectid);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            studentselect.innerHTML = text;



        }
    };
    r.open("GET", "fixmodel.php?id=" + gradeselectid, true);
    r.send();


}

function setStudent(id) {


    var userselect = document.getElementById("s");



    var id = id;

    alert(id);


}

function addexam(id) {
    var id = id;
    var grade = document.getElementById("g1").value;

    var exam = document.getElementById("t1").value;

    // alert(id);
    // alert(grade);
    // alert(subject);
    // alert(exam);
    var form = new FormData();
    form.append("id", id);

    form.append("g", grade);
    form.append("e", exam);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Upload Successed");
                window.location = "teacher.php";

            } else {
                document.getElementById("see").innerHTML = t;
            }



        }
    };


    r.open("POST", "examaddprocess.php", true);
    r.send(form);


}

function addresult(id) {
    var id = id;
    var grade = document.getElementById("gr").value;
    var subject = document.getElementById("sub").value;
    var exam = document.getElementById("e").value;
    var student = document.getElementById("u").value;
    var mark = document.getElementById("t").value;

    // alert(id);
    // alert(grade);
    // alert(subject);
    // alert(exam);
    // alert(student);
    // alert(mark);
    var form = new FormData();
    form.append("id", id);
    form.append("s", subject);
    form.append("g", grade);
    form.append("e", exam);
    form.append("u", student);
    form.append("m", mark);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Upload Successed");
                document.getElementById("gr").value = "0";
                document.getElementById("sub").value = "0";
                document.getElementById("e").value = "0";
                document.getElementById("u").value = "0";
                document.getElementById("t").value = "";


            } else {
                document.getElementById("addRS").innerHTML = t;
            }



        }
    };


    r.open("POST", "addResultprocess.php", true);
    r.send(form);
}

function gradeExamloadTeacher(x) {
    var id = x;
    // alert(id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("loadexams").innerHTML = text;

        }


    };
    r.open("GET", "gradeExamloadTeacher.php?id=" + id, true);
    r.send();

}

function searchexamsTeacher(x) {
    var id = x;
    // alert(id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("loadexams").innerHTML = text;

        }


    };
    r.open("GET", "subjectExamloadTeacher.php?id=" + id, true);
    r.send();
}

function viewresultstudentTeacher(id) {
    var id = id;
    // alert(id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("loadexams").innerHTML = text;

        }


    };
    r.open("GET", "viewresultacedemicProcessTeacher.php?id=" + id, true);
    r.send();


}

function sendTeachermessageAdmin(id) {


    var id = id;
    var msgtxt = document.getElementById("msgtxt");
    var msvalue = msgtxt.value;
    // alert(id);

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

    r.open("POST", "sendmessageTeacherprocess.php", true);
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

    r.open("POST", "teacherrefreshmsgareaprocess.php", true);
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

function loadlessons() {
    alert("ok");
}

function loadexamss(id) {
    var id = id;
    var div = document.getElementById("loExams");

    var f = new FormData();
    f.append("id", id);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;

        }
    }

    r.open("POST", "studentloadexams.php", true);
    r.send(f);


}

function loadexamssResult(id) {
    var id = id;

    var div = document.getElementById("viewRe");

    var f = new FormData();
    f.append("id", id);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;

        }
    }

    r.open("POST", "studentloadexamsResults.php", true);
    r.send(f);


}

function viewResultstu(sid, gid, eid) {

    var div = document.getElementById("loadRe");

    var f = new FormData();
    f.append("sid", sid);
    f.append("gid", gid);
    f.append("eid", eid);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
            // alert(t);

        }
    }

    r.open("POST", "ViewStudentloadexamsRe.php", true);
    r.send(f);

}

function sendStudentmessageAdmin(id) {


    var id = id;
    var msgtxt = document.getElementById("msgtxt");
    var msvalue = msgtxt.value;
    // alert(id);

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

    r.open("POST", "sendmessageStudentprocess.php", true);
    r.send(f);

}

function refresher(id) {

    setInterval(sturefreshmsgare(id), 500);
    setInterval(refreshrecentarea, 500);
}
// refres msg view area

function sturefreshmsgare(id) {

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

    r.open("POST", "studentrefreshmsgareaprocess.php", true);
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

function uploadstudents(sid, stid, gid, eid) {

    var fileselector = document.getElementById("f");
    var btn = document.getElementById("bbt");
    var subject = sid;
    var student = stid;
    var grade = gid;
    var exam = eid;
    // alert(sid);
    // alert(stid);
    // alert(gid);
    // alert(eid);
    // alert(fileselector);


    var f = new FormData();
    f.append("su", subject);
    f.append("st", student);
    f.append("g", grade);
    f.append("e", exam);
    f.append("file", fileselector.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert(t);
                btn.innerHTML = "Re-upload";
            } else if (t == "success1") {
                alert("Uploaded");
            } else {
                alert(t);
            }



        }
    }

    r.open("POST", "uploadstudentassignment.php", true);
    r.send(f);

}