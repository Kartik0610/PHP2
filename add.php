<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        form {
            margin-top: 20px;
        }
        .submit-btn {
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
    <div class="container">
        <h2>Add Data</h2>
        <p>
            <a href="index.php" class="btn btn-primary">Home</a>
        </p>

        <form action="addAction.php" method="post" name="add" enctype="multipart/form-data">
            <table width="25%" border="0">
                <tr> 
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr> 
                    <td>Price</td>
                    <td><input type="text" name="price"></td>
                </tr>
                <tr> 
                    <td>Description</td>
                    <td><input type="text" name="description"></td>
                </tr>
                <tr> 
                    <td>Image</td>
                    <td><input type="file" name="image" accept="image/*"></td>
                </tr>
                <tr> 
                    <td></td>
                    <td>
                        <button type="submit" name="submit" class="btn btn-success submit-btn">
                            <i class="bi bi-plus"></i> Add Product
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
