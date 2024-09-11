<?php
require_once dirname(__DIR__) . "/layouts/user/header.php";
echo rel_url;
?>



<div class="container p-5">
 <h1>DASHBOARD</h1>

 <form class="text-bg-dark p-5" enctype="multipart/form-data" action="<?php echo insert_form_action ?>" method="post">

  <div class="mb-3">
   <label for="" class="form-label">Choose file</label>
   <input type="file" class="form-control" name="images" id="" placeholder="" aria-describedby="fileHelpId" />
   <div id="fileHelpId" class="form-text">Help text</div>
  </div>

  <input type="submit" name="uploads" value="upload">


 </form>

 <br>
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
     <th scope="col">IMAGE</th>
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
     $address_fetch = "SELECT * FROM `" . ADDRESS . "` WHERE `user_id`='{$row["id"]}'";

     $address_fetch_exe = conn->query($address_fetch);

     if ($address_fetch_exe->num_rows > 0) {


      $addres_row = $address_fetch_exe->fetch_assoc();


      $image = json_decode($addres_row["images"], true);

      if (isset($image) && !empty($image)) {
       $address_data = [
        "image" => $image["abs_path"],
        "address" => $addres_row["address"]
       ];
      } else {
       $address_data = [
        "image" => abs_url . "assets/default.jpg",
        "address" => $addres_row["address"]
       ];
      }




     } else {
      $address_data = [
       "image" => abs_url . "assets/default.jpg",
       "address" => "null"
      ];
     }

     ?>
     <tr class="">
      <td scope="row"> <?php echo $row["id"] ?></td>
      <td scope="row">
       <a href="<?php echo $address_data["image"] ?>" target="_blank">
        <img src="<?php echo $address_data["image"] ?>" class="img-responsive " width="100" height="100" alt="">

       </a>


      </td>
      <td> <?php echo $row["user_name"] ?></td>
      <td><?php echo $row["email"] ?></td>
      <td>
       <a href="<?php echo EDIT_FORM ?>?id=<?php echo $row["id"] ?>" class="btn btn-sm btn-info">
        EDIT
       </a>
       <?php
       $user_id = $row["id"];
       ?>
       <!-- Button trigger modal -->
       <a type="button" class="btn btn-sm btn-danger" onclick="ONdelete('<?php echo $user_id ?>')">
        delete
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




<!-- Modal -->
<div class="modal fade" id="delete_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <h1>ARE YOU SURE <span class="text-danger"> ! </span></h1>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>

    <form action="<?php echo delete_form_action; ?>" method="post">
   
     <input type="hidden" name="_token" id="_token" value="testing">

     <input type="submit" name="deletes" value="YES" class="btn btn-primary">
   
    </form>

   </div>
  </div>
 </div>
</div>

<?php
require_once dirname(__DIR__) . "/layouts/user/footer.php";
;
?>

<script>

 function ONdelete(id) {
  let MyModal = document.querySelector("#delete_modal");

  const myModalAlternative = new bootstrap.Modal(MyModal); // object 

  myModalAlternative.show(MyModal);

  let _token = document.querySelector("#_token");
  _token.value = id;


 }
</script>