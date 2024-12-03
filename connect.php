<?php
	$Name = $_POST['Name'];
	$Mes =$_POST['Mes'];
	$Email = $_POST['Email'];
	$Subj = $_POST['Subj'];
	$Phone = $_POST['Phone'];

	// Database connection
	$conn = new mysqli('localhost','root','','eric');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(Name, Email, Phone, Subj, Mes) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssis", $Name, $Mes, $Email,  $Phone, $Subj);
		$execval = $stmt->execute();    
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>