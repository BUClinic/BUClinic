

 <form action="action_page.php" style="border:1px solid #ccc" method="POST">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b>Firstname</b></label>
    <input type="text" placeholder="Enter Firstname" name="fname" required>

    <label for="mname"><b>Middlename</b></label>
    <input type="text" placeholder="Enter Middlename" name="mname" required>

     <label for="lname"><b>Lastname</b></label>
    <input type="text" placeholder="Enter Lastname" name="lname" required><br>

     <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

     <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

     <label for="position"><b>Position</b></label>
    <input type="text" placeholder="Enter Position" name="position" required>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn" name="cancel">Cancel</button>
      <button type="submit" class="signupbtn" name="save">Sign Up</button>
    </div>
  </div>
</form> 