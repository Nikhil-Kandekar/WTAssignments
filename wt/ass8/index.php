<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
  <div class="container">
<h3>Demonstration of AJAX</h3>
<form class="form">
<label>Select the student whose details you want</label>
<select class="form-control" name="users" onchange="showUser(this.value)">
<option class="form-control" value="" disabled>Select</option>
<option class="form-control" value="1">Nikhil</option>
<option class="form-control" value="2">Nehal</option>
<option class="form-control" value="3">Toufiq</option>
<option class="form-control" value="4">Ritikesh</option>
</select>
</form>
<br>
<div id="txtHint"><h3>Student info will be listed here.</h3></div>
</div>
</body>
</html>