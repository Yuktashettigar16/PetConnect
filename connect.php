<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$age = $_POST['age'];
$address = $_POST['address'];
$volunteer = $_POST['volunteer'];

//database connection
$conn = new mysqli('localhost','root','','petconnectvolunteerform');
if($conn->connect_error){
    die('Connection Failed:'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into volunteerforms(name,phone,email,age,address,volunteer)
    values(?,?,?,?,?,?)");
    $stmt->bind_param("sisiss",$name,$phone,$email,$age,$address,$volunteer);
    $stmt->execute();
    echo "registration successful";
    $stmt->close();
    $conn->close();
}
?>