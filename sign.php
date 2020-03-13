<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
  $nav = 'includes/nav.php';
} elseif ($_SESSION['logged_in'] == 'True') {
  header('Location: index');
} else {
  $nav = 'includes/navconnected.php';
  $idsess = $_SESSION['id'];
}
error_reporting(0);

require 'includes/header.php';
require $nav; ?>

<!-- <style>
  body {
    font-family: Arial;
  }

  /* Style the tab */
  .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
  }

  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #ccc;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
  }
</style> -->

<div class="container-fluid center-align sign">
  <div class="container">

    <div class="row">
      <div class="col s12">
        <!-- Tab content -->
        <div id="London" class="tabcontent">
          <h3>Sign In</h3>
          <form class="col s12" method="POST">
            <div class="input-field col s12">
              <i class="material-icons prefix">email</i>
              <input id="icon_prefix" type="text" name="emaillog" class="validate">
              <label for="icon_prefix">Email</label>
            </div>
            <div class="input-field col s12 meh">
              <i class="material-icons prefix">lock</i>
              <input id="icon_prefix" type="password" name="passworddb" class="validate">
              <label for="icon_prefix">Password</label>
            </div>

            <?php require 'includes/loginconfirmation.php'; ?>
            <div class="center-align">
              <button type="submit" name="login" class="btn button-rounded waves-effect waves-light ">Login</button>

              <br>
              <br>
            </div>
          </form>
        </div>
        <br>
        <br>

        <hr />
        <h3>Sign Up</h3>
        <form class="col s12" method="POST" enctype="multipart/form-data">
          <div class="row">

            <!-- <div class="input-field col s6">
              <i class="fa fa-product-hunt prefix"></i>
              <input id="icon_prefix" type="text" class="validate" name="av">
              <label for="icon_prefix">Item name</label>
            </div> -->


            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="email" type="text" name="email" class="validate" required>
              <label for="email">Email</label>
            </div>
            <div class="input-field col s6">
              <select class="icons" name="country">
                <option value="" disabled>Choose your country</option>
                <option value="Morocco" selected>Morocco</option>
                <option value="Egypt">Egypt</option>
                <option value="Algeria">Algeria</option>
              </select>
              <!-- <label>Country</label> -->
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="firstname" type="text" name="firstname" class="validate" required>
              <label for="firstname">First Name</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input id="lastname" type="text" name="lastname" class="validate" required>
              <label for="lastname">Last Name</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">lock</i>
              <input id="icon_prefix" type="password" name="password" class="validate value1" required>
              <label for="icon_prefix">Password</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">lock</i>
              <input id="icon_prefix" type="password" name="confirmation" class="validate value2" required>
              <label for="icon_prefix">Confirm Password</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">business</i>
              <input id="icon_prefix" type="text" name="city" class="validate" required>
              <label for="icon_prefix">City</label>
            </div>

            <div class="input-field col s6 meh">
              <i class="material-icons prefix">location_on</i>
              <input id="icon_prefix" type="text" name="address" class="validate" required>
              <label for="icon_prefix">Address</label>
            </div>

            <div class="center-align col s12">
              <button type="submit" id="confirmed" name="signup" class="btn meh button-rounded waves-effect waves-light ">Sign up</button>
            </div>

            <br>
          </div>

          <p>By Registering, you agree that you've read and accepted our <a href="">User Agreement</a>,
            you're at least 18 years old, and you consent to our <a href="">Privacy Notice and receiving</a>
            marketing communications from us.</p>
          <!-- <button type="submit" name="signup" class="btn button-rounded waves-effect waves-light ">Sign Up</button> -->
        </form>
      </div>
      <?php
      if (isset($_POST['signup'])) {
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $encryptedpass = $password;

        include 'db.php';
        //connecting & inserting data
        $query = "INSERT INTO users(email,firstname,lastname,password,address,city,country,role)
        VALUES ('$email','$firstname','$lastname','$encryptedpass','$address','$city','$country','client')";

        if ($connection->query($query) === TRUE) {
          echo "<div class='center-align'>
               <h5 class='black-text'>Welcome <span class='green-text'>$firstname</span> Please Log In</h5><br><br>
               <a class='button-rounded btn waves-effects waves-light'>Log In</a>
               </div>";
        } else {
          echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
        }

        $connection->close();
      }
      ?>

    </div>
  </div>
</div>


<?php require 'includes/footer.php'; ?>