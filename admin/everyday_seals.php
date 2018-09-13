<?php include('header.php'); ?>

<?php 
    if (isset($_POST['submit'])) {
        $name    = $_POST['name'];
        $mbl     = $_POST['mbl'];
        $address = $_POST['address'];
        $date    = $_POST['date'];
        $month   = $_POST['month'];
        $year    = $_POST['year'];
        $due_date = $_POST['due_date'];
        $product_category = $_POST['product_category'];
        $sell    = $_POST['sell'];
        $due    = $_POST['due'];
        $item    = $_POST['item'];
        $price    = $_POST['price'];

        $sql = "INSERT INTO everyday_seals (name, mbl, address, date, month, year, due_date, product_category, sell,due, item, price) VALUES ('$name', '$mbl','$address', '$date', '$month','$year','$due_date','$product_category', '$sell','$due', '$item', '$price')";

        $obj = $db->add_everyday_seals($sql);

        
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
                                        <div class="form-group">
                                            <label>Customer Name </label>
                                            <input type="text" name="name" class="form-control" placeholder="Customer Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Customer Mobile</label>
                                            <input type="text" name="mbl" class="form-control" placeholder="Customer Mobile">
                                        </div>

                                        <div class="form-group">
                                            <label>Customer Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Customer Address">
                                        </div>

                                        <div class="form-group ">
                                            <input type="hidden" name="date" class="form-control" value="<?php echo date('d'); ?>">
                                        </div>

                                        <div class="form-group ">
                                            <input type="hidden" name="month" class="form-control"  value="<?php echo date('m'); ?>">
                                        </div>

                                        <div class="form-group ">
                                            <input type="hidden" name="year" class="form-control"  value="<?php echo date('Y'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Due date</label>
                                            <input type="date" name="due_date" class="form-control" placeholder="Customer Address">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Product</label>
                                            <select class="form-control" name="product_category">
                                                <option value="chini gura">chini gura</option>
                                                <option value="bashmoti">bashmoti</option>
                                                <option value="athash">athash</option>
                                                <option value="miniket">miniket</option>
                                                <option value="guti">guti</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Product</label>
                                            <select class="form-control" name="sell">
                                                <option value="nogot">nogot</option>
                                                <option value="baki">baki</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Due </label>
                                            <input type="text" name="due" class="form-control" placeholder="Due amount">
                                        </div>

                                        <div class="form-group">
                                            <label>Item </label>
                                            <input type="number" name="item" class="form-control" value="1">
                                        </div>

                                        <div class="form-group">
                                            <label>Price </label>
                                            <input type="text" name="price" class="form-control" placeholder=" amount">
                                        </div>
                                   
                                        <input type="submit" name="submit" class="btn btn-success">
                                    </form>
                                </div>
                                
                                <div class="col-lg-6">
                                    <h3 class="text-center">Recent sell</h3>
                                    <ul class="list-group">
                    <?php 

                        $query = "SELECT * from everyday_seals order by id desc";
                        $all = $db->select($query);
                        if ($all) {
                            $i = 1;
                            while ($row = $all->fetch_assoc()) {
                    ?>
                                      <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?php echo  $row['name']; ?>
                                        <span class="badge badge-primary badge-pill"><a href='print.php?id=<?php echo $row['id'] ?>' target='blank'><button>Print</button></a></span>
                                      </li>
                    <?php } } ?>
                                    
                                    </ul>
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