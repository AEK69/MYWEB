<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Web</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            padding: 20px 0;
            color: #333;
        }

        h2{
            text-align: center;
            color: #333;
            
        }

        h3 {
           text-align: center;
           color: #333;
           
        }
        .CC {
            text-align: center;
            font-family: "Noto Sans Lao";
        }
        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #555;
        }

        .animation {
            width: 100%;
            height: 10px;
            position: relative;
            overflow: hidden;
        }

        .start-home {
            background: #4CAF50;
            animation: home 4s linear infinite;
        }

        @keyframes home {
            0% {
                left: -100%;
            }

            50% {
                left: 100%;
            }

            100% {
                left: 100%;
            }
        }

        /* Additional styles for product links */
        .product-link {
            display: block;
            text-align: center;
            margin: 10px auto;
            padding: 10px;
            width: 80%;
            background-color: #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .product-link:hover {
            background-color: #ccc;
        }
    </style>
</head>

<body>
    <h1>Show Products</h1>

    <nav>
        <div><a href="admin.php"><button>Home admin</button></a></div>
        <div class="animation start-home"></div>
    </nav>

    <div class="container">
    <?php
if (isset($_GET['bill_id'], $_GET['id'])) {
    $user_id = mysqli_real_escape_string($con, $_GET['id']);
    $bill_id = mysqli_real_escape_string($con, $_GET['bill_id']);
    $show_query = "SELECT * FROM bill_detail WHERE bill_id = $bill_id";
    $show_query1 = "SELECT * FROM user WHERE user_id = $user_id";
    $rs_billid1 = mysqli_query($con, $show_query);
    $rs_user = mysqli_query($con, $show_query1);
    
    // Fetch the user row
    $user_row = mysqli_fetch_assoc($rs_user);
    $user_name = $user_row['user_name'];
    $email = $user_row['email'];
    $user_lastname = $user_row['uesr_lastname'];
    
    echo "<h1>Bill :  $bill_id</h1>";
    echo "<h2>User: $user_name</h2>"; // Display user's name
    echo "<h2>lastname: $user_lastname</h2>";
    echo "<h2>Email: $email</h2>";

    $totalp = 0; // Initialize total price
    
    while ($row_billid1 = mysqli_fetch_assoc($rs_billid1)) {
        $pro_id = $row_billid1['pro_id'];
        $all = $row_billid1['price'] * $row_billid1['qty'];
        $totalp += $all; // Accumulate total price
        ?>
        <div class="CC">
            <img src="images/<?php echo $row_billid1['pro_image'] ?> " style="width: 320px;" alt=""><br>
            <h2><?php echo $row_billid1['pro_name'] ?></h2>
            <h3>ລາຄາ/1ໜ່ວຍ <?php echo $row_billid1['price']?>฿</h3>
            <h3>ລາຄາລວມ<?php echo $row_billid1['total']?>฿</h3>
            <h2>ຈຳນວນ <?php echo $row_billid1['qty']?> ໜ່ວຍ</h2>

        </div>
        <?php
    }
}
?>


    </div>
</body>

</html>