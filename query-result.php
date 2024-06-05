<?php
$con=mysqli_connect('localhost','root','','rms');
if (!$con) {
  die("Connection failed");
}
else{


	$sql="SELECT*FROM result";
			
	
	$res=mysqli_query($con,$sql);
	$num_rows=mysqli_num_rows($res);
	echo " 
    <table border='1' cellspacing='0'  width='90%'>
        <thead>
	        <tr>
	            <th>#</th>
	            <th>Student Name</th>
	            <th>Roll Id</th>
	            <th>Fathers Name</th>
	            <th>Contact</th>
	            <th>Date-of-Birth</th>
	            <th>Image</th>
	            <th>paper1</th>
	            <th>paper2</th>
	            <th>paper3</th>
	            <th>paper4</th>
	            <th>total_marks</th>
	        </tr>
        </thead>";

	if($num_rows>0)
	{
		while($row=mysqli_fetch_array($res))
		{
			echo'<tbody>';
				echo'<tr>';

					echo'<td>';
					echo $row['id'];
					echo '</td>';

					echo'<td>';
					echo $row['name'];
					echo '</td>';

					echo'<td>';
					echo $row['roll'];
					echo '</td>';

					echo'<td>';
					echo $row['fname'];
					echo '</td>';

					echo'<td>';
					echo $row['contact'];
					echo '</td>';

					echo'<td>';
					echo $row['dob'];
					echo '</td>';

					echo'<td>';
					$imgname = $row['imgpath'];
					if($row['imgpath']){echo "<img src='up/$imgname'>";}
					else echo"No";
					echo '</td>';

					echo'<td>';
					echo $row['paper1'];
					echo '</td>';

					echo'<td>';
					echo $row['paper2'];
					echo '</td>';

					echo'<td>';
					echo $row['paper3'];
					echo '</td>';

					echo'<td>';
					echo $row['paper4'];
					echo '</td>';

					echo'<td>';
					echo $row['total_marks'];
					echo '</td>';
				echo'</tr>';
			echo'</tbody>';
			echo'<br>';
		}
	}
	else
	{
		echo"NO DATA FOUND";
	}

}
?>
