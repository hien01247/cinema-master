//Top nav
$(window).on('scroll',function(){
  if($(window).scrollTop()){
    $('nav').addClass('black');
  }else {
    $('nav').removeClass('black');
  }
})
// Auth

var modal = document.getElementById("myModal");
var btn = document.getElementById("dnhap");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
//Alert
// var span1 = document.getElementById("close1");
// var span2 = document.getElementById("close2");
// var span3 = document.getElementById("close3");
// var span4 = document.getElementById("close4");
// var a= document.getElementById("alert1");
// var b= document.getElementById("alert2");
// var c= document.getElementById("alert3");
// var d= document.getElementById("alert4");

// span1.onclick = function() {
//   a.style.display = "none";
// }
// span2.onclick = function() {
//   b.style.display = "none";
// }
// span3.onclick = function() {
//   c.style.display = "none";
// }
// span4.onclick = function() {
//   d.style.display = "none";
// }
//Slider
var slideIndex = 0;
var slideIndexCurrent = 0;
showSlides();

function currentSlide(n) {
  showSlidesCurrent(slideIndexCurrent = n);

}
function currentSlide(n) {
  showSlidesCurrent(slideIndexCurrent = n);

}

function showSlidesCurrent(n) {
  //var slideIndex = 1;
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndexCurrent = 1}   

  if (n < 0) {slideIndexCurrent = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndexCurrent-1].style.display = "block";  
  dots[slideIndexCurrent-1].className += " active";
  slideIndexCurrent++;
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";

  setTimeout(showSlides, 5000);
}
