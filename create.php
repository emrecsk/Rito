<?php
include_once("connection.php");

$sql = "INSERT INTO products ( products_reference, products_price) VALUES ('{$_POST['products_reference']}', {$_POST['products_price']});";
mysqli_query($conn, $sql);
$res_id = $conn->insert_id;
$sql1 = "INSERT INTO products_description ( products_id, languages_id, products_description_name, products_description_short_description, products_description_description) VALUES ($res_id, {$_POST['language']}, '{$_POST['products_name']}', '{$_POST['products_short']}', '{$_POST['products_desc']}');";

if (mysqli_query($conn, $sql1)) {
  
header("Location: http://localhost/WebUdvikler/index.php");
}
else{
echo("Bir sorun oluştu.");
 echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>Create Page</title>
</head>
<body>
  <div class="w3-container">
  <p class="w3-tag w3-xlarge">Please wait...</p>
</div>
</body>
</html>
