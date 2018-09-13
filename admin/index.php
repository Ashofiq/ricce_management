<?php include('header.php'); ?>

	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                  <h1 class="page-header">Dashboard</h1> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>New Tasks!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Support Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                 <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>তারিখ</th>
                        <th>বস্তার পরিমান</th>
                        <th>বিক্রয় টাকার পরিমান</th>
                        <th>খরচ</th>
                      </tr>
                    </thead>
                    <tbody>
    <?php 
        $sql = "SELECT * FROM everyday_sell_calculate ORDER BY issue_date DESC";
        $res = $db->select($sql);

        foreach ($res as $value) { ?>
            <?php  $date = $value['issue_date']; ?>
                      <tr>
                        <td><?php echo $value['issue_date']; ?></td>
                        <td><?php $result = mysqli_query($db->conn, "SELECT SUM(quantity) as `quantity` from `everyday_sell_calculate` where issue_date ='$date'"); $row = mysqli_fetch_array($result);
                            $count = $row['quantity'];
                            echo $count; ?></td>
                        <td><?php $result = mysqli_query($db->conn, "SELECT SUM(price * quantity) as `quantity` from `everyday_sell_calculate` where issue_date ='$date'"); $row = mysqli_fetch_array($result);
                            $count = $row['quantity'];
                            echo $count; ?></td>
                        <td><?php $result = mysqli_query($db->conn, "SELECT SUM(cost_account) as `cost_account` from `cost` where date ='$date'"); $row = mysqli_fetch_array($result);
                            $count = $row['cost_account'];
                            echo $count; ?></td>
                      </tr>

    <?php } ?>
                    
                    </tbody>
                  </table>

            </div>
            <!-- /.row -->
           
        </div>

<?php include('footer.php'); ?>