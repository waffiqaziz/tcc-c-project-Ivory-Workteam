<?php
   $host = 'localhost';
   $user = "root";
   $pass = '';
   $database = "ivory";
 
   $conn = mysqli_connect($host, $user, $pass, $database);
   if ( !$conn )
   {
       echo "Koneksi Gagal";
       exit;
   } 
?>
