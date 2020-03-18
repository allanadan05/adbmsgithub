function editlesson(ipinasa) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var buongObject = JSON.parse(this.responseText);
            //document.getElementById("response").innerHTML = buongObject.sname;
            document.getElementById("lessontit").value = buongObject.lessontitle;
            document.getElementById("lessondet").value = buongObject.lessondetail;
            //document.getElementById("file-input").value = buongObject.lessonpdf;
            document.getElementById("uId").value = forIpinasa;
            document.getElementById("addlesson").style.display = "none";
            document.getElementById("updatelesson").style.display = "inline";
        }
    };

    var forIpinasa = ipinasa;
    //document.write(forIpinasa);
    var palatandaan = "edit";
    xhttp.open("GET", "processj.php?forIpinasa=" + forIpinasa + "&palatandaan=" + palatandaan, true);
    xhttp.send();
}