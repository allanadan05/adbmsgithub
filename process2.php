<?php
include('connection.php');
include('teachersession.php');
include('functions.php');


// adminstudents.php multiple delete ajax
@$actionStudents = $_GET['mul_delStudents'];
if ($actionStudents == "ajaxMulitpleDeleteStudents") {
	$id = $_GET['id'];
	$delAjax = "DELETE FROM userstbl WHERE userid=$id";
	$sqlAjaxDel = mysqli_query($con, $delAjax);
}
// adminstudents.php

//----

// adminteachers.php multiple delete ajax
@$actionTeachers = $_GET['mul_delTeachers'];
if ($actionTeachers == "ajaxMulitpleDeleteTeachers") {
	$id = $_GET['id'];
	$delAjax = "DELETE FROM teacherstbl WHERE teachersid=$id";
	$sqlAjaxDel = mysqli_query($con, $delAjax);
}
// adminteachers.php


//pagination 
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$num_of_page = 05; // limit ng page niya sa table
$start_from = ($page - 1) * 06;
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

	if($palatandaan=="changedfilter"){
		$filterid=$_GET['filterid'];
		$subjectidsql="select * from sectionsubjecttbl where subjectid='$filterid'";
		$subjectresult=mysqli_query($con, $subjectidsql);
		if(mysqli_num_rows($subjectresult)){
			while($subjectrow = mysqli_fetch_array($subjectresult)){
		
				$sql="select userstbl.userid, userstbl.sectionid, userstbl.lname, userstbl.fname, userstbl.email, userstbl.image, userstbl.sectionid, 
				(select sectionname from sectiontbl where userstbl.sectionid=sectiontbl.sectionid) AS sectionname,
				 (select sum(averagescore)/count(averagescore) from scoretbl where userstbl.userid=scoretbl.userid) AS averagescore 
				 from userstbl where sectionid=".$subjectrow['sectionid']." order by userstbl.lname";
				$result=mysqli_query($con, $sql);
				if(mysqli_num_rows($result)){
					while($row = mysqli_fetch_array($result))
					{

							echo '<tr class="tr-shadow">';
								echo'<div id="showDel">
									
								</div>';
								echo "<td>".$row['lname'].", ".$row['fname']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['sectionname']."</td>";
								$class="";
								if($row['averagescore']>=75.00){
									echo 'class="status--process"'; 
									$remarks="PASSED";
								}else{
										if($row['averagescore']<=0){
										//do nothing
										$remarks="Undefined";
										}else{
										$class='status--denied';
										$remarks="FAILED";
										}
									}
								echo "<td>
									<span class='$class' >".$row['averagescore'] ." % \n" .$remarks."
								</span></td>";
								
								echo "<td>";
								$q="select subjectid, (select subjectname from subjecttbl where subjectid=sectionsubjecttbl.subjectid) AS subjectname
								 from sectionsubjecttbl where sectionid=" .$row['sectionid'];
								$r=mysqli_query($con, $q);
								if(mysqli_num_rows($r)){
								while($sub = mysqli_fetch_array($r))
								{
									echo $sub['subjectname'] .", ";
								}
								}
						
								echo"</td>";
								/*
								echo'<td>
								
									<img style="width: 30px; height: 30px; border-radius: 100px;"
										onerror="this.src=images/defaultpic/defaultPIC.png"
										src="images/profile_picture/$row[image]">
									</td>';
								*/
?>
                                <td id='actionhide'>
                                <img style="width: 30px; height: 30px; border-radius: 100px;"
                                onerror="this.src='images/defaultpic/defaultPIC.png'"
                                src="<?php echo "images/profile_picture/".$row['image']."";?>">
                                </td>								
<?php
								echo "<td id='actionhide'>
									<div class='table-data-feature'>
										<button onclick='setmodalid(".$row['userid'].")'
											class='item' data-toggle='modal' data-placement='top'
											title='Send Notification' type='button'
											data-target='#sendnotif'>
											<i class='zmdi zmdi-mail-send'></i>
										</button>
									</div>
								</td>";
							echo "</tr>";
							

					} // end of line code  while($row = mysqli_fetch_array($result))
				}

			}
		}else{
			echo "<tr><td></td><td></td><td>No data Found</td><td></td><td></td><td></td>
			</tr>";
		}

	}

	if ($palatandaan == "changeddepartment") {
		$secid = $_GET['secid'];

		$sql = "select deptid, teachersid, concat(lname, ', ', fname , ' ', mname) AS name, email, image, 
		(SELECT departmentname from departmenttbl WHERE deptid=teacherstbl.deptid) AS departmentname, 
		(SELECT count(subjectid) from teachersubjecttbl where teachersid=teacherstbl.teachersid) AS NoOfSubject 
		FROM teacherstbl WHERE deptid=" . $secid . " order by teacherstbl.lname";
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
				?>
            	<td>
                    <img style="width: 30px; height: 30px; border-radius: 100px;"
                	onerror="this.src='images/defaultpic/defaultPIC.png'"
                	src="<?php echo "images/teacher_picture/".$row['image']."";?>">
                    </td>                                                				
				<?php
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
		/*
			$sql="SELECT userstbl.userid, userstbl.lname, userstbl.fname, userstbl.email, sectiontbl.sectionname, 
			(SELECT averagescore FROM scoretbl WHERE userstbl.userid=scoretbl.userid ) AS AverageScore,
			(SELECT remarks FROM scoretbl WHERE userstbl.userid=scoretbl.userid ) AS Remarks 
			from userstbl left join sectiontbl on userstbl.sectionid=sectiontbl.sectionid WHERE userstbl.sectionid='$secid' order by userstbl.lname";
		*/

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
		// checkboxes all selected adminstudents.php  
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
				<td id='actionhide'>
					<img style="width: 30px; height: 30px; border-radius: 100px;" onerror="this.src='images/defaultpic/defaultPIC.png'" src="<?php echo "images/profile_picture/" . $row['image'] . ""; ?>"></td>
				</td>
<?php
				echo "
									<td id='actionhide'>
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
		// checkboxes all selected adminstudents.php  
		echo '<script>
$("checkitem").change(function(){
	$(".checkall").prop,("checked", $(this).prop("checked"))
});
</script>
';
	} //end if palatandaan==searchstudent
		
	
	if ($palatandaan == "searchassignedstudent") {
		$teachersid=$_GET['teachersid'];
		$tosearch = $_GET['tosearch'];
		
		
		$sql="select userstbl.userid, userstbl.sectionid, userstbl.lname, userstbl.fname, userstbl.email, userstbl.image, userstbl.sectionid, 
		(select sectionname from sectiontbl where userstbl.sectionid=sectiontbl.sectionid) AS sectionname, 
		(select sum(averagescore)/count(averagescore) from scoretbl where userstbl.userid=scoretbl.userid) AS averagescore 
		from userstbl where (lname LIKE '%$tosearch%' OR fname LIKE '%$tosearch%' OR email LIKE '%$tosearch%') AND
		 (sectionid=(select sectionid from teachersectiontbl where teachersid='$teachersid')) order by userstbl.lname";
				$result=mysqli_query($con, $sql);
				if(mysqli_num_rows($result)){
					while($row = mysqli_fetch_array($result))
					{

							echo '<tr class="tr-shadow">';
								echo'<div id="showDel">
									
								</div>';
								echo "<td>".$row['lname'].", ".$row['fname']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['sectionname']."</td>";
								$class="";
								if($row['averagescore']>=75.00){
									//echo 'class="status--process"'; 
									$remarks="PASSED";
								}else{
										if($row['averagescore']<=0){
										//do nothing
										$remarks="Undefined";
										}else{
										// $class='status--denied';
										$remarks="FAILED";
										}
									}
								echo "<td>
									<span class='$class' >".$row['averagescore'] ." % \n" .$remarks."
								</span></td>";
								
								echo "<td>";
								$q="select subjectid, (select subjectname from subjecttbl where subjectid=sectionsubjecttbl.subjectid) AS subjectname from sectionsubjecttbl where sectionid=" .$row['sectionid'];
								$r=mysqli_query($con, $q);
								if(mysqli_num_rows($r)){
								while($sub = mysqli_fetch_array($r))
								{
									echo $sub['subjectname'] .", ";
								}
								}
						
								echo"</td>";
								?>
                                <td id='actionhide'>
                                <img style="width: 30px; height: 30px; border-radius: 100px;"
                                onerror="this.src='images/defaultpic/defaultPIC.png'"
                                src="<?php echo "images/profile_picture/".$row['image']."";?>">
                                </td>

								<?php
								echo "<td id='actionhide'>
									<div class='table-data-feature'>
										<button onclick='setmodalid(".$row['userid'].")'
											class='item' data-toggle='modal' data-placement='top'
											title='Send Notification' type='button'
											data-target='#sendnotif'>
											<i class='zmdi zmdi-mail-send'></i>
										</button>
									</div>
								</td>";
							echo "</tr>";
							

					} // end of line code  while($row = mysqli_fetch_array($result))
				}

	} //end if palatandaan==searchassignedstudent	

	if ($palatandaan == "searchteachers") {
		$tosearch = $_GET['tosearch'];
		$sql = "select teachersid,deptid, concat(lname, ', ', fname , ' ', mname) AS name, email, image, 
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
				?>
                <td>
                 <img style="width: 30px; height: 30px; border-radius: 100px;"
                 onerror="this.src='images/defaultpic/defaultPIC.png'"
                 src="<?php echo "images/teacher_picture/".$row['image']."";?>">
                </td>                                                
				<?php
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

	if ($palatandaan == "stat") {
		$id = $_GET['forIpinasa'];
		$sql = "Select status FROM quiztbl where quizid=$id";
		$result = mysqli_query($con, $sql);
		$result2 = mysqli_fetch_array($result);

		if ($result2['status'] == "ACTIVATED") {
			$query = "UPDATE quiztbl SET status='DEACTIVATED' WHERE quizid=$id ";
			if (mysqli_query($con, $query)) {
				//echo "DEACTIVATED!";

				$sql = "select quizid, quizname, (SELECT subjectname from subjecttbl WHERE subjectid=quiztbl.subjectid) AS subject, duration, status from quiztbl order by quizname";
				$result = mysqli_query($con, $sql);
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>
					<td>" . "<a href=adminexam.php?quizid=" . $row['quizid'] . "> " . $row['quizname'] . "</a>" . "</td> 
					<td>" . $row['subject']  . "</td>
					<td>" . $row['duration'] . "</td>";
					$stat = "";
					if ($row['status'] == "ACTIVATED") {
						echo '<td style="color: green;">';
						$stat = "Deactivate";
					} else {
						echo '<td style="color: red;">';
						$stat = "Activate";
					}

					echo $row['status']
						. "</td>
					<td>
						<div class='table-data-feature'>
							<button onclick='stat(" . $row['quizid'] . ")' class='item' data-toggle='modal' data-placement='top' title='$stat' type='button'>
								<i class='zmdi zmdi-power'></i>
							</button>
							<button type='button' onclick='editstudent(" . $row['quizid'] . ")' class='item' data-placement='top' title='Edit'  data-toggle='modal' data-target='#modalbox'>
								<i class='zmdi zmdi-edit'></i>
							</button>
							<a href='process2.php?deletestudent=1&id=" . $row['quizid'] . "?>' >
<button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
<i class='zmdi zmdi-delete'></i>
</button></a>
</div>
</td>
</tr>";
				}
			}
		} else {
			$query = "UPDATE quiztbl SET status='ACTIVATED' WHERE quizid=$id ";
			if (mysqli_query($con, $query)) {
				//echo "ACTIVATED!";
				$sql = "select quizid, quizname, (SELECT subjectname from subjecttbl WHERE subjectid=quiztbl.subjectid) AS subject,
duration, status from quiztbl order by quizname";
				$result = mysqli_query($con, $sql);
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>
<td>" . "<a href=adminexam.php?quizid=" . $row['quizid'] . "> " . $row['quizname'] . "</a>" . "</td>
<td>" . $row['subject'] . "</td>
<td>" . $row['duration'] . "</td>";
					$stat = "";
					if ($row['status'] == "ACTIVATED") {
						echo '<td style="color: green;">';
						$stat = "Deactivate";
					} else {
						echo '
<td style="color: red;">';
						$stat = "Activate";
					}

					echo $row['status']
						. "</td>
<td>
	<div class='table-data-feature'>
		<button onclick='stat(" . $row['quizid'] . ")' class='item' data-toggle='modal' data-placement='top'
			title='$stat' type='button'>
			<i class='zmdi zmdi-power'></i>
		</button>
		<button type='button' onclick='editstudent(" . $row['quizid'] . ")' class='item' data-placement='top'
			title='Edit' data-toggle='modal' data-target='#modalbox'>
			<i class='zmdi zmdi-edit'></i>
		</button>
		<a href='process2.php?deletestudent=1&id=" . $row['quizid'] . "?>' >
			<button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
				<i class='zmdi zmdi-delete'></i>
			</button></a>
	</div>
</td>
</tr>";
				}
			}
		}
	}


	if ($palatandaan == "editquiz") {
		$id = $_GET['forwardedid'];
		$querySaDatabase = "SELECT * FROM quiztbl WHERE quizid='$id' ";
		$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while ($row = mysqli_fetch_array($executeQuery)) {
			$pambato['quizname'] = $row['quizname'];
			$pambato['duration'] = $row['duration'];
			$pambato['subjectid'] = $row['subjectid'];
			$sid = $row['subjectid'];
			$sqls = "SELECT subjectname from subjecttbl where subjectid='$sid' ";
			$col = mysqli_fetch_array(mysqli_query($con, $sqls));
			$pambato['subjectname'] = $col['subjectname'];
		}
		echo json_encode($pambato);
	}



	if ($palatandaan == "savequiznow") {
		$score = $_GET['score'];
		$avgscore = $_GET['avgscore'];
		if ($avgscore >= 75) {
			$remarks = "PASSED";
		} else {
			$remarks = "FAILED";
		}
		$userid = $_GET['userid'];
		$quizid = $_GET['quizid'];
		$noofitems = $_GET['noofitems'];

		$sql="SELECT * from scoretbl where userid='$userid' AND quizid='$quizid' ";
		$result=mysqli_query($con, $sql);
		if(mysqli_num_rows($result)){
			$found=mysqli_fetch_array($result);

			
			
				$sql1 = "UPDATE scoretbl SET totalscore='$score',totalitems='$noofitems', averagescore='$avgscore', quizid='$quizid', remarks='$remarks', userid='$userid' where scoreid=".$found['scoreid'];
				$query = mysqli_query($con, $sql1);
				if ($query) {
					echo "<div id='msg' class='alert alert-success' role='alert'> Quiz results has been saved. :) </div>";
				}else{
					echo "<div id='msg' class='alert alert-danger' role='alert'> Quiz results cannot be saved :( </div>";
				}
			
		}else{

			$querySaDatabase = "INSERT INTO scoretbl(totalscore,totalitems, averagescore, quizid, remarks, userid) values ('$score', '$noofitems', '$avgscore', '$quizid','$remarks', '$userid')";
			$executeQuery = mysqli_query($con, $querySaDatabase);
			if ($executeQuery) {
				echo "<div id='msg' class='alert alert-success' role='alert'>1</div>";
			} else {
				echo "<div  id='msg' class='alert alert-danger' role='alert'>0</div>";
			}

		}
	}

	if ($palatandaan == "savequizforbackup") {
		$score = $_GET['score'];
		$avgscore = $_GET['avgscore'];
		if ($avgscore >= 75) {
			$remarks = "PASSED";
		} else {
			$remarks = "FAILED";
		}
		$userid = $_GET['userid'];
		$quizid = $_GET['quizid'];
		$noofitems = $_GET['noofitems'];

		$sql="SELECT * from scoretbl where userid='$userid' AND quizid='$quizid' ";
		$result=mysqli_query($con, $sql);
		if(mysqli_num_rows($result)){
			$found=mysqli_fetch_array($result);

			
			
				$sql1 = "UPDATE scoretbl SET totalscore='$score',totalitems='$noofitems', averagescore='$avgscore', quizid='$quizid', remarks='$remarks', userid='$userid' where scoreid=".$found['scoreid'];
				$query = mysqli_query($con, $sql1);
				if ($query) {
					echo "<div id='res' class='alert alert-success' role='alert'> Quiz results has been saved. :) </div>";
				}else{
					echo "<div id='res' class='alert alert-danger' role='alert'> Quiz results cannot be saved :( </div>";
				}
			
		}else{

			$querySaDatabase = "INSERT INTO scoretbl(totalscore,totalitems, averagescore, quizid, remarks, userid) values ('$score', '$noofitems', '$avgscore', '$quizid','$remarks', '$userid')";
			$executeQuery = mysqli_query($con, $querySaDatabase);
			if ($executeQuery) {
				echo "<div id='res' class='alert alert-success' role='alert'>Quiz has been initiated</div>";
			} else {
				echo "<div  id='res' class='alert alert-danger' role='alert'>Quiz cannot be initiated</div>";
			}

		}
	}	

} //end if isset palatandaan

