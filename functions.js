
function editsubject(ipinasa){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {	
			var buongObject=JSON.parse(this.responseText);
			document.getElementById("subname").value = buongObject.sname;
			document.getElementById("subdes").value = buongObject.sdesc;
			document.getElementById("uId").value = forIpinasa;
			document.getElementById("addsubj").style.display="none";
			document.getElementById("updatesubj").style.display="inline";
			document.body.scrollTop = 0; // For Safari
			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

    }
  };
  
	var forIpinasa = ipinasa;
	//document.write(forIpinasa);
	var palatandaan = "edit";
	xhttp.open("GET", "process.php?forIpinasa="+forIpinasa+"&palatandaan="+palatandaan, true);
	xhttp.send(); 
	
}

function saved(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {	
			document.getElementById("response").innerHTML = this.responseText;
    }
  };
	var f = document.getElementById("subname").value;
	var u = document.getElementById("subdes").value;
	var uid = document.getElementById("uId").value;
	var palatandaan = "update";
	xhttp.open("GET", "process.php?subname="+f+"&subdes="+u+"&palatandaan="+palatandaan+"&uId="+uid, true);
    xhttp.send(); 
}

function showassignedsections(subjectid){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (xhttp.readyState == 4 && xhttp.status == 200) {	
			document.getElementById("seccheckbox").innerHTML = this.responseText;
			document.getElementById("hiddensubid").value=subjectid;
    		document.getElementById("modaltitle").innerHTML=document.getElementById("title"+subjectid).value;
	  }
	};
	
	  var subjectid=subjectid;
	  var palatandaan = "showassignedsections";
	  xhttp.open("GET", "process.php?palatandaan="+palatandaan+"&subjectid="+subjectid, true);
	  xhttp.send(); 
  }


