<?php
require_once dirname(__DIR__) . "/layouts/user/header.php";
// http://localhost/BATCH_22_JULY_2024/prj/user/edit.php?id=3


if (!isset($_GET["id"]) || empty($_GET["id"])) {
  redirect_url(DASHBOARD);
}

$userID = filterData($_GET["id"]);


$editCheck = "SELECT * FROM `" . USER . "`  WHERE `id`='{$userID}' ";

$exe_edit = conn->query($editCheck);

if ($exe_edit->num_rows > 0) {

  $row_edit = $exe_edit->fetch_assoc();
} else {
  redirect_url(DASHBOARD);
}
?>

<!-- http://localhost/BATCH_22_JULY_2024/prj/user/edit.php?id=3 -->

<div class="container p-5">
  <h1>DASHBOARD EDIT</h1>
  <form class="text-bg-dark p-5 " enctype="multipart/form-data" action="<?php echo update_form_action ?>" method="POST">

    <input type="hidden" value="<?php echo base64_encode($row_edit["id"]) ?>" name="_token">
   
   


    <div class="mb-3 ">
      <label for="exampleInputEmail1" class="form-label">USER NAME</label>

      <input type="text" value="<?php echo $row_edit["user_name"] ?>" class="form-control" name="user_name"
        id="exampleInputEmail1" aria-describedby="emailHelp">

      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3 ">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" value="<?php echo $row_edit["email"] ?>" class="form-control" name="email"
        id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="text" value="<?php echo base64_decode($row_edit["ptoken"]) ?>" name="pswd" class="form-control"
        id="exampleInputPassword1">
    </div>


    <div class="mb-3">
      <label for="" class="form-label">Choose file</label>
      <input type="file" class="form-control" name="images" id="" placeholder="" aria-describedby="fileHelpId" />
      <div id="fileHelpId" class="form-text">Help text</div>
    </div>


    <!-- ============================================= -->
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>

    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

    <input type="submit" name="updates" value="UPDATE" class="btn btn-primary">

  </form>

</div>





<?php
require_once dirname(__DIR__) . "/layouts/user/footer.php";
;
?>