<?php
                                    
                                    include ('admin/dbconn.php');


                                     	$branch=$_POST['branch'];
                                        $prod_id = $_POST['prod_id'];
                                        $findqty = "SELECT * FROM products where prod_id='$prod_id'";
                                        $findresult = mysqli_query($conn,$findqty);
                                        $findrow = mysqli_fetch_array($findresult);

                                        $qty = $findrow['quantity'];
                                        if($qty<1){
                                              if($branch==1){
                                            echo "<script>alert('Out of Stock!'); window.location = 'menu-grid.php?branch=1';</script>";
                                        }else if($branch==2){
                                            echo "<script>alert('Out of Stock!'); window.location = 'menu-grid.php?branch=2';</script>";
                                        }else if($branch==3){
                                            echo "<script>alert('Out of Stock!'); window.location = 'menu-grid.php?branch=3';</script>";
                                        }
                                        }else{

                                        $user_id = $_POST['user_id'];
                                        $qty = $_POST['qty'];
                                        $drinks_size=$_POST['drinks_size'];
                                        $sql="SELECT * from prodet where  drinks_size='$drinks_size' and prod_id='$prod_id' ";
                                        $result=mysqli_query($conn,$sql);
                                        $countprodet=mysqli_num_rows($result);
                                         if($countprodet>0){
                                        foreach ($result as $key => $row) {
                                            $total=$qty*$price=$row['price'];
                                             $prodet_id=$row['prodet_id'];
                                            

                                      
                                         

                                       
                                        $query = "INSERT INTO order_details (user_id,qty,prod_id,prodet_id,price,total,status,branch_id) values('$user_id','$qty','$prod_id','$prodet_id','$price','$total','inserted','$branch')";
                                            
                                        $result = mysqli_query($conn,$query) ;
                                        }
                                        $query2="UPDATE products
                                                    set quantity=quantity-$qty
                                                    where prod_id=$prod_id and branch_id='$branch' ";
                                        $result2=mysqli_query($conn,$query2);

                                        
                                          if($branch==1){
                                            echo "<script>alert('Successfully Added!'); window.location = 'orderchills.php?branch=1';</script>";
                                        }else if($branch==2){
                                            echo "<script>alert('Successfully Added!'); window.location = 'orderchills.php?branch=2';</script>";
                                        }else if($branch==3){
                                            echo "<script>alert('Successfully Added!'); window.location = 'orderchills.php?branch=3';</script>";
                                        }
                                        

                                        }else{

                                         if($branch==1){
                                            echo "<script>alert('Not Available!'); window.location = 'orderchills.php?branch=1';</script>";
                                        }else if($branch==2){
                                            echo "<script>alert('Not Available!'); window.location = 'orderchills.php?branch=2';</script>";
                                        }else if($branch==3){
                                            echo "<script>alert('Not Available!'); window.location = 'orderchills.php?branch=3';</script>";
                                        }
                                    }
                                }
                                        ?>
                                               
                                