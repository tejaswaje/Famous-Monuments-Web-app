<?php
  define('ROOT_URL', 'http://localhost/Sample_Website/');
	$conn = mysqli_connect('localhost', 'root', 'Tw14091995', 'famous_monuments');

  if (mysqli_connect_errno()) {

    echo "Failed to connect to DB";
  }
	$query = 'SELECT * FROM monuments';

	$result = mysqli_query($conn, $query);

	$monuments = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);
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

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="insert.php">Add Monument</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>
<div class="list-group">

<?php foreach ($monuments as $monument): ?>
  <div class="card mb-3">
    <h3 class="card-header"><?php echo $monument['name']; ?></h3>
    <div class="card-body">
      <h5 class="card-title"><?php echo $monument['place']; ?></h5>
    </div>
    <div class="card-body">
      <p class="card-text"><?php echo $monument['details']; ?></p>
      <a href="<?php echo ROOT_URL; ?>edit.php?id=<?php echo $monument['id']; ?>" clss="btn btn-default"> Edit</a>


    </div>
  </div>
<?php endforeach; ?>
  </body>
</html>
