  //document.designMode = "on";

  function process() {
        document.getElementById("hidden").value = document.getElementById("textarea").innerHTML;
        return true;
      }
      function process2() {
            document.getElementById("hidden2").value = document.getElementById("textarea2").innerHTML;
            return true;
          }

function addlink(){
  var linkURL = prompt('Enter a URL:', 'http://');
  //var sText = document.getSelection().toString();

  document.execCommand("createLink", false, linkURL);
}

function printMe(text) {
     var printContents = document.getElementById(text).innerHTML;
     var y = document.getElementById("page").value;
     document.body.innerHTML = printContents;
     window.print();
   document.location.href = "edit_page.php?id=" + y;
}
function changeBG(color){
  var clr = document.getElementById(color).value;
  document.execCommand("backColor", false, clr);

}

function changeFC(color){
  var clr = document.getElementById(color).value;
  document.execCommand("foreColor", false, clr);

}
