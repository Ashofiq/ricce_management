<?php include('header.php'); ?>
<?php include('class.php');
      $db = new class_();

  ?>
<?php 
	$result_per_page = 10;
	$sql = "SELECT * from customer";
	$obj = $db->select($sql);
	$result = mysqli_num_rows($obj);

	$num_of_pages = ceil($result/$result_per_page);
	echo $num_of_pages;


	if (!isset($_GET['page'])) {
		$page = 1;
	 
	}
?>

<div class="container">
	<form>
	 <div class="form-row">
	 <div class="col-md-4 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3">@</span>
        </div>
        <input type="text" class="form-control is-valid" onkeyup="showResult(this.value)" id="validationServerUsername" placeholder="Username" aria-describedby="inputGroupPrepend3" required>
        <div id="livesearch"></div>

        <div class="input-group-prepend">
          <input class="btn btn-default " value="Search" type="submit" name="submit" id="inputGroupPrepend3" >
        </div>

        <div class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
    </div>
	</div>
	</form>

	<!-- list customer -->
<table class="table table-bordered">
  <thead>
    <tr style="background-color: #008000;color: white">
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>

  	<?php 
  		$sql = "SELECT * FROM customer order by id desc";
  		$obj = $db->select($sql);
      $i = 1;
  		foreach ($obj as $key => $value) {
 
  	?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $value['f_name']; ?></td>
      <td><?php echo $value['l_name']; ?></td>
      <td><?php echo $value['mbl']; ?></td>
      <td><?php echo $value['address']; ?></td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
</div>
<?php include('footer.php'); ?>