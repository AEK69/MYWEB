<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>

<body>

    <?php
    require 'db.php';

    // Checking if 'id' is set in the URL
    if (isset($_GET['id'])) {
        $bid = mysqli_real_escape_string($con, $_GET['id']);
        $show_query1 = "SELECT * FROM user WHERE user_id = $bid";
        $rs_billid3 = mysqli_query($con, $show_query1);
        // Fetch the result row
        $row_billid3 = mysqli_fetch_assoc($rs_billid3);
    }

    // Checking if $row_billid3 is set before using it
    if (isset($row_billid3)) {
        echo "<p class='ma1'> ຊື່ : " . $row_billid3['user_name'] . "</p>";
        echo "<p class='ma1'> ນາມສະກຸນ : " . $row_billid3['user_lname'] . "</p>";
        echo "<p class='ma1'> ອີເມວ : " . $row_billid3['email'] . "</p>";
    } else {
        echo "<p class='ma'>Email not found</p>";
    }
    ?>

    <!-- Your button here -->
    <button class="b">
        <a href="admin.php" class="btn btn-danger"><span>Go to page admin</span></a>
    </button>
    <hr>
    <div class="container py-5">
        <!-- Your table here -->
    </div>

    <!-- Footer -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <!-- Footer content goes here -->
    </div>

    <!-- Copyright -->
    <div class="container-fluid copyright bg-dark py-4">
        <!-- Copyright content goes here -->
    </div>

    <!-- Back to Top Button -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Your custom scripts -->
    <script src="js/main.js"></script>

</body>

</html>