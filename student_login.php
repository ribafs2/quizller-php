<?php

		include 'database/config.php';
        session_start();
		
		$student_roll_number = $_POST['rollNumber'];
        $student_password = $_POST['password'];
    

		$result = mysqli_query($conn, "Select id, test_id, rollno, score, status from students where rollno = '".$student_roll_number."' and password = '".$student_password."' and status = 0 "); 

		if (mysqli_num_rows($result) > 0){      //Creds arezz
			//echo "<script>console.log('OK');</script>";
			while($row = mysqli_fetch_assoc($result)) 
				$info[] = $row;
			
			echo 'CREDS_OK';
		    $_SESSION['student_details'] = json_encode($info); 
			//header("Location: dashboard.php");
		}else{
			//echo "<script>console.log('NOT OK');</script>";
            //echo "<script>console.log('".mysqli_error($conn)."');</script>";
            echo json_encode("STUDENT_RECORD_NOT_FOUND");
		}

	mysqli_close($conn);
?>
