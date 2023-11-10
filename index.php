<?php






$conn = mysqli_connect('localhost','root','root','win');
if($conn){
    echo "connected";
}
else{
    echo "not connected" . mysqli_connect_error();
}

if(isset($_POST['submit'])){
    $first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    $sql = "INSERT INTO users(firstname,lastname,email)
     VALUES('$first_name','$last_name','$email')";
    mysqli_query($conn,$sql);
    if(empty($first_name) || empty($last_name) || empty($email)){
        echo "please fill all the fields";
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "please enter a valid email";
    }
    else{
        echo "data inserted";
    }
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    mysqli_free_result($result);
    mysqli_close($conn);
    
    
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel =stylesheet href = "./css/style.css">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
<input type="text" name="first name" id="first name" placeholder="first name" >
<br>
<input type="text" name="last name" id="last name" placeholder="last name" >
<br>
<input type="text" name="email" id="email" placeholder="email" >
<br>
<input type="submit" name="submit" value="send" >

</form>
  
    
    
    
    
    
    





<script src = "./js/script.js"></script>
</body>
</html>