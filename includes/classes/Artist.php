<?php
	class Artist {
		private $con;
		private $id;
		// this is just the first thing that gets call when you create an object
		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}

		public function getName(){
			$artistQuery = mysqli_query($this->con, "SELECT name FROM artists WHERE id='$this->id'");
			$artist = mysqli_fetch_array($artistQuery);
			return $artist['name'];
		}

	}
?>