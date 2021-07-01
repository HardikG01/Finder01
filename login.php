<?php include('register.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">

  </head>
  <body  class="bg-img" style="background-image: url('backlogi.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
  <marquee behaviour="alternate" direction="right" scrollamount="10"><img src="logos.png" alt="Vinder" width="20%"></marquee>
  
  <img src="logo.png" alt="VINDER" class="centerg">
  <div align='center'>

  <button style="align:center"onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="cancelbtnt"><i><h2>Sign In</h2></i></button>
  
  <button style="align:center"onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="cancelbtnt"><i><h2>Sign Up</h2></i></button>

  </div>
  <div id="id01" class="modal">
  
  <form class="modal-content animate" action="register.php" method="post">
  <div class="imgcontainer">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <img src="logos.png" alt="Avatar" class="avatar">
  </div>
  
  <div class="container">
  <label for="email" color="white"><b>Email Id</b></label>
  <input type="text" placeholder="Enter Email Id" name="email" required>
  
  <label for="psw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw">
  
  <button type="submit" name="login_user">Login</button>
  <label>
  <input type="checkbox" checked="checked" name="remember"><b>Remember me</b>
  </label>
  
  </div>
  
  <div class="container" style="background-color:black">
  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
  <button type="submit" name="Forgot" class="cancelbtnb">Forgot password?</button>
  </div>
  </form>
  </div>
  
  
  
  <div id="id02" class="modal" >
  
  <form class="modal-content animate" action="register.php" method="post" enctype="multipart/form-data">
  <div class="imgcontainer">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <img src="logos.png" alt="Avatar" class="avatar">
  </div>
  
  <div class="container" style="color: white">
  <label for="fname"><b>First Name</b></label>
  <input type="text" placeholder="Enter First Name" name="fname" required>
  
  <label for="lname"><b>Last Name</b></label>
  <input type="text" placeholder="Enter Last Name" name="lname" required>
  
  <label for="bdate"><b>Birthdate:</b></label>
  <input type="date" name="bdate" required>
  <br><br>
  
  <label for="gender"><b>Gender:</b></label>
  <input type="radio" name="gender" value="female" ><font color="pink"><b>Female</b></font>
  <input type="radio" name="gender" value="male"><font color="sky blue"><b>Male</b></font>
  <input type="radio" name="gender" value="other"><font class="rainbow-text"><b>Other</b></font>
  <br><br>
  
  <label for="email"><b>Email ID</b></label>
  <input type="text" placeholder="Enter Email ID" name="email" required>

  <label for="location"><b>City</b></label>
  <input type="text" placeholder="Enter your city" name="location" required>
  
  <label for="psw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required>
  <ol>
  <li>Must have atleast 8 Characters</li>
  <li>Must have a Small Alphabet</li>
  <li>Must have a Capital Alphabet</li>
  <li>Must have a Number</li>
  </ol>
  
  <label for="rpsw"><b>Confirm Password</b></label>
  <input type="password" placeholder="Retype Password" name="rpsw" required>

  <label for="upFile"><b>Upload Profile Picture</b></label>
  <input type="file" name="upFile" id="upFile" accept=".png,.gif,.jpg,.webp" required>

  <br><br>
  <button type="submit" value="REGISTER" name = "Reg_user">Register</button>
  <label>
  
  </form>
  </div>
  
  <?php
  if($_SESSION['error'] == "yes")
  alert_msg($_SESSION['errormsg']);
  unset($_SESSION['error']);
  ?>
  
  <script>
  // Get the modal
  var modal = document.getElementById('id01');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
  if (event.target == modal) {
  modal.style.display = "none";
  }
  }
  // Get the modal
  var modal = document.getElementById('id02');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
  if (event.target == modal) {
  modal.style.display = "none";
  }
  }
// Get the modal
  var modal = document.getElementById('id03');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
  if (event.target == modal) {
  modal.style.display = "none";
  }
  }
  </script>
  </body>
  </html>
  