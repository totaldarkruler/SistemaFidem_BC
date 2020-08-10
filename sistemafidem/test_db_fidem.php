<?php

//$db_conn = mysqli_connect("127.0.0.1", "root", null, "siste101_fidem");
$db_conn = mysqli_connect("localhost","siste101_fidem","fidem1", "siste101_fidem");
//$db_conn = mysqli_connect("localhost", "user_name", "password", "database_name");

// Evaluate the connection
if (mysqli_connect_errno())
{
    echo mysqli_connect_error();
    exit();
}

else
{
    echo "Successful database connection, happy coding!!!";
}

?>