<?php include 'conn.php'; ?>
<?php
$nerror="";
$eerror="";
$passerror="";

if(isset($_POST['submit'])){
    // $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($con, "SELECT * FROM user WHERE email= '$email'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location: formshow.php");


        }
        else{
            echo 
            "<script> alert('Enetr correct password'); </script>";
        }
    }
    else{
        echo 
        "<script> alert('User not registered'); </script>";
    }
   

//################################Form Validation#############################

    if(empty($name)){
        $nerror="Plesse enter name";
    }else{
        $name = trim($name);
        // $name = htmlspecialchars($name);
        if(!preg_match("/^[a-zA-Z ]+$/",$name)){
            $nerror=" <br />Name should contain characters and spaces";
        }
    }
  
function checkemail($str) {
    // Check if email is empty
    if (empty($str)) {
        return "empty";
    }
    // Validate email format
    return (preg_match("/^[a-z0-9\+_\-]+(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? "valid" : "invalid";
}

$email = "$email"; // Change this to test different cases

$emailCheck = checkemail($email);

if ($emailCheck == "empty") {
    $eerror="Plesse enter email";
} elseif ($emailCheck == "invalid") {
    $eerror="Plesse enter valid email";
} else {
    // echo "Valid email address.";
}



if(empty($password)){
    $passerror="Plesse enter Password";
}

else {
    if (strlen($password) < 8) { // Corrected to < 8 to ensure minimum 8 characters
        $passerror = "<br /> Enter at least 8 characters.";
    } elseif (!preg_match("#[0-9]+#", $password)) {
        $passerror = "<br /> Enter at least one digit.";
    } elseif (!preg_match("#[a-z]+#", $password)) {
        $passerror = "<br /> Enter at least one lowercase character.";
    } elseif (!preg_match("#[A-Z]+#", $password)) {
        $passerror = "<br /> Enter at least one uppercase character.";
    } else {
        $passerror = ""; // No errors, the password is valid
    }
}
}
//################################HTML code#############################


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 5px;
            margin-top: 23px;
        }
        input[type="text"], input[type="email"], input[type="submit"] {
            width: 100%;
            padding-bottom: 15px;
            padding-top: 15px;
            /* padding: 10px; */
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #name, #email, #password{
            margin-right: 20px;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <h2 style="text-align:center;">Login </h2>

    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
        <span style="color:red;"><?php echo $eerror?></span>
<br>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" value="<?php echo isset($password) ? htmlspecialchars($password) : ''; ?>">
        <span style="color:red; text-align:center;"><?php echo $passerror?></span>

        <input type="submit" value="Submit" name="submit" style="background-color:green; color:white; font-size:15px;">
        <!-- <button type="button" class="btn btn-secondary" style="margin-right: 20px; "><a  href="updatepass.php?id=<?php //echo $row['id']; ?>"  style="color:white; text-decoration:none;"> Forget Password</a></button> -->
        <button type="button" class="btn btn-success"><a  href="logout.php" style="color:white; text-decoration:none;">Logout</a></button>
        <button type="button" class="btn btn-secondary" style="margin-right: 25px; "><a  href="registration.php" style="color:white; text-decoration:none;">Register</a></button>

       
    </form>
   
       
    
</body>
</html>
