<?php
	$name = $_POST['name'];
	$company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

	// Database connection
	$conn = new mysqli('localhost','root','','pentest');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into booking(name, company_name, company_address, email, phone_number) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $name, $company_name, $company_address, $email, $phone_number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>