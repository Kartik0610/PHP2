<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM products WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['name'];
$price = $resultData['price'];
$description = $resultData['description'];
$image = $resultData['image'];
?>

<html>
<head>	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
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
        form {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Data</h2>
        <p>
            <a href="index.php" class="btn btn-primary">Home</a>
        </p>
        <form name="edit" method="post" action="editAction.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" value="<?php echo $price; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" value="<?php echo $description; ?>" required>
            </div>
			<div class="form-group">
                <label for="description">Image</label>
				<input type="file" name="image" accept="image/*">
                
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value=<?php echo $id; ?>>
                <input type="submit" name="update" value="Update" class="btn btn-success">
            </div>
        </form>
    </div>
</body>
</html>
