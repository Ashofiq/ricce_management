<?php 

class Class_{
	
	function __construct(){
		$this->conn();
	}

	public function conn(){
		$this->conn = mysqli_connect('localhost', 'root', '', 'rice');
	}

	public function add_customer($query){
		$queryy = $this->conn->query($query);

		if ($queryy) {
			$msg = "Successfully insert ";
			echo  "<div class='text-center alert alert-success'>".$msg."</div>";
		}else{
			echo mysqli_error($this->conn);
		}
	}


	public function insert($query){
		$queryy = $this->conn->query($query);

		if ($queryy) {
			$msg = "Successfully insert ";
			echo  "<div class='text-center alert alert-success'>".$msg."</div>";
		}else{
			echo mysqli_error($this->conn);
		}
	}


	public function everyday_sell_calculate($query){
		$queryy = $this->conn->query($query);

		if ($queryy) {
			
		}else{
			echo mysqli_error($this->conn);
		}
	}


	// fetch 
	public function select($query){
			
		$result = $this->conn->query($query) or die($this->conn->error.__LINE__);

		if ($result->num_rows > 0 ) {
			return $result;
		}else{
			//return false;
			echo mysqli_error($this->conn);
		}
	}


	// everyday_seals
	public function add_everyday_seals($query){
		$queryy = $this->conn->query($query);

		if ($queryy) {
			$msg = "Successfully insert ";
			echo  "<div class='text-center alert alert-success'>".$msg."</div>";
		}else{
			echo mysqli_error($this->conn);
		}
	}

	// update product
	public function update($query){
		$queryy = $this->conn->query($query);

		if ($queryy) {
			$msg = "Successfully update ";
			echo  "<div class='text-center alert alert-success'>".$msg."</div>";
		}else{
			echo mysqli_error($this->conn);
		}
	}

	

}

