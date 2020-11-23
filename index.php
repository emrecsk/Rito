<?php
include_once("connection.php");
?>
<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>Main Page</title>
</head>
<body>
  <div class="w3-container w3-auto w3-small">
      <div class="w3-container w3-blue-grey w3-center">
        <h1>PRODUCTS</h1>
      </div>
      <div class="w3-bar w3-border w3-light-grey">
        <a href="index.php" class="w3-bar-item w3-button w3-border-right">HomePage</a>
        <a href="createpage.php" class="w3-bar-item w3-button w3-border-right">CreatePage</a>
        </div>
        <div class="w3-responsive w3-card-4">
        <table class="w3-table-all w3-hoverable w3-small">
          <thead>
            <tr class="w3-blue-grey">
              <th>Product Reference</th>
              <th>Product Price</th>
              <th>Product Description Name</th>
              <th>Product Short Description</th>
              <th>Product Description</th>
              <th>Product Options</th>
            </tr>
          </thead>
          <?php
          //SELECT products.products_id, products.products_reference, products.products_price, products_description.products_description_id, products_description.products_description_name, products_description.products_description_short_description, products_description.products_description_description FROM products INNER JOIN products_description ON products.products_id = products_description.products_description_id
          //SELECT products.products_reference, products.products_price, products_description.products_description_id, products_description.products_id,  products_description.products_description_name, products_description.products_description_short_description, products_description.products_description_description FROM products RIGHT JOIN products_description ON products.products_id = products_description.products_description_id
          //SELECT products.products_reference, products.products_price, products_description.products_description_id, products_description.products_id,  products_description.products_description_name, products_description.products_description_short_description, products_description.products_description_description FROM products RIGHT JOIN products_description ON products.products_id = products_description.products_description_id
$query = mysqli_query($conn, "SELECT products.products_reference, products.products_price, products_description.products_description_id, products_description.products_description_name, products_description.products_description_short_description, products_description.products_description_description, languages.languages_name FROM products_description INNER JOIN products ON products.products_id = products_description.products_id JOIN languages ON languages.languages_id = products_description.languages_id ");
              while ($rslt = mysqli_fetch_array($query)) {
              $a=$rslt['products_reference'];
              $b=$rslt['products_price'];
              $c=$rslt['products_description_name'];
              $d=$rslt['products_description_short_description'];
              $e=$rslt['products_description_description'];
              $f=$rslt['products_description_id'];

                echo "<tr><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td><td><a href='edit_page.php?id=$f'><input class='w3-button w3-gray w3-round-large w3-card-2 w3-hover-light-green' type='button' value='Edit'</a><a href='delete.php?id1=$f' onClick=\"return confirm('Are you sure want to delete this record?');\"'><input class='w3-button w3-gray w3-round-large w3-margin-left w3-card-2 w3-hover-red' type='button' value='Delete'</a></td></tr>";
            }
            mysqli_free_result($query);
            mysqli_close($conn);
          ?>
        </table>
        </div>
        <div class="w3-container w3-card w3-bar w3-center w3-light-grey">
          Created by Emre Coskun
        </div>
  </div>
</body>
</html>
