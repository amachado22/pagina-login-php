<?php 

   if(isset($_POST['action'])) {
      $info = json_encode($_POST['action']);
      echo "<script> console.log($info); </script>";
   }
?>