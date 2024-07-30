<?php include 'conn.php'; ?>

<?php
if(isset($_POST['submit'])){
    $pname = $_POST['pname'];
    $pdetail = $_POST['pdetail'];
    $query = "INSERT INTO form (pname, pdetail) VALUES ('$pname', '$pdetail')";
    $result = mysqli_query($con, $query);

    if($result){
        echo '<script>alert("Data added successfully"); window.location.href="formshow.php";</script>';
    } else {
        echo '<script>alert("Try again.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center mb-4">Add data</h2>
        <form action="" method="post">
            <div class="row mb-3">
                <label for="pname" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pname" name="pname">
                </div>
            </div>
            <div class="row mb-3">
                <label for="pdetail" class="col-sm-2 col-form-label">Product Detail</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="pdetail" name="pdetail" rows="3"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="submit">Add</button>
                <a href="formshow.php" class="btn btn-success">Show</a>
            </div>
        </form>
    </div>
</body>
</html>