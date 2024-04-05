<?php require 'header.php'; ?>

<?php
$pro_id = mysqli_real_escape_string($con, $_GET['pro_id']);
$sql = "SELECT * FROM product WHERE pro_id = '$pro_id' ";
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($rs);
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
                <h4><em>ໜ້າ
                  </em> ສັ່ງສິນຄ້າ </h4>
              </div>

              <div class="item" style=" text-align: center;">
                <div class="thumb">
                  <img src="assets/images/<?php echo $row['pro_image'] ?> " style="width: 320px;" alt="">
                  <div class="hover-effect">
                    <a href="#" id="add"
                      class="btn btn-light border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                  </div>
                </div>
                <h4><br><br></h4>
              </div>

            </div>
          </div>
        </div>
        <!-- ***** Featured Games End ***** -->


        <?php require 'footer.php' ?>
        <script>

$(document).ready(function () {
    $("#add").click(function () {
        var pro_id = <?php echo $row['pro_id'] ?>;
        var price = <?php echo $row['pro-price'] ?>;
        var qty = <?php echo $row['pro_qty'] ?>;
        var pro_name = "<?php echo $row['pro_name'] ?>";
        var pro_image = "<?php echo $row['pro_image'] ?>";
        var data = "qty=" + qty + "&price=" + price + "&pro_id=" + pro_id + "&pro_name=" + encodeURIComponent(pro_name) + "&pro_image=" + encodeURIComponent(pro_image);

        $.ajax({
            type: "POST",
            url: "order_pc.php",
            data: data,
            success: function (rs) {
                Swal.fire({
                    title: "ສຳເລັດການສັ່ງຊື້",
                    html: '<p>' + pro_name + '</p>', // แสดงชื่อสินค้าในกล่องข้อความแจ้งเตือน
                    icon: "success"
                });
            }
        });
    });
});



        </script>