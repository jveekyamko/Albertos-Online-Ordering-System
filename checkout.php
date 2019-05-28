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
                <h3>Summary</h3>
                <table class="table">
                <th>Name:
                            
                            <?php
                                 $query = "SELECT * FROM users where user_id='$logged'";
                                 $user_query = mysqli_query($conn,$query) or die(mysqli_error());
                                 $row = mysqli_fetch_array($user_query);
                                  echo $row['fname'] . " " . $row['lname'];
                            ?>
                    <br>
                    Address: 
                    <?php
                                 $query = "SELECT * FROM users where user_id='$logged'";
                                 $user_query = mysqli_query($conn,$query) or die(mysqli_error());
                                 $row = mysqli_fetch_array($user_query);
                                  echo $row['address'];
                            ?>
                <br>
                            Contact:
                <?php
                                 $query = "SELECT * FROM users where user_id='$logged'";
                                 $user_query = mysqli_query($conn,$query) or die(mysqli_error());
                                 $row = mysqli_fetch_array($user_query);
                                  echo $row['cnum'];
                            ?>
                </th>
                           </table>
                <table class="table">
                    <div class="pull-left">
                                Receive in 30 minutes

                            </div>
                <table class="table">
  <th>Product</th>
  <th>Name</th>
  <th>Price</th>
  <th>Quantity</th>
  <th>Amount</th>
<?php
    include ('admin/conn.php');
    $sql = "SELECT  * FROM order_details where status='inserted'";
        $cart_table = mysqli_query($conn,$sql) or die(mysqli_error());
        $cart_count = mysqli_num_rows($cart_table);
            while ($cart_row = mysqli_fetch_array($cart_table)) {
            $order_id = $cart_row['order_id'];
            $prod_id = $cart_row['prod_id'];
            $product_query = "SELECT * FROM products where prod_id='$prod_id'";
            $result = mysqli_query($conn,$product_query) or die(mysqli_error());
            $product_row = mysqli_fetch_array($result);
            ?>
            <tr>
            <td>
                <?php echo "<img src='admin/{$product_row['photo']}' width='100px'>"; ?>
            </td>
            <td><?php echo $product_row['prod_name']; ?></td>
            <td><?php echo $cart_row['price']; ?></td>
            <td><?php echo $cart_row['qty']; ?> </td>
            <td><?php echo $cart_row['total']; ?></td>
                </tr>
                                    <?php } ?>
                                    <td>
                        <?php
                        include ('admin/dbconn.php');
                        if ($cart_count != 0) {
                            $query = "SELECT sum(total) FROM order_details where user_id='$logged' and status = 'inserted'";
                            $result = mysqli_query($conn,$query) or die(mysqli_error());
                            while ($rows = mysqli_fetch_array($result)) {
                                ?>
                                <a href="success.php?branch=<?php echo $branch;?>&user_id=<?php echo $logged;?>" role="button" class="btn btn-success"><i  class="icon-truck icon-large"></i>&nbsp;Submit Order</a><br>
                                <div class="pull-left">
                                    <div class="span"><div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Total:&nbsp;<?php echo $rows['sum(total)']; ?></div></div>
                                </div>
                            <?php }
                            ?>
                            <?php
                        }
                        ?>
                        </td>
            </table>
        </div>
        </div>
                   
        </section>
                   
        
        <!--================End Recent Blog Area =================-->
<?php include('privatefooter.php');?>