<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];
	$accountbalance = $_POST['accountbalance'];
	// Database connection
	$conn = new mysqli('localhost','root','','intern');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into employee(firstName, lastName, email, password, number, accountbalance) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $email, $password, $number, $accountbalance);
		$execval = $stmt->execute();
		echo $execval;
		
		
        echo "<script> alert('Registration Successful');
            window.location='ViewCust.php';
        </script>";
                    
               
		
		$stmt->close();
		$conn->close();
	}
?>