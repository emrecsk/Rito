<?php include_once("connection.php");

$sql ="DELETE FROM products_description WHERE products_description_id='".$_GET['id1']."'; ";

if (mysqli_query($conn, $sql)) {
  header("Location: http://localhost/WebUdvikler/index.php");
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
