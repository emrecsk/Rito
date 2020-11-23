<?php
include_once("connection.php");
session_start();
mysqli_query($conn, "UPDATE products SET products_reference = '{$_POST['product_ref']}', products_price = '{$_POST['product_pri']}' WHERE `products`.`products_id` = '".$_SESSION['product_id']."' ");
mysqli_query($conn, "UPDATE products_description SET products_description_name = '{$_POST['product_name']}', products_description_short_description = '{$_POST['short']}', products_description_description='{$_POST['product_desc']}' WHERE `products_description`.`products_description_id` = '".$_SESSION['product_description_id']."' ");
header("refresh:3;url=http://localhost/WebUdvikler/index.php");
mysqli_close($conn);
?>
<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>Edit Page</title>
</head>
<body>
  <div class="w3-container">
  <p class="w3-tag w3-xlarge">Please wait, the changes will update.</p>
</div>
</body>
</html>
