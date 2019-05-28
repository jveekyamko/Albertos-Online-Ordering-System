<?php include('nav.php');?>
        <!--================End Footer Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>A Taste You'll Surely Miss...</h4>
                    <!--<a href="#">Home</a>
                    <a class="active" href="menu-grid.php?branch=<?php //echo $branch;?>">Menu</a>-->
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================About Us Content Area =================-->
        <section class="about_us_content">
            <div class="container">
                <div class="row about_inner_item">

                <table class="table">
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>Product Name</th>
                                        <th>Cheese Type</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Date Ordered</th>
<?php include ('dbconn.php');
                                    $cart_table = "SELECT * from order_details 
                                    JOIN users ON order_details.user_id = users.user_id JOIN branches ON order_details.branch_id =branches.branch_id
                                    where order_details.branch_id='$branch' AND user_type = 'customer'";
                                    $result = mysqli_query($conn,$cart_table);
                                    $cart_count = mysqli_num_rows($result );
                                    while ($cart_row = mysqli_fetch_array($result)) {
                                        $order_id = $cart_row['order_id'];
                                        $prod_id = $cart_row['prod_id'];
                                        $user_id = $cart_row['user_id'];
                                        //$address = $cart_row['address'];
                                        $product_query = "SELECT * from products where prod_id='$prod_id'";
                                        $result1 = mysqli_query($conn,$product_query) or die(mysqli_error());
                                        $product_row = mysqli_fetch_array($result1);
                                        $prodet = "SELECT * from prodet where prod_id='$prod_id'";
                                        $prod_res = mysqli_query($conn,$prodet);
                                        $row = mysqli_fetch_array($prod_res);
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $cart_row['fname']." ".$cart_row['lname']; ?></td>
                                            <td><?php echo $cart_row['address']?></td>
                                            <td><?php echo $product_row['prod_name']; ?></td>
                                            <td><?php echo $row['cheese_type']; ?></td>
                                            <td><?php echo $row['pizza_size']; ?></td>
                                            <td><?php echo $cart_row['price']; ?></td>
                                            <td><?php echo $cart_row['qty']; ?></td>
                                            <td><?php echo $cart_row['total']; ?></td>
                                            <td><?php echo $cart_row['status']; ?></td>
                                            <td><?php echo $cart_row['dateOrdered']; ?></td>
                                            </tr>
                                            <?php
                        }
                        ?>
            </table>
        </div>
        </div>
                   
        </section>
                   
        
        <!--================End Recent Blog Area =================-->
<?php include('privatefooter.php');?>