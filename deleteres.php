<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "The_Outer_Clove";

    $connection = new mysqli($servername, $username, $password, $database);


    $sql = "DELETE FROM reservations WHERE id=$id";
    $connection->query($sql);
}

header("location: res.php");
exit;


?>