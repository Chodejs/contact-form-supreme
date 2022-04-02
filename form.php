
	<?php

	$user_email = htmlentities($_POST['user-email']);
	$user_first_name = htmlentities($_POST['user-first-name']);
	$user_last_name = htmlentities($_POST['user-last-name']);
	$user_phone = htmlentities($_POST['user-phone']);
	$user_text = htmlentities($_POST['user-text']);
	$user_job_type = [
		"job1" => $_POST['user-job-type1'],
		"job2" => $_POST['user-job-type2'],
		"job3" => $_POST['user-job-type3']

		
	];

	$errors = [];

	 function check_data($data, $required, $length, $data_name){

		$errors = [];
		$passed = false;

		if($required === "true" || $required === true){
			if(empty($data)){
				$error = "$data_name is Required";
				array_push($errors, $error);
				echo "<h3>$error</h3><br><a href='contact_us'>Go Back</a>";
				exit;
			} 
		} 
		if(strlen($data) > $length) {
			$error = "$data_name is Too Long | Max Chars: $length";
			array_push($errors, $error);
			echo "<h3>$error</h3>";
			exit;
		}
	 }

	if(isset($_POST['user-email'])){


		check_data($user_email, true, 30, "Email Address");
		check_data($user_first_name, true, 20, "First Name");
		check_data($user_last_name, false, 30, "Last Name");
		check_data($user_phone, false, 10, "Phone Number");
		check_data($user_text, true, 300, "Job Description / Other Info");

		
		$headers = array('From' => 'webmaster@example.com',
		'Reply-To' => 'webmaster@example.com');

		if($user_job_type['job1'] !== "on" && $user_job_type['job2'] !== "on" && $user_job_type['job3'] !== "on"){
			$error = "Job Type is Required";
			array_push($errors, $error);
			echo "<h3>$error</h3>";
		} else {
			$email = "
			<p>From: $user_first_name $user_last_name</p>
			<p>Email: $user_email</p>
			<p>Phone: $user_phone</p>
			<p>Job Type 1: $User_job_type[job1],<br> Job Type 2: $user_job_type[job2],<br> Job Type 3: $user_job_type[job3]</p>
			<p>More Info: $user_text</p>
		";
	   echo print_r($email);

	   // mail($user_email, "Contact Form Submission", $email, $headers);
		}
	}

	?>
		<form action="" method="post">
			<label for="user-email">
				<input type="email" name="user-email" id="user-email" placeholder="Email - Required">
			</label>
			<label for="user-first-name">
				<input type="text" name="user-first-name" id="user-first-name" placeholder="First Name - Required">
			</label>
			<label for="user-last-name">
				<input type="text" name="user-last-name" id="user-last-name" placeholder="Last Name (Optional)">
			</label>
			<label for="user-phone">
				<input type="text" name="user-phone" id="user-phone" placeholder="Phone Number (Optional)">
			</label>
			<label for="user-job-type">
				Job 1
				<input type="radio" name="user-job-type1" id="user-job1">
				Job 2
				<input type="radio" name="user-job-type2" id="user-job2">
				Job 3
				<input type="radio" name="user-job-type3" id="user-job3">
			</label>
			<label for="user-description">
				<textarea name="user-text" id="user-text" placeholder="Job Description or Other Information - Required" cols="40" rows="10"></textarea>
			</label>
			<button type="submit">Submit</button>
		</form>
	</main>
	</div>
