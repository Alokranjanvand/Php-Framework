var ipinfo;
$.getJSON("http://ipinfo.io", function (data) {
$("#info").html("IP: " + data.ip + "")
})
