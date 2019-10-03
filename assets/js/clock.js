 function clock() {
            var time = new Date()
            var hr = time.getHours()
            var min = time.getMinutes()
            var sec = time.getSeconds()
            var ampm = " PM "
            if (hr < 12) {
                ampm = " AM "
            }
            if (hr > 12) {
                hr -= 12
            }
            if (hr < 10) {
                hr = " " + hr
            }
            if (min < 10) {
                min = "0" + min
            }
            if (sec < 10) {
                sec = "0" + sec
            }
            document.clockForm.clockButton.value = hr + ":" + min + ":" + sec + ampm
            setTimeout("clock()", 1000)
        }

        function showDate() {
            var date = new Date()
            var year = date.getYear()
            if (year < 1000) {
                year += 1900
            }
            var monthArray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")
            alert(monthArray[date.getMonth()] + " " + date.getDate() + ", " + year)
        }
        window.onload = clock;
        //// Calender
 var today = new Date();
const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
var dd = today.getDate();
var mm = monthNames[today.getMonth()]; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = dd + ',' + mm + ',' + yyyy;
//document.write(today);
document.getElementById("demo").innerHTML = today;       
/////ipadress
var ipinfo;
$.getJSON("http://ipinfo.io", function (data) {
$("#info").html("IP Address: " + data.ip + "")
})


/////nav fixed////
window.onscroll = function() {navfix()};
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;
function navfix() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
//////time zone function
var cureent_date = new Date();
var timezone = cureent_date.toTimeString();
document.getElementById("timezone").innerHTML = timezone;