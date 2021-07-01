<?php
session_start();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'Vinder');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

//pop up alert message
function alert_msg($message) { 
  echo "<script>alert('$message');</script>";
}

//send forgot password mail
if (isset($_POST['Forgot'])){
   $username = $_POST['email'];
   $query = "SELECT * FROM users WHERE username='$username'";
   $results = mysqli_query($db, $query);

   //if username exists
   if (mysqli_num_rows($results) == 1) {
           //retrieve and store password and send mail
           $q = mysqli_query( $db, "SELECT password FROM users where username = '$username'");
           $result = mysqli_fetch_assoc($q);
           $password = $result['password'];
           $recipient="$username";
           $subject="Forgot Password";
           $mail_body="Your password for the account ".$username." is ".$password;  
         }
 
  //check if mail is sent
  if (mail($recipient, $subject, $mail_body)) {
     $_SESSION['error'] = "yes";
     $_SESSION['errormsg'] = "Mail successfully sent!";
     header("Location: login.php");
  } 
  else {
     $_SESSION['error'] = "yes";
     $_SESSION['errormsg'] = "Mail delivery failed! Enter valid username.";
     header("Location: login.php");
  }
}

// REGISTER USER
if (isset($_POST['Reg_user'])) {

  // receive all input values from the form
  $username = htmlspecialchars($_POST['email']);
  $fname = htmlspecialchars($_POST['fname']);
  $lname = htmlspecialchars($_POST['lname']);
  $bdate = htmlspecialchars($_POST['bdate']);
  $gender = htmlspecialchars($_POST['gender']);
  $location = htmlspecialchars($_POST['location']);
  $psw = htmlspecialchars($_POST['psw']);
  $rpsw = htmlspecialchars($_POST['rpsw']);
  $dob = new DateTime($bdate);
  $now = new DateTime();
  $difference = $now->diff($dob);
  $age = $difference->y;
  $image = $_FILES['upFile']['name'];         //store name of the image
  $target = "images/".basename($image);	      //target directory

  //age constraint
  if ($age<18) { 
          $_SESSION['error'] = "yes";
          $_SESSION['errormsg'] = "You need to be 18 to signup!"; 
          header("Location: login.php");}

  //validating email address
  if (!filter_var($username, FILTER_VALIDATE_EMAIL)){ 
          $_SESSION['error'] = "yes";
          $_SESSION['errormsg'] = "Not a valid email address!"; 
          header("Location: login.php");}

  
  //passwords not matching
  if ($psw != $rpsw) { 
          $_SESSION['error'] = "yes";
          $_SESSION['errormsg'] = "The two passwords do not match"; 
          header("Location: login.php");}

  //validating uploaded file type
  $allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
  if (in_array($_FILES['upFile']['type'], $allowed)) {
        //move image
	if (!move_uploaded_file($_FILES['upFile']['tmp_name'], $target)){
  	        $_SESSION['error'] = "yes";
                $_SESSION['errormsg'] = "Failed to upload image";
  	}
			
  } 
  else {
	$_SESSION['error'] = "yes";
        $_SESSION['errormsg'] = "Please upload a JPEG or PNG image"; 
        header("Location: login.php");
  }

  //check if username is unique
  $user_check_query = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { 
    if ($user['username'] === $username) {
      $_SESSION['error'] = "yes";
      $_SESSION['errormsg'] = "Username already exists!";
      header("Location: login.php");
    }
  }

  // Register the user if there are no errors in the form
  if ($_SESSION['error'] != "yes") {
	$psw = md5($psw);                    //encrypt password before storing
  	$query = "INSERT INTO users (username, fname, lname, gender, age, bdate, password, location, photo)
  			  VALUES('$username', '$fname','$lname','$gender','$age','$bdate','$psw','$location','$image')";
	mysqli_query($db, $query);
  	$_SESSION['error'] = "yes";
        $_SESSION['errormsg'] = "Registration Successful!! Now you can login using your credentials";
  	header("Location: login.php");
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
        $username = $_POST['email'];
        $psw = $_POST['psw'];
        $psw = md5($psw);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$psw'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  header('location: index.php');
       }
else{  
          $_SESSION['error'] = "yes";
          $_SESSION['errormsg'] = "Wrong username/password combination";
          header('location: login.php');
       }
}
?>