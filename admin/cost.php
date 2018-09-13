<?php include('header.php'); ?>


<div id="page-wrapper">
        <div class="row" >
                <div class="col-lg-12" style="margin-top: 20px">

<?php 
    if (isset($_POST['sell'])) {
       
        $cost    = $_POST['cost'];
        $date    = $_POST['date'];

        $sql = "INSERT into cost(cost_account, date)Values('$cost', '$date')";

        $db->insert($sql);
         
    }
        
?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            খরচের হিসাব
                        </div>
                        
 
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post">
                                        
                                        <div class="form-group ">
                                            <input type="hidden" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                        </div>                                   
                                        
                                        <div class="form-group">
                                            <label>খরচের পরিমান </label>
                                            <input type="number" name="cost" class="form-control" >
                                        </div>
                                   
                                        <input type="submit" name="sell" class="btn btn-success">

                                    </form>

                                  
                                    <!-- /////////// -->
                                    
                                </div>
                                
                                <div class="col-lg-6">
                                    <h3 class="text-center">টোটাল বস্তা</h3>

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                          <th>সাইজ</th>
                                          <th>দাম</th>
                                          <th>টোটাল বস্তা</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                <?php 
                    $result = "SELECT * from product";

                        $all = $db->select($result);
                        if ($all) {
                            $i = 1;
                            while ($row = $all->fetch_assoc()) {

                ?>
                                         <tr>
                                          <td><?php echo $row['size']; ?></td>
                                          <td><?php echo $row['price']; ?></td>
                                          <td>
                                    <?php  
                                        if ($row['quantity'] == '') {
                                            echo "<div class='alert alert-danger'>এই চাল নাই</div>";
                                        }else{
                                            echo  $row['quantity'];
                                        }
                                    ?>

                    <?php } } ?></td>	
                                        </tr>
                                        <tr style="border: 2px solid black">
                                        	<td colspan="2" style="text-align: right; border: 2px solid black">
                                        		<!-- total amount -->
            <?php 
                $current_pac = "SELECT SUM(price * quantity) as price from product";
        		$data = $db->select($current_pac)->fetch_assoc();

        		echo $data['price']." টাকা";
            ?>
                                        	</td>
                                        	<td>
            <?php 
                $pac = "SELECT SUM(quantity) as quantity from product";
        		$pac_data = $db->select($pac)->fetch_assoc();

        		echo $pac_data['quantity']." বস্তা";
            ?>
                                        	</td>
                                        </tr>

                                      
                                        </tbody>
                                        </table>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
    </div>


<?php include('footer.php'); ?>

