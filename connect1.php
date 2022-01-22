<?php 

$name = $_POST['name'];
$Pid = $_POST['Pid'];
$PName = $_POST['PName'];
$PCat = $_POST['PCat'];
$mode = $_POST['mode'];


//database connection
$conn = new mysqli('localhost','root','','petconnectvolunteerform');
if($conn->connect_error){
    die('Connection Failed:'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into adoptiondetails(name,Pid,PName,PCat,mode)
    values(?,?,?,?,?)");
    $stmt->bind_param("sisss",$name,$Pid,$PName,$PCat,$mode);
    $stmt->execute();
    echo "registration successful";
    $stmt->close();
    $conn->close();
}
?>