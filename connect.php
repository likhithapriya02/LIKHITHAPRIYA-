<?php
    $name = $_POST['name'];
    $fathername= $_POST['father name'];
    $dateofbirth = $_POST['date of birth'];
    $gender = $_POST['gender'];
    $phonenumber = $_POST['phone number'];
    $email = $_POST['email'];
    $stream = $_POST['stream'];
    $passedyear = $_POST['passed year'];
    $qualification = $_POST['qualification'];
    $position = $_POST['position'];
    $city = $_POST['city'];
    $country = $_POST['country'];

    //Database connection
    $conn = new mysqli('localhost','root','','registration');
    if($conn->connect_error){
        die('connection failed: ' -$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(name,fathername,dateofbirth,gender,email,stream,passedyear,qualification,position,city,country,phonenumber)
            value(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param ("ssissiissssi",$name, $fathername, $dateofbirth, $gender, $email, $stream, $passedyear, $qualification, $position, $city, $country, $phonenumber);
        $execval = $stmt->execute();
        echo $execval;
        echo"register successfully.....";
        $stmt->close();
        $conn->close();
    }
?>