if (isset($_POST['addsection'])) {
	//echo $_POST['addsection'] ." POST addsection <br>";

	$nsn = $_POST['newsectionname'];
	//echo $nsn ."POST newsectionname <br> ";
	$query = "INSERT INTO sectiontbl(sectionname) VALUES ('$nsn')";
	//echo $query ."query <br>";
	$check = mysqli_query($con, $query) or die('Query error');

	if ($check) {
		header("location: adminsections.php?addsecresult=success&secname=" . $nsn);
	} else {
		header("location: adminsections.php?addsecresult=failed&secname=" . $nsn);
	}
}

if (isset($_POST['adddept'])) {
	//echo $_POST['addsection'] ." POST addsection <br>";

	$ndn = $_POST['newdeptname'];
	//echo $nsn ."POST newsectionname <br> ";
	$query = "INSERT INTO departmenttbl (departmentname) VALUES ('$ndn')";
	//echo $query ."query <br>";
	$check = mysqli_query($con, $query) or die('Query error');

	if ($check) {
		header("location: adminsections.php?adddeptresult=success&secname=" . $nsn);
	} else {
		header("location: adminsections.php?adddeptresult=failed&secname=" . $nsn);
	}
}


if (isset($_POST['editsecsubmit'])) {

	$nsn = $_POST['newsectionname'];
	$id = $_POST['hiddenname'];
	$query = "UPDATE sectiontbl SET sectionname='$nsn' WHERE sectionid='$id' ";
	$check = mysqli_query($con, $query) or die('Query error');
	if ($check) {
		header("location: adminsections.php?editsecresult=success&secname=" . $nsn);
	} else {
		header("location: adminsections.php?editsecresult=failed&secname=" . $nsn);
	}
}

