

var close_succes = document.getElementById("close-succes");
var close_fail = document.getElementById("close-fail");
var succes = document.getElementById("alert-border-3");
var fail = document.getElementById("alert-border-2");
var modal1 = document.getElementById("popup-modal1");








close_succes.addEventListener("click",function(){
succes.style.display = "none";

})


close_fail.addEventListener("click",function(){
    Toast.getInstance(document.getElementById('myToast')).hide();
    console.log("clicked");

})