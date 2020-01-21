<?php
	  $servername = "localhost";
	  $username = "root";
	  $password = "";
	  $db = "webtech";
	  $conn = new mysqli($servername, $username, $password,$db);

	  if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
	  }
	  echo "Connected successfully";

	  $sql = "CREATE TABLE games (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		gameName VARCHAR(30) NOT NULL,
		shortStocks INT(1) NOT NULL,
		margin INT(1),
		reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)";
		
		if ($conn->query($sql) === TRUE) {
			echo "Table MyGuests created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}
		$conn->close();		
	
?> 