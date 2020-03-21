<?php
//error_reporting(1);
if(isset($_POST['chEm']) && $_POST['chEm'] != "" )
{
        include_once 'connection.php';
        $email=$_POST['chEm'];
		$sql_em_check =mysqli_query($con,"SELECT email FROM userstbl WHERE email='$email' LIMIT 1");
		$checkemail = mysqli_num_rows($sql_em_check);
	if($checkemail < 1)
	{
	echo '<strong style="color:green;">'.$email.'</strong><span style="color:green;"> is Available</span>';
	exit();
	}
	else
	{
	echo '<strong style="color:red;">'.$email.'</strong> <span style="color:red;"> Email already exist</span>';
	exit();
	}
}

if(isset($_POST['chpwd']) && $_POST['chpwd'] != "" )
{
	  $pw=preg_replace('#[^a-z0-9]#i', '', $_POST['chpwd']);
	if(strlen($pw) < 4)
	{
		echo '<h6 style="color: red">Password must be more than 4 characters</h6>';
		exit();
	}
}
/*
include 'connection.php';
$action=$_GET['mul_del'];
if($action=="ajaxMulitpleDelete")
	{
		$id=$_GET['id'];
		$delAjax="DELETE FROM userstbl WHERE userid=$id";
		$sqlAjaxDel=mysqli_query($con,$delAjax);
	}
*/


include 'connection.php';
@$studName=$_GET['tokenStudName'];
if($studName=="fullName")
{
	$id=$_GET['id'];
	$sql="SELECT * FROM userstbl WHERE userid=$id";
	$query=mysqli_query($con,$sql);
	$obj = array();
	 while ($row = mysqli_fetch_array($query))
	 	{
			$obj['lname']=$row['lname'];
			$obj['fname']=$row['fname'];
			$obj['mname']=$row['mname'];
		}
		$printName = json_encode($obj);
		echo $printName;
}


// admin setting (adminsettings.php)

@$token_accSetting=$_POST['accSetting'];
@$accSetting=$_POST['accSetting'];
if(isset($accSetting))
{
	if(isset($token_accSetting))
	{
			$adminid=mysqli_escape_string($con,$_POST['adminid']);
			$email=mysqli_escape_string($con,$_POST['email']);
			$password=mysqli_escape_string($con,$_POST['password']);
			//image import
			$image = $_FILES['myfile']['name'];
			$temp = $_FILES['myfile']['tmp_name'];
			//image import
			
			if(isset($image) && ($iamge!=""))
			{
				$oldimg="SELECT adminimage FROM admintbl WHERE adminid='".$adminid."' ";
				$queryoldimg=mysqli_query($con,$oldimg);
				$fetcholdimg=mysqli_fetch_array($queryoldimg);
				unlink("images/admin_picture/".$fetcholdimg['adminimage']); //delete na luma image
				
				move_uploaded_file($temp,"images/admin_picture/".$image);
				$sql_accSetting = "UPDATE admintbl set email='".$email."', password='".$password."', adminimage='".$image."' WHERE adminid='".$adminid."' ";
				$sql_query_accSetting = mysqli_query($con,$sql_accSetting) or die (mysqli_connect_error($con));

				if($sql_query_accSetting)
				{
					header("location: adminsettings.php?admin=accSettting");
				}
			}
			else
			{
					$sql_accSetting = "UPDATE admintbl set email='".$email."', password='".$password."' WHERE adminid='".$adminid."' ";
					$sql_query_accSetting = mysqli_query($con,$sql_accSetting) or die (mysqli_connect_error($con));

					if($sql_query_accSetting)
					{
						header("location: adminsettings.php?admin=accSettting");
					}
					header("location: adminsettings.php?admin=accSettting");
			}
	}
	
}


@$token_personalInfo=$_POST['personalInfo'];
@$personalInfo=$_POST['personalInfo'];
if(isset($personalInfo))
{
	if(isset($token_personalInfo))
	{
		$adminid=mysqli_escape_string($con,$_POST['adminid']);
		$fname=mysqli_escape_string($con,$_POST['fname']);
		$lname=mysqli_escape_string($con,$_POST['lname']);
		$mname=mysqli_escape_string($con,$_POST['mname']);
		$sql_personalInfo= "UPDATE admintbl set fname='".$fname."', lname='".$lname."', mname='".$mname."' WHERE adminid='".$adminid."' ";
		$sql_query_personalInfo = mysqli_query($con,$sql_personalInfo) or die (mysqli_connect_error($con));

		if($sql_query_personalInfo)
		{
			header("location: adminsettings.php?admin=personalInfo");
		}
	}
}
// admin setting (adminsettings.php)

