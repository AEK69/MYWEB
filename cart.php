<?php require 'header.php'; ?>

<?php
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect or show an error message
    exit("You are not logged in.");
}

// Include database connection or define $con here
// Ensure session is started before accessing $_SESSION
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$uid_id = $_SESSION['user_id'];
$sql_billid = "SELECT * FROM bill WHERE user_id = $uid_id AND bill_total = 0";
$rs_billid = mysqli_query($con, $sql_billid);
$row = mysqli_num_rows($rs_billid);
if ($row > 0) {
    $row_billid = mysqli_fetch_array($rs_billid);
    $bill_id = $row_billid['bill_id'];
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <!-- ***** Featured Games Start ***** -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="featured-games header-text">
                                <div class="heading-section" style="font-family: Noto Sans Lao;">
                                    <h4><em>ໜ້າ</em> ສັ່ງສິນຄ້າ</h4>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr class="color">
                                            <th scope="col">Products</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $detail_query = "SELECT bd.*, p.pro_image, p.pro_name FROM bill_detail bd INNER JOIN product p ON bd.pro_id = p.pro_id WHERE bd.bill_id = $bill_id";
                                        $rs_detail = mysqli_query($con, $detail_query);
                                        $countrows = mysqli_num_rows($rs_detail);
                                        $total = 0;
                                        $x = 1;

                                        while ($x <= $countrows) {
                                            $row_detail = mysqli_fetch_assoc($rs_detail);
                                            $item_total = $row_detail['price'] * $row_detail['qty'];

                                            $total += $item_total;
                                            ?>
                                            <tr>
                                                <td>
                                                    <img src="assets/images/<?php echo $row_detail['pro_image']; ?>"
                                                        class="img-fluid me-5 rounded-circle"
                                                        style="width: 100px; height: 100px;" alt="">
                                                </td>
                                                <td>
                                                    <p class="mb-0 mt-4">
                                                        <?php echo $row_detail['pro_name']; ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="mb-0 mt-4">
                                                        <?php echo $row_detail['price']; ?> ฿
                                                    </p>
                                                </td>
                                                <td class="flexqty">
                                                    <button id="plus<?php echo $x ?>">+</button>
                                                    <p class="mb-0 mt-4" id="qty">
                                                        <?php echo $row_detail['qty']; ?>
                                                    </p>
                                                    <button id="minus<?php echo $x ?>">-</button>
                                                </td>
                                                <script>
                                                    var qty = document.getElementById('qty');
                                                    let conqty = parseInt(qty.innerHTML);

                                                    document.getElementById('plus<?php echo $x ?>').addEventListener('click', function () {
                                                        conqty++;
                                                        qty.innerHTML = conqty;
                                                    });

                                                    document.getElementById('minus<?php echo $x ?>').addEventListener('click', function () {
                                                        if (qty.innerHTML == 1) {
                                                            conqty = 1;
                                                        } else {
                                                            conqty--;
                                                        }
                                                        qty.innerHTML = conqty;
                                                    });
                                                </script>
                                                <td>
                                                    <p class="mb-0 mt-4">
                                                        <?php echo $item_total; ?> ฿
                                                    </p>
                                                </td>
                                                <td>
                                                    <a
                                                        href="del_cart.php?id=<?php echo $bill_id; ?>&bill_detail=<?php echo $row_detail['pro_id']; ?>">
                                                        <button class="btn btn-md rounded-circle bg-light border mt-4">
                                                            <i class="fa fa-times text-danger"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $x++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-5">
                                <h4>Total:
                                    <?php echo $total; ?> ฿
                                </h4>
                                <a href="confirm.php?total=<?php echo $total ?>&bill_id=<?php echo $bill_id ?>">
                                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary"
                                        type="button">Proceed to Checkout</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php require 'footer.php' ?>