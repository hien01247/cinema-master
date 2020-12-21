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

//HOME
var x = document.getElementById("sapchieu");
x.style.display = "none";

function hienPhimsapchieu() {
    var element = document.getElementById("title2");
    element.classList.add("change");
    var element = document.getElementById("title1");
    element.classList.remove("change");
    $("#dangchieu").hide();
    $("#sapchieu").show();
}

function hienPhimdangchieu() {
    var element = document.getElementById("title1");
    element.classList.add("change");
    var element = document.getElementById("title2");
    element.classList.remove("change");
    $("#sapchieu").hide();
    $("#dangchieu").show();
}

// Profile

var x = document.getElementById("gioitinh");
var y = "{{Auth::user()->gioitinh}}";
    if (y == "1") {
        x.selectedIndex = "0";
    } 
    else {
        x.selectedIndex = "1";
    }                                    
                
function myFunction() {
    var x = document.getElementById("changepas");
    var checkbox = document.getElementById('want');
    if (checkbox.checked === true) {
        x.style.display = "block";
        $(":password").attr("disabled",false);
    }
    else {
        x.style.display = "none";
        $(":password").attr("disabled",true);
    }
}

function goBack() {
    window.history.back();
}

$("[type='number']").keypress(function (evt) {
  evt.preventDefault();
});
var globalt = 0;
var cacsl = document.getElementsByClassName("cacsl");
var num = cacsl.length;
var soluong = [];
for (i = 1; i <= num; i++) {
  soluong.push('#soluong_' + i);
}
var getTotal = function () {
var tong = [];
document.getElementById("tong").value = 0;
for (i = 1; i <= num; i++) {

  var soluong = document.getElementById("soluong_" + i).value;

  var dongia = document.getElementById("gia_" + i).value;
  tong.push(soluong * dongia);
  var thanhtien = document.getElementById("tong_" + i).value = soluong * dongia + " VNĐ";
}
const reducer = (accumulator, currentValue) => accumulator + currentValue;
globalt = tong.reduce(reducer) ;
document.getElementById("tong").value = tong.reduce(reducer) + " VNĐ";
}
  
var lp = document.querySelector('#chonlp');
function giveSelection(chonlp) {
  var x = document.getElementById('gia_'+ lp.value).value;
      
  document.getElementById("displayGiaphong").value = x + " VNĐ";
  document.getElementById("giaghe").value = parseInt( x);
  document.getElementById("giadv").value = parseInt( globalt);
  document.getElementById("loaiphong").value = lp.value;
  document.getElementById("db_btn").disabled = false;
}

var calculate = function () {
  var temp, i = 1;
  do {
      temp = document.getElementById("soluong_" + i).onchange = getTotal;
      i++;
  } while (temp);
  calculate();
};
window.onload = calculate;
