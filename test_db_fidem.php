<?php

$db_conn = mysqli_connect("localhost", "siste101_fidem", "fidem1", "siste101_fidem");

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