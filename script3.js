let select = document.getElementById("my-select"),
    showOption = document.querySelector('#option-selected');

select.addEventListener('change', function() {
    // showOption.textContent = "Your selected Grade " + this.value;
    setId(this.value);
    setStudent(this.value);
});

function setId(value) {
    var value = value;
    var sub = document.getElementById("e");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            sub.innerHTML = text;
            // alert(text);



        }
    };
    r.open("GET", "fixmodel.php?id=" + value, true);
    r.send();
}

function setStudent(value) {
    var value = value;
    var sub = document.getElementById("tabload");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            sub.innerHTML = text;
            // alert(text);




        }
    };
    r.open("GET", "fixstudent.php?id=" + value, true);
    r.send();
}

function addStudentMarks(id, stu_id) {

    var marks = document.getElementById("markfield" + stu_id).value;
    var exams = document.getElementById("e").value;
    // alert(id);
    // alert(marks);
    // alert(stu_id);
    // alert(exams);
    var form = new FormData();
    form.append("id", id);
    form.append("m", marks);
    form.append("s", stu_id);
    form.append("e", exams);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                document.getElementById("markfield" + stu_id).value = "";
                alert("Done");

            } else {
                alert(t);
                document.getElementById("markfield" + stu_id).value = "";
            }


        }
    };


    r.open("POST", "addmarksStudentProcess.php", true);
    r.send(form);


}


function addtostudentgrade() {
    var grade = document.getElementById("gr").value;
    var student = document.getElementById("st").value;
    var subject = document.getElementById("su").value;

    // alert(grade);
    // alert(student);
    // alert(subject);
    var form = new FormData();
    form.append("g", grade);
    form.append("u", student);
    form.append("s", subject);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Successed Added") {
                alert(t);
            } else {
                alert(t);
                document.getElementById("gr").value = "0";
                document.getElementById("st").value = "0";
                document.getElementById("su").value = "0";
            }

        }
    };


    r.open("POST", "studentgradesubject.php", true);
    r.send(form);




}