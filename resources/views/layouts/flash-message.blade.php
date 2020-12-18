@if ($message = Session::get('success'))
<div class="alert alert-success" id="alert1">
	<span class="close-alert" onclick="myFunction1()">×</span>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger" id="alert2">
	<span class="close-alert" onclick="myFunction2()">×</span>	
        <strong>{{ $message }}</strong>
</div>
@endif

{{-- 
@if ($message = Session::get('warning') || $errors->any())
<div class="alert alert-warning" id="alert3">
	<span class="close-alert" onclick="myFunction3()">×</span>	
	<strong>{{ $message }}</strong>
</div>
@endif --}}


@if ($message = Session::get('info'))
<div class="alert alert-info"id="alert4">
	<span class="close-alert" onclick="myFunction4()">×</span>	
	<strong>{{ $message }}</strong>
</div>
@endif

{{-- <script>
var a= document.getElementById("alert1");
var b= document.getElementById("alert2");
var c= document.getElementById("alert3");
var d= document.getElementById("alert4");

myFunction1() {
  a.style.display = "none";
}
myFunction2() {
  b.style.display = "none";
}
myFunction3() {
  c.style.display = "none";
}
myFunction4() {
  d.style.display = "none";
}
</script> --}}