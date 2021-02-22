<?php

$display_image = false;
if(isset($_COOKIE['image_name'])){
  $display_image = true;
  $last_image = scandir('images',SCANDIR_SORT_DESCENDING);
  $last_image = $last_image[0];
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <div class="container-fluid ">
    <!-- -----------image ---------------- -->
    <div class="row">
      <div class="col-lg-9 text-center mt-3">
        <?php if(!$display_image): ?>
        <div class="center">

          <p class="text-white">Please upload Image to start detection</p>
        </div>
        <?php else: ?>
        <img src="images/<?= $last_image ?>" class="img" alt="image_to_detect">
        <?php endif ?>
      </div>
<!-- ---------------- image end ------------------- -->

<!-- -------------------- RGB col ----------------------------- -->
      <div class="col-lg-3">
        <div class="card m-2 p-5">
          <div class="card-body">
            <h5 class="card-title">50%</h5>
          </div>
        </div>
        <div class="card m-2 p-5 ">
          <div class="card-body">
            <h5 class="card-title">20%</h5>
          </div>
        </div>
        <div class="card m-2 p-5 ">
          <div class="card-body">
            <h5 class="card-title">10%</h5>
          </div>
        </div>
        <div class="card m-2 p-5">
          <div class="card-body">
            <h5 class="card-title">10%</h5>
          </div>
        </div>

      </div>
      <!-- --------------------- RGB cols end --------------------- -->
    </div>


    <!-- ----------------- main form row ----------------- -->
    <div class="row">
      <div class="col-lg-12">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
          <div class="row mt-3">
            <div class="col-lg-9">
              <input class="form-control" type="file" name="image" id="fileToUpload">
            </div>
            <div  class="col-lg-3 pr-5 ">
              <div  class="">
                <button class="btn btn-primary bt-lg w-100" type="submit" name="submit">Uplaod</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- ------------- main form row end ---------------- -->

  </div>


</body>

</html>