if (isset($_POST['editdeptsubmit'])) {

	$ndn = $_POST['newdeptname'];
	$id = $_POST['hiddendeptname'];
	$query = "UPDATE departmenttbl SET departmentname='$ndn' WHERE deptid='$id' ";
	$check = mysqli_query($con, $query) or die('Query error');
	if ($check) {
		header("location: adminsections.php?editdeptresult=success&deptname=" . $ndn);
	} else {
		header("location: adminsections.php?editdeptresult=failed&deptname=" . $ndn);
	}
}

if (isset($_POST['updatequiz'])) {

	$id = $_POST['hiddenquizid'];
	$duration = $_POST['dur'];
	$quizname = $_POST['qtitle'];
	$chosensubject = $_POST['chosensubject'];
	$query = "UPDATE quiztbl SET quizname='$quizname', subjectid='$chosensubject', duration='$duration' WHERE quizid='$id'
";
	$check = mysqli_query($con, $query) or die('Query error');
	if ($check) {
		if($_SESSION['access']=="user"){
		header("Location: index.php?login=access"); //user cant access this
		}else if($_SESSION['access']=="teacher"){
			header("location: teacherquizzes.php?editquizresult=success");
		}else if($_SESSION['access']=="admin"){
			header("location: adminquizzes.php?editquizresult=success");
		}else{
		header("Location: index.php?login=access");
		}
		
	} else {
		if($_SESSION['access']=="user"){
		header("Location: index.php?login=access"); //user cant access this
		}else if($_SESSION['access']=="teacher"){
			header("location: teacherquizzes.php?editquizresult=failed");
		}else if($_SESSION['access']=="admin"){
			header("location: adminquizzes.php?editquizresult=failed");
		}else{
		header("Location: index.php?login=access");
		}
		
	}
}

