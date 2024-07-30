<?php include 'conn.php'; $id=$_GET['id'];
$select="SELECT * FROM form WHERE id='$id'";
$result = mysqli_query($con, $select);
$row = mysqli_fetch_array($result);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            margin-top: 50px; /* Added top padding */
        }
    </style>
</head>
<body>
<!-- <h2 style="text-align:center;">Update Product details</h2> -->
<div class="form-container">
<h2 style="text-align:center;">Update Product details</h2>
        <form action="" method="post">
            <div class="row mb-3">
                <label for="pname" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $row['pname'];?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="pdetail" class="col-sm-2 col-form-label">Product Detail</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pdetail" name="pdetail" value="<?php echo $row['pdetail'];?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php 
     if(isset($_POST['update'])){
        $pname = $_POST['pname'];
        $pdetail = $_POST['pdetail'];
        $update = "UPDATE form SET  pname='$pname', pdetail='$pdetail' WHERE id='$id'";
        $result = mysqli_query($con, $update);

        if($result){
            ?>
           echo '<script>alert("Data updated successfully"); window.location.href="formshow.php";</script>';
            <?php 
        }
        else{
            ?>
            echo '<script>alert("Data not updated");</script>';
            <?php
        }
    }
    ?>