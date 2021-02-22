<?php
include_once "inc/functions.php";
// i define the max size of a file 
define('UPLOAD_MAX_SIZE', 1024 * 1024 * 5);
$ex = ['jpg', 'jpeg', 'png', 'gif', 'bpm'];

/* 
i'm checking for form submition
and doing some validations on the upload file
*/
$error = true;
if (isset($_POST['submit'])) {

  if ($_FILES['image']['error'] == 0) {

    if (is_uploaded_file($_FILES['image']['tmp_name'])) {

      if ($_FILES['image']['size'] <= UPLOAD_MAX_SIZE) {

        $file_info = pathinfo($_FILES['image']['name']);
        $file_ex = strtolower($file_info['extension']);

        if (in_array($file_ex, $ex)) {

          $error = false;
          $file_name = $_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'], "images/$file_name");
          $palette = colorPalette("images/$file_name", 1); 
          echo "<table>\n"; 
          foreach($palette as $color=>$percent) 
          { 

             echo "<tr><td style='background-color:#$color;width:2em;'>&nbsp;</td><td>#$color - $percent</td></tr>\n"; 
          } 
          echo "</table>\n";
        }
      }
    }
  }
  if ($error) echo '<p>Error uploding this file</p>';
}
