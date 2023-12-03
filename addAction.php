<html>
<head>
    <title>Add Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        h2 {
            color: #007bff;
        }
        a {
            color: #007bff;
        }
        .success-message {
            color: green;
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <?php
    // Include the database connection file
    require_once("dbConnection.php");

    if (isset($_POST['submit'])) {
        $targetDirectory = "uploads/";
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }
        // Escape special characters in a string for use in an SQL statement
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];	
        $image = $_FILES['image']['name'];
            
        // Check for empty fields
        if (empty($name) || empty($price) || empty($description) || empty($image)) {
            echo "<font color='red'>All fields are required.</font><br/>";
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else {
            $targetFilePath = $targetDirectory . basename($image);
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');


            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    // Image uploaded successfully; save the file path in the database
                    $result = mysqli_query($con, "INSERT into products SET `name` = '$name', `price` = '$price', `description` = '$description', `image` = '$targetFilePath'");

                } else {
                    echo "Error uploading image.";
                }
            } else {
                echo "Invalid file format. Please upload an image file.";
            }
            echo "<p><font color='green'>Data updated successfully!</p>";
		    echo "<a href='index.php'>View Result</a>";
        }
    }
    ?>
</body>
</html>
