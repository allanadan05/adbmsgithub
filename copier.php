<html>


<div class="card-footer">
    <p>Lessons:</p><br>
    
	<?php 
	$s="SELECT subjecttbl.subjectname,lessontbl.lessonid,lessontbl.lessontitle,lessontbl.lessondetail,lessontbl.lessonpdf from lessontbl join subjecttbl on lessontbl.subjectid=subjecttbl.subjectid ";
	$r=mysqli_query($con, $s);

	if(mysqli_num_rows($r)){
	while($lesson = mysqli_fetch_array($r))
	{ ?>
		
		<div class="col-md-3">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><a href="<?php  echo $lesson['lessonpdf']; ?>">
							<?php  echo "<td>".$lesson['subjectname']."</td>"; ?></a></h4>
					<p> <?php  echo "<td>".$lesson['lessontitle']."</td>"; ?></p>
					<p class="card-text">
						<a style="color:maroon; font-size: 12px;"
							href="<?php  echo $lesson['lessonpdf']; ?>"><i
								class="fas fa-file-pdf-o"></i> Open </a>
						&nbsp | &nbsp
						<a style="color:maroon; font-size: 12px;"
							href="<?php  echo $lesson['lessonpdf']; ?>" target="_blank"
							type="application/octet-stream"
							download="<?php echo $lesson['lessontitle']; ?>"><i
								class="fas fa-download"></i>Download </a>
					</p>
				</div>
				<div class="card-body">
					<p class="card-text"> <?php  echo "<td>".$lesson['lessondetail']."</td>"; ?>
					</p>
				</div>
			</div>
			</div>

		
		<?php
        }
        }
		?>
	
</div>

</html>

<?php 

if ($palatandaan == "startquiz") {
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


		$querySaDatabase = "INSERT INTO scoretbl(totalscore,totalitems, averagescore, quizid, remarks, userid) values ('$score', '$noofitems', '$avgscore', '$quizid','$remarks', '$userid')";
		$executeQuery = mysqli_query($con, $querySaDatabase);
		if ($executeQuery) {
			echo "<div class='alert alert-success' role='alert'> Quiz has been started :) </div>";
		} else {
			echo "<div class='alert alert-danger' role='alert'> Quiz cannot be initiated :( </div>";
		}

	
}

?>