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

                <table class="table">
  <th>Branch</th>
  <th>Product</th>
  <th>Name</th>
  <th>Price</th>
  <th>Quantity</th>
  <th>Total</th>
  <th>Action</th>
<?php
    include ('admin/dbconn.php');
    $sql = "SELECT  * FROM order_details where user_id = '$logged' AND status='inserted' ORDER BY order_id DESC";
        $cart_table = mysqli_query($conn,$sql) or die(mysqli_error());
        $cart_count = mysqli_num_rows($cart_table);
            while ($cart_row = mysqli_fetch_array($cart_table)) {
            $order_id = $cart_row['order_id'];
            $prod_id = $cart_row['prod_id'];
            $branchadd = $cart_row['branch_id'];

            $findbranch = "SELECT * from branches where branch_id = '$branchadd'";
            $findres = mysqli_query($conn,$findbranch);
            $findrow = mysqli_fetch_array($findres);

            $product_query = "SELECT * FROM products where prod_id='$prod_id'";
            $result = mysqli_query($conn,$product_query) or die(mysqli_error());
            $product_row = mysqli_fetch_array($result);
            ?>
            <tr>
            <td><?php echo $findrow['branch_address']; ?></td>
            <td>
                <?php echo "<img src='admin/{$product_row['photo']}' width='100px'>"; ?>
            </td>
            <td><?php echo $product_row['prod_name']; ?></td>
            <td><?php echo $cart_row['price']; ?></td>
            <td><?php echo $cart_row['qty']; ?> </td>
            <td><?php echo $cart_row['total']; ?></td>
            <td><a href="remove_item.php?id=<?php echo $order_id ?>&branch=<?php echo $branch ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this item?');">Remove</a></td>
            <!--<td width="100"><button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Remove</button></td>
                </tr>
              <!-- Modal -->
  <!--<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
     <!-- <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
        <div class="alert alert-danger">Are you Sure you Want to <strong>Remove &nbsp;</strong>this item?</div>
                                        
        </div>
        <div class="modal-footer">
          <div class="modal-footer">
                <a class="btn btn-danger" href="remove_item.php?id=<?php //echo $order_id; ?>" ><i class="icon-check icon-large"></i>&nbsp;Yes</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
                  

                    
    </div>
  </div>
  
</div>-->
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
                                <a href="payment.php?branch=<?php echo $branch;?>" role="button" class="btn btn-success"><i  class="icon-truck icon-large"></i>&nbsp;PROCEED TO CHECKOUT</a><br>
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