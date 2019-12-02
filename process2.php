<?php 
include('connection.php');

if(isset($_GET['palatandaan'])){

$palatandaan =  $_GET['palatandaan'];

		if($palatandaan =="editsection"){
			$id=$_GET['forwardedid'];
			$querySaDatabase = "SELECT * FROM sectiontbl WHERE sectionid='$id' ";
			$executeQuery = mysqli_query($con, $querySaDatabase);
				$pambato = array();
				while($row = mysqli_fetch_array($executeQuery)){
					$pambato['secid'] = $row['sectionid'];
					$pambato['secname'] = $row['sectionname'];
				}
				echo json_encode($pambato);
		}

		if($palatandaan =="editdept"){
			$id=$_GET['forwardedid'];
			$querySaDatabase = "SELECT * FROM departmenttbl WHERE deptid='$id' ";
			$executeQuery = mysqli_query($con, $querySaDatabase);
				$pambato = array();
				while($row = mysqli_fetch_array($executeQuery)){
					$pambato['deptid'] = $row['deptid'];
					$pambato['deptname'] = $row['departmentname'];
				}
				echo json_encode($pambato);
		}

		if($palatandaan=="changedsec"){
			$secid=$_GET['secid'];

		     $sql="SELECT userstbl.userid, userstbl.lname, userstbl.fname, userstbl.email, sectiontbl.sectionname, (SELECT averagescore FROM scoretbl WHERE userstbl.userid=scoretbl.userid ) AS AverageScore,(SELECT remarks FROM scoretbl WHERE userstbl.userid=scoretbl.userid ) AS Remarks from userstbl left join sectiontbl on userstbl.sectionid=sectiontbl.sectionid WHERE userstbl.sectionid='$secid' order by userstbl.lname";
		     $result=mysqli_query($con, $sql);
		        if(mysqli_num_rows($result)){
		             while($row = mysqli_fetch_array($result)){
		             	echo "<tr class='tr-shadow'>
		                        <td>
		                            <label class='au-checkbox'>
		                                <input type='checkbox'>
		                                <span class='au-checkmark'></span>
		                            </label>
		                        </td>";
		                echo "<td>".$row['lname'].", ".$row['fname']."</td>";
		                echo "<td>".$row['email']."</td>";
		                echo "<td>".$row['sectionname']."</td>";
		                echo "<td>
		                        <span "; 
		                        if($row['Remarks']=='PASSED'){
		                            echo 'class="status--process"'; } 
		                         else{
		                            echo 'class="status--denied"';
		                         }
		                         echo ">";
		                         echo $row['AverageScore']."% ".$row['Remarks'];
		                         echo "
									</span>
		                       </td>";
		                  echo "
		                                <td>
		                                    <div class='table-data-feature'>
		                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Send Notifications'>
		                                            <i class='zmdi zmdi-mail-send'></i>
		                                        </button>
		                                       <button type='button' onclick='editstudent(".$row['userid'].")' class='item' data-placement='top' title='Edit' data-toggle='modal' data-target='#add'>
		                                            <i class='zmdi zmdi-edit'></i>
		                                        </button>
		                                         <a href='process2.php?deletestudent=1&id=".$row['userid']."'>
		                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
		                                            <i class='zmdi zmdi-delete'></i>
		                                        </button></a>
		                                        <button class='item' data-toggle='tooltip' data-placement='top' title='More'>
		                                            <i class='zmdi zmdi-more'></i>
		                                        </button>
		                                    </div>
		                                </td>
		                         ";
		                         echo "</tr>";
		        }
		    }else{
		        	 echo "<tr><td></td><td></td><td>No data Found</td><td></td><td></td><td></td>
		                   </tr>";
		        }
		                
		} //end if palatandaan==changedsec
		if($palatandaan=="searchstudent"){
			$tosearch=$_GET['tosearch'];

		     $qu="SELECT userstbl.userid, userstbl.lname, userstbl.fname, userstbl.email, sectiontbl.sectionname, (SELECT averagescore FROM scoretbl WHERE userstbl.userid=scoretbl.userid ) AS AverageScore,(SELECT remarks FROM scoretbl WHERE userstbl.userid=scoretbl.userid ) AS Remarks from userstbl left join sectiontbl on userstbl.sectionid=sectiontbl.sectionid WHERE lname  LIKE '%$tosearch%' OR userid  LIKE '%$tosearch%' OR fname LIKE '%$tosearch%' OR email LIKE '%$tosearch%' OR sectionname LIKE '%$tosearch%' order by userstbl.lname";
		     $re=mysqli_query($con, $qu);
		        if(mysqli_num_rows($re)){
		             while($row = mysqli_fetch_array($re)){
		             	echo "<tr class='tr-shadow'>
		                        <td>
		                            <label class='au-checkbox'>
		                                <input type='checkbox'>
		                                <span class='au-checkmark'></span>
		                            </label>
		                        </td>";
		                echo "<td>".$row['lname'].", ".$row['fname']."</td>";
		                echo "<td>".$row['email']."</td>";
		                echo "<td>".$row['sectionname']."</td>";
		                echo "<td>
		                        <span "; 
		                        if($row['Remarks']=='PASSED'){
		                            echo 'class="status--process"'; } 
		                         else{
		                            echo 'class="status--denied"';
		                         }
		                         echo ">";
		                         echo $row['AverageScore']."% ".$row['Remarks'];
		                         echo "
									</span>
		                       </td>";
		                  echo "
		                                <td>
		                                    <div class='table-data-feature'>
		                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Send Notifications'>
		                                            <i class='zmdi zmdi-mail-send'></i>
		                                        </button>
		                                        <button type='button' onclick='editstudent(".$row['userid'].")' class='item' data-placement='top' title='Edit' data-toggle='modal' data-target='#add'>
		                                            <i class='zmdi zmdi-edit'></i>
		                                        </button>
		                                         <a href='process2.php?deletestudent=1&id=".$row['userid']."'>
		                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
		                                            <i class='zmdi zmdi-delete'></i>
		                                        </button></a>
		                                        <button class='item' data-toggle='tooltip' data-placement='top' title='More'>
		                                            <i class='zmdi zmdi-more'></i>
		                                        </button>
		                                    </div>
		                                </td>
		                         ";
		                         echo "</tr>";
		        }
		    }else{
		        	 echo "<tr><td></td><td></td><td>No data Found</td><td></td><td></td><td></td>
		                   </tr>";
		        }
		                
		} //end if palatandaan==searchstudent

		if($palatandaan =="editstudent"){
			$id=$_GET['forwardedid'];
			$querySaDatabase = "SELECT * FROM userstbl WHERE userid='$id' ";
			$executeQuery = mysqli_query($con, $querySaDatabase);
				$pambato = array();
				while($row = mysqli_fetch_array($executeQuery)){
					$pambato['userid'] = $row['userid'];
					$pambato['email'] = $row['email'];
					$pambato['password'] = $row['password'];
					$pambato['fname'] = $row['fname'];
					$pambato['lname'] = $row['lname'];
					$sec=$row['sectionid'];
					$qq = "SELECT * FROM sectiontbl WHERE sectionid='$sec' ";
					$ee = mysqli_query($con, $qq);
					while ($rr = mysqli_fetch_array($ee)){
					$pambato['sectionname'] = $rr['sectionname'] ;	
					$pambato['sectionid'] = $rr['sectionid'] ;	
					}
					

				}
				echo json_encode($pambato);
		}

}//end if isset palatandaan

