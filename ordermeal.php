<?php include ('nav.php');?>
        <!--================End Footer Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area1">
            <div class="container">
                <div class="banner_content1">
                    <h4>Alberto's Pizza Meals</h4>
                    <!--<a href="#">Home</a>
                    <a class="active" href="menu-list.html">Menu</a>-->
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================End Our feature Area =================-->
        <section class="most_popular_item_area menu_list_page">
            <div class="container">
                <div class="popular_filter">
                    <ul>
                        <li onclick="location.href='menu-grid.php?branch=<?php echo $branch;?>';" style="cursor:pointer;"><button style="background-color: white;
    color: black;
    border: 2px solid #ffa500;">Pizzas</button></li>
                        <li onclick="location.href='ordermeal.php?branch=<?php echo $branch;?>';" style="cursor:pointer;"><button style="background-color: white;
    color: black;
    border: 2px solid #ffa500;">Meals</button></li>
                        <li onclick="location.href='orderchills.php?branch=<?php echo $branch;?>';" style="cursor:pointer;"><button style="background-color: white;
    color: black;
    border: 2px solid #ffa500;">Drinks</button></li>
                    </ul>
                </div>
                <div class="p_recype_item_main">
                    <div class="row p_recype_item_active">
                    <?php 
                                include ('admin/dbconn.php');
                                $sql = "SELECT * FROM products JOIN prodet ON products.prod_id = prodet.prod_id where prod_type='meal' and branch_id='$branch' and stats!='deleted'";
                                $result = mysqli_query($conn,$sql) or die(mysql_error());
                                while ($row = mysqli_fetch_array($result)) {
                                    
                                $id = $row['prod_id'];
                                $qty = $row['quantity'];
                                    
                                    $sql1 = "SELECT *,SUM(qty) as qty FROM order_details WHERE prod_id = '$id' AND status = 'Delivered'";
                                    $result1 = mysqli_query($conn,$sql1);
                                    $row1 = mysqli_fetch_array($result1);
                                    $total_qty = $qty;
                                ?>  
                        <form method="POST" id="product-list" action="insertordermeal.php">
                        <input type="hidden" name="prod_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $logged; ?>">
                        <input type="hidden" name="branch" value="<?php echo $branch ?>">        
                        <div class="col-md-4 col-sm-6 break snacks">
                            <div class="feature_item">
                                <div class="feature_item_inner">
                                    <?php echo "<img src=admin/{$row['photo']} width='350' height='200'/>"; ?>
                                </div>
                                <div class="title_text">
                                    <div class="feature_left"><a href="#"><span><?php echo $row['prod_name']; ?></span></a></div>
                                    <div class="product-item">
                                <label><a href="view_meal.php?branch=<?php echo $branch;?>"><img src="images/meal.png" width="12" height="12">&nbsp;Price List</label></a><br>
                            <label>Quantity:</label>
                                <input id="cnet" min="0" class="form-control" max="50" type="number" name="qty">
                            <label>
                                <?php 
                                    if($row['quantity']>0){
                                        echo "Stock Count:<span class='badge badge-warning'>";
                                        echo $row['quantity'];
                                        echo "</span>";
                                    }else{
                                        echo "Stock Count: <spam class='badge badge-warning'>Out of Stock</spam>";
                                    }
                                ?>
                            </label>
                            <div class="text-center">
                                <button type="submit" name="order" class="btn btn-success"><i class="icon-plus-sign"></i>&nbsp;Add</button>
                                <button class="btn btn-dark" name="order" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Cancel</button>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Our feature Area =================-->
        
        <!--================End Recent Blog Area =================-->
<?php include('footer.php');?>