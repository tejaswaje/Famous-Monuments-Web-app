<?php
  //variables for creating errors
  $msg = '';
  $msgClass = '';
  //check the submit
  if (filter_has_var(INPUT_POST,'submit')){

    //get the values of the feilds
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    //check each feilds
    if(!empty($email) && !empty($email) && !empty($message)){
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
      {
        $msg='Please enter valid email';
        $msgClass='alert-danger';
      }
      else {
        $toEmail = 'wajetejas@gmail.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				}
        else {
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
      }
    }
    else {
      $msg='Please fill in all the feilds';
      $msgClass='alert-danger';
    }
  }
?>
<html>
  <head>
    <title> Contact Us </title>
    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"> Mail Tejas </a>
        </div>
      </div>
    </nav>
    <div class="container">
      <?php if($msg != ''): ?>
        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
      <?php endif; ?>
     <form method="post">
       <div class="form-group">
         <label>Name</label>
         <input type="text" name="name" class="form-control" value = "<?php echo isset($_POST['name']) ? $name : ''; ?>" >
       </div>
       <div class="form-group">
         <label>Email</label>
         <input type="text" name="email" class="form-control" value = "<?php echo isset($_POST['email']) ? $email : '' ; ?>">
       </div>
       <div class="form-group">
         <label>Message</label>
         <textarea name="message" class="form-control" > <?php echo isset($_POST['message']) ? $message : '' ; ?> </textarea>
       </div>
       <br>
       <button type="submit" name="submit" class="btn btn-primary">Submit</button>
     </form>
   </div>

  </body>
</html>
