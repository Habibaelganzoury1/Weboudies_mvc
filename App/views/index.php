<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
    <style>
        body {
            
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        .error-message {
            color: #ff0000;
            font-size: 12px;
            margin-top: 5px;
        }

        #previewImage {
            max-width: 100%;
            margin-top: 10px;
            display: none;
        }

        .submit-button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="alert alert-secondary" role="alert">
        <h4 class="text-center">Upload Image</h4>
    </div>
    <div class="container col-12 m-5">
        <div class="col-6 m-auto">
            <?php
            if(isset($_POST['btn_img'])) {
                $con = mysqli_connect("localhost","root","","oudies");

                $filename = $_FILES["choosefile"]["name"];
                $tempfile = $_FILES["choosefile"]["tmp_name"];
                $folder = "img/".$filename;
                $sql = "INSERT INTO `products`(`img`) VALUES ('$filename')";

                if($filename == "") {
                    echo "
                        <div class='alert alert-danger' role='alert'>
                            <h4 class='text-center'>Blank not Allowed</h4>
                        </div>
                    ";
                } else {
                    $result = mysqli_query($con, $sql);
                    move_uploaded_file($tempfile, $folder);
                    echo "
                        <div class='alert alert-success' role='alert'>
                            <h4 class='text-center'>Image uploaded</h4>
                        </div>
                    ";
                }
            }
            ?>

            <form action="index.php" method="post" class="form-control" enctype="multipart/form-data">
                <input type="file" class="form-control" name="choosefile"  id="">
                <div class="col-6 m-auto ">
                    <button type="submit" name="btn_img" class="btn btn-outline-success m-4">
                        Submit
                    </button>
                </div>
            </form>

            <table class="table text-center">
                <tr>
                    <th>id</th>
                    <th>image</th>
                    <th>button</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost","root","","oudies");
                $sql2 = "SELECT * FROM `products` WHERE 1";
                $result2 = mysqli_query($conn, $sql2);
                while($fetch = mysqli_fetch_assoc($result2)) {
                ?>
                    <tr>
                        <td><?php echo $fetch['id'] ?></td>
                        <td><img src="<?php echo $fetch['img'] ?>" width=100px alt=""></td>
                        <td><a href="delete.php?id=<?php echo $fetch['id'] ?>" class="btn btn-outline-danger">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
