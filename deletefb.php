<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "the_outer_clove";

    $connection = new mysqli($servername, $username, $password, $database);


    $sql = "DELETE FROM userfb WHERE id=$id";
    $connection->query($sql);
}

header("location: viewFeedbacks.php");
exit;


?>