include('connection.php');


//pagination 
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$num_of_page = 05; // limit ng page niya sa table
$start_from = ($page - 1) * 05;
// pagination 

if (isset($_GET['palatandaan'])) {

	$palatandaan =  $_GET['palatandaan'];

	if ($palatandaan == "editsection") {
		$id = $_GET['forwardedid'];
		$querySaDatabase = "SELECT * FROM sectiontbl WHERE sectionid='$id' ";
		$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while ($row = mysqli_fetch_array($executeQuery)) {
			$pambato['secid'] = $row['sectionid'];
			$pambato['secname'] = $row['sectionname'];
		}
		echo json_encode($pambato);
	}

	if ($palatandaan == "editdept") {
		$id = $_GET['forwardedid'];
		$querySaDatabase = "SELECT * FROM departmenttbl WHERE deptid='$id' ";
		$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while ($row = mysqli_fetch_array($executeQuery)) {
			$pambato['deptid'] = $row['deptid'];
			$pambato['deptname'] = $row['departmentname'];
		}
		echo json_encode($pambato);
	}

	if ($palatandaan == "changeddepartment") {
		$secid = $_GET['secid'];

		$sql = "select deptid, teachersid, concat(lname, ', ', fname , ' ', mname) AS name, email, 
		(SELECT departmentname from departmenttbl WHERE deptid=teacherstbl.deptid) AS departmentname, 
		(SELECT count(subjectid) from teachersubjecttbl where teachersid=teacherstbl.teachersid) AS NoOfSubject 
		FROM teacherstbl WHERE deptid=" . $secid . " order by teacherstbl.lname limit $start_from,$num_of_page";
		// echo $sql;
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result)) {
			while ($row = mysqli_fetch_array($result)) {
				echo '<tr class="tr-shadow">';
				echo '<td>
					<label class="au-checkbox">';
				echo "<input onclick='oneCheckBoxes();' name='num[]' class='checkitem' type='checkbox' value=$row[teachersid]>";
				echo '<span class="au-checkmark"></span>
					</label>
				</td> ';
				echo "<td style='display:none;' id='SearchteachersdeptId'>" . $row['deptid'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['departmentname'] . "</td>";
				echo "<td>" . $row['NoOfSubject'] . "</td>";
				echo '<td>
					<div class="table-data-feature">
						<button onclick="showassignedsubjects(' . $row['teachersid'] . ')" class="item" data-toggle="modal" data-placement="top" title="Assigned Subject/s" type="button" data-target="#sendnotif">
							<i class="fa fa-book"></i>
						</button>
						<button type="button" onclick="editsteacher(' . $row['teachersid'] . ')" class="item" data-placement="top" title="Edit"  data-toggle="modal" data-target="#add">
							<i class="zmdi zmdi-edit"></i>
						</button>
						<a href=processj.php?deleteteachers=1&id=' . $row['teachersid'] . '">
						<button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
							<i class="zmdi zmdi-delete"></i>
						</button>
					</div>
				</td>
			</tr>
			';
			}
		} else {
			echo "<tr><td></td><td></td><td>No data Found</td><td></td><td></td><td></td>
	</tr>";
		}
	} // end of $palatandaan=="changeddepartment"

	if ($palatandaan == "changedsec") {
		$secid = $_GET['secid'];

		$qu = "select userstbl.userid, userstbl.sectionid, userstbl.lname, userstbl.fname, userstbl.email,userstbl.image, 
		(select sectionname from sectiontbl where userstbl.sectionid=sectiontbl.sectionid) AS sectionname,
			(select sum(averagescore)/count(averagescore) from scoretbl where userstbl.userid=scoretbl.userid) AS averagescore
			from userstbl WHERE userstbl.sectionid='$secid' order by userstbl.lname limit $start_from,$num_of_page";
		$re = mysqli_query($con, $qu);
		if (mysqli_num_rows($re)) {
			while ($row = mysqli_fetch_array($re)) {
				echo "<tr class='tr-shadow'>
							<td>
								<label class='au-checkbox'>
									";
				echo "<input class='checkitem' name='num[]' type='checkbox' value=$row[userid]>";
				echo "<span class='au-checkmark'></span>
								</label>
							</td>";
				echo "<td>" . $row['lname'] . ", " . $row['fname'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['sectionname'] . "</td>";
?>
				<td>
					<span <?php
							if ($row['averagescore'] >= 75.00) {
								echo 'class="status--process"';
								$remarks = "PASSED";
							} else {
								if ($row['averagescore'] <= 0) {
									//do nothing
									$remarks = "Undefined";
								} else {
									echo 'class="status--denied"';
									$remarks = "FAILED";
								}
							}
							?>>
						<?php echo $row['averagescore'] . " % " . $remarks; ?>
				</td>
				<td>
					<?php
					$q = "select subjectid, (select subjectname from subjecttbl where subjectid=sectionsubjecttbl.subjectid) AS subjectname from sectionsubjecttbl where sectionid=" . $row['sectionid'];
					$r = mysqli_query($con, $q);
					if (mysqli_num_rows($r)) {
						while ($sub = mysqli_fetch_array($r)) {
							if ($sub['subjectname']) {
								echo $sub['subjectname'];
							}
						}
					}
					?>
				</td>
				<td>
					<img style="width: 30px; height: 30px; border-radius: 100px;" onerror="this.src='images/defaultpic/defaultPIC.png'" src="<?php echo "images/profile_picture/" . $row['image'] . ""; ?>"></td>
				</td>
			<?php
				echo "
									<td>
										<div class='table-data-feature'>
											<button onclick='setmodalid(" . $row['userid'] . ")'  class='item' data-toggle='modal' data-placement='top' title='Send Notifications'  type='button' data-target='#sendnotif'>
												<i class='zmdi zmdi-mail-send'></i>
											</button>
											<button type='button' onclick='editstudent(" . $row['userid'] . ")' class='item' data-placement='top' title='Edit' data-toggle='modal' data-target='#add'>
												<i class='zmdi zmdi-edit'></i>
											</button>
											<a href='process2.php?deletestudent=1&id=" . $row['userid'] . "'>
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
		} else {
			echo "<tr><td></td><td></td><td>No data Found</td><td></td><td></td><td></td>
			</tr>";
		}
		// new line code
		// checkboxes all selected teacherstudents.php 
		echo '<script>
$("checkitem").change(function(){
$(".checkall").prop,("checked", $(this).prop("checked"))
});
</script>
';
	} //end if palatandaan==changedsec
	if ($palatandaan == "searchstudent") {
		$tosearch = $_GET['tosearch'];
		$qu = "select userstbl.userid, userstbl.sectionid, userstbl.lname, userstbl.fname, userstbl.email, userstbl.image, 
		(select sectionname from sectiontbl where userstbl.sectionid=sectiontbl.sectionid) AS sectionname,
			(select sum(averagescore)/count(averagescore) from scoretbl where userstbl.userid=scoretbl.userid) AS averagescore
			from userstbl WHERE lname LIKE '%$tosearch%' OR fname LIKE '%$tosearch%' OR email LIKE '%$tosearch%'
			order by userstbl.lname limit $start_from,$num_of_page";
		$re = mysqli_query($con, $qu);
		// <input name='num[]' class='checkitem' type='checkbox'> <<this code check all and class="num[]" specific deleted
		if (mysqli_num_rows($re)) {
			while ($row = mysqli_fetch_array($re)) {
				echo "<tr class='tr-shadow'>
						<td>
						<label class='au-checkbox'>
							";
				echo "<input name='num[]' class='checkitem' type='checkbox' value=$row[userid]>";
				echo "<span class='au-checkmark'></span>
						</label>
					</td>";
				echo "<td>" . $row['lname'] . ", " . $row['fname'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['sectionname'] . "</td>";
			?>
				<td>
					<span <?php
							if ($row['averagescore'] >= 75.00) {
								echo 'class="status--process"';
								$remarks = "PASSED";
							} else {
								if ($row['averagescore'] <= 0) {
									//do nothing
									$remarks = "Undefined";
								} else {
									echo 'class="status--denied"';
									$remarks = "FAILED";
								}
							}
							?>>
						<?php echo $row['averagescore'] . " % " . $remarks; ?>
				</td>
				<td>
					<?php
					$q = "select subjectid, (select subjectname from subjecttbl where subjectid=sectionsubjecttbl.subjectid) AS subjectname from sectionsubjecttbl where sectionid=" . $row['sectionid'];
					$r = mysqli_query($con, $q);
					if (mysqli_num_rows($r)) {
						while ($sub = mysqli_fetch_array($r)) {
							if ($sub['subjectname']) {
								echo $sub['subjectname'];
							}
						}
					}
					?>
				</td>
				<td>
					<img style="width: 30px; height: 30px; border-radius: 100px;" onerror="this.src='images/defaultpic/defaultPIC.png'" src="<?php echo "images/profile_picture/" . $row['image'] . ""; ?>"></td>
				</td>
<?php
				echo "
									<td>
										<div class='table-data-feature'>
											<button onclick='setmodalid(" . $row['userid'] . ")'  class='item' data-toggle='modal' data-placement='top' title='Send Notifications'  type='button' data-target='#sendnotif'>
												<i class='zmdi zmdi-mail-send'></i>
											</button>
											<button type='button' onclick='editstudent(" . $row['userid'] . ")' class='item' data-placement='top' title='Edit' data-toggle='modal' data-target='#add'>
												<i class='zmdi zmdi-edit'></i>
											</button>
												<a href='process2.php?deletestudent=1&id=" . $row['userid'] . "'>
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
		} else {
			echo "<tr><td></td><td></td><td>No data Found</td><td></td><td></td><td></td>
			</tr>";
		}
		// new line code
		// checkboxes all selected teacherstudents.php
		echo '<script>
$("checkitem").change(function(){
	$(".checkall").prop,("checked", $(this).prop("checked"))
});
</script>
';
	} //end if palatandaan==searchstudent		

	if ($palatandaan == "searchteachers") {
		$tosearch = $_GET['tosearch'];
		$sql = "select teachersid,deptid, concat(lname, ', ', fname , ' ', mname) AS name, email, 
	(SELECT departmentname from departmenttbl WHERE deptid=teacherstbl.deptid) AS departmentname, 
	(SELECT count(subjectid) from teachersubjecttbl where teachersid=teacherstbl.teachersid) AS NoOfSubject FROM teacherstbl
	 WHERE lname LIKE '%$tosearch%' OR fname LIKE '%$tosearch%' OR email LIKE '%$tosearch%' order by teacherstbl.lname limit $start_from,$num_of_page";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result)) {
			while ($row = mysqli_fetch_array($result)) {
				echo '<tr class="tr-shadow">';
				echo '<td>
					<label class="au-checkbox">';
				echo "<input onclick='oneCheckBoxes();' name='num[]' class='checkitem' type='checkbox' value=$row[teachersid]>";
				//<input onclick="oneCheckBoxes();" name="num[]" type="checkbox" class="checkitem">
				echo '	<span class="au-checkmark"></span>
					</label>
				</td> ';
				echo "<td style='display:none;' id='SearchteachersdeptId'>" . $row['deptid'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['departmentname'] . "</td>";
				echo "<td>" . $row['NoOfSubject'] . "</td>";
				echo '<td>
					<div class="table-data-feature">
						<button onclick="showassignedsubjects(' . $row['teachersid'] . ')" class="item" data-toggle="modal" data-placement="top" title="Assigned Subject/s" type="button" data-target="#sendnotif">
							<i class="fa fa-book"></i>
						</button>
						<button type="button" onclick="editsteacher(' . $row['teachersid'] . ')" class="item" data-placement="top" title="Edit"  data-toggle="modal" data-target="#add">
							<i class="zmdi zmdi-edit"></i>
						</button>
						<a href=processj.php?deleteteachers=1&id=' . $row['teachersid'] . '">
						<button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
							<i class="zmdi zmdi-delete"></i>
						</button>
					</div>
				</td>
			</tr>
			';
			}
		} else {
			echo "<tr><td></td><td></td><td>No data Found</td><td></td><td></td><td></td>
	</tr>";
		}
		// new line code
		// checkboxes all selected adminteachers.php  
		echo '<script>
$("checkitem").change(function(){
	$(".checkall").prop,("checked", $(this).prop("checked"))
});
</script>
';
	} //end if palatandaan==searchteachers	

	if ($palatandaan == "editstudent") {
		$id = $_GET['forwardedid'];
		$querySaDatabase = "SELECT * FROM userstbl WHERE userid='$id' ";
		$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while ($row = mysqli_fetch_array($executeQuery)) {
			$pambato['hiddenuserid'] = $row['userid'];
			$pambato['email'] = $row['email'];
			$pambato['password'] = $row['password'];
			$pambato['lname'] = $row['lname'];
			$pambato['fname'] = $row['fname'];
			$pambato['mname'] = $row['mname'];
			$pambato['resultimage'] = $row['image'];

			//$pambato['hiddenuseridStudent'] = $row['image']; // result image view

			$sec = $row['sectionid'];
			$qq = "SELECT * FROM sectiontbl WHERE sectionid='$sec' ";
			$ee = mysqli_query($con, $qq);
			while ($rr = mysqli_fetch_array($ee)) {
				$pambato['sectionname'] = $rr['sectionname'];
				$pambato['sectionid'] = $rr['sectionid'];
			}
		}
		echo json_encode($pambato);
	}

} //end if isset palatandaan

if(isset($_POST['editstudentsubmit'])){

    $id=mysqli_escape_string($con,$_POST['hiddenuserid']);
	$email=mysqli_escape_string($con,$_POST['email']);
	$pword=mysqli_escape_string($con,$_POST['password']);
	$fname=mysqli_escape_string($con,$_POST['fname']);
	$lname=mysqli_escape_string($con,$_POST['lname']);
	$mname=mysqli_escape_string($con,$_POST['mname']);
	$sectionid=mysqli_escape_string($con,$_POST['sectionid']);

	
	$CheckEmail="SELECT * FROM userstbl WHERE email='".$email."' LIMIT 1";
	$rowEmail=mysqli_query($con,$CheckEmail);

	if(strlen($pword)<4)
	{
		header("location: teacherstudents.php?password=tooShort");
	}
	else
	{
		//add image
		if(isset($_FILES['image']['name']) && ($_FILES['image']['name']!=""))
			{
				$image = $_FILES['image']['name'];
				$img_temp= $_FILES['image']['tmp_name'];
				$select_img=mysqli_query($con,"SELECT image FROM userstbl WHERE userid='".$id."'");
				$fetch_img=mysqli_fetch_array($select_img);
				if(file_exists("images/profile_picture/$image"))
				{
					header("location: teacherstudents.php?exist=image");	
					
				}
				else
				{	
					$_SESSION['upload_student_new_image']=$image;
					if($_SESSION['upload_student_new_image'])
					{
					unlink("images/profile_picture/".$fetch_img['image']); //delete na luma image
					move_uploaded_file($img_temp,"images/profile_picture/".$image);
					$sql = "UPDATE userstbl SET email='$email' ,password='$pword', fname='$fname',lname='$lname',mname='$mname',image='$image',sectionid='$sectionid' WHERE userid='$id' ";
					mysqli_query($con,$sql);
					 header("location: teacherstudents.php?editstudentresult=success");
					}
				}
			}
		else
			{
			$sql = "UPDATE userstbl SET email='$email' ,password='$pword', fname='$fname',lname='$lname',mname='$mname',sectionid='$sectionid' WHERE userid='$id' ";
				mysqli_query($con,$sql);
				  $_SESSION["lname"]=$lname;
				$_SESSION["fname"]=$fname;
				 header("location: teacherstudents.php?editstudentresult=success");

			}
	}
}

if (isset($_GET['deletestudent'])) {
	$id = $_GET['id'];

	$query = "DELETE FROM userstbl WHERE userid='$id' ";

	$select_img = mysqli_query($con, "SELECT image FROM userstbl WHERE userid='" . $id . "'");
	$fetch_img = mysqli_fetch_array($select_img);
	unlink("images/profile_picture/" . $fetch_img['image']); //delete na luma image

	$check = mysqli_query($con, $query) or die('Query error');
	if ($check) {

		header("location: teacherstudents.php?deletestudentresult=success");
	} else {
		header("location: teacherstudents.php?deletestudentresult=failed");
	}
}
?>

