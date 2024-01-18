<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/all.min.css">
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

        .container {
            text-align: center;
        }

        h2 {
            color: #fff;
        }

        .task {
            margin: 20px 0;
        }

        .card {
            background-color: #fff;
            color: #000;
            border: none;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.1);
        }

        .btn-primary {
            background-color: #2196F3;
            border-color: #2196F3;
        }

        .btn-primary:hover {
            background-color: #1565C0;
            border-color: #1565C0;
        }

        .btn-danger {
            background-color: #FF5252;
            border-color: #FF5252;
        }

        .btn-danger:hover {
            background-color: #D32F2F;
            border-color: #D32F2F;
        }

        .btn-success {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-success:hover {
            background-color: #388E3C;
            border-color: #388E3C;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <h2>Welcome, Staff!</h2>

        <div class="row">

            <div class="col-md-6 col-lg-6">
                <div class="card task">
                    <i class="fas fa-calendar fa-3x mb-3" style="color: #2196F3;"></i>
                    <h4>Check Reservations</h4>
                    <a class="btn btn-primary" href="checkReservation.php" role="button">Go to Reservations</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="card task">
                    <i class="fas fa-shopping-cart fa-3x mb-3" style="color: #FF5252;"></i>
                    <h4>Check Orders</h4>
                    <a class="btn btn-danger" href="checkOrders.php" role="button">Go to Orders</a>
                </div>
            </div>

        </div>

        <div class="task">
            <a class="btn btn-danger" href="logoutstaff.php" role="button">Logout</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
