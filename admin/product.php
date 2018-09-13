<?php include('header.php'); ?>



<?php 
    if (isset($_POST['sell'])) {
       
        $size    = $_POST['size'];
        $price   = $_POST['price'];
        $quantity    = $_POST['quantity'];
        //$issue_date    = $_POST['issue_date'];

        $current_pac = "SELECT quantity from product where size = '$size'";
        $data = $db->select($current_pac)->fetch_assoc();

        $add = $quantity + $data['quantity'];

        $update = "UPDATE product set quantity = '$add' where size = '$size'";

        $db->update($update);
         
    }
        
?>

	<div id="page-wrapper">
        <div class="row" >
                <div class="col-lg-12" style="margin-top: 20px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        
 
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post">
                                        <div class="text-center">বস্তা যোগ</div>
                                        <div class="form-group">
                                            <label>বস্তার সাইজ</label>
                                            <select class="form-control" name="size">
                                                <option>select</option>
                                                <option value="5">5 KG</option>
                                                <option value="10">10 KG</option>
                                                <option value="25">25 KG</option>
                                                <option value="50">50 KG</option>
                                                <option value="80">80 KG</option>
                                            </select>
                                        </div>

                                        <div class="form-group ">
                                            <input type="hidden" name="date" class="form-control" value="<?php echo date('d-M-Y'); ?>">
                                        </div>                                   
                                        
                                        <div class="form-group">
                                            <label>বস্তার পরিমান </label>
                                            <input type="number" name="quantity" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label>বস্তার দাম</label>
                                            <input type="text" name="price" class="form-control" placeholder=" amount">
                                        </div>
                                   
                                        <input type="submit" name="sell" class="btn btn-success">

                                    </form>

                                    <div style="margin-top: 50px; border-top: 1px solid gray; padding-bottom: 50px"></div>
                                    <!-- /////////// -->
                                    <h3 class="text-center">Add Product</h3>
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Product Name </label>
                                            <input type="text" name="name" class="form-control" placeholder="Customer Name">
                                        </div>

                                       <div class="form-group">
                                            <label>Product Type</label>
                                            <select class="form-control" name="type">
                                                <option value="miniket">miniket</option>
                                                <option value="guti">guti</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Product Size</label>
                                            <select class="form-control" name="size">
                                                <option value="10">10 Kg</option>
                                                <option value="25">25 Kg</option>
                                                <option value="50">50 Kg</option>
                                                <option value="80">80 Kg</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Product Price </label>
                                            <input type="text" name="price" class="form-control" placeholder=" amount">
                                        </div>

                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" name="quantity" class="form-control" placeholder="product Quantity">
                                        </div>

                                       <div class="form-group ">
                                            <label>Issue Date </label>
                                            <input type="date" name="issue_date" class="form-control" value="<?php echo date('m/d/Y'); ?>">
                                        </div>
                                   
                                        <input type="submit" name="submit" class="btn btn-success">
                                    </form>
                                </div>
                                
                                <div class="col-lg-6">
                                    <h3 class="text-center">Total pac</h3>

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
