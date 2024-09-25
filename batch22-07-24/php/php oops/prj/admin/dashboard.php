<?php
require_once dirname(__DIR__) . "/app/database.php";
require_once dirname(__DIR__) . "/layout/admin/header.php";

use App\database\DB as DB;
use App\database\helper as help;
$help = new help();
$r = new DB;


// $t=[
// "email"=>"xyz",
// "password"=>"xyz@gmail.com",
// "ptoken"=>1234
// ]; 


//  $r->inserts("users",$t);


?>

<div class="container p-5">

 <form class="text-bg-dark p-5" id="insert">

  <div class="mb-3">
   <label for="user_name" class="form-label">User Name</label>
   <input type="text" class="form-control" id="user_name" name="userName" aria-describedby="emailHelp">
   <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
   <label for="email" class="form-label">Email address</label>
   <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
   <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
   <label for="pswd" class="form-label">Password</label>
   <input type="password" class="form-control" id="pswd" name="pswd">
  </div>


  <input type="hidden" value="inserts" name="inserts">

  <div class="mb-3 form-check">
   <input type="checkbox" class="form-check-input" id="exampleCheck1">
   <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
 </form>


</div>
<?php


$t = $r->select(USER, "*", null, null, null, true);
if ($t) {
 ?>
 <div class="table-responsive container">
  <table class="table text-center table-striped table-hover table-borderless table-dark align-middle">
   <thead class="table-light">
    <caption>
     USER TABLE
    </caption>
    <tr>
     <th>#</th>
     <th>USERNAME</th>
     <th>EMAIL</th>
    </tr>
   </thead>
   <tbody class="table-group-divider">

    <?php
    $q = $r->getResult();
    // $help->pre($q);
   
    foreach ($q as $key => $value) {
     # code...
   

     ?>

     <tr>
      <td scope="row"><?php echo $value["id"] ?></td>
      <td><?php echo $value["user_name"] ?></td>
      <td><?php echo $value["email"] ?></td>
     </tr>
     <?php

    }

    ?>
   </tbody>

  </table>
 </div>
<?php } else { ?>

 <h1>NO RECORD FOUND </h1>

<?php } ?>
<?php
require_once dirname(__DIR__) . "/layout/admin/footer.php";

?>

<script>

 let insertFrom = document.querySelector("#insert");

 insertFrom.addEventListener("submit", async function (e) {

  e.preventDefault();

  let formData = new FormData(insertFrom);

  let url = "<?php echo insert_admin_action; ?>";

  let option = {
   method: "POST",
   body: formData
  };


  let res = await fetch(url, option);

  let data = await res.json();

  console.log(data);

  if (data.error && data.error > 0) {

   for (const key in data.msg) {
    AlertMsg(data.msg[key], "danger", "error")
   }

  }
  else {

   AlertMsg(data.msg, "success", "error")

   setTimeout(() => {
    location.reload()
   }, 1000);

  }

 });


</script>