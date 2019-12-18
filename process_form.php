<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = pg_connect("host=ec2-174-129-255-15.compute-1.amazonaws.com dbname=ddjhaurh263t6a user=dmwyzaotqxmuls password=4a457a0e22c03cc08fc8742e0975a87806ef2ffecb31d997be11bcdbcaf673a1");
 
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