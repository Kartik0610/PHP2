<?php
// Include the database connection file
require_once("dbConnection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legend Product Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <style>
    body {
        background-color: #f8f9fa;
        padding: 20px;
    }
    .container {
        margin-top: 30px;
        margin-bottom: 30px;
    }
    .title-container {
        background-color: #343a40;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    h2 {
        color: #fff;
        margin: 10px 0;
    }
    .add-product-btn {
        background-color: #28a745;
        color: #fff;
        border: none;
        transition: background-color 0.3s ease;
        margin-bottom: 10px;
    }
    .add-product-btn:hover {
        background-color: #218838;
    }
    table {
        background-color: #ffffff;
    }
    th, td {
        text-align: center;
        padding: 10px;
    }
    img{
        /* Increase the width of the description column */
        width: 70px;
		height: auto;
    }
    
    .action-icons{
		display: flex;
		flex-flow: row;
		justify-content: center;
		column-gap: 20px
	}
	.edit-btn{
		padding-top: 10px;
		padding-bottom: 10px;
		padding-left: 15px;
		padding-right: 15px
	}
	.del-btn{
		padding-top: 10px;
		padding-bottom: 10px;
	}
  </style>
	


</head>

<body>
    <div class="container">
        <div class="title-container">
            <h2>Legend Product Store</h2>
            <a href="add.php" class="btn btn-primary add-product-btn">
                <i class="fas fa-plus"></i> Add Product
            </a>
        </div>
        
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
				    <th>Sno</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
					<th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
				$i=1;
                $query = "SELECT * FROM `products`";
                $result = mysqli_query($con, $query);

                while ($res = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
					echo "<td>".$i."</td>";
                    echo "<td>".$res['name']."</td>";
                    echo "<td>$".$res['price']."</td>";
                    echo "<td>".$res['description']."</td>";	
					echo "<td><img src=./" . $res['image'] . " /></td>";
                    echo "<td class='action-icons'>
                            <a href=\"edit.php?id=$res[id]\" class=\"btn btn-warning btn-sm edit-btn\">
                                <i class='fas fa-edit'></i> Edit
                            </a>
                            <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class=\"btn btn-danger btn-sm del-btn\">
                                <i class='fas fa-trash'></i> Delete
                            </a>
                          </td>";
						  $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