if (isset($_GET['deletesection'])) {
	$id = $_GET['id'];

	$query = "DELETE FROM sectiontbl WHERE sectionid='$id' ";
	$check = mysqli_query($con, $query) or die('Query error');
	if ($check) {
		header("location: adminsections.php?deletesecresult=success");
	} else {
		header("location: adminsubjects.php?deletesecresult=failed");
	}
}

if (isset($_GET['deletedept'])) {
	$id = $_GET['id'];

	$query = "DELETE FROM departmenttbl WHERE deptid='$id' ";
	$check = mysqli_query($con, $query) or die('Query error');
	if ($check) {
		header("location: adminsections.php?deletedeptresult=success");
	} else {
		header("location: adminsubjects.php?deletedeptresult=failed");
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

		header("location: adminstudents.php?deletestudentresult=success");
	} else {
		header("location: adminstudents.php?deletestudentresult=failed");
	}
}

if (isset($_GET['deletequiz'])) {
	$id = $_GET['id'];

	$query = "DELETE FROM quiztbl WHERE quizid='$id' ";
	$check = mysqli_query($con, $query) or die('Query error');
	if ($check) {
		if($_SESSION['access']=="user"){
		header("Location: index.php?login=access"); //user cant access this
		}else if($_SESSION['access']=="teacher"){
			header("location: teacherquizzes.php?deletequizresult=success");
		}else if($_SESSION['access']=="admin"){
			header("location: adminquizzes.php?deletequizresult=success");
		}else{
		header("Location: index.php?login=access");
		}
		
	} else {
		if($_SESSION['access']=="user"){
		header("Location: index.php?login=access"); //user cant access this
		}else if($_SESSION['access']=="teacher"){
			header("location: teacherquizzes.php?deletequizresult=failed");
		}else if($_SESSION['access']=="admin"){
			header("location: adminquizzes.php?deletequizresult=failed");
		}else{
		header("Location: index.php?login=access");
		}
		
	}
}

