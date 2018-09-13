<?php include('header.php'); ?>

	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <h1 class="page-header">Dashboard</h1> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
<?php 
    if (isset($_POST['submit'])) {
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $email = $_POST['email'];
        $mbl = $_POST['mbl'];
        $address = $_POST['address'];

        $sql = "INSERT INTO customer(f_name, l_name, email, mbl, address) VALUES('$f_name','$l_name','$email','$mbl','$address')";

        $db->add_customer($sql);
    }
?>


    <a href="customer_list.php"><div class="pull-left btn btn-success">Customer list</div></a> 
    <div class="row">
        <div class="text-center"><h2>Add New Customer</h2></div>
    <form method="post">
      <div class="form-group col-md-8">
        <label for="exampleInputEmail1">First name</label>
        <input type="text" name="f_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First name">
      </div>

      <div class="form-group col-md-8">
        <label for="exampleInputEmail1">Last name</label>
        <input type="text" name="l_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Last name">
      </div>

      <div class="form-group col-md-8">
        <label for="exampleInputEmail1">E-mail</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-mail">
      </div>

      <div class="form-group col-md-8">
        <label for="exampleInputEmail1">Mobile</label>
        <input type="text" name="mbl" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile">
      </div>

      <div class="form-group col-md-8">
        <label for="exampleInputEmail1">Address</label>
        <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
      </div>

      <div class="form-group col-md-8">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
    
           
    </div>

<?php include('footer.php'); ?>