if(isset($_POST['addsection'])){
			//echo $_POST['addsection'] ." POST addsection <br>";
		
			$nsn = $_POST['newsectionname'];	
			//echo $nsn ."POST newsectionname <br> ";		
			$query = "INSERT INTO sectiontbl(sectionname) VALUES ('$nsn')";
			//echo $query ."query <br>";	
			$check=mysqli_query($con, $query) or die('Query error');

			if($check){
				header("location: adminsections.php?addsecresult=success&secname=".$nsn);
			}else{
				header("location: adminsections.php?addsecresult=failed&secname=".$nsn);
			}
}	

if(isset($_POST['adddept'])){
			//echo $_POST['addsection'] ." POST addsection <br>";
		
			$ndn = $_POST['newdeptname'];	
			//echo $nsn ."POST newsectionname <br> ";		
			$query = "INSERT INTO departmenttbl (departmentname) VALUES ('$ndn')";
			//echo $query ."query <br>";	
			$check=mysqli_query($con, $query) or die('Query error');

			if($check){
				header("location: adminsections.php?adddeptresult=success&secname=".$nsn);
			}else{
				header("location: adminsections.php?adddeptresult=failed&secname=".$nsn);
			}
}	


if(isset($_POST['editsecsubmit'])){
	
			$nsn = $_POST['newsectionname'];
			$id = $_POST['hiddenname'];	
			$query = "UPDATE sectiontbl SET sectionname='$nsn' WHERE sectionid='$id' ";
			$check=mysqli_query($con, $query) or die('Query error');
			if($check){
				header("location: adminsections.php?editsecresult=success&secname=".$nsn);
			}else{
				header("location: adminsections.php?editsecresult=failed&secname=".$nsn);
			}
}	

if(isset($_POST['editdeptsubmit'])){
		
			$ndn = $_POST['newdeptname'];
			$id = $_POST['hiddendeptname'];		
			$query = "UPDATE departmenttbl SET departmentname='$ndn' WHERE deptid='$id' ";
			$check=mysqli_query($con, $query) or die('Query error');
			if($check){
				header("location: adminsections.php?editdeptresult=success&deptname=".$ndn);
			}else{
				header("location: adminsections.php?editdeptresult=failed&deptname=".$ndn);
			}
}

if(isset($_GET['deletesection'])){
    $id=$_GET['id'];
     
   $query = "DELETE FROM sectiontbl WHERE sectionid='$id' ";
   $check = mysqli_query($con , $query) or die('Query error');
    if($check)
        {
            header("location: adminsections.php?deletesecresult=success");
        }
        else
        {
            header("location: adminsubjects.php?deletesecresult=failed");
        }
}

if(isset($_GET['deletedept'])){
    $id=$_GET['id'];
     
   $query = "DELETE FROM departmenttbl WHERE deptid='$id' ";
   $check = mysqli_query($con , $query) or die('Query error');
    if($check)
        {
            header("location: adminsections.php?deletedeptresult=success");
        }
        else
        {
            header("location: adminsubjects.php?deletedeptresult=failed");
        }
}

if(isset($_GET['deletestudent'])){
    $id=$_GET['id'];
     
   $query = "DELETE FROM userstbl WHERE userid='$id' ";
   $check = mysqli_query($con , $query) or die('Query error');
    if($check)
        {
            header("location: adminstudents.php?deletestudentresult=success");
        }
        else
        {
            header("location: adminstudents.php?deletestudentresult=failed");
        }
}


?>
