<?php

function getname($id){

    include('connection.php');	

    $sql="SELECT * FROM userstbl where userid=".$id;
    $executeQuery=mysqli_query($con, $sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result['lname'] ." " .$result['fname'];
    }

    return $ibalik;
}

function getfname($id){

    include('connection.php');	

    $sql="SELECT * FROM userstbl where userid=".$id;
    $executeQuery=mysqli_query($con, $sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result['fname'];
    }

    return $ibalik;
}

function getlname($id){

    include('connection.php');	

    $sql="SELECT * FROM userstbl where userid=".$id;
    $executeQuery=mysqli_query($con, $sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result['lname'];
    }

    return $ibalik;
}

function getmname($id){

    include('connection.php');	

    $sql="SELECT * FROM userstbl where userid=".$id;
    $executeQuery=mysqli_query($con, $sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result['mname'];
    }

    return $ibalik;
}











function getuserid($id){

    include('connection.php');
    $sql="SELECT * FROM userstbl WHERE userid=".$id;
    $executeQuery=mysqli_query($con,$sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $userid=$result['userid'];
    }

        return $userid;
}




function teacherid($id){

    include('connection.php');
    $sql="SELECT * FROM teacherstbl WHERE teachersid=".$id;
    $executeQuery=mysqli_query($con,$sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $teachersid=$result['teachersid'];
    }

        return $teachersid;
}

function teachersgetname($id){

    include('connection.php');	

    $sql="SELECT * FROM teacherstbl where teachersid=".$id;
    $executeQuery=mysqli_query($con, $sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result['lname'] ." " .$result['fname'];
    }

    return $ibalik;
}


function teachergetfname($id){
    include('connection.php');	

    $sql="SELECT * FROM teacherstbl where teachersid=".$id;
    $executeQuery=mysqli_query($con, $sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result['fname'];
    }

    return $ibalik;
}

function teachergetlname($id){
    include('connection.php');	

    $sql="SELECT * FROM teacherstbl where teachersid=".$id;
    $executeQuery=mysqli_query($con, $sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result['lname'];
    }

    return $ibalik;
}

function teachergetmname($id){
    include('connection.php');	

    $sql="SELECT * FROM teacherstbl where teachersid=".$id;
    $executeQuery=mysqli_query($con, $sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result['mname'];
    }

    return $ibalik;
}

function getsubid($id){
    include('connection.php');	

    $sql="SELECT * FROM subjecttbl where subjectid=".$id;
    $executeQuery=mysqli_query($con, $sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result['subjectid'];
    }

    return $ibalik;
}

function getsubname($id){
    include('connection.php');	

    $sql="SELECT * FROM subjecttbl where subjectid=".$id;
    $executeQuery=mysqli_query($con, $sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result['subjectname'];
    }

    return $ibalik;
}

function getsubdesc($id){
    include('connection.php');	

    $sql="SELECT * FROM subjecttbl where subjectid=".$id;
    $executeQuery=mysqli_query($con, $sql);

    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result['subjectdesc'];
    }

    return $ibalik;
}
function countsub(){
    include('connection.php');	

    $sql="SELECT COUNT(subjectid) FROM subjecttbl";
    $executeQuery=mysqli_query($con, $sql);
    while($result=mysqli_fetch_array($executeQuery)){
        $ibalik=$result;
    }
    return $ibalik;
}

?>

