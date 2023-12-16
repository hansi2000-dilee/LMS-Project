function showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";

    if (h == 0) {
        h = 12;
    }

    if (h > 12) {
        h = h - 12;
        session = "PM";
    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;

    setTimeout(showTime, 1000);

}

showTime();

function generate_year_range(start, end) {
    var years = "";
    for (var year = start; year <= end; year++) {
        years += "<option value='" + year + "'>" + year + "</option>";
    }
    return years;
}

today = new Date();
currentMonth = today.getMonth();
currentYear = today.getFullYear();
selectYear = document.getElementById("year");
selectMonth = document.getElementById("month");


createYear = generate_year_range(1970, 2050);
/** or
 * createYear = generate_year_range( 1970, currentYear );
 */

document.getElementById("year").innerHTML = createYear;

var calendar = document.getElementById("calendar");
var lang = calendar.getAttribute('data-lang');

var months = "";
var days = "";

var monthDefault = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var dayDefault = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

if (lang == "en") {
    months = monthDefault;
    days = dayDefault;
} else if (lang == "id") {
    months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    days = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
} else if (lang == "fr") {
    months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
} else {
    months = monthDefault;
    days = dayDefault;
}


var $dataHead = "<tr>";
for (dhead in days) {
    $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
}
$dataHead += "</tr>";

//alert($dataHead);
document.getElementById("thead-month").innerHTML = $dataHead;


monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);



function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}

function showCalendar(month, year) {

    var firstDay = (new Date(year, month)).getDay();

    tbl = document.getElementById("calendar-body");


    tbl.innerHTML = "";


    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    var date = 1;
    for (var i = 0; i < 6; i++) {

        var row = document.createElement("tr");


        for (var j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                cell = document.createElement("td");
                cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            } else if (date > daysInMonth(month, year)) {
                break;
            } else {
                cell = document.createElement("td");
                cell.setAttribute("data-date", date);
                cell.setAttribute("data-month", month + 1);
                cell.setAttribute("data-year", year);
                cell.setAttribute("data-month_name", months[month]);
                cell.className = "date-picker";
                cell.innerHTML = "<span>" + date + "</span>";

                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.className = "date-picker selected";
                }
                row.appendChild(cell);
                date++;
            }


        }

        tbl.appendChild(row);
    }

}

function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}



function sendinvitation(id) {
    var id = id;



    var f = new FormData();
    f.append("id", id);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                alert("Sent Invitation");
                window.location = "sendinvitation.php";
            } else {
                alert(t);

            }

        }
    };

    r.open("POST", "AdminAcedemicsendverificationcode.php", true);
    r.send(f);
}

function sendinvitationteacher(id) {
    var id = id;



    var f = new FormData();
    f.append("id", id);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                alert("Sent Invitation");
                window.location = "sendinvitation.php";
            } else {
                alert(t);

            }

        }
    };

    r.open("POST", "Adminteachersendverificationcode.php", true);
    r.send(f);
}

function sendinvitationstudent(id) {
    var id = id;



    var f = new FormData();
    f.append("id", id);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                alert("Sent Invitation");
                window.location = "sendinvitation.php";
            } else {
                alert(t);

            }

        }
    };

    r.open("POST", "AdminStudentsendverificationcode.php", true);
    r.send(f);
}


function myFunction(id) {
    var x = document.getElementById("Demo1" + id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
    fillspace(id);
}

function fillspace(id) {
    var s = document.getElementById("fill" + id);
    var id = id;

    var f = new FormData();
    f.append("id", id);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // if (t == "Success") {
            //     alert(t);
            // } else {
            //     alert(t);

            // }
            s.innerHTML = t;

        }
    };

    r.open("POST", "fillspaceteacher.php", true);
    r.send(f);
}

function assignteacherforsubject() {
    var t = document.getElementById("te").value;
    var s = document.getElementById("su").value;
    var g = document.getElementById("gr").value;

    // alert(t);
    // alert(s);
    // alert(g);

    var f = new FormData();
    f.append("t", t);
    f.append("s", s);
    f.append("g", g);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Success");
            } else {
                alert(t);

            }
            // alert(t);

        }
    };

    r.open("POST", "assignTeacherGrade.php", true);
    r.send(f);
}

function registerTeacherAdmin() {
    var f = document.getElementById("fn").value;
    var l = document.getElementById("ln").value;
    var e = document.getElementById("em").value;

    // alert(t);
    // alert(s);
    // alert(g);

    var f = new FormData();
    f.append("f", f);
    f.append("l", l);
    f.append("e", e);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Success");
                document.getElementById("fn").value = "";
                document.getElementById("ln").value = "";
                document.getElementById("em").value = "";
            } else {
                alert(t);

            }
            // alert(t);

        }
    };

    r.open("POST", "Teacherregistration.php", true);
    r.send(f);
}

function registerAcedemicOfficerAdmin() {
    var f = document.getElementById("fn").value;
    var l = document.getElementById("ln").value;
    var e = document.getElementById("em").value;

    // alert(t);
    // alert(s);
    // alert(g);

    var f = new FormData();
    f.append("f", f);
    f.append("l", l);
    f.append("e", e);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Success");
                document.getElementById("fn").value = "";
                document.getElementById("ln").value = "";
                document.getElementById("em").value = "";
            } else {
                alert(t);

            }
            // alert(t);

        }
    };

    r.open("POST", "Acedemicregistration.php", true);
    r.send(f);
}