if (isset($_POST['submitquiz'])) {
	$chosenquiztitle = $_POST['chosenquiztitle'];
	$question = $_POST['question'];
	$optiona = $_POST['optiona'];
	$optionb = $_POST['optionb'];
	$optionc = $_POST['optionc'];
	$optiond = $_POST['optiond'];
	$answer = $_POST['answer'];


	$sql = "INSERT INTO questiontbl(quizid, question) VALUES ('$chosenquiztitle', '$question')";
	if (mysqli_query($con, $sql)) {
		$questionid = mysqli_insert_id($con);
		$sql = "INSERT INTO optionstbl(optiona,optionb, optionc, optiond) VALUES ('$optiona','$optionb', '$optionc',
'$optiond')";
		if (mysqli_query($con, $sql)) {
			$optionid = mysqli_insert_id($con);
			$sql = "INSERT INTO answertbl(questionid,optionid, answer) VALUES ('$questionid','$optionid', '$answer')";
			if (mysqli_query($con, $sql)) {
				if($_SESSION['access']=="user"){
				header("Location: index.php?login=access"); //user cant access this
				}else if($_SESSION['access']=="teacher"){
					header("location: teacherquizzes.php?addquestionresult=success");
				}else if($_SESSION['access']=="admin"){
					header("location: adminquizzes.php?addquestionresult=success");
				}else{
				header("Location: index.php?login=access");
				}
				
			}
		}
	} else {
		if($_SESSION['access']=="user"){
		header("Location: index.php?login=access"); //user cant access this
		}else if($_SESSION['access']=="teacher"){
			header("location: teacherquizzes.php?addquestionresult=failed");
		}else if($_SESSION['access']=="admin"){
			header("location: adminquizzes.php?addquestionresult=failed");
		}else{
		header("Location: index.php?login=access");
		}
		
	}
}

if (isset($_POST['submitnewquiz'])) {
	$chosensubject = $_POST['chosensubject'];
	$qtitle = $_POST['qtitle'];
	$dur = $_POST['dur'];


	$sql = "INSERT INTO quiztbl(quizname, subjectid, duration, status) VALUES ('$qtitle','$chosensubject', '$dur',
'DEACTIVATED')";
	if (mysqli_query($con, $sql)) {
			if($_SESSION['access']=="teacher"){
				header("location: teacherquizzes.php?addquizresult=success");
			}else if($_SESSION['access']=="admin"){
				header("location: adminquizzes.php?addquizresult=success");
			}else{
			header("Location: index.php?login=access");
			// header("location: teacherquizzes.php?addquizresult=success");
			}
		
	} else {

		if($_SESSION['access']=="teacher"){
			header("location: teacherquizzes.php?addquizresult=failed");
		}else if($_SESSION['access']=="admin"){
			header("location: adminquizzes.php?addquizresult=failed");
		}else{
		header("Location: index.php?login=access");
		}
		
	}
}



?>