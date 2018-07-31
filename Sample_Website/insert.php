<?php
  define('ROOT_URL', 'http://localhost/Sample_Website/');
	$conn = mysqli_connect('localhost', 'root', 'Tw14091995', 'famous_monuments');

  if (mysqli_connect_errno()) {

    echo "Failed to connect to DB";
  }
  // Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$place = mysqli_real_escape_string($conn, $_POST['place']);
		$details = mysqli_real_escape_string($conn,$_POST['details']);

    $query = "INSERT INTO monuments(name, place,details) VALUES('$name', '$place', '$details')";

		if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>
<html>
  <head>
    <title> Famous Monuments </title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">Famous Monuments</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
  <div class="container">
		<h1>Add Monument</h1>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Place</label>
				<input type="text" name="place" class="form-control">
			</div>
			<div class="form-group">
				<label>Details</label>
				<textarea name="details" class="form-control"></textarea>
			</div>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>
  </body>
</html>
