<?php include('nav.php');?>
        <!--================End Footer Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>A Taste You'll Surely Miss...</h4>
                    <a href="#">Home</a>
                    <a class="active" href="menu-grid.php?branch=<?php echo $branch;?>">Menu</a>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================About Us Content Area =================-->
        <section class="about_us_content">
            <div class="container">
                <div class="row about_inner_item">
                <h3>Payment</h3>
                <table class="table">
  <th class="column-1"><a href="checkout.php?branch=<?php echo $branch;?>"><input type="image" src="cod.png" border="0" style="margin-left: 150px;" class="img-rounded" />
                            <img alt="" border="0" src="cod.png" width="1" height="1" /></th>
<?php
                        /* where member_id='$ses_id'*/
                                    $sql = "SELECT * from order_details WHERE user_id='$logged'";
                                    $cart_table = mysqli_query($conn,$sql) or die(mysqli_error());
                                    $cart_count = mysqli_num_rows($cart_table);
                                    while ($cart_row = mysqli_fetch_array($cart_table)) {
                                        $order_id = $cart_row['order_id'];
                                        $prod_id = $cart_row['prod_id'];
                                        $sql1 = "SELECT * from products where prod_id='$prod_id'";
                                        $product_query = mysqli_query($conn,$sql1) or die(mysqli_error());
                                        $product_row = mysqli_fetch_array($product_query);
                                        ?>
                            
                   


                           <?php } ?>
                            <!--member_id='$ses_id' and -->
                            <?php
                            if ($cart_count != 0) {
                                $sql2 = "SELECT sum(total) FROM order_details WHERE user_id='$logged' and status = ''";
                                $result = mysqli_query($conn,$sql2) or die(mysqli_error());
                                while ($rows = mysqli_fetch_array($result)) {
                                    ?>
                                    <input type="hidden" name="amount" value="<?php echo $rows['sum(total)']; ?>" />
                                <?php }
                            } ?>
            </table>
        </div>
        </div>
                   
        </section>
                   
        
        <!--================End Recent Blog Area =================-->
<?php include('privatefooter.php');?>