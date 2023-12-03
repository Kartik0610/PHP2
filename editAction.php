<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	$targetDirectory = "uploads/";
	if (!file_exists($targetDirectory)) {
		mkdir($targetDirectory, 0777, true);
	}
	// Escape special characters in a string for use in an SQL statement
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];	
	$image = $_FILES['image']['name'];
	
	// Check for empty fields
	if (empty($name) || empty($price) || empty($description) || empty($image)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($price)) {
			echo "<font color='red'>price field is empty.</font><br/>";
		}
		
		if (empty($description)) {
			echo "<font color='red'>description field is empty.</font><br/>";
		}
		if (empty($image)) {
			echo "<font color='red'>image field is empty.</font><br/>";
		}
	} else {
		
		$targetFilePath = $targetDirectory . basename($image);
		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
		$allowedTypes = array('jpg', 'png', 'jpeg', 'gif');


		if (in_array($fileType, $allowedTypes)) {
			if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
				// Image uploaded successfully; save the file path in the database
				$result = mysqli_query($con, "UPDATE products SET `name` = '$name', `price` = '$price', `description` = '$description', `image` = '$targetFilePath' WHERE `id` = $id");

			} else {
				echo "Error uploading image.";
			}
		} else {
			echo "Invalid file format. Please upload an image file.";
		}



		// $imgContent = addslashes(file_get_contents($image));
		// Update the database table
		// $result = mysqli_query($con, "UPDATE products SET `name` = '$name', `price` = '$price', `description` = '$description', `image` = '$imgContent' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
