<?php
include_once("connection.php");
?>
<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <title>Create Page</title>
</head>
<body class="">
<div class="w3-auto">
    <div class="w3-container w3-blue-grey">
      <h1>You can create a new product here</h1>
    </div>
    <div class="w3-bar w3-border w3-light-grey">
      <a href="index.php" class="w3-bar-item w3-button w3-border-right">HomePage</a>
      <a href="createpage.php" class="w3-bar-item w3-button w3-border-right">CreatePage</a>
      </div>
      <form class="w3-container w3-light-grey w3-card-4" action="create.php" method="post" onsubmit="return (process()&&process2());">
</br>
<label for="Lang">Choose the language:</label>
<select name="language" class="w3-border w3-round-large w3-input w3-card-2">
<?php     $query = mysqli_query($conn, "SELECT * FROM `languages` ORDER BY `languages`.`languages_id`  DESC");
          while ($rslt = mysqli_fetch_array($query)) {
          $a=$rslt['languages_id'];
          $b=$rslt['languages_name'];

  echo "<option value='$a' selected >$b</option>";
  }
?>
</select></br>
        <label for="pro_ref">Product Reference:</label>
        <input type="text" name="products_reference" class="w3-input w3-border w3-round-large w3-card-2"></br>

        <label for="pro_pri">Product Price:</label>
        <input type="number" name="products_price" class="w3-input w3-border w3-round-large w3-card-2" min="0.00" max="10000000.00" step="0.01" title="Please enter valid price.(Only numbers)"></br>

        <label for="pro_desc_name">Product Name:</label>
        <input type="text" name="products_name" class="w3-input w3-border w3-round-large w3-card-2"></br>

        <label for="pro_desc_short_desc">Product Short Description:</label>
        <div class="editor w3-panel w3-border w3-round-xlarge w3-light-gray w3-card-2">
          <div class="toolbar w3-panel w3-padding-16">
            <button class='fas fa-bold' type="button" style='font-size:24px' onclick="document.execCommand('bold', false, '');" title="BOLD"></button>
            <button class="fas fa-italic" type="button" onclick="document.execCommand('italic', false, '');" style='font-size:24px' title="ITALIC"></button>
            <button class="fas fa-underline" type="button" name="underline" style='font-size:24px' onclick="document.execCommand('underline', false, '');" title="UNDERLINE"></button>
            <button class="fas fa-align-left" type="button" name="left" style='font-size:24px' onclick="document.execCommand('justifyLeft', false, '');" title="LEFT JUSTIFY"></button>
            <button class="fas fa-align-center" type="button" name="center" style='font-size:24px' onclick="document.execCommand('justifyCenter', false, '');" title="CENTER"></button>
            <button class="fas fa-align-right" type="button" name="right" style='font-size:24px' onclick="document.execCommand('justifyRight', false, '');" title="RIGHT JUSTIFY"></button>
            <button class="fas fa-align-justify" type="button" name="justify" style='font-size:24px' onclick="document.execCommand('justifyFull');" title="JUSTIFY"></button>
            <button class="fas fa-link" type="button" name="link" style='font-size:24px' onclick="addlink()" title="ADD LINK"></button>
            <button class="fas fa-cut" type="button" name="cut" style='font-size:24px' onclick="document.execCommand('cut', false, '');" title="CUT"></button>
            <button class="fas fa-print" type="button" name="print" style='font-size:24px' onclick="printMe('textarea'); return false;" title="PRINT TEXT"></button>
            <input type="hidden" id="page" value="7">
            <button class="fas fa-strikethrough" type="button" name="button" style='font-size:24px' onclick="document.execCommand('strikeThrough', false, '');" title="STRIKETHROUGH"></button>
            <button class="fas fa-list-ol" style='font-size:24px'onclick="document.execCommand('insertOrderedList', false, '');" title="ORDERED LIST"></button>
            <button class="fas fa-list-ul" style='font-size:24px'onclick="document.execCommand('insertUnorderedList', false, '');" title="INORDERED LIST"></button>
            <button class="fas fa-trash-alt" style='font-size:24px'onclick="document.execCommand('delete', false, '');" title="DELETE"></button>
            <button class="fas fa-indent" style='font-size:24px'onclick="document.execCommand('insertParagraph', false, '');"></button>
              <div class="w3-container">
                <br><input type="color" id="BGColor" title="Pick color what you want to change" onchange="changeBG('BGColor')"><label> - Change the background color of your text </label>
                <br><input type="color" id="FCColor" title="Pick color what you want to change" onchange="changeFC('FCColor')"><label> - Change your text color</label>
              </div>
          </div>
          <input type="hidden" id="hidden" name="products_short" value="">
          <div class="w3-padding-16" >
            <div class="content-area w3-white w3-card w3-border w3-round-xlarge" id="textarea" style="height:200px; width:100%; padding:15px" contenteditable="true">

            </div>
          </div>
        </div>


        <label for="pro_desc">Product Description:</label>
        <div class="editor w3-panel w3-border w3-round-xlarge w3-light-gray w3-card-2">
          <div class="toolbar w3-panel w3-padding-16">
            <button class='fas fa-bold' type="button" style='font-size:24px' onclick="document.execCommand('bold', false, '');" title="BOLD"></button>
            <button class="fas fa-italic" type="button" onclick="document.execCommand('italic', false, '');" style='font-size:24px' title="ITALIC"></button>
            <button class="fas fa-underline" type="button" name="underline" style='font-size:24px' onclick="document.execCommand('underline', false, '');" title="UNDERLINE"></button>
            <button class="fas fa-align-left" type="button" name="left" style='font-size:24px' onclick="document.execCommand('justifyLeft', false, '');" title="LEFT JUSTIFY"></button>
            <button class="fas fa-align-center" type="button" name="center" style='font-size:24px' onclick="document.execCommand('justifyCenter', false, '');" title="CENTER"></button>
            <button class="fas fa-align-right" type="button" name="right" style='font-size:24px' onclick="document.execCommand('justifyRight', false, '');" title="RIGHT JUSTIFY"></button>
            <button class="fas fa-align-justify" type="button" name="justify" style='font-size:24px' onclick="document.execCommand('justifyFull');" title="JUSTIFY"></button>
            <button class="fas fa-link" type="button" name="link" style='font-size:24px' onclick="addlink()" title="ADD LINK"></button>
            <button class="fas fa-cut" type="button" name="cut" style='font-size:24px' onclick="document.execCommand('cut', false, '');" title="CUT"></button>
            <button class="fas fa-print" type="button" name="print" style='font-size:24px' onclick="printMe('textarea'); return false;" title="PRINT TEXT"></button>
            <input type="hidden" id="page" value="7">
            <button class="fas fa-strikethrough" type="button" name="button" style='font-size:24px' onclick="document.execCommand('strikeThrough', false, '');" title="STRIKETHROUGH"></button>
            <button class="fas fa-list-ol" style='font-size:24px'onclick="document.execCommand('insertOrderedList', false, '');" title="ORDERED LIST"></button>
            <button class="fas fa-list-ul" style='font-size:24px'onclick="document.execCommand('insertUnorderedList', false, '');" title="INORDERED LIST"></button>
            <button class="fas fa-trash-alt" style='font-size:24px'onclick="document.execCommand('delete', false, '');" title="DELETE"></button>
            <button class="fas fa-indent" style='font-size:24px'onclick="document.execCommand('insertParagraph', false, '');"></button>
              <div class="w3-container">
                <br><input type="color" id="BGColor2" title="Pick color what you want to change" onchange="changeBG('BGColor2')"><label> - Change the background color of your text </label>
                <br><input type="color" id="FCColor2" title="Pick color what you want to change" onchange="changeFC('FCColor2')"><label> - Change your text color</label>
              </div>
          </div>
          <input type="hidden" id="hidden2" name="products_desc" value="">
          <div class="w3-padding-24" >
            <div class="content-area w3-white w3-card w3-border w3-round-xlarge" id="textarea2" style="height:200px; width:100%; padding:15px" contenteditable="true">

            </div>
          </div>
        </div>

        <button type="submit" name="CREATE" class="w3-button w3-blue-grey w3-margin">CREATE</button>
    </form>
    <div class="w3-container w3-card w3-bar w3-center w3-light-grey">
      Created by Emre Coskun
    </div>
    </div>
    <script type="text/javascript" src="wysiwyg.js"></script>
</body>
<footer>
</footer>
</html>
