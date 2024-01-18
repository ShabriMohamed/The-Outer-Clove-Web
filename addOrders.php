<?php

$servername = "localhost";
$username = "root";
$quantity = "";
$database = "The_Outer_Clove";

$connection = new mysqli($servername, $username, $quantity, $database);

$customer_name = "";
$email = "";
$contact = "";
$address= "";
$item_name = "";
$quantity = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $customer_name = $_POST["cname"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $address= $_POST["address"];
    $item_name = $_POST["itemname"];
    $quantity = $_POST["quantity"];

    do {
        if (empty($customer_name) || empty($email) || empty($contact) || empty($address) || empty($item_name) || empty($quantity)) {
            $errorMessage = "ALL FIELDS ARE REQUIRED";
            break;
        }

        // ADD USERS TO THE DATABASE
        $sql = "INSERT INTO orders (customer_name, customer_email, customer_phone, address, item_name, quantity)" .
            "VALUES ('$customer_name', '$email','$contact', '$address','$item_name','$quantity') ";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }

        $customer_name = "";
        $email = "";
        $contact = "";
        $address= "";
        $item_name = "";
        $quantity = "";

        $successMessage = "Order Placed Successfully";

        header("location: manageOrder.php");
        exit;

    } while (false);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ADD ORDERS </title>
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
    <a class="btn btn-primary back-button" href="manageOrder.php">
        <i class="fas fa-arrow-left"></i> Back
    </a>

    <div class="container my-5">
        <h2>Place Order</h2>

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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Customer Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cname" value="<?php echo $customer_name ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="contact" value="<?php echo $contact ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Food Item</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="itemname" value="<?php echo $item_name ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="quantity" value="<?php echo $quantity ?>">
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
                    <a class="btn btn-outline-primary" href="manageOrder.php" role="button">Cancel</a>
                </div>
            </div>

        </form>

    </div>

</body>

</html>
