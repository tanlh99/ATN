<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$HOST = "ec2-107-21-255-181.compute-1.amazonaws.com";
$PORT = "5432";
$DBNAME = "d69acd8leq4v0c";
$USER = "gpzpokwwiitgwz";
$PASSWORD = "50c502f726bc61052e7337d64d1fe9b8bac3a783cef2486f07d92642cbc58f18"

$link = pg_connect("dbname=d69acd8leq4v0c host=ec2-107-21-255-181.compute-1.amazonaws.com sslmode=require
port=5432 user=gpzpokwwiitgwz password=50c502f726bc61052e7337d64d1fe9b8bac3a783cef2486f07d92642cbc58f18 sslmode=require");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. ");
}
 
// Escape user inputs for security
$id = mysqli_real_escape_string($link, $_REQUEST['id']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$cat = mysqli_real_escape_string($link, $_REQUEST['cat']);
$date = mysqli_real_escape_string($link, $_REQUEST['date']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);

 
// Attempt insert query execution
$sql = "INSERT INTO Product (Id, Product_Name, Category, Date, Price, Descriptions) VALUES ('$id', '$name', '$cat','$date','$price','$description')";
if(pg_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . pg_error($link);
}
 
// Close connection
pg_close($link);
?>