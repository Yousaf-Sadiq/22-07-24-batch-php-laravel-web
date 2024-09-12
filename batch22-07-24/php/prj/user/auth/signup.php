<?php
require_once dirname(__DIR__) . "/../layouts/user/header.php";
if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])) {
 redirect_url(DASHBOARD);
}
?>



<div class="container p-5">
 <h1>SIGNUP PAGE</h1>

 <!-- <form class="text-bg-dark p-5" enctype="multipart/form-data" action="<?php echo insert_form_action ?>" method="post">

  <div class="mb-3">
   <label for="" class="form-label">Choose file</label>
   <input type="file" class="form-control" name="images" id="" placeholder="" aria-describedby="fileHelpId" />
   <div id="fileHelpId" class="form-text">Help text</div>
  </div>

  <input type="submit" name="uploads" value="upload">


 </form> -->

 <br>
 <form class="text-bg-dark p-5 " action="<?php echo signup_form_action ?>" method="post">

  <div class="mb-3 ">
   <label for="exampleInputEmail1" class="form-label">USER NAME</label>

   <input type="text" class="form-control" name="user_name" id="exampleInputEmail1" aria-describedby="emailHelp">

   <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3 ">
   <label for="exampleInputEmail1" class="form-label">Email address</label>
   <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
   <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
   <label for="exampleInputPassword1" class="form-label">Password</label>
   <input type="password" name="pswd" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3 form-check">
   <input type="checkbox" class="form-check-input" id="exampleCheck1">
   <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

  <input type="submit" name="inserts" value="SIGNUP" class="btn btn-primary">

 </form>

</div>

<?php
require_once dirname(__DIR__) . "/../layouts/user/footer.php";
;
?>