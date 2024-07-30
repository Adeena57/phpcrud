<?php include 'conn.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To display form data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .table-container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Product Information</h2>
            </div>
            <div class="col-md-6 text-end">
                <button type="button" class="btn btn-success me-2"><a  href="form.php" style="color:white; text-decoration:none;">Add New</a></button>
                <button type="button" class="btn btn-success"><a  href="logout.php" style="color:white; text-decoration:none;">Log Out</a></button>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Product name</th>
                    <th>Product detail</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM form";
                $result = mysqli_query($con, $query);
                $data = mysqli_num_rows($result);
                if ($data) {
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row['pname']; ?></td>
                            <td><?php echo $row['pdetail']; ?></td>
                            <td><a href="formupdate.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a></td>
                            <td><a href="formdelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    <?php }
                } else {
                    echo "<tr><td colspan='6'>Data not displayed</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>