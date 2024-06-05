<!DOCTYPE html>
<html>
<head>
	<title>update result</title>
<link rel="stylesheet" type="text/css" href="css/updt-res-form.css">
</head>
<body style="color: #00A9C6">
	<div>
		 <form action="#" method="post" ><br>
            <h2> UPDATE FORM</h2>
            <br><br>
            <font color="#00A9C6">
            	Enter Roll Number to UPDATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </font>
            <input class="input-box" type="VALUE" name="rollno" placeholder="ROLL NUMBER"><br>
            <button class="button" type="submit" name="Submit" style="vertical-align:middle; margin-top: 10px">
                <span>Submit </span>
            </button>
        </form>
	</div>
</body>
</html>
<?php

if (isset($_POST['update'])) {
	$con=mysqli_connect('localhost','root','','rms');
    if (!$con) {
       die("Connection failed");
    }
	$sql="SELECT * FROM result";
	$res=mysqli_query($con,$sql);

	$row = mysqli_fetch_array($res);
	//student details
	$uname = $_POST['cng-name'];
	$uroll = $_POST['cng-roll'];
	$ufname = $_POST['cng-fname'];
	$udob = $_POST['cng-dob'];
	$ucont = $_POST['cng-cont'];
	//image
	$uimg_name = $_FILES['f1']['name'];
	//marks details
	$upaper1 = $_POST['cng-paper1'];
	$upaper2 = $_POST['cng-paper2'];
	$upaper3 = $_POST['cng-paper3'];
	$upaper4 = $_POST['cng-paper4'];
	$utotal_marks = $_POST['cng-total_marks'];



	$sqli = "UPDATE `result` SET `name` = '$uname', `roll`= '$uroll', `fname`='$ufname', `dob`='$udob', `contact`='$ucont', `imgpath`='$uimg_name', `paper1`='$upaper1', `paper2`='$upaper2', `paper3`='$upaper3', `paper4`='$upaper4', `total_marks`='$utotal_marks' WHERE roll = $uroll";

	$chk = mysqli_query($con , $sqli);
	if($chk)
		echo "<script>alert(DATA UPDATED)</script>";
	else
		echo "<script>alert(DATA UPDATE FAILED)</script>";
		
	//  $sql = "INSERT INTO `user_image`(`img_path`) VALUES(')";
	$move = move_uploaded_file($_FILES['f1']['tmp_name'], 'up/'.$uname);
	if ($move){
		echo "<script>alert(file uploaded)</script>";
	}
	else
		echo "<script>alert(failed)</script>";
}
if (isset($_POST['Submit'])) {
    // echo"hello hello mic testing 123 chk chk";

    $con=mysqli_connect('localhost','root','','rms');
    if (!$con) {
       die("Connection failed");
    }
    else{
    	$roll =$_POST['rollno'];

    	$sql = "SELECT * FROM result";
    	$res = mysqli_query($con,$sql);
		$num_rows=mysqli_num_rows($res);

		if($num_rows>0){
			while($row=mysqli_fetch_array($res)){
				if($roll == $row['roll']){

	$sql="SELECT * FROM result";

	$res=mysqli_query($con,$sql);
	$num_rows=mysqli_num_rows($res);

	while($row=mysqli_fetch_array($res))
	{
		if($roll == $row['roll']){
			$name = $row['name'];
			$rollno = $row['roll'];
			$faname = $row['fname'];
			$contact = $row['contact'];
			$dob = $row['dob'];
			if($row['imgpath'])	$imgname = $row['imgpath'];
			else $imgname="no";
			$paper1 = $row['paper1'];
			$paper2 = $row['paper2'];
			$paper3 = $row['paper3'];
			$paper4 = $row['paper4'];
			$total_marks = $row['total_marks'];
		}
	}
echo '
	<hr>
	<div >
		<br>
		<form action="#" method="POST" enctype="multipart/form-data">
		<table>		
			<th><br>
				<tr> STUDENTS DETAILS:--</tr>
				<br>
			</th>
			<th>
				<tr>NAME</tr>&nbsp;&nbsp;&nbsp;&nbsp;
				<tr><input class="input-box" type="text" name="cng-name" value='; echo $name; echo'>
			</th>
			<br><br>
			<th>
				<tr>ROLL</tr>&nbsp;&nbsp;&nbsp;&nbsp;
				<tr><input class="input-box" type="text" name="cng-roll" value='; echo $rollno; echo'>
			</th>
			<br><br>
			<th>
				<tr>FATHER\'s NAME</tr>&nbsp;&nbsp;&nbsp;&nbsp;
				<tr><input class="input-box"  type="text" name="cng-fname" value='; echo $faname; echo'>
			</th>
			<br><br>
			<th>
				<tr>CONTACT</tr>&nbsp;&nbsp;&nbsp;&nbsp;
				<tr><input class="input-box"  type="number" name="cng-cont" value='; echo $contact; echo'>
			</th>
			<br><br>
			<th>
				<tr>DATE OF BIRTH</tr>&nbsp;&nbsp;&nbsp;&nbsp;
				<tr><input class="input-box"  type="date" name="cng-dob" value='; echo $dob; echo'>
			</th>
			<br><br>
			<th>
				<tr>IMAGE</tr>&nbsp;&nbsp;&nbsp;&nbsp;
				';
				if(!$imgname) echo "NO IMAGE FOUND IN DATA BASE!!";
				else echo "<img src='up/$imgname'>"; 
				echo'
				
				
			</th>
			<br><br>
			<th>
			<tr align="right">Photo</tr>&nbsp;&nbsp;&nbsp;&nbsp;
			<tr><input type="file" name="f1"></tr>
		</tr>
		</table>
		<table>
			<th><br>
				<tr> MARKS DETAILS:--</tr>
				<br>
			</th>
			<br>
			<th>
				<tr>paper1</tr>&nbsp;&nbsp;&nbsp;&nbsp;
				<tr><input class="input-box" type="text" name="cng-paper1" value='; echo $paper1; echo'>
			</th>
			<br><br>
			<th>
				<tr>paper2</tr>&nbsp;&nbsp;&nbsp;&nbsp;
				<tr><input class="input-box"  type="text" name="cng-paper2" value='; echo $paper2; echo'>
			</th>
			<br><br>
			<th>
				<tr>paper3</tr>&nbsp;&nbsp;&nbsp;&nbsp;
				<tr><input class="input-box"  type="text" name="cng-paper3" value='; echo $paper3; echo'>
			</th>
			<br><br>
			<th>
				<tr>paper4</tr>&nbsp;&nbsp;&nbsp;&nbsp;
				<tr><input class="input-box" type="text" name="cng-paper4" value='; echo $paper4; echo'>
			</th>
			<br><br>
			<th>
				<tr>total_marks</tr>&nbsp;&nbsp;&nbsp;&nbsp;
				<tr><input class="input-box" type="text" name="cng-total_marks" value='; echo $total_marks; echo'>
			</th>
		</table>
		<div>
			<button class="button" type="submit" name="update" value="update" style="vertical-align:middle; margin-top: 10px">
                <span>UPDATE</span>
            </button>
		</div>
		</form>
	</div>
';

					$msg = "";
					break;
				}
				else{
					$msg= "ROLL NUMBER NOT FOUND!!";
				}
			}
			if($roll != $row['roll']) echo "$msg";
		}
    }
}
?>