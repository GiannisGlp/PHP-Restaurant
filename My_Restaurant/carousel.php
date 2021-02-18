<!DOCTYPE html>
<html>
<title>My Restaurant</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none}
</style>
<body>



<div class="w3-content" style=" max-width: 100%;   ">
  <img class="mySlides" src="images/Restaurant.jpg" style="width:100%; height:500px;">
  <img class="mySlides" src="images/img_la.jpg" style="width:100%; height:500px;">
  <img class="mySlides" src="images/img_ny.jpg" style="width:100%; height:500px;">
  <img class="mySlides" src="images/back.jpg" style="width:100%; height:500px;">
  <img class="mySlides" src="images/res.jpg" style="width:100%; height:500px;">
</div>

<div class="w3-center" >
  <div class="w3-section">
    <button class="w3-button" onclick="plusDivs(-1)">❮ Prev</button>
    <button class="w3-button" onclick="plusDivs(1)">Next ❯</button>
  </div>
  <button class="w3-button demo" onclick="currentDiv(1)">1</button> 
  <button class="w3-button demo" onclick="currentDiv(2)">2</button> 
  <button class="w3-button demo" onclick="currentDiv(3)">3</button>
  <button class="w3-button demo" onclick="currentDiv(4)">4</button> 
  <button class="w3-button demo" onclick="currentDiv(5)">5</button> 
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-red";
}
</script>

</body>
</html>
