<?php 

$name = $_POST['name'];
$location = $_POST['location'];
$complaints = $_POST['complaints'];


//database connection
$conn = new mysqli('localhost','root','','petconnectvolunteerform');
if($conn->connect_error){
    die('Connection Failed:'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into publiccomplaints(name,location,complaints)
    values(?,?,?)");
    $stmt->bind_param("sss",$name,$location,$complaints);
    $stmt->execute();
    echo "registration successful";
    $stmt->close();
    $conn->close();
}
?>