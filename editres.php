<?php

$servername = "localhost";
$person = "root";
$message= "";
$database = "The_Outer_Clove";

$connection = new mysqli($servername, $person, $message, $database);

$id = "";
$name = "";
$phone = "";
$person = "";
$reservation_date = "";
$reservation_time = "";
$message= "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: res.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM reservations WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: res.php");
        exit;
    }

    $name = $row["name"];
    $phone = $row["phone"];
    $person = $row["person"];
    $reservation_date = $row["reservation_date"];
    $reservation_time = $row["reservation_time"];
    $message= $row["message"];

}

else{

    $id = $_POST["id"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $person = $_POST["person"];
    $reservation_date = $_POST["reservation_date"];
    $reservation_time = $_POST["reservation_time"];
    $message= $_POST["message"];

    do {
        if (empty($id) || empty($name) || empty($phone) || empty($person) || empty($reservation_date) || empty($reservation_time) || empty($message)) {
            $errorMessage = "ALL FIELDS ARE REQUIRED";
            break;
        }

        $sql = "UPDATE reservations " .
        "SET name = '$name', phone = '$phone', person = '$person', reservation_date = '$reservation_date', reservation_time = '$reservation_time', message = '$message' " .
        "WHERE id = $id";

        $result = $connection->query($sql);
        
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Reservation Updated Successfully";

        header("location: res.php");
        exit;

    }while (false);

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(45deg, #4CAF50, #2196F3);
            color: #fff;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
        }

    </style>

</head>

<body>
    <a class="btn btn-primary back-button" href="res.php">
        <i class="fas fa-arrow-left"></i> Back
    </a>

    <div class="container my-5">
        <h2>Reservations</h2>

        <?php

        if (!empty($errorMessage)) {

            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }

        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Persons</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="person" value="<?php echo $person ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Reservation Date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="reservation_date" value="<?php echo $reservation_date ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Reservation Time</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="reservation_time" value="<?php echo $reservation_time ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Message</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="message" value="<?php echo $message ?>">
                </div>
            </div>

            <?php

            if (!empty($successMessage)) {

                echo "
                    <div class='row mb-3'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                    ";
            }

            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="res.php" role="button">Cancel</a>
                </div>
            </div>

        </form>

    </div>

</body>

</html>
