<?php require 'header.php'?>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <div style="font-family: Noto Sans Lao;">
                  <h6>ສະບາຍດີລູກຄ້າທີ່ໜ້າຮັກ</h6>
                  <h4><em>AEK SHOP</em> ມີສິນຄ້າ <br> ທີ່ຫຼາກຫຼາຍໃຫ້ທ່ານເລືອກ</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="kk heading-section" style="font-family: Noto Sans Lao;">
                  <h4><em>ລາຍການ</em> ສິນຄ້າ</h4>
                </div>
                <div class="row">
                <?php
                      $sql = "SELECT * FROM product";
                      $rs = Mysqli_Query ($con , $sql);
                      while($row = mysqli_fetch_array($rs)){
                ?>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <a href="order.php?pro_id=<?php echo $row['pro_id'] ?>"><img src="assets/images/<?php echo $row['pro_image'] ?>" alt=""></a>
                      <h4><?php echo $row ['pro_name']?><br><span><?php echo number_format($row['pro-price'], 0, " ", ",");?> <?php echo $row ['unit']?></span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa-solid fa-box-archive" style="color: #fb00ff;"></i> <?php echo $row ['pro_qty']?></li>
                      </ul>
                    </div>
                  </div>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
         
          <!-- ***** Most Popular End ***** -->
        </div>
      </div>
    </div>
  </div>


<?php require 'footer.php'?>