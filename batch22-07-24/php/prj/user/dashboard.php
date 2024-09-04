<?php
require_once dirname(__DIR__) . "/layouts/user/header.php";
;
?>



<div class="container p-5">
 <h1>DASHBOARD</h1>
 <form class="text-bg-dark p-5 " action="<?php echo insert_form_action ?>" method="post">

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

  <input type="submit" name="inserts" class="btn btn-primary">

 </form>

</div>


<div class="table-responsive container " style="cursor: pointer;">
 <?php
 $all = "SELECT * FROM `" . USER . "`";

 $exe = conn->query($all);

 if ($exe->num_rows > 0) {
  # code...
 
  ?>


  <table class="table table-dark table-hover table-bordered">
   <thead>
    <tr>
     <th scope="col">#</th>
     <th scope="col">USER NAME</th>
     <th scope="col">EMAIL</th>
     <th scope="col">ACTION</th>
    </tr>
   </thead>

   <tbody>
    <?php
    while ($row = $exe->fetch_assoc()) {

     // http://localhost/BATCH_22_JULY_2024/prj/user/edit.php?id=3
     // http://localhost/BATCH_22_JULY_2024/prj/user/edit.php?qwer=3
     //  URI 
     //  query parameter 
     ?>
     <tr class="">
      <td scope="row"> <?php echo $row["id"] ?></td>
      <td> <?php echo $row["user_name"] ?></td>
      <td><?php echo $row["email"] ?></td>
      <td>
       <a href="<?php echo EDIT_FORM ?>?id=<?php echo $row["id"] ?>" class="btn btn-sm btn-info">
        EDIT 
       </a>
      </td>
     </tr>
    <?php } ?>
   </tbody>
  </table>


 <?php } else { ?>


  <h1> NO RECORD FOUND</h1>
 <?php } ?>
</div>




<?php
require_once dirname(__DIR__) . "/layouts/user/footer.php";
;
?>